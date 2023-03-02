<?php

class HomeController extends BaseController {

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

	public function getIndex()
	{
		$handle='NA';
		if($handle=='NA')
		{
			$today=date("Y-m-d"); $lastweek = new DateTime($today); $lastweek->sub(new DateInterval('P7D'));
			$getwelcome=Staticcontent::where('whichlocation','=','home')->get();
			$getallevents=Events::orderBy('events_date','ASC')->where('publish','=','1')->get();
			$getallnews=News::orderBy('news_date','DESC')->where('news_publish','=','1')->where('news_archive','=','0')->where('news_type','=','1')->get();
			$getallupdates=Publications::orderBy('created_at','DESC')->where('year','>=',date('Y')-1)->get();
			$getallannouncements=News::orderBy('news_date','DESC')->where('news_publish','=','1')->where('news_archive','=','0')->where('news_type','=','2')->get();
			$getallslideimage=Slider::all(); 
			//echo "<pre>"; var_dump($getallupdates); echo "</pre>"; exit;			
			return View::make('index',array('getwelcome'=>$getwelcome,'getallevents'=>$getallevents,'getallnews'=>$getallnews,'getallupdates'=>$getallupdates,'getallannouncements'=>$getallannouncements,'getallslideimage'=>$getallslideimage));
		}
		else
		{
			//user personal homepage 
			$details=User::where('user_namehandle','LIKE',"$handle")->get();

			if(count($details))
			{
				if(Auth::check() && Auth::user()->id==$details[0]['id'])
				{
					$allactivities=Activities::where('added_by','=',$details[0]['id'])->orderBy('created_at', 'desc')->get();
					$allcourse=Facultycourse::where('added_by','=',$details[0]['id'])->get();
					$allbook=Bookpublished::where('added_by','=',$details[0]['id'])->get();
					$allpublish=Publications::where('added_by','=',$details[0]['id'])->get();
					$data=array(
							'details'=>$details,
							'canedit'=>TRUE,
							'allactivity'=>$allactivities,
							'allcourse'=>$allcourse,
							'allbook'=>$allbook,
							'allpublish'=>$allpublish
							);
					//return View::make('user.peopledetails',$data);
					return View::make('user.mydetails',$data);
				}
				else
				{
					$allactivities=Activities::where('added_by','=',$details[0]['id'])->orderBy('created_at', 'desc')->get();
					$allcourse=Facultycourse::where('added_by','=',$details[0]['id'])->get();
					$allbook=Bookpublished::where('added_by','=',$details[0]['id'])->get();
					$allpublish=Publications::where('added_by','=',$details[0]['id'])->get();
					$data=array(
							'details'=>$details,
							'canedit'=>FALSE,
							'allactivity'=>$allactivities,
							'allcourse'=>$allcourse,
							'allbook'=>$allbook,
							'allpublish'=>$allpublish
							);
					return View::make('user.peopledetails',$data);
				}
			}
			else
			{
				//else nothing found
				return Response::view('errors.missing');
			}
		}
	}

	public function getPeople()
	{
		if(Auth::check() && (Auth::user()->userprivileg->people==1))
		{
			return View::make('admin.people.view');
		}
		else
		{
			return Redirect::to('login');
		}
	}

	public function getPeopletype($type)
	{
		if(Auth::check() && (Auth::user()->userprivileg->people==1))
		{
			if($type=='Faculty')
			{
				return View::make('admin.people.Faculty');
			}
			elseif($type=='Inspire-Faculty') 
			{
				return View::make('admin.people.Inspire-Faculty');
			}
			elseif($type=='Visiting-Faculty') 
			{
				return View::make('admin.people.Visiting-Faculty');
			}
			elseif($type=='Post-Doctoral-Fellows') 
			{
				return View::make('admin.people.Post-Doctoral-Fellows');
			}
			elseif($type=='Staff') 
			{
				return View::make('admin.people.Staff');
			}
			elseif($type=='Retired-Faculty') 
			{
				return View::make('admin.people.Retired-Faculty');
			}
			elseif($type=='PhD') 
			{
				return View::make('admin.people.PhD');
			}
		}
		else
		{
			return Redirect::to('login');
		}
	}

	public function getSitepeople($type)
	{
		$subtypes=Usertype::where('user_type_name','LIKE',$type)->pluck('user_subtype');
		$getsubtypes=User::where('user_type','LIKE',$type)->select('user_subtype')->groupBy('user_subtype')->groupBy('id')->orderBy('user_subtype_sort', 'asc')->get();
		//get people by type
		$getUser=User::where('user_type','LIKE',$type)->orderBy('user_fname', 'asc')->get();
		return View::make('user.peoplebytype',array('peoplebytype'=>$getUser,'type'=>$type,'subtypes'=>$subtypes, 'getsubtypes'=>$getsubtypes));
	}


