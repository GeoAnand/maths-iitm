@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
@parent
<style type="text/css">
</style>
@stop

@section('content')
		
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-8">
					<h3 class="dpt-text-dark">Other Courses</h3>
				</div>
				<div class="col-sm-12 line line-solid"></div>
			</div>			
		</div>		

		<div id="othercourses" class="wrapper">
			@if(count($getothercourses))
				{{$getothercourses[0]['details']}}
			@else
				Sorry! This page has not been updated.
			@endif
		</div>
@stop
