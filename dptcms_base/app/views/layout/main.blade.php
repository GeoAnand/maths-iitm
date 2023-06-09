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
        <!-- <link rel="stylesheet" href="{{ URL::asset('css/jquery.marquee.min.css') }}" type="text/css" />  marquee -->
        <!-- <link rel="stylesheet" href="{{ URL::asset('lib/bootstrap-datepicker/css/datepicker.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('lib/bootstrap-datepicker/css/datepicker3.css') }}" type="text/css" /> -->
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme/default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style_v2.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/theme/math.css')}}"> --}}
        <script type='text/javascript' src="{{URL::asset('js/jstyle.js')}}"></script>
        <!-- fonts -->
	      <link rel="preconnect" href="https://fonts.googleapis.com">
	      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <!-- skillskapes - CSS -->
        <link rel="stylesheet" href="{{URL::asset('css/theme/skillskapes.css')}}" type="text/css" />
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
      <!-- <div class="row" id="topMostHeader"></div> -->
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

      <!-- new navbar -->
  <div class="ftco-section">
		<div class="container-fluid px-md-5">
			<div class="row justify-content-between">
				<div class="col-md-12">
					<div class="row" style="padding: 15px 0px 10px 0px;">
						<div class="col-md-2 iitm-logo">
            <a href="{{URL::asset('/')}}"><img src="{{URL::asset('siteimages/logo.png')}}" class="site_logo"></a>            
							<!-- <img src="http://localhost/maths-iitm/siteimages/logo.png" class="site_logo"> -->
						</div>
						<div class="col-md-6 dept-name" style="padding: 10px 0px 0px 0px;">
							<a class="navbar-brand" href="index.html">DEPARTMENT OF MATHEMATICS <br>
              <span>Indian Institute Of Technology Madras</span></a>
						</div>
						<div class="col-md-4 d-md-flex justify-content-center mb-md-0 mb-3 searchbar">
							<form action="#" class="searchform order-lg-last">
								<div class="form-group d-flex">
									<input type="text" class="form-control pl-3" placeholder="Search">
									<button type="submit" placeholder="" class="form-control search"><span
											class="fa fa-search"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar">
			<div class="container-fluid" style="border-top: 1px solid; width: 1400px;">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
					aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav m-auto">
					<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">Home <b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a href="#" class="dropdown-item">About Us</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">People<b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<div class="third-dropdown-parent">
									<a href="facultymainpage.html" class="dropdown-item">Faculty<span>&#8250;</span></a>
									<div class="third-dropdown dropdown-menu-right">
										<a href="#" class="dropdown-item-third">Dropdown item 1</a>
										<a href="#" class="dropdown-item-third">Dropdown item 2</a>
										<a href="#" class="dropdown-item-third">Dropdown item 3</a>
									</div>
								</div>
								<a href="#" class="dropdown-item">Postdoc</a>
								<a href="#" class="dropdown-item">Visitors</a>
								<div class="third-dropdown-parent">
									<a href="#" class="dropdown-item">Students <span>&#8250;</span></a>
									<div class="third-dropdown dropdown-menu-right">
										<a href="#" class="dropdown-item-third">Dropdown item 10</a>
										<a href="#" class="dropdown-item-third">Dropdown item 11</a>
										<a href="#" class="dropdown-item-third">Dropdown item 12</a>
									</div>
								</div>
								<a href="#" class="dropdown-item">staffs</a>

							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">Academics<b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<div class="third-dropdown-parent">
									<a href="#" class="dropdown-item">Programs <span>&#8250;</span></a>
									<div class="third-dropdown dropdown-menu-right">
										<a href="#" class="dropdown-item-third">Dropdown item 10</a>
										<a href="#" class="dropdown-item-third">Dropdown item 11</a>
										<a href="#" class="dropdown-item-third">Dropdown item 12</a>
									</div>
								</div>
								<div class="third-dropdown-parent">
									<a href="#" class="dropdown-item">Courses <span>&#8250;</span></a>
									<div class="third-dropdown dropdown-menu-right">
										<a href="#" class="dropdown-item-third">Dropdown item 10</a>
										<a href="#" class="dropdown-item-third">Dropdown item 11</a>
										<a href="#" class="dropdown-item-third">Dropdown item 12</a>
									</div>
								</div>
								<a href="#" class="dropdown-item">Timetable</a>
								<a href="#" class="dropdown-item">Academic Rules</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">Research<b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a href="{{url('researchinfo')}}" class="dropdown-item">Research Areas</a>
								<a href="#" class="dropdown-item">Publications</a>
								<a href="#" class="dropdown-item">Books by Faculty</a>
								<a href="#" class="dropdown-item">Awards and <br>Recognitions</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">News & Events<b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
							<div class="third-dropdown-parent">
									<a href="#" class="dropdown-item">Events <span>&#8250;</span></a>
									<div class="third-dropdown dropdown-menu-right">
										<a href="#" class="dropdown-item-third">Dropdown item 10</a>
										<a href="#" class="dropdown-item-third">Dropdown item 11</a>
										<a href="#" class="dropdown-item-third">Dropdown item 12</a>
									</div>
								</div>
								<a href="#" class="dropdown-item">News</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">Careers<b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a href="#" class="dropdown-item">Faculty Positions</a>
								<a href="#" class="dropdown-item">Project Positions</a>
								<a href="#" class="dropdown-item">Staff Positions</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">Resources<b class="caret"></b></a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a href="#" class="dropdown-item">Links</a>
								<a href="#" class="dropdown-item">Documents</a>
								<a href="#" class="dropdown-item">Gallery</a>
								<a href="#" class="dropdown-item">Videos</a>
							</div>
						</li>
						<li class="nav-item"><a href="index.html" class="nav-link">Contact Us</a></li>
            <li>
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

					  </ul>
            </li>
            
            
				</div>
			</div>
		</nav>
	</div>
      <!-- new-navbar end -->
  

    


      <!-- Contents of page goes here -->

      <!-- Video sec -->
  <div class="fullsize-video-bg">
		<div class="video-sec">
			<div id="video-viewport">
				<video width="1600" height="450" autoplay muted loop>
					<source
						src="https://firebasestorage.googleapis.com/v0/b/react-projects-83889.appspot.com/o/applied-mec%2Fvideo%2Fvideo4.mp4?alt=media&token=87983182-2f01-4821-b4a4-90d18a2b7b6a"
						type="video/mp4" />
					<source
						src="https://firebasestorage.googleapis.com/v0/b/react-projects-83889.appspot.com/o/applied-mec%2Fvideo%2Fvideo4.mp4?alt=media&token=87983182-2f01-4821-b4a4-90d18a2b7b6a"
						type="video/webm" />
				</video>
				<div class="latest-news">
					<div class="card side-card mb-4">
						<div class="card-body">
							<h5 class="card-title">Upcoming News & Events</h5>
							<div class="ne-scroll">
								<div id="scroll-text">
									<div class="ne-box">
										<!-- <div class="ne-img">
											<img src="images/event-img.png" alt="...">
										</div> -->
										<div class="ne-item">
                      <?php
      $getallannouncements=News::orderBy('news_date','DESC')->where('news_publish','=','1')->where('news_archive','=','0')->where('news_type','=','2')->get();
      ?>
      @if(count($getallannouncements))
        @if(Request::url() != url('login'))
          <div class="container m-t-lg">
            <div class="col-sm-12" id="marqueeContainer">
              <div class="col-sm-12">
                <div id="marquee-author" class="marquee-author m-r font-bold"></div>       
              </div>        
              <ul id="marquee" class="col-sm-10">
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
											<div class="ne-desc"><a href="/pages/newsDetails?wId=15"> MS/PhD Selected
													Candidates
													- July 2022</a></div>
											<span class="ne-date"><i class="fa fa-calendar"></i>23-Jun-2022</span>
										</div>
									</div>
									<div class="ne-box">
										<div class="ne-img">
											<img src="images/event-img.png" alt="...">
										</div>
										<div class="ne-item">
											<div class="ne-desc"><a href="/pages/newsDetails?wId=15">MS/PhD Selected
													Candidates
													- July 2022</a></div>
											<span class="ne-date"><i class="fa fa-calendar"></i>23-Jun-2022</span>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-2" style="text-align: center;">
								<a href="/pages/moreNews" class="dep-btn" style="text-decoration: none;">More News </a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
  <!-- video-sec-end -->

  <!-- ABOUT DEPARTMENT -->

	<div class="mech-content">
		<div class="container">
			<div class="row" style="padding: 20px 0;">
				<div class="col-md-6 abt-btn">
					<div class="wrapper">
						<div class="button-box">
							<button type="button" class="btn-appl btn-15">Prospective Students</button>
							<button type="button" class="btn-appl btn-15">Prospective Faculty</button>
						</div>
						<div class="button-box">
							<button type="button" class="btn-appl btn-15">Current Students</button>
							<button type="button" class="btn-appl btn-15">Current Faculty</button>
						</div>
						<div class="button-box">
							<button type="button" class="btn-appl btn-15">Industry Engagement</button>
							<button type="button" class="btn-appl btn-15">Recruiters</button>
						</div>
					</div>
				</div>


				<div class="col-md-6">
					<h2 class="abt-deprt"><span class="app-line" style="color: #a00;">|</span> About the Department</h2>
					<p class="abt-content"></br>The Department of Mathematics offers a doctoral research program for motivated students interested in pursuing their career in mathematics - either academic or industry, as well as two post graduate programs namely M.Sc. in Mathematics and M.Tech in Industrial Mathematics and Scientific Computing.</p>
					<div class="button">
						<button type="button" class="dep-btn"><a href="images/department-brochure.pdf" target="_blank"
								style="color: #fff;text-decoration: none;">Department Brochure</a>
						</button>
					</div>
				</div>
			</div>
		</div>

  </div>

      <!-- abt - sec END -->

  <!-- HEAD OF DEPARTMENT -->


	<div class="msg-frm-HOD">
		<div class="container">
			<div class="row" style="padding: 40px 0;">
				<div class="col-md-7 hod-content">
					<h2 class="head-of-deprt"><span class="hod-line" style="color: #a00;">|</span> Message From the Head
						of Department</h2>
					<p class="head-content"></br>The Department of Applied Mechanics was established in 1959 and is one
						of the oldest departments in IIT Madras. We are a truly interdisciplinary department with a very
						strong research atmosphere and is the only department in IIT Madras with an exclusive focus on
						post-graduate students. At present, we have 28 faculty members, 3* post-doctoral fellows,
						approximately 125 PhD students, 60 MS scholars apart from about 30* M.Tech students on our
						rolls.
						</br></br> The Department has three broad groups – Biomedical Engineering, Fluid Mechanics and
						Solid Mechanics. However, the background of the faculty members are in as varied disciplines as
						Mechanical, Civil, Aerospace, Chemical, Electrical, Biomedical and Applied Physics and reflect
						the interdisciplinary nature of the Department.</p>
					<div class="button">
						<button type="button" class="hod-btn" data-toggle="modal" data-target="#modalDiscount">Read
							More</button>

						<!--Modal: modalDiscount-->
						<div class="modal fade right" id="modalDiscount" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
							<div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger"
								role="document">
								<!--Content-->
								<div class="modal-content">
									<!--Header-->
									<div class="modal-header">
										<h3 class="heading">About Us</h3>



										<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button> -->
									</div>

									<!--Body-->
									<div class="modal-body">

										<div class="row scrol-cont">
											<h3 class="mfh-heading">Message from HOD desk</h3>
											<p class="mfh-cont">
												The Department of Applied Mechanics was established in 1959 and is one
												of the oldest departments in IIT Madras. We are a truly
												interdisciplinary department with a very strong research atmosphere and
												is the only department in IIT Madras with an exclusive focus on
												post-graduate students. At present, we have 28 faculty members, 3*
												post-doctoral fellows, approximately 125 PhD students, 60 MS scholars
												apart from about 30* M.Tech students on our rolls.</br></br>

												The Department has three broad groups – Biomedical Engineering, Fluid
												Mechanics and Solid Mechanics. However, the background of the faculty
												members are in as varied disciplines as Mechanical, Civil, Aerospace,
												Chemical, Electrical, Biomedical and Applied Physics and reflect the
												interdisciplinary nature of the Department. This is reflected on the
												diverse research state-of-art laboratories that exist in the Department
												some of which are listed below:
											<div class="lists-hod">
												<ul>
													<li class="mfh-list">Active Material Structures & Systems Lab</li>
													<li class="mfh-list">Bioelectronics Lab</li>
													<li class="mfh-list">Biomedical Ultrasound Lab</li>
													<li class="mfh-list">Biophotonics Lab</li>
													<li class="mfh-list">Biosensors Lab</li>
													<li class="mfh-list">Cell Mechanics Lab</li>
													<li class="mfh-list">Computational Fluid Dynamics Lab</li>
													<li class="mfh-list">Digital Photomechanics Lab</li>
													<li class="mfh-list">Fatigue and Fracture Lab</li>
													<li class="mfh-list">Laser based diagnostics Lab</li>
													<li class="mfh-list">Multiphase flow Lab</li>
													<li class="mfh-list">Nano Mechanics and Nano Materials Lab</li>
													<li class="mfh-list">Neuromechanics Lab</li>
													<li class="mfh-list">Non-invasive Imaging & Diagnostics Lab</li>
													<li class="mfh-list">Smart Materials Lab</li>
													<li class="mfh-list">Thermo Fluid Dynamics Lab</li>
													<li class="mfh-list">Touch Lab</li>
													<li class="mfh-list">The Uncertainty Lab</li>
													<li class="mfh-list">Vibration Control and Harvesting Lab</li>
													<li class="mfh-list">Micro and Nano-scale Transport Lab</li>

												</ul>
											</div>
											<div class="mfh-cont">
												Our faculty are actively involved in research collaborations with
												government research labs, industrial partners from India and abroad as
												well as with universities in India and abroad and have taken up quite a
												few multi-disciplinary, multi-institutional projects, large theme
												projects as well as CII supported projects. Our faculty and research
												scholars publish in leading peer reviewed international journals and are
												being recognized for their academic and research contributions through
												awards and membership in professional societies. Our faculty and alumni
												serve in various committees of national importance.</br></br>

												Admission to the research program – MS and PhD is primarily in the July
												session with few intakes in the January session as well. There are
												provisions for upgrading to PhD from M.Tech and MS which quite a few
												students have availed in the recent past. The newly introduced Direct
												PhD program (including the 7th semester intake) is now the preferred
												choice for bright students interested in pursuing research as a career.
												We are constantly looking for students who want to take up challenging
												projects and contribute.</br></br>

												I invite you to browse through the Department webpage to know more about
												our activities and expertise. If you are from industry and are seeking
												expert help, feel free to write to me or to the concerned faculty.
												Students interested in joining the Department can directly write to the
												concerned faculty for more information about admission
												procedure.</br></br>

												We also invite all our alumini to visit our department whenever you
												happened to be in the city. You can contribute to the alma matter in
												terms of supporting our research scholar (scholarship & travel to
												research lab/workshop/conference), equipment funding, exclusive
												building.You can also greatly help us by directing potential employers
												to recruit our graduates.
											</div>


										</div>
									</div>

									<!--Footer-->
									<div class="modal-footer">
										<p class="prof"><b>Prof.Robinson R.G</b></br>
											Head of the Department BSB110,Building Science Block
											Department of Applied Mechanics</p>


									</div>
								</div>
								<!--/.Content-->
							</div>
						</div>
						<!--Modal: modalDiscount-->
					</div>
				</div>
				<div class="col-md-5">
					<div class="hod-image">
						<img src="{{URL::asset('siteimages/homepage/Maths-HOD.png')}}" class="hod-img">
					</div>
				</div>


			</div>
		</div>
  </div>

  <!-- END -->

  <!-- image section -->

	<div class="hero-deer" style="background: -webkit-linear-gradient(0deg, rgba(236, 196, 124, 0.7), rgba(236, 196, 124, 0.7)), url('./siteimages/homepage/deer-sec.png');">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-3 home-counters">
					<div class="counter">

						<div class="counter-content">
							<span class="counter-value">43</span>
							<h3 class="counter-hdng">Faculty</h3>
						</div>
					</div>
				</div>
        
				<div class="col-md-3 home-counters">
					<div class="counter">

						<div class="counter-content">
							<span class="counter-value">5</span>
							<h3 class="counter-hdng">Staff</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3 home-counters">
					<div class="counter blue">

						<div class="counter-content">
							<span class="counter-value">964</span>
							<h3 class="counter-hdng">Publications</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3 home-counters">
					<div class="counter">

						<div class="counter-content">
							<span class="counter-value">50</span>
							<h3 class="counter-hdng">Projects</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3 home-counters">
					<div class="counter">
						<div class="counter-content">
							<span class="counter-value">120</span>
							<h3 class="counter-hdng">Postgraduate Students</h3>
						</div>
					</div>
				</div>
        <div class="col-md-3 home-counters">
					<div class="counter">
						<div class="counter-content">
							<span class="counter-value">119</span>
							<h3 class="counter-hdng">PhD Research Scholars</h3>
						</div>
					</div>
				</div>
        <div class="col-md-3 home-counters">
					<div class="counter">
						<div class="counter-content">
							<span class="counter-value">150</span>
							<h3 class="counter-hdng">Post Doctoral Fellows</h3>
						</div>
					</div>
				</div>
        <div class="col-md-3 home-counters">
					<div class="counter">
						<div class="counter-content">
							<span class="counter-value">2</span>
							<h3 class="counter-hdng">Exchange Students</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

  </div>
  <!-- END -->

  <!-- Research Areas -->
	<div class="Resrch" style="padding-bottom: 40px;">
		<div class="container">
			<div class="row" style="padding: 10px 0;">
				<h2 class="reserch-headng"><span class="resrch" style="color: #a00; ">|</span> Research Areas</h2>
			</div>
			<div class="row rearch-img">
				<div class="col-md-4 research-col">
					<img src="{{URL::asset('siteimages/homepage/RA1.png')}}" class="imags-1">
					<div class="centered">Algebra and Number Theory</div>
					<div class="overlay-solid">
						<div class="centered-text">Algebra and Number Theory</div>
					</div>
				</div>

				<div class="col-md-4 research-col">
					<img src="{{URL::asset('siteimages/homepage/RA2.png')}}" class="imags-1">
					<div class="centered">Analysis and Linear Algebra</div>
					<div class="overlay-fluid">
						<div class="centered-text">Analysis and Linear Algebra</div>
					</div>
				</div>

				<div class="col-md-4 research-col">
					<img src="{{URL::asset('siteimages/homepage/RA3.png')}}" class="imags-1">
					<div class="centered">Combinatorics and Theoretical Computer Science</div>
					<div class="overlay-biomedical">
						<div class="centered-text" style="padding: 0;">Combinatorics and Theoretical Computer Science</div>
					</div>
				</div>

        <div class="col-md-4 research-col">
					<img src="{{URL::asset('siteimages/homepage/RA4.png')}}" class="imags-1">
					<div class="centered">Differential Equations and Applied Mathematics</div>
					<div class="overlay-biomedical">
						<div class="centered-text" style="padding: 0;">Differential Equations and Applied Mathematics</div>
					</div>
				</div>

        <div class="col-md-4 research-col">
					<img src="{{URL::asset('siteimages/homepage/RA5.png')}}" class="imags-1">
					<div class="centered">Geometry and Topology</div>
					<div class="overlay-biomedical">
						<div class="centered-text" style="padding: 0;">Geometry and Topology</div>
					</div>
				</div>

        <div class="col-md-4 research-col">
					<img src="{{URL::asset('siteimages/homepage/RA6.png')}}" class="imags-1">
					<div class="centered">Probability and Statistics</div>
					<div class="overlay-biomedical">
						<div class="centered-text" style="padding: 0;">Probability and Statistics</div>
					</div>
				</div>

			</div>

		</div>

  </div>
  <!-- END -->

  <!-- Faculty achievement -->

	<div class="fac-achvmnt"
		style="background: url(./siteimages/homepage/deer-joom.png); background-size: cover; background-position: bottom;">

		<div class="container">
			<div class="row" style="padding: 10px 0; justify-content:center;">
				<h3 class="fac-headng">Faculty Achievement</h3>
			</div>

			<div class="row justify-content-center" style="padding: 20px 0;">
				<div class="col-md-6">
					<div class="faculty-achievement-info">
						<div class="faculty-Achievement-details">
							<p>Mentor for the team “Horizon” was ranked 3rd in
								the top three designs, among 16 team across India.
							</p>
							<hr class="faculty-red-line">
							<h3>Prof. Krishnamurthy C V</h3>
							<h5>Professor</h5>
						</div>
						<div class="faculty-Achievement-image">
							<img src="images/Rectangle 129.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
  </div >
  <!-- END -->

  <!-- News -->
  <div class="news" style="padding: 15px 0;">
		<div class="container">
			<div class="row" style="padding: 20px 0;">
				<h2 class="abt-deprt"><span class="app-line" style="color: #a00;">|</span> News</h2>
			</div>
		</div>

		<div class="row fac-achv">
			<div class="col-md-4 fac-news">
				<div class="card">
					<img class="card-img-top" img src="images/new1.png" alt="Card image cap">
					<div class="card-body">
						<h3>Guru Dhwani Design Antenna Challenge - 2011</h3>
						<p><b>Prof. Krishnamurthy C V</b><br>
							mentor for the team “Horizon” was ranked 3rd
							in the top three designs, among 16 teams across india</p>
						<div class="news-readmore">
							<a href="#"><button>Read More >></button></a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-4 fac-news">
				<div class="card">
					<img class="card-img-top" img src="images/new2.png" alt="Card image cap">
					<div class="card-body">
						<h3>Prof. V. Balakrishnan Institute Chair endowment</h3>
						<p><b>DR. Satish Ramakrishna (EE 1987) </b><br></p>
						was launched on Friday 15 July 2022 by the
						office of Alumni and Corporate Relation, IITM</p>
						<div class="news-readmore">
							<a href="#"><button>Read More >></button></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 fac-news">
				<div class="card">
					<img class="card-img-top" img src="images/new3.png" alt="Card image cap">
					<div class="card-body">
						<h3>First Prize at the INAE - SERB</h3>
						<p><b>Ayan Kumar Nai (PH20D047)</b><br>
							working with Dr. Sivarama Krishnan, was awarded the
							first prize at the INAE - SERB</p>
						<div class="news-readmore">
							<a href="#"><button>Read More >></button></a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="news-button">
					<button type="button" class="news-btn" data-toggle="modal" data-target="#modalDiscount">Read
						More</button>
				</div>
			</div>
		</div>
   </div>
   <!-- END -->

   <!-- student achievement -->
	<div class="fac-achvmnt"
		style="background: url(./siteimages/homepage/student-sec.png); background-size: cover; background-position: bottom;">

		<div class="container">
			<div class="row" style="padding: 10px 0; justify-content:center;">
				<h3 class="fac-headng">Student Achievement</h3>
			</div>

			<div class="row justify-content-center" style="padding: 20px 0;">
				<div class="col-md-6">
					<div class="faculty-achievement-info" style="justify-content: center;">
						<div class="faculty-Achievement-details">
							<p>First prize at the INAE - SERB
							</p>
							<hr class="faculty-red-line">
							<h3>Ayan Kumar Nai (PH20D047)</h3>

						</div>
						<!-- <div class="faculty-Achievement-image">
						<img src="images/Rectangle 129.png" alt="">
					</div> -->
					</div>
				</div>
			</div>
		</div>
  </div>
  <!-- END -->

  <!-- events -->
  <div class="calendar">
		<div class="container">
			<div class="row" style="padding: 20px 0;">
				<h2 class="abt-deprt"><span class="app-line" style="color: #a00;">|</span> Event Calendar</h2>
			</div>
			<div class="row" style="padding: 5px 0px 20px 0px;">
				<div class="blog-home2 py-2">
					<div class="container">
						<!-- Row  -->
						<div class="row">
							<!-- Column -->
							<div class="col-md-4 on-hover">
								<div class="card border-0 mb-4">
									<a href="#"><img class="card-img-top"
											src="https://firebasestorage.googleapis.com/v0/b/react-projects-83889.appspot.com/o/applied-mec%2Fimage%2Fevent1.png?alt=media&token=6b32d437-3444-4eef-81eb-ad7b75c000c8"
											alt="wrappixel kit"></a>
									<div
										class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
										Oct<span class="d-block">24</span></div>
									<h5 class="font-weight-medium mt-3"><a href="#"
											class="text-decoration-none link">Celebrating the birth anniversary of Mathematics Genius Srinivasa Ramanujan</a></h5>
									<p class="mt-3">IIT-Madras, Opp. Anna Uiversity, Chennai, TN</p>
									<a href="#" class="text-decoration-none linking text-themecolor mt-2">Learn More</a>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-4 on-hover">
								<div class="card border-0 mb-4">
									<a href="#"><img class="card-img-top"
											src="https://firebasestorage.googleapis.com/v0/b/react-projects-83889.appspot.com/o/applied-mec%2Fimage%2Fevent2.png?alt=media&token=d3dd5520-57db-4eb2-840e-84bf301efbab"
											alt="wrappixel kit"></a>
									<div
										class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
										Oct<span class="d-block">23</span></div>
									<h5 class="font-weight-medium mt-3"><a href="#"
											class="text-decoration-none link">Celebrating the birth anniversary of Mathematics Genius Srinivasa Ramanujan</a></h5>
									<p class="mt-3">IIT-Madras, Opp. Anna Uiversity, Chennai, TN</p>
									<a href="#" class="text-decoration-none linking text-themecolor mt-2">Learn More</a>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-4 on-hover">
								<div class="card border-0 mb-4">
									<a href="#"><img class="card-img-top"
											src="https://firebasestorage.googleapis.com/v0/b/react-projects-83889.appspot.com/o/applied-mec%2Fimage%2Fevent3.png?alt=media&token=c3770806-cda4-4990-b87d-7bfb7512f703"
											alt="wrappixel kit"></a>
									<div
										class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
										Oct<span class="d-block">23</span></div>
									<h5 class="font-weight-medium mt-3"><a href="#"
											class="text-decoration-none link">Celebrating the birth anniversary of Mathematics Genius Srinivasa Ramanujan.</a></h5>
									<p class="mt-3">IIT-Madras, Opp. Anna Uiversity, Chennai, TN</p>
									<a href="#" class="text-decoration-none linking text-themecolor mt-2">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
  </div>
  <!-- end -->

