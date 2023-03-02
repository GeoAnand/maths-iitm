@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
	<!-- <h3 id="researchgruopStart"></h3> -->
	@if($subtypes)>0)
	<div class="col-sm-12" style="background: #fff;">
        <div class="row">
            <section class="panel">
                <header class="panel-heading bg-light">
                  <ul class="nav nav-tabs nav-justified">
                  @foreach($getsubtypes as $subtype)
                    <li class=""><a href="#{{ucfirst($subtype['user_subtype'])}}tab" data-toggle="tab"><i class="fa fa-users text-default"></i> {{ucfirst($subtype['user_subtype'])}}</a></li>
                  @endforeach
                  </ul>
                </header>
                 <div class="panel-body">
                  <div class="tab-content">
                  @foreach($getsubtypes as $subtype)
                    <div class="tab-pane" id="{{ucfirst($subtype['user_subtype'])}}tab">
                        <div id="{{ucfirst($subtype['user_subtype'])}}">
                            <div class="col-sm-8">
                                <h3 class="dpt-text-dark">{{ucfirst($subtype['user_subtype'])}}</h3>
                            </div>
                            <div class="col-sm-4">
                                <ol class="breadcrumb pull-right">
                                  <li>People</li>
                                  <li><a href="#">{{implode(' ',array_filter(explode('-',$type)))}}</a></li>
                                  <li class="active">{{ucfirst($subtype['user_subtype'])}}</li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-sm-12 line line-solid"></div>
                        @if(count($peoplebytype))
                            <div class="col-sm-12" align="center" style="padding: 10px 0px 30px 0px;">
                                <form class="form-inline" role="form" action="javascript:void(0)">
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" id="searchpeople" placeholder="Search People" style="border-color: #C5B7B7;">
                                        <span class="fa fa-search form-control-feedback"></span>
                                    </div>
                                </form>
                            </div>

                            <div class="colsm-12">
                                @foreach($peoplebytype as $value)
                                    @if(($value->user_subtype)==$subtype['user_subtype'])
                                    <div class="col-sm-4 each-user" data-href="@if(($type!='Staff')&&($type!='Retired-Faculty')) {{url($value->user_namehandle)}} @endif">
                                        <section class="panel dpt-bg-light">
                                            <div class="panel-body lter">
                                                <div class="col-sm-3 m-l-n">
                                                    <a href="#" class="pull-left thumb avatar border m-r">
                                                        @if($value->user_profilepics)
                                                            <!-- <img src="{{URL::asset('images/'.$value->user_profilepics)}}" class="img-circle"> -->
                                                        @else
                                                            <!-- <img src="{{URL::asset('images/avatar_default.jpg')}}" class="img-circle"> -->
                                                        @endif
                                                        @if($value->username!='')
                                                            <?php
                                                            $profilepicJpg = 'images/profilepic/'.$value->username.'.jpg';
                                                            $profilepicJpeg = 'images/profilepic/'.$value->username.'.jpeg';
                                                            $profilepicPng = 'images/profilepic/'.$value->username.'.png';
                                                            $profilepicGif = 'images/profilepic/'.$value->username.'.gif';

                                                            $profilepicJPG = 'images/profilepic/'.$value->username.'.JPG';
                                                            $profilepicJPEG = 'images/profilepic/'.$value->username.'.JPEG';
                                                            $profilepicPNG = 'images/profilepic/'.$value->username.'.PNG';
                                                            $profilepicGIF = 'images/profilepic/'.$value->username.'.GIF';
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
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="m-l  m-r-n">                                  
                                                        <p class="each-user-title font-bold" data-name="{{$value->user_fname.' '.$value->user_lname}}">{{$value->user_title.' '.$value->user_fname.' '.$value->user_lname}}</p>
                                                        <p class="">{{$value->user_designation}}</p>
                                                    </div> 
                                                    <div class="m-l  m-r-n">  
                                                        <p><i class="fa fa-phone"></i>&nbsp;&nbsp;{{'044 - 2257 '.$value->user_phone}}</p>
                                                        <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Office : {{$value->user_office}}</p>
                                                        @if(($type!='Staff')&&($type!='Retired-Faculty')&&($type!='PhD'))
                                                        <p style="word-break: break-word;"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;{{$value->user_namehandle}}</p>
                                                        @endif                         
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>                                   
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <span class="text-muted wrapper text-center center-block">
                                <i class="fa fa-warning fa-4x"></i> <br/>Sorry! Currently there are no {{implode(' ',array_filter(explode('-',$type)))}} or the list has not been updated.
                            </span>
                        @endif
                        <br/>
                    </div>
                   @endforeach
                  </div>
                </div>
            </section>
        </div>
    </div>
    @else
        <div class="col-sm-12">
    		<div class="col-sm-8">
    			<h3 class="dpt-text-dark">{{implode(' ',array_filter(explode('-',$type)))}}</h3>
    		</div>
    		<div class="col-sm-4">
    			<ol class="breadcrumb pull-right">
    			  <li>People</li>
    			  <li class="active">{{implode(' ',array_filter(explode('-',$type)))}}</li>
    			</ol>
    		</div>
    	</div>
    	<div class="col-sm-12 line line-solid"></div>

        @if(count($peoplebytype))
        	<div class="col-sm-12" align="center" style="padding: 10px 0px 30px 0px;">
        		<form class="form-inline" role="form" action="javascript:void(0)">
        			<div class="form-group has-feedback">
        				<input type="text" class="form-control" id="searchpeople" placeholder="Search People" style="border-color: #C5B7B7;">
        				<span class="fa fa-search form-control-feedback"></span>
        			</div>
        		</form>
                <div class="m-t text-muted">
                @if(($type=='Faculty')||($type=='Inspire-Faculty')||($type=='Visiting-Faculty'))
                    Email ID: username [@] iitm [dot] ac [dot] in
                @endif
                </div>
        	</div>

            <div class="colsm-12">
            	@foreach($peoplebytype as $value)
                    <div class="col-sm-4 @if(($type!='Staff')&&($type!='Retired-Faculty')) each-user @endif" data-href="@if(($type!='Staff')&&($type!='Retired-Faculty')) {{url($value->user_namehandle)}} @endif">
                        <section class="panel dpt-bg-light">
                            <div class="panel-body lter" style="height:220px;">
                                <div class="col-sm-3 m-l-n">
                                    <div class="pull-left thumb avatar border m-r">
                                        @if($value->user_profilepics)
                                            <!-- <img src="{{URL::asset('images/'.$value->user_profilepics)}}" class="img-circle"> -->
                                        @else
                                            <!-- <img src="{{URL::asset('images/avatar_default.jpg')}}" class="img-circle"> -->
                                        @endif
                                        @if($value->user_namehandle!='')
                                            <?php
                                            $profilepicJpg = 'images/profilepic/'.$value->user_namehandle.'.jpg';
                                            $profilepicJpeg = 'images/profilepic/'.$value->user_namehandle.'.jpeg';
                                            $profilepicPng = 'images/profilepic/'.$value->user_namehandle.'.png';
                                            $profilepicGif = 'images/profilepic/'.$value->user_namehandle.'.gif';

                                            $profilepicJPG = 'images/profilepic/'.$value->user_namehandle.'.JPG';
                                            $profilepicJPEG = 'images/profilepic/'.$value->user_namehandle.'.JPEG';
                                            $profilepicPNG = 'images/profilepic/'.$value->user_namehandle.'.PNG';
                                            $profilepicGIF = 'images/profilepic/'.$value->user_namehandle.'.GIF';
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
                                </div>
                                <div class="col-sm-9">
                                    <div class="m-l  m-r-n">                                  
                                        <p class="each-user-title font-bold" data-name="{{$value->user_fname.' '.$value->user_lname}}">{{$value->user_title.' '.$value->user_fname.' '.$value->user_lname}}</p>
                                        <p class="">{{$value->user_designation}}</p>
                                    </div> 
                                    <div class="m-l  m-r-n">
                                        @if($type == 'Retired-Faculty')
                                            @if($value->user_phone!=' ')
                                            <p><i class="fa fa-phone"></i>&nbsp;&nbsp;{{$value->user_phone}}</p>
                                            @endif
                                            @if($value->user_office!=' ')
                                            <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Address : {{$value->user_office}}</p>
                                            @endif
                                        @else
                                        <p><i class="fa fa-phone"></i>&nbsp;&nbsp;{{'044 - 2257 '.$value->user_phone}}</p>
                                        <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Office : {{$value->user_office}}</p>
                                        @endif
                                        @if(($type!='Staff')&&($type!='Retired-Faculty')&&($type!='PhD'))
                                        <p style="word-break: break-word;"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;{{$value->user_namehandle}}</p>
                                        @if($value->user_researchfield!='')
                                        <p style="word-break: break-word;"><i class="fa fa-book"></i>&nbsp;&nbsp;{{$value->user_researchfield}}</p>
                                        @endif
                                        @endif
                                        <?php
                                        // header("Content-Type: image/png");
                                        // $im = @imagecreate(110, 20)
                                        //     or die("Cannot Initialize new GD image stream");
                                        // $background_color = imagecolorallocate($im, 0, 0, 0);
                                        // $text_color = imagecolorallocate($im, 233, 14, 91);
                                        // imagestring($im, 1, 5, 5,  "A Simple Text String", $text_color);
                                        // imagepng($im);
                                        // imagedestroy($im);   
                                        ?>                       
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            	@endforeach
            </div>
        @else
            <span class="text-muted wrapper text-center center-block">
                <i class="fa fa-warning fa-4x"></i> <br/>Sorry! Currently there are no {{implode(' ',array_filter(explode('-',$type)))}} or the list has not been updated.
            </span>
        @endif
    @endif
@stop

@section('footer-scripts')
    @parent    
    <script type="text/javascript">
        $(document).ready(function(e){
            $(".nav-tabs li").first().addClass('active');
            $(".tab-pane").first().addClass('active');
        });
    </script>
@stop
