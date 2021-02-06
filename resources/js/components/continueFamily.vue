<template>
	<div>
		{{member.e3aqaCheck}}
		<div class="row">
			<div class="col-md-12">
				<div class="row" id="section1" style="direction: rtl;">
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
                               <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" v-model="familyData.mohafza" >
                             </div>
                             <div class="form-group col-md-6">
                               <label for="inputPassword4">قسم / مركز </label>
                               <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputPassword4" v-model="familyData.markaz">
                             </div>
                           </div>
                                       
                           <div class="form-row">
                             <div class="form-group col-md-6">
                               <label for="inputEmail4">القرية / الشياخة  </label>
                               <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" v-model="familyData.qarya" >
                             </div>
                             <div class="form-group col-md-6">
                               <label for="inputPassword4">الوحدة الاجتماعية </label>
                               <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputPassword4" v-model="familyData.we7da" >
                             </div>
                           </div>             
             

                            <div class="form-row">
                             <div class="form-group col-md-12">
                               <label for="inputEmail4">اسم المستفيد </label>
                               <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" v-model="familyData.mostafid" >
                             </div>
                           </div>             

                           <div class="form-row">
                             <div class="form-group col-md-12">
                               <label for="inputEmail4"> العنوان بالتفصيل  </label>
                               <input style="text-align: right" type="text" class="form-control form-control-sm" id="inputEmail4" v-model="familyData.address">
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
	            <div class="row">
	            	<div class="col-md-12">
	            			<div class="row mt-4" id="section2">
                            	<!-- family members -->
                            		<div class="col-md-12 mt-4">
                            			<div class="card text-center card text-white bg-dark" >
                                          <div class="card-header">
                                            أفراد الأسرة  
                                               <button type="button" class="btn btn-success float-right" @click="addMember()">اضافة فرد جديد للعائلة </button>
                                               <!-- edafa fard  -->
