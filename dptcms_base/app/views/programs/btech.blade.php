@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
		<div>
			<div class="col-sm-8">
				<h3 class="dpt-text-dark">{{$getprogdetails->program_name}}</h3>
			</div>
			<div class="col-sm-4">
				<ol class="breadcrumb pull-right">
				  <li>Program</li>
				  <li class="active">{{$getprogdetails->program_name}}</li>
				</ol>
			</div>
		</div>
		<div class="col-sm-12 line line-solid"></div>
		<div class="col-sm-12" style="padding-top: 20px">
			<div>
				<h5 class="dpt-text-dark"><b>Program Overview</b></h5>
			</div>
			<div>
				{{$getprogdetails->overview}}
			</div>
		</div>
		<div class="col-sm-12" style="padding-top: 20px">
			<div>
				<h5 class="dpt-text-dark"><b>Selection Process</b></h5>
			</div>
			<div>
				{{$getprogdetails->selection}}
			</div>
		</div>
		<div class="col-sm-12" style="padding-top: 20px">
			<div>
				<h5 class="dpt-text-dark"><b>Structure of the Program</b></h5>
			</div>
			<div>
				{{$getprogdetails->strictureofprogram}}
			</div>
		</div>
		<div class="col-sm-12" style="padding-top: 20px;">
			<aside class="bg-white-only">
				<?php
				$courseexist = Course::where('course_program_id','=',$getprogdetails->id)->get();
				if(count($courseexist)){
					$getallyear=Course::groupBy('course_year')->orderBy('course_year','DESC')->where('course_program_id','=',$getprogdetails->id)->get();
					$getcoursedetails=Course::where('course_program_id','=',$getprogdetails->id)->where('course_year','=',$getallyear[0]['course_year'])->get();
					?>
<!--					<div class="col-sm-12 m-t" style="">
						<label class="pull-left" style="width:100%;">Select a Year		<select class="form-control inline" style="width: 20%;" id="changebatch" data-sem="{{$getprogdetails->program_total_sem}}">
					            @foreach($getallyear as $val)
					            	<option value="{{$val->course_year}}">{{$val->course_year}}</option>	
					            @endforeach
					        </select>
				        </label>
					</div> EDITED OFF BY NARAYANAN -->
					<header class="">
					    <ul class="nav nav-tabs" id="programmenutab">
						    @for($i=1;$i<$getprogdetails->program_total_sem;$i++)
								<li class="sem"><a href="#tab{{$i}}" data-toggle="tab">Semester {{$i}}</a></li>
							@endfor
<li class="sem"><a href="#tab{{$i}}" data-toggle="tab">Electives</a></li> <!--# EDITED by NARAYANAN to add elective tab.-->
					    </ul>
					</header>
					<div class="tab-content" id="programmenudetails">
					    @for($i=1;$i<=$getprogdetails->program_total_sem;$i++)
							<div class="tab-pane tabclass" id="tab{{$i}}">
								<?php
								// $getallyear=Course::groupBy('course_year')->orderBy('course_year','DESC')->where('course_program_id','=',$getprogdetails->id)->where('course_sem','=',$i)->get();
								$getcoursedetails=Course::where('course_program_id','=',$getprogdetails->id)->where('course_sem','=',$i)->where('course_year','=',$getallyear[0]['course_year'])->get();
								?>
								<!-- <div class="col-sm-12 m-t" style="">
									<label class="pull-left" style="width:100%;">Select a Batch								
										<select class="form-control inline" style="width: 20%;" id="changebatch" data-sem="{{$i}}">
								            @foreach($getallyear as $val)
								            	<option value="{{$val->course_year}}">{{$val->course_year}}</option>	
								            @endforeach
								        </select>
							        </label>
									
								</div> -->
								<div class="col-sm-6" style="padding: 20px;">
				                  <section class="panel">
				                    <table class="table table-striped m-b-none text-sm">
				                      <thead>
				                        <tr class="dpt-text-dark">
				                          <th>Course No.</th>
				                          <th>Course Name</th>                    
				                          <th>Credit</th>
				                          <th></th>
				                        </tr>
				                      </thead>

				                      <tbody id="courselistbyyear">
				                      	@foreach($getcoursedetails as $val)
				                      		<tr>                    
					                          <td>
					                            {{$val->course_no}}
					                          </td>
					                          <td>
					                          	<a href="{{url('program/course/'.$val->id)}}" class="viewcourse" data-coursename="{{$val->course_no.' '.$val->course_name}}">{{$val->course_name}}</a>
					                          </td>
					                          <td>
					                            {{$val->course_credit}}
					                          </td>
					                          <td><a href="{{url('program/course/'.$val->id)}}" class="viewcourse btn btn-xs btn-info" data-coursename="{{$val->course_no.' '.$val->course_name}}">View</a></td>
					                        </tr>
										@endforeach		                        
				                      </tbody>
				                    </table>
				                  </section>
				                </div>
				                <div class="col-sm-12">
				               	 <a class="btn dpt-btn-dark" data-href="{{url('program/syllabus/'.$getprogdetails->id)}}" id="viewsyllabus" data-title="{{$getprogdetails->program_name}}" data-year="{{$getallyear[0]['course_year']}}" data-sem="{{$i}}">View Curriculum</a>
				               	</div>
							</div> 
						@endfor
					</div>
				<?php
				}
				?>
			</aside>
		</div>
		
		<div class="col-sm-12" style="padding-top: 20px">
			<div>
				<h5 class="dpt-text-dark"><b>Career Prospects</b></h5>
			</div>
			<div>
				{{$getprogdetails->carrer}}
			</div>
		</div>
