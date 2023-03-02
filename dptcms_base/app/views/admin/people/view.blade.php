@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
   <div class="col-sm-12">
     <!-- .breadcrumb -->
      <ul class="breadcrumb">
        <li><a href="{{url('admin/home')}}" class="link"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> People</li>
      </ul>
     <!-- / .breadcrumb -->
    <section class="panel">    
    <header class="panel-heading font-bold">
        People
    </header>
    
    <div class="panel-body">
      <div class="col-sm-12">
        <?php 
	        $getusertype=Usertype::all();
	    ?>
	    @foreach($getusertype as $val)
		    <div class="col-sm-4 linked-card" data-href="{{url('admin/people/'.$val->link)}}">
            <section class="panel bg-light">
                <div class="panel-body lter">
                  <div class="text-center padder m-t">	                          	
                	<a href="{{url('admin/people/'.$val->link)}}">	                        
                        <span class="h4 block">
                       		<i class="fa fa-user"></i> {{$val->user_type_name}}
                        </span>
                    </a>
                  </div>
                </div>
            </section>
        </div>
	    @endforeach
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">

  </script>
@stop