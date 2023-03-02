<ul class="nav">
@if(Auth::user()->isadmin==1)
  <li class="nav-link">
    <a href="{{url('admin/report')}}">
      <i class="fa fa-bar-chart-o"></i>
      <span>Report</span>
    </a>
  </li>

  <li class="nav-link">
    <a href="{{url('admin/home')}}">                            
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->people==1 || Auth::user()->issuper==1))
  <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>
      <i class="fa fa-user"></i>
      <span>People</span>
    </a>
    <ul class="nav none dker">
      <?php 
        $getusertype=Usertype::all();
      ?>
      @foreach($getusertype as $val)
      <li class="nav-link">
        <a href="{{url('admin/people/'.$val->link)}}">{{$val->user_type_name}}</a>
      </li>
      @endforeach
      <li class="nav-link">
        <a href="{{url('admin/user/create')}}">+ Add People</a>
      </li>
      <!-- <li class="nav-link">
        <a href="{{url('admin/usertype/create')}}">+ Add Category</a>
      </li> -->
      <!--
      <li class="nav-link">
        <a href="{{url('admin/people/staff')}}">Staff</a>
      </li> -->

    </ul>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->student==1 || Auth::user()->issuper==1))
  <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>
      <i class="fa fa-male"></i>
      <span>Students</span>
    </a>
          
    <ul class="nav none dker" id="studentprogramslist">
      <?php 
        $getallstudprog=Programs::where('disable_students', '=', 0)->get();
      ?>
      @foreach($getallstudprog as $val)
        <li class="nav-link">
          <a href="{{url('admin/student/showstudents/'.$val->id)}}">{{$val->program_name}}</a>
        </li>
      @endforeach
      <li class="nav-link">
        <a href="{{url('admin/student/addstudent')}}">+ Add Student(s)</a>
      </li>
    </ul>    
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->research==1 || Auth::user()->issuper==1))
  <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>                           
      <i class="fa fa-book"></i>
      <span>Research</span>
    </a>
    <ul class="nav none dker">                
      <li class="nav-link">
        <a href="{{url('admin/research/researcharea')}}" id="researchAreaLink">Research Area</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/research/researchgroups')}}" id="researchGroupLink">Research Groups</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/research/recentpublications')}}">Recent Publications</a>
      </li>                                          
    </ul>
  </li>
  <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>                           
      <i class="fa fa-book"></i>
      <span>Publications</span>
    </a>
    <ul class="nav none dker">                
      <li class="nav-link">
        <a href="{{url('admin/publications/managepublications')}}">Publications</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/publications/addpublications')}}">+ Add Publlications</a>
      </li>                                         
    </ul>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->programs==1 || Auth::user()->issuper==1))
  <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>
      <i class="fa fa-bars"></i>
      <span>Programs</span>
    </a>
    <ul class="nav none dker" id="programslist">
      <?php 
        $getallprog=Programs::all();
      ?>
      @foreach($getallprog as $val)
        <li class="nav-link">
          <a href="{{url('admin/programs/showprogramdetails/'.$val->id)}}">{{$val->program_name}}</a>
        </li>
      @endforeach

      <li class="nav-link">
        <a href="{{url('admin/programs/addprogram')}}">+ Add Program</a>
      </li>
    </ul>

  </li>
  <li class="nav-link">
    <a href="{{url('admin/othercourses/manage')}}">
      <i class="fa fa-book"></i>
      <span>Other Courses</span>
    </a>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->events==1 || Auth::user()->issuper==1))
  <li>
    <a href="#">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>
      <i class="fa fa-calendar"></i>
      <span>Events</span>
    </a>
    <ul class="nav none dker" id="eventslist">
      <?php $getallevents=Eventcategory::orderBy('updated_at','DESC')->get(); ?> 
      @foreach($getallevents as $val)
        <li class="nav-link">
          <a href="{{url('admin/events/details/'.$val->id)}}">{{$val->events_type_name}}</a>
        </li>
      @endforeach     

      <li class="nav-link">
        <a href="{{url('admin/events/create')}}">+ Add Event</a>
      </li>

      <li class="nav-link">
        <a href="{{url('admin/events/createeventcat')}}">+ Add Event Category</a>
      </li>

      <!-- <li class="nav-link">
        <a href="{{url('admin/events/meetings')}}">Meetings</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/events/seminars')}}">Seminars</a>
      </li> -->

    </ul>
  </li>
  @endif
@if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->resources==1 || Auth::user()->issuper==1))

  <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>                            
      <i class="fa fa-folder text"></i>
      <i class="fa fa-folder-open text-active"></i>
      <span>Resource</span>
    </a>
    <ul class="nav none dker">                
      <li class="nav-link">
        <a href="{{url('admin/resources/links')}}">Links</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/resources/docs')}}">Documents</a>
      </li>
      <li class="nav-link" id="gotoGallery">
        <a href="{{url('admin/resources/managegallery')}}">Gallery</a>
      </li>      
      <li class="nav-link">
        <a href="{{url('admin/resources/videos')}}">Videos</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/resources/conferencehalls')}}">Conference Halls</a>
      </li>
      <!-- <li class="nav-link">
        <a href="{{url('admin/resource/department-brochure')}}">Department Brochure</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/resource/useful-informations')}}">Useful Information</a>
      </li>
      <li class="nav-link">
        <a href="{{url('admin/resource/gallery')}}">Gallery</a>
      </li> -->
    </ul>
  </li>
  <li class="nav-link">
    <a href="{{url('admin/slider/viewall')}}">
      <i class="fa fa-envelope-o"></i>
      <span>Slider</span>
    </a>
  </li>
  @endif
  
  <!-- <li>
    <a href="#" class="dropdown-toggle">
      <span class="pull-right auto">
        <i class="fa fa-angle-down text"></i>
        <i class="fa fa-angle-up text-active"></i>
      </span>                            
      <i class="fa fa-folder text"></i>
      <i class="fa fa-folder-open text-active"></i>
      <span>Booking Management</span>
    </a>
    <ul class="nav none dker">                
      <li class="nav-link">
        <a href="{{-- {{url('admin/booking/pendingbooking')}} --}}">Pending Request</a>
      </li>
      <li class="nav-link">
        <a href="{{-- {{url('admin/booking/bookinghistory')}} --}}">Booking History</a>
      </li>
    </ul>    
  </li> -->
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->bookings==1 || Auth::user()->issuper==1))
  <li class="nav-link">
    <a href="{{url('admin/booking/bookings')}}">
      <i class="fa fa-calendar"></i>
       Bookings
    </a>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->newannouncement==1 || Auth::user()->issuper==1))
  <li class="nav-link">
    <a href="{{url('admin/news/shownews')}}">
      <i class="fa fa-bullhorn"></i>
      <span>News / Announcements</span>
    </a>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->resources==1 || Auth::user()->issuper==1))
  <li class="nav-link">
    <a href="{{url('admin/contact/contactdetails')}}">
      <i class="fa fa-envelope-o"></i>
      <span>Contact Info</span>
    </a>
  </li>
  @endif
  @if((Auth::user()->isadmin==1)&&(Auth::user()->userprivileg->createadmin==1 || Auth::user()->issuper==1))
  <li class="nav-link">
    <a href="{{url('admin/changepermission')}}">
      <i class="fa fa-gear"></i>
      <span>User privileges</span>
    </a>
  </li>
  @endif
  <!-- <li class="nav-link">
    <a href="{{url('admin/settings')}}">
      <i class="fa fa-gear"></i>
      <span>Settings</span>
    </a>
  </li> -->
</ul>
