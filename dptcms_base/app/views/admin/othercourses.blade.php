@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Other Courses | DeptCMS</title>
@stop

@section('content')
	<div class="col-sm-12">
		<!-- .breadcrumb -->
		  <ul class="breadcrumb">
		    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
		    <li class="active"> Other Courses</li>
		  </ul>
	  	<!-- / .breadcrumb -->
		<div class="">
		  <section class="panel">
		    <header class="panel-heading font-bold"> Other Courses</header>
		    <div class="panel-body">
	    		<form role="form" action="{{url('admin/othercourses/updatecourse/'.$getcoursedetails[0]['id'])}}" id="othercoursesupdate">
				  <div class="form-group">
				  	<div id="othercourses" class="summernote">
				      {{$getcoursedetails[0]['details']}}
	                </div>
				  </div>
				  <button type="submit" class="btn btn-primary">Update</button>
				</form>
		    </div>
		  </section>
		</div>
	</div>
@stop