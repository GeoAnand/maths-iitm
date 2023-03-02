<div class="panel bg-light each-coursedetails" id="{{$val->id}}">
  <div class="panel-heading lter">				                    
        <a class="accordion-toggle block" data-toggle="collapse" data-parent="#courseList{{$i}}" href="#course{{$i.$j}}">
          <b class="">{{$val->course_no}}  -  {{$val->course_name}}</b> <span class="text-muted pull-right">Credits:{{$val->course_credit}}</span>
        </a>			                    
  </div>
  <div id="course{{$i.$j}}" class="panel-collapse collapse lt">
    <div class="panel-body text-sm">
    	<div class="courseDetails">
    		<a href="#" class="editCourseDetailsBtn btn btn-sm btn-info pull-right" data-course="course{{$i.$j}}"><i class="fa fa-edit fa-1x"></i> Edit Course Details</a>
        	<h4>{{$val->course_no.' '.$val->course_name}}</h4>
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
                        <input type="text" class="form-control" name="editProgramName" id="" value="{{$val->course_no}}" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Course Credits</label>
                      <div class="col-lg-10">
                        <input type="number" class="form-control" name="editProgramSemesters" id="" value="{{$val->course_credit}}" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Coursee Details</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" placeholder="Course Details">{{$val->course_details}}</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">References </label>
                      <div class="col-lg-10">
                        <textarea class="form-control" placeholder="References">{{$val->courser_reference}}</textarea>
                      </div>
                    </div>							                        
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="cancelEditingCourse btn btn-sm btn-default" data-course="course{{$i.$j}}"><i class="fa fa-times"></i> Cancel</button>
                        <button type="submit" class="saveCourseDetails btn btn-sm btn-success" data-course="course{{$i.$j}}"><i class="fa fa-check"></i> Save Changes</button>
                      	<button class="deleteCourse btn btn-sm btn-danger pull-right" data-course="course{{$i.$j}}"><i class="fa fa-trash-o"></i> Delete Course</button>
                      </div>
                    </div>
                  </form>
                </div>
            </section>
    	</div>
    </div>
  </div>
</div>
