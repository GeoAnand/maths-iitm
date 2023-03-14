<div class="container" id="headerContainer">
        <!-- User Login Navgiation -->
          <!-- offset 2 to 1 EDITED NARAYANAN -->
        <div class="col-sm-8 col-sm-offset-1 col-xs-12"> 
          <div class="col-xs-3 m-b" style="padding: 0px;">
            <div class="pull-right">
              <a href="{{URL::asset('/')}}"><img src="{{URL::asset('siteimages/logo.png')}}" class="img-circle img-responsive" style="max-width:80%"></a>
            </div>
          </div>
          <div class="col-xs-9 pull-left m-b">
              <h2 id="deptHeading">
                  Department of Mathematics
              </h2>
              <small id="deptTagline">                
                  Indian Institute Of Technology Madras , Chennai            
              </small>
          </div>
        </div>        
      </div>
      <?php
      $getallannouncements=News::orderBy('news_date','DESC')->where('news_publish','=','1')->where('news_archive','=','0')->where('news_type','=','2')->get();
      ?>
      @if(count($getallannouncements))
        @if(Request::url() != url('login'))
          <div class="container m-t-lg">
            <div class="col-sm-12" id="marqueeContainer">
              <div class="col-sm-4">
                <div id="marquee-author" class="pull-right marquee-author m-r font-bold"></div>
                <div class="blink_me"><i class="pull-right fa fa-bullhorn fa-flip-horizontal fa-2x text-success m-r"></i></div>          
              </div>        
              <ul id="marquee" class="marquee col-sm-8 pull-right">
                @foreach($getallannouncements as $eachannouncement)                
                  <li class="announcement">                     
                    @if($eachannouncement->news_link!='')                   
                    <a href="{{$eachannouncement->news_link}}" class="clear" target="_blank">  
                      <strong class="author">{{$eachannouncement->news_title}}</strong>                
                      <span class="block">{{$eachannouncement->news_description}}</span>
                    </a>
                    @else
                      <strong class="author">{{$eachannouncement->news_title}}</strong>                
                      <span class="block">{{$eachannouncement->news_description}}</span>
                    @endif
                  </li>             
                @endforeach         
              </ul>
            </div>
          </div>
        @endif
      @endif
      
