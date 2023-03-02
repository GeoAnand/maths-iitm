<?php

class PublicationController extends BaseController {


	// public function getList()
	// {
	// 	$getallpublications=Publications::orderBy('publications_year','DESC')->paginate(30);
	// 	return View::make('research.publications',array('getallpublications'=>$getallpublications));
	// }
	public function getManagepublications()
	{
		if(Auth::check() && (Auth::user()->userprivileg->research==1))
		{
			$getallpublications=Publications::all();
			return View::make('admin.publications.managepublications',array('getallpublications'=>$getallpublications));
		}
		else
		{
			return Redirect::to('login');
		}
	}	

	public function getView()
	{
		$getpublications=Publications::orderBy('year','DESC','author', 'ASC')->get();
	//	$getpublications=Publications::orderBy('author','ASC')->get(); EDITED by NARAYANAN
		$getallauthors=User::where('user_type', '=', 'Faculty')->orderBy('user_fname', 'ASC')->get();
		$pubyears = array();
		foreach($getpublications as $pub){
		    if ( in_array(trim($pub['year']), $pubyears) ) {
		        continue;
		    }
		    $pubyears[] = trim($pub['year']);
		}
		$pubjournals = array();
		foreach($getpublications as $pub){
		    if ( in_array(trim($pub['journal']), $pubjournals) ) {
		        continue;
		    }
		    $pubjournals[] = trim($pub['journal']);
		}
		rsort($pubyears);
		return View::make('research.publications',array('getpublications'=>$getpublications, 'getallauthors'=>$getallauthors, 'pubyears' =>$pubyears, 'pubjournals' =>$pubjournals));
		
	}

	public function getViewpublication($id)
	{		
		$getpublicationdetails=Publications::find($id);
		if($getpublicationdetails)
		{
			return View::make('research.eachpublication',array('getpublicationdetails'=>$getpublicationdetails));
		}
		else
		{
			return Response::view('errors.missing');
		}
	}

	public function getAddpublications()
	{
		if(Auth::check() && (Auth::user()->userprivileg->research==1))
		{
			return View::make('admin.publications.addpublications');
		}
		else
		{
			return Redirect::to('login');
		}
	}

	public function getGenerateauthorslist()
	{	
		$users=User::where('user_type', '=', 'Faculty')->get();
		$data = array();
		foreach ($users as $user) {
			$data[]=array(
						"id"=>$user->id,
						"name"=>$user->user_fname." ".$user->user_lname
					);
		}		
		if(file_put_contents(public_path().'/data/authorlist.json',json_encode($data))){
			return View::make('admin.publications.authorlist', array('authors'=>$data, 'result'=>true));
		}else{
			return View::make('admin.publications.authorlist', array('authors'=>"", 'result'=>false));
		}		
	}

