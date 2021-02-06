<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;

class seederController extends Controller
{
	    public function testDatabase()
	{
	    $user = factory(branch::class , 100)->create();
	
	    // Use model in tests...
	}
}
