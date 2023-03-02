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
    <li class="active"> Add Conference Halls</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Add Conference Halls
    </header>
    
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="post" action="{{url('admin/resources/addhalls/0')}}" id="addhallsform">        
        <div class="form-group">
          <label class="col-sm-2 control-label">Hall Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Hall Name" name="hallname">
          </div>
        </div>
       <div class="form-group">
          <label class="col-sm-2 control-label">Hall Details</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Hall Details" name="halldetails">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Hall Incharge</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Hall Incharge" name="hallincharge">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Contact</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Contact" name="contact">
          </div>
        </div>       
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="reset" class="btn btn-sm btn-default" id="donotaddhall"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Hall</button>
            </div>
        </div>
      </form>
    </div>
  </section>
</div>
@stop