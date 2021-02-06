<?php
use App\branch;

?>
@extends('Dashboard.structure')
@section('structure_content') 
<div class="container">
  <div class="row">
    <div class= "col-md-6 offset-md-3">
        <div class="row">
            <div class="col-md-6">
               <input class="form-control" id="myInput" type="text" placeholder="Search..">
             </div>
             <div class="col-md-6  ">
                      <a href="/dashboard/structure/addUser" class="btn btn-outline-primary showTitle float-right" title="Add      User"  >
  	          	    	<i class="fa fa-plus"></i>
	          	     </a>
             </div>
        </div> 
    </div> 
  </div>
    
  
	<div class="row">
	  <div class="col-md-10 offset-md-1 mt-4">
		 <div style="overflow-x:auto; overflow-y: auto;
             height:500px;">
                <table class="table table-bordered table-fixed"
            
            padding:2px;"
            >
  			<thead class="thead-dark">
  			  <tr>
  			    <th scope="col">User ID</th>
  			    <th scope="col">Name</th>
                <th scope="col">Branch</th>              
  			    <th scope="col">Email</th>
  			    <th scope="col">Mobile</th>
  			    <th scope="col">Address</th>
   			    <th scope="col">
                   
                </th>
   			    <th scope="col"></th>
   			   
  			  </tr>
  			</thead>
  			<tbody id="myTable" >
  			 @foreach($users as $user)
         @if($user->email != Auth::user()->email)
  			  <tr style="background-color: @if($user->admin) #A9A9A9 @endif " >
                    
              
  			  		<td>{{$user->id}} </td>
  			  		<td>{{$user->name}} </td>
                    <td>
                <?php
                  $branch = branch::find($user->branch);

                ?>
                  {{$branch->name}}
              </td>
              
  			  		<td>{{$user->email}} </td>
  			  		<td>{{$user->mobile}} </td>
  			  		<td>{{$user->address}} </td>
                    <td>
                       <div class="dropdown">
                          <button class=" btn dropdown-toggle" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown"       aria-haspopup="true" aria-expanded="false">
                            <img src="https://img.icons8.com/metro/20/000000/settings.png"/>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <!-- delete --> 
                               <button class="btn btn-danger showTitle dropdown-item" data-toggle="modal"
                                 data-target="#deleteModal{{$user->id}}" title="Delete User">
                                  Delete User
                                </button>
                            <!-- end  -->
                            <!-- show /User-->
                             <!-- show -->
  			  		 	   
                                <a class="dropdown-item" href="/dashboard/profile/{{$user->id}}" title="show user" >
  								      Show User
						        </a>
                            
                            <!-- end show /User-->
                            <!--  exoprt-->
                                 
                                <button class="dropdown-item" title="export user" data-toggle="modal"
                                   data-target="#exportModal{{$user->id}}">
                                     Export
                                </button>
                            <!-- end  exoprt-->
                             <!-- make admin -->
                              @if($user->admin)
                               <button class="btn btn-secondry showTitle" title="make user"data-toggle="modal"
                               data-target="#modal{{$user->id}}">
                                  return to user         
                                </button>
                                @else
                                <!-- not admin -->
                              
                                 <button class="btn btn-secondry showTitle" title="make Admin"data-toggle="modal"
                                   data-target="#modal{{$user->id}}">
                                   Make an admin 
                                                  
                                </button>
                                @endif
<!-- 
                            <a  data-target="#deleteModal{{$user->id}}" class="dropdown-item" >Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a> -->
                          </div>
                        </div>
                    </td> 
                   
  			  		
  			  		<td>
                <div class="btn-group" role="group" aria-label="Basic example">
                 
                  
                   
                      <!-- offline online dot -->
                      <form action="{{ route('changeAvailability')}}" method="post">
                        @csrf
                          <input type="hidden" name="userID" value="{{$user->id}}">
                          <button type="submit" class="btn btn-secondry" title="offline/online">
                               <?php
                               $color = ($user->available)?'limegreen':'grey';
                               ?>
                               
                                 <span class="dot"
                                  style="background-color:{{$color}}">
                                  </span>          
                               
                         </button>
                      </form>
                      <!-- end ofline online dot -->
                    <!-- make admin -->
                  
                    
                      
                    
                </div>
					</td>
  			   
  			    
  			  </tr>
          @endif
              <!-- admin modal -->
             <div class="modal fade" id="modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">{{$user->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="color: grey">
                      @if($user->admin)
                        ({{$user->name}}) User ?
                      @else 
                        set  ({{$user->name}}) as an admin ? 
                      @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      @if($user->admin)
                      <a type="button" class="btn btn-warning" href="/dashboard/structure/user/makeunAdmin/{{$user->id}}">Contine</a>
                      @else 
                        <a type="button" class="btn btn-warning" href="/dashboard/structure/user/makeAdmin/{{$user->id}}">Contine</a>
                      @endif

                    </div>
                  </div>
                </div>
              </div>

             <!-- end admin -->
            <!-- delete modal -->
          <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$user->email}} </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="color: red">
                  If you delete User all data in relation with will be deleted .
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post" action="{{ route ('deleteUser') }}">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end delete modal -->
           <!-- export modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="exportModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                         <!-- form to select from to data -->
                          <form method="get" action=" {{route('exportUser')}} ">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">From</label>
                                <input type="date" class="form-control" id="formInput" name="fromInput"  required >
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">To</label>
                                <input type="date" class="form-control" id="toInput" name="toInput" required >
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Export</button>
                          </form>
                         <!--end form  -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- end export modal -->
  			 
  			 @endforeach
  			 
  			</tbody>
        </table>
     </div>
			
	</div>
 
		
</div>
@endsection
@section('dashboard_scripts') 
 <script>
    function clickMe(){
        alert('hello');
    }
 </script>
@endsection
