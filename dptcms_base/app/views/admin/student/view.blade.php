@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Student | DeptCMS</title>
@stop

@section('content')
	<?php
		$getprogdetails=Programs::find($progid);
	?>


<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}" class="link"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/student/dashboard')}}" class="link"><i class="fa fa-male"></i> Student</a></li>
    <li class="active"> {{$getprogdetails->program_name}}</li>
  </ul>
  <!-- / .breadcrumb -->

  	<section class="panel">    
	    <header class="panel-heading font-bold">
	        Student Listing
	    </header>
	    
	    <div class="panel-body">
			<section class="panel">
		        <header class="panel-heading">
		          Links
		          <a href="{{url('admin/student/addstudent')}}" class="pull-right btn btn-primary btn-xs add-link-btn"><i class="fa fa-plus"></i> Add a Student</a>
		          <a href="#" class="pull-right btn btn-info btn-xs m-l m-r" style="margin-right: 10px;" id="importstudent" data-id="{{$progid}}"><i class="fa fa-upload"></i> Import from file</a>
		          <a href="{{url('excel/imports/sample/student.xls')}}" class="pull-right btn btn-xs btn-default btn-xs m-l" id="importstudentsample"><i class="fa fa-file"></i> Sample File</a>
		          <a href="#" class="pull-right btn btn-xs btn-danger" id="deleteselectedstudent"><i class="fa fa-trash-o"></i> Delete</a>

		        </header>	
		        <div class="row">
		        	<div class="col-sm-6">	        		
		        		<div align="right" class="m-t m-b">Year : 
							<select class="form-control inline" style="width: 20%;" id="changeyear" data-progid="{{$progid}}">
					            	<option value="1">1st Year</option>
					            	<option value="2">2nd Year</option>
					        </select>
						</div>

		        	</div>
		        	<div class="col-sm-6">
		        		<form class="form-inline" role="form" action="javascript:void(0)">
							<div class="form-group has-feedback pull-left m-t m-b">
								<input type="text" class="form-control" id="studentsearch" placeholder="Search student">
								<span class="fa fa-search form-control-feedback"></span>
							</div>
						</form>
		        	</div>
		        </div>
				
		        <div class="table-responsive">
		          <table class="table table-striped b-t text-sm">
		            <thead>
		              <tr>
		              	<th><input type="checkbox" name="selectallstudent" /></th>
		                <th width="62">S. No.</th>
		                <th class="th-sortable" data-toggle="class">Student Name
		                  <span class="th-sort">
		                    <i class="fa fa-sort-down text"></i>
		                    <i class="fa fa-sort-up text-active"></i>
		                    <i class="fa fa-sort"></i>
		                  </span>
		                </th>
		                <th>Roll Number</th>
		                <th width="">Delete</th>
		              </tr>
		            </thead>
		            <tbody id="studentlistbyyear">
		              	@if(count($getallstudent))
		                  	<?php 
		                  		//$getstudentbyyear=Student::where('student_program_id','=',$progid)->where('student_year','=',$getallstudent[0]['student_year'])->get();

		                  		$i=1;
		                  	?>
	                  		@foreach($getfirstyearstudent as $val)
			                  	<tr> 
			                  		<td>
			                  			<input type="checkbox" name="selectstudent" data-id="{{$val['id']}}"/>
			                  		</td>                 
			                      	<td>
			                     		{{$i}} 
			                      	</td>
			                      	<td>
			                      		{{$val->student_name}}
			                      	</td>
			                      	<td>
			                       		{{$val->student_rollno}}
			                      	</td>
			                      	<td>
					                	<a href="#" class="btn btn-xs btn-danger deletestudent" data-id="{{$val['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
					                	<a href="#" class="btn btn-xs btn-info editstudent" data-id="{{$val['id']}}"><i class="fa fa-edit"></i> Edit</a>
					                </td>
			                    </tr>
		                    	<?php $i++ ?>
	                    	@endforeach
	              		@endif	              
		            </tbody>
		          </table>
		        </div>	        
		    </section>
		</div>
	</section>
</div>

<!-- Import Modal -->
<div class="modal fade" id="ImportDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Import list from .Xls file</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" id="uploadDatafromfileform">
        	<div class="form-group">
			    <label for="exampleInputFile"><b>Select a file</b></label>
			    <input type="file" id="importStudentfile" name="importStudentfile">
			    <p class="help-block">(File type must be .xls format)</p>
			</div>
			<input type="reset" class="hide">
			<div>
				<button class="btn btn-success" type="submit">Upload</button>
			</div>
        </form>
        <div id="displayResponse">
        	
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Import Modal -->

<!-- Student Edit Modal-->
<div class="modal fade" id="StudentEditModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="">Edit Student Details</h4>
      </div>
      <div class="modal-body" id="editStudentInfo">
       		
      </div>
    </div>
  </div>
</div>	
<!-- End Student Edit Modal -->

@stop

