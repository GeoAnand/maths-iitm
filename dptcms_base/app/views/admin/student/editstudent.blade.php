<form role="form" id="studentUpdate">
<input type="hidden" name="id" value="{{$details->id}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Name : </label>
    <input type="text" class="form-control" name="stname" placeholder="Enter Name" required value="{{$details->student_name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Roll No : </label>
    <input type="text" class="form-control" name="stroll" placeholder="Enter Roll no" required value="{{$details->student_rollno}}">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Year : </label>
    <input type="text" class="form-control" name="styear" placeholder="Year" required value="{{$details->student_year}}">
  </div>
  <!-- <div class="form-group">
    <label for="exampleInputEmail1">Guide Name : </label>
    <input type="text" class="form-control" name="stguide" placeholder="Enter if any guide" value="{{$details->student_guide_name}}">
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
  {{-- <button type="reset" class="btn btn-danger">Close</button> --}}
</form>