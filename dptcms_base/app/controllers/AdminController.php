<?php

class AdminController extends \BaseController {

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


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		if(Auth::check() && (Auth::user()->userprivileg->people==1))
		{
			return View::make('admin.people.create');
		}
		else
		{
			return Redirect::to('login');
		}
				
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
			
			$validator = Validator::make(Input::all(), User::$addduserule); 
		   	if ($validator->passes()) 
		   	{
		   		if ((Input::get('usertype')=='Post Doctoral Fellows')||(Input::get('usertype')=='PhD'))
				{
					//$rand = substr(md5(microtime()),rand(0,26),8);
					$newUser=new User();
					$newUser->user_type=Input::get('usertype');
					$newUser->user_title=Input::get('usertitle');
					$newUser->user_fname=Input::get('fname');
					$newUser->user_lname=Input::get('lname');
					$newUser->user_email=Input::get('email');
					
					$newUser->user_active=1;
					$newUser->user_office=Input::get('office');
					$newUser->user_phone=Input::get('phone');
					$newUser->user_researchfield="";
					$newUser->user_designation=Input::get('designation');
					$newUser->user_lab_office_stores="";
					$tmp=explode('@',Input::get('email'));
					$newUser->password=Hash::make($tmp[0]);
					$newUser->user_namehandle=$tmp[0];
					$newUser->username = $tmp[0];
					$newUser->user_profilepics="";
					$newUser->isadmin=0;
					try
					{
						$newUser->save();
						$newprivileges=new Userprivileg;
						$newprivileges->user_id=$newUser->id;
						$newprivileges->people=0;
						$newprivileges->student=0;
						$newprivileges->research=0;
						$newprivileges->programs=0;
						$newprivileges->events=0;
						$newprivileges->resources=0;
						$newprivileges->newannouncement=0;
						$newprivileges->createadmin=0;
						$newprivileges->save();

						// $user = array(
						//     'email'=>Input::get('email'),
						//     'name'=>Input::get('fname').' '.Input::get('lname')
						// );			 
						// the data that will be passed into the mail view blade template
						// $data = array(
						//     'detail'=>'Department of Mathematics | IIT, Madras',
						//     'name'  => $user['name'],
						//     'activation_code'=>$tmp,
						//     'email'=>$user['email'],
						//     'else'=>0,
						// );
						 
						// use Mail::send function to send email passing the data and using the $user variable in the closure
						
						// Mail::send('welcome', $data, function($message) use ($user)
						// {
						//    $message->from('notifications@tmath.iitm.ac.in', 'Department of Mathematics | IIT, Madras');
						//    $message->to("alokmail108@gmail.com")->cc('deptcmsapp@gmail.com')->subject('Invitation Requested for Taskano 1.0!');
						// });
						
						// if( count(Mail::failures()) > 0 ) {

						//    echo "There was one or more failures. They were: <br />";

						//    foreach(Mail::failures as $email_address) {
						//        echo " - $email_address <br />";
						//     }

						// } else {
						//     echo "No errors, all sent successfully!";
						// }
						return "true";
					}
					catch(\Exception $e)
					{
					    echo $e;
					    return "false";
					}
				} 
				else 
				{
				
					$rand = substr(md5(microtime()),rand(0,26),8);
					$newUser=new User();
					$newUser->user_type=Input::get('usertype');
					// if (Input::get('facultytype')=='faculty') {
					// 	$usersubtype = 'Faculty';
					// 	$usersubtypesort = 0;
					// }elseif (Input::get('facultytype')=='distinguished') {
					// 	$usersubtype = 'Distinguished&nbsp;Faculty';
					// 	$usersubtypesort = 1;
					// }elseif (Input::get('facultytype')=='adjunct') {
					// 	$usersubtype = 'Adjunct&nbsp;Faculty';
					// 	$usersubtypesort = 2;
					// }elseif (Input::get('facultytype')=='visiting') {
	    //                                     $usersubtype = 'Visiting&nbsp;Faculty';
	    //                                     $usersubtypesort = 3;
	    //                            }      
					//$newUser->user_subtype=$usersubtype;
					//$newUser->user_subtype_sort=$usersubtypesort;
					$newUser->user_title=Input::get('usertitle');
					$newUser->user_fname=Input::get('fname');
					$newUser->user_lname=Input::get('lname');
					$newUser->user_email=Input::get('email');
					$newUser->password=Hash::make($rand);
					$newUser->user_active=1;
					$newUser->user_office=Input::get('office');
					$newUser->user_phone=Input::get('phone');
					$newUser->user_researchfield="";
					$newUser->user_designation=Input::get('designation');
					$newUser->user_lab_office_stores="";
					$tmp=explode('@',Input::get('email'));
					$newUser->user_namehandle=$tmp[0];
					$newUser->username = $tmp[0];
					$newUser->user_profilepics="";
					//$newUser->remember_token="";
					// $newUser->user_sex=Input::get('sex');
					// $newUser->user_dob="";
					$newUser->isadmin=0;
					try
					{
						$newUser->save();
						$newprivileges=new Userprivileg;
						$newprivileges->user_id=$newUser->id;
						$newprivileges->people=0;
						$newprivileges->student=0;
						$newprivileges->research=0;
						$newprivileges->programs=0;
						$newprivileges->events=0;
						$newprivileges->resources=0;
						$newprivileges->newannouncement=0;
						$newprivileges->createadmin=0;
						$newprivileges->save();
						return "true";
					}
					catch(\Exception $e)
					{
					    return "false";
					}
				}
			}elseif ((Input::get('usertype')=='Staff')||(Input::get('usertype')=='Retired-Faculty')) {
				$rand = substr(md5(microtime()),rand(0,26),8);
				$newUser=new User();
				$newUser->user_type=Input::get('usertype');
				$newUser->user_title=Input::get('usertitle');
				$newUser->user_fname=Input::get('fname');
				$newUser->user_lname=Input::get('lname');
				$newUser->user_email=Input::get('email');
				$newUser->password=Hash::make($rand);
				$newUser->user_active=1;
				$newUser->user_office=Input::get('office');
				$newUser->user_phone=Input::get('phone');
				$newUser->user_researchfield="";
				$newUser->user_designation=Input::get('designation');
				$newUser->user_lab_office_stores="";
				$tmp=explode('@',Input::get('email'));
				$newUser->user_namehandle=$tmp[0];
				$newUser->username = $tmp[0];
				$newUser->user_profilepics="";
				$newUser->isadmin=0;
				try
				{
					$newUser->save();
					$newprivileges=new Userprivileg;
					$newprivileges->user_id=$newUser->id;
					$newprivileges->people=0;
					$newprivileges->student=0;
					$newprivileges->research=0;
					$newprivileges->programs=0;
					$newprivileges->events=0;
					$newprivileges->resources=0;
					$newprivileges->newannouncement=0;
					$newprivileges->createadmin=0;
					$newprivileges->save();
					return "true";
				}
				catch(\Exception $e)
				{
				    return "false";
				}
			}
			else
			{
				return "Email id already exist !";
		    }

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$newUser=User::find($id);
		if(count($newUser))
		{
			return "View Create!!";
		}
		else
		{
			return Response::view('errors.missing');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		
	}


