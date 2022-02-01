<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shifter;
use Auth;

class ShiftersController extends Controller
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request['query'] != ""){
            $shifters = Shifter::whereHas('application', function ($query) {
                $query->where('accepted', true);
            })->where('name', 'like', '%' . $request['query'] . '%')->get();
        }
        else{
            $shifters = Shifter::whereHas('application', function ($query) {
                $query->where('accepted', true);
            })->get();
        }

        $section = 'shifters';

        return view('shifters.index', compact('shifters', 'section'));
    }

    public function show(Shifter $shifter) {
        $section = 'shifters';
        if(Auth::user()->isGoldPartner()){
            if($shifter->allowPartners)
                return view('shifters.show', compact('shifter', 'section'));
            else
                return redirect()->route('shifters.index');
        }
        else
            return view('shifters.show', compact('shifter', 'section'));
    }

}
