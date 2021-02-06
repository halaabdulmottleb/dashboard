<?php
use App\paper;
$papers = paper::all();
?>
@extends('layouts.dashboard')
@section('dashboard_heading')
  <p style="color: grey ; font-size: 15px"> STRUCTURE </p>
@endsection
@section('dashboard_content')
<div class="container">
    <!-- Right buttons Section  -->
    @if(Auth::user()->admin)
    <div class="float-right mt-4 print">
       <div class="btn-group btn-group-toggle" >
            <a href="/dashboard/structure/statistics">
              <button class="btn btn-outline-success btn-lg showTitle" ><i class="fa fa-line-chart" title="Statistics"></i></button>
            </a>
            <a href="/dashboard/structure/showBranches">
              <button class="btn btn-outline-warning btn-lg showTitle" title="Branches" ><i class="fa fa-bank"></i></button>
            </a>
            <a href="/dashboard/structure/showUsers">
              <button class="btn btn-outline-primary btn-lg showTitle" title="Users"><i class="fa fa-user"></i></button>
            </a>
             <a href="#">
              <button class="btn btn-outline-secondary btn-lg showTitle" title="Users" data-toggle="modal" data-target="#paperModal"><i class="fa fa-file"></i></button>
            </a>
            
        </div>
    </div>
    @endif
    <br> <br><br> <br>

    <!-- content of structure -->
    @yield('structure_content')
    <!-- end of  content structure -->


    <!-- End right Buttons section  -->

    <!-- change paper modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="paperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                             <P>ALL</P>
                            <ul>
                                 @foreach($papers as $paper)
                                   <li >
                                    <div class="row">
                                      <div class="col-md-6">
                                           {{$paper->name}}

                                      </div>
                                      <div class="col-md-6">

                                        <form method="post" action="/dashboard/deletePaper/  {{$paper->id}}">
                                            @csrf
                        
                                            <button class="btn btn-danger float-right" type="submit">delete</button>
                                         </form>
                                      </div>
                                      
                                    </div>
                                   
                                     
                                       
                                   </li>
                                   <br>

                                  @endforeach
                            </ul>                      
                         <!-- form to select from to data -->
                          <form method="post" action=" {{route('updatePaper')}} ">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="inputEmail4">Add new paper</label>
                                <input type="text" class="form-control" id="paperInput" name="paper" required >
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">add</button>
                          </form>
                         <!--end form  -->
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- end change paper modal -->

      
<!-- End of page content -->



</div>
   
    </div>
@endsection

@section('dashboard_scripts') 

@endsection