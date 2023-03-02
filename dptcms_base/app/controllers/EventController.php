<?php

class EventController extends BaseController {

	public function getDashboard()
	{
		return View::make('admin.event.dashboard');
	}

	public function getCreateeventcat($id=false)
	{
		if(Auth::check() )
		{
			if (!empty($id)) {
				$eventcat=Eventcategory::find($id);
				$eventtype = Eventcategory::find($id)->events_type_name;
				$eventtypeid = Eventcategory::find($id)->id;

				return View::make('admin.event.eventcatedit', array('eventcat'=>$eventcat, 'eventtype'=>$eventtype, 'eventtypeid'=>$eventtypeid));
			} else {
				return View::make('admin.event.eventcatcreate');
			}
			
		}
		else
		{
			return "Un-Authorized access";
		}
	}

	public function postCreateeventcat($id=0)
	{
		if(Auth::check() )
		{
			if($id==0)
			{
				$neweventcat=new Eventcategory();
				$neweventcat->events_type_name=Input::get('eventcatname');
				$neweventcat->events_type_created_by=Auth::user()->id;
				$neweventcat->save();
				return $neweventcat->id;
			}
			elseif($id>0)
			{
				//update
				$eventcat=Eventcategory::find($id);
				if(count($eventcat)){
					$eventcat->events_type_name=Input::get('eventcatname');
					$eventcat->events_type_created_by=Auth::user()->id;
					$eventcat->save();

					$getallevents=Eventcategory::orderBy('events_date','DESC')->get();
					$newMenu='';
				    foreach($getallevents as $val)
				    {
				        $newMenu.='<li class="nav-link"><a href="admin/events/details/'.$val->id.'">'.$val->events_type_name.'</a>
				        </li>';
				    }
				    $newMenu.='<li class="nav-link"> <a href="admin/events/create">+ Add Event</a></li>';
				    $newMenu.='<li class="nav-link"><a href="admin/events/createeventcat">+ Add Event Category</a></li>';

				    $data=array('newMenu'=>$newMenu,'updated'=>"true");
				    return $data;

				}else{
					$data = array('updated'=>'Error! No such Event Type Exist.');
					return $data;
				}
			}
		}
		else
		{
			return "Un-Authorized access";
		}
		
	}

	public function postDeleteeventcategory($id)
	{
		if(Auth::check() )
		{
			if($id>0)
			{
				$deleteeventcat=Eventcategory::find($id);
				try 
				{
					$deleteeventcat->delete();
					$error = 0;

					$getevents=Events::where('events_type_id','=',$id)->get();
					foreach ($getevents as $event) {
						$event->delete();
					}
					
				} catch (Exception $e) 
				{
					echo $e;
					$error = 1;
				}	
				
				if($error==0)
				{
					$getallevents=Eventcategory::orderBy('events_date','DESC')->get();
					$newMenu='';
				    foreach($getallevents as $val)
				    {
				        $newMenu.='<li class="nav-link"><a href="admin/events/details/'.$val->id.'">'.$val->events_type_name.'</a>
				        </li>';
				    }
				    $newMenu.='<li class="nav-link"> <a href="admin/events/create">+ Add Event</a></li>';
				    $newMenu.='<li class="nav-link"><a href="admin/events/createeventcat">+ Add Event Category</a></li>';

				    $data=array('newMenu'=>$newMenu,'deleted'=>"true");


				    
				
					return $data;
				}
				else
				{
					$data=array('deleted'=>"false");
					return $data;
				}	
			}
			else
			{
				$data=array('deleted'=>"No such Event Type exist!");
				return $data;
			}
			
		}
		else
		{
			$data=array('deleted'=>"Unauthorized Access !");
			return $data;
		}
	}

