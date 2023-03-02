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
          @foreach($getReaesrchGroups as $val)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$val->researchgroup_name}}</td>
              <td>{{$val->researchgroup_desc}}</td>
              <?php 
                $tmp=array_filter(explode(',', $val->researchgroup_users));
              ?>
              <td>{{count($tmp)}}</td>
              <td><span title="Edit" data-id="{{$val->id}}" class="btn btn-info btn-xs edit-research-group" style="cursor:pointer"><i class="fa fa-edit"></i> Edit</span></td>
              <td><span title="Delete" data-id="{{$val->id}}" class="btn btn-danger btn-xs delete-research-group" style="cursor:pointer"><i class="fa fa-trash-o"></i> Delete</span></td>
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
              <form role="form" action="{{url('admin/research/addgroup/0')}}" method="post" id="addnewgroup">
                <div class="form-group">
                  <label>Enter a group name</label>
                  <input type="text" class="form-control" name="researchgroupname" id="researchgroupname" required>
                </div>
                <div class="form-group">
                  <label>Enter a group Desc</label>
                  <textarea class="form-control" name="researchgroupdesc"></textarea>
                </div>
                <button class="btn btn-light" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel </button>
                <button type="submit" id="addGroupBtn" class="btn btn-success pull-right"><i class="fa fa-check"></i> Add Group</button>               
              </form>
            </div>            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="editGroupModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Edit Group</h3>
        </div>
        <div class="modal-body">        
          <div class="row spinner-base">          
            <div class="col-sm-12">
              <div class="modal-flash-message alert modal-error-message" hidden="hidden">
                <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                <span class="modal-flash-message-text"></span>
            </div>
              <form role="form" action="#" method="post" id="editgroup">
                <div class="form-group">
                  <label>Enter a group name</label>
                  <input type="text" class="form-control" name="researchgroupname" id="editresearchgroupname" required>
                </div>
                <div class="form-group">
                  <label>Enter a group Desc</label>
                  <textarea class="form-control" name="researchgroupdesc" id="editresearchgroupdesc"></textarea>
                </div>
                <button class="btn btn-light" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel </button>
                <button type="submit" id="editGroupBtn" class="btn btn-success pull-right"><i class="fa fa-check"></i> Update Group</button>               
              </form>
            </div>            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
@stop
