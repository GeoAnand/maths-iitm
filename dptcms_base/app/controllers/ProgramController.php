<?php
class ProgramController extends BaseController {

	
	// Add New Program Page View
	public function getAddprogram()
	{
		if(Auth::check())
		{
			return View::make('admin.programs.create');
		}
		else 
		{
			return "Error! Unauthorized Access.";
		}
	}

	public function getDashboard()
	{
		if(Auth::check())
		{
			return View::make('admin.programs.dashboard');
		}
		else 
		{
			return "Error! Unauthorized Access.";
		}
	}


	// Add/Edit Program Form Handling
	public function postAddprogram($id)
	{
		if(Auth::check())
		{
			if($id==0)
			{
				$addnewprogram=new Programs();
				$addnewprogram->program_name=Input::get('progname');
				$addnewprogram->program_total_sem=Input::get('ttlsem');
				$addnewprogram->overview=Input::get('progoverview');
				$addnewprogram->selection=Input::get('selectionprocess');
				$addnewprogram->strictureofprogram=Input::get('progstructure');
				$addnewprogram->carrer=Input::get('progcareer');
				$addnewprogram->orderinmenu=Input::get('inmenuposition');
				$addnewprogram->program_created_by=Auth::user()->id;
				$addnewprogram->otherdetails=Input::get('otherdetails');
				try
				{
					$addnewprogram->save();
					$error = 0;
				} catch (Exception $e) {
					$error = 1;
				}
				if ($error==0) {
					$addnewprogram->save();

					//update pogram list
					$getallprog=Programs::all();
					$newMenu='';
				    foreach($getallprog as $val)
				    {
				        $newMenu.='<li class="nav-link"><a href="admin/programs/showprogramdetails/'.$val->id.'">'.$val->program_name."</a>
				        </li>";
				    }
				    $newMenu.='<li class="nav-link"><a href="admin/programs/addprogram">+ Add Program</a></li>';
				    $data=array('newMenu'=>$newMenu,'progid'=>$addnewprogram->id, 'added'=>"true");
				}
				else
				{
					$data=array('added'=>"false");
				}
				
			}
			elseif($id>0)
			{
				//Edit Existing Program Details
				$findprogram=Programs::find($id);
				$findprogram->program_name=Input::get('editProgramName');
				$findprogram->overview=Input::get('programOverview');
				$findprogram->selection=Input::get('selectionprocess');
				$findprogram->strictureofprogram=Input::get('programstructure');
				$findprogram->carrer=Input::get('carrer');
				$findprogram->orderinmenu=Input::get('inmenuposition');
				$findprogram->program_total_sem=Input::get('noofsemester');
				$findprogram->otherdetails=Input::get('otherdetails');
				try 
				{
					$findprogram->save();
					$error = 0;
				}
				catch(Exception $e)
				{
					$error = 1;
				}

				if ($error==0) {
					$findprogram->save();

					//update pogram list
					$getallprog=Programs::all();
					$newMenu='';
				    foreach($getallprog as $val)
				    {
				        $newMenu.='<li class="nav-link"><a href="admin/programs/showprogramdetails/'.$val->id.'">'.$val->program_name."</a>
				        </li>";
				    }
				    $newMenu.='<li class="nav-link"><a href="admin/programs/addprogram">+ Add Program</a></li>';
				    $data=array('newMenu'=>$newMenu, 'updated'=>"true");
				}
				else
				{
					$data=array('updated'=>"false");
				}				
			}
			else
			{
				$data=array('updated'=>"Error! No such program exist");				
			}
		}
		else
		{
			$data=array('updated'=>"Error! Unauthorized Access.");
		}

		return $data;
	}

