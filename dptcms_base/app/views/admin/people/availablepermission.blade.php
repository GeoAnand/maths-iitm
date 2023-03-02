<div>
	<p><strong>Name :</strong> {{$getuser->user_fname.' '.$getuser->user_lname}}</p>
	<p><strong>Email : </strong>{{$getuser->user_email}}</p> 
</div>
<br/>
<p><strong>Available Permissions</strong></p>
<div>
	<input type="hidden" value="{{$getuser->id}}" name="userid" id="useridinchangepermission">
	<label class="checkbox-inline">
	@if($getuser->userprivileg->people==1)
	  	<input type="checkbox" value="1" name="people" id="people" checked>People
	@else
		<input type="checkbox" value="1" name="people" id="people">People
	@endif
	</label>

	<label class="checkbox-inline">
		@if($getuser->userprivileg->student==1)
		  	<input type="checkbox" value="1" name="student" id="student" checked>Student
		@else
			<input type="checkbox" value="1" name="student" id="student">Student
		@endif
	</label>

	<label class="checkbox-inline">
		@if($getuser->userprivileg->research==1)
		  	<input type="checkbox" value="1" name="research" checked id="research">Research
		@else
			<input type="checkbox" value="1" name="research" id="research">Research
		@endif
	</label>

	<label class="checkbox-inline">
		@if($getuser->userprivileg->programs==1)
		  	<input type="checkbox" value="1" name="programs" checked id="programs">Programs
		@else
			<input type="checkbox" value="1" name="programs" id="programs">Programs
		@endif
	</label>

	<label class="checkbox-inline">
		@if($getuser->userprivileg->events==1)
		  	<input type="checkbox" value="1" name="events" checked id="events">Events
		@else
			<input type="checkbox" value="1" name="events" id="events">Events
		@endif
	</label>
	<label class="checkbox-inline">
		@if($getuser->userprivileg->resources==1)
		  	<input type="checkbox" value="1" name="resource" checked id="resource">Resources
		@else
			<input type="checkbox" value="1" name="resource" id="resource">Resources
		@endif
	</label>
</div>
<div>
	<label class="checkbox-inline" style="">
		@if($getuser->userprivileg->bookings==1)
		  	<input type="checkbox" value="1" name="bookings" checked id="bookings">Bookings
		@else
			<input type="checkbox" value="1" name="bookings" id="bookings">Bookings
		@endif
	</label>
	<label class="checkbox-inline" style="">
		@if($getuser->userprivileg->newannouncement==1)
		  	<input type="checkbox" value="1" name="newannouncement" checked id="newannouncement">News / Announcement
		@else
			<input type="checkbox" value="1" name="newannouncement" id="newannouncement">News / Announcement
		@endif
	</label>
	<label class="checkbox-inline">
		@if($getuser->userprivileg->createadmin==1)
		  	<input type="checkbox" value="1" name="createadmin" checked id="createadmin">User Privilege
		@else
			<input type="checkbox" value="1" name="createadmin" id="createadmin">User Privilege
		@endif
	</label>
</div>