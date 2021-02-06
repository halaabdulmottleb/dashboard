<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\family;
use App\family_mobile;
use App\leavingeduction ;
use App\techSkill ;
use App\disease ; 


class heyahKaremaController extends Controller
{
    public function addFamilyProject(){

    	$projects = project::all();
    	return view('Hayahkarema.addFamilyToProject')->with('projects' , $projects);
    }
	 public function addFamilyIndex(Request $req ){

    	
    	return view('Hayahkarema.addFamily')->with('project' , $req->project);
    }
	 public function addFamily(Request $req ){
		 
		 $family = new family();
		 $family->mohafza = $req->mohafza ;
		 $family->markaz = $req->markz ;
		 $family->qarya = $req->qarya ;
		 $family->we7da = $req->we7da ;
		 $family->mostafid = $req->mostafid ;
		 $family->address = $req->address ;
		 $family->project_id = $req->project ;
		 $family->save();
		 // if there is mobile or ardy 
		 if($req->ardy) {
			$ardy = new family_mobile();
			$ardy->family_id =  $family->id;
			$ardy->mobile = $req->ardy;
			$ardy->note = "ارضي - "  . $req->input('ardy-note');
			$ardy->save();
			
			
		 }
		 if($req->mobile) {
			$mobile = new family_mobile();
			$mobile->family_id =  $family->id;
			$mobile->mobile = $req->mobile;
			$mobile->note = "موبايل- "  . $req->input('mobile-note');
			$mobile->save();
			
		 
			
		 }
		
		
    	 $reasones = leavingeduction::all() ;
		 $skills = techSkill::all();
		 $diseases = disease::all();				
		 return view('Hayahkarema.continueFamily')->with(['reasones' => $reasones , 'skills' => $skills , 'diseases' => $diseases , 'family' => $family]) ; 

		

    }
    public function continueFamily($family_id){
    	 $family = family::find($family_id);
    	 $reasones = leavingeduction::all() ;
		 $skills = techSkill::all();
		 $diseases = disease::all();				
		 return view('Hayahkarema.continueFamily')->with(['reasones' => $reasones , 'skills' => $skills , 'diseases' => $diseases , 'family' => $family]) ; 
    }
    public function projectShowFamilies ($project_id) {
    	$project = project::find($project_id);
    	$families = $project->families()->get();
    	 return view('Hayahkarema.showFamiliesProject')->with(['families' => $families , 'project' => $project] );
    }
	
}
