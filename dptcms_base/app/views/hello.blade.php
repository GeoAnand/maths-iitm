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
	<div class="span12">
		<div class="login-form">
			<div class="signup-form-container">
				<h1 id="welcomeMessage">Welcome.</h1>
			</div>
			<!--list all program -->

		</div>
		<a href="app-settings" class="btn btn-lg btn-primary">View App Settings</a>

	</div>
	<script src="{{URL::asset('js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('js/main.js')}}" type="text/javascript"></script>
</body>
</html>
