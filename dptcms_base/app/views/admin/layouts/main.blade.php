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
        <title>Admin Panel | DeptCMS</title>
    @show

    @section('header-favicon')
    <link rel="shortcut icon" href="{{ URL::asset('favicon.png') }}" type="image/x-icon">
    @show

    @section('header-styles')  
        <link rel="stylesheet" href="{{ URL::asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/animate.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/font-awesome.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/font.css') }}" type="text/css" cache="false" />
        <link rel="stylesheet" href="{{ URL::asset('js/admin/theme/fuelux/fuelux.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/plugin.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/admin/theme/app.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('js/summernote/dist/summernote.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('js/summernote/dist/summernote-bs3.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('lib/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" />
        <!-- <link rel="stylesheet" href="URL::asset('lib/animo.js/animate+animo.css')" /> -->
        <!-- <link rel="stylesheet" href="{{ URL::asset('css/datepicker.css') }}" type="text/css" /> -->
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/admin/main.css') }}" type="text/css" />
    @show

    @section('header-scripts')
        <script src="{{ URL::asset('lib/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" async
          src="{{URL::asset('js/mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML')}}">
        </script>
        
        <!--[if lt IE 9]>
            <script src="js/ie/respond.min.js" cache="false"></script>
            <script src="js/ie/html5.js" cache="false"></script>
            <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
        <script  src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/datatables-bootstrap.js')}}"></script>
        <script src="{{asset('js/datatables.fnReloadAjax.js')}}"></script>
        <script type="text/javascript">
          var globalDataPath = "{{ URL::asset('data')}}";
          var globalPath = "{{ URL::to('/')}}";
        </script>
    @show

</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <section class="vbox">
        <header class="header bg-black navbar navbar-inverse pull-in">
          <div class="navbar-header nav-bar aside dk">
            <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-primary">
              <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="nav-brand" data-toggle="fullscreen"><img src="">deptCMS 0.2</a>
            <a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-comment-o"></i>
            </a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{url('/')}}" target="_blank">
                      <span class="text-white">Visit Website</span>
                    </a>
                </li>                            
            </ul>
            <ul class="nav navbar-nav navbar-right">              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle aside-sm dker" data-toggle="dropdown">
                  <span class="thumb-sm avatar pull-left m-t-n-xs m-r-xs">
                    <img src="{{ URL::asset('images/avatar_default.jpg') }}">
                  </span>
                  <?php 
                    $ufname = trim(Auth::user()->user_fname);
                    if (strlen($ufname)>=10) {
                      echo substr($ufname,0,7).'..';
                    }else{
                      echo $ufname;
                    }
                  ?>
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                  <li>
                    <a href="{{url('logout')}}">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </header>
        <section>
        <section class="hbox stretch ">
          <aside class="aside bg-dark dk" id="nav">
            <section class="vbox">
              <section class="scrollable">
                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px">
                  <nav class="nav-primary hidden-xs" data-ride="collapse">
                    <!-- Side Menu -->
                    @include('admin.components.side-navigation')
                  </nav>
                </div>
              </section>
            </section>
          </aside>
          <section class="vbox pull-in">
            <div class="wrapper">                
              <!-- <section class="scrollable"> -->
                <!-- Contents of page goes here -->
                @if(Session::has('message'))
                    <div class="alert alert-warning alert-dismissable error-message">
                        <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}.
                    </div>
                @endif
                <div class="flash-message alert error-message" hidden="hidden">
                    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                    <span class="flash-message-text"></span>
                </div>
                <div id="pageContent">
                    @yield('content')
                </div>

                <section id="pageModals">        
                    @yield('page-modals')
                </section> 
                 <!-- Login Modal -->
                <div class="modal fade" id="ChangePWDModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                      </div>
                      <div class="modal-body">
                          <form class="panel-body" id="changePWD" action="{{url('change_pwd')}}">
                            <div class="form-group">
                              <label class="control-label">New Password</label>
                              <input type="password" id="newpassword" required placeholder="New Password" class="form-control" name="newpassword">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Confirm New Password</label>
                              <input type="password" id="confirmpassword" required name="confirmpassword" placeholder="confirm password" class="form-control">
                            </div>
                            <input type="hidden" id="uid" name="uid" value="0"/>
                            <button type="submit" class="btn dpt-bg-light">Submit</button>
                            <p class="text-muted text-center"><small class="error hide">Password and Confirm Password Missmatch</small></p>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--User Update Modal -->
                <div class="modal fade" id="editUserDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Update details</h4>
                      </div>
                      <div class="modal-body" id="userdetailsupdate">
                        
                      </div>
                    </div>
                  </div>
                </div>    
                <!--User Update Modal -->
                <div class="modal fade" id="editPublicationDetails" tabindex="-1" role="dialog" aria-labelledby="editPublicationModal" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="editPublicationModal">Update details</h4>
                      </div>
                      <div class="modal-body" id="publicationdetailsupdate">
                        
                      </div>
                    </div>
                  </div>
                </div>               
                <!-- /User Update Model -->           
              <!-- </section> -->
            </div>
          </section>            
        </section>
        </section>
        
        
        <!-- <footer class="footer bg-dark"></footer> -->
        
    </section>

    

    <!-- Footer Scripts -->   
     
        <!-- Bootstrap -->
        <script src="{{ URL::asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- Sparkline Chart -->
        <script src="{{ URL::asset('js/admin/theme/charts/sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- App -->
        <script src="{{ URL::asset('js/admin/theme/app.js') }}"></script>
        <script src="{{ URL::asset('js/admin/theme/app.plugin.js') }}"></script>
        <script src="{{ URL::asset('js/admin/theme/app.data.js') }}"></script>
        <script src="{{ URL::asset('js/admin/theme/slimscroll/jquery.slimscroll.min.js') }}" cache="false"></script>
       <!-- Morris -->
        <script src="{{ URL::asset('js/admin/theme/charts/morris/raphael-min.js') }}" cache="false"></script>
        <script src="{{ URL::asset('js/admin/theme/charts/morris/morris.min.js') }}" cache="false"></script>
        <!-- fuelux -->
        <script src="{{ URL::asset('js/admin/theme/fuelux/fuelux.js') }}"></script>
        <!-- wysiwyg
        <script src="{{ URL::asset('js/admin/theme/wysiwyg/jquery.hotkeys.js') }}" cache="false"></script>
        <script src="{{ URL::asset('js/admin/theme/wysiwyg/bootstrap-wysiwyg.js') }}" cache="false"></script>
        <script src="{{ URL::asset('js/admin/theme/wysiwyg/demo.js') }}" cache="false"></script>
        -->
        <!-- datatables -->

        <script src="{{ URL::asset('js/summernote/dist/summernote.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.form.min.js') }}"></script> 
        <script src="{{ URL::asset('js/moment.min.js') }}"></script> 
        <script src="{{ URL::asset('lib/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script> 
        <script src="{{ URL::asset('js/holder.js') }}"></script>
        <script src="{{ URL::asset('lib/bootbox/bootbox.js') }}"></script>
        <!-- <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script> -->
        <script type="text/javascript"n src="{{URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{ URL::asset('lib/animo.js/animo.js') }}"></script>
        <script type="text/x-mathjax-config">
          // MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
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

    <!-- Custom Scripts -->
      <script src="{{ URL::asset('js/admin/main.js') }}" type="text/javascript"></script>
    </body>
</html>
