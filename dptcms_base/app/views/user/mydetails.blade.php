@extends('layout.main')

	@section('header-title')
	    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
	@stop

@section('header-styles')
@parent
<style type="text/css">
	.profilesetting{
		margin-right: -11px;
		padding: 3px;
	}
	#editdetails{
		cursor:pointer;
	}
	.addmore{
		margin-left: 30px;
		color: #428bca;
		/*text-decoration: underline;*/
	}
</style>
@stop

@section('content')
<div id="inprofilemessage">
	
</div>
<div class="container mycontainer">
	<div class="col-md-4 cols"> 
	  	<div class="wrapper" style="padding-left: 0px;padding-right: 0px;">
	  		<!-- <i class="fa fa-pencil fa-1x pull-right" style="padding: 10px;" id="editdetails" title="Edit Details" data-id="{{Auth::user()->id}}"></i> -->
            <div class="clearfix m-b">
                <a href="#" class="pull-left thumb m-r">
                	@if($details[0]['username']!='')
	                    <?php
	                    $profilepicJpg = 'images/profilepic/'.$details[0]['username'].'.jpg';
	                    $profilepicJpeg = 'images/profilepic/'.$details[0]['username'].'.jpeg';
	                    $profilepicPng = 'images/profilepic/'.$details[0]['username'].'.png';
	                    $profilepicGif = 'images/profilepic/'.$details[0]['username'].'.gif';

	                    $profilepicJPG = 'images/profilepic/'.$details[0]['username'].'.JPG';
	                    $profilepicJPEG = 'images/profilepic/'.$details[0]['username'].'.JPEG';
	                    $profilepicPNG = 'images/profilepic/'.$details[0]['username'].'.PNG';
	                    $profilepicGIF = 'images/profilepic/'.$details[0]['username'].'.GIF';
	                    ?>
	                    @if(File::exists($profilepicJpg))
	                        <img src="{{URL::asset($profilepicJpg)}}" class="img-circle">
	                    @elseif(File::exists($profilepicJpeg))
	                        <img src="{{URL::asset($profilepicJpeg)}}" class="img-circle">
	                    @elseif(File::exists($profilepicPng))
	                        <img src="{{URL::asset($profilepicPng)}}" class="img-circle">
	                    @elseif(File::exists($profilepicGif))
	                        <img src="{{URL::asset($profilepicGif)}}" class="img-circle">
	                    @elseif(File::exists($profilepicJPG))
	                        <img src="{{URL::asset($profilepicJPG)}}" class="img-circle">
	                    @elseif(File::exists($profilepicJPEG))
	                        <img src="{{URL::asset($profilepicJPEG)}}" class="img-circle">
	                    @elseif(File::exists($profilepicPNG))
	                        <img src="{{URL::asset($profilepicPNG)}}" class="img-circle">
	                    @elseif(File::exists($profilepicGIF))
	                        <img src="{{URL::asset($profilepicGIF)}}" class="img-circle">
	                    @else
	                        <img src="{{URL::asset('images/avatar_default.jpg')}}" class="img-circle">
	                    @endif
	                @else
	                	<img src="{{URL::asset('images/avatar_default.jpg')}}" class="img-circle">
	                @endif
                </a>
                <div class="clear">
	                <div class="h3 m-t-xs m-b-xs dpt-text-dark">{{$details[0]['user_title'].' '.$details[0]['user_fname'].' '.$details[0]['user_lname']}}</div>
	                	<small class="text-muted"><i class="fa fa-map-marker"></i>&nbsp;{{$details[0]['user_office']}}</small>
	            </div>                
            </div>  
            <div>
                <small class="text-uc text-xs text-muted dpt-text-dark">DESIGNATION</small>
                <p>{{$details[0]['user_designation']}}</p>
                <small class="text-uc text-xs text-muted dpt-text-dark">CURRENT RESEARCH INTEREST </small>
                <p>
                	@if($details[0]['user_researchfield'])
                		{{$details[0]['user_researchfield']}}
                	@else
                		Not specified
                	@endif
                </p>
                <div class="line"></div>
                <small class="text-uc text-xs text-muted dpt-text-dark">CONTACT</small>
                <p class="m-t-sm">
                	<span class="badge dpt-bg-light">
               			<i class="fa fa-phone"></i>
               		</span>
                    <span class="">044 - 2257&nbsp;{{$details[0]['user_phone']}}</span>
                </p>

				<p class="m-t-sm">
					<span class="badge dpt-bg-light">
           				<i class="fa fa-envelope"></i>
           			</span>
           			<span>
           				<span style="color:#000">{{$details[0]['user_email']}}</span>
           			</span>
           		</p>

				<div class="line"></div>
				<small class="text-uc text-xs text-muted dpt-text-dark">RESEARCH GROUPS</small>
				<?php 
					$getgruop=array_values(array_filter(explode(',',Auth::user()->ingroup)));
				?>
				@if(count($getgruop))
					@for($i=0;$i < count($getgruop);$i++)
						<?php 
							$getbroupname=Researchgroup::find($getgruop[$i]);
							//var_dump($getbroupname);
						?>
						<a href="{{url('researchgrouppage/'.$getbroupname->id)}}" target="_blank" class="list-group-item inpplpage m-t text-primary"> <span class="fa fa-group m-r"></span> {{$getbroupname->researchgroup_name}}</a>
					@endfor
				@else
				<div class="m-t-sm">No Group Specified</div>
				@endif

				<div class="line"></div>
				<small class="text-uc text-xs text-muted dpt-text-dark">PERSONAL HOME PAGE</small>
				@if((Auth::user()->user_personal_homepage!="http://")&&(Auth::user()->user_personal_homepage!="https://")&&(Auth::user()->user_personal_homepage!=""))
		            <a href="{{url(Auth::user()->user_personal_homepage)}}" target="_blank" class="list-group-item inpplpage text-primary m-t">
		            	<i class="fa fa-fw fa-globe"></i>&nbsp;&nbsp;{{url($details[0]['user_personal_homepage'])}}
		            </a>
		        @else
		        <div class="m-t-sm">No Link Specified</div>
		        @endif
		        <div class="line"></div>
		        <small class="text-uc text-xs text-muted dpt-text-dark">CV</small>
				@if(Auth::user()->user_cv!="")
		            <a href="{{url('cv/'.Auth::user()->user_cv)}}" target="_blank" class="list-group-item inpplpage text-primary m-t">
		            	<i class="fa fa-fw fa-globe"></i>&nbsp;&nbsp;{{url($details[0]['user_cv'])}}
		            </a>
		        @else
		        <div class="m-t-sm">No CV Updated</div>
		        @endif
			</div>
			<div class="m-t-lg btn btn-block btn-danger btn-lg" id="editdetails" title="Edit Details" data-id="{{Auth::user()->id}}">
				<i class="fa fa-pencil"></i> Edit Profile
			</div>
       	</div>
	</div>
	<div class="col-md-8 cols">
		@if((Auth::user()->username == 'superadmin')||(Auth::user()->username == 'superfaculty')||(Auth::user()->user_type == 'Post Doctoral Fellows')||(Auth::user()->user_type == 'PhD'))
		<div class="btn-group pull-right dpt-text-dark" style="cursor: pointer;margin-top: 10px;">
	      	<i class="fa fa-cog fa-2x dropdown-toggle" data-toggle="dropdown"></i>
	      	<ul class="dropdown-menu">
	        	<li><a href="#" id="changepass">Change Password</a></li>
	        	<!-- <li><a href="#" id="bookingrequest">Book a Conference room</a></li> -->
	        	<!-- <li><a href="#" id="mesgtoadmin">Send a Message to Admin</a></li> -->
	      	</ul>
	    </div>
	    @endif
	    <div class="row">
	    	<div class="col-sm-12">
			    <h3 class="dpt-text-dark pull-left">
					<i class="fa fa-book"></i> Activities :
				</h3>

				<h3 class="pull-right">
					<a href="#" class="addmore btn btn-primary btn-sm" id="addmoreactivities"> + Add Activity</a>
				</h3>
			</div>
		</div>
		<section id="activitylist" class="panel-body scrollable" style="max-height: 250px; overflow-y: overlay;">
			@foreach($allactivities as $value)
				<article class="media clear each-activity" style="border: 0px;">
					<a href="#" class="pull-right deleteactivity btn btn-xs btn-danger" data-id="{{$value->id}}"><span><i class="fa fa-times"></i> Delete</span></a>
					<a href="#" class="pull-right editactivity m-l btn btn-xs btn-info" data-id="{{$value->id}}" data-publish="{{$value->publish}}"><i class="fa fa-edit"></i> Edit</a>
					@if($value->link!='')
				    <a href="{{$value->link}}" class="activity-link" target="_blank"><p class="block activity-desc">{{$value->activity}}</p></a>
				    @else
				    <p class="block activity-desc">{{$value->activity}}</p>
				    @endif
				</article>
				<div class="line line-dashed"></div>
			@endforeach
		</section>
		<div class="row m-t">
	    	<div class="col-sm-12">
			    <h3 class="dpt-text-dark pull-left">
					<i class="fa fa-book"></i> Courses :
				</h3>

				<h3 class="pull-right">
					<a href="#" class="addmore btn btn-primary btn-sm" id="addmorecourses"> + Add Courses</a>
				</h3>
			</div>
		</div>
		<section id="courselist" class="panel-body scrollable" style="max-height: 400px; overflow-y: overlay;">
			@foreach($allcourse as $value)
				<article class="media clear each-course" style="border: 0px;">
					<a href="#" class="pull-right deletecourse btn btn-xs btn-danger" data-id="{{$value->id}}"><span><i class="fa fa-times"></i> Delete</span></a>
					<a href="#" class="pull-right editcourse m-l btn btn-xs btn-info" data-id="{{$value->id}}"><i class="fa fa-edit"></i> Edit</a>

				    <a href="{{$value->course_link}}" class="course-link" target="_blank"><h4 class="block course-name dpt-text-dark">{{$value->course_name}} <span class="bt btn-xs btn-info">View</span></h4></a>
					<p class="course-desc">{{$value->course_desc}}</p>			
				</article>
				<div class="line line-dashed"></div>
			@endforeach
		</section>
		<div class="row m-t">
	    	<div class="col-sm-12">
			    <h3 class="dpt-text-dark pull-left">
					<i class="fa fa-book"></i> Recent Books :
				</h3>

				<h3 class="pull-right">
					<a href="#" class="addmore btn btn-primary btn-sm" id="addmorebook"> + Add Books</a>
				</h3>
			</div>
		</div>
		<section id="booklist" class="panel-body scrollable" style="max-height: 400px; overflow-y: overlay;">
			@foreach($allbook as $value)
				<article class="media clear each-book" style="border: 0px;">
					<a href="#" class="pull-right deletebook btn btn-xs btn-danger" data-id="{{$value->id}}"><span><i class="fa fa-times"></i> Delete</span></a>
					<a href="#" class="pull-right editbook m-l btn btn-xs btn-info" data-id="{{$value->id}}"><i class="fa fa-edit"></i> Edit</a>

				    <h4 class="block book-name">{{$value->book_name}}</h4>
					<p><span class="dpt-text-dark">Authors : </span> <span class="book-authors">{{$value->book_authors}}</span></p>
					<p><span class="dpt-text-dark">Publisher : </span> <span class="book-publisher m-r">{{$value->book_publisher}}</span> <span class="dpt-text-dark">Edition : </span><span class="book-edition">{{$value->book_edition}}</span></p>
					<p><span class="dpt-text-dark">Year : </span><span class="book-year m-r">{{$value->book_year}}</span> <span class="dpt-text-dark">ISBN : </span><span class="book-isbn">{{$value->book_isbn}}</span></p>
					<p><span class="dpt-text-dark">Details : </span> <span class="book-details">{{$value->book_other_details}}</span></p>		
				</article>
				<div class="line line-dashed"></div>
			@endforeach
		</section>
		
		<div class="row m-t">
	    	<div class="col-sm-12">
			    <h3 class="dpt-text-dark pull-left">
					<i class="fa fa-book"></i> Recent Publications :
				</h3>

				<h3 class="pull-right">
					<a href="#" class="addmore btn btn-primary btn-sm" id="addpublication"> + Add Publication</a>
					<a href="#" class="pull-right btn btn-danger btn-sm m-l m-r" style="margin-right: 10px;" id="importpublication" data-id="{{Auth::user()->id}}"><i class="fa fa-upload"></i> Import from BIBTex file</a>
				</h3>
			</div>
		</div>
		<section id="publicationlist" class="panel-body scrollable" style="max-height: 400px; overflow-y: overlay;">
			@foreach($allpublish as $value)	
			<article class="media clear each-publication" style="border: 0px;">
				<a href="#" class="pull-right deletepublication btn btn-xs btn-danger" data-id="{{$value->id}}"><span><i class="fa fa-times"></i> Delete</span></a>
			    <a href="#" class="pull-right editpublication m-l btn btn-xs btn-info" data-id="{{$value->id}}"><i class="fa fa-edit"></i> Edit</a>
			    <h4 class="block pub-title">{{$value->title}}</h4>
				<p><span class="dpt-text-dark">Authors : </span><span class="pub-authors">{{$value->author}}</span></p>
				<p><span class="dpt-text-dark">Journal :</span> <span class="pub-journal">{{$value->journal}}</span></p>
				<p>@if($value->volume) <span class="dpt-text-dark">Volume :</span> <span class="pub-volume">{{$value->volume}} @endif @if($value->pages)</span> <span class="dpt-text-dark">Page :</span> <span class="pub-page">{{$value->pages}}</span>@endif @if($value->doi) <span class="dpt-text-dark"> DOI :</span> <span class="pub-doi"><a href=http://dx.doi.org/{{$value->doi}}>{{$value->doi}}</a></span>@endif
				<p>@if($value->year) <span class="dpt-text-dark">Year : </span><span class="pub-year">{{$value->year}}</span> @endif</p>
				<p class="hide">@if($value->research_group) <span class="dpt-text-dark">Research Group: </span><span class="pub-researchgroup">{{$value->research_group}}</span> @endif</p>
				<p>@if($value->attachment!=NULL) <span class="dpt-text-dark">Attachment : </span><a href="{{url('/uploads/publication/'.$value->attachment)}}" target="_blank"	class="btn btn-sm btn-info pub-file"><i class="fa fa-external-link"></i> View </a>@endif </p>		
			</article>
			<div class="line line-dashed"></div>
			@endforeach
		</section>	
		
	</div>