0
                                          </div>
                                          <div class="card-body ">
                                            <table class="table" style="color: white ; direction: rtl;">
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
                                                  <tr v-for="member in familyMembers" v-bind:key="member.id">
														<td>{{member.id}}</td>
														<td>{{member.name}}</td>
														<td>{{member.seltelqraba}}</td>
														<td>{{member.gender}}</td>
														<td>{{member.status}}</td>
														<td>{{member.work}}</td>
													</tr>

                                               </tbody>                            

                                             </table>
                                          </div>
                                        </div>
                            		</div>
                            	 <!-- endfamily members -->
                            	 
                            	
                            	 </div>
                            	 <!-- End second section members -->                            	
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12">
	            	<!--  third section members -->
	 
                	 <div class="row" id="section3">
                	 	<div class="col-md-12 mt-4">
                			<div class="card text-center card text-white bg-dark">
                              <div class="card-header text-center">
                                خصائص مسكن الأسرة والممتلكات                 

                                 <button class="float-right btn btn-success">submit data</button>
                              </div>
                              <div class="card-body">
                              	<form style="direction: rtl;"> 
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
                	</div>
	            </div>

		    </div>
        </div>
				<!-- add member Modal --> 
			<div style=" direction: rtl;" class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
             <div class="modal-body">
                  <form style="text-align: right" id ="memberForm" @submit.prevent="addMember">
                    <input type="hidden">
                    <div id="Section1">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="memberName">اسم </label>
                            <input style="text-align: right" type="text" class="form-control" id="memberName" v-model="member.name">
                          </div>
                        </div>
                                          
                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="seltelqraba"> صلة القرابة برب الأسرة  </label>
                                <td>
                         	        <select class="custom-select" v-model= "member.seltelqraba">
                                     <option value="رب الأسرة">رب الأسرة </option>
                                     <option value="زوج / زوجة"> زوج / زوجة </option>
                                     <option value="ابن / ابنة">ابن / ابنة </option>
                                     <option value="أب / أم">أب / أم </option>
                                     <option value="حفيد /ة">حفيد /ة  </option>
                                        <option value="زوج أم / زوجة أب"> زوج أم / زوجة أب </option>
                                   </select>     

                         		       </td>
                             </div>
						</div>
						<div class="form-row">
                             <div class="form-group col-md-6">
                                <label for="gender">نوع  </label>
                                 <td>
                         			      <select class="custom-select" v-model="member.gender">
                                      <option value="أنثى">أنثى </option>
                                      <option value="ذكر"> ذكر </option>
                                       
                                    </select>     

                         		      </td>
                              </div>
                          </div>
		                    <div class="form-row">
                             
                                <div class="form-group col-md-12">
                                  <label for="education">تعليم</label>
                                  <select class="custom-select" id="edyctionInput" v-model="member.eduction">
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
							      		<select class="custom-select" v-model="member.leavingEDuctionReason" >
							      			
							      			
							      			</select>
							      		</div>
                                      </div>
							      
							     
							        <div class="form-row">
                                       <div class="form-group col-md-12">
                                        <div class="form-check">
                                           <input type="checkbox" class="form-check-input" id="refuseEductionCheck" v-model="member.refuseEductionCheck" onchange="valueChanged()">
                                           <label class="form-check-label" for="exampleCheck1">لو توفرت فرصة العليم هل توافق على التعليم ؟ 
                                           </label>
                                         </div>
                                      </div>
                                    </div>
							        
							         <div class="form-row" id= "whyNotEductionSection" style="display:none">
                                   
                                      <div class="form-group col-md-12">
                                        <label for="education">لماذا لا توافق ع التعليم  </label>
                                        <select class="custom-select" v-model="member.whyNoteductionReason">
							      	    
                                             
                                            </select>
                                      </div>
                                     </div>
							          <div class="form-row">
                                       <div class="form-group col-md-12">
                                        <label for="status">الحالة الاجتتماعيه  </label>
                                           <select class="custom-select" v-model="member.status" >
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
                                     <input type="checkbox" class="form-check-input" id="workMemberCheck" v-model="member.workMemberCheck" onchange="valueChanged()" >
                                     <label class="form-check-label" for="exampleCheck1">هل يعمل ؟   </label>
                                   </div>
                                </div>
                              </div>
							  
							  <!-- workSectionMember-->
							<div id="workSectionMember" style="display:none " class="border border-danger p-3">
							  
							  
							        <div class="form-row">
                                      <div class="form-group col-md-12">
                                       <label for="status">طبيعة حالة العمل   </label>
                                          <select class="custom-select" v-model="member.typeOfwork">
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
                                          <select class="custom-select" v-model="member.entzamel3ml">
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
                                          <select class="custom-select" v-model="member.qeta3el3ml">
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
                                        <input style="text-align: right " type="text" class="form-control" v-model="member.elmhna" >
										<small style="color:grey"> اذكر المهنة بالتفصيل  </small>
                                      </div>
                                    </div>
									
									<div class="form-row">
                                      <div class="form-group col-md-12">
                                       <label for="status">قطاع النشاط الاقتصادي </label>
                                          <select class="custom-select" v-model="member.qeta3elnshat">
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
                                     <input type="checkbox" class="form-check-input" id="skillsCheck"  v-model="member.skillsCheck" >
                                     <label class="form-check-label" for="exampleCheck1">هل الفرد لديه مهارات عمليه اخرى ولا يمارسها ؟   </label>
                                   </div>
                                </div>
                              </div>
							  <div id="skillsMemberSection" style="display:none" class="border border-danger p-3">
							  
							    <div class="form-row">
                                  <div class="form-group col-md-12">
                                   <label for="status">مهارات  </label>
                                      <select class="custom-select" v-model="member.workSkill">
								 	
                                       </select>
                                  </div>
                                 </div>
							    
							     <div class="form-row">
                                   <div class="form-group col-md-12">
                                    <label for="status">التامينات الاجتماعيه </label>
                                       <select class="custom-select" v-model="member.t2menat">
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
                                         <input type="checkbox" class="form-check-input" id="newskillCheck" v-model="member.newskillCheck" >
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
                                     <input type="checkbox" class="form-check-input" id="diseaseCheck" v-model="member.diseaseCheck" onchange="valueChanged()">
                                     <label class="form-check-label" for="exampleCheck1">
										هل الفرد يعاني من أمراض مزمنة 
									</label>								 
                                   </div>
                                </div>
                              </div>
							  
							   <div class="form-row border border-danger p-3" style="display:none "  id="diseaseMemberSection">
                                 <div class="form-group col-md-12">
                                  <label for="status">حدد المرض المزمن </label>
                                     <select class="custom-select" v-model="member.disease">
									  
                                      </select>
                                </div>
                              </div>
							  
							   <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="e3aqaCheck" v-model="member.e3aqaCheck">
                                     <label class="form-check-label" for="e3aqaCheck">
										هل الفرد يعاني من أي إعاقة ؟ 
									</label>								 
                                   </div>
                                </div>
                              </div>
							  
							 <div class="form-row">
                                 <div class="form-group col-md-12">
                                  <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="msgonCheck" v-model="member.msgonCheck">
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
          </div>
        </div>
		<!-- end add member Modal --> 

 

</template>
<script type="text/javascript">
    export default {
    	props: ['family'],
        data() {
            return {
			   familyData:[],
               familyMembers:[],
			   member:[],
                users: [],
                branches:[],
                userSelect: '',
                year:2020,
                tasks: [],
                papers: [],
                branch: '',
                tasksJunu: 0,
                tasksfeb:0 , 
                tasksMar: 0 , 
                tasksApr: 0 , 
                tasksMay: 0 , 
                tasksJun: 0 , 
                tasksJul: 0 , 
                tasksAug: 0 , 
                tasksSep: 0 , 
                tasksOct: 0 , 
                tasksNov: 0 , 
                tasksDec: 0,
                userAddress: '',
                user: {
                    name: '',
                    email: '',

                },
                delayedTasks :[],
                canceledTasks :[],
                doneTasks :[],
            }
        },

        methods: {

            Modal(){
              $("#myModal").modal();
            },
           
            fetchMembers() {
                axios.get(`/api/project/family/members/${this.family.id}`).then(res => {
                    if (res.status == 200) {
                        this.familyMembers = res.data;
                    }
                }).catch(err => {
                    console.log(err)
                });
            },

            addMember($member){
                fetch(`/api/project/family/members/add/${this.family.id}`, {
                       
                        method: 'post',
                        body: JSON.stringify(this.member),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(data => {                        
                            this.fetchMembers();
                        })
                        .catch(err => console.log(err));
            },


            updateUser() {
                fetch(`/api/editUser`, {
                    method: 'put',
                    body: JSON.stringify(this.userSelect),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                      
                        $('#modal').modal('hide')
                    })
                    .catch(err => console.log(err));
            }
        },

        created() {
            this.fetchMembers();    
			      this.familyData = this.family
       		
			
           
        },
            
        computed: {
          
 
	 	 }

	 }

</script>
