<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project ;
use App\branch;
class reportController extends Controller
{
    public function branchStatistics($id) {

    	$branch = branch::find($id) ;
    	$projects = project::where('branch' , '=' , $id)->get();
    	// statistics 
    	$canceled  = 0 ;
    	$done     = 0 ;
    	$late     =	0 ;
    	$delay    = 0 ;
    	foreach ($projects as $project) {
    		
    		$tasks = $project->tasks()->get();
    		foreach ($tasks as $task) {
    			$status = $task->status;
    			switch ($status) {
    				case 'late':
    					$late ++ ;
    					break;
    				case 'done':
    					$done ++ ;
    					break;
    				case 'delayed':
    					$delay ++ ;
    					break;
    				case 'canceled':
    					$canceled ++ ;
    					break;
    			}
    		}
    	}
    	$data = array(
    		'late'     => $late , 
    		'canceled'  => $canceled,
    		'done'     => $done,
    		'delay'    => $delay ,
    	);
    	return view('Dashboard.branch')->with(['projects' => $projects , 'branch' => $branch , 'data' =>$data]);
    	

    }
}
