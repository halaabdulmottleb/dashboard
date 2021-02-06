@extends('Dashboard.structure')

@section('structure_content') 
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header ">
        <div class="card-body">
          <form style="text-align: right" method="post"  action="{{route('addFamily')}}">
            @csrf
            <input type="hidden" name="project" value="{{$project}}">
            <div id="Section1">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="mohafza">محافظة</label>
                  <input style="text-align: right" type="text" class="form-control" id="mohafza" name="mohafza" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="markz">قسم / مركز </label>
                  <input style="text-align: right" type="text" class="form-control" id="markz" name="markz" >
                </div>
              </div>
                          
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="qarya">قرية / شياخة </label>
                  <input style="text-align: right" type="text" class="form-control" id="qarya" name="qarya">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">الوحدة الاجتماعية </label>
                  <input style="text-align: right" type="text" class="form-control" id="we7da" name="we7da">
                </div>
              </div>


               <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="mostafid">اسم المستفيد </label>
                  <input style="text-align: right" type="text" class="form-control" id="mostafid" name="mostafid" >
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="address">العنوان </label>
                  <input style="text-align: right" type="text" class="form-control" id="address" name="address" >
                </div>
              </div>
              <!-- check if have mobile phone -->
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="mobileCheckBox">  لديك رقم موبايل ؟  </label>
                      <input type="checkbox" id="mobileCheckBox" onchange="valueChanged()" name="mobileCheckBox">
                </div>
              </div>

               <div  id="mobileInput" style="display: none">
					 <div class="form-row">
						
						 <div class="form-group col-md-6">
							<label for="ardy"> ملاحظة  </label>
							<input style="text-align: right" type="text" class="form-control" id="ardy" placeholder="ملاحظة" name="ardy-note" >
						 </div>
						  <div class="form-group col-md-6">
							<label for="ardy"> أرضي  </label>
							<input style="text-align: right" type="text" class="form-control" id="ardy" name="ardy" >
						 </div>
					 </div>
					 <div class="form-row">
						
						<div class="form-group col-md-6">
							<label for="mobile"> ملاحظة  </label>
							<input style="text-align: right" type="text" class="form-control" id="mobile" name="mobile-note"placeholder="ملاحظة">
						</div>
						<div class="form-group col-md-6">
							<label for="mobile"> موبايل  </label>
							<input style="text-align: right" type="text" class="form-control" id="mobile" name="mobile">
						</div>
					 
					 </div>
			   
               
               
              </div>
    
            </div>
            <!-- end firstSection -->
            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

@endsection
@section('dashboard_scripts')
 <script type="text/javascript">

    function valueChanged() 

    {
      // mobile toggle
        if($('#mobileCheckBox').is(":checked"))   
            $("#mobileInput").show();
        else
            $("#mobileInput").hide();
    }
    // show hide section 
    function showHide (sectionNumber) {

      for (i = 1; i <= 4; i++) {

        if(i == sectionNumber) {

             $("#Section" + i).show();
             $("#button" + i).css('background-color','green');

        }else {

             $("#Section" + i).hide();
             $("#button" + i).css('background-color','yellow');     

             }
        }
       
      
    }

 </script>
 @endsection 
