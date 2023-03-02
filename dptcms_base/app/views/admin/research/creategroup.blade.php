@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Research Groups | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">

  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/research/dashboard')}}"><i class="fa fa-book"></i> Research</a></li>
    <li class="active"> Research Groups </li>
  </ul>
  <!-- / .breadcrumb -->
  <section class="panel">
    <header class="panel-heading font-bold"> Research Groups</header>
    <div class="panel-body">
    	<header>
          <div class="pull-left h3 m-t-sm">
            Research Groups
          </div>
        </header>
        <table class="table">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>Group Name</th>
		          <th>Group Desc</th>
		          <th>No Of people</th>
		          <th></th>
		        </tr>
		      </thead>
		      <tbody id="autoRefresh">
		      <?php $i=1;?>
		      @foreach($getallresearchgroup as $val)
		        <tr>
		          <td>{{$i++}}</td>
		          <td>{{$val->researchgroup_name}}</td>
		          <td>{{$val->researchgroup_desc}}</td>
		          <?php 
		            $tmp=array_filter(explode(',', $val->researchgroup_users));
		          ?>
		          <td>{{count($tmp)}}</td>
		          <td><span title="Delete" data-id="{{$val->id}}" class="text-danger researchgroup" style="cursor:pointer"><i class="fa fa-times text-danger"></i></span></td>
		        </tr>
		      @endforeach
		      </tbody>
		</table>

		<div class="line line-dashed line-lg pull-in"></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<a href="#addGroupModal" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus"></i> Add a Group</a>
			</div>
		</div>    	
    </div>
  </section>
</div>
@stop

@section('page-modals')
  <div class="modal fade" id="addGroupModal">
    <div class="modal-dialog">
      <div class="modal-content">
      	<div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal">&times;</button>
      		<h3 class="modal-title">Add a New Group</h3>
      	</div>
        <div class="modal-body">	    	
          <div class="row spinner-base">	        
            <div class="col-sm-12">
	            <div class="modal-flash-message alert modal-error-message" hidden="hidden">
		            <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
		            <span class="modal-flash-message-text"></span>
		        </div>
              <form role="form" action="{{url('research/addgroup/0')}}" method="post" id="addnewgroup">
                <div class="form-group">
                  <label>Enter a group name</label>
                  <input type="text" class="form-control" name="researchgroupname" id="researchgroupname" required>
                </div>
                <div class="form-group">
                  <label>Enter a group Desc</label>
                  <textarea class="form-control" name="researchgroupdesc"></textarea>
                </div>
                <button class="btn btn-light" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel </button>
				<button type="submit" id="addGroupBtn" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Add Group</button>               
              </form>
            </div>            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
@stop

@section('page-scripts')
<script type="text/javascript">
var path="{{url('/')}}";

$(document).on("submit", "#addnewgroup", function(event){
    event.preventDefault();
    if($("#researchgroupname").val())
    {
      var data1=$(this).serialize();
      var url=$(this).attr("action");
      //console.log(url);
      $.post(url,data1,function(data){
      	$("#addGroupModal input").attr("disabled", "disabled");
        $("#addGroupBtn").removeClass("btn-primary");
        $("#addGroupBtn").addClass("btn-default");
        $("#addGroupBtn").html('<i class="fa fa-spinner fa fa-spin"></i> Adding Group');
        $(".flash-message").hide();
        $(".modal-flash-message").hide();

        w = $("#addGroupModal .modal-body").width()+parseInt($("#addGroupModal .modal-body").css("paddingLeft").replace('px', ''))+parseInt($("#addGroupModal .modal-body").css("paddingRight").replace('px', ''));
        h = $("#addGroupModal .modal-body").height();
        pL = $("#addGroupModal .modal-body").css("paddingLeft");
        pT = $("#addGroupModal .modal-body").css("paddingTop");
        $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20)+'px; padding-left:'+(w/2-23)+'px;"></div></div>').insertBefore("#addGroupModal .modal-body .spinner-base");

         
      }).done(function(data){
      	if(data!="error"){
      		$("#addGroupModal .spinner-container").remove();
         	$("#autoRefresh").html(data);
         	$("#addnewgroup").trigger('reset');
         	$("#addGroupModal input").removeAttr("disabled");
         	$("#addGroupBtn").removeClass("btn-default");
	        $("#addGroupBtn").addClass("btn-primary");
	        $("#addGroupBtn").html('<i class="fa fa-check"></i> Add Group');
         	$("#addGroupModal").modal('hide');
         	$(".flash-message-text").text("Group was added Successfully!");
	        $(".flash-message").removeClass("alert-danger");
	        $(".flash-message").removeClass("alert-warning");
	        $(".flash-message").removeClass("alert-info");
	        $(".flash-message").addClass("alert-success");
	        $(".flash-message").show();
        }
        else
        {
        	$("#addGroupModal .spinner-container").remove();
        	$("#addGroupModal input").removeAttr("disabled");
        	$("#addGroupBtn").removeClass("btn-default");
	        $("#addGroupBtn").addClass("btn-primary");
	        $("#addGroupBtn").html('<i class="fa fa-check"></i> Add Group');
        	$(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
	        $(".modal-flash-message").removeClass("alert-success");
	        $(".modal-flash-message").removeClass("alert-warning");
	        $(".modal-flash-message").removeClass("alert-info");
	        $(".modal-flash-message").addClass("alert-danger");
	        $(".modal-flash-message").show();
        }
      });
    }
    else
    {
      alert("Enter a Group Name");
    }
});

$(document).on("click", ".researchgroup", function(){
	var group = $(this);
	bootbox.confirm("Are you sure?", function(result) {
	  	if(result)
	    {
	      $.post(path+"/research/deletegroup/"+group.attr('data-id'),{},function(data){         
	      }).done(function(data){
	      	$("#autoRefresh").html(data);
	        $(".flash-message-text").text("Group deleted Successfully!");
	        $(".flash-message").removeClass("alert-danger");
	        $(".flash-message").removeClass("alert-warning");
	        $(".flash-message").removeClass("alert-info");
	        $(".flash-message").addClass("alert-success");
	        $(".flash-message").show();
	      });      
	    }
	});    
});
</script>
@stop
