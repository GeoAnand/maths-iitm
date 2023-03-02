@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-bars"></i> Research</a></li>
    <li class="active"> Publications</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Publications
    </header>
    
    <div class="panel-body">
		<section class="panel">
	        <header class="panel-heading">
	          Publications
	          <a href="{{url('admin/publications/addpublications')}}" class="pull-right btn btn-info btn-xs add-link-btn"><i class="fa fa-plus"></i> Add a Publication</a>
	        </header>
	        @if(count($getallpublications))
		        <div class="table-responsive">
		          <table class="table table-striped b-t text-sm">
		            <thead>
		              <tr>
		                <th width="62">S. No.</th>
		                <th class="th-sortable" data-toggle="class">Publication Title
		                  <span class="th-sort">
		                    <i class="fa fa-sort-down text"></i>
		                    <i class="fa fa-sort-up text-active"></i>
		                    <i class="fa fa-sort"></i>
		                  </span>
		                </th>
		                <th>Year</th>
		                <th>ISSN</th>
		                <th width="">Delete</th>
		              </tr>
		            </thead>
		            <tbody id="autoRefresh">
		             @for($i=0;$i < count($getallpublications);$i++)
		              <tr><?php $j = $i+1;?>
		                <td>{{$j}}</td>
		                <td>{{$getallpublications[$i]['title']}}</td>
		                <td>{{$getallpublications[$i]['year']}}</td>
		                <td>{{$getallpublications[$i]['issn']}}</td>
		                <td>
		                  <a href="#" class="btn btn-xs btn-info editpublication" data-id="{{$getallpublications[$i]['id']}}"><i class="fa fa-pencil-o"></i> Edit</a>
		                  <a href="#" class="btn btn-xs btn-danger deletepublication" data-id="{{$getallpublications[$i]['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
		                </td>
		              </tr>
		              @endfor	              
		            </tbody>
		          </table>
		        </div>
		    @else
		    	<div class="text-center">
		        	<span class="text-muted h5 block"> Sorry! we could not find any publications!</span>
		        	<a href="{{url('admin/publications/addpublications')}}" class="btn btn-lg btn-info create-event-btn m-b"><i class="fa fa-link fa-1x"></i> Add a publication Now!</a>
		        </div>
		    @endif 	        
	    </section>
	</div>
</section>
</div>
@stop