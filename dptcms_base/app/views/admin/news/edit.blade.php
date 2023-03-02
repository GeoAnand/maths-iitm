@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Edit News | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/news/shownews')}}"><i class="fa fa-bullhorn fa-flip-horizontal"></i> News/Announcements</a></li>
    <li class="active"> Edit News Item/Announcements</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Edit News Item/Announcements
    </header>
    
    <div class="panel-body">
      <div class="col-sm-12">
        <form role="form" class="form-horizontal" method="post" action="{{url('admin/news/editnews/'.$getnews[0]->id)}}" id="editnews">

          	<div class="form-group">
	          <label class="col-sm-2 control-label">Select Type</label>
	          <div class="col-sm-10">
	            <label class="radio-inline">
	              <input type="radio" id="news" value="1" name="type"> News
	            </label>
	            <label class="radio-inline">
	              <input type="radio" id="announcements" value="2" name="type"> Announcements
	            </label>	            
	          </div>
	        </div>       

          <div class="form-group">
            <label class="col-lg-2 control-label">Title</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="title" required value="{{$getnews[0]->news_title}}">
              <span class="suggestion hidden text-muted text-warning"> Announcement Title must not be more then 40 characters long</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="description" required value="{{$getnews[0]->news_description}}">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-2 control-label">Link (if any)</label>
            <div class="col-lg-10">
              <input type="url" class="form-control" name="link" value="{{$getnews[0]->news_link}}">
            </div>
          </div>  

          <div class="form-group">
	          <label class="col-sm-2 control-label">Publish</label>
	          <div class="col-sm-10">
              <label class="radio-inline">
                <input type="radio" value="1" name="publish"> Yes
              </label>
              <label class="radio-inline">
                <input type="radio" value="0" name="publish"> No
              </label>              
	          </div>
	        </div>                 

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="reset" class="btn btn-sm btn-default" id="donotaddnews"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add News</button>
              </div>
          </div>
          
        </form>
      </div>
    </div>
  </section>
</div>
@stop