</div>
@stop

@section('modals')
@parent
<!-- Chanege Password Modal-->
<div class="modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="changepasswordModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="javascript:void(0)" id="changepassword">
		  <div class="form-group">
		    <label for="">Old Password</label>
		    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter old password" required>
		  </div>
		  <div class="form-group">
		    <label for="">New Password</label>
		    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter new password" required>
		  </div>
		  <div class="form-group">
		    <label for="">Re-Password</label>
		    <input type="password" class="form-control" name="renewpassword" id="renewpassword" placeholder="Re type new password" required>
		  </div>
		  <button type="submit" class="btn btn-success">Update Password</button>

		  <p class="text-muted text-center error" style="display: block;" style="display: block;padding-top: 25px;"><small id="errorchangepass"></small></p>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Details Modal -->
<div class="modal fade" id="editDetailsModal" tabindex="-1" role="dialog" aria-labelledby="editDetailsModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Update Profile</h4>
      </div>
      <div class="modal-body" id="userdetails">

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<!-- Add Publication Modal -->
<div class="modal fade" id="addPublicationModal" tabindex="-1" role="dialog" aria-labelledby="addPublicationModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Publication</h4>
      </div>
      <div class="modal-body">
  		<form role="form" action="{{url('publication/publicationadd')}}" class="form-horizontal" id="publicationforms" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Title<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control publication" name="pubtitle" id="" placeholder="Publication Title" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Authors<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control publication" id="" name="authors" placeholder="Author(s)" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Year<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="number" min="1900" max="3000" pattern=".{4,4}" class="form-control publication" id="" name="year" placeholder="Year  of publication" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Journal<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<textarea class="form-control publication" id="" name="journal" placeholder="Journal" required></textarea>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Volume</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control publication" id="" name="volume" placeholder="Volume"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Page</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control publication" id="" name="page" placeholder="Page"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">DOI</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control publication" id="" name="doi" placeholder="DOI"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Research Group</label>
		    <div class="col-sm-10">
                @for($i=0;$i < count($getgruop);$i++)
				<?php 
					$getbroupname=Researchgroup::find($getgruop[$i]);
				?>
                <label class="checkbox-inline">
                  <input type="checkbox" name="researchgroup[]" value="{{$getbroupname->id}}"> {{$getbroupname->researchgroup_name}}
                </label>
                @endfor
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputPassword1">Attach File</label>
		    <div class="col-sm-10">
		    	<input type="file" class="form-control publication" name="pubfile" />
		    </div>
		  </div>

		  <!--<div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Journal Article Link</label>
		    <div class="col-sm-10">
		    	<input type="url" class="form-control publication" id="" name="link" placeholder="link to the journal article">
		    </div>
		  </div>-->

		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Add Publication</button>
			</div>
		  </div>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Add Publication Modal -->
