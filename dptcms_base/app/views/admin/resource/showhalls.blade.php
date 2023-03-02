@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/resources/dashboard')}}"><i class="fa fa-bars"></i> Resources</a></li>
    <li class="active"> Conference Halls</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Conference Halls
    </header>
    
    <div class="panel-body">
		<section class="panel">
	        <header class="panel-heading">
	          Conference Halls
	          <a href="{{url('admin/resources/addhalls')}}" class="pull-right btn btn-info btn-xs add-hall-btn"><i class="fa fa-plus"></i> Add a Hall</a>
	        </header>	        
	        <div class="table-responsive">
	          <table class="table table-striped b-t text-sm">
	            <thead>
	              <tr>
	                <th width="62">S. No.</th>
	                <th class="th-sortable" data-toggle="class">Hall Name
	                  <span class="th-sort">
	                    <i class="fa fa-sort-down text"></i>
	                    <i class="fa fa-sort-up text-active"></i>
	                    <i class="fa fa-sort"></i>
	                  </span>
	                </th>
	                <th>Hall Details</th>
	                <th>Hall Incharge</th>
	                <th>Contact</th>
	                <th>Delete</th>
	              </tr>
	            </thead>
	            <tbody id="autoRefresh">
	             @for($i=0;$i < count($getallhalls);$i++)
	              <tr><?php $j = $i+1;?>
	                <td>{{$j}}</td>
	                <td>{{$getallhalls[$i]['conference_halls_name']}}</td>
	                <td>{{$getallhalls[$i]['conference_halls_details']}}</td>
	                <td>{{$getallhalls[$i]['conference_halls_incharge']}}</td>
	                <td>{{$getallhalls[$i]['conference_halls_contact']}}</td>
	                <td>
	                  <a href="#" class="btn btn-xs btn-danger deletehall" data-toggle="class" data-id="{{$getallhalls[$i]['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
	                </td>
	              </tr>
	              @endfor	              
	            </tbody>
	          </table>
	        </div>	        
	    </section>
	</div>
</section>
</div>
@stop