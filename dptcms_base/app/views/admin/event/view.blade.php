@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - {{$eventtype}}| DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/events/dashboard')}}"><i class="fa fa-calendar-o"></i> Events</a></li>
    <li class="active">{{$eventtype}}</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">
    
	@if($geteventfortype->count())
    	<header class="panel-heading text-right bg-light">
	        <ul class="nav nav-tabs pull-left" id="programTabs">
		      	<li class="active"><a href="#upcomingEvents" data-toggle="tab" class="tab-with-btn-sm">Upcoming Events</a></li>		    
				<li class=""><a href="#pastEvents" data-toggle="tab" class="tab-with-btn-sm">Past Events</a></li>			
		    </ul>
		    <span class="nav-link"><a href="{{url('admin/events/createeventcat/'.$eventtypeid)}}" id="editEventCategory" data-eventcat="{{$eventtypeid}}" class="btn btn-sm btn-info "><i class="fa fa-pencil"></i> Edit Event Category</a></span>
		    
		    <a href="{{url('admin/events/create')}}" data-event="{{$eventtype}}" class="btn btn-sm btn-primary create-event-btn"><i class="fa fa-plus"></i> Create an Event</a>
		</header>
	@else
		<header class="panel-heading font-bold">{{$eventtype}}</header>
	@endif
    
    
    <div class="panel-body">

    	<div class="tab-content m-t" id="eventsList">
    		@if($geteventfortype->count())
	            <div class="tab-pane fade active in" id="upcomingEvents">
	            <?php $i=0;?>
	            @foreach($geteventfortype as $val)
	            	@if(($val->events_date) >= (date('Y-m-d')))
	                <?php $i++;?>
	                <div class="col-sm-6 each-event" data-id="{{$val->id}}">
	                    <section class="panel bg-light">
	                        <div class="panel-body lter">
	                          <a class="pull-right" href="#"><i class="fa fa-calendar"></i> {{$val->events_date}} @if(($val->events_end_date>$val->events_date)) to {{$val->events_end_date}} @endif at {{$val->events_starttime}}</a>
	                          <a class="pull-left"><i class="fa fa-calendar fa-2x"></i></a>
	                          <div class="text-center padder m-t">	                          	
	                        	<a href="{{url('event/view/'.$val->id)}}" target="_blank">	                        
		                            <span class="h4 block">
		                           		@if(strlen($val->events_name)>35) 
		                            		{{substr($val->events_name,0,35)}} ...
		                            	@else
		                            		{{$val->events_name}}
		                            	@endif
		                            </span>
		                            <span class="block text-muted">
		                            	@if(strlen($val->events_desc)>70) 
		                            		{{substr($val->events_desc,0,70)}} ...
		                            	@else
		                            		{{$val->events_desc}}
		                            	@endif
		                            </span>
		                        </a>
	                          </div>
	                        </div>
	                        <footer class="panel-footer lt">
	                          <div class="row">
	                            <div class="col-xs-4">
	                            <?php 
									$eventhall=Conferencehall::where('id', '=', $val->events_place)->pluck('conference_halls_name'); 
								?>
	                              <small class="text-muted block btn btn-white editevent" data-event="{{$eventtype}}" data-eventplace="{{$eventhall}}" data-id="{{$val->id}}"><i class="fa fa-edit"></i> Edit Event</small>
	                            </div>
	                            <div class="col-xs-4 col-xs-offset-4">
	                              <small class="text-muted block btn btn-danger deleteevent" data-id="{{$val->id}}"><i class="fa fa-trash-o"></i> Delete Event</small>
	                            </div>                            
	                          </div>
	                        </footer>
	                    </section>
	                </div>
	                @endif
	            @endforeach 
	            @if($i==0)
	            	<span>There are no upcoming events ..</span>
	            @endif
	            </div>
	            <div class="tab-pane fade " id="pastEvents">
	            @foreach($geteventfortype as $val)
	            	@if(date($val->events_date) < (date('Y-m-d')))
	                <div class="col-sm-6 each-event" data-id="{{$val->id}}">
	                    <section class="panel bg-light">
	                        <div class="panel-body lter">
	                          <a class="pull-right" href="#"><i class="fa fa-calendar"></i> 
<?php echo date("d-m-Y", strtotime($val->events_date))?>   @if(($val->events_end_date>$val->events_date)) to <!-- to EDITED NARAYANAN--> <?php echo date("d-m-Y", strtotime($val->events_end_date))?>  @endif </a>
	                          <a class="pull-left"><i class="fa fa-calendar fa-2x"></i></a>
	                          <div class="text-center padder m-t">
	                          	<a href="{{url('event/view/'.$val->id)}}" target="_blank">
		                            <span class="h4 block">
		                            	@if(strlen($val->events_name)>35) 
		                            		{{substr($val->events_name,0,35)}} ...
		                            	@else
		                            		{{$val->events_name}}
		                            	@endif
		                            </span>
		                            <span class="block text-muted"> 
		                            	@if(strlen($val->events_desc)>70) 
		                            		{{substr($val->events_desc,0,70)}} ...
		                            	@else
		                            		{{$val->events_desc}}
		                            	@endif
		                            </span>
		                        </a>
	                          </div>
	                        </div>
	                        <footer class="panel-footer lt">
	                          <div class="row">
	                            <div class="col-xs-4">
	                            <?php 
									$eventhall=Conferencehall::where('id', '=', $val->events_place)->pluck('conference_halls_name'); 
								?>
	                              <small class="text-muted block btn btn-white editevent" data-event="{{$eventtype}}" data-eventplace="{{$eventhall}}" data-id="{{$val->id}}"><i class="fa fa-edit"></i> Edit Event</small>
	                            </div>
	                            <div class="col-xs-4 col-xs-offset-4">
	                              <small class="text-muted block btn btn-danger deleteevent" data-id="{{$val->id}}"><i class="fa fa-trash-o"></i> Delete Event</small>
	                            </div>                            
	                          </div>
	                        </footer>
	                    </section>
	                </div>
	                @endif
	            @endforeach 
	            </div>
	        @else
	        	<div class="text-center">
		        	<span class="text-muted h5 block"> Sorry! we could no find any events!</span>
		        	<a href="{{url('admin/events/create')}}" data-event="{{$eventtype}}" class="btn btn-lg btn-info create-event-btn"><i class="fa fa-calendar fa-1x"></i> Create a Event Now!</a>
		        	<br><br>

		        	<button id="deleteEventCategory" data-eventcat="{{$eventtypeid}}" class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i> Delete Event Category</button>
		        </div>
	        @endif
        </div>
	</div>
	</section>
</div>
@stop
