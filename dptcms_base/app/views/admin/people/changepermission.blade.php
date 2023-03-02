@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Add New People| DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
	<!-- .breadcrumb -->
  	<ul class="breadcrumb">
	    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    	<li class="active"> Create Admin People </li>
  	</ul>
	<div>
		<section class="panel">
		    <header class="panel-heading font-bold">Users List</header>
		    <div class="panel-body">
				<table id="userlist" class="table table-striped table-hover">
					<thead>
						<tr>
							<th class="col-md-3">User Name</th>
							<th class="col-md-3">Email</th>
							<th class="col-md-6">Module Access Privilege</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>
<!-- Previllage Modal -->
<!-- Modal -->
<div class="modal fade" id="PrevillageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="">User's Previllage</h4>
      </div>
      <div class="modal-body" id="availablePrevillage">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveUserPermission">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->
<script type="text/javascript">
	var root="{{url('/')}}";
	var oTable;
	$(document).ready(function() {
			/*oTable = $('#userlist').dataTable( {
			"sDom": "<'row'<'col-md-4'l><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page"
			},
			"bProcessing": true,
	        "bServerSide": true,
	        "sAjaxSource": "{{ URL::to('admin/alluser') }}",
	        "fnDrawCallback": function ( oSettings ) {
           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
     		}*/
     		$('#userlist').dataTable( {
		        "processing": true,
		        "serverSide": true,
		        "sAjaxSource": "{{ URL::to('admin/alluser') }}",
		    });
	});
</script>
@stop
