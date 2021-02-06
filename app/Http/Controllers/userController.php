<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use App\user_paper ;
use App\paper;

class userController extends Controller
{
    public function paper()
    {
    	$papers = paper::all();
    	$users  = user::all();

    	return view('Dashboard.paperReport')->with(['papers' => $papers , 'users' =>$users]);
    }
}
