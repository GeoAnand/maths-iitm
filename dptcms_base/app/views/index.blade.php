@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
@parent
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" />
<style type="text/css">
	#contentContainer {
		background:#bddfdf;
		background: transparent;
		min-height: 0px;
		display: none;
	}
	#navbarContainer {
	background:#bddfdf;
}
</style>
<script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.28468.js') }}"></script>
@stop

@section('homeContent')

	<!-- Carousel
    ================================================== -->
    <div class="container" style="padding: 0px;">
    	<div class="col-sm-9" style="margin-bottom: 0px;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">					
					<!-- Indicators -->
					<ol class="carousel-indicators">
			        @for($i=0;$i < count($getallslideimage);$i++)
			          <li data-target="#myCarousel" data-slide-to="{{$i}}" class="slideno"></li>
			        @endfor 
			        </ol>
					<div class="carousel-inner" role="listbox">
						@foreach($getallslideimage as $eachslide)
					        <div class="item">
					            <img src="{{URL::asset('siteimages/slider/'.$eachslide->slider_image_name)}}" class="img-responsive" data-holder-rendered="true">
					            <!-- <div class="container">
					              <div class="carousel-caption">
					                <p>{{$eachslide->slider_text}}</p>
					              </div>
					            </div> -->
					        </div>
					    @endforeach	 						
					</div>
					 <!-- Controls -->
					<!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">‹</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">›</a> -->
					 <!-- Controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right"></span>
					    <span class="sr-only">Next</span>
					  </a>
				</div>
							
		</div>
      	<div class="col-sm-3 hidden-xs" style="padding: 0px;">
	        <div id="upcoming-events">
	          	<section class="panel">
	          		<?php $i=0;?>
		            @foreach($getallevents as $eachevent)
		            	@if(date($eachevent->events_date) >= (date('Y-m-d')))
		            		<?php $i++;?>
		            	@endif
		            @endforeach
		            <header class="panel-heading dpt-text-dark">
		              	<strong>Upcoming Events</strong>
		              	<span class="" id="eventcount">({{$i}})</span>                    
		            </header>
		            <section class="panel-body scrollable" id="upcoming-events-list">
			            @if($i>0)
				            @foreach($getallevents as $eachevent)
				            	@if(date($eachevent->events_date) >= (date('Y-m-d')))			            	
					              	<article class="media" style="border: 0px;">
						              	<li class="list-group-item" style="border: 0px;">                      
					                      <a href="{{url('event/view/'.$eachevent->id)}}" class="clear" target="_blank">
					                        <span class="text-muted text-xs pull-right" style="padding: 1px;"> <?php echo date("d-m-Y", strtotime($eachevent->events_date))?> at {{$eachevent->events_starttime}} </span>
					                        <strong class="block">{{$eachevent->events_name}}</strong>
					                        <strong>Speaker - <em>{{$eachevent->mainspeaker}}</em></strong><br/>
					                        <small>{{substr($eachevent->events_desc,0,100)}}</small>
					                      </a>
					                      <label class="label eventtype m-l-xs pull-right">{{$eachevent->eventcategory->events_type_name}}</label>
					                    </li>
					              	</article>
					              	<div class="line line-dashed"></div>
					            @endif
				            @endforeach
			            @else
			            	<article class="media" style="border: 0px;">
				              	<li class="list-group-item" style="border: 0px;">   
			                        <strong class="block">There are no upcoming events.</strong>
			                    </li>
			              	</article>
			            	
			            @endif
		            </section>
	          </section>
	      	</div>
      	</div>
    </div>
    <!-- /.carousel -->

    <div class="container" style="padding: 0px;">
      <div class="" style="padding-bottom: 20px;">
        <div class="col-md-9 m-t welcomedivs">
            <h3 class="dpt-text-dark hidden-xs">Welcome</h3>
            <h3 class="dpt-text-dark wrapper visible-xs">Welcome</h3>
            <div class="line line-solid"></div>
            <div class="post-sum">
              	<p style="font-size:14px" id="homecontent">
              		@if(count($getwelcome))
		            	{{$getwelcome[0]['content']}}
		            @else
		            	<span class="text-muted wrapper text-center center-block">
		            		<i class="fa fa-warning fa-4x"></i> <br/>Sorry! No content Found. Please report to Administrator of this Website.	
		            	</span>	            	
		            @endif
	           	</p>
            </div>
        </div>
        <div class="col-sm-3 visible-xs">
	        <div id="upcoming-events">
	          	<section class="panel">
	          		<?php $i=0;?>
		            @foreach($getallevents as $eachevent)
		            	@if(strtotime($eachevent->events_date) >= strtotime(date('d-m-Y')))
		            		<?php $i++;?>
		            	@endif
		            @endforeach
		            <header class="panel-heading dpt-text-dark">
		              	<strong>Upcoming Events</strong>
		              	<span class="" id="eventcount">({{$i}})</span>                    
		            </header>
		            <section class="panel-body scrollable" id="upcoming-events-list">
			            @if($i>0)
				            @foreach($getallevents as $eachevent)
				            	@if(strtotime($eachevent->events_date) >= strtotime(date('d-m-Y')))			            	
					              	<article class="media" style="border: 0px;">
						              	<li class="list-group-item" style="border: 0px;">                      
					                      <a href="{{url('event/view/'.$eachevent->id)}}" class="clear" target="_blank">
					                        <span class="text-muted text-xs pull-right" style="padding: 1px;"><?php echo date("d-m-Y", strtotime($eachevent->events_date))?> </span>
					                        <strong class="block">{{$eachevent->events_name}}</strong>
					                        <small>{{$eachevent->mainspeaker}}</small>
					                        <small>{{substr($eachevent->events_desc,0,100)}}</small>
					                      </a>
					                      <label class="label dpt-bg-light m-l-xs pull-right">{{$eachevent->eventcategory->events_type_name}}</label>
					                    </li>
					              	</article>
					              	<div class="line line-dashed"></div>
					            @endif
				            @endforeach
			            @else
			            	<strong class="block">There are no upcoming events.</strong>
			            @endif
		            </section>
	          </section>
	      	</div>
      	</div>
        <div class="col-md-3" id="newsSection" style="padding: 0px;">
          <div id="news">
	          	<section class="panel">
		            <header class="panel-heading dpt-text-dark">
		              	<strong>Latest News/Updates</strong> 
		              	<!-- <span class="badge bg-info">12</span> -->
		              	<span class="" id="newscount">({{count($getallnews) + count($getallupdates)}})</span>                     
		            </header>
		            <section class="panel-body scrollable" id="news-list">
		            @if(count($getallnews) || count($getallupdates))
			            @foreach($getallnews as $eachnews)
			              	<article class="media" style="border: 0px;">
				              	<li class="list-group-item" style="border: 0px;">
				              		@if($eachnews->news_link!="")                 
				                      <a href="{{$eachnews->news_link}}" class="clear" target="_blank">
				                        <span class="text-muted text-xs pull-right" style="padding: 1px;">{{$eachnews->news_date}}</span>
				                        <strong class="block">{{$eachnews->news_title}}</strong>
				                        <small>{{substr($eachnews->news_description,0,100)}}</small>
				                      </a>
				                    @else
				                    	<span class="text-muted text-xs pull-right" style="padding: 1px;">{{$eachnews->news_date}}</span>
				                        <strong class="block">{{$eachnews->news_title}}</strong>
				                        <small>{{substr($eachnews->news_description,0,100)}}</small>
				                    @endif
			                    </li>
			              	</article>
			              	<div class="line line-dashed"></div>
			            @endforeach
			        
			        	@foreach($getallupdates as $eachupdate)
			              	<article class="media" style="border: 0px;">
			              		<label class="text-success">New Paper Published</label>
				              	<li class="list-group-item" style="border: 0px;">                      
			                      <a href="#" class="clear">
			                        <span class="text-muted text-xs pull-right" style="padding: 1px;"></span>
 <a href="{{url('/publications/viewpublication/'.$eachupdate->id)}}" target="_blank">
			                        <strong class="block">{{$eachupdate->title}}</strong></a>
			                        <small>
			                        	<b>Authors:</b> {{substr($eachupdate->author,0,100)}}.<br/>
			                        	<i>{{$eachupdate->journal}}.</i>
			                        	@if($eachupdate->volume) {{$eachupdate->volume}}  @endif 
										@if($eachupdate->year), {{$eachupdate->year}} <br/> @endif
			                        	@if($eachupdate->doi)<b> <a href="http://dx.doi.org/{{$eachupdate->doi}}">DOI</a></b> @endif 
									</small>
			                      </a>
			                    </li>
			              	</article>
			              	<div class="line line-dashed"></div>
			            @endforeach
			        @else
			        	<article class="media" style="border: 0px;">
			              	<li class="list-group-item" style="border: 0px;"> 
		                        <strong class="block">There are no News/Updates for now.</strong>
		                    </li>
		              	</article>
			        @endif		             
		            </section>
	          </section>
	      	</div>
          <div id="webportal">
            <a href=# data-toggle="collapse" data-target="#mail" class="list-group-item"> 
                <i class="fa fa-fw fa-envelope"></i>&nbsp;&nbsp;Webmail
            </a>
                <div id="mail" class="collapse">
                <br>
                <a href=https://email.iitm.ac.in target="_blank"><i class="fa fa-fw fa-hand-o-right"></i>&nbsp;&nbsp;Outlook express</a>
                </div>
          </div>
          <br>          
        </div>    
      </div>
    </div>
@stop

@section('footer-scripts')
@parent
<script type="text/javascript" src="{{URL::asset('js/jquery.cslider.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){    	
    	$(".item:first").addClass('active');
    	$(".slideno:first").addClass('active');
    	$('.carousel').carousel({
		  interval: 6000
		});
    });
    </script>
@stop
