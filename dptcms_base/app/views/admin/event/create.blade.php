@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Create an Event| DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/events/dashboard')}}"><i class="fa fa-calendar-o"></i> Events</a></li>
    <li class="active"> Create an Event</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Create an Event
    </header>
    
    <div class="panel-body">
		<div class="col-sm-12">
		  	<form role="form" class="form-horizontal" method="post" action="{{url('admin/events/create/0')}}" id="createevent" enctype="multipart/form-data">
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Select a category</label>
			      <div class="col-lg-10">
				      <select class="form-control" name="forwhichcat" required>
				      	<option value="">-- select a category --</option>
				      	@foreach($eventcat as $val)
				  			<option value="{{$val->id}}">{{$val->events_type_name}}</option>
				  		@endforeach
				      </select>
				   </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event Name</label>
			      <div class="col-lg-10">
			      	<input type="text" class="form-control" name="eventname" required placeholder="Enter the event name">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event Abstract</label>
			      <div class="col-lg-10">
			      	<textarea class="form-control" name="eventdesc" placeholder="Abstract about the Event" rows="5"></textarea>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event Date</label>
			      <div class="col-lg-10">
			      	<div class="input-group m-b" id="eventdate" data-date-format="YYYY-MM-DD">
			      		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			      		<input type="text" class="form-control" name="eventdate" required data-date-format="YYYY-MM-DD" placeholder="Select an event date">                      	
                    </div>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event's End Date</label>
			      <div class="col-lg-10">
			      	<div class="input-group m-b" id="eventenddate" data-date-format="YYYY-MM-DD">
			      		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			      		<input type="text" class="form-control" name="eventenddate" data-date-format="YYYY-MM-DD" placeholder="Select an event date">
                    </div>
                    <span class="text-muted text-sm">Leave blank if it is a single day event</span>  
			      </div>
			    </div>
			    <div class="form-group">
			    	<label class="col-lg-2 control-label">Event Time</label>
			    	<div class="col-lg-10">
			    		<label class="col-lg-2 control-label">Start Time</label>
		    			<div class="col-lg-3">
		    				<div class="input-group m-b" id="eventstarttime" >
	                      		<input name="eventstarttime" type="text" class="form-control">
	                      		<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
	                    	</div>
	                    </div>
			    		<label class="col-lg-2 control-label">Finish Time</label>
		    			<div class="col-lg-3">
		    				<div class="input-group m-b" id="eventendtime">
	                      		<input name="eventendtime" type="text" class="form-control">
	                    		<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
	                    	</div>
	                    </div>			 
			    	</div>
			    </div>
			    <!-- <div class="form-group">
			      <label class="col-lg-2 control-label">Event Time</label>
			      <div class="col-lg-10">
			        <label class="col-lg-2 control-label">Start Time</label>			      	
			        <div class="col-lg-3 input-group m-b bootstrap-timepicker">
                      <input id="eventstarttime" type="text" class="form-control input-small">
                      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>
                    <label class="col-lg-2 control-label">End Time </label>
                    <div class="col-lg-3 input-group m-b bootstrap-timepicker">
                      <input id="eventendtime" type="text" class="form-control input-small">
                      <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>			        
			      </div>
			    </div> -->
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event Place</label>
			      <div class="col-lg-10">
			      	<select class="form-control" name="eventplace" required>
				      	<option value="">-- Select a Place --</option>
				      	@foreach($eventplace as $val)
				  			<option value="{{$val->id}}">{{$val->conference_halls_name}}</option>
				  		@endforeach
				    </select>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Speaker</label>
			      <div class="col-lg-10">
			      	<input type="text" class="form-control" name="eventspeaker" placeholder="Enter speaker's name , use comma(,) if more than one">
			      </div>
			    </div>
			  	<div class="form-group">
			      <label class="col-lg-2 control-label">Event External Link</label>
			      <div class="col-lg-10">
			      	<input type="url" class="form-control" name="eventlink" placeholder="Enter link if any website is there for this event">
			      </div>
			    </div>
			    <div class="from-group">
			    	<label class="col-lg-2 control-label">Upload Poster image</label>
				    <div class="col-lg-10" style="padding: 7px;">
				      	<input type="file" class="" name="posterimage">
				      	<em class="">File Size : 100KB &amp; Dimension : 1520x600 for best quality</em>	
				    </div>
			    </div>
			    
			     <div class="form-group">
			  	  <label class="col-lg-2 control-label">Publish now?</label>
			  	  <div class="col-lg-10">
			  	  	<div class="radio">
	                  <label class="radio">
	                    <input type="radio" name="eventpublish" id="eventpublish" value="1" checked>Yes
	                  </label>
	                </div>
	                <div class="radio">
	                  <label class="radio">
	                    <input type="radio" name="eventpublish" id="eventpublish" value="2">No , Save as Draft
	                  </label>
	                </div> 	  	
			  	  </div>
			  	</div>
			  	<!-- <div class="from-group">
			    	<div class="col-lg-offset-2 col-lg-10" style="padding: 7px;">
				      	<div class="checkbox">
						    <label>
						    	<input type="checkbox" value="1" name="wantanewpage"> Create a page for this event?
		              			<input type="hidden" value="0" name="wantanewpage">
						    </label>
						</div>
				    </div>
			    </div> -->			    
			  	<div class="form-group">
		            <div class="col-lg-offset-2 col-lg-10" style="padding: 14px;">
		              <button type="reset" class="btn btn-sm btn-default" id="donotcreateevent"><i class="fa fa-times"></i> Cancel</button>
		              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Event</button>
		            </div>
		        </div>
		  	</form>
		</div>
	</div>
	</section>
</div>
@stop

@section('page-modals')
<!-- Any Modal Specific to this page should be placed here -->
@stop
