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
    <li class="active"> Add Documents</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Add Documents
    </header>
    
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="post" action="{{url('admin/resources/adddocs/0')}}" enctype="multipart/form-data" id="adddocsform">
        <div class="form-group">
          <label class="col-sm-2 control-label">Document Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Document Title" name="docstitle" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Document Content</label>
          <div class="col-sm-10">
            <textarea class="form-control" placeholder="Document Contents" name="docsbody" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Docs Ref. link</label>
          <div class="col-sm-10">
            <input type="url" class="form-control" placeholder="Docs Ref. link" name="docslink">
            <span class="text-muted text-sm">Please enter full URL. Eg- "http://www.website.com"</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Upload a Document</label>
          <div class="col-sm-10">
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <span class="btn btn-info btn-file btn-sm"><i class="fa fa-upload"></i> <span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="docsfile"></span>
              <span class="fileinput-filename"></span>
              <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
            </div>
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
              <button type="reset" class="btn btn-sm btn-default" id="donotadddoc"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Save Document</button>
            </div>
        </div>
      </form>
    </div>
  </section>
</div>
@stop