	public function getMydetails($handle)
	{
		//user personal homepage 
		$details=User::where('user_namehandle','LIKE',"$handle")->get();

		if(count($details))
		{
			if(Auth::check() && Auth::user()->id==$details[0]['id'])
			{
				$allactivities = Activities::where('added_by','=',$details[0]['id'])->orderBy('created_at', 'DESC')->get();
				$allcourse = Facultycourse::where('added_by','=',$details[0]['id'])->get();
				$allbook=Bookpublished::orderBy('book_year','DESC')->where('added_by','=',$details[0]['id'])->get();
				$allpublish=Publications::orderBy('year','DESC')->where('added_by','=',$details[0]['id'])->get();
				$data=array(
						'details'=>$details,
						'canedit'=>TRUE,
						'allactivities'=>$allactivities,
						'allcourse'=>$allcourse,
						'allbook'=>$allbook,
						'allpublish'=>$allpublish
						);
				return View::make('user.mydetails',$data);
			}
			else
			{
				$allactivities = Activities::where('added_by','=',$details[0]['id'])->where('publish', '=', '1')->orderBy('created_at', 'DESC')->get();
				$allcourse = Facultycourse::where('added_by','=',$details[0]['id'])->get();
				$allbook=Bookpublished::orderBy('book_year','DESC')->where('added_by','=',$details[0]['id'])->get();
				$allpublish=Publications::orderBy('year','DESC')->where('added_by','=',$details[0]['id'])->get();
				$data=array(
						'details'=>$details,
						'canedit'=>FALSE,
						'allactivities'=>$allactivities,
						'allcourse'=>$allcourse,
						'allbook'=>$allbook,
						'allpublish'=>$allpublish
						);
				return View::make('user.peopledetails',$data);
			}
		}
		else
		{
			//else nothing found
			return Response::view('errors.missing');
		}
	}

	public function getPeopledetails($handle)
	{
		//user personal homepage 
		$details=User::where('user_namehandle','LIKE',"$handle")->get();

		if(count($details))
		{
				$allactivities = Activities::where('added_by','=',$details[0]['id'])->where('publish', '=', '1')->orderBy('created_at', 'desc')->get();
				$allcourse=Facultycourse::where('added_by','=',$details[0]['id'])->get();
				$allbook=Bookpublished::orderBy('book_year','DESC')->where('added_by','=',$details[0]['id'])->get();
				$allpublish=Publications::orderBy('year','DESC')->where('added_by','=',$details[0]['id'])->get();
				$data=array(
					'details'=>$details,
					'canedit'=>FALSE,
					'allactivities'=>$allactivities,
					'allcourse'=>$allcourse,
					'allbook'=>$allbook,
					'allpublish'=>$allpublish
				);
				return View::make('user.peopledetails',$data);
		}
		else
		{
			//else nothing found
			return Response::view('errors.missing');
		}
	}


	public function getResearchinfo()
	{
		$getallinfo=Researchinfo::all();
		$getallgroup=Researchgroup::orderBy('researchgroup_name', 'ASC')->get();
		$getRecentPublications=Publications::orderBy('year','DESC')->take(30)->paginate(10);
		$data=array(
			'getallinfo'=>$getallinfo,
			'getallgroup'=>$getallgroup,
			'getRecentPublications'=>$getRecentPublications
		);
		return  View::make('research.researchpage',$data);
	}

	public function getResearchgroup()
	{		
		$getallgroup=Researchgroup::orderBy('researchgroup_name', 'ASC')->get();
		$data=array(
			'getallgroup'=>$getallgroup,
		);
		return  View::make('research.researchgroup',$data);
	}

	public function getResearchgrouppage($id)
	{
		$getresearchgroup=Researchgroup::find($id);
		$members = array();
		$users = explode(',', $getresearchgroup->researchgroup_users);
		$publications = Publications::where('research_group', $id)->orderBy('year','DESC')->paginate(10);
		foreach ($users as $user) {
			if($user!=''){
				$members[]=array(
					'fname'=>User::where('id',"$user")->pluck('user_fname'),
					'lname'=>User::where('id',"$user")->pluck('user_lname')
				);
			}
		}
		
		$data=array(
			'getresearchgroup'=>$getresearchgroup,
			'members'=>$members,
			'publications'=>$publications
		);
		return View::make('research.researchgrouppage', $data);
	}

	public function getContactdetails()
	{
		$getcontact=Contact::take(1)->get();
		return View::make('contact',array('getcontact'=>$getcontact));
	}
	