<header id="headerNavBar" class="navbar navbar-default navbar-static-top" role="banner">
          <div class="container">
            <div class="navbar-header">
              <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="#" class="navbar-brand" style="font-size:inherit"></a>
            </div>
            <nav class="navbar-collapse collapse" role="navigation" style="height: 1px;">
              <ul class="nav navbar-nav">
                <li class="dropdown {{ setActive(['home/*']) }}">
                  <a href="{{url('/')}}">Home</a>
	<!--	<ul class="dropdown-menu">
                        <li><a href="{{url('home/about')}}">About the page</a>
                        </li>
                </ul> -->

                </li>
               {{-- <li class="dropdown {{ setActive(['about/*']) }}">
                  <a href="{{url('/')}}">About Us</a>
		<ul class="dropdown-menu">	
			<li><a href="{{url('about/vision')}}">Vision</a>
			</li>
			<li><a href="{{url('about/history')}}">History</a>
			</li>
		</ul>
                </li>  #EDITED NARAYANAN --}}
                <li class="dropdown {{ setActive(['people/*']) }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">People <b class="caret"></b></a>
                  <?php
                  $getallppltype=Usertype::all();
                  $getallprog=Programs::where('disable_students', '=', 0)->orderBy('orderinmenu','ASC')->get();
                  ?>
                  <ul class="dropdown-menu">
                    <?php $i=1; ?>
                    @foreach($getallppltype as $val)
                        <?php $i++; ?>
                        @if($i==8)
                          <li><a href="{{url('people/'.$val->link)}}">{{$val->user_type_name}}</a></li>
                          <li class="dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masters Students</a>
                            <ul class="dropdown-menu">
                              @if(count($getallprog))
                                @foreach($getallprog as $val)
                                    <li>
                                @if($val->id!=3)      <a href="{{url('student/program/'.$val->id)}}">{{$val->program_name}}</a> @endif
                             <!-- EDITED OUT PhD listing NARAYANAN   <a href="{{url('student/program/'.$val->id)}}">{{$val->program_name}}</a> --> 
                                    </li>
                                @endforeach
                              @else
                                <li>No Programs added</li>
                              @endif
                            </ul>
                          </li>
                        @else
                          <li><a href="{{url('people/'.$val->link)}}">{{$val->user_type_name}}</a></li>
                        @endif
                    @endforeach

                  </ul>
                </li>
                <li class="{{ setActive(['researchinfo', 'researchgroup']) }}">
                  <a href="{{url('researchinfo')}}">Research</a>
                </li>
                <li class="dropdown {{ setActive(['program/*']) }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li class="dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programs</a>
                              <ul class="dropdown-menu">
                                @if(count($getallprog))
                                 @foreach($getallprog as $val)
                                   <li><a href="{{url('program/'.$val->id)}}">{{$val->program_name}}</a></li>
                                 @endforeach
                                @else
                                <li>No Programs added</li>
                               @endif
			    </ul>
                      </li>
                	<li class="dropdown">
			<a href="{{url('program/5')}}">Other Courses</a>
                 <!-- <a href="{{url('othercourses')}}">Other Courses</a> EDITED OFF NARAYANAN -->
              		  </li>
                      <li class="dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admission</a>
                              <ul class="dropdown-menu">
                                @if(count($getallprog))
                                 @foreach($getallprog as $val)
                                   <li><a href=""" "{{url('admission/'.$val->id)}}">{{$val->program_name}}</a></li>
                                 @endforeach
                                @else
                                <li>No Programs added</li>
                               @endif
			      </ul>
		      </li>
                	<li class="dropdown">
			<a href="https://www.iitm.ac.in/ordinances" target="_blank">Academic Regulations</a>
			</li>
                  </ul>
                </li>
                <li class="{{ setActive(['publications', 'publications']) }}">
                  <a href="{{url('publications/view')}}">Publications</a>
                </li>
                <li class="dropdown {{ setActive(['event/*']) }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                  <?php
                    $getallevents=Eventcategory::all();
                  ?>
                  <ul class="dropdown-menu">
                    @foreach($getallevents as $val)
                      <li>
                        <a href="{{url('event/'.$val->id)}}">{{$val->events_type_name}}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
                <li class="dropdown {{ setActive(['resources/*', 'booking/*']) }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('resources/alllinks')}}">Links</a>
                    </li>
                    <li>
                      <a href="{{url('resources/alldocs')}}">Documents</a>
                    </li>
                    <li>
                      <a href="{{url('resources/gallery')}}">Gallery</a>
                    </li>
                    <li>
                      <a href="{{url('resources/allvideos')}}">Videos</a>
                    </li>                  
                    <li>
                      <a href="{{url('booking/create')}}">Book a Conference room</a>
                    </li>                   
                  </ul>
                </li>
               <!-- <li class="{{ setActive(['contact']) }}">
                  <a href="{{url('contact')}}">Admissions</a>
                </li> -->
              </ul>
              <!-- User Login Navgiation -->
                <ul id="userprofilelink" class="pull-right m-t">
                  <li style="" class="pull-right badge dpt-bg-light">
                    @if(!Auth::check())
                      <a href="#" style="" class="pull-right" id="getlogin"><span class="">Login</span></a>
                    @else
                      <a href="{{url('logout')}}" class="topprofilelink pull-right"><span class="">Logout</span></a>
                      @if(Auth::check())
                          <a href="{{url('profile/'.Auth::user()->user_namehandle)}}" target="_blank" class="topprofilelink pull-right"><span class="">My Profile</span></a>
                      @endif
                      @if((Auth::user()->userprivileg->people==1) || (Auth::user()->userprivileg->student==1) || (Auth::user()->userprivileg->research==1)||(Auth::user()->userprivileg->programs==1)||(Auth::user()->userprivileg->events==1) || (Auth::user()->userprivileg->research==1) || (Auth::user()->userprivileg->newannouncement==1)|| (Auth::user()->userprivileg->createadmin==1))
                        <a href="{{url('admin')}}" target="_blank" class="topprofilelink pull-right"><span class="">Admin Panel</span></a>
                      @endif
                    @endif
                  </li>
                </ul>
              <!--  // -->
          </nav>
          </div>
      </header>

      @if(Session::has('message'))
      
      <div class="container alert alert-info alert-dismissable error-message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('message') }}.
      </div>
  @elseif(Session::has('warning'))
      <div class="container alert alert-warning alert-dismissable error-message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('warning') }}.
      </div>
  @elseif(Session::has('error'))
      <div class="container alert alert-danger alert-dismissable error-message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('error') }}.
      </div>
  @elseif(Session::has('success'))
      <div class="container alert alert-success alert-dismissable error-message">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('success') }}.
      </div>
  @endif
  
  @yield('homeContent')
  <div class="container" id="contentContainer">
    @yield('content')
  </div>
