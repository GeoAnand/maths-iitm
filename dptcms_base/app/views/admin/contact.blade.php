@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Contact | DeptCMS</title>
@stop

@section('content')
	<div class="col-sm-12">
		<!-- .breadcrumb -->
		  <ul class="breadcrumb">
		    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
		    <li class="active"> Contact</li>
		  </ul>
	  	<!-- / .breadcrumb -->
		<div class="">
		  <section class="panel">
		    <header class="panel-heading font-bold"> Contact</header>
		    <div class="panel-body">
		    		<form role="form" action="{{url('admin/contact/updatecontact/'.$getcontact[0]['id'])}}" id="contactupdate">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Heading</label>
					    <input type="text" class="form-control" id="" placeholder="i.e. HEAD OF THE DEPARTMENT" value="{{$getcontact[0]['contact_for']}}" name="heading">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Detail Address</label>
					  	<div id="officeaddress" class="summernote">
					      {{$getcontact[0]['contact_details']}}
		                </div>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">HOD Email</label>
					    <input type="email" class="form-control" id="" placeholder="i.e.  example@iitm.ac.in" value="{{$getcontact[0]['contact_email']}}" name="hodemail">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Office Email</label>
					    <input type="text" class="form-control" id="" placeholder="i.e.  example@iitm.ac.in" value="{{$getcontact[0]['contact_office_email']}}" name="officeemial">
					  </div>
					  <button type="submit" class="btn btn-primary">Update</button>
					</form>
		    </div>


		  </section>


	</div>
@stop
