@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Add New People| DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}" class="link"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/people')}}" class="link"><i class="fa fa-user"></i> People</a></li>
    <li class="active"> Add New People</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Add People
    </header>
    
    <div class="panel-body">
      <div class="col-sm-12">
        <form role="form" class="form-horizontal" method="post" action="{{url('admin/user')}}" id="addnewpeople">
          <div class="form-group">
            <label class="col-lg-2 control-label">Select a Type</label>
            <div class="col-lg-10">
              <select class="form-control" name="usertype" id="usertype" required>
                <option value="0">-- Select a Type --</option>
                <?php
                  $getAllusertype=Usertype::all();
                ?>
                @foreach($getAllusertype as $val)
                  <option value="{{$val->link}}">{{$val->user_type_name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Pick a Title</label>
            <div class="col-lg-10">
              <select class="form-control" name="usertitle" required>
                <option value="0">-- select a Title --</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Dr.">Dr.</option>
                <option value="Prof.">Prof.</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">First Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="fname" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Last Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="lname" required>
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input type="email" class="form-control" name="email" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Designation</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="designation" required>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-2 control-label">Office</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="office" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Phone</label>
            <div class="col-lg-10">
              <input type="text" data-rangelength="[5,10]" class="form-control" name="phone" required>
            </div>
          </div>
          
          <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Sex</label>
            <div class="col-sm-10">
              <label class="radio-inline">
                <input type="radio" name="sex" value="Male" required> Male
              </label>
              <label class="radio-inline">
                <input type="radio" name="sex" value="Female"> Female
              </label>              
            </div>
          </div> -->

          <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Date of Birth</label>
            <div class="col-sm-10">
              <input class="input-sm input-s datepicker-input form-control" size="16" type="text" value="12-02-2013" data-date-format="dd-mm-yyyy" >
            </div>
          </div> -->

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Reset</button>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add People</button>
              </div>
          </div>
          
        </form>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">

  </script>
@stop