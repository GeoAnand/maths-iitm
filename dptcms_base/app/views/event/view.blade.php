@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')

	<div>
		<div class="col-sm-8">
			<h3 class="dpt-text-dark">{{$getcatname->events_type_name}}</h3>
		</div>
		<div class="col-sm-4">
			<ol class="breadcrumb pull-right">
			  <li>Event</li>
			  <li class="active">{{$getcatname->events_type_name}}</li>
			</ol>
		</div>
	</div>	
	<div class="col-sm-12">
	<section class="panel">
		@if($geteventfortype->count())	    	
			<header class="">
			    <ul class="nav nav-tabs" id="">
				    <li class="active"><a href="#upcomingEvents" data-toggle="tab" class="tab-with-btn-sm">Upcoming Events</a></li>		    
					<li class=""><a href="#pastEvents" data-toggle="tab" class="tab-with-btn-sm">Past Events</a></li>	
			    </ul>
			 </header>
		@else
			<div class="col-sm-12 line line-solid"></div>
		@endif
	
		<div class="panel-body">
			<div class="tab-content m-t" id="eventsList">
	    		@if($geteventfortype->count())
		            <div class="tab-pane fade active in" id="upcomingEvents">
		            <?php $i=0;?>
		            @foreach($geteventfortype as $val)
		            	@if(strtotime($val->events_date) >= strtotime(date('Y-m-d')))
		                <?php $i++;?>
		                <div class="col-sm-6 each-event" data-id="{{$val->id}}">
		                    <section class="panel dpt-bg-light">
		                        <div class="panel-body lter" style="height:164px;" >
		                          <a class="pull-right">
<i class="fa fa-calendar"></i> <?php echo date("d-m-Y", strtotime($val->events_date))?>   @if(($val->events_end_date>$val->events_date)) to <!-- to EDITED NARAYANAN--> <?php echo date("d-m-Y", strtotime($val->events_end_date))?>  @endif </a> 
		                          <a class="pull-left">		                          	 
		                          	<?php 
										$eventhall=Conferencehall::where('id', '=', $val->events_place)->pluck('conference_halls_name'); 
									?>
									@if(count($eventhall))
	                              		<small class="block"><i class="fa fa-map-marker fa-2x m-r-sm"></i> {{$eventhall}}</small>
	                              	@endif
		                          </a>
		                          <div class="text-center padder m-t">		                          	
			                            <span class="h4 block">
			                           		@if(strlen($val->events_name)>100) 
			                            		{{substr($val->events_name,0,100)}} ...
			                            	@elseif(strlen($val->events_name)<50)
			                            		<br/>			                            		
			                            		{{$val->events_name}}
			                            	@else
			                            		{{$val->events_name}}
			                            	@endif
			                            </span>
			                            <span class="block">
			                            <?php echo date("d-m-Y", strtotime($val->events_date))?>
			                            </span>
			                            <span class="h5 font-bold block" style="color:#555;">
			                            	{{$val->mainspeaker}}                     	
			                            </span>			                        
		                          </div>
		                        </div>
		                        <footer class="panel-footer dpt-btn-dark">
		                          <div class="row">
		                            <div class="col-xs-12">
			                        	<a href="{{url('event/view/'.$val->id)}}" class="text-center center-block font-bold" style="color:#fff;">View Details</a>
		                            </div>	                                                       
		                          </div>
		                        </footer>
		                    </section>
		                </div>
		                @endif
		            @endforeach 
		            @if($i==0)
		            	<span>There are no upcoming events.</span>
		            @endif
		            </div>
		            <div class="tab-pane fade " id="pastEvents">
		            <?php $i=0;?>
		            @foreach($geteventfortpe as $val) <!-- EDITED NARAYANAN -->
		            	@if(strtotime($val->events_date) < strtotime(date('Y-m-d')))
		            	<?php $i++;?>
		                <div class="col-sm-6 each-event" data-id="{{$val->id}}">
		                    <section class="panel dpt-bg-light">
		                        <div class="panel-body lter" style="height:164px;">
		                          <!-- <a class="pull-right text-muted"><i class="fa fa-calendar"></i> {{$val->events_date}}</a> -->
		                          <!-- <a class="pull-left">		                          	 
		                          	<?php 
										$eventhall=Conferencehall::where('id', '=', $val->events_place)->pluck('conference_halls_name'); 
									?>
						@if(count($eventhall))
	                              		<small class="text-muted block"><i class="fa fa-map-marker fa-2x m-r-sm"></i> {{$eventhall}}</small>
	                              	@endif
		                          </a> -->
		                          <div class="text-center padder m-t">		                          	
			                            <span class="h4 block">
			                           		@if(strlen($val->events_name)>100) 
			                            		{{substr($val->events_name,0,100)}} ...
			                            	@elseif(strlen($val->events_name)<50)
			                            		<br/>			                            		
			                            		{{$val->events_name}}
			                            	@else
			                            		{{$val->events_name}}
			                            	@endif
			                            </span>
			                             <span class="block">
			                           <?php echo date("d-m-Y", strtotime($val->events_date))?>  @if(($val->events_end_date>$val->events_date))  to  <!--to  EDITED NARAYANAN -->  <?php echo date("d-m-Y", strtotime($val->events_end_date))?>  @endif
			                            </span>
			                            <span class="h5 font-bold block" style="color:#555;">
			                            	{{$val->mainspeaker}}		                            	
			                            </span>			                        
		                          </div>
		                        </div>
		                        <footer class="panel-footer dpt-btn-dark">
		                          <div class="row">
		                            <div class="col-xs-12">
			                        	<a href="{{url('event/view/'.$val->id)}}" class="text-center center-block font-bold" style="color:#fff;">View Details</a>
		                            </div>	                                                       
		                          </div>
		                        </footer>
		                    </section>
		                </div>
		                @endif
		            @endforeach 
		            @if($i==0)
		            	<span>There are no past events.</span>
		            @endif
		            </div>
		        @else
		        	<span class="text-muted wrapper text-center center-block">
			            <i class="fa fa-warning fa-4x"></i> <br/>Sorry! Currently there are no {{$getcatname->events_type_name}}.
			        </span>
		        @endif
	        </div>
	    </div>
    </section>
    </div>

@stop
