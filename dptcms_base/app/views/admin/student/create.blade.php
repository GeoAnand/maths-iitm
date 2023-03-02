@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Add New Student| DeptCMS</title>
@stop

@section('content')
<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/student/dashboard')}}"><i class="fa fa-male"></i> Student</a></li>
    <li class="active"> Add New Student</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Add Student
    </header>
    
    <div class="panel-body">
      <div class="col-sm-12">
        <form role="form" class="form-horizontal" method="post" action="{{url('admin/student/addstudent')}}" id="addnewstudent">
          <div class="form-group">
            <label class="col-lg-2 control-label">Select a Program</label>
            <div class="col-lg-10">
              <select class="form-control" name="whichprogram" id="whichprogram" required>
                <option value="0">-- Select a Program --</option>
                <?php
                  $getAllprogram=Programs::where('disable_students', '=', 0)->get();
                ?>
                @foreach($getAllprogram as $val)
                  <option value="{{$val->id}}">{{$val->program_name}}</option>
                @endforeach
              </select>
            </div>
          </div>          

          <div class="form-group">
            <label class="col-lg-2 control-label">Student Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="stname" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Roll Number</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="stroll" required>
            </div>
          </div>

          <div class="form-group hide" id="styear">
            <label class="col-lg-2 control-label">Year</label>
            <div class="col-lg-10">
              <select class="form-control" name="styear" id="selectYear">
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
              </select>
            </div>
          </div>
         
          <!-- <div class="form-group">
            <label class="col-lg-2 control-label">Year</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="styear" required>
            </div>
          </div> -->

          <!-- <div class="form-group">
            <label class="col-lg-2 control-label">Guide</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="stguide" required>
            </div>
          </div>    -->       

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="reset" class="btn btn-sm btn-default" id="donotaddstudent"><i class="fa fa-times"></i> Reset</button>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Add Student</button>
              </div>
          </div>
          
        </form>
      </div>
    </div>
  </section>
</div>
@stop
