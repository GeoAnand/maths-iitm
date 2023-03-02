@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
   <div class="col-sm-12">
     <!-- .breadcrumb -->
      <ul class="breadcrumb">
        <li><a href="{{url('admin/home')}}" class="link"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> Research</li>
      </ul>
     <!-- / .breadcrumb -->
    <section class="panel">    
    <header class="panel-heading font-bold">
        Research
    </header>
    
    <div class="panel-body">
      <div class="col-sm-12">
		    <div class="col-sm-4 linked-card" data-href="{{url('admin/research/researcharea/')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">	                          	
                	<a href="{{url('admin/research/researcharea/')}}">	                        
                        <span class="h4 block">
                       		<i class="fa fa-book"></i> Research Area
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
         <div class="col-sm-4 linked-card" data-href="{{url('admin/research/researchgroups/')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">                              
                  <a href="{{url('admin/research/researchgroups/')}}">                          
                        <span class="h4 block">
                          <i class="fa fa-users"></i> Research Group
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
         <div class="col-sm-4 linked-card" data-href="{{url('admin/research/recentpublications/')}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">                              
                  <a href="{{url('admin/research/recentpublications/')}}">                          
                        <span class="h4 block">
                          <i class="fa fa-book"></i> Recent Publications
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