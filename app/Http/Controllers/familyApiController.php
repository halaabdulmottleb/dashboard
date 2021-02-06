<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\family;
use App\familymember;

class familyApiController extends Controller
{
    public function getMembers($family_id) {

    	$family = family::find($family_id);
    	$members = $family->members()->get();
    	return $members;
    }
    public function addMember($id , Request $request){

    	$member = new familymember();
    	$member->family_id =  $id;
    	$member->save();

    }
}
