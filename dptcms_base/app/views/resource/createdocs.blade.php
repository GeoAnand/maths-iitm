<form role="form" method="post" action="{{url('resources/adddocs/0')}}" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputEmail1">Docs Title</label>
    <input type="text" class="form-control" name="docstitle">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Link</label>
    <textarea class="form-control" name="docsbody"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Docs Ref. link</label>
    <input type="text" class="form-control" name="docslink">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Any file ?</label>
    <input type="file" class="form-control" name="docsfile">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>






