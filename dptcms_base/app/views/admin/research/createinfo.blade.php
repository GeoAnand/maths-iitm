@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Research Area | DeptCMS</title>
@stop

@section('content')
<style type="text/css">
.note-editor .fa,.note-editor .note-current-fontname
{
  color: #000;
}
#saveprogectinfo{
  display: none;
}
#cancleprogectinfo{
  display: none;
  margin-left: 20px;
}
</style>

<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/research/dashboard')}}"><i class="fa fa-book"></i> Research</a></li>
    <li class="active"> Research Area </li>
  </ul>
  <!-- / .breadcrumb -->
    
  <section class="panel">
    <header class="panel-heading font-bold"> Research Area</header>
    <div class="panel-body">
      <form class="bs-example form-horizontal" method="post" action="{{url('research/updateresearchinfo/'.$getresearchinfo[0]['id'])}}">
        <header>
          <div class="pull-left h3 m-t-sm">
            Major Areas of Research
          </div>
          <div class="pull-right">
            <a href="#" id="cancelediting" class="btn btn-sm btn-default hide"><i class="fa fa-times fa-1x"></i> Cancel</a>
            <a href="#" id="editreserachinfo" class="btn btn-sm btn-info"><i class="fa fa-edit fa-2x"></i> Edit Content</a>
          </div>
        </header>
        <div class="form-group">
          <div class="col-sm-12 m-t-sm">
            <div id="reserachinfo">
              @if(count($getresearchinfo))
                {{$getresearchinfo[0]['researchinfo_desc']}}
              @endif
            </div>
          </div>
        </div>            
      </form>

      <div class="line line-dashed line-lg pull-in"></div>
      
      <div class="form-group pull-right hide">
        <label class="col-sm-4 control-label pull-left">Enabled</label>
        <div class="col-sm-4 col-sm-offset-4">
          <label class="switch pull-right">
            <input type="checkbox" class="switch" checked>
            <span></span>
          </label>
        </div>
      </div>
      <div class="text-center h4 m-t-sm">
        Image for Major Area of Research Page
      </div>
      <form class="postForm" enctype="multipart/form-data" method="post" action="{{url('research/updateresearchimage')}}" autocomplete="off">
        <input type="hidden" name="researchinfo" value="{{$getresearchinfo[0]['id']}}" />  
        <div class="fileinput fileinput-new col-sm-12" data-provides="fileinput">
          
          <div class="col-sm-6 col-sm-offset-3 text-center">
            
              <div class="fileinput-new thumbnail" style="width: 200px; height:150px;">
                @if($getresearchinfo[0]['researchinfo_image'])
                  <img src="{{URL::asset('siteimages/'.$getresearchinfo[0]['researchinfo_image'])}}" />                  
                @else
                  <img data-src="holder.js/100%x100%" alt="...">
                @endif  
              </div>          
              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
            
              <div class="">
                <span class="btn btn-primary btn-file">
                  <span class="fileinput-new"> 
                    @if($getresearchinfo[0]['researchinfo_image']) 
                      Replace Image
                    @else
                      Select Image
                    @endif
                  </span>
                <span class="fileinput-exists">Change</span><input type="file" name="researchareaimage" id="researchareaimage"></span>
                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
              </div>
            
          </div>

        </div>
      </form>
    </div>
  </section>
    
</div>

@stop

@section('page-scripts')
<script>
  $(document).on("click", "#editreserachinfo", function(){
    $('#reserachinfo').summernote({
      height: 300,   //set editable area's height
      focus: true,
      toolbar: [
        //[groupname, [button list]]
        ['style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strike']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['edit', ['undo', 'redo']],
        ['misc', ['codeview', 'fullscreen']],
      ]
      //airMode: true
    });    
    $("#editreserachinfo").removeClass("btn-info");
    $("#editreserachinfo").addClass("btn-primary");
    $("#editreserachinfo").html('<i class="fa fa-check fa-1x"></i> Save Changes');
    $("#editreserachinfo").attr("id", "savereserachinfo");
    $('#cancelediting').removeClass("hide");
  });

  $(document).on("change", ".switch", function(){
    if($(this).prop("checked")){
      $(this).parents().find(".control-label").text("Enabled");
    }else{
      $(this).parents().find(".control-label").text("Disabled");
    }
  });

  $(document).on("click", "#cancelediting", function(){ 
    $('#reserachinfo').destroy();
    $('#cancelediting').addClass("hide");
    $("#savereserachinfo").removeClass("btn-primary");
    $("#savereserachinfo").addClass("btn-info");
    $("#savereserachinfo").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
    $("#savereserachinfo").attr("id", "editreserachinfo");
  });

  $(document).on("click", "#savereserachinfo", function(){
    event.preventDefault();
    $.post($(this).parents("form").attr('action'),{'researchdesc':$('#reserachinfo').code()},function(data){
        $("#savereserachinfo").removeClass("btn-primary");
        $("#savereserachinfo").addClass("btn-default");
        $("#savereserachinfo").text('Updating ...');
    }).done(function(data){
      if(data=="true"){
        $('#reserachinfo').destroy();
        $(".flash-message-text").text("Content Updated Successfully!");
        $(".flash-message").removeClass("alert-danger");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-success");
        $(".flash-message").show();

        $('#cancelediting').addClass("hide");
        $("#savereserachinfo").removeClass("btn-default");
        $("#savereserachinfo").addClass("btn-info");
        $("#savereserachinfo").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
        $("#savereserachinfo").attr("id", "editreserachinfo");
      }
      else
      {
        $(".flash-message-text").text("Error! There was some problem in updating content.");
        $(".flash-message").removeClass("alert-success");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-danger");
        $(".flash-message").show();

        $("#savereserachinfo").removeClass("btn-default");
        $("#savereserachinfo").addClass("btn-primary");
        $("#savereserachinfo").html('<i class="fa fa-check fa-1x"></i> Save Changes');
      }
    });
    //console.log($('#reserachinfo').code());
  });

  $(document).on("change.bs.fileinput", function(){
    var options = { 
      beforeSubmit:showRequest,
      success:showResponse,
      dataType:'json'
      };
    $('.postForm').ajaxForm(options).submit();
  });

  function showRequest(formData, jqForm, options) { 
    //$("#validation-errors").hide().empty();
    //$("#output").css('display','none');
      //return true; 
  } 
  function showResponse(response, statusText, xhr, $form)  
  { 
    if(response.success === false)
    {
      var arr = response.errors;
      $.each(arr, function(index, value)
      {
        if (value.length !== 0)
        {
          //$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
        }
      });
      //$("#validation-errors").show();
      $(".flash-message-text").text("Error! Failed to upload the image.");
      $(".flash-message").removeClass("alert-success");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-danger");
      $(".flash-message").show();
    } 
    else 
    {
      $(".flash-message-text").text("Image uploaded Successfully!");
      $(".flash-message").removeClass("alert-danger");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-success");
      $(".flash-message").show();
    }
  }
</script>
@stop
