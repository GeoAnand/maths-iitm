<?php
class NewsController extends BaseController {

	public function getAddnews()
	{
		return View::make('admin.news.create');
	}

	public function getEdit($id)
	{
		if(Auth::check() && Auth::user()->isadmin==1)
		{
			$getnews=News::where('id','=',$id)->get();
			return View::make('admin.news.edit', array('getnews'=>$getnews));
		}
		else
		{
			return "Error! Unauthorized access.";
		}
	}
	
	public function postAddnews()
	{
		if(Auth::check())
		{
			$addnews=new News;
			$addnews->news_title=Input::get('title');
			$addnews->news_description=Input::get('description');
			$addnews->news_type=Input::get('type');
			$addnews->news_link=Input::get('link');
			$addnews->news_date=date("Y-m-d");
			$addnews->news_by=Auth::user()->id;
			$addnews->news_publish=Input::get('publish');
			$addnews->news_archive=0;
			
			try 
			{
				$addnews->save();
				$error = 0;
				
			} 
			catch (Exception $e) 
			{
				$error = 1;			
			}

			if($error==0)
			{
				return  "true";
			}
			else
			{
				return "false";
			}
		}
		else
		{
			return "Error! Unauthorized Access.";
		}
	}

	public function postEditnews($id)
	{
		if(Auth::check())
		{
			$addnews=News::find($id);
			$addnews->news_title=Input::get('title');
			$addnews->news_description=Input::get('description');
			$addnews->news_type=Input::get('type');
			$addnews->news_link=Input::get('link');
			$addnews->news_date=date("Y-m-d");
			$addnews->news_by=Auth::user()->id;
			$addnews->news_publish=Input::get('publish');
			$addnews->news_archive=0;
			
			try 
			{
				$addnews->save();
				$error = 0;
				
			} 
			catch (Exception $e) 
			{
				$error = 1;			
			}

			if($error==0)
			{
				return  "true";
			}
			else
			{
				return "false";
			}
		}
		else
		{
			return "Error! Unauthorized Access.";
		}
	}

	public function getShownews()
	{
		// if(Auth::check() && (Auth::user()->userprivileg->newannouncement==1))
		// {
		// 	$getallactivenews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',0)->get();
		// 	$getallactiveannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',0)->get();
		// 	$getallarchivednews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',1)->get();
		// 	$getallarchivedannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',1)->get();		
		// 	$data=array('getallactivenews'=>$getallactivenews, 'getallactiveannouncements'=>$getallactiveannouncements, 'getallarchivednews'=>$getallarchivednews, 'getallarchivedannouncements'=>$getallarchivedannouncements);
		// 	return View::make('admin.news.view',$data);
		// }
		// else
		// {
			// return Redirect::to('login');
		// }
		$getallactivenews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',0)->get();
		$getallactiveannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',0)->get();
		$getallarchivednews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',1)->get();
		$getallarchivedannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',1)->get();		
		$data=array('getallactivenews'=>$getallactivenews, 'getallactiveannouncements'=>$getallactiveannouncements, 'getallarchivednews'=>$getallarchivednews, 'getallarchivedannouncements'=>$getallarchivedannouncements);
		return View::make('admin.news.view',$data);
	}