	public function adminindex()
	{
		if(Auth::check() && (Auth::user()->userprivileg->people==1 || Auth::user()->userprivileg->student==1 || Auth::user()->userprivileg->research==1||Auth::user()->userprivileg->programs==1||Auth::user()->userprivileg->events==1 || Auth::user()->userprivileg->resources==1 || Auth::user()->userprivileg->bookings==1 || Auth::user()->userprivileg->newannouncement==1|| Auth::user()->userprivileg->createadmin==1))
		{
			$getcontent=Staticcontent::where('whichlocation','=','home')->get();
			return View::make('admin/home',array('getcontent'=>$getcontent));
		}
		// if (Auth::check()) {
		// 	$getcontent=Staticcontent::where('whichlocation','=','home')->get();
		// 	return View::make('admin/home',array('getcontent'=>$getcontent));
		// }
		else
		{
			return Redirect::to('login');
		}
	}

	public function getHome()
	{
		if(Auth::check() && (Auth::user()->userprivileg->people==1 || Auth::user()->userprivileg->student==1 || Auth::user()->userprivileg->research==1||Auth::user()->userprivileg->programs==1||Auth::user()->userprivileg->events==1 || Auth::user()->userprivileg->resources==1 || Auth::user()->userprivileg->bookings==1 || Auth::user()->userprivileg->newannouncement==1|| Auth::user()->userprivileg->createadmin==1))
		{
			$getcontent=Staticcontent::where('whichlocation','=','home')->get();
			return View::make('admin/home',array('getcontent'=>$getcontent));
		}
		else
		{
			return Redirect::to('login');
		}
	}

