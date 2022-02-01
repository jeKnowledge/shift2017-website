<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BadgesRequest;
use App\Http\Requests\ApplicationRequest;
use App\User;
use App\Edition;
use Auth;
use App\Skill;
use App\Application;
use Carbon\Carbon;

class ApplicationsController extends Controller
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
        $this->middleware('auth.shifter')->only('create','store','edit','update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isShifter()) {
            if(Auth::user()->shifter->application()->count()>0 && !Auth::user()->shifter->application()->first()->accepted)
                return redirect()->route('applications.edit', ['application' => Auth::user()->shifter->application()->first()]);
            else
                return redirect()->route('applications.show', ['application' => Auth::user()->shifter->application()->first()]);
        }
        $applications = Application::all();
        $section = 'application';

        return view('applications.index', compact('applications', 'section'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->isShifter()){
            return redirect()->route('403');
        }
        if(Auth::user()->shifter->application()->count()>0)
            return redirect()->route('applications.edit', ['application' => Auth::user()->shifter->application()->first()]);

        $section = 'application';

        return view('applications.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $shifter = Auth::user()->shifter;

        $edition = Edition::where('active',true)->first();

        $application = $shifter->application()->create([
            'pitch' => $request->pitch,
            'portfolio' => $request->portfolio,
            'urls' => $request->urls,
            'comments' => $request->comments,
            'firstTime' => $request->firstTime,
            'tshirt' => $request->tshirt,
            'edition_id' => $edition->id,
        ]);

        $shifter->update($request->all());

        $skills = explode(' ', $request->skills);

        foreach ($skills as $s) {
            if($s != ""){
                $skill = Skill::firstOrCreate(['name' => $s]);
                $application->skills()->attach($skill);
            }
        }



        return redirect()->route('applications.edit', ['application' => $application])->with('status', 'success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        
        $section = 'application';
        return view('applications.show', compact('application', 'section'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        if($application->accepted)
            return redirect()->route('applications.show', ['application' => Auth::user()->shifter->application()->first()]);
        $application->skills = "";
        foreach($application->skills()->get(['name']) as $skill){
            $application->skills .= $skill->name . ' ';
        }

        $section = 'application';

        return view('applications.edit', compact('application', 'skills', 'section'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $application->update([
            'pitch' => $request->pitch,
            'portfolio' => $request->portfolio,
            'urls' => $request->urls,
            'comments' => $request->comments,
            'firstTime' => $request->firstTime,
            'tshirt' => $request->tshirt,
        ]);

        Auth::user()->shifter->update($request->all());

        $skills = explode(' ', $request->skills);

        foreach ($skills as $s) {
            if($s != ""){
                $skill = Skill::firstOrCreate(['name' => $s]);
                $application->skills()->delete();
                $application->skills()->attach($skill);
            }
        }


        return redirect()->route('applications.edit', ['application' => $application])->with('status', 'success');
    }

    public function evaluate(Request $request, Application $application) {
        $application->update(['accepted' => $request['accepted']]);
        //dd($application);

        return redirect()->route('applications.index')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
        $application->delete();

        return redirect('platform/applications');

    }
}
