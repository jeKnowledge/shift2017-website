<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BadgeRequest;
use App\Edition;
use Carbon\Carbon;
use App\Badge;

class BadgesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = Badge::all();
        $section = 'badges';
        \Debugbar::info($section);

        return view('badges.index', compact('section', 'badges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = 'badges';

        return view('badges.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BadgeRequest $request)
    {
        $edition = Edition::where('year',Carbon::now()->year)->first();

        $edition->bagdes()->create($request->all());

        return redirect()->route('badges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $badge
     * @return \Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {

        $section = 'badges';

        return view('badges.show', compact('badge', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $badge
     * @return \Illuminate\Http\Response
     */
    public function edit(Badge $badge)
    {
        $section = 'badges';

        return view('badges.edit', compact('badge', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(BadgeRequest $request,Badge $badge)
    {

        $badge->update($request->all());

        return redirect()->route('badges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        $badge->delete();

        return redirect()->route('badges.index');
    }
}
