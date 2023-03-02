<?php

class ResourceController extends BaseController {

	public function getDashboard()
	{
		return View::make('admin.resource.dashboard');
	}
	//create resource type 
	public function getLinks()
	{
		$getalllinks=Links::all();
		return View::make('admin.resource.showlinks',array('getalllinks'=>$getalllinks));
	}
	public function getAlllinks()
	{
		$getalllinks=Links::all();
		return View::make('resource.showlinks',array('getalllinks'=>$getalllinks));
	}

	public function getDocs()
	{
		$getalldocs=Documents::all();
		return View::make('admin.resource.showdocs',array('getalldocs'=>$getalldocs));
	}
	public function getAlldocs()
	{
		$getalldocs=Documents::all();
		return View::make('resource.showdocs',array('getalldocs'=>$getalldocs));
	}
	public function getDocument($id)
	{
		//get all details of the document and pass to view
		$getdodetails=Documents::find($id);
		if($getdodetails)
		{
			return View::make('admin.resource.eachdocument',array('getdodetails'=>$getdodetails));
		}
		else
		{
			return "Invalid Request !";
		}
	}
	
	public function getManagegallery()
	{
		$getgallery=Gallery::all();
		$getalbums=Album::all();
		return View::make('admin.resource.showgallery',array('getgallery'=>$getgallery, 'getalbums'=>$getalbums));
	}
	public function getGallery()
	{
		$getgallery=Gallery::all();
		$getalbums=Album::all();
		return View::make('resource.showgallery',array('getgallery'=>$getgallery, 'getalbums'=>$getalbums));
	}	
	
	public function getVideos()
	{
		$getcontent=Staticcontent::where('whichlocation','=','videos')->get();
		return View::make('admin.resource.showvideos',array('getcontent'=>$getcontent));
	}
	public function getAllvideos()
	{
		$getvideos=Staticcontent::where('whichlocation','=','videos')->get();
		return View::make('resource.showvideos',array('getvideos'=>$getvideos));
	}
	public function getAddlinks()
	{
		
		return View::make('admin.resource.createlinks');
	}

	public function postAddlinks($id)
	{
		if($id==0)
		{
			//create
			$newlink=new Links;
			$newlink->resource_links_title=Input::get('linktitle');
			$newlink->resource_links_link=Input::get('link');
			$newlink->needlogin=Input::get('needlogin');
			$newlink->resource_links_created_by=Auth::user()->id;
			try
			{
				$newlink->save();
				$error = 0;
			}
			catch(Exception $e)
			{
				$error = 1;
			}

			if ($error==0) {

				return "true";
			}
			else
			{
				return $e;
			}
		}
		elseif ($id>0) 
		{
			//update	
		}
		else
		{
			return 2;
		}

	}

	public function getAdddocs()
	{
		
		return View::make('admin.resource.createdocs');
		
	}
	
	public function postAdddocs($id)
	{
		if($id==0)
		{
			//create
			$newdocs=new Documents;
			$newdocs->resource_document_title=Input::get('docstitle');
			$newdocs->resource_document_body=Input::get('docsbody');
			$newdocs->resource_document_link=Input::get('docslink');
			$newdocs->needlogin=Input::get('needlogin');
			if(Input::hasFile('docsfile'))
			{
				$destinationPath = public_path().'/resources/';	
		        if (!file_exists($destinationPath)) {
				    mkdir($destinationPath, 0777, true);
				}
		        $ext = Input::file('docsfile')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
				$filename = uniqid("resource_").'.'.$ext;
		        $uploadSuccess=Input::file('docsfile')->move($destinationPath, $filename);
		        
			    $newdocs->resource_document_file=$filename;
			}
			else
			{
				$newdocs->resource_document_file='';

			}	
			$newdocs->resource_document_created_by=Auth::user()->id;
			
			try
			{
				$newdocs->save();
				$error = 0;
			}
			catch(Exception $e)
			{
				$error = 1;
			}

			if ($error==0) {

				return 1;
			}
			else
			{
				return 0;
			}

		}
		elseif ($id>0) 
		{
			//update	
		}
		else
		{
			//nothing
		}
		
	}

	public function getAddtogallery()
	{
		$getallalbums=Album::all();
		return View::make('resource.uploadingalley',array('getallalbums'=>$getallalbums));
	}

