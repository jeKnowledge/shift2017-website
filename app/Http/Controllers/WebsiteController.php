<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FAQ;
use App\Event;

class WebsiteController extends Controller
{
    public function index()
    {
        $page = 'index';
        $bgColor = 'bg-red';
        $fontColor = 'light';
        $activeColor = 'yellow';
        return view('website.index', compact('page', 'bgColor', 'fontColor', 'activeColor'));
    }

    public function wall()
    {
        $page = 'wall';

        $bgColor = 'bg-red';
        $fontColor = 'yellow';
        $activeColor = 'light';
        return view('website.wall', compact('page', 'bgColor', 'fontColor', 'activeColor'));
    }

    public function schedule()
    {
        $page = 'schedule';
        $bgColor = 'bg-red';
        $fontColor = 'light';
        $activeColor = 'yellow';

        $events = Event::all();

        return view('website.schedule', compact('page', 'bgColor', 'fontColor', 'activeColor', 'events'));
    }

    public function faqs()
    {
        $page = 'faq';
        $bgColor = 'bg-yellow';
        $fontColor = 'dark';
        $activeColor = 'blue';

        $faqs = FAQ::all();

        return view('website.faqs', compact('page', 'bgColor', 'fontColor', 'activeColor', 'faqs'));
    }

    public function about()
    {
        $page = 'about';
        $bgColor = 'bg-blue';
        $fontColor = 'light';
        $activeColor = 'yellow';
        return view('website.about', compact('page', 'bgColor', 'fontColor', 'activeColor'));
    }

    public function competition()
    {
        $page = 'competition';
        $bgColor = 'bg-blue';
        $fontColor = 'light';
        $activeColor = 'red';
        return view('website.competition', compact('page', 'bgColor', 'fontColor', 'activeColor'));
    }

    public function downloadRegulation() {
        return response()->file(public_path() . '/shift-reg.pdf');
    }
}
