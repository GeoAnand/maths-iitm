@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<div class="col-sm-6">
  <form role="form" method="post" action="{{url('programs/addcourse')}}">

    <div class="form-group">
      <label for="exampleInputEmail1">Program Name</label>
      <select name="whichprogram">
        <?php $getallprog=Programs::all();?>
        <option value="0">--  select a program --</option>
        @foreach($getallprog as $prog)
          <option value="{{$prog->id}}">{{$prog->program_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Select semester</label>
      <input type="text" class="form-control" name="whichsem"/>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Course Name</label>
      <input type="text" class="form-control" name="coursename"/>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Course No</label>
      <input type="text" class="form-control" name="courseno"/>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Course Credit</label>
      <input type="text" class="form-control" name="coursecredit">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Course Details</label>
      <textarea class="form-control" name="coursedetails"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Course reference </label>
      <textarea class="form-control" name="courseref"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@stop




