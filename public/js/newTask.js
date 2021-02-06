$(document).ready(function(){
  $(".addNewTask").click(function(){
	var count =  $(".count").val();
    count++;
  	var elem = '<div class ="task'+count+'">'+
  					 '<hr style="  border: 1px solid black;">'+
                      '  <div class="form-row">'+
                         ' <div class="form-group col-md-12">'+
                            '<label for="taskInput"><b>Task'+count+ '</b> </label>'+
                            '<br> <br>'+
                           ' <input type="text" class="form-control" id="taskInput"   name="taskInput' +count+'" required >'+
                         ' </div>'+
                        '</div>'+
                      
                      '  <div class="form-row">'+
                         ' <div class="form-group col-md-12">'+
                           ' <input type="datetime-local" class="form-control" id="date" name="date' +count+'" required>'+
                          ' </div>'+
                          '</div>'+

              
                   
                       ' <div class="form-row">'+
                          '<div class="form-group col-md-12">'+
                           ' <label for="inputEmail4">Urgency</label>'+
                            '<select id="disabledSelect" class="form-control" name="urgency' +count+'" required>'+
                                ' <option style="color: red" value="2">Important</option>'+
                              '   <option style="color: orange" value="1">less Important</option>'+
                                ' <option style="color: green" value="0">Normal</option>'+
                          '  </select>'+
                       '   </div>'+
                        '</div> </div>'  ;
  			 $(".newTasksSection").append(elem);
  	    $(".deleteButtonSection").empty();
  		elem2='<a style="color:white" class="btn btn-danger float-right" onclick="deleteTask('+count+')"><i class="fa fa-trash"></i></a>';
  	 			 $(".deleteButtonSection").append(elem2);
  	   $(".count").val(count);
              
   
  });




});