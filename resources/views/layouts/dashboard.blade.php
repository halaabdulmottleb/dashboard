<!DOCTYPE html>
<html>
<title>Mishkat Nour</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- nav css -->
<link rel="stylesheet" href="{{ asset('css/navStyle.css')}}">
<link rel="stylesheet" href="{{ asset('css/formStyle.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Xanh+Mono:ital@1&display=swap" rel="stylesheet">
@yield('dashboard_CSS')


<style>


html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif ; font-size: 11px}

td,th{
     white-space: nowrap;
}

.showTitle{
  

  transition: all ease-in-out 0.2s;
  cursor: pointer;
}
   
    .pie-chart {
    background:
      radial-gradient(
        circle closest-side,
        transparent 66%,
        white 0
      ),
      conic-gradient(
        #f00000 0,
        #f00000 18.3%,
        #1b7c0e 0,
        #1b7c0e 79.3%,
        #edc949 0,
        #edc949 87.8%,
        #b6b776 0,
        #b6b776 100%
    );
    position: relative;
    width: 100%;
    min-height: 350px;
    margin: 0;
    outline: 1px solid #ccc;
  }
  .pie-chart h2 {
    position: absolute;
    margin: 1rem;
  }
  .pie-chart cite {
    position: absolute;
    bottom: 0;
    font-size: 80%;
    padding: 1rem;
    color: gray;
  }
  .pie-chart figcaption {
    position: absolute;
    bottom: 1em;
    right: 1em;
    font-size: smaller;
    text-align: right;
  }
  .pie-chart span:after {
    display: inline-block;
    content: "";
    width: 0.8em;
    height: 0.8em;
    margin-left: 0.4em;
    height: 0.8em;
    border-radius: 0.2em;
    background: currentColor;
    /*H1 design*/
  }
    .ml2 {
  font-weight: 900;
  font-size: 3.5em;

}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
  color: grey;
}
/*online offline*/
.dot {
  height: 15px;
  width: 15px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
.square {
      height: 25px;
      width: 25px;
      
    }
    nav {
    font-family: 'Xanh Mono', monospace;
}





  
</style>
<body class="w3-light-grey">


<!-- Sidebar/menu -->
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" style= "background-color: #343a40">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                      </button>
                </div>
        <div class="p-4 pt-5">
          <!-- <h1><a href="index.html" class="logo">Mishkat Nour</a></h1> -->
          <ul class="list-unstyled components mb-5">
           <!--  <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
              </ul>
            </li> -->
    <!-- logout -->
    
      
      <a href="{{ route('logout') }}" class="w3-bar-item w3-button float-right showTitle" 
          onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" title="Logout"><i class="fa fa-sign-out" >
        </i>
      </a>
    

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
        </form>
    
    <br>
    <!-- end logout -->
          
             @if(Auth::user()->admin)
              <li>
    <a href="/Dashboard" >
       Dashboard
    </a>
  </li>
   <li>
    <a href="/dashboard/structure/statistics">
      Structure
    </a>
  </li>

     <li>
    <a href="/dashboard/showObjectives" >
      Objectives
    </a>
  </li>
   <li>
    <a href="/dashboard/showProject">
      <i class="fa fa-tasks "> </i> Projects
    </a>
  </li>
  <li>
    <a href="/dashboard/tasks">
      <i class="fa fa-tasks "> </i> All Tasks
    </a>
  </li>
  
   <li>
    <a href="/dashboard/showTasks" >
      <i class="fa fa-check "> </i> Done Tasks
    </a>
  </li>

   <li>
    <a href="/dashboard/task/follow-up/task">
      <i class="fa fa-check-square-o "> </i> pending 
    </a>
  </li>
  <li>
    <a href="/dashboard/structure/user/profiles">
      <i class="fa fa-users ">  </i> Profiles
    </a>
  </li>
  <li>
    <a href="/dashboard/papers">
      <i class="fa fa-check-square-o ">  </i> Papers
    </a>
  </li>
 <li>
    <a href="/dashboard/hierarchy">
      <i class="fa fa-check-square-o ">  </i>  HIERARCHY CHARTS 
    </a>
  </li>
  <li>
    <a href="/dashboard/project/family">
      <i class="fa fa-check-square-o ">  </i> FAMILIES 
    </a>
  </li>

    @else
    <!-- for USer -->
     <li>
    <a href="/dashboard/availableProject" >
       Profile
    </a>
    </li>
   

    @endif

            <!-- <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
            </li> -->
           
          </ul>

        <!--   <div class="mb-5">
            <h3 class="h6">Subscribe for newsletter</h3>
            <form action="#" class="colorlib-subscribe-form">
              <div class="form-group d-flex">
                <div class="icon"><span class="icon-paper-plane"></span></div>
                <input type="text" class="form-control" placeholder="Enter Email Address">
              </div>
            </form>
          </div> -->

        

        </div>
      </nav>
      

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      
        <div class="container">
            <div class="row" style="font-family: 'Xanh Mono', monospace; color: grey ; font-size: 15px">
                <b> @yield('dashboard_heading') </b>
            </div>
        </div>
        <hr>
         @yield('dashboard_content')

      </div>
    </div>





      @if(Session::has('fail'))
          <script type="text/javascript">
            alert('failuar');
            

          </script>                    
      @endif
      @if(Session::has('success'))
          <script type="text/javascript">
            alert('data is added successfully');
            

          </script>                    
      @endif

      @if(Session::has('exists'))
          <script type="text/javascript">
            alert('this email is exists');
            

          </script>                    
      @endif
      @if(Session::has('abilityexists'))
          <script type="text/javascript">
            alert('this ability is exists to this user');
            

          </script>                    
      @endif
      
      @if(Session::has('deleted'))
          <script type="text/javascript">
            alert('Deleted');
            

          </script>                    
      @endif
      @if(Session::has('updated'))
          <script type="text/javascript">
            alert('Updated');
            

          </script>                    
      @endif
      @if(Session::has('passwordChanged'))
          <script type="text/javascript">
            alert('password Changed');
            

          </script>                    
      @endif


       <!-- change password modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                         <!-- form to select from to data -->
                          <form method="post" action=" {{route('setPassword')}} ">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="inputEmail4">Password</label>
                                <input type="password" class="form-control" id="passwordInput" name="password" required >
                                <input  type="checkbox" onclick="TogglePassword()">Show Password
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">change</button>
                          </form>
                         <!--end form  -->
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- end change password modal -->

      
<!-- End of page content -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/newTask.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/task.js') }}"></script>
<!-- nav js -->
    <script src="{{ asset('js/nav/popper.js') }}"></script>
    <script src="{{ asset('js/nav/main.js') }}"></script>
<!-- end nav js -->

<!-- toggle password -->
<script type="text/javascript">
  function TogglePassword() {
  var checkPasswordBox = document.getElementById("passwordInput");
  if (checkPasswordBox.type === "password") {
    checkPasswordBox.type = "text";
  } else {
    checkPasswordBox.type = "password";
  }
}
</script>

<!-- end toggle Password -->
<script>

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";

  overlayBg.style.display = "none";
}

// search by input 
$("#statusFilterSelect").change( function() {
    var value = $( "#statusFilterSelect" ).val().toLowerCase();
    
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$("#fromDateFilter").change( function() {
    var fromDate = new Date($('#fromDateFilter').val());
    var toDate = new Date($('#toDateFilter').val());
    alert(fromDate);
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(fromDate) > -1)
    });
  });


</script>


<!-- add javascript -->



<!-- Status change inputs -->
<script type="text/javascript">

  $( "#target" ).change(function() {
  $('#statusSection').empty();
  var status = $(this).children('option:selected').val();
    var newDate    =  '<input type="datetime-local" name="lateDate" required > ' ;
    var alternativ =  '<input type="email" name="alternative" placeholder ="Enter User Email" required > ';
      if (status == 'late')  {
      
        $( "#statusSection" ).append(newDate);

      }else if(status == 'transfer') {
        $( "#statusSection" ).append(alternativ);

      }

    });
  
  
</script>
<!-- search -->
<script type="text/javascript">
  // search by see 

// search by input 
$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

</script>
<script type="text/javascript">
  // search by status



</script>





</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>



<!-- script  -->

 @yield('dashboard_scripts')

<!-- end script -->



</body>
</html>
