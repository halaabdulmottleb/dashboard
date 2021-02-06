<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\task;
use App\project;
use Hash;
use DateTime;
use Mail;
use DB ;

class testController extends Controller
{
    
     public function test()
     {
       $task = task::whereMonth('created_at', '=',"11")->get();

       echo "<pre>";
         print_r(  $task);
     echo "</pre>";
     }
}
