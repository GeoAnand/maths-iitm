@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
@parent
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" />
<style type="text/css">
	#contentContainer {
		background: transparent;
		min-height: 0px;
		display: none;
	}
</style>
<script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.28468.js') }}"></script>
@stop

@section('homeContent')	

    <div class="container" style="padding: 0px;">
      <div class="" style="padding-bottom: 20px;">
        <div class="col-md-12 m-t welcomedivs">
            <h3 class="dpt-text-dark hidden-xs">Videos</h3>
            <h3 class="dpt-text-dark wrapper visible-xs">Videos</h3>
            <div class="line line-solid"></div>
            <div class="post-sum">
              	<p style="font-size:14px; text-align:center;" id="videocontent">
              		@if(count($getvideos))
		            	{{$getvideos[0]['content']}}
		            @else
		            	<span class="text-muted wrapper text-center center-block">
		            		<i class="fa fa-warning fa-4x"></i> <br/>Sorry! No content Found. Please report to Administrator of this Website.	
		            	</span>	            	
		            @endif
	           	</p>
            </div>
        </div>    
      </div>
    </div>
@stop