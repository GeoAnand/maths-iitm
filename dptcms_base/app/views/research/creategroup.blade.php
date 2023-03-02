<form role="form" action="{{url('research/addgroup/0')}}" method="post">
  <div class="form-group">
    <label for="">Enter a group name</label>
    <input type="text" class="form-control" name="researchgroupname">
  </div>
  <div class="form-group">
    <label for="">Enter a group Desc</label>
    <textarea class="form-control" name="researchgroupdesc"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>