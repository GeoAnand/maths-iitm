<form role="form" id="updateuserbyadmin" data-id="{{$getuser->id}}"> 
  <div class="form-group">
    <label for="">First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="{{$getuser->user_fname}}">
  </div>
  <div class="form-group">
    <label for="">Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="{{$getuser->user_lname}}">
  </div>
  {{-- @if($getuser->user_type=='Faculty') --}}
  {{-- <div class="row">
    <div class="form-group" id="subtype">
      <label class="col-lg-2 control-label">Pick a Faculty type</label>
      <div class="col-lg-10">
        <select class="form-control" name="facultytype" required>
          <option value="0">-- select a Type --</option>
          <option value="faculty" @if($getuser->user_subtype=='Faculty') selected @endif>Faculty</option>
          <option value="distinguished" @if($getuser->user_subtype=='Distinguished&nbsp;Faculty') selected @endif>Distinguished Faculty</option>
          <option value="adjunct" @if($getuser->user_subtype=='Adjunct&nbsp;Faculty') selected @endif>Adjunct Faculty</option>
           <option value="visiting" @if($getuser->user_subtype=='Visiting&nbsp;Faculty') selected @endif>Visiting Faculty</option>

        </select>
      </div>
    </div> 
    </div> --}}          
  {{-- @endif --}}
   <div class="form-group">
    <label for="">Designation</label>
    <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="{{$getuser->user_designation}}">
  </div>
   <div class="form-group">
    <label for="">Phone No.</label>
    <input type="text" class="form-control" name="phone" placeholder="Enter Pnone no" value="{{$getuser->user_phone}}">
  </div>
   <div class="form-group">
    <label for="">Office</label>
    <input type="text" class="form-control" name="office" placeholder="Enter Office" value="{{$getuser->user_office}}">
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
