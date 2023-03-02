@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
	<div>
		<div class="col-sm-8">
			<h3 class="dpt-text-dark">Links</h3>
		</div>
		<div class="col-sm-4">
			<ol class="breadcrumb pull-right">
			  <li>Resource</li>
			  <li class="active">Links</li>
			</ol>
		</div>
	</div>
	<div class="col-sm-12 line line-solid"></div>
	<div class="col-sm-12">
		@if(count($getalllinks))
			@if(Auth::check())
				<div class="col-sm-6">
				Public Links
					@for($i=0;$i < count($getalllinks);$i++)
						@if($getalllinks[$i]['needlogin']==0)
							<div class="m-t m-b">
							    <a href="{{$getalllinks[$i]['resource_links_link']}}" target="_blank" class="list-group-item noborder"> 
							    	<i class="fa fa-fw fa-external-link"></i> {{$getalllinks[$i]['resource_links_title']}}
							    </a>
							</div>					
						@endif
					@endfor
				</div>
				<div class="col-sm-6">
				Confidential Links
					@for($i=0;$i < count($getalllinks);$i++)
						@if($getalllinks[$i]['needlogin']!=0)
							<div class="m-t m-b">
							    <a href="{{$getalllinks[$i]['resource_links_link']}}" target="_blank" class="list-group-item noborder"> 
							    	<i class="fa fa-fw fa-external-link"></i> {{$getalllinks[$i]['resource_links_title']}}
							    </a>
							</div>					
						@endif
					@endfor
				</div>
			@else
				@for($i=0;$i < count($getalllinks);$i++)
					@if($getalllinks[$i]['needlogin']==0)
						<div class="m-t m-b">
						    <a href="{{$getalllinks[$i]['resource_links_link']}}" target="_blank" class="list-group-item noborder"> 
						    	<i class="fa fa-fw fa-external-link"></i> {{$getalllinks[$i]['resource_links_title']}}
						    </a>
						</div>					
					@endif
				@endfor
			@endif
		@else
			<span class="text-muted wrapper text-center center-block">
		        <i class="fa fa-warning fa-4x"></i> <br/>Sorry! There are no external links to be displayed. 
		    </span>
		@endif
	</div>
@stop