	public function postAddpublications($id)
	{
		if($id==0)
		{
			//create
			$newpub=new Publications;
			$newpub->title=Input::get('title');
			$newpub->author=Input::get('author');
			$newpub->year=Input::get('year');
			$newpub->journal=Input::get('journal');
			$newpub->issn=Input::get('issn');
			$newpub->abstract=Input::get('abstract');
			try
			{
				$newpub->save();
				$error = 0;
			}
			catch(Exception $e)
			{
				$error = 1;
			}

			if ($error==0) {

				$listofpublications = "";
				$getallpublications=Publications::all();
				for ($i=0; $i < count($getallpublications) ; $i++) { 
					$j = $i+1;
					$listofpublications.='<tr>'.$j.'<td>'.$j.'</td><td>'.$getallpublications[$i]['title'].'</td><td>'.$getallpublications[$i]['year'].'</td><td>'.$getallpublications[$i]['issn'].'</td><td><a href="#" class="btn btn-xs btn-info editpublication" data-toggle="class" data-id="'.$getallpublications[$i]['id'].'"><i class="fa fa-pencil-o"></i> Edit</a> <a href="#" class="btn btn-xs btn-danger deletepublication" data-toggle="class" data-id="'.$getallpublications[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
				}
				
			    $data=array('listofpublications'=>$listofpublications,'status'=>"true", 'action'=>'created');

				return $data;
			}
			else
			{
				$data=array('status'=>"false");
				return $data;
			}
		}
		elseif ($id>0) 
		{
			//update
			$pub=Publications::find($id);
			$pub->title=Input::get('title');
			$pub->author=Input::get('author');
			$pub->year=Input::get('year');
			$pub->journal=Input::get('journal');
			$pub->issn=Input::get('issn');
			$pub->abstract=Input::get('abstract');
			try
			{
				$pub->save();
				$error = 0;
			}
			catch(Exception $e)
			{
				$error = 1;
			}

			if ($error==0) {

				$listofpublications = "";
				$getallpublications=Publications::all();
				for ($i=0; $i < count($getallpublications) ; $i++) { 
					$j = $i+1;
					$listofpublications.='<tr>'.$j.'<td>'.$j.'</td><td>'.$getallpublications[$i]['title'].'</td><td>'.$getallpublications[$i]['year'].'</td><td>'.$getallpublications[$i]['issn'].'</td><td><a href="#" class="btn btn-xs btn-info editpublication" data-toggle="class" data-id="'.$getallpublications[$i]['id'].'"><i class="fa fa-pencil-o"></i> Edit</a> <a href="#" class="btn btn-xs btn-danger deletepublication" data-toggle="class" data-id="'.$getallpublications[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
				}
				
			    $data=array('listofpublications'=>$listofpublications,'status'=>"true", 'action'=>'updated');

				return $data;
			}
			else
			{
				$data=array('status'=>"false");
				return $data;
			}	
		}
		else
		{
			$data=array('status'=>'error', 'msg'=>"Error! No such publication exist.");
			return $data;
		}

	}

	public function getUpdatepublication($id)
	{
		if($id)
		{
			$getpublication=Publications::find($id);
			if(count($getpublication))
				return View::make('admin.publications.editpublication',array('getpublication'=>$getpublication));
			else
				return "Unknown Request !";
		}
	}

	public function postDeletepublication($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$deletepublication=Publications::find($id);
			if($deletepublication)
			{				
				try
				{
					$deletepublication->delete();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{
					$listofpublications = "";
					$getallpublications=Publications::all();
					for ($i=0; $i < count($getallpublications) ; $i++) { 
						$j = $i+1;
						$listofpublications.='<tr>'.$j.'<td>'.$j.'</td><td>'.$getallpublications[$i]['title'].'</td><td>'.$getallpublications[$i]['year'].'</td><td>'.$getallpublications[$i]['issn'].'</td><td><a href="#" class="btn btn-xs btn-info editpublication" data-toggle="class" data-id="'.$getallpublications[$i]['id'].'"><i class="fa fa-pencil-o"></i> Edit</a> <a href="#" class="btn btn-xs btn-danger deletepublication" data-toggle="class" data-id="'.$getallpublications[$i]['id'].'"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
					}
					
				    $data=array('listofpublications'=>$listofpublications,'deleted'=>"true");

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
				$data=array('deleted'=>"Error! No such publication exist.");
				return $data;
			}
		}
		else
		{
			$data=array('deleted'=>"Error! Unauthorized access.");
			return $data;
		}
	}


	public function postImport()
	{
		
		if(Input::hasFile('importPublicationfile') && Input::file('importPublicationfile')->getClientOriginalExtension()=='bib')
		{
			$destinationPath = public_path().'/data/publications/bibtex/';	
	        if (!file_exists($destinationPath)) {
			    mkdir($destinationPath, 0777, true);
			}
			//$filename = uniqid("bib_").'.bib';
			$filename = 'publications.bib';
	        $uploadSuccess=Input::file('importPublicationfile')->move($destinationPath, $filename);

	        $data = array('result' => 'true');
			return $data;
		}
		else
		{
			$data = array('result' => 'false');
			return $data;
		}
	}

}
