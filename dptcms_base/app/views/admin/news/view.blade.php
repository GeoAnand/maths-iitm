@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - News | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><i class="fa fa-bullhorn"></i> News / Announcements</li>
  </ul>
  <!-- / .breadcrumb -->

  	<section class="panel">    
	    <!-- <header class="panel-heading font-bold">
	        News and Announcements
	    </header> -->
	    <header class="panel-heading text-right bg-light">
         <ul class="nav nav-tabs pull-left">
           <li class="active"><a href="#news" data-toggle="tab"><i class="fa fa-list text-default"></i> News</a></li>
           <li class="">
             <a href="#announcements" data-toggle="tab"><i class="fa fa-bullhorn text-default"></i> Announcements</a>
           </li>
         </ul>
         <span class="v-spacer-16"></span>
       </header>
	    
	    <div class="panel-body">
	    	<div class="tab-content">              
           		<div class="tab-pane fade active in" id="news">
           			<section class="panel">
				        <header class="panel-heading">
				          <span class="panel-heading-text"> News </span>
				          <a href="{{url('admin/news/addnews')}}" class="pull-right btn btn-info btn-xs add-news-btn" data-type="1"><i class="fa fa-plus"></i> Add a News</a>
				        </header>	
				        <div class="row">
				        	<div class="col-sm-6 m-t m-b">
								<!-- <div class="btn-group m-l" data-toggle="buttons">
				                  <label class="btn btn-sm btn-default active">
				                    <input type="radio" name="options" id="option1"> <i class="fa fa-check text-active"></i>Active
				                  </label>
				                  <label class="btn btn-sm btn-default">
				                    <input type="radio" name="options" id="option2"> <i class="fa fa-check text-active"></i>Archived
				                  </label>				                  
				                </div> -->
				                <a href="#" class="btn btn-sm btn-default viewarchivednews m-l"> See Archived News</a>
							</div>
				        	<div class="col-sm-6 m-t m-b">
								<form class="form-inline" role="form" action="javascript:void(0)">
									<div class="form-group has-feedback pull-right m-r">
										<input type="text" class="form-control" id="newssearch" placeholder="Search News">
										<span class="fa fa-search form-control-feedback"></span>
									</div>
								</form>
							</div>				        	
				        </div>
						
				        <div class="table-responsive">
				          <table class="table table-striped b-t text-sm">
				            <thead id="newsthead">
				              <!-- <tr> -->
				                <th width="62">S. No.</th>
				                <th class="th-sortable" data-toggle="class">News Title
				                  <span class="th-sort">
				                    <i class="fa fa-sort-down text"></i>
				                    <i class="fa fa-sort-up text-active"></i>
				                    <i class="fa fa-sort"></i>
				                  </span>
				                </th>
				                <th>Description</th>
				                <th>Link</th>
				                <th>Published</th>
				                <th>Archive</th>
				                <th>Edit</th>
				                <th width="">Delete</th>
				              <!-- </tr> -->
				            </thead>
				            <tbody id="activenewslist" class="newslist">
				              	@if(count($getallactivenews))
				                  	<?php
				                  		 $i=1;
				                  	?>
			                  		@foreach($getallactivenews as $val)
					                  	<tr>                    
					                      	<td>
					                     		{{$i}} 
					                      	</td>
					                      	<td>
					                      		{{$val->news_title}}
					                      	</td>
					                      	<td>
					                       		{{$val->news_description}}
					                      	</td>
					                      	<td>
					                      		{{$val->news_link}}
					                      	</td>
					                      	<td>
					                      		@if($val->news_publish==1)
					                      			<a href="#" class="text-muted" data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-check text-success"></i> Published</a>
					                      		@else
					                      			<a href="#" class="btn btn-xs btn-success publishnews" data-toggle="class" data-id="{{$val['id']}}"> Publish Now</a>
					                      		@endif
					                      	</td>
					                      	<td>
					                      		<a href="#" class="btn btn-xs btn-primary archivenews" data-type="activenews" data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-save"></i> Archive It</a>
					                      	</td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-info editnews" data-type="activenews" data-toggle="class" data-id="{{$val['id']}}" data-publish="{{$val['news_publish']}}" data-newstype="{{$val['news_type']}}"><i class="fa fa-pencil"></i> Edit</a>
							                </td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-danger deletenews" data-type="activenews" data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
							                </td>
					                    </tr>
				                    	<?php $i++ ?>
			                    	@endforeach
			                    @else
			                    	<tr>
			                    		<td colspan="7" align="center">Sorry! There are no active news. <a href="{{url('admin/news/addnews')}}" class="btn btn-default btn-xs add-news-btn" data-type="1"><i class="fa fa-plus"></i> Add a News</a></td>
			                    	</tr>
			              		@endif              
				            </tbody>
				            <tbody id="archivednewslist" class="newslist hide">
				            	@if(count($getallarchivednews))
				                  	<?php
				                  		 $i=1;
				                  	?>
			                  		@foreach($getallarchivednews as $val)
					                  	<tr>                    
					                      	<td>
					                     		{{$i}} 
					                      	</td>
					                      	<td>
					                      		{{$val->news_title}}
					                      	</td>
					                      	<td>
					                       		{{$val->news_description}}
					                      	</td>
					                      	<td>
					                      		{{$val->news_link}}
					                      	</td>
					                      	<td>
					                      		<a href="#" class="btn btn-xs btn-success publisharchivednews"  title="Publish Now" data-type="archivednews" data-toggle="class" data-id="{{$val['id']}}"> Publish Now</a>
					                      	</td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-info editnews" data-type="archivednews" data-toggle="class" data-id="{{$val['id']}}" data-publish="{{$val['news_publish']}}" data-newstype="{{$val['news_type']}}"><i class="fa fa-pencil"></i> Edit</a>
							                </td>					                      	
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-danger deletenews" data-type="archivednews" data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
							                </td>
					                    </tr>
				                    	<?php $i++ ?>
			                    	@endforeach
			              		@endif
				            </tbody>
				          </table>
				        </div>	        
				    </section>
           		</div>
           		<div class="tab-pane fade" id="announcements">
           			<section class="panel">
				        <header class="panel-heading">
				          <span class="panel-heading-text"> Announcements</span>
				          <a href="{{url('admin/news/addnews')}}" class="pull-right btn btn-info btn-xs add-news-btn" data-type="2"><i class="fa fa-plus"></i> Add a Announcement</a>
				        </header>	
				       	<div class="row">
				       		<div class="col-sm-6 m-t m-b">								
				                <a href="#" class="btn btn-sm btn-default viewarchivedannouncements m-l"> See Archived Announcements</a>
							</div>
				        	<div class="col-sm-6 m-t m-b">
								<form class="form-inline" role="form" action="javascript:void(0)">
									<div class="form-group has-feedback pull-right m-r">
										<input type="text" class="form-control" id="newssearch" placeholder="Search Announcements">
										<span class="fa fa-search form-control-feedback"></span>
									</div>
								</form>
							</div>				        	
				        </div>
						
				        <div class="table-responsive">
				          <table class="table table-striped b-t text-sm">
				            <thead id="announcementsthead">
				              <!-- <tr> -->
				                <th width="62">S. No.</th>
				                <th class="th-sortable" data-toggle="class">Announcement Title
				                  <span class="th-sort">
				                    <i class="fa fa-sort-down text"></i>
				                    <i class="fa fa-sort-up text-active"></i>
				                    <i class="fa fa-sort"></i>
				                  </span>
				                </th>
				                <th>Description</th>
				                <th>Link</th>
				                <th>Published</th>
				                <th>Archive</th>
				                <th>Edit</th>
				                <th width="">Delete</th>
				              <!-- </tr> -->
				            </thead>
				            <tbody id="activeannouncementslist" class="newslist">
				              	@if(count($getallactiveannouncements))
				                  	<?php 
				                  		// $getstudentbyyear=Student::where('student_program_id','=',$progid)->where('student_year','=',$getallstudent[0]['student_year'])->get();

				                  		 $i=1;
				                  	?>
			                  		@foreach($getallactiveannouncements as $val)
					                  	<tr>                    
					                      	<td>
					                     		{{$i}} 
					                      	</td>
					                      	<td>
					                      		{{$val->news_title}}
					                      	</td>
					                      	<td>
					                       		{{$val->news_description}}
					                      	</td>
					                      	<td>
					                      		{{$val->news_link}}
					                      	</td>
					                      	<td>
					                      		@if($val->news_publish==1)
					                      			<a href="#" class="text-muted" data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-check text-success"></i> Published</a>
					                      		@else
					                      			<a href="#" class="btn btn-xs btn-success publishnews" data-toggle="class" data-id="{{$val['id']}}"> Publish Now</a>
					                      		@endif
					                      	</td>
					                      	<td>
					                      		<a href="#" class="btn btn-xs btn-primary archivenews" data-type="activeannouncements" data-toggle="class" data-id="{{$val['id']}}"> Archive It</a>
					                      	</td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-info editnews" data-type="activeannouncements" data-toggle="class" data-id="{{$val['id']}}" data-publish="{{$val['news_publish']}}" data-newstype="{{$val['news_type']}}"><i class="fa fa-pencil"></i> Edit</a>
							                </td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-danger deletenews" data-type="activeannouncements"  data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
							                </td>
					                    </tr>
				                    	<?php $i++ ?>
			                    	@endforeach
			              		@endif	              
				            </tbody>
				            <tbody id="archivedannouncementslist" class="newslist hide">
				              	@if(count($getallarchivedannouncements))
				                  	<?php 
				                  		// $getstudentbyyear=Student::where('student_program_id','=',$progid)->where('student_year','=',$getallstudent[0]['student_year'])->get();

				                  		 $i=1;
				                  	?>
			                  		@foreach($getallarchivedannouncements as $val)
					                  	<tr>                    
					                      	<td>
					                     		{{$i}} 
					                      	</td>
					                      	<td>
					                      		{{$val->news_title}}
					                      	</td>
					                      	<td>
					                       		{{$val->news_description}}
					                      	</td>
					                      	<td>
					                      		{{$val->news_link}}
					                      	</td>
					                      	<td>
					                      		<a href="#" class="btn btn-xs btn-success publisharchivednews" data-type="archivedannouncements" data-toggle="class" data-id="{{$val['id']}}"> Publish Now</a>
					                      	</td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-info editnews" data-type="archivedannouncements" data-toggle="class" data-id="{{$val['id']}}" data-publish="{{$val['news_publish']}}" data-newstype="{{$val['news_type']}}"><i class="fa fa-pencil"></i> Edit</a>
							                </td>
					                      	<td>
							                	<a href="#" class="btn btn-xs btn-danger deletenews" data-type="archivedannouncements" data-toggle="class" data-id="{{$val['id']}}"><i class="fa fa-trash-o"></i> Delete</a>
							                </td>
					                    </tr>
				                    	<?php $i++ ?>
			                    	@endforeach
			              		@endif	              
				            </tbody>
				          </table>
				        </div>	        
				    </section>
           		</div>
           	</div>			
		</div>
	</section>
</div>
@stop
