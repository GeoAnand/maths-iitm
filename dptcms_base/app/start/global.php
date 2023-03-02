<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

//Log::useFiles(storage_path().'/logs/laravel.log');
Log::useDailyFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);

    if (Config::get('app.debug')) {
        
        return;

    }
    else
    {
        $error = array('code' => $code, 'error' => trans('error.' . $code.'.error'), 'details' => trans('error.'.$code.'.details'));

        return Response::view('errors.default', $error, $error['code']);
    }    

});

/*
|--------------------------------------------------------------------------
| Runtime Error Handler [Additional]
|--------------------------------------------------------------------------
|
| With this any RuntimeExceptions can be handled
|
*/
// App::error(function(RuntimeException $exception)
// {
//     // Handle the exception...
// });

/*
|--------------------------------------------------------------------------
| Invalid User Error Handler [Additional]
|--------------------------------------------------------------------------
|
| With this any InvalidUserExceptions can be handled
|
*/
// App::error(function(InvalidUserException $exception)
// {
//     //Log::error($exception);

//     //return 'Sorry! Something is wrong with this account!';
// });

/*
|--------------------------------------------------------------------------
| Fatal Error Handler [Additional]
|--------------------------------------------------------------------------
|
| With this any PHP Fatal Error can be handled
|
*/
App::fatal(function($exception)
{
    //
});

/*
|--------------------------------------------------------------------------
| 404 Error Handler [Additional]
|--------------------------------------------------------------------------
|
| With this any 404 Error can be handled
|
*/
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	//return Response::make("Be right back!", 503);
    return Response::view('app-maintenance', array(), 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

function setActive($path, $class = 'active')
{
    //return (Route::currentRouteName() == $route) ? $class : '1';
    return call_user_func_array('Request::is', (array)$path) ? $class : '';
}