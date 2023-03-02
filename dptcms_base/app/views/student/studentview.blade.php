@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
	<?php
	$getprohname=Programs::find($progid);
	?>
	
	<div>
		<div class="col-sm-8">
			<h3 class="dpt-text-dark">{{$getprohname->program_name}}</h3>
		</div>
		<div class="col-sm-4">
			<ol class="breadcrumb pull-right">
			  <li>Student</li>
			  <li class="active">{{$getprohname->program_name}}</li>
			</ol>
		</div>
	</div>
	<div class="col-sm-12 line line-solid"></div>
	@if(count($getallstudent))
		<div class="col-sm-12" align="center" style="padding: 10px 0px 30px 0px;">
			<form class="form-inline" role="form" action="javascript:void(0)">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" id="studentsearch" placeholder="Search student" style="border-color: #C5B7B7;">
					<span class="fa fa-search form-control-feedback"></span>
				</div>
			</form>
			<div class="m-t text-muted">
				Email ID: Roll No [@] smail [dot] iitm [dot] ac [dot] in
			</div>
		</div>
		<div class="col-sm-12 m-b" align="center" style="">
			<div style="width:30%" align="center">Year : 
				<select class="form-control inline" style="width: 20%;" id="changeyear">
		            @foreach($getallstudent as $val)
		            	<option value="{{$val->student_year}}">{{$val->student_year}}</option>	
		            @endforeach
		        </select>
			</div>
		</div>

		<div class="col-sm-12" align="center">
			<section class="panel" style="width:80%">
		            <!-- <header class="panel-heading">Stats</header> -->
		            <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                	<th>#</th>
		                  	<th>Name</th>
		                  	<th>Roll Number</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">	              	
		                  	<?php 
		                  		$getstudentbyyear=Student::where('student_program_id','=',$progid)->where('student_year','=',$getallstudent[0]['student_year'])->get();

		                  		$i=1;
		                  	?>
		                  	@foreach($getstudentbyyear as $val)
		                  	<tr>                    
		                      <td>
		                     	{{$i}} 
		                      </td>
		                      <td>
		                      	{{$val->student_name}}
		                      </td>
		                      <td>
		                       {{$val->student_rollno}}
		                      </td>
		                    </tr>
		                    <?php $i++ ?>
		                    @endforeach
		              </tbody>
		            </table>
		    </section>
		</div>
	@else
		<span class="text-muted wrapper text-center center-block">
	        <i class="fa fa-warning fa-4x"></i> <br/>Sorry! Currently there are no students in {{$getprohname->program_name}} or the list has not been updated.
	    </span>
	@endif

		
@stop

@section('footer-scripts')
@parent
	<script type="text/javascript">
		var path="{{url('program/studentofyear')}}";
		$("#changeyear").change(function(){
			$.post(path+'/'+$(this).val(),{'progid':{{$progid}}},function(){

			}).done(function(data){
				$("#studentlistbyyear").html(data);
			});
		});

	</script>
@stop