<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditionsRequest;
use App\Edition;

class EditionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('index','show','create','store','edit','update','destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editions = Edition::all();

        return view('editions.index', compact('editions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditionsRequest $request)
    {
        Edition::create($request->all());

        return redirect('platform/editions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $edition
     * @return \Illuminate\Http\Response
     */
    public function show($edition)
    {
        return view('editions.show', compact('edition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $edition
     * @return \Illuminate\Http\Response
     */
    public function edit($edition)
    {
        return view('editions.edit', compact('edition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $edition
     * @return \Illuminate\Http\Response
     */
    public function update(EditionsRequest $request, $edition)
    {
        $edition->update($request->all());

        return redirect('platform/editions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $edition
     * @return \Illuminate\Http\Response
     */
    public function destroy($edition)
    {
        $edition->delete();

        return redirect('platform/editions');
    }
}
