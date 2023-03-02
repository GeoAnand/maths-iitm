<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/* ---------- To be seen Later about minimizing below routes --------- */
/* Admin Dashboard Page */
/*Route::get('admin', function()
{
    return View::make('admin/index');
});
*/
Route::get('admin','AdminController@adminindex');
Route::get('admin/','AdminController@adminindex');

/* Index Page */
Route::get('/','HomeController@getIndex');
Route::get('bibtexbrowser',function(){
    return View::make('bibtexbrowser');
});
Route::get('/bibteximport',function(){
    return View::make('bibteximport');
});
Route::post('/bibteximport', 'PublicationController@importbib');

/* App Settings Page */
// Route::get('app-settings', function()
// {
//     return View::make('app-settings');    
// });


// Route::get('test',function(){
//     return View::make('test');
// });

Route::post('authenticate_user', array('as'=>'auth_user', 'uses'=>'HomeController@authenticateUser'));
Route::post('change_pwd', array('as'=>'change_pwd', 'uses'=>'HomeController@changePassword'));


Route::get('/login', 'UseractivityController@getLogin');
Route::post('/login', 'UseractivityController@postLogin');
Route::get('/logout', 'UseractivityController@getLogout');
Route::get('/researchinfo', 'HomeController@getResearchinfo');
Route::get('/researchgroup', 'HomeController@getResearchgroup');
Route::get('/researchgrouppage/{id}', 'HomeController@getResearchgrouppage');

Route::get('/researchinfo', 'HomeController@getResearchinfo');
Route::get('/contact', 'HomeController@getContactdetails');
Route::get('/othercourses', 'HomeController@getOthercourses');

Route::get('admin/people', 'HomeController@getPeople');
Route::get('admin/people/{type}','HomeController@getPeopletype');//->where('type', '[A-Za-z]+');

Route::get('people/{type}','HomeController@getSitepeople')->where('type', '[A-Za-z-]+');

Route::get("program/{id}",'ProgramController@getProgram')->where('id', '[0-9]+');

Route::get("program/course/{id}",'ProgramController@getCoursedetails')->where('id', '[0-9]+');

Route::get("program/syllabus/{id}",'ProgramController@getSyllabus')->where('id', '[0-9]+');


Route::get("student/program/{id}",'ProgramController@getAllstudent')->where('id', '[0-9]+');
Route::post("program/studentofyear/{id}",'ProgramController@postAllstudentbyyear')->where('id', '[0-9]+');
Route::post("program/courseofsemofyear/{id}", 'ProgramController@postAllcoursebyyearforsem')->where('id', '[0-9]+');
Route::post("program/courseofyear/{id}", 'ProgramController@postAllcoursebyyear')->where('id', '[0-9]+');
Route::get('/{handle}','HomeController@getPeopledetails');




// Route::group(array('before' => 'admin'), function()
// {
//     Route::resource('user','AdminController'); 
//   	Route::resource('usertype','UsertypeController');
//     Route::Controller('admin','AdminController'); 
//     Route::resource('admin','AdminController@adminindex');
//   	Route::Controller('programs','ProgramController');
//   	Route::Controller('student','StudentController');
//   	Route::Controller('research','ResearchController');
// });

Route::group(array('before' => 'admin'), function()
{
    Route::post('admin/homecontent', 'AdminController@postHomecontent');
    Route::get('admin/changepermission','AdminController@getChangepermission');
    Route::post('admin/changepermission','AdminController@postChangepermission');
    Route::post('admin/revokepermission','AdminController@postRevokepermission');
    Route::post('admin/abailablepermission','AdminController@postAbailablepermission');
    Route::post('admin/changeuserpermission','AdminController@postChangeuserpermission');
    Route::get('admin/allfaculty','AdminController@getAllfaculty');
    Route::get('admin/allinspirefaculty','AdminController@getAllinspirefaculty');
    Route::get('admin/allvisitingfaculty','AdminController@getAllvisitingfaculty');
    Route::get('admin/allpdf','AdminController@getAllpdf');
    Route::get('admin/allstaff','AdminController@getAllstaff');
    Route::get('admin/allretiredfaculty','AdminController@getAllretiredfaculty');
    Route::get('admin/allphd','AdminController@getAllphd');
    
    
    
    
    Route::get('admin/alluser','AdminController@getAlluser');
    Route::resource('admin/user','AdminController'); 
    Route::resource('admin/usertype','UsertypeController');
    Route::resource('admin/home','AdminController@getHome');
    Route::resource('admin/report','ReportController@getReport'); 
    Route::Controller('admin/report','ReportController');
    Route::Controller('admin/booking','BookingController');
    Route::Controller('admin/programs','ProgramController');
    Route::Controller('admin/othercourses', 'CourseController');
    Route::Controller('admin/student','StudentController');
    Route::Controller('admin/research','ResearchController');
    Route::Controller('admin/events','EventController');
    Route::Controller('admin/resources','ResourceController');
    Route::Controller('admin/slider','SliderController');
    Route::Controller('admin/contact','AdminController');
    Route::Controller('admin/news', 'NewsController');
    Route::Controller('admin/useractivity','UseractivityController');
    Route::Controller('admin/publications','PublicationController');
    Route::get('admin/authorlist', 'PublicationController@getGenerateauthorslist');
});

Route::group(array('before'=>'checkPermossion'),function(){
  Route::get('/profile/{handle}','HomeController@getMydetails');
  Route::post('/changepassword','UseractivityController@postChangepassword');
    Route::Controller('course','UserotherdetailsController');
    Route::Controller('activity','UserotherdetailsController');
    Route::Controller('book','UserotherdetailsController');
    Route::Controller('publication','UserotherdetailsController');
    Route::Controller('booking','BookingController');
  Route::Controller('useractivity','UseractivityController');
  Route::get("event/8",'EventController@getEvents');
});
Route::get("event/{id}",'EventController@getEvents')->where('id', '[0-9]+');
Route::get("event/view/{id}",'EventController@getView');
Route::Controller('resources','ResourceController');
Route::Controller('publications','PublicationController');



/*Route::group(array('before'=>'checkPermossion'),function(){

	Route::Controller('book','UserotherdetailsController');
	Route::Controller('/publication','UserotherdetailsController');
	Route::Controller('booking','BookingController');

});
Route::Controller('resources','ResourceController');
Route::get("event/{id}",'EventController@getEvents')->where('id', '[0-9]+');

Route::Controller('event','EventController');


Route::get('people/{type}','HomeController@getPeople')->where('type', '[A-Za-z]+');

Route::get("program/{id}",'ProgramController@getShowprogramdetails')->where('id', '[0-9]+');

Route::get("program/course/{id}",'ProgramController@getCoursedetails')->where('id', '[0-9]+');

Route::get("program/student/{id}",'ProgramController@getAllstudent')->where('id', '[0-9]+');*/






