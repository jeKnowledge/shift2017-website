<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Image;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.custom');
        $this->middleware('auth.admin')->only('create','store','destroy','index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $section = 'users';

        return view('users.index', compact('users', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section = 'users';

        return view('users.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('platform/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $section = 'users';
        return view('users.show', compact('user', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $section = 'users';

        return view('users.edit', compact('user','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if($request->action == 'change_password'){
            $request['password'] = bcrypt($request->password);
        }

        $image = $request->file('photoFile');
        if($image != null){
            $input['photoPath'] = time().'.'.$image->getClientOriginalExtension();

            //Save original image
            $destinationPath = public_path('images/photos');
            $image->move($destinationPath, $input['photoPath']);


            //Save registration on DB
            $request['photoPath'] = $input['photoPath'];
        }

        $user->update($request->all());

        if($user->isShifter()){
            $user->shifter->update([
                'age' => $request['age'] != "" ? $request['age'] : null,
                'university' => $request['university'] != "" ? $request['university'] : null,
                'course' => $request['course'] != "" ? $request['course'] : null,
                'institution' => $request['institution'] != "" ? $request['institution'] : null,
                'bio' => $request['bio'] != "" ? $request['bio'] : null,
                'twitter' => $request['twitter'] != "" ? $request['twitter'] : null,
                'github' => $request['github'] != "" ? $request['github'] : null,
                'website' => $request['website'] != "" ? $request['website'] : null,
                'location' => $request['location'] != "" ? $request['location'] : null,
                'type' => $request['type'] != "" ? $request['type'] : null,
                'role' => $request['role'] != "" ? $request['role'] : null,
                'student' => $request['student'] != "" ? $request['student'] : null,
                'allowPartners' => isset($request['allowPartners']) ? $request['allowPartners'] : false,
            ]);
        }

        return redirect()->route('platform.profile')->with('status', 'success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect('platform/users');

    }

    public function profile()
    {
        $section = 'profile';

        $user= \Auth::user();

        return view('users.profile', compact('section', 'user'));
    }

    public function changePassword()
    {
        $section = 'profile';

        $user= \Auth::user();

        return view('users.changepassword', compact('section', 'user'));
    }

    public function setRole(User $user, UserRequest $request){

      if($request->partnerType == 'gold'){

        $userRole = Role::whereName('gold-partner')->first();

        $user->roles()->attach($userRole);

      }
      else{

        $userRole = Role::whereName('silver-partner')->first();

        $user->roles()->attach($userRole);

      }



      return redirect('platform/users');


    }
}