	public function getCreate()
	{
		if(Auth::check() )
		{
			$getalleventcat=Eventcategory::all();
			$getalleventplace=Conferencehall::all();
			return  View::make('admin.event.create',array('eventcat'=>$getalleventcat, 'eventplace'=>$getalleventplace)); 
		}
		else
		{
			return "Error! Unauthorized access";
		}
	}

	public function getEdit($id)
	{
		if(Auth::check() && Auth::user()->isadmin==1)
		{
			$getalleventcat=Eventcategory::all();
			$geteventdetail=Events::where('id','=',$id)->get();
			$getalleventplace=Conferencehall::all();
			return View::make('admin.event.edit', array('eventcat'=>$getalleventcat, 'eventdetail'=>$geteventdetail, 'eventplace'=>$getalleventplace));
		}
		else
		{
			return "Error! Unauthorized access.";
		}
	}

	public function postCreate($id=0)
	{
		if(Auth::check() )
		{
			if($id==0)
			{
				$newevent=new Events();
				$newevent->events_name=Input::get('eventname');
				$newevent->events_desc=Input::get('eventdesc');
				$newevent->events_date=Input::get('eventdate');
				$newevent->events_end_date=Input::get('eventenddate');
				$newevent->events_starttime=Input::get('eventstarttime');
				$newevent->events_endtime=Input::get('eventendtime');
				$newevent->events_place=Input::get('eventplace');
				$newevent->events_type_id=Input::get('forwhichcat');
				$newevent->externallink=Input::get('eventlink');
				$newevent->mainspeaker=Input::get('eventspeaker');
				$newevent->publish=Input::get('eventpublish');
				$newevent->events_show_in_menu='1'; //default 1
				$newevent->events_archive='0'; //default 0 , if 1 then don't show it in view ..
				$newevent->events_created_by=Auth::user()->id;
				if(Input::hasFile('posterimage'))
				{
					$destinationPath = public_path().'/siteimages/eventimage/';	
			        if (!file_exists($destinationPath)) {
					    mkdir($destinationPath, 0777, true);
					}
			        $ext = Input::file('posterimage')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
					$filename = uniqid("event_").'.'.$ext;
			        $uploadSuccess=Input::file('posterimage')->move($destinationPath, $filename);
				    $newevent->posterimage=$filename;
				}
				//$newevent->needpage=Input::get('wantanewpage');	
				$newevent->needpage=1;		
				try
				{
					$newevent->save();
					return 1;
				}
				catch(Exception $e)
				{
					return $e;
				}
			}
			else if($id > 0)
			{
				// Update Existing Event				
				$editevent=Events::find($id);
				if(count($editevent)){
					$editevent->events_name=Input::get('eventname');
					$editevent->events_desc=Input::get('eventdesc');
					$editevent->events_date=Input::get('eventdate');
					$editevent->events_end_date=Input::get('eventenddate');
					$editevent->events_starttime=Input::get('eventstarttime');
					$editevent->events_endtime=Input::get('eventendtime');
					$editevent->events_place=Input::get('eventplace');
					$editevent->events_type_id=Input::get('forwhichcat');
					$editevent->externallink=Input::get('eventlink');
					$editevent->mainspeaker=Input::get('eventspeaker');
					$editevent->publish=Input::get('eventpublish');
					$editevent->events_show_in_menu='1'; //default 1
					$editevent->events_archive='0'; //default 0 , if 1 then don't show it in view ..
					$editevent->events_created_by=Auth::user()->id;
					if(Input::hasFile('posterimage'))
					{
						$destinationPath = public_path().'/siteimages/eventimage/';	
				        if (!file_exists($destinationPath)) {
						    mkdir($destinationPath, 0777, true);
						}
				        $ext = Input::file('posterimage')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
						$filename = uniqid("event_").'.'.$ext;
				        $uploadSuccess=Input::file('posterimage')->move($destinationPath, $filename);
					    $editevent->posterimage=$filename;
					}
					//$editevent->needpage=Input::get('wantanewpage');			
					try
					{
						$editevent->save();
						$data  = array('updated'=>'true', 'eventcat'=>Input::get('forwhichcat'));
						return $data;
					}
					catch(Exception $e)
					{
						$data = array('updated'=>'false' );
						return $data;
					}
				}
				else{
					$data = array('updated'=>'Error! No such Event Exist.');
					return $data;
				}
			}
		}
		else
		{
			return "Error! Unauthorized Access.";
		}
	}

