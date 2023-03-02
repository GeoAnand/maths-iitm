<?php
class UseractivityController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Users Controller
	|--------------------------------------------------------------------------
	| all operation related to a user will be defined here .
	|
	|
	*/

	public function getLogin()
	{
		if(!Auth::check())
			return View::make('user.login');	
		else
			return Redirect::to('/');
	}


	public function postLogin(){

		if(Input::get('remember'))
			$rememberme=true;
		else
			$rememberme=false;

		$userid=User::where('user_email','=',Input::get('email'))->count();
		$existuserid=0;
		
		if($userid) 
		{
			//if activated then check for login 
			if(Auth::attempt(array('user_email'=>Input::get('email'), 'password'=>Input::get('password')),$rememberme)) 
			{
				return "success";
			}
			else
			{
			
				return "error";
			}
				
		}
		else
		{
			//email not exist| user not registered
			//error login
			
			return "email does not exist!!";

		}
	}

	//logout
	public function getLogout() 
	{
		Auth::logout();
	   	return Redirect::to('/');
	   	//return 'Your are now logged out!';
	}

	public function postChangepassword()
	{
		$userid=Auth::user()->id;
		$getoldpass=Auth::user()->password;
		if(Hash::check(Input::get('oldpassword'), $getoldpass))
		{
			
			$getuser=User::find($userid);
			$getuser->password=Hash::make(Input::get('newpassword'));
			try
			{
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
	public function postMyinfo($id)
	{
		$getdetails=User::find($id);
		return View::make('user.editmyinfo',array('getdetails'=>$getdetails));
	}

	public function postUpdateprofile($id)
	{
		if($id>0)
		{
			$getuserdata=User::find($id);

			$getuserdata->user_title=Input::get('usertitle');
			$getuserdata->user_fname=Input::get('fname');
			$getuserdata->user_lname=Input::get('lname');
			$getuserdata->user_office=Input::get('office');
			$getuserdata->user_phone=Input::get('phoneno');
			$getuserdata->user_researchfield=Input::get('researchfield');
			$getuserdata->user_designation=Input::get('designation');
			$getuserdata->user_lab_office_stores=Input::get('offlabstore');
			$getuserdata->user_personal_homepage=Input::get('homepage');

			$usergroup=array_values(array_filter(explode(',',$getuserdata->ingroup)));
			if(!in_array(Input::get('ingroup'), $usergroup))
			{
				$getuserdata->ingroup=$getuserdata->ingroup.','.Input::get('ingroup');
			}

			$getuserdata->save();

			//update group table too

			$group=array_filter(explode(',',Input::get('ingroup')));
			for($i=0; $i < count($group); $i++) 
			{ 
				//check if user is there or not 
				$getgruopdetails=Researchgroup::find($group[$i]);
				$getuserarray=array_values(array_filter(explode(',',$getgruopdetails->researchgroup_users)));
				if(!in_array($id, $getuserarray))
				{
					$getgruopdetails->researchgroup_users=$getgruopdetails->researchgroup_users.','.$id;
					$getgruopdetails->save();
				}
				else
				{
					echo "skip";
				}
				//if already there the skip it 

				//else add a new user
			}

			return "success";

		}
		else
		{
			return "error";
		}
	}

	public function postChageprofilepics($id)
	{
		if($id>0)
		{
			$imginfo=User::find($id);
			$filename ="";
			//if empty then don't update 
			if(Input::hasFile('changepics'))
			{
				$destinationPath = public_path().'/images/profilepic/';	
		        if (!file_exists($destinationPath)) {
				    mkdir($destinationPath, 0777, true);
				}
		        $ext = Input::file('changepics')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
				//$filename = uniqid("profilepics_").'.'.$ext;
				$filename = $imginfo['username'].'.'.$ext;		        
		        Input::file('changepics')->move($destinationPath, $filename);
			}
			$imginfo->user_profilepics=$filename;
			$imginfo->save();

			return Response::json(['success' => true, 'file' => $filename]);
		}
		else
		{
			return "Error in Authentiaction";
		}
	}

	public function postChangecv($id)
	{
		if($id>0)
		{
			$cv=User::find($id);
			$filename ="";
			//if empty then don't update 
			if(Input::hasFile('changecv'))
			{
				$destinationPath = public_path().'/cv/';	
		        if (!file_exists($destinationPath)) {
				    mkdir($destinationPath, 0777, true);
				}
		        $ext = Input::file('changecv')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
				//$filename = uniqid("profilepics_").'.'.$ext;
				$filename = $cv['username'].'.'.$ext;		        
		        Input::file('changecv')->move($destinationPath, $filename);
			}
			$cv->user_cv=$filename;
			$cv->save();

			return Response::json(['success' => true, 'file' => $filename]);
		}
		else
		{
			return "Error in Authentiaction";
		}
	}

	public function postLeavegroup($id)
	{
		$findgroup=Researchgroup::find(Input::get('gruopid'));
		$done=0;
		if(count($findgroup))
		{
			$getusers=array_values(array_filter(explode(',',$findgroup->researchgroup_users)));
			//print_r($getusers);
			for($i=0; $i <count($getusers) ; $i++) 
			{ 
				
				if($getusers[$i]==$id)
				{
					unset($getusers[$i]);
					/*$setusers=array_values($getusers);
					print_r($setusers);*/
					$findgroup->researchgroup_users=implode(',',array_values($getusers));
					$findgroup->save();
					$done=1;
				}
			}			
			if($done==1)
			{
				//remove from user table also , "ingroup" column.
				$usertable=User::find($id);
				$usergroup=array_values(array_filter(explode(',',$usertable->ingroup)));
				for($i=0; $i <count($usergroup) ; $i++) 
				{ 				
					if($usergroup[$i]==Input::get('gruopid'))
					{
						unset($usergroup[$i]);
						// $setusers=array_values($usergroup);
						// print_r($setusers);
						$usertable->ingroup=implode(',',array_values($usergroup));
						$usertable->save();
						$done=2;
					}
				}
			}

			if($done==2)
				return "success";	
			else
				return "error";
		}
		else
		{
			return "error";
		}
	}

	public function postDeleteuser($id)
	{
		$getuser=User::find($id);
		if(count($getuser))
		{
			try
			{
									
				$getuser->delete();
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

	public function getUpdateuser($id)
	{
		if($id)
		{
			$getuser=user::find($id);
			if(count($getuser))
				return View::make('admin.people.editpplinfobyadmin',array('getuser'=>$getuser));
			else
				return "Unknown Request !";
		}
	}

	public function postUpdateuser($id)
	{
		$getuser=User::find($id);
		if(count($getuser))
		{
			if($getuser->user_type=='Faculty')
			{
				
				try
			{
					$x=json_decode(file_get_contents(public_path().'/js/admin/data/facultydatatable.json'));					
				}
				catch(Exception $e)
				{
					return 0;
				}

				for($i=0;$i<count($x->aaData);$i++)
				{
					if($x->aaData[$i]->datauid==$id)
					{
						$x->aaData[$i]->name=Input::get('fname').' '.Input::get('lname');
						$x->aaData[$i]->designation=Input::get('designation');
						$x->aaData[$i]->phone=Input::get('phone');
						$x->aaData[$i]->office=Input::get('office');
						try
					{
							file_put_contents(public_path().'/js/admin/data/facultydatatable.json',json_encode($x));
						}
						catch(Exception $e)
						{
							return 0;
						}
						break;
				}
				}
		}
			else if($getuser->user_type=='Scientific-Officer')
			{
			try
				{
					$x=json_decode(file_get_contents(public_path().'/js/admin/data/scientificofficer.json'));					
			}
				catch(Exception $e)
				{
					return 0;
				}

				for($i=0;$i<count($x->aaData);$i++)
				{
					if($x->aaData[$i]->datauid==$id)
					{
						$x->aaData[$i]->name=Input::get('fname').' '.Input::get('lname');
						$x->aaData[$i]->designation=Input::get('designation');
					$x->aaData[$i]->phone=Input::get('phone');
						$x->aaData[$i]->office=Input::get('office');
						try
						{
							file_put_contents(public_path().'/js/admin/data/facultydatatable.json',json_encode($x));
						}
						catch(Exception $e)
						{
						return 0;
						}
					break;
					}
				}
			}
			else if($getuser->user_type=='Staff')
			{
				try
				{
				$x=json_decode(file_get_contents(public_path().'/js/admin/data/staff.json'));					
				}
				catch(Exception $e)
				{
					return 0;
				}
				for($i=0;$i<count($x->aaData);$i++)
				{
					if($x->aaData[$i]->datauid==$id)
					{
						$x->aaData[$i]->name=Input::get('fname').' '.Input::get('lname');
					$x->aaData[$i]->designation=Input::get('designation');
						$x->aaData[$i]->phone=Input::get('phone');
						$x->aaData[$i]->office=Input::get('office');
						try
					{
							file_put_contents(public_path().'/js/admin/data/facultydatatable.json',json_encode($x));
					}
						catch(Exception $e)
						{
							return 0;
						}
						break;
					}
				}
			}

			//save into database
			// if($getuser->user_type=='Faculty')
			// {
			// 	if (Input::get('facultytype')=='faculty') {
			// 		$usersubtype = 'Faculty';
			// 		$usersubtypesort = 0;
			// 	}elseif (Input::get('facultytype')=='distinguished') {
			// 		$usersubtype = 'Distinguished&nbsp;Faculty';
			// 		$usersubtypesort = 1;
			// 	}elseif (Input::get('facultytype')=='adjunct') {
			// 		$usersubtype = 'Adjunct&nbsp;Faculty';
			// 		$usersubtypesort = 2;
			// 	}elseif (Input::get('facultytype')=='visiting') {
   //                                      $usersubtypesort = 3;
   //                                      $usersubtype = 'Visiting&nbsp;Faculty';
   //                              }
			// }
			// $getuser->user_subtype=$usersubtype;
			// $getuser->user_subtype_sort=$usersubtypesort;
			$getuser->user_fname=Input::get('fname');
			$getuser->user_lname=Input::get('lname');
			$getuser->user_office=Input::get('office');
			$getuser->user_phone=Input::get('phone');
			$getuser->user_designation=Input::get('designation');
			try
			{
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
}