<div class="modal fade" id="editPublicationModal" tabindex="-1" role="dialog" aria-labelledby="editPublicationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="editPublicationModalLabel">Edit Publication</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="editpublicationform"
  		action="{{url('publication/publicationadd')}}" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Title<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" name="editpubtitle" id="" placeholder="Publication Title" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Authors<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" id="" name="editauthors" placeholder="Author(s)" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Year<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" id="" name="edityear" placeholder="Year  of publication" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Journal<span class="text-danger fa-2x">*</span></label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" id="" name="editjournal" placeholder="Journal" required>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Volume</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" id="" name="editvolume" placeholder="Volume"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Page</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" id="" name="editpage" placeholder="Page"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">DOI</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedpublication" id="" name="editdoi" placeholder="DOI"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Research Group</label>
		    <div class="col-sm-10">
		    	<select name="editresearchgroup" class="form-control updatedpublication" id=""> 
                  <option value="0">--Select Research Group--</option>
                  @for($i=0;$i < count($getgruop);$i++)
					<?php 
						$getbroupname=Researchgroup::find($getgruop[$i]);
					?>
					<option value="{{$getbroupname->id}}">{{$getbroupname->researchgroup_name}}</option>
				  @endfor
                </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputPassword1">Attach File</label>
		    <div class="col-sm-10">
		    	<span class="pubfilespan"></span><br>
		    	<input type="file" class="form-control" name="editpubfile"/>
		    </div>
		  </div>

		  <!--<div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Journal Article Link</label>
		    <div class="col-sm-10">
		    	<input type="url" class="form-control updatedpublication" id="" name="editlink" placeholder="link to the journal article">
		    </div>
		  </div>-->
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Update Publication</button>
			</div>
		  </div>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Add Activity Modal -->