	public function getEvents($id)
	{
		
		$geteventtype=Eventcategory::find($id);

		if(count($geteventtype))
		{
			$getcatname=Eventcategory::find($id);

			$geteventfortype=Events::where('events_type_id','=',$id)->where('publish','=',1)->where('events_archive','=',0)->orderBy('events_date','ASC')->get();

			$geteventfortpe=Events::where('events_type_id','=',$id)->where('publish','=',1)->where('events_archive','=',0)->orderBy('events_date','DESC')->get(); // ADDED BY NARAYANAN 
		//	$geteventfortype=Events::where('events_type_id','=',$id)->where('publish','=',1)->where('events_archive','=',0)->orderBy(DB::raw("STR_TO_DATE('events_date', '%D-%M-%Y')"),'ASC')->get();
//			$geteventfortype=DB::table('events')->SELECT(DB::raw("* WHERE ( events_type_id = $id AND publish = 1 AND events_archive = 0) ORDER BY (CONVERT(varchar,`events_date`, 11)) ASC)"));
			//var_dump($geteventfortype); exit;

			// $orderByDate = $my2 = array();
			// foreach($geteventfortype as $key=>$row)
			// {
			//     $my2 = explode('-',$row['events_date']);
			//     $my_date2 = $my2[1].'/'.$my2[0].'/'.$my2[2];        
			//     $orderByDate[$key] = strtotime($my_date2);  
			// }    
			// array_multisort($orderByDate, SORT_DESC, $geteventfortype);
			// foreach ($orderByDate as $event) {
			// 	echo $event['events_name']."---".$event['events_date']."</br>";
			// }
			return View::make('event.view',array('geteventfortype'=>$geteventfortype,'getcatname'=>$getcatname,'geteventfortpe'=>$geteventfortpe)); // EDITED BY NARAYANAN
		}
		else
		{
			return Response::view('errors.missing');
		}
	}

	public function getDetails($id)
	{
		$geteventfortype=Events::where('events_type_id','=',$id)
		->where('publish','=',1)->where('events_archive','=',0)->orderBy('events_date','DESC')->get();
		$geteventfortpe=Events::where('events_type_id','=',$id)
		->where('publish','=',1)->where('events_archive','=',0)->orderBy('events_date','ASC')->get();
		
		$eventtype = Eventcategory::find($id)->events_type_name;
		$eventtypeid = Eventcategory::find($id)->id;
		
		return View::make('admin.event.view',array('geteventfortype'=>$geteventfortype, 'eventtype'=>$eventtype, 'eventtypeid'=>$eventtypeid,'getevetfortpe'=>$geteventfortpe)); // EDITED BY NARAYANAN
		
	}

	public function postDelete($id)
	{
		
		if(Auth::check() )
		{
			$getevent=Events::find($id);
			try
			{
				$getevent->delete();
				return 1;
			}
			catch(Exception $e)
			{
				return 0;
			}
		}
		else
		{
			return 2;
		}
	}

	public function getView($id)
	{
		if($id>0)
		{

			$geteventdetails=Events::find($id);
			$eventhall=Conferencehall::where('id', '=', $geteventdetails['events_place'])->pluck('conference_halls_name');
			if(count($geteventdetails))
			{
				return View::make('event.eachevent',array('geteventdetails'=>$geteventdetails, 'eventhall'=>$eventhall));
			}
			else
			{
				return Response::view('errors.missing');
			}
		}
		else
		{
			return Response::view('errors.missing');
		}
	}
}
