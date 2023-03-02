@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/publications/managepublications')}}"><i class="fa fa-bars"></i> Publications</a></li>
    <li class="active"> Add Publications</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Publications : Add Publications
    </header>
    
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="post" action="{{url('admin/publications/addpublications/0')}}" id="addpublicationsform">        
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication Title" name="title" required />
          </div>
        </div>
              
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Authors</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Publication Authors" name="author" required /> 
          </div>      
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Year</label>
          <div class="col-sm-10">
            <input type="number" min="1900" max="3000" pattern=".{4,4}" class="form-control" placeholder="Publication Year" name="year" required /></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Journal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication Journal" name="journal">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication ISSN</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Publication ISSN" name="issn"/>          
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Publication Abstract</label>
          <div class="col-sm-10">
            <textarea class="form-control" placeholder="Publication Abstract" name="abstract"></textarea>          
          </div>
        </div>                
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="reset" class="btn btn-sm btn-default" id="donotaddpublication"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Publication</button>
            </div>
        </div>
      </form>
    </div>
  </section>
</div>
@stop