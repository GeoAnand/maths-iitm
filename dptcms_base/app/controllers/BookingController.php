<?php

class BookingController extends BaseController {

	public function getAddhalls()
	{
		return View::make('booking.createhall');
	}

	public function postCreatehall($id)
	{
		if($id==0)
		{
			//create 
			$newhall=new Conferencehall();
			$newhall->conference_halls_name=Input::get('hallname');
			$newhall->conference_halls_details=Input::get('halldetails');
			$newhall->conference_halls_incharge=Input::get('inchargename');
			$newhall->conference_halls_contact=Input::get('anyotherdetails');
			$newhall->save();

			return "added successfully !!";


		}
		elseif($id>0)
		{
			//update 
		}
		else
		{
			//nothing
		}
	}

	public function getCreate()
	{
		
		//run schedular to reset all booking data
		/*$getbookingstatus=Booking::where('booking_status','=',1)->get();
		$today=new DateTime(date('d-m-Y'));
		foreach ($getbookingstatus as $key) 
		{
			$bookedlastdate=new DateTime($key->booking_hall_to);

			if($bookedlastdate<$today)
			{
				$key->booking_status=0;
			}
		}*/

		//$checkavailable=

		return View::make('booking.create');
	}

	public function postCreate($id)
	{
		if($id==0)
		{

			//$getbookingstatus=Booking::where('booking_hall_to','<',date('d-m-Y'))->update(array('booking_status'=>0));

			$newbooking=new Booking;
			$newbooking->booking_user_id=Auth::user()->id;
			$newbooking->booking_reasone=Input::get('bookingreason');
			$newbooking->booking_hall_id=Input::get('whichhall');
			$newbooking->booking_hall_from=Input::get('from');
			$newbooking->timefrom=Input::get('timefrom');
			$newbooking->timeto=Input::get('timeto');
			$newbooking->booking_status=1;
			try
			{
				$newbooking->save();
				return 1;
			}
			catch(Exception $e)
			{
				return 0;
			}
		}
		elseif($id>0)
		{
			//update
		}
		else
		{
			//nothing
		}
	}

	public function postAllbookeddates($id)
	{
		$gatdates=Booking::where('booking_hall_id','=',$id)->where('booking_hall_from','>=',date('d-m-Y'))->where('booking_status','=',1)->get();
		$data=array();
		$i=0;
		foreach ($gatdates as $key) {
			$data[$i][0]=$key->booking_hall_from.' '.$key->timefrom;
			$data[$i][1]=$key->booking_hall_from.' '.$key->timeto;
			$i++;
		}
		//return json_encode($data);
		return $data;
	}

	// public  function getPendingbooking()
	// {
	// 	$getpendingbooking=Booking::where('booking_status','=',0)->get();
	// 	return View::make('admin.booking.view',array('getpendingbooking'=>$getpendingbooking));
	// }

	public function postConfirm($id)
	{
		$getbooking=Booking::find($id);
		if(count($getbooking))
		{
			$getbooking->booking_status=1;
			try
			{
				$getbooking->save();
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
	public function postDelete($id)
	{
		$getbooking=Booking::find($id);
		if(count($getbooking))
		{			
			try
			{
				$getbooking->delete();
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
	// public function getBookinghistory()
	// {
	// 	$getallbooking=Booking::where('booking_status','=',1)->get();
	// 	return View::make('admin.booking.history',array('getallbooking'=>$getallbooking));
	// }	

	public function getBookings()
	{
		$getAllactivebookings=Booking::where('booking_status','=',1)->get();
		$getAllcanceledbookings=Booking::where('booking_status','=',0)->get();
		return View::make('admin.booking.bookings',array('getAllactivebookings'=>$getAllactivebookings,'getAllcanceledbookings'=>$getAllcanceledbookings));
	}

	public function getNewbooking()
	{
		return View::make('admin.booking.new');
	}
	
	public function postCancel($id)
	{
		$getbooking=Booking::find($id);
		if(count($getbooking))
		{
			$getbooking->booking_status=0;
			try
			{
				$getbooking->save();
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
}