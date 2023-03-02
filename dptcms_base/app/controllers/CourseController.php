<?php

class CourseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//list all user depend on their type 
		return "ok";
	}

	public function getManage()
	{
		if(Auth::check())
		{
			$getcoursedetails=Othercourses::take(1)->get();
			return View::make('admin.othercourses',array('getcoursedetails'=>$getcoursedetails));
		}
		else
		{
			return Redirect::to('login');
		}
		
	}

	public function postUpdatecourse($id)
	{
		$updatecourse=Othercourses::find($id);
		$updatecourse->details=Input::get('details');
		$updatecourse->updated_by=Auth::user()->id;
		try
		{
			$updatecourse->save();
			return 1;
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
}