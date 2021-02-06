<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\UsersExport;
use App\Exports\projectExport;
use App\User;
use App\project;

class excelController extends Controller
{
      public function profileExport(Request $request) 
    {
    	$from = $request->fromInput; 
        $to   = $request->toInput;
        $id   = $request->id;
        $data = array(
            'from' => $from,
            'to'   => $to,
            'id'   => $id,
        );
        $user = user::find($id);

        return Excel::download(new UsersExport($data),$user->name . '.xlsx');
    }

    
      public function projectExport(Request $request) 
    {

        $from = $request->fromInput; 
        $to   = $request->toInput;
        $id   = $request->id;
        $data = array(
            'from' => $from,
            'to'   => $to,
            'id'   => $id,
        );
    	$project = project::find($id);


      return Excel::download(new projectExport($data),$project->name . '.xlsx');
    }

    
}