<div class="modal fade" id="addActivitiyModal" tabindex="-1" role="dialog" aria-labelledby="addActivitiyModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add an Activity</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="activityaddform">
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Activity</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control activity" id="" name="activity" placeholder="Description" required></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Activity Link</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control activity" name="activitylink" id="" placeholder="Activity Link">
		    </div>
		  </div>
		  <div class="form-group">
	          <label class="col-sm-2 control-label">Publish activity</label>
	          <div class="col-sm-10">
	              <label class="radio-inline">
	                <input type="radio" value="1" class="activity" name="publishactivity" checked> Yes
	              </label>
	              <label class="radio-inline">
	                <input type="radio" value="0" class="activity" name="publishactivity"> No
	              </label>              
	          </div>
	       </div>
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Add Activity</button>
			</div>
		  </div>		   
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Course</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="courseaddform">
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Course Name</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control course" name="coursename" id="" placeholder="Course Name" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Course Description</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control course" id="" name="coursedesc" placeholder="Description"></textarea>
		    </div>
		  </div>
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Course Link</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control course" name="courselink" id="" placeholder="Course Link" required>
		    </div>
		  </div>
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Add Course</button>
			</div>
		  </div>		   
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Add Books Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Book</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="bookaddform">
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Book Title</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control book" name="bookname" id="" placeholder="Book Title" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Authors</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control book" id="" name="authors" placeholder="Author(s)" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Publisher</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control book" id="" name="publisher" placeholder="Publisher" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">ISBN no</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control book" id="" name="isbn" placeholder="ISBN no." required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Publication Year</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control book" id="" name="year" placeholder="Publication year" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Edition ?</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control book" id="" name="edition" placeholder="Edition">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Other Details</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control book" id="" name="otherdetails" placeholder="Other Details"></textarea>
		    </div>
		  </div>
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Add Book</button>
			</div>
		  </div>		   
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Activity Modal -->
<div class="modal fade" id="editActivityModal" tabindex="-1" role="dialog" aria-labelledby="editActivityModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="editActivityModalLabel">Edit Activity</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="editactivityform">
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Activity</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control updatedactivity" name="editactivitydesc" id="" placeholder="Activity" required></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Activity Link</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedactivity" id="" name="editactivitylink" placeholder="Activity Link">
		    </div>
		  </div>
		  <div class="form-group">
	          <label class="col-sm-2 control-label">Publish activity</label>
	          <div class="col-sm-10">
	              <label class="radio-inline">
	                <input type="radio" value="1" class="updatedactivity" name="editpublishactivity" checked> Yes
	              </label>
	              <label class="radio-inline">
	                <input type="radio" value="0" class="updatedactivity" name="editpublishactivity"> No
	              </label>              
	          </div>
	       </div>
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Update Activity</button>
			</div>
		  </div>		   
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="editCourseModalLabel">Edit Course</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="editcourseform">
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Course Name</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedcourse" name="editcoursename" id="" placeholder="Course Name" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Course Description</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control updatedcourse" id="" name="editcoursedesc" placeholder="Other DetailsCourse Description"></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Course Link</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedcourse" id="" name="editcourselink" placeholder="Course Link" required>
		    </div>
		  </div>
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Update Course</button>
			</div>
		  </div>		   
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Books Modal -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="editBookModalLabel">Edit Book</h4>
      </div>
      <div class="modal-body">
  		<form role="form" class="form-horizontal" id="editbookform">
		  <div class="form-group">			  
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Book Title</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedbook" name="editbookname" id="" placeholder="Book Title" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Authors</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedbook" id="" name="editbookauthors" placeholder="Author(s)" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Publisher</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedbook" id="" name="editbookpublisher" placeholder="Publisher" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">ISBN no</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedbook" id="" name="editbookisbn" placeholder="ISBN no." required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Publication Year</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedbook" id="" name="editbookyear" placeholder="Publication year" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Edition</label>
		    <div class="col-sm-10">
		    	<input type="text" class="form-control updatedbook" id="" name="editbookedition" placeholder="Edition">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label" for="exampleInputEmail1">Other Details</label>
		    <div class="col-sm-10">
		    	<textarea class="form-control book updatedbook" id="" name="editbookdetails" placeholder="Other Details"></textarea>
		    </div>
		  </div>
		  <div class="row">
		  	<div class="col-sm-12">
			  <button type="reset" class="pull-left btn btn-danger" class="close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
			  <button type="submit" class="pull-right btn btn-success"><i class="fa fa-check"></i> Update Book</button>
			</div>
		  </div>		   
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Book Hall modal -->
<div class="modal fade" id="bookHall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="hallbookbody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="ImportDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Import publications from .bib file</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" id="uploadBIBform">
        	<div class="form-group">
			    <label for="exampleInputFile"><b>Select a file</b></label>
			    <input type="file" id="importPublicationfile" name="importPublicationfile">
			    <p class="help-block">(File type must be in .bib format)</p>
			</div>
			<input type="reset" class="hide">
			<div>
				<button class="btn btn-success" id="importPublicationBtn" data-id="{{Auth::user()->id}}" type="submit">Upload</button>
			</div>
        </form>
        <div id="displayResponse">
        	
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Import Modal -->
@stop

@section('footer-scripts')
@parent
<script type="text/javascript">
	$(document).ready(function(){
		$('.error').css("display","none");
		$('.modal').on('hidden.bs.modal', function (e) {
		  $(this).find("form").trigger('reset');
		});
	});
</script>
@stop
