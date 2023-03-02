@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
	<!-- .breadcrumb -->
	<ul class="breadcrumb">
	    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
	    <li><a href="#"><i class="fa fa-user"></i> People</a></li>
	    <li class="active"> New People Type</li>
	</ul>
  	<!-- / .breadcrumb -->
  	<section class="panel">    
	    <header class="panel-heading font-bold">
	        Add New People Type
	    </header>
	    
	    <div class="panel-body">
	    	<div class="col-sm-12">
	    		<form role="form" class="form-horizontal" method="post" action="{{url('admin/usertype')}}" id="addnewpeopletype">
	    			<div class="form-group">
					    <label for="exampleInputPassword1">Enter a type name</label>
					    <input type="text" class="form-control" id="usertypename" name="usertypename">
					  </div>
					  <button type="submit" class="btn btn-default pull-right">Submit</button>
	    		</form>
	    	</div>
		</div>
	</section>
	<section class="panel">
        <header class="panel-heading font-bold">
        	Existing People type
        </header>
        <table class="table table-striped m-b-none text-sm">
          <thead>
            <tr>
              <th>Item</th>                    
              <th width="70"></th>
            </tr>
          </thead>
          <tbody id="updateUsertypeList">
          	@foreach($getallexisttype as $value)
            <tr>                    
              <td>{{$value->user_type_name}}</td>
              <td class="text-right">
                <div class="btn-group">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil"></i></a>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="#" data-id="{{$value->id}}" class="deleteusertype">Delete</a></li>
                    <!-- <li><a href="#" data-id="{{$value->id}}" class="editusertype">Edit name</a></li> -->
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </section>
</div>

@stop