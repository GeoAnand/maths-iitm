@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/programs/dashboard')}}"><i class="fa fa-bars"></i> Programs</a></li>
    <li class="active"> Add New Program</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel" id="addProgramPanel">
    
    <header class="panel-heading font-bold">
        Add New Program
    </header>
    
    <div class="panel-body">
      <div class="row spinner-base">
        <div class="col-sm-12">
            <form role="form" class="form-horizontal" method="post" action="{{url('admin/programs/addprogram/0')}}" id="addProgramForm">
              <div class="form-group">
                <label class="col-lg-2 control-label">Program Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" placeholder="Program Name" name="progname" id="progname" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Program Overview</label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="progoverview" placeholder="Program Overview" required rows="7"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Selection Process</label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="selectionprocess" placeholder="Selection Process" required rows="7"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Total no of Semester</label>
                <div class="col-lg-10">
                  <input type="number" min="1" max="10" class="form-control" placeholder="Total no of Semester" name="ttlsem" id="ttlsem" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Structure of the Program</label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="progstructure" placeholder="Structure of the Program" required rows="7"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Career Prospects</label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="progcareer" placeholder="Career Prospects" required rows="7"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Display Order in menu</label>
                <div class="col-lg-10">
                  <input class="form-control" name="inmenuposition" placeholder="i.e. for 1'st position enter 1 " required rows="7">
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-2 control-label">Other Details</label>
                  <div class="col-lg-10">
                    <div id="otherdetails" class="form-control summernote">
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button id="cancelAddingProgramBtn" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Cancel</button>
                  <button type="submit" id="addProgramBtn" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Program</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>
@stop

@section('page-modals')
<!-- Any Modal specific to this page is placed here -->
@stop
