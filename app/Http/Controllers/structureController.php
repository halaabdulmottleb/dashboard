<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\branch;
use App\paper;
use App\User;
use App\user_paper;
use Illuminate\Support\Facades\Hash;
use Response;
use App\task ;
use App\project;
use DB;
use App\department;
use App\departmentMember;


class structureController extends Controller
{
	public function statisticsIndex(){
        $branches = branch::all();
        $branchCount = count( $branches);
        $users = User::all();
        $userCount = count($users);
        // statistics count 
        $canceled  = 0 ;
        $done     = 0 ;
        $late     = 0 ;
        $delay    = 0 ;
        $done0 = 0 ;
        $done1 = 0 ;
        $done2 = 0 ;

        $cancel0 =0 ;
        $cancel1 =0 ;
        $cancel2 =0 ;

        $late0 =0 ;
        $late1 =0 ;
        $late2 =0 ;

        $delay0 = 0 ;
        $delay1 = 0 ;
        $delay2 = 0 ;




        $tasksAll = task::where('statusApproved' , '=' , 1)->get();
        foreach($tasksAll as $row) {

                $status  = $row->status;
                $urgency = $row->urgency;
                switch ($status) {
                    case 'late':
                        $late ++ ;

                        if ($urgency == 0 ) {
                             $late0 ++;
                        }else if ($urgency == 1) {
                             $late1 ++;
                        }else{
                            $late2 ++;
                        }

                        break;
                    case 'done':
                        $done ++ ;

                        if ($urgency == 0 ) {
                             $done0 ++;
                        }else if ($urgency == 1) {
                             $done1 ++;
                        }else{
                            $done2 ++;
                        }

                        break;
                    case 'delayed':
                        $delay ++ ;
                         if ($urgency == 0 ) {
                             $delay0 ++;
                        }else if ($urgency == 1) {
                             $delay1 ++;
                        }else{
                            $delay2 ++;
                        }

                        break;
                    case 'canceled':

                        $canceled ++ ;

                         if ($urgency == 0 ) {
                             $cancel0 ++;
                        }else if ($urgency == 1) {
                             $cancel1 ++;
                        }else{
                            $cancel2 ++;
                        }

                        break;
                    }

        }
        $data = array(
            'late'     => $late , 
            'canceled'  => $canceled,
            'done'     => $done,
            'delay'    => $delay ,
        );

        $dataUrgency = array(
            'done0'  =>($done)? ($done0/$done) *100 : 0,
            'done1'  =>($done)?($done1/$done) *100 : 0,
            'done2'  =>($done)? ($done2/$done) *100 : 0,
            'late0'=> ($late)? ($late0/$late)*100 : 0,
            'late1'=> ($late)? ($late1/$late)*100 : 0,
            'late2'=> ($late)? ($late2/$late)*100 : 0,
            'cancel0'=>($canceled)? ($cancel0/$canceled)*100 : 0,
            'cancel1'=>($canceled)? ($cancel1/$canceled)*100 : 0,
            'cancel2'=> ($canceled)? ($cancel2/$canceled)*100 : 0,
            'delay0'=> ($delay)?($delay0/$delay) *100 : 0,
            'delay1'=> ($delay)?($delay1/$delay) *100 : 0,
            'delay2'=> ($delay)?($delay2/$delay) *100 : 0,
        );
        return response()->json([
        'brnachCount' =>$branchCount ,
        'userCount' => $userCount ,
        'tasksCount' => count( task::all() ),
        'data'       => $data,
        'dataUrgency' => $dataUrgency
        ]);

        
	}


    public function userIndex() {
        $branches = branch::all();
        $papers = paper::all();
        return view('Dashboard.addUser')->with(['branches' => $branches , 'papers' => $papers]);
    }
    public function makeAdmin($id) {
         DB::table('users')
                 ->where('id', $id)  // find your user by their email
                 ->limit(1)  // optional - to ensure only one record is updated.
                 ->update(array(
                 'admin' =>1,

                 ));
                 return redirect()->back()->with('updated' , 'updated');
    }
   public function makeunAdmin($id) {
         DB::table('users')
                 ->where('id', $id)  // find your user by their email
                 ->limit(1)  // optional - to ensure only one record is updated.
                 ->update(array(
                 'admin' =>0,

                 ));
                 // echo $id;
                 return redirect()->back()->with('updated' , 'updated');
    }


    public function addBranch(Request $request) {

    	// validate Input
    	 $Validator=  Validator::make($request->all(),[

            'branchName' =>'required',
            // 'branchId' =>'required',

        ])->validate();


    	 try{

    
    			$branch = new branch;
    			$branch->name = $request->branchName;
   				// $branch->branchID = $request->branchId;
    			$branch->save();

    		}
    		catch (\Exception $e) 
    		{
    			return redirect()->back()->with('fail', 'all fields rquierd');
    		}

    	return redirect()->back()->with('success', 'Branch is Added');


    }
    // show branches 
    public function showBranches() {

        $branches = branch::all();
        $count = count( $branches);
        return view('Dashboard.showBranches')->with(['branches' => $branches , 'count' =>$count]);

    }

