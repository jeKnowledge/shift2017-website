<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;
use App\Edition;
use Carbon\Carbon;
use App\Http\Requests\FAQRequest;

class FAQsController extends Controller
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
        //
        $section = 'faqs';
        $faqs = FAQ::all();

        return view('faqs.index', compact('section', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section = 'faqs';

        return view('faqs.create', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        //

        $edition = Edition::where('year', Carbon::now()->year)->first();
        $section = 'faqs';

        $edition->faqs()->create($request->all());

        return redirect()->route('faqs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        //
        $section = 'faqs';

        return view('faqs.show', compact('section', 'faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        //
        $section = 'faqs';

        return view('faqs.edit', compact('section', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request,FAQ $faq)
    {
        $section = 'faqs';

        $faq->update($request->all());

        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        //
        $section = 'faqs';

        $faq->delete();

        return redirect()->route('faqs.index');
    }
}
