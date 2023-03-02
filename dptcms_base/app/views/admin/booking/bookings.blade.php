@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Bookings | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
    <ul class="breadcrumb">
      <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="{{url('admin/booking/bookings')}}"><i class="fa fa-calendar"></i> Booking</a></li>
      <li class="active">All Bookings</li>
    </ul>
    <section class="panel">    
      <!-- <header class="panel-heading font-bold">
          Pending Booking Requests
      </header> -->

      	<header class="panel-heading text-right bg-light">
	        <ul class="nav nav-tabs pull-left" id="bookingTabs">
		      	<li class="active"><a href="#activeBookings" data-toggle="tab" class="tab-with-btn-sm">Bookings</a></li>		    
				<li class=""><a href="#canceledBookings" data-toggle="tab" class="tab-with-btn-sm">Canceled Bookings</a></li>			
		    </ul>
		    <a href="{{url('admin/booking/newbooking')}}" class="btn btn-sm btn-info create-booking-btn"><i class="fa fa-plus"></i> New Booking</a>
		</header>

      <div class="panel-body">
      	<div class="tab-content m-t" id="bookingList">
      		<div class="tab-pane fade active in" id="activeBookings">
      			<div class="col-sm-12">
		          <h5 style="display:inline" class="pull-right">Total : ({{count($getAllactivebookings)}})</h5>
		          @if(count($getAllactivebookings))
		                      <table class="table table-striped m-b-none text-sm">
		                        <thead>
		                          <tr>
		                              <th>#</th>
		                              <th>Purpose</th>
		                              <th>Hall Name</th>                    
		                              <th>Date & Time</th>
		                              <th>Booked By</th>
		                              <th></th>
		                          </tr>
		                        </thead>
		                        <tbody id="studentlistbyyear">
		                        <?php $i=1; ?>                        
		                            @foreach($getAllactivebookings as $val)
		                              <tr>                    
		                                  <td>
		                                  {{$i}} 
		                                  </td>
		                                  <td>
		                                    {{$val->booking_reasone}}
		                                  </td>
		                                  <td>
		                                    {{$val->conferencehall['conference_halls_name']}}
		                                  </td>
		                                  <td>
		                                    {{$val->booking_hall_from.' Time '.$val->timefrom.' '.$val->timeto}}
		                                  </td>
		                                  <td>
		                                    <a href="{{url($val->user->user_namehandle)}}" target="_blank">{{$val->user->user_fname.' '.$val->user->user_lname}}</a>
		                                  </td>
		                                  <td>
		                                   <!-- <a href="#" class="verifybooking" data-id="{{$val->id}}" title="Mark as Verify"><i class="fa fa-check-circle-o fa-2x"></i></a>
		                                   <a href="#" class="deletebooking" data-id="{{$val->id}}" title="Remove from log"><i class="fa fa-times-circle-o fa-2x"></i></a> -->
		                                   <a href="#" class="cancelbooking btn btn-xs btn-danger" data-id="{{$val->id}}" title="Cancel Booking"><i class="fa fa-times"></i> Cancel</a>
		                                  </td>
		                              </tr>
		                              <?php $i++ ?>
		                            @endforeach
		                        </tbody>
		                      </table>
		          @else
		            No result found !
		          @endif
		        </div>
      		</div>

      		<div class="tab-pane fade" id="canceledBookings">
      			<div class="col-sm-12">
		          <h5 style="display:inline" class="pull-right">Total : ({{count($getAllcanceledbookings)}})</h5>
		          @if(count($getAllcanceledbookings))
		                      <table class="table table-striped m-b-none text-sm">
		                        <thead>
		                          <tr>
		                              <th>#</th>
		                              <th>Purpose</th>
		                              <th>Hall Name</th>                    
		                              <th>Date & Time</th>
		                              <th>Booked By</th>
		                              <!-- <th></th> -->
		                          </tr>
		                        </thead>
		                        <tbody id="studentlistbyyear">
		                        <?php $i=1; ?>                        
		                            @foreach($getAllcanceledbookings as $val)
		                              <tr>                    
		                                  <td>
		                                  {{$i}} 
		                                  </td>
		                                  <td>
		                                    {{$val->booking_reasone}}
		                                  </td>
		                                  <td>
		                                    {{$val->conferencehall['conference_halls_name']}}
		                                  </td>
		                                  <td>
		                                    {{$val->booking_hall_from.' Time '.$val->timefrom.' '.$val->timeto}}
		                                  </td>
		                                  <td>
		                                    <a href="{{url($val->user->user_namehandle)}}" target="_blank">{{$val->user->user_fname.' '.$val->user->user_lname}}</a>
		                                  </td>
		                                  <!-- <td> -->
		                                   <!-- <a href="#" class="verifybooking" data-id="{{$val->id}}" title="Mark as Verify"><i class="fa fa-check-circle-o fa-2x"></i></a>
		                                   <a href="#" class="deletebooking" data-id="{{$val->id}}" title="Remove from log"><i class="fa fa-times-circle-o fa-2x"></i></a> -->
		                                   <!-- <a href="#" class="activatebooking btn btn-xs btn-danger" data-id="{{$val->id}}" title="Cancel Booking"><i class="fa fa-times"></i> Cancel</a> -->

		                                  <!-- </td> -->
		                              </tr>
		                              <?php $i++ ?>
		                            @endforeach
		                        </tbody>
		                      </table>
		          @else
		            No result found !
		          @endif
		        </div>
      		</div>
      	</div>

	        
      </div>
    </section>    
  </div>
  <script type="text/javascript">
   
  </script>

@stop