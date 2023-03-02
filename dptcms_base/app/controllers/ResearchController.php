<?php

class ResearchController extends BaseController {

	
	// public function getCreateresearchinfo()
	// {	
	// 	//create the view to enter the info about research 
	// 	$getresearchinfo=Researchinfo::get();
	// 	return View::make('admin.research.createinfo',array('getresearchinfo'=>$getresearchinfo));

	// }

	public function getDashboard()
	{
		return View::make('admin.research.dashboard');
	}

	// Remnaming getCreateresearchinfo to getResearharea, $getresearchinfo to $getResearchInfo, createinfo to research-area, and  getresearchinfo to getResearchArea
	public function getResearcharea()
	{	
		//create the view to enter the info about research
		$getResearchInfo=Researchinfo::get();
		return View::make('admin.research.research-area',array('getResearchInfo'=>$getResearchInfo));
	}

	public function postUpdateresearchareainfo($id)
	{
		if($id==0)
		{
			//create
			$newinfo=new Researchinfo();
			$newinfo->researchinfo_desc=Input::get('researchdesc');
			// if(Input::hasFile('researchareaimage'))
			// {
			// 	$destinationPath = public_path().'/siteimages/';	
		 //        if (!file_exists($destinationPath)) {
			// 	    mkdir($destinationPath, 0777, true);
			// 	}
		 //        $ext = Input::file('researchareaimage')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
			// 	$filename = uniqid("research_").'.'.$ext;
		 //        $uploadSuccess=Input::file('researchareaimage')->move($destinationPath, $filename);
		        
			//     $newinfo->researchinfo_image=$filename;
			// }
			// else
			// {
				$newinfo->researchinfo_image='';
			// }
			try {
				$newinfo->save();
				return "true";
							
			} catch (Exception $e) {
				return "false";
			}			
			
		}
		else
		if ($id>0) 
		{
			//update
			$newinfo=Researchinfo::find($id);
			//if empty don't change anything.
			$newinfo->researchinfo_desc=Input::get('researchdesc');
			//if empty then don't update 
			if(Input::hasFile('researchareaimage'))
			{
				$destinationPath = public_path().'/siteimages/';	
		        if (!file_exists($destinationPath)) {
				    mkdir($destinationPath, 0777, true);
				}
		        $ext = Input::file('researchareaimage')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
				$filename = uniqid("research_").'.'.$ext;
		        $uploadSuccess   = Input::file('researchareaimage')->move($destinationPath, $filename);
		        
			    $newinfo->researchinfo_image=Input::get('researchareaimage');
			}
			try
			{
				$newinfo->save();
				return "true";
			}
			catch(\Exception $e)
			{
			    return "false";
			}
		}
		else
		{
			//nothing is there w.r.t db, because it's only a single field .
			return "error";
		}
	}
	public function postUpdateresearchareaimage()
	{
		if (Input::get('researchinfo')>0) 
		{
			//update
			$newinfo=Researchinfo::find(Input::get('researchinfo'));
			//if empty then don't update 
			if(Input::hasFile('researchareaimage'))
			{
				$destinationPath = public_path().'/siteimages/';	
		        if (!file_exists($destinationPath)) {
				    mkdir($destinationPath, 0777, true);
				}
		        $ext = Input::file('researchareaimage')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
				$filename = uniqid("research_").'.'.$ext;		        
		        Input::file('researchareaimage')->move($destinationPath, $filename);
		        
			    $newinfo->researchinfo_image=$filename;
			}
			$newinfo->save();

			return Response::json(['success' => true, 'file' => 'siteimages/'.$filename]);
		}
		else
		{
			//nothing is there w.r.t db, because it's only a single field .
		}
	}

	public function getResearchgroups()
	{
		$getReaesrchGroups=Researchgroup::all();
		return View::make('admin.research.research-groups',array('getReaesrchGroups'=>$getReaesrchGroups));
	}

	public function getResearchgroupinfo($id)
	{
		$group = Researchgroup::find($id);
		return $group;
	}