	public function postDeleteprogram($id)
	{
		if(Auth::check() )
		{
			if($id>0)
			{
				$deleteprogram=Programs::find($id);
				try 
				{
					$deleteprogram->delete();
					$error = 0;
				} catch (Exception $e) 
				{
					$error = 1;
				}	
				
				if($error==0)
				{
					$getallprog=Programs::all();
					$newMenu='';
				    foreach($getallprog as $val)
				    {
				        $newMenu.='<li class="nav-link"><a href="admin/programs/showprogramdetails/'.$val->id.'">'.$val->program_name."</a>
				        </li>";
				    }
				    $newMenu.='<li class="nav-link"><a href="admin/programs/addprogram">+ Add Program</a></li>';
				    $data=array('newMenu'=>$newMenu,'deleted'=>"true");

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
				$data=array('deleted'=>"No such Program exist!");
				return $data;
			}
			
		}
		else
		{
			$data=array('deleted'=>"Unauthorized Access !");
			return $data;
		}
	}
	
	public function getAddcourse()
	{
		if(Auth::check())
		{
			return View::make('admin.programs.createcourse');
		}
		else 
		{
			return "not auth !!";
		}
	}

	public function postAddcourse()
	{
		if(Auth::check())
		{
			$addnewcourse=new Course();
			$addnewcourse->course_no=Input::get('courseno');
			$addnewcourse->course_name=Input::get('coursename');
			$addnewcourse->course_credit=Input::get('coursecredit');
			$addnewcourse->course_year=Input::get('courseyear');
			$addnewcourse->course_program_id=Input::get('whichprogram');
			$addnewcourse->course_sem=Input::get('whichsem');
			$addnewcourse->course_details=Input::get('coursedetails');
			$addnewcourse->course_added_by=Auth::user()->id;
			$addnewcourse->courser_reference=Input::get('courseref');
			
			try {
				$addnewcourse->save();
				$error=0;
			} catch (Exception $e) {
				$error=1;
			}
			if($error==0){
				$getcoursedetails=Course::where('course_program_id','=',Input::get('whichprogram'))->where('course_sem','=',Input::get('whichsem'))->get();

				$i=Input::get('whichsem');$j = 0; $tmp="";
				$tmp.='<!-- .accordion -->
			              <div class="panel-group m-b" id="courseList{{$i}}">';
			    if (count($getcoursedetails)) {		    	
		            foreach ($getcoursedetails as $val) {
		                $tmp.='<div class="panel bg-light">
		                  <div class="panel-heading lter">				                    
			                    <a class="accordion-toggle block" data-toggle="collapse" data-parent="#courseList'.$i.'" href="#course'.$i.$j.'">
			                      <b class="">'.$val->course_no.'  -  '.$val->course_name.'</b> <span class="text-muted pull-right">Credits:'.$val->course_credit.'</span>
			                    </a>			                    
			              </div>
		                  <div id="course'.$i.$j.'" class="panel-collapse collapse lt">
		                    <div class="panel-body text-sm">
		                    	<div class="courseDetails">
		                    		<a href="#" class="editCourseDetailsBtn btn btn-sm btn-info pull-right" data-course="course'.$i.$j.'"><i class="fa fa-edit fa-1x"></i> Edit Course Details</a>
			                    	<h4>'.$val->course_no.' '.$val->course_name.'</h4>
			                    	<h5><b>Course Year</b> - <span>'.$val->course_year.'</span></h5>
			                    	<h5><b>Course Details</b></h5>';
			        	if($val->course_details)
			        	{
			        	$tmp.='<p class="m-t">'.$val->course_details.'</p>';			
			        	}
						else
						{
						$tmp.='<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-course-details btn btn-xs btn-default">Add it Now</a></span>';
						}
						$tmp.='<h5><b>References</b></h5>';	

			        	if($val->courser_reference)
			        	{
			        	$tmp.='<p class="m-t">'.$val->courser_reference.'</p>';				
			        	}
						else
						{
						$tmp.='<span class="text-muted">Sorry! No Content added for this section. <a href="#" class="add-course-details btn btn-xs btn-default">Add it Now</a></span>';
						}
						$tmp.=' </div>
			                	<div class="editCourseDetails" hidden="hidden">
			                		<section class="panel">
					                    <header class="panel-heading font-bold">
					                    	Edit Course Details
					                    	<!-- <a href="#courseSettingsModal" class="pull-right" data-toggle="modal" id="courseSettings"><i class="fa fa-cog fa-2x"></i></a> -->
					                    </header>
					                    <div class="panel-body">
					                      <form class="bs-example form-horizontal">							                        
							                <div class="form-group">
					                          <label class="col-lg-2 control-label">Course Name</label>
					                          <div class="col-lg-10">
					                            <input type="text" class="form-control" name="editCourseName" id="" value="'.$val->course_name.'" required />
					                          </div>
					                        </div>
					                        <div class="form-group">
					                          <label class="col-lg-2 control-label">Course Code</label>
					                          <div class="col-lg-10">
					                            <input type="text" class="form-control" name="editProgramName" id="" value="'.$val->course_no.'" required />
					                          </div>
					                        </div>
					                        <div class="form-group">
					                          <label class="col-lg-2 control-label">Course Credits</label>
					                          <div class="col-lg-10">
					                            <input type="number" class="form-control" name="editProgramSemesters" id="" value="'.$val->course_credit.'" required />
					                          </div>
					                        </div>
					                        <div class="form-group">
					                          <label class="col-lg-2 control-label">Course Year</label>
					                          <div class="col-lg-10">
					                            <input type="text" class="form-control" disabled placeholder="'.$val->course_year.'" name="courseYear" vlue="'.$val->course_year.'" />
					                          </div>
					                        </div>
					                        <div class="form-group">
					                          <label class="col-lg-2 control-label">Course Details</label>
					                          <div class="col-lg-10">
					                            <textarea class="form-control" placeholder="Course Details">'.$val->course_details.'</textarea>
					                          </div>
					                        </div>
					                        <div class="form-group">
					                          <label class="col-lg-2 control-label">References </label>
					                          <div class="col-lg-10">
					                            <textarea class="form-control" placeholder="References">'.$val->courser_reference.'</textarea>
					                          </div>
					                        </div>							                        
					                        <div class="form-group">
					                          <div class="col-lg-offset-2 col-lg-10">
					                            <button class="cancelEditingCourse btn btn-sm btn-default" data-course="course'.$i.$j.'"><i class="fa fa-times"></i> Cancel</button>
					                            <button type="submit" class="saveCourseDetails btn btn-sm btn-primary" data-course="course'.$i.$j.'"><i class="fa fa-check"></i> Save Changes</button>
					                          	<button class="deleteCourse btn btn-sm btn-danger pull-right" data-course="course'.$i.$j.'"><i class="fa fa-trash-o"></i> Delete Course</button>
					                          </div>
					                        </div>
					                      </form>
					                    </div>
					                </section>
			                	</div>
			                </div>
			              </div>
			            </div>';
			            $j++; 
					}
				}
				else
				{
					$tmp.='								<span class="text-muted">Sorry! No Course added for this Program. <a href="#" class="add-course btn btn-xs btn-default" data-whichprogram="'.$getprogdetails->id.'" data-whichsem="'.$i.'">Add it Now</a></span>';
				}
				$tmp.='</div>
			            <!-- / .accordion -->
						<div align="center"><a class="btn btn-success add-course" href="#" data-whichprogram="'.Input::get('whichprogram').'" data-whichsem="'.$i.'"> + Add Course</a></div>
					';
				return $tmp;
			}
			else
			{
				return "error";
			}
		}
		else
		{
			return "Unauthorozed Access !";
		}

	}

	public function postUpdatecourse($id)
	{
		if(Auth::check())
		{
			
			$findcourse=Course::find($id);
			$findcourse->course_name=Input::get('editCourseName');
			$findcourse->course_no=Input::get('courseCode');
			$findcourse->course_credit=Input::get('courseCredit');
			$findcourse->course_details=Input::get('courseDetails');
			$findcourse->courser_reference=Input::get('courseref');
			try 
			{
				$findcourse->save();
				return 1;
			} 
			catch (Exception $e) 
			{
				return 0;
			}

		}
		else
		{
			return 2;
		}

	}
	public function postDeletecourse($id)
	{
		if(Auth::check())
		{
			$findcourse=Course::find($id);
			try
			{
				$findcourse->delete();
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

	/*public function getShowprogramdetails($id)
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

	public function getCoursedetails($id)
	{
		$getcoursedetails=Course::find($id);
		if(count($getcoursedetails))
		{
			$data=array(
				'getcoursedetails'=>$getcoursedetails,
			);
			return View::make('programs.courseview',$data);
		}
		else
		{
			return Response::view('errors.missing');
		}
	}

	public function getAllstudent($id)
	{
		$getstudent=Student::where('student_program_id','=',$id)->get();
		$data=array('getstudent'=>$getstudent,'progid'=>$id);
		return View::make('student.studentview',$data);
	}*/
	public function getShowprogramdetails($id)
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

	public function getProgram($id)
	{
		$getprogdetails=Programs::find($id);
		if(count($getprogdetails))
		{
			$data=array(
				'getprogdetails'=>$getprogdetails,
				);
			return View::make('programs.programview',$data);
		}
		else
		{
			return Response::view('errors.missing');
		}
	}

	public function getCoursedetails($id)
	{
		$getcoursedetails=Course::find($id);
		if(count($getcoursedetails))
		{
			$data=array(
				'getcoursedetails'=>$getcoursedetails,
			);
			return View::make('programs.courseview',$data);
		}
		else
		{
			return Response::view('errors.missing');
		}
	}

	public function getAllstudent($id)
	{
		$getallstudent=Student::groupBy('student_year')->orderBy('student_rollno','ASC')->where('student_program_id','=',$id)->get();
		$data=array('getallstudent'=>$getallstudent,'progid'=>$id);
		return View::make('student.studentview',$data);
	}

	public function getSyllabus($id)
	{
		$getall=Course::where('course_program_id','=',$id)->where('course_year','=',$_GET['year'])->where('course_sem','=',$_GET['sem'])->get();
		return View::make('programs.syllabus',array('getall'=>$getall));
	}

	public function postAllstudentbyyear($id)
	{
		$getstudentbyyear=Student::where('student_program_id','=',Input::get('progid'))->where('student_year','=',$id)->get();
		$i=1;
		$tmp='';
	    foreach($getstudentbyyear as $val)
	    {
	        $tmp.='<tr><td>'.$i.'</td><td>'.$val->student_name.'</td><td>'.$val->student_rollno.'</td></tr>';
	    	$i++;
	    }

	    // $paginate = $getstudentbyyear->links();
	    // $paginate=str_replace("\r\n", "", $paginate);
	    // return array("tmp"=>$tmp, "p"=>$paginate);
	    
	    return $tmp;
	}

	public function postAllcoursebyyearforsem($id)
	{
		$getcoursebyyear=Course::where('course_program_id','=',Input::get('progid'))->where('course_year','=',$id)->where('course_sem','=',Input::get('sem'))->get();
		$i=1;
		$tmp='';
	    foreach($getcoursebyyear as $val)
	    {
	        $tmp.='<tr><td>'.$val->course_no.'</td><td><a href="'.url('program/course/'.$val->id).'" class="viewcourse" data-coursename="'.$val->course_no.' '.$val->course_name.'">'.$val->course_name.'</a>
</td><td>'.$val->course_credit.'</td></tr>';
	    	$i++;
	    }

	    // $paginate = $getstudentbyyear->links();
	    // $paginate=str_replace("\r\n", "", $paginate);
	    // return array("tmp"=>$tmp, "p"=>$paginate);
	    
	    return $tmp;
	}

	public function postAllcoursebyyear($id)
	{
		$getcoursebyyear=Course::where('course_program_id','=',Input::get('progid'))->where('course_year','=',$id)->get();
		$i=1;
		$tmp='';
// 	    foreach($getcoursebyyear as $val)
// 	    {
// 	        $tmp.='<tr><td>'.$val->course_no.'</td><td><a href="'.url('program/course/'.$val->id).'" class="viewcourse" data-coursename="'.$val->course_no.' '.$val->course_name.'">'.$val->course_name.'</a>
// </td><td>'.$val->course_credit.'</td></tr>';
// 	    	$i++;
// 	    }

	    for($i=1;$i<=Input::get('sem');$i++){
	    	$tmp.='<div class="tab-pane tabclass" id="tab'.$i.'"><div class="col-sm-6" style="padding: 20px;"><section class="panel"><table class="table table-striped m-b-none text-sm"><thead><tr class="dpt-text-dark"><th>Course No.</th><th>Course Name</th><th>Credit</th></tr></thead><tbody id="courselistbyyear">';	
	    	$getcoursedetails=Course::where('course_program_id','=',Input::get('progid'))->where('course_sem','=',$i)->where('course_year','=',$id)->get();		                      	
	    	foreach($getcoursedetails as $val){
	    		$tmp.='<tr><td>'.$val->course_no.'</td><td><a href="'.url('program/course/'.$val->id).'" class="viewcourse" data-coursename="'.$val->course_no.' '.$val->course_name.'">'.$val->course_name.'</a></td><td>'.$val->course_credit.'</td></tr>';
	    	}
	    	$tmp.='</tbody></table></section></div>';
	    	$tmp.='<div class="col-sm-12"><a class="btn dpt-btn-dark" data-href="'.url('program/syllabus/'.Input::get('progid')).'" id="viewsyllabus" data-title="'.Input::get('progname').'" data-year="'.$id.'" data-sem="'.$i.'">View Syllabus</a></div></div>';
	    }

	    // $paginate = $getstudentbyyear->links();
	    // $paginate=str_replace("\r\n", "", $paginate);
	    // return array("tmp"=>$tmp, "p"=>$paginate);
	    
	    return $tmp;
	}

	
}