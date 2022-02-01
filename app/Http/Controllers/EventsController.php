<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventsRequest;
use App\Event;
use App\Edition;
use Carbon\Carbon;

class EventsController extends Controller
{

    public function __construct() {
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
        $events = Event::all();
        $section = 'event';

        return view('events.index', compact('events', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = 'event';

        return view('events.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventsRequest $request)
    {

        $edition =  Edition::where('year',Carbon::now()->year)->first();
        $section = 'event';
        $edition->events()->create($request->all());

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function show($event)
    {
        $section = 'event';

        return view('events.show', compact('event','section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($event)
    {
        $section = 'event';

        return view('events.edit', compact('event','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventsRequest $request, $event)
    {
        $event->update($request->all());
        $section = 'event';

        return redirect('platform/events')->with(compact('section'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($event)
    {
        $event->delete();
        $section = 'event';

        return redirect('platform/events')->with(compact('section'));
    }
}
