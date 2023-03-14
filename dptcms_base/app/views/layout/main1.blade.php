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
        <meta name="description" content="deptCMS, dptCMS, college, department, website, IIT, Desto Creative Solutions, Chennai, app, web app, admin dashboard, admin">
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
        <script type='text/javascript' src="{{URL::asset('js/jstyle.js')}}"></script>
         <!-- <link rel="stylesheet" href="{{URL::asset('css/pi.css')}}" type="text/css" /> -->
    @show

    @section('header-scripts')
        <script>
        // function changeTheme(theme){
        //   switch (theme)
        //   {
        //     case '1': themeLink = "{{URL::asset('css/main.css')}}";
        //               break;
        //     case '2': themeLink = "{{URL::asset('css/theme/basic.css')}}";
        //               break;
        //     case '3': themeLink = "{{URL::asset('css/theme/iitm-1.css')}}";
        //               break;
        //     default:  themeLink = "{{URL::asset('css/theme/basic.css')}}";
        //   }
        //   jstyle.addLink(themeLink);
        // }
          
        </script>
        <script src="{{URL::asset('lib/jquery/dist/jquery.min.js') }}"></script>
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
    <!-- <div class="row">
      <div class="col-sm-3 col-sm-offset-9">
        <select name="theme" class="form-control m-b m-t m-r pull-right">
          <option value="1">Default Theme</option>
          <option value="2">Base Theme</option>
          <option value="3">IITM Theme 1</option>
        </select>
      </div>
    </div> -->
    <section class="vbox">
      <!-- <div class="row" id="topMostHeader"></div> -->
      <div class="container" id="headerContainer">
        <!-- User Login Navgiation -->
        <div class="pull-right">
          <ul id="userprofilelink">
            <li style="" class="pull-right">
              @if(!Auth::check())
                <a href="#" style="" class="pull-right" id="getlogin"><span class="topmenulink">Login</span></a>
              @else
              <a href="{{url('logout')}}" class="topprofilelink pull-right"><span class="topmenulink">Logout</span></a>
              <a href="{{url('profile/'.Auth::user()->user_namehandle)}}" target="_blank" class="topprofilelink pull-right"><span class="topmenulink">My Profile</span></a>
                @if(Auth::user()->isadmin==1)
                  <a href="{{url('admin')}}" target="_blank" class="topprofilelink pull-right"><span class="topmenulink">Admin Panel</span></a>
                @endif
              @endif
            </li>
          </ul>
        </div>
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
          <div class="col-xs-2 m-b" style="padding: 0px;">
            <div class="pull-right">
              <a href="{{URL::asset('/')}}"><img src="{{URL::asset('siteimages/logo.png')}}" class="img-circle img-responsive" style="max-width:80%"></a>
            </div>
          </div>
          <div class="col-xs-10 pull-left m-b">
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
                    <a href="{{$eachannouncement->news_link}}" class="clear" target="_blank">  
                      <strong class="author">{{$eachannouncement->news_title}}</strong>                
                      <span class="block">{{$eachannouncement->news_description}}</span>
                    </a>
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
                <li>
                  <a href="{{URL::asset('/')}}">Home</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">People<b class="caret"></b></a>
                  <?php
                  $getallppltype=Usertype::all();
                  ?>
                  <ul class="dropdown-menu">
                    @foreach($getallppltype as $val)
                        <li><a href="{{url('people/'.$val->link)}}">{{$val->user_type_name}}</a></li>
                    @endforeach
                    <!-- <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li> -->
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a>
                    <?php
                    $getallprog=Programs::orderBy('orderinmenu','ASC')->get();
                    ?>
                    <ul class="dropdown-menu">
                      @foreach($getallprog as $val)
                          <li>
                            <a href="{{url('program/student/'.$val->id)}}">{{$val->program_name}}</a>
                          </li>
                      @endforeach
                    </ul>
                </li>
                <li>
                  <a href="{{url('researchinfo')}}">Research</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programs<b class="caret"></b></a>
                  <?php
                  $getallprog=Programs::orderBy('orderinmenu','ASC')->get();
                  ?>
                  <ul class="dropdown-menu">
                    @foreach($getallprog as $val)
                        <li><a href="{{url('program/'.$val->id)}}">{{$val->program_name}}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="dropdown">
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
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{url('resources/alllinks')}}">Links</a>
                    </li>
                    <li>
                      <a href="{{url('resources/alldocs')}}">Documents</a>
                    </li>
                    <li>
                      <a href="{{url('resources/ourgallery')}}">Gallery</a>
                    </li>
                    @if(Auth::check())
                    <li>
                      <a href="{{url('booking/create')}}">Book a Conference room</a>
                    </li>
                   @endif
                  </ul>
                </li>
                <li>
                  <a href="{{url('contact')}}" class="menu-navlink">Contact</a>
                </li>
              </ul>
            </nav>
          </div>
      </header>

      <!-- Contents of page goes here -->
      @if(Session::has('message'))
          <div class="container alert alert-warning alert-dismissable error-message">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('message') }}.
          </div>
      @endif
      
      @yield('homeContent')
      <div class="container" id="contentContainer">
        @yield('content')
      </div>

      <div class="container" id="footerContainer">
        <div class="line line-dashed"></div>
        <footer>
          <p class="pull-right block" id="footerRTContent">Designed and Maintained by 
            <a href="http://desto.in" target="_blank" id="footerCompanyLink" class="wrapper">Desto Creative Solutions</a>
            <a href="#headerContainer" title="Back to top" id="scrollToTop">
                <i class="fa fa-caret-up fa-2x"></i>
            </a>
          </p>
          <p style="display: block;" id="footerLTContent">©2014 IITM - Department of Mathematics</p>
        </footer>
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
                <form class="panel-body" id="userlogin" action="{{url('login')}}">
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" id="email" required placeholder="test@example.com" class="form-control" name="email">
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
                  <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
                  <button type="submit" class="btn dpt-bg-light">Sign in</button>
                  <p class="text-muted text-center error"><small>Email or Password mismatch</small></p>
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
              else
              {
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
    @section('footer-scripts')
    @show
   

  </body>
</html>