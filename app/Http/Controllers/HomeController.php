<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use App\Contest;

class HomeController extends Controller
{
    public function index()
    {
    	$section = 'dashboard';
    	$date = Carbon::now();
    	$events = Event::where('startDate', '>=', $date)->get()->take(3);
    	$contests = Contest::all();

        return view('home.index', compact('section', 'events', 'contests'));
    }
}
