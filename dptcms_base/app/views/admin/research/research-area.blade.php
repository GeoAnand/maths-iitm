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
      @if(count($getResearchInfo))
        <form class="bs-example form-horizontal" method="post" action="{{url('admin/research/updateresearchareainfo/'.$getResearchInfo[0]['id'])}}">
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
                @if(count($getResearchInfo))
                  {{$getResearchInfo[0]['researchinfo_desc']}}
                @endif
              </div>
            </div>
          </div>            
        </form>
        <div class="line line-dashed line-lg pull-in"></div>
        
        {{-- <div class="form-group pull-right hide">
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
        <form class="postForm" enctype="multipart/form-data" method="post" action="{{url('admin/research/updateresearchareaimage')}}" autocomplete="off">
          <input type="hidden" name="researchinfo" value="{{$getResearchInfo[0]['id']}}" />  
          <div class="fileinput fileinput-new col-sm-12" data-provides="fileinput">
            
            <div class="col-sm-6 col-sm-offset-3 text-center">
              
                <div class="fileinput-new thumbnail" style="width: 200px; height:150px;">
                  @if($getResearchInfo[0]['researchinfo_image'])
                    <img src="{{URL::asset('siteimages/'.$getResearchInfo[0]['researchinfo_image'])}}" />                  
                  @else
                    <img data-src="holder.js/100%x100%" alt="...">
                  @endif  
                </div>          
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
              
                <div class="">
                  <span class="btn btn-primary btn-file">
                    <span class="fileinput-new"> 
                      @if($getResearchInfo[0]['researchinfo_image']) 
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
        </form> --}}
      @else
        <div class="text-center">
          <span class="text-muted h5 block"> Sorry! we could no find any contents for Research Page!</span>
          <a href="#" class="btn btn-lg btn-info" id="initiateesearchinfobtn"><i class="fa fa-plus fa-1x"></i> Update the content Now!</a>
        </div>
        <form class="bs-example form-horizontal hide" id="createresearchinfoform" method="post" action="{{url('admin/research/updateresearchareainfo/0')}}">
          <header>
            <div class="pull-left h3 m-t-sm">
              Major Areas of Research
            </div>
          </header>
          <div class="form-group">
            <div class="col-sm-12 m-t-sm">
              <div id="createreserachinfo" class="summernote">
              </div>
            </div>
          </div>  
          <div class="form-group">
            <div class="col-sm-12 m-t-sm">
              <button type="submit" id="createresearchinfobtn" class="btn btn-primary">Submit</button>
            </div>
          </div>          
        </form>
      @endif
    </div>
  </section>
    
</div>

@stop