	public function postShownewsbytype($id)
	{
		$getallnewsbytype=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',$id)->get();	
		$i = 1;
		$tmp='';
	    foreach($getallnewsbytype as $val)
	    {
	    	$tmp.='<tr><td>'.$i.'</td><td>'.$val->news_title.'</td><td>'.$val->news_description.'</td><td>'.$val->news_link.'</td><td>'.$val->news_publish.'</td><td>'.$val->news_archive.'</td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-toggle="class" data-id="'.$val['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
	    	$i++;
	    }
	    return $tmp;		
	}

	public function postDeletenews($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$deletenews=News::find($id);
			$newstype=Input::get('newstype');
			if($deletenews)
			{				
				try
				{
					$deletenews->delete();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{								
				    $activenewslist = $archivednewslist = $archivedannouncementslist = $activeannouncementslist = "";;
				    if($newstype=="activenews")
				    {				    					    	
						$getallactivenews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',0)->get();

						for ($i=0; $i < count($getallactivenews) ; $i++) { 
							$j = $i+1;
							$activenewslist.='<tr><td>'.$j.'</td><td>'.$getallactivenews[$i]['news_title'].'</td><td>'.$getallactivenews[$i]['news_description'].'</td><td>'.$getallactivenews[$i]['news_link'].'</td><td>';						
							if($getallactivenews[$i]['news_publish']==1)
							{
								$activenewslist.='<a href="#" class="text-muted" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"><i class="fa fa-check text-success"></i> Published</a>';
							}
							else
							{
								$activenewslist.='<a href="#" class="btn btn-xs btn-success publishnews" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"> Publish Now</a>';
							}
							$activenewslist.='</td><td><a href="#" class="btn btn-xs btn-primary archivenews" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"> Archive It</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="activenews" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
						}
				    }
				    else if($newstype=="archivednews")
				    {				    	
						$getallarchivednews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',1)->get();

						for ($i=0; $i < count($getallarchivednews) ; $i++) { 
							$j = $i+1;
							$archivednewslist.='<tr><td>'.$j.'</td><td>'.$getallarchivednews[$i]['news_title'].'</td><td>'.$getallarchivednews[$i]['news_description'].'</td><td>'.$getallarchivednews[$i]['news_link'].'</td><td>';

							$archivednewslist.='<a href="#" class="btn btn-xs btn-success publisharchivednews" data-type="archivednews" data-toggle="class" data-id="'.$getallarchivednews[$i]['id'].'"> Publish Now</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="archivednews" data-toggle="class" data-id="'.$getallarchivednews[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
						}
				    } 
				    else if($newstype=="activeannouncements")
				    {				    	
						$getallactiveannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',0)->get();

						for ($i=0; $i < count($getallactiveannouncements) ; $i++) { 
							$j = $i+1;
							$activeannouncementslist.='<tr><td>'.$j.'</td><td>'.$getallactiveannouncements[$i]['news_title'].'</td><td>'.$getallactiveannouncements[$i]['news_description'].'</td><td>'.$getallactiveannouncements[$i]['news_link'].'</td><td>';						
							if($getallactiveannouncements[$i]['news_publish']==1)
							{
								$activeannouncementslist.='<a href="#" class="text-muted" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"><i class="fa fa-check text-success"></i> Published</a>';
							}
							else
							{
								$activeannouncementslist.='<a href="#" class="btn btn-xs btn-success publishnews" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"> Publish Now</a>';
							}
							$activeannouncementslist.='</td><td><a href="#" class="btn btn-xs btn-primary archivenews" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"> Archive It</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="activeannouncements" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
						}
				    }
				    else if($newstype=="archivedannouncements")
				    {				    					    	
						$getallarchivedannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',1)->get();

						for ($i=0; $i < count($getallarchivedannouncements) ; $i++) { 
							$j = $i+1;
							$archivedannouncementslist.='<tr><td>'.$j.'</td><td>'.$getallarchivedannouncements[$i]['news_title'].'</td><td>'.$getallarchivedannouncements[$i]['news_description'].'</td><td>'.$getallarchivedannouncements[$i]['news_link'].'</td><td>';						
							
							$archivedannouncementslist.='<a href="#" class="btn btn-xs btn-success publisharchivednews" data-type="archivedannouncements" data-toggle="class" data-id="'.$getallarchivedannouncements[$i]['id'].'"> Publish Now</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="archivedannouncements" data-toggle="class" data-id="'.$getallarchivedannouncements[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';							
						}
				    } 

				    $data=array('activenewslist'=>$activenewslist, 'archivednewslist'=>$archivednewslist, 'activeannouncementslist'=>$activeannouncementslist, 'archivedannouncementslist'=>$archivedannouncementslist,'deleted'=>"true", 'newstype'=>$newstype);

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
				$data=array('deleted'=>"Error! No such News exist.");
				return $data;
			}
		}
		else
		{
			$data=array('deleted'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	public function postPublishnews($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$publishnews=News::find($id);
			$newstype=Input::get('newstype');
			if($publishnews)
			{	
				$publishnews->news_publish=1;			
				try
				{
					$publishnews->save();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{								
				    $data=array('published'=>"true");

					return $data;
				}
				else
				{
					$data=array('published'=>"false");
					return $data;
				}
			}
			else
			{
				$data=array('published'=>"Error! No such News exist.");
				return $data;
			}
		}
		else
		{
			$data=array('published'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	public function postPublisharchivednews($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$publisharchivednews=News::find($id);
			$newstype=Input::get('newstype');
			if($publisharchivednews)
			{	
				$publisharchivednews->news_publish=1;
				$publisharchivednews->news_archive=0;		
				try
				{
					$publisharchivednews->save();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{								
				   $activenewslist = $activeannouncementslist = "";;
				    if($newstype=="archivednews")
				    {				    					    	
						$getallactivenews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',0)->get();

						for ($i=0; $i < count($getallactivenews) ; $i++) { 
							$j = $i+1;
							$activenewslist.='<tr><td>'.$j.'</td><td>'.$getallactivenews[$i]['news_title'].'</td><td>'.$getallactivenews[$i]['news_description'].'</td><td>'.$getallactivenews[$i]['news_link'].'</td><td>';						
							if($getallactivenews[$i]['news_publish']==1)
							{
								$activenewslist.='<a href="#" class="text-muted" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"><i class="fa fa-check text-success"></i> Published</a>';
							}
							else
							{
								$activenewslist.='<a href="#" class="btn btn-xs btn-success publishnews" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"> Publish Now</a>';
							}
							$activenewslist.='</td><td><a href="#" class="btn btn-xs btn-primary archivenews" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"> Archive It</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="activenews" data-toggle="class" data-id="'.$getallactivenews[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
						}
				    }				    
				    else if($newstype=="archivedannouncements")
				    {				    	
						$getallactiveannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',0)->get();

						for ($i=0; $i < count($getallactiveannouncements) ; $i++) { 
							$j = $i+1;
							$activeannouncementslist.='<tr><td>'.$j.'</td><td>'.$getallactiveannouncements[$i]['news_title'].'</td><td>'.$getallactiveannouncements[$i]['news_description'].'</td><td>'.$getallactiveannouncements[$i]['news_link'].'</td><td>';						
							if($getallactiveannouncements[$i]['news_publish']==1)
							{
								$activeannouncementslist.='<a href="#" class="text-muted" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"><i class="fa fa-check text-success"></i> Published</a>';
							}
							else
							{
								$activeannouncementslist.='<a href="#" class="btn btn-xs btn-success publishnews" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"> Publish Now</a>';
							}
							$activeannouncementslist.='</td><td><a href="#" class="btn btn-xs btn-primary archivenews" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"> Archive It</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="activeannouncements" data-toggle="class" data-id="'.$getallactiveannouncements[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
						}
				    } 

				    $data=array('activenewslist'=>$activenewslist, 'activeannouncementslist'=>$activeannouncementslist, 'published'=>"true", 'newstype'=>$newstype);

					return $data;
				}
				else
				{
					$data=array('published'=>"false");
					return $data;
				}
			}
			else
			{
				$data=array('published'=>"Error! No such News exist.");
				return $data;
			}
		}
		else
		{
			$data=array('published'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	public function postArchivenews($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$archivenews=News::find($id);
			$newstype=Input::get('newstype');
			if($archivenews)
			{	
				$archivenews->news_archive=1;			
				try
				{
					$archivenews->save();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{								
				    $archivednewslist = $archivedannouncementslist = "";;
				    if($newstype=="activenews")
				    {				    	
						$getallarchivednews=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',1)->where('news_archive','=',1)->get();

						for ($i=0; $i < count($getallarchivednews) ; $i++) { 
							$j = $i+1;
							$archivednewslist.='<tr><td>'.$j.'</td><td>'.$getallarchivednews[$i]['news_title'].'</td><td>'.$getallarchivednews[$i]['news_description'].'</td><td>'.$getallarchivednews[$i]['news_link'].'</td><td>';

							$archivednewslist.='<a href="#" class="btn btn-xs btn-success publisharchivednews" data-type="archivednews" data-toggle="class" data-id="'.$getallarchivednews[$i]['id'].'"> Publish Now</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="archivednews" data-toggle="class" data-id="'.$getallarchivednews[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
						}
				    }
				    else if($newstype=="activeannouncements")
				    {				    					    	
						$getallarchivedannouncements=News::groupBy('id')->orderBy('updated_at','DESC')->where('news_type','=',2)->where('news_archive','=',1)->get();

						for ($i=0; $i < count($getallarchivedannouncements) ; $i++) { 
							$j = $i+1;
							$archivedannouncementslist.='<tr><td>'.$j.'</td><td>'.$getallarchivedannouncements[$i]['news_title'].'</td><td>'.$getallarchivedannouncements[$i]['news_description'].'</td><td>'.$getallarchivedannouncements[$i]['news_link'].'</td><td>';						
							
							$archivedannouncementslist.='<a href="#" class="btn btn-xs btn-success publisharchivednews" data-type="archivedannouncements" data-toggle="class" data-id="'.$getallarchivedannouncements[$i]['id'].'"> Publish Now</a></td><td><a href="#" class="btn btn-xs btn-danger deletenews" data-type="archivedannouncements" data-toggle="class" data-id="'.$getallarchivedannouncements[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';							
						}
				    } 

				    $data=array('archivednewslist'=>$archivednewslist, 'archivedannouncementslist'=>$archivedannouncementslist,'archived'=>"true", 'newstype'=>$newstype);

					return $data;
				}
				else
				{
					$data=array('archived'=>"false");
					return $data;
				}
			}
			else
			{
				$data=array('archived'=>"Error! No such News exist.");
				return $data;
			}
		}
		else
		{
			$data=array('archived'=>"Error! Unauthorized access.");
			return $data;
		}
	}
}





