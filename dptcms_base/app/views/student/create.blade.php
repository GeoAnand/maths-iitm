

  <form role="form" method="post" action="{{url('student/addstudent')}}">
  
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
    <label for="exampleInputPassword1">Student Name</label>
    <input type="text" class="form-control" name="stname">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Student Roll no</label>
    <input type="text" class="form-control" name="stroll">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Year</label>
    <input type="text" class="form-control" name="styear">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Guide Name</label>
    <input type="text" class="form-control" name="stguide">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>