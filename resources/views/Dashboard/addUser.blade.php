@extends('Dashboard.structure')
@section('structure_content') 
 <div class="container">
   
 <!-- start of user section -->
 <div id="user">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <h3 style="color: grey">Add User</h3>
    </div>
    <div class="col-md-8 offset-md-2">

      <form method="post" action="{{ route('addUser') }}"  enctype="multipart/form-data">
        @csrf

          <!-- NAme -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="userName">Name</label>
              <input type="text" class="form-control" id="userName" name="userName">
              {!! $errors->first('userName', '<small style="color:red;">:message</small>') !!}
            </div>
          </div>
          <!-- End name -->

          <!-- userEmail password-->
           <div class="form-row">
            <div class="form-group col-md-6">
              <label for="userEmail">Email</label>
              <input type="email" class="form-control" id="userEmail" name="userEmail">
              {!! $errors->first('userEmail', '<small style="color:red;">:message</small>') !!}
            </div>
            <div class="form-group col-md-6">
              <label for="userPassword">Password</label>
              <input type="password" class="form-control" id="passwordInput" name="userPassword">
              <input  type="checkbox" onclick="TogglePassword()">Show Password
              {!! $errors->first('userPassword', '<small style="color:red;">:message</small>') !!}

            </div>

          </div>
          <!-- end User Email password -->

             <!-- User Mobile-->
           <div class="form-row">
            <div class="form-group col-md-5">
              <label for="userMobile">Mobile</label>
              <input type="number" class="form-control" id="userMobile" name="userMobile">
              {!! $errors->first('userMobile', '<small style="color:red;">:message</small>') !!}
            </div>
             <!-- end user Mobile  -->
             <!-- user Address  --> 
            <div class="form-group col-md-7">
              <label for="userPassword">Address</label>
              <input type="text" class="form-control" id="userAddress" name="userAddress">
             
              {!! $errors->first('userAddress', '<small style="color:red;">:message</small>') !!}

            </div>

          </div>
          <!-- end User Address -->


          <!-- branches -->
          <div class="form-row">
            <div class="form-group col-md-12">
               <select id="userBranch" class="form-control" name="userBranch">
                @foreach ($branches as $branch)
                 <option value="{{$branch->id}}">{{$branch->name}}</option>
                 @endforeach
               </select>
             {!! $errors->first('userBranch', '<small style="color:red;">:message</small>') !!}

            </div>
          </div>
          <!-- end branches -->

          <!-- paper -->
          <div class="form-row">
            @foreach ($papers as $paper)
            <div class="form-group col-md-6">
              <label for="userPassword">{{$paper->name}}</label>
              <input type="file" class="form-control" id="file{{$paper->id}}" name="file{{$paper->id}}">
            </div>
            @endforeach
          </div>
        <!-- end paper -->
       
          <br>
          <button type="submit" class="btn btn-primary float-right">Add</button>
      </form>
    </div>
  </div>
 </div>
</div>
 <!-- End of user section -->
@endsection
