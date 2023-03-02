@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Edit an Event | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/events/dashboard')}}"><i class="fa fa-calendar-o"></i> Events</a></li>
    <li class="active"> Edit an Event</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Edit an Event
    </header>
    
    <div class="panel-body">
		<div class="col-sm-12">
		  	<form role="form" class="form-horizontal" method="post" action="{{url('admin/events/create/'.$eventdetail[0]->id)}}" id="editEventForm" enctype="multipart/form-data">
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
			      	<input type="text" class="form-control" name="eventname" required placeholder="Enter the event name" value="{{$eventdetail[0]->events_name}}">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event Abstract</label>
			      <div class="col-lg-10">
			      	<textarea class="form-control" name="eventdesc" placeholder="Abstract about the Event" rows="5">{{$eventdetail[0]->events_desc}}</textarea>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event Date</label>
			      <div class="col-lg-10">
			      	<div class="input-group m-b" id="eventdate" data-date-format="YYYY-MM-DD">
			      		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			      		<input type="text" class="form-control" name="eventdate" required data-date-format="YYYY-MM-DD" placeholder="Select an event date" value="{{$eventdetail[0]->events_date}}">                      	
                    </div>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Event End Date</label>
			      <div class="col-lg-10">
			      	<div class="input-group m-b" id="eventenddate" data-date-format="YYYY-MM-DD">
			      		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			      		<input type="text" class="form-control" name="eventenddate" required data-date-format="YYYY-MM-DD" placeholder="Select an event date" value="{{$eventdetail[0]->events_end_date}}">                      	
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
	                      		<input name="eventstarttime" type="text" class="form-control" value="{{$eventdetail[0]->events_starttime}}">
	                      		<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
	                    	</div>
	                    </div>
			    		<label class="col-lg-2 control-label">Finish Time</label>
		    			<div class="col-lg-3">
		    				<div class="input-group m-b" id="eventendtime">
	                      		<input name="eventendtime" type="text" class="form-control" value="{{$eventdetail[0]->events_endtime}}">
	                    		<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
	                    	</div>
	                    </div>			 
			    	</div>
			    </div>
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
			      	<input type="text" class="form-control" name="eventspeaker" placeholder="Enter speaker's name , use comma(,) if more than one" value="{{$eventdetail[0]->mainspeaker}}">
			      </div>
			    </div>
			  	<div class="form-group">
			      <label class="col-lg-2 control-label">Event External Link</label>
			      <div class="col-lg-10">
			      	<input type="url" class="form-control" name="eventlink" placeholder="Enter link if any website is there for this event" value="{{$eventdetail[0]->externallink}}">
			      </div>
			    </div>
			    <div class="from-group">
			    	@if($eventdetail[0]['posterimage'])
			    		<label class="col-lg-2 control-label">Change Poster image</label>
			    	@else
			    		<label class="col-lg-2 control-label">Upload Poster image</label>
			    	@endif
				    <div class="col-lg-10" style="padding: 7px;">
				   		@if($eventdetail[0]['posterimage'])
				   			{{$eventdetail[0]['posterimage']}}<br />
				   			<input type="file" class="" name="posterimage">		                               
		                @else
		                  	<input type="file" class="" name="posterimage">
		                @endif				      	
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
			  			    
			  	<div class="form-group">
		            <div class="col-lg-offset-2 col-lg-10" style="padding: 14px;">
		              <button type="reset" class="btn btn-sm btn-default" id="cancelEditingEvent"><i class="fa fa-times"></i> Cancel</button>
		              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Update Event</button>
		            </div>
		        </div>
		  	</form>
		</div>
	</div>
	</section>
</div>
@stop
