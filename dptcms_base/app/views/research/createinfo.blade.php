@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')
<form role="form" action="{{url('research/updateresearchinfo/0')}}" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Some Details</label>
    <textarea class="form-control" name="researchdesc"></textarea>
  </div>

  <div class="form-group">
    <label for="">Select any image for research group </label>
    <input type="file" name="researchareaimage" id="researchareaimage">
    <p class="help-block">(Note  :  max size 4 MB any .jpg ,.jpeg or .png image)</p>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

<script>
  function updateDataTable(){

  }
</script>
@stop
