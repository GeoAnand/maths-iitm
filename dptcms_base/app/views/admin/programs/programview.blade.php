@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - {{$getprogdetails->program_name}} | DeptCMS</title>
@stop

@section('content')

<div class="col-sm-12">
	<!-- .breadcrumb -->
	<ul class="breadcrumb">
		<li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    	<li><a href="{{url('admin/programs/dashboard')}}"><i class="fa fa-bars"></i> Programs</a></li>
		<li class="active"> {{$getprogdetails->program_name}}</li>
	</ul>
	<!-- / .breadcrumb -->

  <section class="panel" id="programPanel">
    
	<header class="panel-heading text-right bg-light">
        <ul class="nav nav-tabs pull-left" id="programTabs">
	      	<li class="active"><a href="#overview" data-toggle="tab">Program Overview</a></li>
		    @for($i=1;$i<$getprogdetails->program_total_sem;$i++)
				<li class=""><a href="#tab{{$i}}" data-toggle="tab">Semester-{{$i}}</a></li>
			@endfor
				<li class=""><a href="#tab{{$i}}" data-toggle="tab">Electives</a></li> <!--# EDITED NARAYANAN -->
	    </ul>
	    <span class="v-spacer-16"></span>
    </header>
    
    <div class="panel-body">
      	<div class="spinner-base">
	        <div class="tab-content" id="prograDetails">
			    <div class="tab-pane active" id="overview">		    	
			        <div id="programDetails">
			        	<a href="#" id="editProgramDetailsBtn" class="btn btn-sm btn-info pull-right"><i class="fa fa-edit fa-2x"></i> Edit Program Details</a>
				        <h3>{{$getprogdetails->program_name}}</h3>
				        <div class="m-t">
				        	<h5><b>Program Overview</b></h5>
				        	@if($getprogdetails->overview)
				        		{{$getprogdetails->overview}}					
							@else
								<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-program-details btn btn-xs btn-default">Add it Now</a></span>
							@endif

							<h5><b>Selection Process</b></h5>
							@if($getprogdetails->selection)
				        		{{$getprogdetails->selection}}					
							@else
								<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-program-details btn btn-xs btn-default">Add it Now</a></span>
							@endif

							<h5><b>Structure of the Program</b></h5>
							@if($getprogdetails->strictureofprogram)
				        		{{$getprogdetails->strictureofprogram}}					
							@else
								<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-program-details btn btn-xs btn-default">Add it Now</a></span>
							@endif
						 	
						 	<h5><b>Career Prospects</b></h5> <!--#EDITED NARAYANAN-->
							@if($getprogdetails->carrer)
				        		{{$getprogdetails->carrer}}					
							@else
								<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-program-details btn btn-xs btn-default">Add it Now</a></span>
							@endif

							<h5><b>No. of Semesters</b></h5>
							@if($getprogdetails->program_total_sem)
				        		{{$getprogdetails->program_total_sem-1}}		
							@else
								<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-program-details btn btn-xs btn-default">Add it Now</a></span>
							@endif

				<!--			<h5><b>Display Order</b></h5>
							@if($getprogdetails->inmenuposition)
				        		{{$getprogdetails->inmenuposition}}					
							@else
							@endif
							<br> EDITED NARAYANAN-->

							<h5><b>Other Details</b></h5>
							@if($getprogdetails->otherdetails)
				        		{{$getprogdetails->otherdetails}}	
							@else
								<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-program-details btn btn-xs btn-default">Add it Now</a></span>
							@endif
				        </div>
				    </div>
				    <div id="editProgramDetails" hidden="hidden">
				    	<section class="panel">
		                    <header class="panel-heading font-bold">
		                    	{{$getprogdetails->program_name}}
		                    	<!-- <a href="#programSettingsModal" class="pull-right" data-toggle="modal" id="programSettings"><i class="fa fa-cog fa-2x"></i></a> -->
		                    </header>
		                    <div class="panel-body">
		                      <form class="bs-example form-horizontal" action="{{url('admin/program/addprogram')}}" data-id="{{$getprogdetails->id}}" id="updateprogramdetails">	                      	
				                <div class="form-group">
		                          <label class="col-lg-2 control-label">Program Name</label>
		                          <div class="col-lg-10">
		                           <input type="text" class="form-control" name="editProgramName" id="editProgramName" value="{{$getprogdetails->program_name}}" required />
		                          </div>
		                        </div>
		                        <div class="form-group">
		                          <label class="col-lg-2 control-label">Program Overview</label>
		                          <div class="col-lg-10">
		                            <textarea class="form-control" placeholder="Program Overview" name="programOverview">{{$getprogdetails->overview}}</textarea>
		                          </div>
		                        </div>
		                        <div class="form-group">
		                          <label class="col-lg-2 control-label">Selection Process </label>
		                          <div class="col-lg-10">
		                            <textarea class="form-control" placeholder="Selection Process" name="selectionprocess">{{$getprogdetails->selection}}</textarea>
		                          </div>
		                        </div>
		                        <div class="form-group">
		                          <label class="col-lg-2 control-label">Structure of the Program </label>
		                          <div class="col-lg-10">
		                            <textarea class="form-control" placeholder="Structure of the Program" name="programstructure">{{$getprogdetails->strictureofprogram}}</textarea>
		                          </div>
		                        </div>
		                        <div class="form-group">
		                          <label class="col-lg-2 control-label">Career Prospects</label>
		                          <div class="col-lg-10">
		                            <textarea class="form-control" placeholder="Career Prospects" name="carrer">{{$getprogdetails->carrer}}</textarea>
		                          </div>
		                        </div>
		                        <div class="form-group">
		                          <label class="col-lg-2 control-label">No. of Semesters</label>
		                          <div class="col-lg-10">
		                            <input type="number" class="form-control" min="1" max="10" value="{{$getprogdetails->program_total_sem}}" required name="noofsemester">
		                          </div>
		                        </div>
		                        <div class="form-group">
					                <label class="col-lg-2 control-label">Display Order In menu</label>
					                <div class="col-lg-10">
					                  <input class="form-control" name="inmenuposition" placeholder="i.e. for 1'st position enter 1 " required value="{{$getprogdetails->orderinmenu}}">
					                </div>
					            </div>
					            <div class="form-group">
								    <label class="col-lg-2 control-label">Other Details</label>
								    <div class="col-lg-10">
									  	<div id="otherdetails" class="form-control summernote">
									      {{$getprogdetails->otherdetails}}
						                </div>
						            </div>
								</div>
		                        <div class="form-group">
		                          <div class="col-lg-offset-2 col-lg-10">
		                            <button id="cancelEditingProgram" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Cancel</button>
		                            <button type="submit" id="saveProgramDetails" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Save Changes</button>
		                            <button id="deleteProgram" data-id="{{$getprogdetails->id}}" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash-o"></i> Delete Program</button>
		                          </div>
		                        </div>
		                      </form>
		                    </div>
		                </section>
				    </div>
			    </div>
			    @for($i=1;$i<=$getprogdetails->program_total_sem;$i++)
					<div class="tab-pane" id="tab{{$i}}">
						<?php
						$getcoursedetails=Course::where('course_program_id','=',$getprogdetails->id)->where('course_sem','=',$i)->get();
						?>
						
						<!-- .accordion -->
			              <div class="panel-group m-b" id="courseList{{$i}}">
			              	
				              	@if($getcoursedetails->count())		              		
						              	<?php $j = 0; ?>
						                @foreach($getcoursedetails as $val)
							                <div class="panel bg-light each-coursedetails" id="{{$val->id}}">
							                  <div class="panel-heading lter">				                    
								                    <a class="accordion-toggle block" data-toggle="collapse" data-parent="#courseList{{$i}}" href="#course{{$i.$j}}">
								                      <b class="">{{$val->course_no}}  -  {{$val->course_name}}  -  ({{$val->course_year}})</b> <span class="text-muted pull-right">Credits:{{$val->course_credit}}</span>
								                    </a>			                    
								              </div>
							                  <div id="course{{$i.$j}}" class="panel-collapse collapse lt">
							                    <div class="panel-body text-sm">
							                    	<div class="courseDetails">
							                    		<a href="#" class="editCourseDetailsBtn btn btn-sm btn-info pull-right" data-course="course{{$i.$j}}"><i class="fa fa-edit fa-1x"></i> Edit Course Details</a>
								                    	<h4>{{$val->course_no.' '.$val->course_name}}</h4>
								                    	<h5><b>Course Year</b> - <span>{{$val->course_year}}</span></h5>
								                    	<h5><b>Course Details</b></h5>
								                    	@if($val->course_details)
											        		<p class="m-t">{{$val->course_details}}</p>				
														@else
															<span class="text-muted">Sorry! No Content added for this section. 
															<!-- <a href="#" class="add-course-details btn btn-xs btn-default">Add it Now</a> --></span>
														@endif

								                    	<h5><b>References</b></h5>
								                    	@if($val->courser_reference)
											        		<p class="m-t">{{$val->courser_reference}}</p>				
														@else
															<span class="text-muted">Sorry! No Content added for this section. 
															<!-- <a href="#" class="add-course-details btn btn-xs btn-default">Add it Now</a> --></span>
														@endif
							                    	</div>
							                    	<div class="editCourseDetails" hidden="hidden">
							                    		<section class="panel">
										                    <header class="panel-heading font-bold">
										                    	Edit Course Details
										                    	<!-- <a href="#courseSettingsModal" class="pull-right" data-toggle="modal" id="courseSettings"><i class="fa fa-cog fa-2x"></i></a> -->
										                    </header>
										                    <div class="panel-body">
										                      <form class="bs-example form-horizontal" id="updateCoursedetails" data-id="{{$val->id}}">						                        
												                <div class="form-group">
										                          <label class="col-lg-2 control-label">Course Name</label>
										                          <div class="col-lg-10">
										                            <input type="text" class="form-control" name="editCourseName" id="" value="{{$val->course_name}}" required />
										                          </div>
										                        </div>
										                        <div class="form-group">
										                          <label class="col-lg-2 control-label">Course Code</label>
										                          <div class="col-lg-10">
										                            <input type="text" class="form-control" name="courseCode" id="" value="{{$val->course_no}}" required />
										                          </div>
										                        </div>
										                        <div class="form-group">
										                          <label class="col-lg-2 control-label">Course Credits</label>
										                          <div class="col-lg-10">
										                            <input type="number" class="form-control" name="courseCredit" id="" value="{{$val->course_credit}}" required />
										                          </div>
										                        </div>
										                        <div class="form-group">
										                          <label class="col-lg-2 control-label">Course Year</label>
										                          <div class="col-lg-10">
										                            <input type="text" class="form-control" disabled placeholder="{{$val->course_year}}" name="courseYear" vlue="{{$val->course_year}}" />
										                          </div>
										                        </div>
										                        <div class="form-group">
										                          <label class="col-lg-2 control-label">Course Details</label>
										                          <div class="col-lg-10">
										                          	<!-- <div name="courseDetails" id="ecourseDetails" class="summernote">
											                          {{$val->course_details}}
											                        </div> -->
										                            <textarea class="form-control" placeholder="Course Details" name="courseDetails">{{$val->course_details}}</textarea>
										                          </div>
										                        </div>
										                        <div class="form-group">
										                          <label class="col-lg-2 control-label">References </label>
										                          <div class="col-lg-10">
										                            <textarea class="form-control" placeholder="References" name="courseref">{{$val->courser_reference}}</textarea>
										                          </div>
										                        </div>							                        
										                        <div class="form-group">
										                          <div class="col-lg-offset-2 col-lg-10">
										                            <button class="cancelEditingCourse btn btn-sm btn-default" data-course="course{{$i.$j}}"><i class="fa fa-times"></i> Cancel</button>
										                            <button type="submit" class="saveCourseDetails btn btn-sm btn-success" data-course="course{{$i.$j}}"><i class="fa fa-check"></i> Save Changes</button>
										                          	<button class="deleteCourse btn btn-sm btn-danger pull-right" data-course="course{{$i.$j}}" data-id="{{$val->id}}"><i class="fa fa-trash-o"></i> Delete Course</button>
										                          </div>
										                        </div>
										                      </form>
										                    </div>
										                </section>
							                    	</div>
							                    </div>
							                  </div>
							                </div>
							                <?php $j++; ?>
										@endforeach
									
								@else
									<span class="text-muted">Sorry! No Course added for this Program. <a href="#" class="add-course btn btn-xs btn-default" data-whichprogram="{{$getprogdetails->id}}" data-whichsem="{{$i}}">Add it Now</a></span>
								@endif
							
			              </div>
			            <!-- / .accordion -->
						<div align="center"><a class="btn btn-success add-course" href="#" data-whichprogram="{{$getprogdetails->id}}" data-whichsem="{{$i}}"> + Add Course</a></div>
					</div> 
				@endfor
			</div>
		</div>
    </div>
    
  </section>