	/*public function getPeople($type)
	{
		if($type=='faculty')
		{
			return View::make('admin/people/faculty');
		}
		elseif ($type=='scientific-officer') 
		{
			return View::make('admin/people/scientific-officer');
		}
		elseif ($type=='stuent') 
		{
			return View::make('admin/people/student');
		}
		elseif ($type=='staff')
		{
			return View::make('admin/people/staff');
		}    	
	}*/

	/*public function getResearch($type)
	{
		if($type=='research-area')
		{
			return View::make('admin/research/research-area');
		}
		elseif($type=='research-groups') 
		{
			return View::make('admin/research/research-groups');
		}
		elseif ($type=='recent-publications') 
		{
			return View::make('admin/research/recent-publications');
		}
	}
*/
	public function getPrograms($id)
	{		
		if(Auth::check() && (Auth::user()->userprivileg->programs==1))
		{
			$getprogdetails=Programs::find($id);
			if(count($getprogdetails))
			{
				$data=array(
					'getprogdetails'=>$getprogdetails,
					);
				return View::make('admin.programs.programview',$data);
			}
			else
			{
				return Response::view('errors.missing');
			}
		}
		else
		{
			return Redirect::to('login');
		}

	}

	// public function getEvents($id)
	// {
	// 	$geteventfortype=Events::where('events_type_id','=',$id)
	// 	->where('publish','=',1)->where('events_archive','=',0)->get();
		
	// 	if(count($geteventfortype))
	// 	{
			
	// 		return View::make('admin.event.view',array('geteventfortype'=>$geteventfortype));
	// 	}
	// 	else
	// 	{
	// 		return Response::view('errors.missing');
	// 	}
	// }

	// public function getResources($type)
	// {
	// 	return View::make('admin/resource/dcf');
	// }

	// public function getContact()
	// {
	// 	if(Auth::check() && (Auth::user()->userprivileg->people==1 || Auth::user()->userprivileg->student==1 || Auth::user()->userprivileg->research==1||Auth::user()->userprivileg->programs==1||Auth::user()->userprivileg->events==1 || Auth::user()->userprivileg->resources==1 || Auth::user()->userprivileg->bookings==1 || Auth::user()->userprivileg->newannouncement==1|| Auth::user()->userprivileg->createadmin==1))
	// 	{
	// 		return View::make('admin/contact');
	// 	}
	// 	else
	// 	{
	// 		return Redirect::to('login');
	// 	}
		
	// }
	
	public function getSettings()
	{
		return View::make('admin/settings');
	}

	public function getSlider()
	{
		$getallslider=Carousel::all();
		return View::make('admin.slider.view',array('getallslider'=>$getallslider));
	}

	public function getAddsliderimage()
	{
		return View::make('admin.slider.view');
	}
	
	public function postHomecontent()
	{
		try
		{
			//User::where('votes', '>', 100)->update(array('status' => 2));
			Staticcontent::where('whichlocation','=','home')->update(array('content'=>Input::get('homecontent'), 'doneby'=>Auth::user()->id));
			//Session::flash('message', 'Content Updated Successfully');
			return "true";
		}
		catch(\Exception $e)
		{
		    return "false";
		}		
	}