	public function getOthercourses()
	{
		$getOthercourses=Othercourses::take(1)->get();
		return View::make('othercourses',array('getothercourses'=>$getOthercourses));
	}

	public function authenticateUser()
	{
	    

	    //get username from form
	    $username = trim(Input::get('username'));

	    $user = User::where('username', '=', $username)->orWhere('user_email', '=', $username)->get();
	    if (($username == 'superadmin')||($username == 'superfaculty')||($user[0]['user_type']=='Post Doctoral Fellows')||($user[0]['user_type']=='PhD')) {
	    	if(Input::get('remember'))
			$rememberme=true;
			else
			$rememberme=false;

			$userid=User::where('username','=',Input::get('username'))->orWhere('user_email', '=', Input::get('username'))->count();
			$existuserid=0;
			
			if($userid) 
			{
				if (($username == 'superadmin')||($username == 'superfaculty')){
					//if activated then check for login 
					if(Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')),$rememberme)) 
					{
						return "success";
					}
					else
					{				
						return "error";
					}
				}else{
					//if activated then check for login 
					if(Auth::attempt(array('user_email'=>Input::get('username'), 'password'=>Input::get('password')),$rememberme)) 
					{
						return "success";
					}
					else
					{				
						return "error";
					}
				}
					
			}
			else
			{
				//email not exist| user not registered
				//error login
				
				return "User does not exist!!";
			}
			
	    }else{

	    	include (app_path() . "/lib/adLDAP/src/adLDAP.php");
		    // include (dirname(dirname(__FILE__)) . "/lib/adLDAP/adLDAP.php");
		    try {
		         $adldap = new adLDAP();
		         // $adldap = new adLDAP\adLDAP();
		     } catch (adLDAPException $e) {
		          echo $e;
		          exit;
		     }
		    //$adldap = new adLDAP\adLDAP();

		    //check if username/password passes auth
		    if ( $adldap->authenticate($username, Input::get('password') ) )
		    {
		        //I have an extra check to see if the user loggin in is in our staff ou... this allows me to identify staff over regular AD users.
		        if($adldap->user()->inGroup($username,"employees")) {
		            $ldap_user_info = $adldap->user()->info($username);
		            $ldap_user_name = $ldap_user_info[0]["displayname"][0];
		            $ldap_user_dept = $ldap_user_info[0]["department"][0];

		            //to take advantage of laravel's user object I add the user to the database of my app if they don't already exist. Adding them to my DB won't allow them to login as the auth method checks LDAP but it allows you to use the model
		            if ($ldap_user_dept == "MA,IITM") {
			            //check for user and create user object
			            $docs_userid = User::where('username', '=', $username)->orWhere('user_email', '=', $username)->pluck('id');

			            $docs_user = User::find($docs_userid);
			            //if doesn't exist yet add them
			            if(!$docs_user) {
			                // $user = new User;
			                // $user->username = $username;
			                // $user->user_fname = $ldap_user_name;
			                // $user->user_active = 1;
			                // $user->user_email = $ldap_user_info[0]["mail"][0];
			                // $user->save();
			                // $docs_user = User::find($username);
			                return "missing";
			            }
			            //log user in
			            Auth::login($docs_user);
			            //redirect
			            //return Redirect::intended('home')->with('message', 'Login Success');
			           	          
			            return "success";
			        } else {
		            	return "wrongdept";
		            }
		        }else{
		        	$ldap_user_info = $adldap->user()->info($username); var_dump($ldap_user_info);
		        	// Authenticating phoffice user for testing
		        	if ($username == 'phoffice') {
		        		 $docs_userid = User::where('username', '=', $username)->orWhere('user_email', '=', $username)->pluck('id');

			            $docs_user = User::find($docs_userid);
			            Auth::login($docs_user);
			            return "success";
		        	}
		        	
		        	return "notemployee";
		        }

		    }else{
		    //login failed
		    //return Redirect::route('home')->with('message', 'Login Failed <br /> Please Try Again');
		    return "authenticationerror";
			}
		}

	}

	public function changePassword()
	{
		$uid = Input::get('uid');
		if($uid>0)
		{
			$getuserdata=User::find($uid);
			$newpwd = Input::get('newpassword');
			$confirmpwd = Input::get('confirmpassword');
			if ($newpwd == $confirmpwd) {
				//$rand = substr(md5(microtime()),rand(0,26),8);
				$getuserdata->password=Hash::make($newpwd);
				$getuserdata->save();
				return "success";
			} else {
				return "error";
			}
		}else{
			return "error";
		}
		
	}

}
