@extends('admin.layouts.main')

@section('header-title')
    <title> Admin Panel - Video | DeptCMS</title>
@stop

@section('content') 
  <style type="text/css">
    .note-editor .fa,.note-editor .note-current-fontname
    {
      color: #000;
    }
    .save{
      display: none;
    }
  </style>

    <div class="col-sm-12 m-t">
    <!-- .breadcrumb -->
    <ul class="breadcrumb">
      <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="{{url('admin/resources/dashboard')}}"><i class="fa fa-bars"></i> Resources</a></li>
      <li class="active"> Videos</li>
    </ul>
    <!-- / .breadcrumb -->
      <section class="panel">
        <header class="panel-heading font-bold">Video Page Contents</header>
        <div class="panel-body">
          <form class="bs-example form-horizontal" method="post" action="{{url('admin/resources/videocontent')}}" data-content="{{count($getcontent)}}" data-link="home" id="videocontentform">  
            
            <header>
              <div class="pull-left h3 m-t-sm">
                Videos
              </div>
              <div class="pull-right">
                <a href="#" id="cancelediting" class="btn btn-sm btn-default hide"><i class="fa fa-times fa-1x"></i> Cancel</a>
                <a href="#" id="editvideocontent" class="btn btn-sm btn-info"><i class="fa fa-edit fa-2x"></i> Edit Content</a>
              </div>
            </header>
            <div class="form-group">
              <div class="col-sm-12 m-t-sm">
                <div id="videocontent" class="summernote">
                  @if(count($getcontent))
                    {{$getcontent[0]['content']}}
                  @endif
                </div>
              </div>
            </div>            
          </form>
        </div>
      </section>
    </div>    
@stop