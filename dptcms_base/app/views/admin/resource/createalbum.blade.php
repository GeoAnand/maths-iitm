@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/resources/dashboard')}}"><i class="fa fa-bars"></i> Resources</a></li>
    <li class="active"> EventType</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">
  	<header class="panel-heading text-right bg-light">
        <ul class="nav nav-tabs pull-left" id="programTabs">
	      	<li class="active"><a href="#upcomingEvents" data-toggle="tab">Upcoming Events</a></li>		    
			<li class=""><a href="#pastEvents" data-toggle="tab">Past Events</a></li>			
	    </ul>
	    <span class="v-spacer-16"></span>
    </header>
    
    <div class="panel-body">
		<form role="form" method="post" action="{{url('resources/album/0')}}" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="exampleInputEmail1">Album Name</label>
		    <input type="text" class="form-control" name="albumname">
		  </div>

		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	</section>
</div>
@stop
