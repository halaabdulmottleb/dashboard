function deleteTask() {
	var count =  $(".count").val();
	 $(".task"+count).remove();
	
	  $(".count").val(count-1);
	  var newCount =  $(".count").val();
	  if (newCount==1 ) {
	  		 $(".deleteButtonSection").empty();
	  }

}
  