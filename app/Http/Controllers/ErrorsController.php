<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
	// Access denied
    public function code403(){
    	return view('errors.403');
    }
}
