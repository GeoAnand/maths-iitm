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
    <li class="active"> Links</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Links
    </header>
    
    <div class="panel-body">
		<section class="panel">
	        <header class="panel-heading">
	          Links
	          <a href="{{url('admin/resources/addlinks')}}" class="pull-right btn btn-info btn-xs add-link-btn"><i class="fa fa-plus"></i> Add a Link</a>
	        </header>	        
	        <div class="table-responsive">
	          <table class="table table-striped b-t text-sm">
	            <thead>
	              <tr>
	                <th width="62">S. No.</th>
	                <th class="th-sortable" data-toggle="class">Link Title
	                  <span class="th-sort">
	                    <i class="fa fa-sort-down text"></i>
	                    <i class="fa fa-sort-up text-active"></i>
	                    <i class="fa fa-sort"></i>
	                  </span>
	                </th>
	                <th>URL</th>
	                <th> Verify Link </th>
	                <th width="">Delete</th>
	              </tr>
	            </thead>
	            <tbody id="autoRefresh">
	             @for($i=0;$i < count($getalllinks);$i++)
	              <tr><?php $j = $i+1;?>
	                <td>{{$j}}</td>
	                <td>{{$getalllinks[$i]['resource_links_title']}}</td>
	                <td>{{$getalllinks[$i]['resource_links_link']}}</td>
	                <td><a href="{{$getalllinks[$i]['resource_links_link']}}" class="btn btn-xs btn-default" target="_blank"> <i class="fa fa-external-link"></i> Open </a></td>
	                <td>
	                  <a href="#" class="btn btn-xs btn-danger deletelink" data-toggle="class" data-id="{{$getalllinks[$i]['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
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