@stop

@section('modals')
@parent
	<!--Course View Modal -->
	<div class="modal fade" id="courseViewModal" tabindex="-1" role="dialog" aria-labelledby="courseViewModal" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <!-- <div class="modal-header">
	        
	        <h4 class="modal-title" id="course-name">Modal title</h4>
	      </div> -->
	      <div class="modal-body">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <div id="course_body">
	        	
	        </div>
	      </div>
	      <!-- <div class="modal-footer">
	        
	      </div> -->
	    </div>
	  </div>
	</div>

	<!--Syllabus View Modal -->
	<div class="modal fade" id="syllabusViewModal" tabindex="-1" role="dialog" aria-labelledby="syllabusViewModal" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="border-bottom:0px">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" style="font-weight:bold">
	        	<b id="program-title">Modal title</b> <span class="h4">( Semester</span><span id="syllabus-sem" class="h4"></span> <span class="h4">)</span> ----
	        	<span id="syllabus-year" class="h4" >
	        </h4>

	      </div>
	      <div class="modal-body" style="padding-top: 0px;">
	        <div id="syllabus_body">
	        	
	        </div>
	      </div>
	      <!-- <div class="modal-footer" style="padding: 6px;">
	        <div style="padding-bottom:20px">
				<a href="#" class="btn dpt-btn-dark pull-right" id="downloadSyllabus">Download</a>
			</div>
	      </div> -->
	    </div>
	  </div>
	</div>
@stop

@section('footer-scripts')
@parent
	<script type="text/javascript">
		// var path="{{url('program/courseofsemofyear')}}";
		// $("#changebatch").change(function(){
		// 	$.post(path+'/'+$(this).val(),{'progid':{{$getprogdetails->id}}, 'sem':$(this).attr("data-sem")},function(){

		// 	}).done(function(data){
		// 		$("#courselistbyyear").html(data);
		// 	});
		// });

		var path="{{url('program/courseofyear')}}";
		$("#changebatch").change(function(){
			var activeSem = $(".nav-tabs .active a").attr('href');
			$.post(path+'/'+$(this).val(),{'progid':{{$getprogdetails->id}}, 'progname':'{{$getprogdetails->program_name}}','sem':$(this).attr("data-sem")},function(){

			}).done(function(data){
				$("#programmenudetails").html(data);
				if (activeSem!='#tab1') {	
					$('#programmenutab a[href="#tab1"]').tab('show'); 
				}else{
					$('#programmenutab a[href="#tab2"]').tab('show'); 
				}			
			}).complete(function(){alert(activeSem);
				$('#programmenutab a[href='+activeSem+']').tab().trigger('click'); 
			});
		});

	</script>
@stop
