@extends('admin.layouts.main')

@section('header-title')
    <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
	
	@if(count($getallslider))

	@else
		No Image Found
	@endif
@stop