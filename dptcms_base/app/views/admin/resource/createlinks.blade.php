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
    <li class="active"> Add Links</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Add Links
    </header>
    
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="post" action="{{url('admin/resources/addlinks/0')}}" id="addlinksform">        
        <div class="form-group">
          <label class="col-sm-2 control-label">Link Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Link Title" name="linktitle">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Link</label>
          <div class="col-sm-10">
            <input type="url" class="form-control" placeholder="Link" name="link">
            <span class="text-muted text-sm">Please enter full URL. Eg- "http://www.website.com"</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <label>
              <input type="checkbox" value="1" name="needlogin"> Need Login to Access this?
              <input type="hidden" value="0" name="needlogin">
            </label>            
          </div>
        </div>         
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="reset" class="btn btn-sm btn-default" id="donotaddlink"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Link</button>
            </div>
        </div>
      </form>
    </div>
  </section>
</div>
@stop