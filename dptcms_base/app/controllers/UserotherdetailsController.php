<?php
class UserotherdetailsController extends BaseController {


	public function postActivityadd(){
		$newactivity=new Activities();
		$newactivity->activity=Input::get('activity');
		$newactivity->link=Input::get('activitylink');
		$newactivity->publish=Input::get('publishactivity');
		$newactivity->added_by=Auth::user()->id;
		try
		{
			$newactivity->save();
			return array('status'=>1,'dataid'=>$newactivity->id);
		}
		catch(Exception $e)
		{
			return $e;
		}
	}

	public function postCourseadd(){
		$newcourse=new Facultycourse();
		$newcourse->course_name=Input::get('coursename');
		$newcourse->course_desc=Input::get('coursedesc');
		$newcourse->course_link=Input::get('courselink');
		$newcourse->added_by=Auth::user()->id;
		try
		{
			$newcourse->save();
			return array('status'=>1,'dataid'=>$newcourse->id);
		}
		catch(Exception $e)
		{
			return $e;
		}
	}
	public function postBookadd(){
		$newbook=new Bookpublished();
		$newbook->book_name=Input::get('bookname');
		$newbook->book_authors=Input::get('authors');
		$newbook->book_publisher=Input::get('publisher');
		$newbook->book_isbn=Input::get('isbn');
		$newbook->book_year=Input::get('year');
		$newbook->book_other_details=Input::get('otherdetails');
		$newbook->book_edition=Input::get('edition');
		$newbook->added_by=Auth::user()->id;
		try
		{
			$newbook->save();
			return array('status'=>1,'dataid'=>$newbook->id);
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	public function postBookedit($id){
		$editbook=Bookpublished::find($id);
		$editbook->book_name=Input::get('editbookname');
		$editbook->book_authors=Input::get('editbookauthors');
		$editbook->book_publisher=Input::get('editbookpublisher');
		$editbook->book_isbn=Input::get('editbookisbn');
		$editbook->book_year=Input::get('editbookyear');
		$editbook->book_other_details=Input::get('editbookdetails');
		$editbook->book_edition=Input::get('editbookedition');
		$editbook->added_by=Auth::user()->id;
		try
		{
			$editbook->save();
			return array('status'=>1);
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	public function postCourseedit($id){
		$editbook=Facultycourse::find($id);
		$editbook->course_name=Input::get('editcoursename');
		$editbook->course_desc=Input::get('editcoursedesc');
		$editbook->course_link=Input::get('editcourselink');
		$editbook->added_by=Auth::user()->id;
		try
		{
			$editbook->save();
			return array('status'=>1);
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	public function postActivityedit($id){
		$editactivity=Activities::find($id);
		$editactivity->activity=Input::get('editactivitydesc');
		$editactivity->link=Input::get('editactivitylink');
		$editactivity->publish=Input::get('editpublishactivity');
		$editactivity->added_by=Auth::user()->id;
		try
		{
			$editactivity->save();
			return array('status'=>1);
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	public function postPublicationadd(){
		$newpublication=new Publications();
		$newpublication->title=Input::get('pubtitle');
		$newpublication->author=Input::get('authors');
		$newpublication->year=Input::get('year');
		$newpublication->journal=Input::get('journal');
		$newpublication->volume=Input::get('volume');
		$newpublication->pages=Input::get('page');
		$newpublication->doi=Input::get('doi');
		//$newpublication->research_group=Input::get('researchgroup');
		//$rg=implode(',',Input::get('researchgroup'));  CURRENTLY DISABLED due to implode error when group is empty. NARAYANAN
		//$newpublication->research_group = $rg;    NARAYANAN
		$newpublication->url='';
		$newpublication->added_by=Auth::user()->id;
		if(Input::hasFile('pubfile'))
		{
			$destinationPath = public_path().'/uploads/publication';	
	        if (!file_exists($destinationPath)) {
			    mkdir($destinationPath, 0777, true);
			}
	        $ext = Input::file('pubfile')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
			$filename = uniqid("pubfile_").'.'.$ext;
	        $uploadSuccess=Input::file('pubfile')->move($destinationPath, $filename);
	        
		    $newpublication->attachment=$filename;
		}
		else
		{
			$newpublication->attachment='';

		}
		try
		{
			$newpublication->save();
			//return array('status'=>1,'dataid'=>$newpublication->id);
			return Redirect::to('profile/'.Auth::user()->user_namehandle)->with('success', 'Publication added successfully.');
		}
		catch(Exception $e)
		{
			return $e;
		}
	}

	public function postPublicationedit($id){
		$editpublication=Publications::find($id);;
		$editpublication->title=Input::get('editpubtitle');
		$editpublication->author=Input::get('editauthors');
		$editpublication->year=Input::get('edityear');
		$editpublication->journal=Input::get('editjournal');
		$editpublication->volume=Input::get('editvolume');
		$editpublication->pages=Input::get('editpage');
		$editpublication->doi=Input::get('editdoi');
		$editpublication->research_group=Input::get('editresearchgroup');
		$editpublication->url='';
		$editpublication->added_by=Auth::user()->id;
		if(Input::hasFile('editpubfile'))
		{
			$destinationPath = public_path().'/uploads/publication';	
	        if (!file_exists($destinationPath)) {
			    mkdir($destinationPath, 0777, true);
			}
	        $ext = Input::file('editpubfile')->getClientOriginalExtension();//pathinfo($file[0], PATHINFO_EXTENSION);
			$filename = uniqid("pubfile_").'.'.$ext;
	        $uploadSuccess=Input::file('editpubfile')->move($destinationPath, $filename);
	        
		    $editpublication->attachment=$filename;
		}
		try
		{
			$editpublication->save();
			return Redirect::to('profile/'.Auth::user()->user_namehandle)->with('success', 'Publication updated successfully.');
		}
		catch(Exception $e)
		{
			return 0;
		}
	}

	public function postBookdelete($id)
	{
		if(Auth::user())
		{
			$findthebook=Bookpublished::find($id);
			if(count($findthebook))
			{
				try
				{
					$findthebook->delete();
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
		else
		{
			return 2;
		}
	}
	public function postActivitydelete($id)
	{
		if(Auth::user())
		{
			$findtheactivity=Activities::find($id);
			if(count($findtheactivity))
			{
				try
				{
					$findtheactivity->delete();
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
		else
		{
			return 2;
		}
	}
	public function postCoursedelete($id)
	{
		if(Auth::user())
		{
			$findthecourse=Facultycourse::find($id);
			if(count($findthecourse))
			{
				try
				{
					$findthecourse->delete();
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
		else
		{
			return 2;
		}
	}
	public function postPublicationdelete($id)
	{
		if(Auth::user())
		{
			$findpub=Publications::find($id);
			if(count($findpub))
			{
				try
				{
					$findpub->delete();
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
		else
		{
			return 2;
		}
	}

}