	public function postUploadtogallery($id)
	{
		if($id==0)
		{
		    		
			$files = Input::file('uploadfiles');
			$album = Input::get('album');

			$images = [];

			foreach($files as $file) {
		               
		        $getOriginalName=$file->getClientOriginalName();

				$getSize=ceil($file->getSize()/1024); //size in KB
				
				$getType=$file->getMimeType(); //file type

		        $destinationPath = public_path().'/gallery/';	

		        if ($getSize>2048) {
					return Response::json(['success' => false, 'file' => $getOriginalName, 'msg' => 'Please upload images of size below 2MB.']);
				}else{
					if (!file_exists($destinationPath)) {
					    mkdir($destinationPath, 0777, true);
					}

			        $ext = $file->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
					$filename = uniqid("gallery_").'.'.$ext;
			        $uploadSuccess   = $file->move($destinationPath, $filename);
					
					//crerate
					$newGallery=new Gallery;
					//$newGallery->resource_gallery_text=$title;//Input::get('imagetext');
					$newGallery->resource_gallery_album_id=$album;//Input::get('whichalbum');

					$newGallery->resource_gallery_type=$getType;
					$newGallery->resource_gallery_size=$getSize;
					$newGallery->resource_gallery_originalname=$getOriginalName;
					$newGallery->resource_gallery_filename=$filename;
					$newGallery->resource_gallery_uploaded_by=Auth::user()->id;
					$newGallery->save();
					array_push($images, $newGallery);
				}				
		    }
		    $files = $ids = [];
		    foreach ($images as $img) {
		    	array_push($files, $img['resource_gallery_filename']);
		    	array_push($ids , $img['id']);
		    }
		    return Response::json(['success' => true, 'msg' => 'Images uploaded to album successfully', 'album'=> $album, 'files'=> $files, 'ids'=>$ids]);
			//return Response::json(['success' => true, 'file' => $filename, 'msg'=> 'Images uploaded to album successfully', 'album'=> $album, 'id'=> $newGallery->id ]);
	        
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

	public function getAlbum($id)
	{
		$getalbumdetails=Album::find($id);
		$getpics=Gallery::where('resource_gallery_album_id','=',$id)->get();
		if($getalbumdetails)
		{
			return View::make('resource.showalbum',array('getalbumdetails'=>$getalbumdetails, 'getpics'=>$getpics));
		}
		else
		{
			return "Invalid Request !";
		}

	}
	
	public function getManagealbum($id)
	{
		$getalbumdetails=Album::find($id);
		$getpics=Gallery::where('resource_gallery_album_id','=',$id)->get();
		if($getalbumdetails)
		{
			return View::make('admin.resource.showalbum',array('getalbumdetails'=>$getalbumdetails, 'getpics'=>$getpics));
		}
		else
		{
			return "Invalid Request !";
		}

	}

	public function postAlbum($id)
	{
		if($id==0)
		{
			//create
			$newalbum=new Album;
			$newalbum->resource_album_name=Input::get('albumname');
			$newalbum->resource_album_created_by=Auth::user()->id;
			$newalbum->save();
			$data['status'] = "true";
			$data['id'] = $newalbum->id;
			$data['album'] = $newalbum->resource_album_name;
		}
		elseif ($id>0) 
		{
			//update
			$data['status'] = "false";
		}
		else
		{
			//nothing 
			$data['status'] = "false";
		}
		return $data;
	}

	public function postDeletealbum()
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$id = Input::get('id');
			$deletealbum = Album::find($id);
			if($deletealbum){
				try
				{
					$albumimages=Gallery::where("resource_gallery_album_id", "=", $id)->get();
					foreach ($albumimages as $image) {
						if(file_exists(public_path().'/gallery/'.$image->resource_gallery_filename)){
							unlink(public_path().'/gallery/'.$image->resource_gallery_filename);
						}
						$image->delete();
					}
					$deletealbum->delete();
					return 1;
				}
				catch(Exception $e)
				{
					return $e;
				}
			} else {
				return "Error! No such album found.";
			}
		}
		else
		{
			return "Error! Unauthorized Access.";
		}
	}

