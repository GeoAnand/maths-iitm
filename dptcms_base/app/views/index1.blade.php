<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="container main-container">
	<div class="row">
	<div class="span12" align="left">
		<div class="login-form">
			<div class="signup-form-container">
				<h1 id="welcomeMessage">Welcome.</h1>
			</div>
			<!--list all program -->

		</div>
		Programs
		<ul>
		@foreach($getallprog as $val)
		    <li><a href="{{url('program/'.$val->id)}}">{{$val->program_name}}</a></li>
		@endforeach
		</ul>

		People:
		<ul>
		@foreach($getallppltype as $val)
		    <li><a href="{{url('people/'.$val->link)}}">{{$val->user_type_name}}</a></li>
		@endforeach
		<li>
			student
			<ul>
				@foreach($student as $val)
					<?
						$getprogname=Programs::find($val->student_program_id);
					?>
			    	<li>
			    		<a href="{{url('program/student/'.$getprogname->id)}}">{{$getprogname->program_name}}</a>
			    	</li>
			    @endforeach
			</ul>
		</li>
		</ul>


		Events:
		<ul>
			@foreach($getallevents as $val)
		    	<li>
		    		<a href="{{url('event/'.$val->id)}}">{{$val->events_type_name}}</a>
		    	</li>
		    @endforeach
		</ul>

		Resources :
		<ul>
		    <li>
		    	<a href="{{url('resources/links')}}">Links</a>
		    </li>
		    <li>
		    	<a href="{{url('resources/docs')}}">Documents</a>
		    </li>
		    <li>
		    	<a href="{{url('resources/gallery')}}">Gallery</a>
		    </li>
		</ul>

	</div>
	<script src="{{URL::asset('js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('js/main.js')}}" type="text/javascript"></script>
</body>
</html>

