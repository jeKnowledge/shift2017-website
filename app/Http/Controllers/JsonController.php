<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shifter;

class JsonController extends Controller
{
    public function searchShifters(Request $request) {
    	$string = $request->string;
    	$rows = User::orWhere('name', 'like', '%' . $string . '%')->orWhere('email', 'like', '%' . $string . '%')->get();

    	$shifters = array();
    	$i = 0;
        foreach ($rows as $row)
        {
        	if($row->isShifter() && $row->shifter->team()->count() == 0){
            	$shifters[$i]['name'] = $row->name;
            	$shifters[$i]['id'] = $row->id;
            	$shifters[$i]['email'] = $row->email;
                $i++;
        	}
        }

    	return response()->json($shifters);
    }
}
