<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartnerRequest;
use App\Partner;

class PartnersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('index','create','store','edit','update','show','destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        $section = 'partners';

        return view('partners.index', compact('partners', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = 'partners';

        return view('partners.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {

        Partner::create($request->all());

        return redirect('platform/partners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($partner)
    {
        return view('partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($partner)
    {
        return view('partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $partner)
    {
        $partner->update($request->all());

        return redirect('platform/partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($partner)
    {
        $partner->delete();

        return redirect('platform/partners');
    }
}