    public function deleteBranch($id) {
        $branch = branch::find($id)->delete();
        return redirect()->back()->with('deleted' , 'deleted') ;
    }


    // show users 
    public function showUsers() {

        $users = user::orderBy('admin' , 'desc')->orderBy('available' , 'desc')->get();
        $count = count( $users);
        return view('Dashboard.showUsers')->with(['users' => $users , 'count' =>$count]);

    }


    
    public function addUser (Request $request){
        // check idf email is exists

        if (user::where('email', $request->userEmail)->exists()) {

            return redirect()->back()->with('exists', 'Branch is Added');


        }else {


        // validate Input
         $Validator=  Validator::make($request->all(),[

            'userName' =>'required',
            'userEmail' =>'required',
            'userPassword' =>'required',
            'userBranch' =>'required',

        ])->validate();


         try{

            // Add to user Table
                $user = new user;
                $user->name = $request->userName;
                $user->email = $request->userEmail;
                $user->password = Hash::make($request->userPassword);
                $user->branch = $request->userBranch;
                $user->mobile = $request->userMobile;
                $user->address = $request->userAddress;
                $user->save();
            // Add papers 
                $papers = paper::all();

                foreach ($papers as $paper) {

                if($request->hasFile('file'.$paper->id))
                  {
        
                    $file = $request->file('file'.$paper->id);
                          // generate a new filename. getClientOriginalExtension() for the file extension
                    $filename = $paper->name . $user->email .'-' . time() . '.' . $file->getClientOriginalExtension();
                          // save to storage/app/photos as the new $filename
                         // $path = $file->storeAs('files', $filename);
                         // $path = $file->store('toPath', ['disk' => 'public']);
                     $destination = public_path('/papers');
                     $file->move($destination , $filename );
                        // echo  $filename;
                    $user_paper = new user_paper; 
                    $user_paper->paper = $paper->name ;
                    $user_paper->destination = $filename ;

                    $user->user_papers()->save($user_paper);
                  }

                }


            }
            catch (\Exception $e) 
            {
                return redirect()->back()->with('fail', 'all fields rquierd');
            }

          return redirect()->back()->with('success', 'Branch is Added');

      }

       
    }

    // delete user 
    public function deleteUser (Request $request) {
        $user = user::find($request->id) ;
        $user->delete();

        return redirect()->back()->with('deleted' , 'deleted') ;
    }

    // changeAvailability
        // it to availble user to login or not 
    public function changeAvailability(Request $request) {
      $user = user::find($request->userID);
      echo $user->name;
      echo $user->available;
      echo ($user->available)?user::where('id' , '=' ,$request->userID )->update(['available' => 0]) : user::where('id' , '=' ,$request->userID )->update(['available' => 1]) ;
      return redirect()->back()->with('updated' , 'user updATEed');

    }

    public function getDownload($destination){

        $file = public_path()."/papers/" . $destination ;
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, $destination,$headers);
    }

    // updATE paper 

    public function updatePaper (Request $request) {
        $paper = new paper ;
        $paper->name = $request->paper ;
        $paper->save();
        return redirect()->back()->with('updated' , 'PAPER UPDATED') ;

    }
    public function uploadPaper(Request $request) {
        // find user 
        $user = user::find($request->userID);
        if($request->hasFile('file'))
         {
             $file = $request->file('file');
                          // generate a new filename. getClientOriginalExtension() for the file extension
             $filename = $request->paperName . $user->email .'-' . time() . '.' . $file->getClientOriginalExtension();
                          // save to storage/app/photos as the new $filename
                         // $path = $file->storeAs('files', $filename);
                         // $path = $file->store('toPath', ['disk' => 'public']);
               $destination = public_path('/papers');
               $file->move($destination , $filename );
                        // echo  $filename;
              $user_paper = new user_paper; 
              $user_paper->paper = $request->paperName ;
              $user_paper->destination = $filename ;
              $user->user_papers()->save($user_paper);
         }
         // return with updated msg
         return redirect()->back()->with('updated' , 'paper Updated');
    }
    public function deletePaper($id) {
      $paper = paper::find($id) ;
      $paper->delete();
      return redirect()->back()->with('delete' , 'Paper Deleted');
    }


  public function deleteUserPaper($id) {
      $paper = user_paper::find($id) ;
     
      $paper->delete();
      return redirect()->back()->with('delete' , 'Paper Deleted');
    }
    //hierarchy 
    public function showHierarchy(){
      $departments = department::all();
      $users = user::all();
      return view ('Dashboard.hierarchy')->with(['departments' => $departments , 'users' => $users ]);
    }
    public function addDepartment(Request $request) {
      $deparment = new department();
      $deparment->name = $request->departmentName;
      $deparment->color = $request->departmentColor ;
       $deparment->save();
      return redirect()->back()->with('updATE' , 'Paper Deleted');
    }

   public function addMember(Request $request) {
      $member = new departmentMember();
      $member->user_id = $request->user;
      $member->department_id = $request->department ;
      $member->color = $request->sectionColor ;
      $member->section = $request->SectionName ;
       $member->save();
       return redirect()->back()->with('updATE' , 'Paper Deleted');
    }


    

}