	public function postAddgroup($id)
	{
		if ($id==0) 
		{			
			//create a new group
			$newgroup=new Researchgroup();
			$newgroup->researchgroup_name=Input::get('researchgroupname');
			$newgroup->researchgroup_desc=Input::get('researchgroupdesc');
			$newgroup->researchgroup_users=''; 

			try 
			{
				
				$newgroup->save();
				$data=json_decode(file_get_contents(public_path().'/data/researchgruop.json'));
				var_dump($data); die();
				$data[]=array(
						"id"=>$newgroup->id,
						"name"=>Input::get('researchgroupname')
					);
				file_put_contents(public_path().'/data/researchgruop.json',json_encode($data));
				$error = 0;
			} 
			catch (Exception $e) 
			{
				//echo $e;
				$error = 1;
			}	
			
			if($error==0){
				$i=1;
				$tmp='';
				$getallresearchgroup=Researchgroup::get();
	      		foreach($getallresearchgroup as $val)
	      		{
	      			$tmp.='<tr><td>'.$i++.'</td><td>'.$val->researchgroup_name.'</td><td>'.$val->researchgroup_desc.'</td><td>'.count(array_filter(explode(',', $val->researchgroup_users))).'</td><td><span title="Edit" data-id="'.$val->id.'" class="text-info edit-research-group" style="cursor:pointer"><i class="fa fa-pencil"></i></span></td><td><span title="Delete" data-id="'.$val->id.'" class="text-danger delete-research-group" style="cursor:pointer"><i class="fa fa-times"></i></span></td></tr>';
	      		}
	      		return $tmp;
			}else{
				return "error";
			}
	      	
		}
		elseif ($id>0) 
		{
			try
			{
				//update group info
				//check that id at all exist or not
				$newgroup=Researchgroup::find($id);
				$newgroup->researchgroup_name=Input::get('researchgroupname');
				$newgroup->researchgroup_desc=Input::get('researchgroupdesc');
				$newgroup->save();
				//else someone trying to hack with random value
				$error = 0;
			}
			catch(\Exception $e)
			{
				$error = 1;
			}

			if($error==0){
				$i=1;
				$tmp='';
				$getallresearchgroup=Researchgroup::get();
	      		foreach($getallresearchgroup as $val)
	      		{
	      			$tmp.='<tr><td>'.$i++.'</td><td>'.$val->researchgroup_name.'</td><td>'.$val->researchgroup_desc.'</td><td>'.count(array_filter(explode(',', $val->researchgroup_users))).'</td><td><span title="Edit" data-id="'.$val->id.'" class="text-info edit-research-group" style="cursor:pointer"><i class="fa fa-pencil"></i></span></td><td><span title="Delete" data-id="'.$val->id.'" class="text-danger delete-research-group" style="cursor:pointer"><i class="fa fa-times"></i></span></td></tr>';
	      		}
	      		return $tmp;
			}else{
				return "error";
			}

		}
		else
		{
			//someone trying to hack with some -ve value
			return "error";
		}
	}

	public function postDeletegroup($id)
	{
		$deletegroup=Researchgroup::find($id);
		try 
		{
			$deletegroup->delete();
			$data=json_decode(file_get_contents(public_path().'/data/researchgruop.json'));					
			for($i=0;$i<count($data);$i++)
			{
				if($data[$i]->id==$id)
				{
					unset($data[$i]);
					$data=array_values($data);
					break;
				}
			}
			file_put_contents(public_path().'/data/researchgruop.json',json_encode($data));
			$error = 0;

		} catch (Exception $e) {
			$error = 1;
		}	
		
		if($error==0)
		{
			$i=1;
			$tmp='';
			$getallresearchgroup=Researchgroup::get();
	  		foreach($getallresearchgroup as $val)
	  		{
	  			$tmp.='<tr><td>'.$i++.'</td><td>'.$val->researchgroup_name.'</td><td>'.$val->researchgroup_desc.'</td><td>'.count(array_filter(explode(',', $val->researchgroup_users))).'</td><td><span title="Delete" data-id="'.$val->id.'" class="text-danger delete-research-group" style="cursor:pointer"><i class="fa fa-times"></i></span></td></tr>';
	  		}
	  		return $tmp;
		}
		else
		{
			return "error";
		}
		
	}

	public function postAddintogroup()
	{
		// add some one to a specific group and update group table , $id , $ppplid
		//check for array
		$addintogroup=Researchgroup::find(Input::get('grupid'));
		$tmp=$addintogroup->researchgroup_users;
		if($tmp) 
		{
			$addintogroup->researchgroup_users=$tmp.','.Input::get('userid');
		}
		else
		{
			$addintogroup->researchgroup_users=Input::get('userid');
		}
		$addintogroup->save();
	}

	public function getRecentpublications()
	{
		$getRecentPublications=Publications::orderBy('year','DESC')->take(30)->paginate(10);
		return View::make('admin.research.recent-publications', array('getRecentPublications'=>$getRecentPublications));
	}
}
?>