	public function getContactdetails()
	{
		if(Auth::check() && ( Auth::user()->userprivileg->resources==1 ))
		{
			$getcontact=Contact::take(1)->get();
			return View::make('admin.contact',array('getcontact'=>$getcontact));
		}
		else
		{
			return Redirect::to('login');
		}
		
	}

	public function postUpdatecontact($id)
	{
		$updatecontact=Contact::find($id);
		$updatecontact->contact_for=Input::get('heading');
		$updatecontact->contact_details=Input::get('detailaddress');
		$updatecontact->contact_email=Input::get('hodemail');
		$updatecontact->contact_office_email=Input::get('officeemial');
		$updatecontact->contact_updated_by=Auth::user()->id;
		try
		{
			$updatecontact->save();
			return 1;
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	public function getChangepermission()
	{
		if(Auth::check() && (Auth::user()->userprivileg->createadmin==1))
		{
			return View::make('admin.people.changepermission');
		}
		else
		{
			return Redirect::to('login');
		}

	}

	public function getAlluser()
	{
		 return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','users.user_email'))->where('users.issuper','=','0'))
		 ->add_column('operations',
		    	'<a href="#" data-id="{{{$id}}}" class="iframe btn btn-xs btn-info viewpermission">View Privileges</a>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}

	public function postChangeuserpermission()
	{
		try
		{
			Userprivileg::where('user_id','=',Input::get('userid'))->update(array('people'=>Input::get('people'),'student'=>Input::get('student'),'events'=>Input::get('events'),'resources'=>Input::get('resource'),'bookings'=>Input::get('bookings'),'newannouncement'=>Input::get('newannouncement'),'programs'=>Input::get('programs'),'createadmin'=>Input::get('createadmin'), 'research'=>Input::get('research')));
			return 1;
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	public function postAbailablepermission()
	{
		$getuser=User::find(Input::get('uid'));
		return View::make('admin.people.availablepermission',compact('getuser'));
	}

	public function postChangepermission()
	{
		$finduser=User::find(Input::get('makeppladmin'));
		if(count($finduser))
		{
			if(Input::get('giveadminprivilege')=='on')
			{
				$finduser->isadmin=1;
				try
				{
					$finduser->save();
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
		else
		{
			return 2;
		}
	}
	public function postRevokepermission()
	{
		$getuser=User::find(Input::get('removeadmin'));
		if(count($getuser))
		{
			try
			{
				$getuser->isadmin=0;
				$getuser->save();
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

	public function getAllfaculty()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','Faculty'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	public function getAllinspirefaculty()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','Inspire-Faculty'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	public function getAllvisitingfaculty()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','Visiting-Faculty'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	public function getAllpdf()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','Post-Doctoral-Fellows'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span> <span class="btn btn-sm btn-primary changepassword" data-id="{{$id}}"><i class="fa fa-lock"></i> Change Password</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	public function getAllstaff()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','Staff'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	public function getAllretiredfaculty()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','Retired-Faculty'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	public function getAllphd()
	{
		return Datatables::of(User::select(array('users.id','users.user_fname','users.user_lname','user_designation','users.user_email','user_phone','user_office'))->where('users.user_type','=','PhD'))
		 ->add_column('operations',
		    	'<span class="btn btn-sm btn-info editpeople" style="margin: 1px;" data-id="{{{$id}}}"><i class="fa fa-edit-o"></i> Edit</span><span class="btn btn-sm btn-danger deletepeople" data-id="{{{$id}}}"><i class="fa fa-trash-o"></i>Remove</span> <span class="btn btn-sm btn-primary changepassword" data-id="{{$id}}"><i class="fa fa-lock"></i> Change Password</span>')
		 ->edit_column('user_fname', '{{{$user_fname." ".$user_lname}}}')
		 ->remove_column('id')
		 ->remove_column('user_lname')
		 ->make();
	}
	
}
