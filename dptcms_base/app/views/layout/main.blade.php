<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

  <head>
    @section('header-meta')
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="description" content="Mathematics, deptCMS, dptCMS, department, website, IIT, Desto Creative Solutions, Chennai, app, web app, admin dashboard, admin">
        <meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=1" />
    @show
    @section('header-title')
        <title>DeptCMS</title>
    @show

    @section('header-favicon')
    <link rel="shortcut icon" href="{{URL::asset('favicon.png') }}" type="image/x-icon">
    @show

    @section('header-styles')  
        <link rel="stylesheet" href="{{URL::asset('lib/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/animate.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/font-awesome.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/font.css') }}" type="text/css" cache="false" />
        <link rel="stylesheet" href="{{ URL::asset('js/fuelux/fuelux.css') }}" type="text/css" cache="false" />        
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/plugin.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/app.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/typeahead.js-bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/jquery.marquee.min.css') }}" type="text/css" />
        <!-- <link rel="stylesheet" href="{{ URL::asset('lib/bootstrap-datepicker/css/datepicker.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('lib/bootstrap-datepicker/css/datepicker3.css') }}" type="text/css" /> -->
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme/default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style_v2.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme/math.css')}}"> --}}
        <script type='text/javascript' src="{{URL::asset('js/jstyle.js')}}"></script>
         <!-- <link rel="stylesheet" href="{{-- {{URL::asset('css/pi.css')}} --}}" type="text/css" /> -->
    @show

    @section('header-scripts')
        <script>
        function changeTheme(theme){
          switch (theme)
          {
            case '1': themeLink = "{{URL::asset('css/main.css')}}";
                      break;
            case '2': themeLink = "{{URL::asset('css/theme/basic.css')}}";
                      break;
            case '3': themeLink = "{{URL::asset('css/theme/iitm-1.css')}}";
                      break;
            case '4': themeLink = "{{URL::asset('css/theme/nccrd-kaust.css')}}";
                      break;
            case '5': themeLink = "{{URL::asset('css/theme/nccrd-orange.css')}}";
                      break; 
            case '6': themeLink = "{{URL::asset('css/theme/nccrd-theme-1.css')}}";
                      break;
            case '7': themeLink = "{{URL::asset('css/theme/nccrd-theme-2.css')}}";
                      break;
            case '8': themeLink = "{{URL::asset('css/theme/nccrd-ICIWS.css')}}";
                      break;
            case '9': themeLink = "{{URL::asset('css/theme/nccrd-ICIWS-2.css')}}";
                      break;        
            case '10': themeLink = "{{URL::asset('css/theme/nccrd-slaty-blue.css')}}";
                      break;
            case '11': themeLink = "{{URL::asset('css/theme/nccrd-green.css')}}";
                      break;
            default:  themeLink = "{{URL::asset('css/theme/nccrd-ICIWS-2.css')}}"; 
          }
          jstyle.addLink(themeLink);
        }
          
        </script>
        <script src="{{URL::asset('lib/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" async
          src="{{URL::asset('js/mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML')}}">
        </script>
        <script type="text/javascript">
        $(document).on("change", "select[name='theme']", function(e){
          e.preventDefault(0);
          changeTheme($(this).val());
        });
        </script>
        <!--[if lt IE 9]>
            <script src="js/ie/respond.min.js" cache="false"></script>
            <script src="js/ie/html5.js" cache="false"></script>
            <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
    @show
  </head>
    
  <!-- HTML code from Bootply.com editor -->
    
  <body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    
    <section class="vbox">
      <div class="row" id="topMostHeader"></div>
        <div class="row">
          <div class="col-sm-3 col-sm-offset-9">
            {{-- <select name="theme" class="form-control m-b m-t m-r pull-right">
              <option value="1">Default Theme</option>
              <option value="2">Base Theme</option>
              <option value="3">IITM Theme 1</option>
              <option value="4">Blue</option>
              <option value="5">Orange</option>
              <option value="6">Muddy</option>
              <option value="7">Olive Dark</option>
              <option value="8">Olive Light</option>
              <option value="10">Slaty Blue</option>
              <option value="11">Green</option>
            </select> --}}
          </div>
      </div>
      <div class="container" id="headerContainer">
        <!-- User Login Navgiation -->
        <div class="col-sm-8 col-sm-offset-1 col-xs-12"> <!-- offset 2 to 1 EDITED NARAYANAN -->
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

      <!-- Contents of page goes here -->
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

    </section>
    @section('modals')
      <!-- Login Modal -->
      <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <form class="panel-body" id="userlogin" action="{{url('authenticate_user')}}">
                  <div class="form-group">
                    <label class="control-label">ADS Username/Email</label>
                    <input type="text" id="username" required placeholder="ADS Username or Email" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" id="password" required name="password" placeholder="Password" class="form-control">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember"> Keep me logged in
                    </label>
                  </div>
                  {{-- <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a> --}}
                  <button type="submit" class="btn dpt-bg-light">Sign in</button>
                  <p class="text-muted text-center"><small class="error">Email or Password mismatch</small></p>
                </form>
            </div>
          </div>
        </div>
      </div> 
    @show  

    @section('qfooter-scripts')
      <script type='text/javascript' src="{{URL::asset('js/bootstrap.min.js')}}"></script>
      <script type='text/javascript' src="{{URL::asset('js/fuelux/fuelux.js')}}"></script>
      <script type='text/javascript' src="{{URL::asset('js/typeahead.js')}}"></script>
      <script type='text/javascript' src="{{URL::asset('js/hogan-2.0.0.js')}}"></script>
      <script type='text/javascript' src="{{URL::asset('js/jquery.marquee.min.js')}}"></script>
      <!-- <script type='text/javascript' src="{{URL::asset('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script> -->
      <script type='text/javascript' src="{{URL::asset('lib/moment/min/moment.min.js')}}"></script>
      <script type="text/javascript"n src="{{URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
      <script type='text/javascript' src="{{URL::asset('js/jquery.form.min.js')}}"></script>
      <script src="{{ URL::asset('lib/bootbox/bootbox.js') }}"></script>
      <script type='text/javascript' src="{{URL::asset('js/main.js')}}"></script>     
    @show



    <script type='text/javascript'>      
      var grouppath="{{URL::asset('data/researchgruop.json')}}"; 
      var globalPath="{{url('/')}}";
      console.log(grouppath);
      
      var use_debug = false;

      function debug(){
        if( use_debug && window.console && window.console.log ) console.log(arguments);
      }

      $(document).ready(function() {  
        $("#marquee").marquee({
          loop: -1
          // this callback runs when the marquee is initialized
          , init: function ($marquee, options){
            debug("init", arguments);

            // shows how we can change the options at runtime
            if( $marquee.is("#marquee2") ) options.yScroll = "bottom";
          }

          // this callback runs before a marquee is shown
          , beforeshow: function ($marquee, $li){
            debug("beforeshow", arguments);

            // check to see if we have an author in the message (used in #marquee6)
            var $author = $li.find(".author");
            // move author from the item marquee-author layer and then fade it in
            if( $author.length ){
              $("#marquee-author").html("<span style='display:none;'>" + $author.html() + "</span>").find("> span").fadeIn(850);
            }
          }
          // this callback runs when a has fully scrolled into view (from either top or bottom)
          , show: function (){
            debug("show", arguments);
          }
          // this callback runs when a after message has being shown
          , aftershow: function ($marquee, $li){
            debug("aftershow", arguments);

            // find the author
            var $author = $li.find(".author");
            // hide the author
            if( $author.length ) $("#marquee-author").find("> span").fadeOut(250);
          }
        });  
        $(".topprofilelink:last").css("border","none");
        $(".error").css('display',"none");
        $(".denied").css('display',"none");
        $(".unknown").css('display',"none");
      });

      $(document).on("click", "#getlogin", function(){
          $("#LoginModal").modal('show');
      });
      
      $(document).on("submit", "#userlogin", function(event)
      {
          event.preventDefault();
          var url=$(this).attr('action');
          var data=$(this).serialize();
          $.post(url,data,function(res){

          }).done(function(res){
              if(res=='success')
              {
                $("#LoginModal").modal('hide');
                window.location.reload();
              }
              else if (res=='missing')
              {
                $(".error").text("You have not been added! Pleas contact the admin.");
                $(".error").css("display","block");
              }else if(res=='wrongdept')
              {
                $(".error").text("Sorry! You do not belong to Mathematics Department.");
                $(".error").css("display","block");
              }else if(res=='notemployee'){
                $(".error").text("Sorry! You are not a Employee.");
                $(".error").css("display","block");
              }else if (res=='authenticationerror') {
                $(".error").text("Error! Username/Email or password is wrong.");
                $(".error").css("display","block");
              }else{
                $(".error").text("Unknown Error!.");
                $(".error").css("display","block");
              }
          });
      }); 

      function blinker() {
          $('.blink_me').fadeOut(500);
          $('.blink_me').fadeIn(500);
      }

      setInterval(blinker, 1000);

    </script>
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
        extensions: ["tex2jax.js"],
        jax: ["input/TeX", "output/HTML-CSS"],
        tex2jax: {
          inlineMath: [ ['$','$'], ["\\(","\\)"] ],
          displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
          processEscapes: true
        },
        "HTML-CSS": { availableFonts: ["TeX"] }
      });
    </script>
    @section('footer-scripts')
    @show
   

  </body>
</html>
