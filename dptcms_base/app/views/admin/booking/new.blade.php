@extends('admin.layouts.main')

@section('header-title')
    <title>Admin Panel - New Bookings | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
    <ul class="breadcrumb">
      <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="{{url('admin/booking/bookings')}}"><i class="fa fa-calendar"></i> Booking</a></li>
      <li class="active">New Booking</li>
    </ul>
    <section class="panel">    
      <header class="panel-heading font-bold">
          New Booking
      </header>
      <div class="panel-body">
        <div class="col-sm-6" style="padding: 30px;">
          <form role="form" method="post" action="{{url('booking/create/0')}}" id="createBooking" style="padding:10px;border-radius: 4px;">    
          <h4 class="dpt-text-dark" style="margin: 0px;">Room Booking</h4>
              <div style="padding-top: 20px;">
                <div class="form-group">
                  <label for="">Available Rooms</label>
                  <select class="form-control" name="whichhall" id="whichhall" required>
                    <option value="0"> --- select --- </option>
                    <?php $getHalldetails=Conferencehall::all(); ?>
                    @foreach($getHalldetails as $val)
                      <option value="{{$val->id}}">{{$val->conference_halls_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Event's Name</label>
                  <input type="text" class="form-control" name="bookingreason" required/>
                </div>
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="text" class="form-control" name="from" id="bookfrom" readonly="true" data-date-format="DD-MM-YYYY" required>
                  </div>
                <div class="form-group">
                  <label for="">Time From</label>
                  <input type="text" class="form-control" name="timefrom" id="timefrom" readonly="true" data-date-format="HH:mm" required>
                  <label for="">Time To </label>
                  <input type="text" class="form-control" name="timeto" id="timeto" readonly="true" data-date-format="HH:mm">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm-6" style="padding: 30px;">
          <h4 class="dpt-text-dark">Room's Booking Status</h4>
              <table class="table table-striped m-b-none text-sm">
                <thead>
                  <tr class="dpt-text-dark">
                    <th>Hall Name</th>
                    <th>Booked Date</th>
                    <th>Event Name</th>
                    <th>Booked By</th> 
                  </tr>
                </thead>
                <tbody id="listroomsavailability">
                  @foreach($getHalldetails as $val)

                  <?php $getbooking=Booking::where('booking_hall_id','=',$val->id)->where('booking_status','=',1)->where('booking_hall_from','>=',date('d-m-Y'))->get();?>
                  @if(count($getbooking))
                  <tr>                    
                    <td>{{$val->conference_halls_name}}</td>
                    <td colspan="3" style="padding: 0px;">
                        <table>
                          @foreach($getbooking as $eachbooking)
                              <tr>
                                <td style="padding: 2px;">
                                  <span class="badge bg-danger" style="font-weight: normal;margin: 2px;">
                                      {{'Date : '.$eachbooking->booking_hall_from}}<br/><br/>{{'Time : '.$eachbooking->timefrom.' '.$eachbooking->timeto}}
                                  </span>
                                </td>
                                <td style="padding: 5px;">
                                  <span style="">{{$eachbooking->booking_reasone}}</span>
                                </td>
                                <td style="padding: 5px;">
                                  <span style=""><a href="{{url($eachbooking->user->user_namehandle)}}" target="_blank">{{$eachbooking->user->user_fname.' '.$eachbooking->user->user_lname}}</a></span>
                                </td>
                              </tr>
                          @endforeach                  
                        </table>                
                    </td>
                  </tr>
                  @else
                  <tr>
                    <td>{{$val->conference_halls_name}}</td>
                    <td colspan="3">
                      There are currently no bookings for this hall
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </section>
  </div>
@stop

@section('footer-scripts')
@parent
<script type="text/javascript">
  var indexpath="{{url('/')}}";
</script>
@stop