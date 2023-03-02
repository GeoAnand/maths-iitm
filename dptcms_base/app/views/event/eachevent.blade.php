@extends('layout.main')

@section('header-title')
   <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
<style type="text/css">
	.table-striped>tbody>tr:nth-child(odd)>td, .table-striped>tbody>tr:nth-child(odd)>th{
		background: transparent;
	}
</style>

<div>
	<div>
		<div class="col-sm-8">
			<h3 class="dpt-text-dark">{{$geteventdetails->events_name}}</h3>
		</div>
		<div class="col-sm-4">
			<ol class="breadcrumb pull-right">
			  <li>Event</li>
			  <li class="active">{{$geteventdetails->eventcategory->events_type_name}}</li>
			</ol>
		</div>
	</div>
	<div class="col-sm-12 line line-solid"></div>
	<div>
		<div class="col-sm-8">
			 @if(!empty($geteventdetails->mainspeaker))
				<h4>Speaker : {{$geteventdetails->mainspeaker}}</h4>
			 @else
            	<h4>Speaker : Not Specified</h4>
            @endif
		</div>
		<div class="col-sm-4">
			<h4 style="display:inline" class="pull-right">
	      		<i class="fa fa-calendar "></i>
				<?php echo date("d-m-Y", strtotime($geteventdetails->events_date))?> @if(($geteventdetails->events_end_date>$geteventdetails->events_date)) to <!--to EDITED NARAYANAN--> <?php echo date("d-m-Y", strtotime($geteventdetails->events_end_date))?> @endif
			</h4>
		</div>
	</div>
	<div class="col-sm-12 line line-solid"></div>
	<div class="col-sm-12" style="padding-top: 20px">
		<div class="col-sm-8">
			@if(!empty($geteventdetails->posterimage))
			<img src="{{URL::asset('/siteimages/eventimage/'.$geteventdetails->posterimage)}}" alt="" style="max-height: 336px;;">
			@endif
			<h4 class="text-uc m-t">Abstract :</h4>
	        <p style="font-size: 18px;"> 
	        	{{$geteventdetails->events_desc}}
	        </p>
		</div>
		<div class="col-sm-3 col-sm-offset-1">
			<span class="block m-t m-b-xs">                        
                <strong class="block"><i class="fa fa-user"></i> Key Speaker</strong>
                @if(!empty($geteventdetails->mainspeaker))
                	<small>{{$geteventdetails->mainspeaker}}</small>
                @else
                	<small>Not specified</small>
                @endif
            </span>
            <br/>
            <span class="block m-b-xs">                        
                <strong class="block"><i class="fa fa-map-marker"></i> Place</strong>

                <small>{{$eventhall}}</small>
            </span>
            <br/>	            
            <span class="block m-b-xs">                       
                <strong class="block"><i class="fa fa-clock-o"></i> Start Time</strong>
                @if(!empty($geteventdetails->events_starttime))
                	<small>{{$geteventdetails->events_starttime}}</small>
                @else
                	<small>Not Specified</small>
                @endif
            </span>
            <br/>
            <span class="block m-b-xs">                    
                <strong class="block"><i class="fa fa-clocl-o"></i> Finish Time</strong>
                @if(!empty($geteventdetails->events_endtime))
                	<small>{{$geteventdetails->events_endtime}}</small>
                @else
                	<small>Not Specified</small>
                @endif
            </span>
            <br/>
            <span class="block m-b-xs">                       
                <strong class="block"><i class="fa fa-external-link"></i> External Link</strong>
                @if(!empty($geteventdetails->externallink))
                	<small><a href="{{$geteventdetails->externallink}}" target="_blank">{{$geteventdetails->externallink}}</a></small>
                @else
                	<small>None</small>
                @endif
            </span>
		</div>

		
	</div>
</div>

@stop
