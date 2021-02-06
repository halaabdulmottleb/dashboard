<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Mishkat Nour</title>
    <style>
    .square {
      height: 25px;
      width: 25px;
      
    }
    @media window.print {
  .not-print  {
    display: none;
  }
 
}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row" class="not-print">
        <div class="col-md-4 offset-md-4 mt-4">
          <input class="form-control" id="myInput"  type="text" placeholder="">
        </div>
          <button class="btn btn-secondry mt-4 float-right" onclick={window.print()}><i class="fa fa-print" aria-hidden="true"></i></button>
      </div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <table class="table">
         <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Description</th>
                        <th scope="col">Urgency</th>
                        <th scope="col">Responsibility</th>
                        <th scope="col">Status</th>
                        <th scope="col"> Due date</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach($tasks as $task)
                      <tr>
                        <td> {{$task->id}}</td>
                        <td><a href="/dashboard/project/tasks/{{$task->project()->first()->id}}">  {{$task->project()->first()->name}} </a></td>
                        <td> {{$task->description}} </td>
                         <td>
                              @if($task->urgency == 0)
                                 <div class="square" style="background-color: green;"></div>


                               @elseif($task->urgency == 1)
                                 <div class="square" style="background-color: orange;"></div>


                               @else
                                 <div class="square" style="background-color: red;"></div>

                               @endif
                
                          </td>
                        <td>
                            <?php
                              $reps  = $task->tasks()->get();
                             ?>
                              
                             
                        <!-- RESPONSIBILTY DRO DOWN MENUE  -->
                            @foreach($reps as $res)
                                <a class="dropdown-item" href="/dashboard/profile/ {{$res->user()->first()->id}}"> {{$res->user()->first()->name}}
                                </a>
                                           
                            @endforeach
                        <!-- END RESPONSIBILTY  -->

                                 
                           
                        </td>
                        <td>
                          <?php
                          $paper = $task->task_papers()->first();
                          ?>
                         
                          <a href="/dashboard/task/downloadPaper/{{ $paper->destination}}"> 
                            <b> <i>{{$task->status}}</i> </b> 
                          </a>
                         
                           
                        </td>
                        <td> {{$task->dueDate}}</td>
                      </tr>
                     
                    @endforeach
                      
                    </tbody>
        </table>
        </div>
        
      </div>
      
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
    </script>
   
  </body>
</html>