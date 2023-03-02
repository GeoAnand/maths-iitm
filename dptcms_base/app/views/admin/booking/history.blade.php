@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Create an Event| DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
    <ul class="breadcrumb">
      <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="{{url('admin/booking/bookings')}}"><i class="fa fa-calendar-o"></i>Booking</a></li>
      <li class="active">Booking History</li>
    </ul>
    <section class="panel">    
      <header class="panel-heading font-bold">
          Approved Booking History
      </header>
      <div class="panel-body">
        <div class="col-sm-12">
          <h5 style="display:inline" class="pull-right">Total : ({{count($getallbooking)}})</h5>
          @if(count($getallbooking))
                      <table class="table table-striped m-b-none text-sm">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Booking Reason</th>
                              <th>Hall Name</th>                    
                              <th>Date & Time</th>
                              <th>Done By</th>
                              <th></th>
                          </tr>
                        </thead>
                        <tbody id="studentlistbyyear">
                        <?php $i=1; ?>                        
                            @foreach($getallbooking as $val)
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
                                   <a href="#" class="deletebooking" data-id="{{$val->id}}" title="Remove from log"><i class="fa fa-times-circle-o fa-2x"></i></a>
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
    </section>    
  </div>
  <script type="text/javascript">
   
  </script>

@stop