@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Add Event Category | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/events/dashboard')}}"><i class="fa fa-calendar-o"></i> Events</a></li>
    <li class="active"> Add a Event Category</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">
    
    <header class="panel-heading font-bold">
        Add a Event Category
    </header>
    
    <div class="panel-body">
    	<form role="form" class="form-horizontal" method="post" action="{{url('admin/events/createeventcat/0')}}" id="addeventcat">
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Category Name</label>
		    <div class="col-sm-10">
		     <input type="text" class="form-control" placeholder="Category Name" name="eventcatname" id="eventcatname">
		    </div>		   
		  </div>
		  <div class="form-group">
	            <div class="col-lg-offset-2 col-lg-10">
	              <button type="reset" class="btn btn-sm btn-default" id="donotcreateeventcat"><i class="fa fa-times"></i> Cancel</button>
	              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Event Category</button>
	            </div>
	       </div>
		</form>
	</div>
	</section>
</div>
@stop

@section('page-modals')
<!-- Any Modal Specific to this page should be placed here -->
@stop
