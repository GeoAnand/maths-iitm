@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel | DeptCMS</title>
@stop

@section('content')

  <form role="form" method="post" action="{{url('resources/upload/0')}}" enctype="multipart/form-data">

    <div class="form-group">
      <label for="exampleInputEmail1">Change Album</label>
      <select class="form-control" name="whichalbum">
      	@for($i=0;$i<count($getallalbums);$i++)
      		<option value="{{$getallalbums[$i]['id']}}">{{$getallalbums[$i]['resource_album_name']}}</option>
      	@endfor
      </select>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Select file</label>
      <input type="file" class="form-control" name="uploadfile" required/>
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Any Comment?</label>
      <input type="text" class="form-control" name="imagetext"/>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
@stop






