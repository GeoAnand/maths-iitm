<?php

class ReportController extends \BaseController {
	public function getReport()
	{
		return View::make('admin.report');
	}

	public function downloadReport() {

	}

	public function postPeople()
	{
		$tmp=Input::get('reportto');		
$getallpeople=User::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->orderBy('created_at', 'DESC')->get();
		return View::make('admin.report.people',array('getallpeople'=>$getallpeople));
	}

	public function postPeopledownload()
	{
		$tmp=Input::get('reportto');
		$getallpeople=User::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->orderBy('created_at', 'DESC')->get();

		$data = $getallpeople;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/events'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('people'.$current_time, function($excel) use ($data) {
				$excel->sheet('People', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);

			
			$headers = array(
	              'Content-Type: application/xls',
	            );
	        echo url('excel/exports/people'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }

	}

	public function postPublication()
	{
		$tmp=Input::get('reportto');			
		// $getallpublication=Publications::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->get();
		$getallpublication=Publications::where('year','>=',Input::get('reportfrom'))->where('year','<=',!empty($tmp)?Input::get('reportto'):date('Y'))->orderBy('year', 'DESC')->get();
		return View::make('admin.report.publication',array('getallpublication'=>$getallpublication));

	}

	public function postPubdownload()
	{
		$tmp=Input::get('reportto');			
		// $getallpublication=Publications::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->get();
		$getallpublication=Publications::where('year','>=',Input::get('reportfrom'))->where('year','<=',!empty($tmp)?Input::get('reportto'):date('Y'))->orderBy('year', 'DESC')->get();
		//return View::make('admin.report.publication',array('getallpublication'=>$getallpublication));

		// $r = Excel::create('publications', function($getallpublication){
		// 	$excel->sheet('Publications', function($sheet){
		// 		$sheet->row(1, array('test', 'test1'));
		// 	});
		// })->export('xls');

		$data = $getallpublication;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/publications'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('publications'.$current_time, function($excel) use ($data) {
				$excel->sheet('Publications', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);

			
			$headers = array(
	              'Content-Type: application/xls',
	            );

	        //echo Response::download($file, 'publications'.$current_time.'.xls', $headers);
	        echo url('excel/exports/publications'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }
		//return 'success';

	}

	public function postBooks()
	{
		$tmp=Input::get('reportto');
		$getallbooks=Bookpublished::where('book_year','>=',Input::get('reportfrom'))->where('book_year','<=',!empty($tmp)?Input::get('reportto'):date('Y'))->orderBy('book_year', 'DESC')->get();
		return View::make('admin.report.books',array('getallbooks'=>$getallbooks));

	}

	public function postBooksdownload()
	{
		$tmp=Input::get('reportto');
		$getallbooks=Bookpublished::where('book_year','>=',Input::get('reportfrom'))->where('book_year','<=',!empty($tmp)?Input::get('reportto'):date('Y'))->orderBy('book_year', 'DESC')->get();
		$data = $getallbooks;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/books'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('books'.$current_time, function($excel) use ($data) {
				$excel->sheet('Books', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);
			$headers = array(
	              'Content-Type: application/xls',
	            );
	        echo url('excel/exports/books'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }
	}

	public function postStudent()
	{

	}

	public function postPrograms()
	{

	}

	public function postEvents()
	{
	$tmp=Input::get('reportto');		
$getallevents=Events::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->orderBy('created_at', 'DESC')->get();
		return View::make('admin.report.event',array('getallevents'=>$getallevents));
	}
	public function postEventsdownload()
	{
		$tmp=Input::get('reportto');
		$getallevents=Events::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->orderBy('created_at', 'DESC')->get();

		$data = $getallevents;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/events'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('events'.$current_time, function($excel) use ($data) {
				$excel->sheet('Events', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);

			
			$headers = array(
	              'Content-Type: application/xls',
	            );
	        echo url('excel/exports/events'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }

	}

	public function postActivities()
	{
	$tmp=Input::get('reportto');		
$getallactivities=Activities::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->orderBy('created_at', 'DESC')->get();
		return View::make('admin.report.activities',array('getallactivities'=>$getallactivities));
	}
	public function postActivitiesdownload()
	{
		$tmp=Input::get('reportto');
		$getallactivities=Activities::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->orderBy('created_at', 'DESC')->get();

		$data = $getallactivities;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/activities'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('activities'.$current_time, function($excel) use ($data) {
				$excel->sheet('Activities', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);

			
			$headers = array(
	              'Content-Type: application/xls',
	            );
	        echo url('excel/exports/activities'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }

	}

	public function postResources()
	{

	}

	public function postNews()
	{
	$tmp=Input::get('reportto');			
$getallnews=News::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->where('news_type','=',1)->orderBy('created_at', 'DESC')->get();
		return View::make('admin.report.news',array('getallnews'=>$getallnews));
	}
	public function postNewsdownload()
	{
		$tmp=Input::get('reportto');
		$getallnews=News::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->where('news_type','=',1)->orderBy('created_at', 'DESC')->get();

		$data = $getallnews;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/news'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('news'.$current_time, function($excel) use ($data) {
				$excel->sheet('News', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);

			
			$headers = array(
	              'Content-Type: application/xls',
	            );
	        echo url('excel/exports/news'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }

	}

	public function postAnnouncement()
	{
	$tmp=Input::get('reportto');			
$getallannouncement=News::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->where('news_type','=',2)->orderBy('created_at', 'DESC')->get();
		return View::make('admin.report.announcement',array('getallannouncement'=>$getallannouncement));
	}
	public function postAnnouncementdownload()
	{
		$tmp=Input::get('reportto');
		$getallannouncement=News::where('created_at','>=',date("Y-m-d", strtotime(Input::get('reportfrom'))))->where('created_at','<=',date("Y-m-d", strtotime(!empty($tmp)?Input::get('reportto'):date('Y-m-d'))))->where('news_type','=',2)->orderBy('created_at', 'DESC')->get();

		$data = $getallannouncement;
		$current_time = strtotime(date('d-m-Y H:i:s'));
		$file = public_path('excel/exports').'/announcement'.$current_time.'.xls';
		if (!file_exists($file)) {
			Excel::create('announcements'.$current_time, function($excel) use ($data) {
				$excel->sheet('Announcements', function($sheet) use ($data)
		        {
					$sheet->fromArray($data);
		        });
			})->store('xls', public_path('excel/exports'), true);

			
			$headers = array(
	              'Content-Type: application/xls',
	            );
	        echo url('excel/exports/announcements'.$current_time.'.xls');
	    }else{
	    	return "false";
	    }

	}
}
