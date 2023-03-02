@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
   <div class="col-sm-12">
     <!-- .breadcrumb -->
      <ul class="breadcrumb">
        <li><a href="{{url('admin/home')}}" class="link"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> Resources</li>
      </ul>
     <!-- / .breadcrumb -->
    <section class="panel">    
    <header class="panel-heading font-bold">
        Resources
    </header>
    
    <div class="panel-body">
      <div class="col-sm-12">
		    <div class="col-sm-4 linked-card" data-href="{{url('admin/resources/links')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">	                          	
                	  <a href="{{url('admin/resources/links')}}">	                        
                        <span class="h4 block">
                       		<i class="fa fa-link"></i> Links
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
        <div class="col-sm-4 linked-card" data-href="{{url('admin/resources/docs')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">                              
                    <a href="{{url('admin/resources/docs')}}">                         
                        <span class="h4 block">
                          <i class="fa fa-file"></i> Documents
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
        <div class="col-sm-4 linked-card" data-href="{{url('admin/resources/managegallery')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">                              
                    <a href="{{url('admin/resources/managegallery')}}">                         
                        <span class="h4 block">
                          <i class="fa fa-picture-o"></i> Gallery
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
        <div class="col-sm-4 linked-card" data-href="{{url('admin/resources/videos')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">                              
                    <a href="{{url('admin/resources/videos')}}">                         
                        <span class="h4 block">
                          <i class="fa fa-youtube-play"></i> Videos
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
        <div class="col-sm-4 linked-card" data-href="{{url('admin/resources/conferencehalls')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">                              
                    <a href="{{url('admin/resources/conferencehalls')}}">                         
                        <span class="h4 block">
                          <i class="fa fa-building-o"></i> Conference Halls
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">

  </script>
@stop