	public function postDeletelinks($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$deletelink=Links::find($id);
			if($deletelink)
			{				
				try
				{
					$deletelink->delete();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{
					$listoflinks = "";
					$getalllinks=Links::all();
					for ($i=0; $i < count($getalllinks) ; $i++) { 
						$j = $i+1;
						$listoflinks.='<tr>'.$j.'<td>'.$j.'</td><td>'.$getalllinks[$i]['resource_links_title'].'</td><td>'.$getalllinks[$i]['resource_links_link'].'</td><td><a href="'.$getalllinks[$i]['resource_links_link'].'" class="btn btn-xs btn-default" target="_blank"> <i class="fa fa-external-link"></i> Open </a></td><td><a href="#" class="btn btn-xs btn-danger deletelink" data-toggle="class" data-id="'.$getalllinks[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
					}
					
				    $data=array('listoflinks'=>$listoflinks,'deleted'=>"true");

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
				$data=array('deleted'=>"Error! No such link exist.");
				return $data;
			}
		}
		else
		{
			$data=array('deleted'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	public function postDeletedocs($id)
	{
		if(Auth::check() && Auth::user()->isadmin==1)
		{
			$deletedoc=Documents::find($id);
			if ($deletedoc) 
			{
				try
				{
					$deletedoc->delete();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{
					$listofdocs = "";
					$getalldocs=Documents::all();
					for ($i=0; $i < count($getalldocs) ; $i++) { 
						$j = $i+1;
						$listofdocs.='<tr>'.$j.'<td>'.$j.'</td><td>'.$getalldocs[$i]['resource_links_title'].'</td><td>'.$getalldocs[$i]['resource_links_link'].'</td><td><a href="'.$getalldocs[$i]['resource_links_link'].'" class="btn btn-xs btn-default" target="_blank"> <i class="fa fa-external-link"></i> Open </a></td><td><a href="#" class="btn btn-xs btn-danger deletelink" data-toggle="class" data-id="'.$getalldocs[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
					}
					
				    $data=array('listofdocs'=>$listofdocs,'deleted'=>"true");

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
				$data=array('deleted'=>"Error! No such document exist.");
				return $data;
			}				
		}
		else
		{
			$data=array('deleted'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	//upload resource

	public function postDeleteimage($id)
	{
		if($id>0)
		{
			$findimg=Gallery::find($id);
			if(count($findimg))
			{
				try
				{
					unlink(public_path().'/gallery/'.$findimg->resource_gallery_filename);
					$findimg->delete();
					return 1;
				}
				catch(Exception $e)
				{
					return $e;
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

	public function getConferencehalls()
	{
		$getallhalls=Conferencehall::all();
		return View::make('admin.resource.showhalls',array('getallhalls'=>$getallhalls));
	}
	public function getAddhalls()
	{
		
		return View::make('admin.resource.createhalls');
	}

	public function postAddhalls($id)
	{
		if($id==0)
		{
			//create
			$newhall=new Conferencehall;
			$newhall->conference_halls_name=Input::get('hallname');
			$newhall->conference_halls_details=Input::get('halldetails');
			$newhall->conference_halls_incharge=Input::get('hallincharge');
			$newhall->conference_halls_contact=Input::get('contact');
			try
			{
				$newhall->save();
				$error = 0;
			}
			catch(Exception $e)
			{
				$error = 1;
			}

			if ($error==0) {

				return "true";
			}
			else
			{
				return "false";
			}
		}
		elseif ($id>0) 
		{
			//update	
		}
		else
		{
			return 2;
		}
	}

	public function postDeletehall($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$deletehall=Conferencehall::find($id);
			if($deletehall)
			{				
				try
				{
					$deletehall->delete();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{
					$listofhalls = "";
					$getallhalls=Conferencehall::all();
					for ($i=0; $i < count($getallhalls) ; $i++) { 
						$j = $i+1;
						$listofhalls.='<tr>'.$j.'<td>'.$j.'</td><td>'.$getallhalls[$i]['conference_halls_name'].'</td><td>'.$getallhalls[$i]['conference_halls_details'].'</td><td>'.$getallhalls[$i]['conference_halls_incharge'].'</td><td>'.$getallhalls[$i]['conference_halls_contact'].'</td><td><a href="#" class="btn btn-xs btn-danger deletehall" data-toggle="class" data-id="'.$getallhalls[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
					}
					
				    $data=array('listofhalls'=>$listofhalls,'deleted'=>"true");

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
				$data=array('deleted'=>"Error! No such link exist.");
				return $data;
			}
		}
		else
		{
			$data=array('deleted'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	public function postVideocontent()
	{
		try
		{
			//User::where('votes', '>', 100)->update(array('status' => 2));
			Staticcontent::where('whichlocation','=','videos')->update(array('content'=>Input::get('videocontent'), 'doneby'=>Auth::user()->id));
			//Session::flash('message', 'Content Updated Successfully');
			return "true";
		}
		catch(\Exception $e)
		{
		    return "false";
		}		
	}
}
