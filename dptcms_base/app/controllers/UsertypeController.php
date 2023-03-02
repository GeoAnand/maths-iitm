<?php

class UsertypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$gtealltype=Usertype::all();
		foreach ($gtealltype as $key) {
			echo $key->user_type_name;
		}
		return "show all user type";
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$getallexisttype=Usertype::all();
		return View::make('admin.usertype.create',array('getallexisttype'=>$getallexisttype));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$newusertype=new Usertype();
		$newusertype->user_type_name=Input::get('usertypename');
		$program=explode(' ',Input::get('usertypename'));
	      if(count($program))
	      {
	        $program=implode('-', $program);
	      }
	      else
	      {
	        $program=$val->program_name;
	      }
		$newusertype->link=$program;
		$newusertype->user_type_created_by=Auth::user()->id;
		

		try
		{
			$newusertype->save();
			
			$list='<tr><td>'.Input::get('usertypename').'</td><td class="text-right"><div class="btn-group"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil"></i></a><ul class="dropdown-menu pull-right"><li><a href="#" data-id="'.$newusertype->id.'">Delete</a></li><li><a href="#" data-id="'.$newusertype->id.'">Edit name</a></li></ul></div></td></tr>';

			return array('success'=>"true",'list'=>$list);
		}
		catch(\Exception $e)
		{
		    return array('success'=>"true");
		}	
		//Redirect::to('usertype/'.$newusertype->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$newUsertype=Usertype::find($id);
		if(count($newUsertype))
		{
			print_r($newUsertype);
			return "View Single type!!";
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
		$deletetype=Usertype::find($id);
		try
		{
			$deletetype->delete();
			return "true";
		}
		catch(\Exception $e)
		{
		    return "false";
		}	
		

	}


}
