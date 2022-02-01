<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContestRequest;
use App\Contest;
use App\Edition;

class ContestsController extends Controller
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
        $contests = Contest::all();
        $section = 'contests';

        return view('contests.index', compact('contests', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = 'contests';
        return view('contests.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContestRequest $request)
    {
        $edition = Edition::where('active',true)->first();
        Contest::create([
            'name' => $request->name,
            'description' => $request->description,
            'edition_id' => $edition->id
        ]);

        return redirect('platform/contests');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        $section = 'contests';
        return view('contests.show', compact('contest', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        $section = 'contests';
        return view('contests.edit', compact('contest', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(ContestRequest $request, Contest $contest)
    {
        $contest->update($request->all());

        return redirect('platform/contests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        $contest->delete();

        return redirect('platform/contests');
    }
}