</section>

  <!-- footer -->

	<footer class="footer-bg">
		<div class="container" style="padding:50px 0;">
			<div class="row">
				<div class="col-md-4 footer-first">
					<hr class="solid">
				</div>
				<div class="col-md-4">
					<div class="footer-social">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-instagram"></a>
						<a href="#" class="fa fa-linkedin"></a>
						<a href="#" class="fa fa-envelope"></a>
						<a href="#" class="fa fa-youtube-play"></a>
					</div>
				</div>
				<div class="col-md-4 footer-first">
					<hr class="solid">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="iitm-footer-logo">
						<img src="{{URL::asset('siteimages/homepage/footer/footer-logo2.png')}}" style="width: 60%;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="iitm-footer-logo">
						<img src="{{URL::asset('siteimages/homepage/footer/footer-words.png')}}" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr class="solid-second">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="footer-bottom-left">
						<h6>Department of Mathematics<br>
							Indian Institute of Technology Madras<br>
							Chennai, Tamil Nadu, India.<br>
							PIN-Code : 600036</h6>
					</div>

				</div>
				<div class="col-md-6">
					<div class="footer-bottom-right">
						<h6><span>Phone:</span> +91 44 2257 4050/4051<br>
							<span>Fax:</span> +91-44-22574052<br>
							<span>Email:</span> amhead[at]iitm[.]ac[.]in
						</h6>
					</div>
					<div class="copyrights">
						<h6>© 2023-All rights reserved. Department of Mathematics || Website Credits </h6>
					</div>
				</div>
			</div>

		</div>


	</footer>

  <!-- end -->

  

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
      <!-- skillskapes - JS -->
      <script type='text/javascript' src="{{URL::asset('js/skillskapes.js')}}"></script> 

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
