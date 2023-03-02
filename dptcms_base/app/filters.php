<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


//******** check the user is admin is or not **************//

Route::filter('admin', function()
{
	//if (Auth::check() && (Auth::user()->userprivileg->people!=1 || Auth::user()->userprivileg->student!=1 || Auth::user()->userprivileg->research!=1||Auth::user()->userprivileg->programs!=1||Auth::user()->userprivileg->events!=1 || Auth::user()->userprivileg->research!=1 || Auth::user()->userprivileg->newannouncement!=1|| Auth::user()->userprivileg->createadmin!=1 || Auth::user()->issuper!=1)) 
	if (Auth::check()){

		$path = Request::path();
		$modulepath = substr($path, 6);
		$arr = explode("/", $modulepath, 2);
		$module = $arr[0];

		if (($module=='people') && Auth::user()->userprivileg->people!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='student') && Auth::user()->userprivileg->student!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='research') && Auth::user()->userprivileg->research!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='programs') && Auth::user()->userprivileg->programs!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='events') && Auth::user()->userprivileg->events!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='resources') && Auth::user()->userprivileg->resources!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='booking') && Auth::user()->userprivileg->bookings!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='news') && Auth::user()->userprivileg->newannouncement!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}elseif (($module=='changepermission') && Auth::user()->userprivileg->createadmin!=1) {
			$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');			
			return Response::view('errors.default',$data);
		}
	}
});

Route::filter('checkPermossion', function()
{
	if (!Auth::check()) {

		return Redirect::to('/login');
		/*$data=array('code'=>401,'error'=>'Not authenticated !','details'=>'Permission denied by the system');
		
		return Response::view('errors.default',$data);*/
	}

});

