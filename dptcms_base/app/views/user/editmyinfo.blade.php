<form role="form" class="form-horizontal" id="updateprofile" data-id="{{Auth::user()->id}}">
	<div class="form-group">
      <label class="col-lg-2 control-label">Pick a Title</label>
      <div class="col-lg-10">
	      <select name="usertitle" required id="usertitle" class="form-control">
	        <option value="0">-- Select a Title --</option>
	        <option value="Mr.">Mr.</option>
	        <option value="Ms.">Ms.</option>
	        <option value="Dr.">Dr.</option>
	        <option value="Prof.">Prof.</option>
	        <option value="">None</option> {{-- EDITED NARAYANAN --}}
	      </select>
	    </div>
    </div>
  	

  	<div class="form-group">
    	<label class="col-lg-2 control-label">First name</label>
      	<div class="col-lg-10">
    		<input type="text" class="form-control" id="" placeholder="First Name" name="fname" value="{{$getdetails->user_fname}}" required>
    	</div>
    </div>
	<div class="form-group">
    	<label class="col-lg-2 control-label">Last name</label>
      	<div class="col-lg-10">
    		<input type="text" class="form-control" id="" name="lname" placeholder="Last Name" value="{{$getdetails->user_lname}}" required>
    	</div>
  	</div>
  	<div class="form-group">
		<label class="col-lg-2 control-label">Designation</label>
      	<div class="col-lg-10">
			<input type="text" class="form-control" id="" name="designation" placeholder="Professor" value="{{$getdetails->user_designation}}" required>
		</div>
	</div>
  	<div class="form-group">
    	<label class="col-lg-2 control-label">Office</label>
      	<div class="col-lg-10">
    		<input type="text" class="form-control" id="" name="office" placeholder="Office Room no." value="{{$getdetails->user_office}}" required>
    	</div>
  	</div>

  	<div class="form-group">
	    <label class="col-lg-2 control-label">Phone No</label>
      	<div class="col-lg-10">
	    	<input type="text" class="form-control" id="" name="phoneno" placeholder="Office Phone no." value="{{$getdetails->user_phone}}" required>
	    </div>
  	</div>

	<div class="form-group">
		<label class="col-lg-2 control-label">Research filed</label>
      	<div class="col-lg-10">
			<input type="text" class="form-control" id="" name="researchfield" placeholder="Current Research Area" value="{{$getdetails->user_researchfield}}">
		</div>
	</div>
	
	<div class="form-group">
	    <label class="col-lg-2 control-label">Laboratory / Office / Stores</label>
      	<div class="col-lg-10">
	    	<input type="text" class="form-control" id="" name="offlabstore" placeholder="Laboratory / Office / Stores" value="{{$getdetails->user_lab_office_stores}}">
	    </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">Personal Home Page</label>
      	<div class="col-lg-10">
		    <div class="input-group">
			    {{-- <span class="input-group-addon">https://</span> --}}
			    <input type="url" class="form-control" id="" name="homepage" placeholder="Personal Website Link " value="{{$getdetails->user_personal_homepage}}">
			    <span class="text-muted text-sm">Please enter full URL. Eg- "https://www.website.com"</span>
			</div>
		</div>
	</div>
  	<div class="form-group">
  		<label class="col-lg-2 control-label">Research Group</label>
      	<div class="col-lg-10">
	  		<div class="">
	            <div class="clearfix" id="grouppillbox">
	              <ul id="grouplist">
	              	<?php 
						$getgruop=array_values(array_filter(explode(',',Auth::user()->ingroup)));
					?>
					@for($i=0;$i <count($getgruop);$i++)
						<?php 
							$getbroupname=Researchgroup::find($getgruop[$i]);
						?>
					<li class="label dpt-bg-dark currentgroup" data-id="{{$getgruop[$i]}}">{{$getbroupname->researchgroup_name}}</li>
					@endfor
	                <input type="text" id="mygroup" class="typeahead" placeholder="Search a group name">
	              </ul>
	            </div>
	        </div>
	    </div>	
  	</div>
  	
  	<div align="right">
  		<button type="reset" style="display:none" ></button>
	 	<button type="submit" class="btn dpt-bg-dark">Update Profile</button>
	</div>
</form>
<div class="line line-dashed"></div>
<p class="text-muted text-center"><small>Change Profile Picture</small></p>
<form role="form" method="post" action="{{url('useractivity/chageprofilepics/'.Auth::user()->id)}}" enctype="multipart/form-data" id="changeImage">
	<div class="form-group">
	    <div style="height: 80px;">
		    <div class="col-sm-6" style="padding-top: 39px;">
		    	<input type="file" id="changepics" name="changepics">
		    	<em>File Size : 50KB &amp; Dimension : 175x175 for best quality</em>
		    </div>
		    <div class="col-sm-6">
		    	<a href="#" class="pull-left thumb avatar border m-r" id="showuploadedimage">
			    	@if($getdetails->username!='')
                        <?php
                        $profilepicJpg = 'images/profilepic/'.$getdetails->username.'.jpg';
                        $profilepicJpeg = 'images/profilepic/'.$getdetails->username.'.jpeg';
                        $profilepicPng = 'images/profilepic/'.$getdetails->username.'.png';
                        $profilepicGif = 'images/profilepic/'.$getdetails->username.'.gif';

                        $profilepicJPG = 'images/profilepic/'.$getdetails->username.'.JPG';
                        $profilepicJPEG = 'images/profilepic/'.$getdetails->username.'.JPEG';
                        $profilepicPNG = 'images/profilepic/'.$getdetails->username.'.PNG';
                        $profilepicGIF = 'images/profilepic/'.$getdetails->username.'.GIF';
                        ?>
                        @if(File::exists($profilepicJpg))
                            <img src="{{URL::asset($profilepicJpg)}}" class="img-circle">
                        @elseif(File::exists($profilepicJpeg))
                            <img src="{{URL::asset($profilepicJpeg)}}" class="img-circle">
                        @elseif(File::exists($profilepicPng))
                            <img src="{{URL::asset($profilepicPng)}}" class="img-circle">
                        @elseif(File::exists($profilepicGif))
                            <img src="{{URL::asset($profilepicGif)}}" class="img-circle">
                        @elseif(File::exists($profilepicJPG))
                            <img src="{{URL::asset($profilepicJPG)}}" class="img-circle">
                        @elseif(File::exists($profilepicJPEG))
                            <img src="{{URL::asset($profilepicJPEG)}}" class="img-circle">
                        @elseif(File::exists($profilepicPNG))
                            <img src="{{URL::asset($profilepicPNG)}}" class="img-circle">
                        @elseif(File::exists($profilepicGIF))
                            <img src="{{URL::asset($profilepicGIF)}}" class="img-circle">
                        @else
                            <img src="{{URL::asset('images/avatar_default.jpg')}}" class="img-circle">
                        @endif
                    @else
                    <img src="{{URL::asset('images/avatar_default.jpg')}}" class="img-circle">
                    @endif
			    </a>
		    </div>
		</div>
	</div>
</form>
<div class="line line-dashed"></div>
<p class="text-muted text-center"><small>Update CV</small></p>
<form role="form" method="post" action="{{url('useractivity/changecv/'.Auth::user()->id)}}" enctype="multipart/form-data" id="changeCV">
	CV
	<div class="form-group">
	    <div style="height: 80px;">
		    <div class="col-sm-6" style="padding-top: 39px;">
		    	<input type="file" id="changecv" name="changecv">
		    </div>
		    <div class="col-sm-6" id="showcv">

		    </div>
		</div>
	</div>
</form>

<script src="{{URL::asset('js/jquery.form.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#usertitle").val("{{$getdetails->user_title}}");

		var options = { 
	        	beforeSubmit:showRequest,
	        	success:showResponse,
	        	dataType:'json'
	        };
	        var options = { 
	        	beforeSubmit:showRequest,
	        	success:showCVResponse,
	        	dataType:'json'
	        };

	      $('body').delegate('#changepics','change', function(){
	        $('#changeImage').ajaxForm(options).submit();      
	      });
	      $('body').delegate('#changecv','change', function(){
	        $('#changeCV').ajaxForm(options).submit();      
	      });

	      $("#mygroup").typeahead({
			    name: 'dptcmsgroupsearch',
			    prefetch: {
			        url: grouppath,
			        ttl: 0,
			    },
			    limit: 10,
			    valueKey: 'name',
			    template: [
			        '<p class="item-basket"></p>',
			        '<p class="item-basket">@{{name}}</p>',
			    ].join(''),
			    engine: Hogan
			}).on('typeahead:selected', function(obj, datum) 
			{
			    console.log(datum['name']);
			    $("#grouplist").prepend('<li class="label bg-success newgroup" data-id="'+datum['id']+'">'+datum['name']+'</li>');
			    $("#mygroup").val("");
			});
	});
    function showRequest(formData, jqForm, options) { 
      //$("#validation-errors").hide().empty();
      //$("#output").css('display','none');
        //return true; 
    } 
    function showCVResponse(response, statusText, xhr, $form)  
    { 
      if(response.success == false)
      {
        var arr = response.errors;
        $.each(arr, function(index, value)
        {
          if (value.length != 0)
          {
            //$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
          }
        });
        //$("#validation-errors").show();
        console.log("Error in Upload !");
      } 
      else 
      {
         var url="{{URL::asset('cv')}}";
         $("#showcv").html("<a class=\"cv\" href='"+url+"/"+response.file+"')}}'>CV Uploaded</a>");
         //$("#showuploadedimage").css('display','block');
      }
    }
    function showResponse(response, statusText, xhr, $form)  
    { 
      if(response.success == false)
      {
        var arr = response.errors;
        $.each(arr, function(index, value)
        {
          if (value.length != 0)
          {
            //$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
          }
        });
        //$("#validation-errors").show();
        console.log("Error in Upload !");
      } 
      else 
      {
         var url="{{URL::asset('images/profilepic')}}";
         $("#showuploadedimage").html("<img class=\"img-circle\" src='"+url+"/"+response.file+"')}}' />");
         //$("#showuploadedimage").css('display','block');
      }
    }


	$("#updateprofile").submit(function(event){
		event.preventDefault();
		var url="{{url('useractivity/updateprofile/'.Auth::user()->id)}}";
		var tmp='';
		$('.newgroup').each(function(){
			tmp+=$(this).attr('data-id')+',';
		});
		var data=$(this).serializeArray();
		data.push({name: 'ingroup', value: tmp});
		$.post(url,data,function(){

		}).done(function(){
			
			alert("Updated successfully !");
			$("#editDetailsModal").modal('hide');
		});
	});
	/*$("#submitUserinfo").click(function(){
		$("#updateprofile").trigger("submit");
	});*/
	$(".currentgroup").click(function(event){
		event.preventDefault();
		var tmp=$(this);
		var url="{{url('useractivity/leavegroup/'.Auth::user()->id)}}";
		r=confirm("Are you sure to leave this group ?");
		if(r==true)
		{
			$.post(url,{'gruopid':$(this).attr('data-id')},function(){

			}).done(function(){
				tmp.remove();
			});
		}
	});
	$(document).on("click",".newgroup",function(){
		$(this).remove();
		$("#mygroup").val("");
	});
	/*$("#grouppillbox").pillbox().on('removed',function(event, data){
		event.preventDefault();
		alert("removed");

	});*/

</script>
