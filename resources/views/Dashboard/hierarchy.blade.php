<?php
  use App\User;
?>
@extends('layouts.dashboard')
@section('dashboard_CSS')
  <link rel="stylesheet" href="{{ asset('css/hierarchy.css')}}">
@endsection
@section('dashboard_heading')
  <p>   HIERARCHY CHART </p>
@endsection

@section('dashboard_content')
  <div class="container">
    <div class="row text-center" >  
 
         
          <button type="button" class="btn btn-primary btn-circle btn-sm float-left" data-toggle="modal" data-target="#exampleModalCenter">
              <i class="fa fa-plus"></i>
          </button>
          <button  class="btn btn-primary btn-circle btn-sm "id="zoomIn">
              <i class="fa fa-search-plus" aria-hidden="true"></i>
          </button>
           <button  id="zoomOut"  class="btn btn-primary btn-circle btn-sm "id="zoomIn">
              <i class="fa fa-search-minus" aria-hidden="true"></i>
          </button>
          
        

      
    </div>
     <div class="row text-center mt-4 p-2" style="background-color: #a49ac1">  
        <div class="col-md-4 offset-md-4 level1">
        
            <h1 style="color: #dee2e6" id="heading">  MISHKAT NOUR <small>(HIERARCHY CHART)</small> </h1>
          
        </div>
    </div>
    <div class="row mt-4 content " style=" white-space: nowrap;">
      <div class="col-md-12  mt-4 ">
        <div style="overflow-x:auto; overflow-y: auto;  height:700px;
                      ">
                      <figure>
                        @foreach ($departments as $department)     

                          <div  style="display:inline-block ">
                           <!-- to make chart  -->
                             <div  style="margin: 10px ;display:inline-block ">
                               <!-- deprtment  -->
                                <div class="card text-white  mb-3 level2" style="width: 18rem; background-color: {{$department->color}} "><div class="card-header" >{{$department->name}} <button   type="button" class="btn btn-light btn-circle btn-sm float-right" data-toggle="modal" data-target="#memberModal{{$department->id}}">
                                            <i class="fa fa-plus"></i>
                                </button></div></div>
                                <!-- get members -->
                                  <?php 
                                    $members = $department->members()->get();
                                  ?>
                                  @foreach($members as $member)
                                    <?php 
                                      $user = user::find($member->user_id);
                                    ?>
                                    <div class="card text-white  mb-3 level3" style="width: 18rem; background-color:{{$member->color}} ">
                                        <div class="card-header">
                                          <a class="dropdown-item" style="color: white"href="/dashboard/profile/{{$user->id}}"  >{{$user->name}} <small > ({{$member->section}}) </small></a>
                                             
                                        </div>
                                    </div>
                                  @endforeach
                                <!-- end members -->

                             </div>
                           
                            
                             
                           </div>
                           <!-- Modal add member -->
                              <div class="modal fade" id="memberModal{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{$department->name}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="{{ route('addMemberToDepartment') }}" >
                                       @csrf
                                       <input type="hidden" name="department" value="{{$department->id}}">
                                         <div class="form-group">
                                           
                                            <select class="form-control" id="inlineFormCustomSelect" name="user">
                                              @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                              @endforeach
                                             
                                            </select>
                                          </div>
                                           <div class="form-group">
                                              <label for="departmentName">Section</label>
                                               <input type="text"  class="form-control" id="favcolor" name="SectionName" required> 

                                              
                                            </div>
                                              <div class="form-group">
                                              <label for="departmentName">Department Color</label>
                                               <input type="color"  class="form-control" id="favcolor" name="sectionColor" value="#ff0000" required>
                                              
                                            </div>
                                                       

                                         <button type="submit" class="btn btn-primary float-right">Add</button>
                                       </form>
                                    </div>
                                   
                                  </div>
                                </div>
                              </div>
                              <!-- end Modal add member   -->
                           @endforeach
                        </figure>


                              </div>
                       </div>
                      
        </div>
      </div>
      <!-- Modal add department -->
       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Add Department</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <form method="post" action="{{ route('addDepartment') }}" >
                @csrf
                  <div class="form-group">
                    <label for="departmentName">Department Name</label>
                    <input type="text" class="form-control" id="departmentName" name="departmentName"  placeholder="Enter Department Name" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="departmentName">Department Color</label>
                     <input type="color"  class="form-control" id="favcolor" name="departmentColor" value="#ff0000">
                    
                  </div>

                  <button type="submit" class="btn btn-primary float-right">Add</button>
                </form>
             </div>
            
           </div>
         </div>
       </div>
       <!-- end Modal add department   -->
          
 @endsection
 @section('dashboard_scripts') 
  <script type="text/javascript">
      $(document).ready(function(){
         var $zoom = $(".content").css("zoom");
         $("#zoomIn").click(function(){
            $(".content").css("zoom" , parseFloat($zoom) + 0.1);
            $zoom =  parseFloat($zoom) + .1 ;
         });
         $("#zoomOut").click(function(){
           $(".content").css("zoom" , parseFloat($zoom) - 0.1);
           $zoom =  parseFloat($zoom) - .1 ;
         });
         
      });
  </script>
 
 @endsection
