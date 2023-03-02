<?php

class SliderController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function getViewall()
	{
		if(Auth::check() && ( Auth::user()->userprivileg->resources==1 ))
		{
			$getallpicsforslider=Slider::all();
			return View::make('admin.slider.view',array('getallpicsforslider'=>$getallpicsforslider));
		}
		else
		{
			return Redirect::to('login');
		}
	}

	public function postUploadimage($id)
	{
		if(Input::hasFile('slideimage'))
		{
			
			$saveimage=new Slider;			
			$destinationPath = public_path().'/siteimages/slider/';	
	        if (!file_exists($destinationPath)) {
			    mkdir($destinationPath, 0777, true);
			}
	        $ext = Input::file('slideimage')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
			$filename = uniqid("slide_").'.'.$ext;
	        $uploadSuccess=Input::file('slideimage')->move($destinationPath, $filename);
	        $saveimage->slider_uploaded_by = Auth::user()->id;
		    $saveimage->slider_image_name=$filename;
		    if(Input::get('sliderorder')){
		    	$saveimage->slider_order=Input::get('sliderorder');
		    }else{
		    	$saveimage->slider_order=0;
		    }
			$saveimage->slider_text=Input::get('imgtext');
			try
			{
				$saveimage->save();
				return Response::json(['success' => true, 'file' => $filename,'text'=>Input::get('imgtext') , 'dataid'=>$saveimage->id, 'order'=>$saveimage->slider_order]);
			}
			catch(Exception $e)
			{
				return Response::json(['success' => $e]);
			}
			
		}
		else
		{
			return Response::json(['success' => false]);
		}		
	}
	public function postDelete($id)
	{
		$findimage=Slider::find($id);
		if(count($findimage))
		{
			try
			{
				$image = public_path().'/siteimages/slider/'.$findimage->slider_image_name;	
				unlink($image);
				$findimage->delete();
				return 1;
			}
			catch(Exception $e)
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
}