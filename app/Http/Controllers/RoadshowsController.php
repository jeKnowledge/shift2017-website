<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoadshowRequest;
use App\Roadshow;
use App\Edition;
use Carbon\Carbon;
use Auth;
use Hash;

class RoadshowsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('create','store','edit','update','destroy', 'index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(Auth::user()->isUser()){
            $roadshow = Roadshow::where('date', Carbon::now()->toDateString())->first();
            return redirect()->route('roadshows.play.get', compact('roadshow'));
        }*/

        $roadshows = Roadshow::all();
        $section = 'roadshow';

        return view('roadshows.index', compact('roadshows', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section = 'roadshow';
        return view('roadshows.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadshowRequest $request)
    {

        //dd($request->password);
        $edition = Edition::where('year',Carbon::now()->year)->first();

        $edition->roadshows()->create([]);

        return redirect()->route('roadshows.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Roadshow $roadshow
     * @return \Illuminate\Http\Response
     */
    public function show(Roadshow $roadshow)
    {
        //
        $section = 'roadshow';
        return view('roadshows.show', compact('roadshow', 'section'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Roadshow $roadshow
     * @return \Illuminate\Http\Response
     */
    public function playGet(Roadshow $roadshow)
    {
        //
        $section = 'roadshow';
        return view('roadshows.play', compact('roadshow', 'section'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Roadshow $roadshow
     * @return \Illuminate\Http\Response
     */
    public function playPost(Request $request, Roadshow $roadshow)
    {
        $section = 'roadshow';
        if(Hash::check($request['password'], $roadshow->password)){
            $validated = true;
            return view('roadshows.play', compact('roadshow', 'section', 'validated'));
        }
        else {
            $validated = false;
            $error = "Password errada";
            return view('roadshows.play', compact('roadshow', 'section', 'validated', 'error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Roadshow $roadshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Roadshow $roadshow)
    {
        //
        $section = 'roadshow';
        return view('roadshows.edit', compact('roadshow', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Roadshow $roadshow
     * @return \Illuminate\Http\Response
     */
    public function update(RoadshowRequest $request, Roadshow $roadshow)
    {
        //
        $roadshow->update($request->all());

        return redirect('platform/roadshow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Roadshow $roadshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roadshow $roadshow)
    {
        //
        $roadshow->delete();

        return redirect('platform/roadshow');
    }
}
