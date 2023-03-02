@extends('admin.layouts.main')

@section('header-title')
    <title> Admin Panel - Home | DeptCMS</title>
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
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    </ul>
    <!-- / .breadcrumb -->
      <section class="panel">
        <header class="panel-heading font-bold">Home Page Contents</header>
        <div class="panel-body">
          <form class="bs-example form-horizontal" method="post" action="{{url('admin/homecontent')}}" data-content="{{count($getcontent)}}" data-link="home" id="homecontentform">  
            
            <header>
              <div class="pull-left h3 m-t-sm">
                Welcome Content
              </div>
              <div class="pull-right">
                <a href="#" id="cancelediting" class="btn btn-sm btn-default hide"><i class="fa fa-times fa-1x"></i> Cancel</a>
                <a href="#" id="edithomecontent" class="btn btn-sm btn-info"><i class="fa fa-edit fa-2x"></i> Edit Content</a>
              </div>
            </header>
            <div class="form-group">
              <div class="col-sm-12 m-t-sm">
                <div id="homecontent" class="summernote">
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