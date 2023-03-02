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
    <li class="active"> Documents</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Documents
    </header>
    
    <div class="panel-body">
		<section class="panel">
	        <header class="panel-heading">
	          Documents
	          <a href="{{url('admin/resources/adddocs')}}" class="pull-right btn btn-info btn-xs add-docs-btn"><i class="fa fa-plus"></i> Add a Document</a>
	        </header>	        
	        <div class="table-responsive">
	          <table class="table table-striped b-t text-sm">
	            <thead>
	              <tr>
	                <th width="62">S. No.</th>
	                <th class="th-sortable" data-toggle="class">Document Title
	                  <span class="th-sort">
	                    <i class="fa fa-sort-down text"></i>
	                    <i class="fa fa-sort-up text-active"></i>
	                    <i class="fa fa-sort"></i>
	                  </span>
	                </th>
	                <th>Document URL</th>
	                <th> Verify Document </th>
	                <th width="">Delete</th>
	              </tr>
	            </thead>
	            <tbody>
	            @for($i=0;$i < count($getalldocs);$i++)
	              <tr><?php $j = $i+1;?>
	                <td>{{$j}}</td>
	                <td>{{$getalldocs[$i]['resource_document_title']}}</td>
	                <td>{{url('admin/resources/document/'.$getalldocs[$i]['id'])}}</td>
	                <td><a href="{{url('admin/resources/document/'.$getalldocs[$i]['id'])}}" class="btn btn-xs btn-default viewdocd" target="_blank"> <i class="fa fa-external-link"></i> View Document </a></td>
	                <td>
	                  <a href="#" class="btn btn-xs btn-danger deletedocs" data-toggle="class" data-id="{{$getalldocs[$i]['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
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
<!-- view docs Modal -->
<div class="modal fade" id="displayDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 0px solid #e5e5e5;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
@stop