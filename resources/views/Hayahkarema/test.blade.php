@extends('Dashboard.structure')
@section('dashboard_CSS')

@endsection
@section('structure_content') 
<!-- first row -->
		

   <div class= "row"> 
          <div class="col-md-12">

	      			
	      	    <a href="#section1" class="btn btn-warning rounded-circle"  id="button1" onclick="activeIN(1)" > 1</a>
                  
	      	    <a href="#section2" class="btn btn-warning rounded-circle"  id="button2" onclick="activeIN(2)" > 2</a>
                  
	      	    <a href="#section3" class="btn btn-warning rounded-circle"  id="button3"  onclick="activeIN(3)"> 3</a>
                 
	      	    <a href="#section4" class="btn btn-warning rounded-circle"  id="button4" onclick="activeIN(4)"> 4</a>
			    
	      	    <a href="#section5" class="btn btn-warning rounded-circle"  id="button5" onclick="activeIN(5)" > 5</a>
	      	    
	      	    <a href="#section6" class="btn btn-warning rounded-circle"  id="button6"  onclick="activeIN(6)"> 6</a>
			    
	      	    <a href="#section7" class="btn btn-warning rounded-circle"  id="button7" onclick="activeIN(7)" > 7</a>
	      	    <a href="#section8" class="btn btn-warning rounded-circle"  id="button8" onclick="activeIN(8)" > 8</a>
	      				
	      	        
	      </div>
	</div> 
	<br> 
	
	<div class="row" > 
	<div class="col-md-12"> 
	<!-- first section --> 
	<div class="row" id="section1">
		<!-- bynat t3refya  -->
		<div class="col-md-12"  id ="section1" >
			<div class="card  card text-white bg-dark" style= "background-color: #343a40">
              <h5 class="card-header text-center" style="color: white">
					البيانات التعريفية
			  </h5>
              <div class="card-body" style= "padding : 5%">
              	<form style="text-align: right">
            <div id="Section1">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">محافظة</label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">قسم / مركز </label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputPassword4" >
                </div>
              </div>
                          
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">القرية / الشياخة  </label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">الوحدة الاجتماعية </label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputPassword4" >
                </div>
              </div>


               <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputEmail4">اسم المستفيد </label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" >
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputEmail4"> العنوان بالتفصيل  </label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" >
                </div>
              </div>
              <!-- check if have mobile phone -->

               <div class="form-row" id="mobileInput" >
                <div class="form-group col-md-6">
                  <label for="inputEmail4"> أرضي  </label>
                  <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" >
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4"> موبايل  </label>
                  <input style="text-align: right" type="text" class=" form-control form-control-sm" id="inputPassword4" >
                </div>
              </div>
    
            </div>
          </form>
              </div>
			  <button class="float-right btn btn-success">تحديث</button>
            </div>
		</div>
		<!-- end bynat t3refya -->
			
	</div>
	<div class="row mt-4" id="section2">
	<!-- family members -->
		<div class="col-md-12 mt-4">
			<div class="card text-center card text-white bg-dark" >
              <div class="card-header">
                أفراد الأسرة  
                   <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#task">اضافة فرد جديد للعائلة </button>
				   
                  				
				           

              </div>
              <div class="card-body ">
                <table class="table" style="color: white">
                   <thead>
                     <tr>
                       <th scope="col">#</th>
                       <!-- name -->
                       <th scope="col">اسم </th>
                       <!-- relatives -->
                       <th scope="col">صلة القرابة </th>
                       <!-- learning -->
                       <th scope="col">نوع </th>
                       <!-- status -->
                       <th scope="col">الحلة الاجتماعية </th>
                        <!-- work -->
                       <th scope="col"> العمل </th>
                       
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                      
                       <td>Mark</td>
                       <td>Otto</td>
                       <td>@mdo</td>
                       <td>Mark</td>
                       <td>Otto</td>
                       <td>@mdo</td>
                       

                     </tr>
                     <tr>
                      
                       <td>Jacob</td>
                       <td>Thornton</td>
                       <td>@fat</td>
                       <td>Jacob</td>
                       <td>Thornton</td>
                       <td>@fat</td>
                       
                     </tr>
                     <tr>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                        <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       
                     </tr>
                     <tr>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       
                     </tr>
                     <tr>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                        <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       
                     </tr>
                     <tr>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                        <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       
                     </tr>
                     <tr>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                        <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       
                     </tr>
                     <tr>
                       <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                        <td>Larry</td>
                       <td>the Bird</td>
                       <td>@twitter</td>
                       
                     </tr>

                   </tbody>

                 </table>
              </div>
            </div>
		</div>
	 <!-- endfamily members -->
	 
	
	 </div>
	 <!-- End second section members -->
	 
	 
	 <!--  third section members -->
	 
	 <div class="row" id="section3">
	 	<div class="col-md-12 mt-4">
			<div class="card text-center card text-white bg-dark">
              <div class="card-header text-center">
                خصائص مسكن الأسرة والممتلكات 

                 <button class="float-right btn btn-success">submit data</button>
              </div>
              <div class="card-body">
              	<form> 
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                  	<!--  -->
                  	<tbody style="text-align: right">
                    <tr>
                  		<th style="background-color: grey">ملكية المسكن </th>
                  		<th style="background-color: grey">نوع المسكن </th>
                  		<th style="background-color: grey"> عدد حجرات المسكن  </th>
                  		<th style="background-color: grey"> مساحة  </th>
                    </tr>
                    <tr>
                  		<td>
                           <select class="custom-select" >
                              <option selected>إيجار </option>
                              <option value="1">تمليك</option>
                              <option value="2">أخرى </option>
                            </select>
                  		</td>
                  		<td style="text-align:right ">
                           <select class="custom-select">
                              <option selected>عشة</option>
                              <option value="1">غرفة مستقلة او أكثر </option>
                              <option value="2">غرفة في وحدة سكنية </option>
                              <option value="3">منزل ريفي</option>
                              <option value="3">شقة مستقلة</option>
                              <option value="3">فيلا أو أكثر من شقة </option>
                              <option value="3">أخرى </option>
                            </select>
                  		</td>
                  		<td>
                           <input  type="text"  class="form-control" id="staticEmail">
                  		</td>
                  		<td>
                           <input  type="text"  class="form-control" id="staticEmail">
                  		</td>
                    </tr>
                    <tr>
                  		<th style="background-color: grey">نوع حوائط المسكن </th>
                  		<th style="background-color: grey">نوع أرضية المسكن</th>
                  		<th style="background-color: grey">المادة المستخدمة في سقف المنزل </th>
                  		<th style="background-color: grey">نوع سقف المسكن </th>
                  		
                    </tr>
                    <tr>
                  		<td>
                            <select class="custom-select">
                              <option selected>طوب وأسمنت / مسلح / حجارة </option>
                              <option value="1">اخرى</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>اسمنت</option>
                              <option value="1">خشب / قنالتكس / فينيل</option>
                              <option value="2">ترابية أو أخرى </option>
                              <option value="3">بلاط / رخام / سيراميك</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>جريد وقش</option>
                              <option value="1">طين </option>
                              <option value="2">الواح خشبيه</option>
                              <option value="3">الاسمنت المسلح</option>
                              <option value="3">الواح صاج</option>
                              <option value="3">اخرى </option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>اسمنت</option>
                              <option value="1">خشب / قنالتكس / فينيل </option>
                              <option value="2">أخرى </option>
                            </select>
                  		</td>
                    </tr>
                    
                    <tr>
                  		<th style="background-color: grey">  المادة المستخدمة فى جوائط المنزل  </th>
                  		<th style="background-color: grey">اتصال المسكن بالمياة ؟</th>
                  		<th style="background-color: grey">نوع دورة المياه</th>
                  		<th style="background-color: grey">وجود دورة مياة ؟ </th>
                  		
                    </tr>
                    <tr>
                  		<td>
                            <select class="custom-select">
                              <option selected>الطوب اللبن</option>
                              <option value="1">الطوب الأحمر والطين</option>
                              <option value="2">الطوب الأحمر والاسمنت</option>
                              <option value="3">الطوب الأبيض والأسمنت</option>
                              <option value="3">محارة </option>
                              <option value="3">أخرى </option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>حنفية داخل المنزل</option>
                              <option value="1">حنفية خارج المنزل</option>
                              <option value="2">غير متصل</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>أفرنجي سيفون </option>
                              <option value="1">بلدي سيفون</option>
                              <option value="2">بلدي بدون سيفون</option>
                              <option value="3">أخرى</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>خاصة </option>
                              <option value="1">مشتركة </option>
                              <option value="2">لا يوجد</option>
                            </select>
                  		</td>
                    </tr>
                    
                    <tr>
                  		<th style="background-color: grey">مصدر الماه</th>
                  		<th style="background-color: grey">نوع الوقود المستخدم في المطبخ ؟</th>
                  		<th style="background-color: grey">وجود مطبخ ؟ </th>
                  		<th style="background-color: grey">أيه نوع الصرف الصحي ؟</th>
                  		
                    </tr>
                    <tr>
                  		<td>
                            <select class="custom-select">
                              <option selected>شبكة عامة </option>
                              <option value="1">طلمبة</option>
                              <option value="2">اخرى</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>بوتجاز </option>
                              <option value="1">غاز طبيعي</option>
                              <option value="2">كروسين</option>
                              <option value="3">كهرباء</option>
                              <option value="3">اخرى</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>خاصة </option>
                              <option value="1">مشتركة</option>
                              <option value="2">لا يوجد</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>شبكة عامة</option>
                              <option value="1">شبكة خاصة </option>
                              <option value="2">ترنش</option>
                              <option value="3">لا يوجد</option>
                            </select>
                  		</td>
                    </tr>
                    
                    <tr>
                  		<th style="background-color: grey">رقم بطاقة التموين </th>
                  		<th style="background-color: grey">هل المنزل متصل بالكهرباء</th>
                  		<th style="background-color: grey">هل توجد لدي الاسرة بطاقة تموين مميكنة ؟ </th>
                  		<th style="background-color: grey">وسيلة جمع القمامة ؟ </th>

                  		
                    </tr>
                    <tr>
                  		<td>
                            <input  type="text"  class="form-control" id="staticEmail">
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>متصل</option>
                              <option value="1">غير متصل</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>نعم</option>
                              <option value="1">لا</option>
                            </select>
                  		</td>
                  		<td>
                            <select class="custom-select">
                              <option selected>جامع القمامة </option>
                              <option value="1">شركة </option>
                              <option value="2">أخرى</option>
                            </select>
                  		</td>
                    </tr>
                    </tbody>
                  </table>
              </form>

              </div>
            </div>
		</div>
	 </div>
	 <!-- end  third section members -->

	 
	 <div class="row mt-4" id="section4">
	 	<!-- momtlkaat el osra -->
	 	<div class="col-md-12">
	 		<div class="card text-center card text-white bg-dark">
               <div class="card-header">
                 ممتلكات الأسرة 
                 <button class="float-right btn btn-success">submit data</button>
               </div>
               <div class="card-body">
                 <form>
	 			   <select class="custom-select" multiple>
                      <option selected>تلاجة</option>
                      <option value="1">تكييف</option>
                      <option value="2">طيور داجنة (دواجن / بط / اوز / ارانب ) </option>
                      <option value="3">سرير</option>
                      <option value="3">كنب</option>
                      <option value="3">ايجار اراض زراعية</option>
                      <option value="3">تاكسي</option>
                      <option value="3">سيارة نصف نقل </option>
                      <option value="3">  رؤوس ماشية  </option>
                      <option value="3">  بطاطين  </option>
                      <option value="3">  مروحة  </option>
                      <option value="3">  توكتوك  </option>
                      <option value="3">  جرار زراعي  </option>
                      <option value="3">  أغنام / ماعز  </option>
                      <option value="3">  تليفزيون ملون  </option>
                      <option value="3">  دش / وصلة دش   </option>
                      <option value="3"> دولاب   </option>
                      <option value="3"> سيارة اجرة    </option>
                      <option value="3"> موتوسيكل / تريسيكل    </option>
                      <option value="3"> سيارة خاصة     </option>
                      <option value="3"> تليفون أرضي     </option>
                      <option value="3"> كمبيوتر     </option>
                      <option value="3"> سخان للمياه      </option>
                      <option value="3"> مطبخ     </option>
                      <option value="3"> اسطوانة بوتجاز     </option>
                    </select>
  	 		     </form>
               </div>
             </div>
	 		
              <!-- end -->
	 	</div>
	 	
	 </div>

   

    <div class="row mt-4" id="section5">
	 	<!-- mshro3at el osra -->
	 	<div class="col-md-12">
	 		 <div class="card text-center card text-white bg-dark">
               <div class="card-header">
                 مشروعات الأسرة 
                 <button class="float-right btn btn-success">submit data</button>
               </div>
               <div class="card-body">
                 <form>
                 	<!-- projects  -->
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                   	<tr>
                   		<td> <input type="checkbox" id="401CheckBox" onchange="valueChanged()"> </td>
                   		<td style="background-color: grey">
                   			فيه حد أو أكثر من أفراد الأسرة بيمتلك أو بيشارك في مشروع مثل دكان بقالة / مشرع حرفي أو تجاري أو خدمي ؟ 
                   		 </td>
                   	</tr>

                     </table>
                        <br>
                        <!-- table on 405 question  -->
                        <div id="405" style="display: none">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2" >
                         	<tr id="405">
                         		<td style="background-color: grey"> الدخل الشهري المتولد تقريبا  </td>
                         		<td style="background-color: grey"> نوع المشروع</td>
                         		<td style="background-color: grey"> نشاط المشروع</td>
                         		<td style="background-color: grey"> العدد </td>
                         		
                         	</tr>
      					    <tr>
                         		<td>
                         			<input  type="text"  class="form-control" id="staticEmail">
                         		</td>
                         		<td>
                         			<input  type="text"  class="form-control" id="staticEmail">  

                         		</td>
                         		<td> 
                         		     <select class="custom-select">
                                        <option selected>مشروع تجاري</option>
                                        <option value="1">مشروع حيواني</option>
                                        <option value="2">مشروع حرفي</option>
                                        <option value="3">أخرى</option>
                                      </select>     

                                 </td>
                         		<td>
                         			<input  type="text"  class="form-control" id="staticEmail">
     							</td>
                         		
                         	</tr>     
                          </table>
                     	</div>
                     	<!-- end of projects -->
                   	 <!-- qard in projects  -->
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                   	<tr>
                   		<td> <input type="checkbox" id="405CheckBox" onchange="valueChanged()"> </td>
                   		<td style="background-color: grey">
                   			في حالة توافر فرصة اقراض هل ترغب في الحصور على قرض ؟ 
                   		 </td>
                   	</tr>

                     </table>
                        <br>
                        <!-- table on 405 question  -->
                        <div id="406" style="display: none">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2" >
                         	<tr >
                         		<td style="background-color: grey"> هتاخد القرض ليه ؟</td>
                         		
                         		
                         	</tr>
      					    <tr>
                         		
                         		<td>
                         			 <select class="custom-select">
                                        <option selected>مشروع </option>
                                        <option value="1">تسديد ديون </option>
                                        <option value="2">زواج ابناء </option>
                                        <option value="3">أجراء عمليه</option>
                                        <option value="3">بناء دور بالمنزل</option>
                                        <option value="3">تجديد / صيانة المنزل</option>
                                      </select>     

                         		</td>
                         		
                         	</tr>     
                          </table>
                     	</div>
                     	<!-- end of projects -->
  	 		     </form>
                   </div>
               </div>

             </div>
              <!-- end -->
	 	</div>

	 	 
	 	<!-- msadr da5l el osra -->
	 <div class="row mt-4" id ="section6">
	 	<div class="col-md-12">
	 		<div class="card text-center card text-white bg-dark">
               <div class="card-header">
                 خامسا  : مصادر دخل الأسرة 
                 <button class="float-right btn btn-success">submit data</button>
               </div>
               <div class="card-body">
               	  <div class="row">
               	  	<div class="col-md-8 offset-md-2">
                	      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <input type="checkbox" id="401CheckBox" class="form-control" onchange="valueChanged()">
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text">الأجور والمرتبات ثابته ؟  </span>
                            </div>
                          </div>
                	</div>
                	<div class="col-md-8 offset-md-2">
                	      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <input type="checkbox" id="401CheckBox" class="form-control" onchange="valueChanged()">
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text">الأجور والمرتبات ثلبتة ؟ </span>
                            </div>
                          </div>
                	</div>
                	<div class="col-md-8 offset-md-2">
                	      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <input type="checkbox" id="401CheckBox" class="form-control" onchange="valueChanged()">
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text">الأجور والمرتبات ثلبتة ؟ </span>
                            </div>
                          </div>
                	</div>
                	<div class="col-md-8 offset-md-2">
                	      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <input type="checkbox" id="401CheckBox" class="form-control" onchange="valueChanged()">
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text">الأجور والمرتبات ثلبتة ؟ </span>
                            </div>
                          </div>
                	</div>
                	<div class="col-md-8 offset-md-2">
                	      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <input type="checkbox" id="401CheckBox" class="input-group" onchange="valueChanged()">
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text"> الاجور ثابتة ؟  </span>
                            </div>
                          </div>
                	</div>
                	
               	  </div>
               </div>
             </div>
	 	</div>
	 </div>
	 	<!--  end msadr da5l el osra -->
	 	
	 	<!-- el tkafol el egtma3y -->
	  <div class="row mt-4" id ="section7">
	 	<div class="col-md-12">
	 		 <div class="card text-center card text-white bg-dark">
               <div class="card-header">
                  سابعا : التكافل الاجتماعي 
                 <button class="float-right btn btn-success">submit data</button>
               </div>
               <div class="card-body">
                 <form>
                 	<!-- projects  -->
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                   	<tr>
                   		<td> <input type="checkbox" id="701CheckBox" onchange="valueChanged()"> </td>
                   		<td style="background-color: grey">
                   			هل االاسرة بتاخد اي مساعدة من  جهة خيريه  او افراد ؟ 
                   		 </td>
                   	</tr>

                     </table>
                        <br>
                        <!-- table on 405 question  -->
                        <div id="702" style="display: none">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2" >
                         	<tr >
                         		<td style="background-color: grey"> المساعدة دي نقطيه ولا عينية ولا رعاية صحيه </td>
                         		<td style="background-color: grey"> نوع المساعدة (منتظمة ) </td>
                         		
                         	</tr>
      					    <tr>
                         		<td>
                         			 <select class="custom-select">
                                        <option selected>نقدية </option>
                                        <option value="1">عينيه</option>
                                        <option value="2">نقدية وعينيه</option>
                                        <option value="3">رعاية صحيه</option>
                                      </select>     

                         		</td>
                         		<td> 
                         		     <select class="custom-select">
                                        <option selected> شهرية </option>
                                        <option value="1">موسمية </option>
                                        <option value="2">سنوية</option>
                                        <option value="3">غير منتظمة</option>
                                      </select>     

                                 </td>
                         		
                         	</tr>     
                          </table>
                     	</div>
                     	<!-- end of projects -->
                   	 <!-- qard in projects  -->
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                   	<tr>
                   		<td> <input type="checkbox" id="704CheckBox" onchange="valueChanged()"> </td>
                   		<td style="background-color: grey">
                   	   هل استفدت من مشروعات الجمعيات /  المؤسسات الخيريه ؟ 
                   		 </td>
                   	</tr>

                     </table>
                        <br>
                        <!-- table on 405 question  -->
                        <div id="704" style="display: none">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="2" >
                         	<tr >
                         		<td style="background-color: grey">ماهي الجمعيات / المؤسساتت الي استفدت منها ؟ </td>
                         		
                         		
                         	</tr>
      					    <tr>
                         		
                         		<td>
                         			 <select class="custom-select">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>     

                         		</td>
                         		
                         		
                         		
                         	</tr> 
                         	 <tr >
                         		<td style="background-color: grey">ما مجالات المؤسسات من هذه الجمعيات / المءسسات ؟  </td>
                         		
                         		
                         	</tr>
      					    <tr>
                         		
                         		<td>
                         			 <select class="custom-select">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>     

                         		</td>
                         		
                         		
                         		
                         	</tr> 
                         	  

                          </table>
                     	</div>
                     	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="2">
                            <tr >
                                 		<td style="background-color: grey">أيه اهم الاحتياجات الي انت شايف انك محتاجها ؟ </td>
                                 		
                                 		
                                 	</tr>
              					    <tr>
                                 		
                                 		<td>
                                 			 <select class="custom-select">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>             

                                 		</td>
                                 		
                                 		
                                 		
                                 	</tr>         

                         </table>
                     	<!-- end of projects -->
                   	 

  	 		     </form>
                   </div>
               </div>

             </div>
         </div>
		 <!-- review section -->
		 <div class="row" id="section8"> 
			 <!-- visits members -->
	            <div class="col-md-6 mt-2">
	            	<div class="card text-center card text-white bg-warning">
                         <div class="card-header">
                          الزيارات
                         </div>
                         <div class="card-body" style="color: white">
                           <img src="https://img.icons8.com/cute-clipart/64/000000/lock.png"/>
                         </div>
                       </div>
                </div>
	         	<!-- end visits members -->
	         	
	         		<!-- setions  --> 
	           <div class="col-md-6 mt-2">
	          	<div class="card  card text-white bg-warning">
                       <div class="card-header text-center">
	         				الاقسام 
                       </div>
                       <div class="card-body" style="color: white">
                         <p class="card-text" >البيانات التعريفية   <span class="float-right" style="background-color: green"> Done</span></p>
                         <p class="card-text" >افراد الأسرة </p>
                         <p class="card-text" >خصائص الأسرة   </p>
                         <p class="card-text" >ممتلكات الأسرة <span class="float-right" style="background-color: green"> Done</span></p>
                         <p class="card-text">مشروعات الأسرة</p>
                         <p class="card-text" >مصادر دخل الأسرة</p>
                         <p class="card-text" >التكافل الاجتماعي</p>
                       </div>
                 </div>
               </div>
	         <!-- setions  --> 
			
		 
		 </div>
	</div>
	
	
	</div>
	 	<!-- end el tkafol el egtma3y -->
		
		 <!-- Modal -->
                <div class="modal fade" id="task" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form style="text-align: right" id ="memberForm"  style="text-align : right">
						  @csrf
                           
                            <input type="hidden">
                            <div id="Section1">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="memberName">اسم </label>
                                  <input style="text-align: right" type="text" class="form-control" id="memberName" name="memberName" >
                                </div>
                              </div>
                                          
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="seltelqraba"> صلة القرابة برب الأسرة  </label>
                                  <td>
                         			 <select class="custom-select" name= "seltelqraba">
                                        <option value="رب الأسرة">رب الأسرة </option>
                                        <option value="زوج / زوجة"> زوج / زوجة </option>
                                        <option value="ابن / ابنة">ابن / ابنة </option>
                                        <option value="أب / أم">أب / أم </option>
                                        <option value="حفيد /ة">حفيد /ة  </option>
                                        <option value="زوج أم / زوجة أب"> زوج أم / زوجة أب </option>
                                      </select>     

                         		 </td>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="gender">نوع  </label>
                                   <td>
                         			 <select class="custom-select" name="gender">
                                        <option value="أنثى">أنثى </option>
                                        <option value="ذكر"> ذكر </option>
                                       
                                      </select>     

                         		 </td>
                                </div>
                              </div>
		                    <div class="form-row">
                             
                                <div class="form-group col-md-12">
                                  <label for="education">تعليم</label>
                                  <select class="custom-select" id="edyctionInput" name="eduction">
                                        <option value=" أقل من السن"> أقل من السن </option>
                                        <option value="أمي"> أمي</option>
                                        <option value="يقرأ ويكتب">يقرأ ويكتب </option>
                                        <option value="ف سن المدرسة ويدرس ">ف سن المدرسة ويدرس  </option>
                                        <option value="أقل من المتوسط">أقل من المتوسط   </option>
                                        <option value="فوق المتوسط"> فوق المتوسط  </option>
                                        <option value="ف سن الجامعة ويدرس">ف سن الجامعة ويدرس </option>
                                        <option value="جامعي فأعلى"> جامعي فأعلى   </option>
                                      </select>
                                </div>
                            </div>
							<!-- eduction section -->
							<div class="border border-danger p-3" id="memberEductionSection" style= "display :none ;"> 
							   
							      	<div class="form-row">
							      		<div class="form-group col-md-12">
							      		<label for="education">اسباب ترك التعليم </label>
							      		<select class="custom-select" name="leavingEDuctionReason" >
							      			@foreach($reasones as $reasone)
							      				<option value="{{$reasone->code}}">  {{$reasone->code}} - {{$reasone->reason}}</option>
							      			@endforeach
							      			
							      			</select>
							      		</div>
                                      </div>
							      
							     
							        <div class="form-row">
                                       <div class="form-group col-md-12">
                                        <div class="form-check">
                                           <input type="checkbox" class="form-check-input" id="refuseEductionCheck" name="refuseEductionCheck" onchange="valueChanged()">
                                           <label class="form-check-label" for="exampleCheck1">لو توفرت فرصة العليم هل توافق على التعليم ؟ 
                                         </div>
                                      </div>
                                    </div>
							        
							         <div class="form-row" id= "whyNotEductionSection" style="display:none">
                                   
                                      <div class="form-group col-md-12">
                                        <label for="education">لماذا لا توافق ع التعليم  </label>
                                        <select class="custom-select" name="whyNoteductionReason">
							      	    @foreach($reasones as $reasone)
                                              <option value="{{$reasone->code}}">   {{$reasone->code}} - {{$reasone->reason}}</option>
							      		@endforeach
                                             
                                            </select>
                                      </div>
                                     </div>
							          <div class="form-row">
                                       <div class="form-group col-md-12">
                                        <label for="status">الحالة الاجتتماعيه  </label>
                                           <select class="custom-select" name="status" >
                                              <option value="أقل من السن"> أقل من السن </option>
                                              <option value="اعزب"> اعزب </option>
                                              <option value="متزوج"> متزوج  </option>
                                              <option value="مطلق"> مطلق  </option>
                                              <option value="ارمل"> ارمل   </option>
                                              <option value="هجر">  هجر  </option>
                                              <option value="انفصال (للاقباط ) ">   انفصال (للاقباط )   </option>
                                              <option value="عقد قران">  عقد قران   </option>
                                            </select>
                                       </div>
                                      </div>
									  <br> 
							    
							</div>
							
							
							  <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="workMemberCheck" name="workMemberCheck" onchange="valueChanged()" >
                                     <label class="form-check-label" for="exampleCheck1">هل يعمل ؟   
                                   </div>
                                </div>
                              </div>
							  
							  <!-- workSectionMember-->
							<div id="workSectionMember" style="display:none " class="border border-danger p-3">
							  
							  
							        <div class="form-row">
                                      <div class="form-group col-md-12">
                                       <label for="status">طبيعة حالة العمل   </label>
                                          <select class="custom-select" name="typeOfwork">
                                             <option value="بأجر  ومؤمن عليه "> بأجر  ومؤمن عليه  </option>
                                             <option value="لحسابه وغير مؤمن عليه"> لحسابه وغير مؤمن عليه  </option>
                                             <option value="ا يعمل سابقا او حاليا"> لا يعمل سابقا او حاليا  </option>
                                             <option value="خارج قوة العمل / القوة البشرية"> خارج قوة العمل / القوة البشرية    </option>
                                             <option value="تطوع بجمعيات أهلية">  تطوع بجمعيات أهلية   </option>
                                             <option value="لدى الاسرة بدون اجر">   لدى الاسرة بدون اجر    </option>
                                           </select>
                                      </div>
                                    </div>
									
									<div class="form-row">
                                      <div class="form-group col-md-12">
                                       <label for="status">الانتظام في العمل</label>
                                          <select class="custom-select" name="entzamel3ml">
                                             <option value="دائم">دائم </option>
                                             <option value="بعض الوقت"> بعض الوقت </option>
                                             <option value="غير دائم"> غير دائم  </option>
                                             <option value="موسمي"> موسمي </option>
                                            
                                           </select>
                                      </div>
                                    </div>
									
									<div class="form-row">
                                      <div class="form-group col-md-12">
                                       <label for="status">قطاع العمل </label>
                                          <select class="custom-select" name="qeta3el3ml">
                                             <option value="حكومي / عام"> حكومي / عام </option>
                                             <option value="خاص / استثماري / مشترك"> خاص / استثماري / مشترك  </option>
                                             <option value="خارج المنشئات"> خارج المنشئات  </option>
                                             <option value="جمعيات اهليه"> جمعيات اهليه   </option>
                                           </select>
                                      </div>
                                    </div>
									
									<div class="form-row">
                                      <div class="form-group col-md-12">
                                        <label for="memberName">المهنة الرئيسية للفرد </label>
                                        <input style="text-align: right " type="text" class="form-control" name="elmhna" >
										<small style="color:grey"> اذكر المهنة بالتفصيل  </small>
                                      </div>
                                    </div>
									
									<div class="form-row">
                                      <div class="form-group col-md-12">
                                       <label for="status">قطاع النشاط الاقتصادي </label>
                                          <select class="custom-select" name="qeta3elnshat">
                                             <option value="الزراعة">الزراعة  </option>
                                             <option value="القطاع الغذائي والاغذية المصنعة"> القطاع الغذائي والاغذية المصنعة   </option>
                                             <option value="القطاع الصناعي"> القطاع الصناعي </option>
                                             <option value="القطاع التجاري">القطاع التجاري  </option>
                                             <option value="القطاع التجاري">القطاع التجاري  </option>
                                             <option value="القطاع الخدمي وقطاع التشييد والبناء">القطاع الخدمي وقطاع التشييد والبناء  </option>
                                             <option value="اعمال حرفيه">اعمال حرفيه </option>
                                           </select>
                                      </div>
                                    </div>
									
							  </div>
							  
							   <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="skillsCheck"  name="skillsCheck" onchange="valueChanged()" >
                                     <label class="form-check-label" for="exampleCheck1">هل الفرد لديه مهارات عمليه اخرى ولا يمارسها ؟   </label>
                                   </div>
                                </div>
                              </div>
							  <div id="skillsMemberSection" style="display:none" class="border border-danger p-3">
							  
							    <div class="form-row">
                                  <div class="form-group col-md-12">
                                   <label for="status">مهارات  </label>
                                      <select class="custom-select" name="workSkill">
								 	 @foreach($skills as $skill)
                                         <option value="{{$skill->code}}">   {{$skill->code}} - {{$skill->skill}}</option>
                                        @endforeach
                                       </select>
                                  </div>
                                 </div>
							    
							     <div class="form-row">
                                   <div class="form-group col-md-12">
                                    <label for="status">التامينات الاجتماعيه </label>
                                       <select class="custom-select" name="t2menat">
                                          <option value="مشترك"> مشترك </option>
                                          <option value="مستفيد"> مستفيد  </option>
                                          <option value="مشترك ومستفيد"> مشترك ومستفيد   </option>
                                          <option value="غير مشترك وغير مستفيد"> غير مشترك وغير مستفيد </option>
                                         
                                        </select>
                                  </div>
                                </div>
							  </div>
							  
							  <div id="skillsMemberSectionQ" class="border border-danger p-3">
								  <div class="form-row">
                                     <div class="form-group col-md-12">
                                      <div class="form-check">
                                         <input type="checkbox" class="form-check-input" id="newskillCheck" name="newskillCheck" >
                                         <label class="form-check-label" for="newskillCheck"> هل يرغب فى تعلم مهارة جديدة   </label>
                                       </div>
                                   </div>
                              </div>
							  
							  </div>
							  
							   <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="t2menatCheck" name ="t2menatCheck" >
                                     <label class="form-check-label" for="exampleCheck1">
										هل يوجد تأمين صحي
									</label>								 
                                   </div>
                                </div>
                              </div>
							  
							  
							  <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="diseaseCheck" name="diseaseCheck" onchange="valueChanged()">
                                     <label class="form-check-label" for="exampleCheck1">
										هل الفرد يعاني من أمراض مزمنة 
									</label>								 
                                   </div>
                                </div>
                              </div>
							  
							   <div class="form-row border border-danger p-3" style="display:none "  id="diseaseMemberSection">
                                 <div class="form-group col-md-12">
                                  <label for="status">حدد المرض المزمن </label>
                                     <select class="custom-select" name="disease">
									  @foreach($diseases as $disease)
                                        <option value="{{$disease->code}}"> {{$disease->code}} - {{$disease->Disease}}   </option>
                                       @endforeach
                                      </select>
                                </div>
                              </div>
							  
							   <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="e3aqaCheck" name="e3aqaCheck">
                                     <label class="form-check-label" for="e3aqaCheck">
										هل الفرد يعاني من أي إعاقة ؟ 
									</label>								 
                                   </div>
                                </div>
                              </div>
							  
							 <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="msgonCheck" name="msgonCheck">
                                     <label class="form-check-label" for="msgonCheck">
										مسجون 
									</label>								 
                                   </div>
                                </div>
                              </div>
							  
                            </div>
                            <!-- end firstSection -->
                            <button type="submit" class="btn btn-primary" id = "memberSubmit" >Submit</button>

                         </form>
                      </div>
                    </div>
                  </div>
	 	

 
 @endsection
 @section('dashboard_scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	 <!-- slider scriot -->
	 
	 <script> 
		$( document ).ready(function() {
		   $("#section1").show();
		   $("#section2").hide();
		   $("#section3").hide();
		   $("#section4").hide();
		   $("#section5").hide();
		   $("#section6").hide();
		   $("#section7").hide();
		   $("#section8").hide();
		  
		});
	 </script> 
	 
	 
	 
    <script type="text/javascript">
 	 function valueChanged() 

    {
      // mobile toggle
        if($('#401CheckBox').is(":checked"))   
            $("#405").show();
        else
            $("#405").hide();
       if($('#405CheckBox').is(":checked"))   
            $("#406").show();
        else
            $("#406").hide();
       if($('#701CheckBox').is(":checked"))   
            $("#702").show();
        else
            $("#702").hide();
		if($('#704CheckBox').is(":checked"))   
            $("#704").show();
        else
            $("#704").hide();
		
		if($('#workMemberCheck').is(":checked"))   
            $("#workSectionMember").show();
        else {
			$('#workSectionMember').hide();
		}
		if($('#skillsCheck').is(":checked")) {  
            $("#skillsMemberSection").show();
		    $("#skillsMemberSectionQ").hide();}
        else {
			$('#skillsMemberSection').hide();
			$('#skillsMemberSectionQ').show();
		}
		if($('#diseaseCheck').is(":checked"))   
            $("#diseaseMemberSection").show();
        else {
			$('#diseaseMemberSection').hide();
		}
		if($('#refuseEductionCheck').is(":checked"))   
            $("#whyNotEductionSection").hide();
        else {
			$('#whyNotEductionSection').show();
		}
		
		
		
    }
	
	<!-- --> 
	
	function activeIN (sectionNumber) {

      for (i = 1; i <= 8; i++) {

        if(i == sectionNumber) {
             $("#section" + i).show();
        }else {
            $("#section" + i).hide();   

             }
        }
       
      
    }
	
	

 </script>
 <!--  show hide sections on modal select -->
 
 <script> 
  
  $('#edyctionInput').on('change', function() {
      if (this.value  == "أمي" || this.value  == "يقرأ ويكتب" || this.value  == "أقل من المتوسط") 
		{
			$('#memberEductionSection').show();
		}else {
				
				$('#memberEductionSection').hide();
			
		}
   });
 
 </script>
 
 <script> 
	<!-- submit family member by ajax --> 
	function validateForm(){
		
		var error = 0 ; 
		
		//validate name 
		if($('#memberName').val() == '' ) 
		{
			$('#memberName').after('<small style="color:red"> ادخل الاسم  </small>');
			 error ++ ; 
			
		}
		
		return error ;

	
		
	}
	$('#memberForm').on('submit',function(event){
		var error ; 
		
		error = validateForm();  
		
        event.preventDefault();
        var name = $("input[name=memberName]").val();
        var seltelqraba = $("select[name=seltelqraba]").val();
        var gender = $("select[name=gender]").val();
        var eduction = $("select[name=eduction]").val();
        var leavingEDuctionReason = $("select[name=leavingEDuctionReason]").val();
        var status = $("select[name=status]").val();
        var typeOfwork = $("select[name=typeOfwork]").val();
        var entzamel3ml = $("select[name=entzamel3ml]").val();
        var qeta3el3ml = $("select[name=qeta3el3ml]").val();
        var elmhna = $("input[name=elmhna]").val();
        var qeta3elnshat = $("select[name=qeta3elnshat]").val();
        var workSkill = $("select[name=workSkill]").val();
        var t2menat = $("select[name=t2menat]").val();
        var disease = $("select[name=disease]").val();
	
		if($('#skillsCheck').is(":checked")) 
			var skillsCheck = 1;
		else 
			var skillsCheck = 0;
		if($('#workMemberCheck').is(":checked")) 
			var workMemberCheck = 1;
		else 
			var workMemberCheck = 0;
		if($('#msgonCheck').is(":checked")) 
             var msgonCheck = 1;
	   else
		   var msgonCheck = 0;
	   
		if($('#diseaseCheck').is(":checked")) 
             var diseaseCheck = 1;
	   else
		   var diseaseCheck = 0;
	   
		if($('#e3aqaCheck').is(":checked")) 
             var e3aqaCheck = 1;
	   else
		   var e3aqaCheck = 0;
	   if($('#t2menatCheck').is(":checked")) 
             var t2menatCheck = 1;
	   else
		   var t2menatCheck = 0;
	   if($('#newskillCheck').is(":checked")) 
             var newskillCheck = 1;
	   else
		   var newskillCheck = 0;
	   if($('#refuseEductionCheck').is(":checked")) 
             var refuseEductionCheck = 1;
	   else
		   var refuseEductionCheck = 0;
	   
	   
		
		console.log(name);
		console.log(seltelqraba);
		console.log(gender);
		console.log(eduction);
		
		console.log(leavingEDuctionReason);
		console.log(refuseEductionCheck);
		console.log(status);
		console.log(typeOfwork);
		console.log(entzamel3ml);
		console.log(eduction);		
	    console.log(elmhna);
		console.log(qeta3elnshat);
		console.log(workSkill);
		console.log(t2menat);
		console.log(disease);
		
		console.log(skillsCheck);
		console.log(workMemberCheck);
		console.log(t2menatCheck);
		console.log(diseaseCheck);
		console.log(e3aqaCheck);
		console.log(msgonCheck);
		
		
		
		 $.ajaxSetup({
                headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
			});
         $.ajax({
          url: "/dashboard/addFamily/addmember",
		  type: "POST",
          dataType: 'JSON',
          data:{ name: name , seltelqraba: seltelqraba, gender: gender, eduction: eduction , leavingEDuctionReason: leavingEDuctionReason , refuseEductionCheck : refuseEductionCheck , status: status , typeOfwork: typeOfwork, entzamel3ml : entzamel3ml , elmhna: elmhna, qeta3elnshat: qeta3elnshat , workSkill : workSkill , t2menat : t2menat , disease : disease, skillsCheck : skillsCheck , workMemberCheck : workMemberCheck , t2menatCheck : t2menatCheck , diseaseCheck : diseaseCheck , e3aqaCheck : e3aqaCheck , msgonCheck : msgonCheck
          },
		
          success:function(response){
            console.log(response);
          },
         });
		 
		
        
	});
 
 </script>
 @endsection 