</div>
@stop

@section('page-modals')
<!-- Modal -->
<div class="modal fade" id="addCourseModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal">&times;</button>
      		<h3 class="modal-title">Add New Course</h3>
      	</div>
        <div class="modal-body">	    	
          <div class="row spinner-base">	        
            <div class="col-sm-12">
	            <div class="modal-flash-message alert modal-error-message" hidden="hidden">
		            <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
		            <span class="modal-flash-message-text"></span>
		        </div>
	            <form class="form-horizontal" role="form" method="post" action="{{url('admin/programs/addcourse')}}" id="addCourseForm">
	            	<input type="hidden" name="whichprogram" id="whichprogram">
		    		<input type="hidden" name="whichsem" id="whichsem">
	                <div class="form-group">
	                  <label class="col-lg-2 control-label">Course Name</label>
	                  <div class="col-lg-10">
	                    <input type="text" class="form-control" placeholder="Course Name" name="coursename" id="coursename" required>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label class="col-lg-2 control-label">Course No.</label>
	                  <div class="col-lg-10">
	                    <input type="text" class="form-control" placeholder="Course No." name="courseno" id="courseno" required>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label class="col-lg-2 control-label">Course Credits</label>
	                  <div class="col-lg-10">
	                    <input type="number" class="form-control" min="1" max="10" placeholder="Course Credits" name="coursecredit" id="coursecredit" required>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label class="col-lg-2 control-label">Course Year</label>
	                  <div class="col-lg-10">
	                    <input type="number" class="form-control" placeholder="Course Year" name="courseyear" id="courseyear" required>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label class="col-lg-2 control-label">Course Details</label>
	                  <div class="col-lg-10">
	                    <input type="text" class="form-control" placeholder="Course Details" name="coursedetails" id="coursedetails" required>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label class="col-lg-2 control-label">Course Reference</label>
	                  <div class="col-lg-10">
	                    <textarea class="form-control" name="courseref" id="courseref" placeholder="Course Reference" rows="5" required></textarea>
	                  </div>
	                </div>	                
	                <div class="form-group">
	                  <div class="col-lg-offset-2 col-lg-10">
	                  	<button class="btn btn-sm btn-default" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
	                    <button type="submit" class="btn btn-sm btn-success" id="addCourseBtn"><i class="fa fa-check"></i> Add Course</button>
	                  </div>
	                </div>
	            </form>
            </div>            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@stop
