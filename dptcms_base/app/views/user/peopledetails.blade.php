@extends('layout.main')

	@section('header-title')
	    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
	@stop

@section('content')

	<div class="col-md-4 cols"> 
	  	<div class="wrapper">
            <div class="clearfix m-b">

                <div class="pull-left thumb m-r">
                   
			     	@if($details[0]['user_namehandle']!='')
	                    <?php
	                    $profilepicJpg = 'images/profilepic/'.$details[0]['user_namehandle'].'.jpg';
	                    $profilepicJpeg = 'images/profilepic/'.$details[0]['user_namehandle'].'.jpeg';
	                    $profilepicPng = 'images/profilepic/'.$details[0]['user_namehandle'].'.png';
	                    $profilepicGif = 'images/profilepic/'.$details[0]['user_namehandle'].'.gif';

	                    $profilepicJPG = 'images/profilepic/'.$details[0]['user_namehandle'].'.JPG';
	                    $profilepicJPEG = 'images/profilepic/'.$details[0]['user_namehandle'].'.JPEG';
	                    $profilepicPNG = 'images/profilepic/'.$details[0]['user_namehandle'].'.PNG';
	                    $profilepicGIF = 'images/profilepic/'.$details[0]['user_namehandle'].'.GIF';
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
                </div>

                <div class="clear">
	                <div class="h3 m-t-xs m-b-xs">{{$details[0]['user_title'].' '.$details[0]['user_fname'].' '.$details[0]['user_lname']}}</div>
	                	<small class="text-muted"><i class="fa fa-map-marker"></i> {{$details[0]['user_office']}}</small>
	                </div>                
                </div>               
                
                <div>
	                <small class="text-uc text-xs text-muted dpt-text-dark">DESIGNATION</small>
	                <p>{{$details[0]['user_designation']}}</p>
	                @if($details[0]['user_researchfield'])
		                <small class="text-uc text-xs text-muted dpt-text-dark">CURRENT RESEARCH INTEREST </small>
		                <p>
		                	{{$details[0]['user_researchfield']}}
		                </p>
	                @endif
	                
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
			@if($details[0]['user_type']!="PhD") 
               				<span style="color:#000">{{$details[0]['user_namehandle']}}</span>
			@endif
			@if($details[0]['user_type']=="PhD") 
               				<span style="color:#000"><?php echo str_replace("@", " #  # ", $details[0]['user_email'])?></span>
			@endif
               			</span>
               		</p>

				<div class="line"></div>
				<small class="text-uc text-xs text-muted dpt-text-dark">RESEARCH GROUPS</small>
				<?php 
					$getgruop=array_values(array_filter(explode(',',$details[0]['ingroup'])));
				?>
				@for($i=0;$i < count($getgruop);$i++)
					<?php 
						$getbroupname=Researchgroup::find($getgruop[$i]);
					?>
					<a href="{{url('researchgrouppage/'.$getbroupname->id)}}" target="_blank" class="list-group-item inpplpage m-t text-primary"> <span class="fa fa-group m-r"></span> {{$getbroupname->researchgroup_name}}</a>
				@endfor
				<div class="line"></div>	
		        @if(($details[0]['user_personal_homepage']!="http://")&&($details[0]['user_personal_homepage']!="https://")&&($details[0]['user_personal_homepage']!=""))
		        <small class="text-uc text-xs text-muted dpt-text-dark">PERSONAL HOME PAGE</small>
		            <a href="{{url($details[0]['user_personal_homepage'])}}" target="_blank" class="list-group-item inpplpage text-primary m-t">
		            	<i class="fa fa-fw fa-globe"></i>&nbsp;&nbsp;{{url($details[0]['user_personal_homepage'])}}
		            </a>
		        @endif
		        
				@if($details[0]['user_cv']!="")
				<div class="line"></div>
		        <small class="text-uc text-xs text-muted dpt-text-dark">CV</small>
		            <a href="{{url('cv/'.$details[0]['user_cv'])}}" target="_blank" class="list-group-item inpplpage text-primary m-t">
		            	<i class="fa fa-fw fa-globe"></i>&nbsp;&nbsp;{{url($details[0]['user_cv'])}}
		            </a>
		        @endif
			</div>
        </div>
	</div>
	<div class="col-md-8 cols">
		@if($details[0]['aboutme']!="")
			 <div class="row">
                        <div class="col-sm-12">
                                    <h3 class="dpt-text-dark pull-left">
                                       <!--         <i class="fa fa-book"></i> About Me: This section ADDED by NARAYANAN to enable about me-->
                                        </h3>
                                </div>
                        </div>
				<article class="media clear each-course">
				<section>
				   <p class="block activity-desc"> {{$details[0]['aboutme']}}</p>
				</section>
				</article>
		@endif
		@if(count($allactivities))
			<div class="row">
		    	<div class="col-sm-12">
				    <h3 class="dpt-text-dark pull-left">
						<i class="fa fa-book"></i> Activities :
					</h3>
				</div>
			</div>
			<section id="activitylist" class="panel-body scrollable" style="max-height: 250px; overflow-y: overlay;">
			@foreach($allactivities as $value)
				<article class="media clear each-activity">
					@if($value->link!='')
				    <a href="{{$value->link}}" class="activity-link text-primary" target="_blank"><p class="block activity-desc">{{$value->activity}}</p></a>
				    @else
				    <p class="block activity-desc">{{$value->activity}}</p>
				    @endif
				</article>
				<div class="line line-dashed"></div>
			@endforeach	
			</section>
		@endif
		@if(count($allcourse))
			<div class="row m-t">
		    	<div class="col-sm-12">
				    <h3 class="dpt-text-dark pull-left">
						<i class="fa fa-book"></i> Teaching :
					</h3>
				</div>
			</div>
			<section id="activitylist" class="panel-body scrollable" style="max-height: 400px; overflow-y: overlay;">
			@foreach($allcourse as $value)
				<article class="media clear each-course">
					<a href="{{$value->course_link}}" class="course-link dpt-text-dark h4" target="_blank">{{$value->course_name}}<button class="btn btn-xs m-l btn-info">View</button></a>
					<p class="course-desc">{{$value->course_desc}}</p>			
				</article>
				<div class="line line-dashed"></div>
			@endforeach	
			</section>
		@endif

		@if(count($allbook))
			<div class="row">
		    	<div class="col-sm-12">
				    <h3 class="dpt-text-dark pull-left">
						<i class="fa fa-book"></i> Recent Books :
					</h3>
				</div>
			</div>
			<section id="activitylist" class="panel-body scrollable" style="max-height: 400px; overflow-y: overlay;">
			@foreach($allbook as $value)
				<article class="media clear each-book">
				    <h4 class="block">{{$value->book_name}}</h4>
					<p><span class="dpt-text-dark">Authors : </span> {{$value->book_authors}}</p>
					<p><span class="dpt-text-dark">Publisher : </span> {{$value->book_publisher}}<span class="dpt-text-dark"> Edition : </span> {{$value->book_edition}}</p>
					<p><span class="dpt-text-dark">Year : </span> {{$value->book_year}}<span class="dpt-text-dark"> ISBN :</span> {{$value->book_isbn}}</p>
					<p><span class="dpt-text-dark">Details : </span>{{$value->book_other_details}}</p>				
				</article>
				<div class="line line-dashed"></div>
			@endforeach	
			</section>
		@endif

		<div class="row">
	    	<div class="col-sm-12">
			    <h3 class="dpt-text-dark pull-left">
					<i class="fa fa-book"></i> Recent Publications :
				</h3>
			</div>
		</div>
		<section id="activitylist" class="panel-body scrollable" style="max-height: 400px; overflow-y: overlay;">
		@if(count($allpublish))
			<?php $i=0; ?>
			@foreach($allpublish as $value)
				<article class="clear each-publication">
				    <h4 class="block">{{$value->title}}</h4>
					<p><span class="dpt-text-dark">Authors : </span> {{$value->author}}</p> {{--EDITED NARAYANAN--}}
					<p><span class="dpt-text-dark">Journal :</span> {{$value->journal}}</p> {{--EDITED NARAYANAN--}}
					<p>@if($value->volume) <span class="dpt-text-dark">Volume :</span><span class="pub-volume">{{$value->volume}}</span> @endif @if($value->pages)<span class="dpt-text-dark"> Page: </span><span class="pub-page">{{$value->pages}}</span>@endif @if($value->doi) <span class="dpt-text-dark">DOI:</span> <a href="http://dx.doi.org/{{$value->doi}}" target="_blank" class="pub-doi text-primary">{{$value->doi}}</a>@endif
					<p>@if($value->year) <span class="dpt-text-dark">Year: </span><span class="pub-year">{{$value->year}}</span> @endif</p>
					<p>@if($value->attachment!=NULL) Attachment : <a href="{{url('/uploads/publication/'.$value->attachment)}}" target="_blank"	class="btn btn-sm btn-info pub-file"><i class="fa fa-external-link"></i> View </a>@endif </p>
				</article>
				<div class="line line-dashed"></div>
			@endforeach
		@else
			{{'<p>No Publication history recorded</p>'}}
		@endif

		<div class="alert dpt-alert hide" align="center" style="padding: 5px;">
        	<a href="#" style="font-size: 15px;" id="showmore"><i class="fa fa-angle-double-down"></i> Show more</a>
      	</div>
      	</section>
	</div>
	
@stop
