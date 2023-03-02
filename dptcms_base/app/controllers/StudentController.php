<?php
class StudentController extends BaseController {

	public function getAddstudent()
	{
		return View::make('admin.student.create');
	}

	public function getDashboard()
	{
		return View::make('admin.student.dashboard');
	}
	
	public function postAddstudent()
	{
		if(Auth::check())
		{
			$addnewstudent=new Student;
			$addnewstudent->student_program_id=Input::get('whichprogram');
			$addnewstudent->student_name=Input::get('stname');
			$addnewstudent->student_rollno=Input::get('stroll');
			if(count(Input::get('styear'))){
				$addnewstudent->student_year=Input::get('styear');
			}else{
				$addnewstudent->student_year=0;
			}
			//$addnewstudent->student_guide_name=Input::get('stguide');
			$addnewstudent->student_added_by=Auth::user()->id;
			
			try 
			{
				$addnewstudent->save();
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

	public function getShowstudents($id)
	{
		$getallstudent=Student::orderBy('student_rollno','ASC')->where('student_program_id','=',$id)->get();		
		$getfirstyearstudent=Student::orderBy('student_rollno','ASC')->where('student_program_id','=',$id)->where('student_year','=','1')->get();
		$getsecondyearstudent=Student::orderBy('student_rollno','ASC')->where('student_program_id','=',$id)->where('student_year','=','2')->get();
		$data=array('getallstudent'=>$getallstudent,'getfirstyearstudent'=>$getfirstyearstudent,'getsecondyearstudent'=>$getsecondyearstudent,'progid'=>$id);
		return View::make('admin.student.view',$data);
	}

	public function postAllstudentbyyear($id)
	{
		$getstudentbyyear=Student::where('student_program_id','=',Input::get('progid'))->where('student_year','=',$id)->get();
		$i=1;
		$tmp='';
	    foreach($getstudentbyyear as $val)
	    {
	        $tmp.='<tr><td><input type="checkbox" name="selectstudent" data-id="'.$val->id.'"/></td><td>'.$i.'</td><td>'.$val->student_name.'</td><td>'.$val->student_rollno.'</td><td><a href="#" class="btn btn-xs btn-danger deletestudent" data-id="'.$val->id.'"><i class="fa fa-trash-o"></i> Delete</a> <a href="#" class="btn btn-xs btn-info editstudent" data-id="'.$val->id.'"><i class="fa fa-edit"></i> Edit</a>
					                </td></tr>';
	    	$i++;
	    }
	    return $tmp;
	}

	public function postDeletestudent($id)
	{
		if(Auth::check() &&  Auth::user()->isadmin==1)
		{
			$deletestudent=Student::find($id);
			if($deletestudent)
			{				
				try
				{
					$deletestudent->delete();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if($error==0)
				{								
				    $data=array('deleted'=>"true");

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
				$data=array('deleted'=>"Error! No such student exist.");
				return $data;
			}
		}
		else
		{
			$data=array('deleted'=>"Error! Unauthorized access.");
			return $data;
		}
	}

	public function postImport($id)
	{
		
		if(Input::hasFile('importStudentfile') && Input::file('importStudentfile')->getClientOriginalExtension()=='xls')
		{
			$results =Excel::load(Input::file('importStudentfile'), function($reader) {

			})->select(array('rollno', 'firstname', 'lastname', 'year'))->get();
			// $results =Excel::load(Input::file('importStudentfile'), function($reader) {

			// })->select(array('name','roll','year','guide'))->get();


			$error = 0;
			//var_dump($results); exit;

		    // Getting all results
		    // $results = $reader->select(array('name', 'roll','year','guide'))->get();
		    // return print_r($results);
		    foreach ($results as $value) 
		    {	
		    	$addnewstudent=new Student;
				$addnewstudent->student_program_id=$id;
				$addnewstudent->student_name=ucwords(strtolower($value->firstname)).' '.ucwords(strtolower($value->lastname));
				$addnewstudent->student_rollno=$value->rollno;
				$addnewstudent->student_year=$value->year;
				// $addnewstudent->student_guide_name=$value->guide;
				$addnewstudent->student_added_by=Auth::user()->id;

				// $addnewstudent=new Student;
				// $addnewstudent->student_program_id=$id;
				// $addnewstudent->student_name=$value->name;
				// $addnewstudent->student_rollno=$value->roll;
				// $addnewstudent->student_year=$value->year;
				// $addnewstudent->student_guide_name=$value->guide;
				// $addnewstudent->student_added_by=Auth::user()->id;
				$addnewstudent->save();
				
		    }

		    try {
		    	//$addnewstudent->save();
		    	$getallstudent=Student::orderBy('student_rollno','ASC')->where('student_program_id','=',$id)->get();		
				$i=1;
				$tmp='';
			    foreach($getallstudent as $val)
			    {
			        $tmp.='<tr><td><input type="checkbox" name="selectstudent" data-id="'.$val->id.'"/></td><td>'.$i.'</td><td>'.$val->student_name.'</td><td>'.$val->student_rollno.'</td><td><a href="#" class="btn btn-xs btn-danger deletestudent" data-id="'.$val->id.'"><i class="fa fa-trash-o"></i> Delete</a> <a href="#" class="btn btn-xs btn-info editstudent" data-id="'.$val->id.'"><i class="fa fa-edit"></i> Edit</a>
							                </td></tr>';
			    	$i++;
			    }
		    	
				$error = 0;
		    	
		    } catch (Exception $e) {
		    	$error = 1;
		    }
		   
		    if ($error == 0) {
		    	$data = array('studentlist' => $tmp, 'progid' => $id, 'result' => 'true');
		    } else {
		    	$data = array('result' => 'false');
		    }

		    return $data;

		}
		else
		{
			$data = array('result' => 'error');
			return $data;
		}
	}

	public function getEdit($id)
	{
		$details=Student::find($id);
		return View::make('admin.student.editstudent',compact('details'));
	}

	public function postEdit()
	{
		$id=Input::get('id');
		$details=Student::find($id);
		$details->student_name=Input::get('stname');
		$details->student_rollno=Input::get('stroll');
		$details->student_year=Input::get('styear');
		$details->student_guide_name=Input::get('stguide');
		$details->student_added_by=Auth::user()->id;
		$details->save();

		return 1;
	}

	
}





