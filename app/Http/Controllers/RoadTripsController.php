<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roadshow;
use App\RoadTrip;
use App\Http\Requests\RoadTripRequest;

class RoadTripsController extends Controller
{
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
        //
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

        return view('roadtrips.create', compact('section'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadTripRequest $request)
    {
        //
        $roadshow = Roadshow::where('id',1)->first();

        $roadshow->roadtrips()->create($request->all());

        return redirect()->route('roadshows.show', compact('roadshow'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoadTrip $roadtrip)
    {
        //
        $section = 'roadshow';

        return view('roadtrips.show', compact('section', 'roadtrip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoadTrip $roadtrip)
    {
        //
        $section = 'roadshow';

        return view('roadtrips.edit', compact('section', 'roadtrip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoadTripRequest $request, Roadtrip $roadtrip)
    {
        //
        $roadshow = Roadshow::where('id', $roadtrip->roadshow_id)->first();

        $roadtrip->update($request->all());

        return redirect()->route('roadshows.show', compact('section', 'roadshow'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roadtrip $roadtrip)
    {
        //
        $roadshow = Roadshow::where('id', $roadtrip->roadshow_id)->first();
        $roadtrip->delete();

        return redirect()->route('roadshows.show', compact('roadshow'));
    }
}
