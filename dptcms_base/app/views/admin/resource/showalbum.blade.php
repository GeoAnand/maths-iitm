@extends('admin.layouts.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/blueimp-gallery.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/bootstrap-image-gallery.min.css')}}">
<style type="text/css">
    .thumb{
        width: 100%;
    }
    .thumbnail
    {
        margin-bottom:0px;
    }
    .thumbnail img
    {
        height: 100px;
    }
    .deleteimage
    {
        display: none;
    }
    .eachimage:hover .deleteimage
    {
        display: inline;
    }
    .eachimage:hover a.thumbnail{
        opacity: 0.2;
    }
</style>

<div class="col-sm-12">
  <!-- .breadcrumb -->
  <ul class="breadcrumb">
    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{url('admin/resources/dashboard')}}"><i class="fa fa-bars"></i> Resources</a></li>
     <li><a href="{{url('admin/resources/gallery')}}"><i class="fa fa-bars"></i> Gallery</a></li>
    <li class="active"> Album</li>
  </ul>
  <!-- / .breadcrumb -->

  <section class="panel">    
    <header class="panel-heading font-bold">
        Resources : Gallery : Album : {{$getalbumdetails->resource_album_name}}
        <button class="pull-right m-l btn btn-danger btn-xs" data-id="{{$getalbumdetails->id}}" id="deletealbum"><i class="fa fa-times"></i> Delete Album</button>
        <button class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-plus"></i> Upload Images</button>
    </header>
    
    <div class="panel-body">
        <div class="col-sm-12" style="margin:10px">
            <h4>{{$getalbumdetails->resource_album_name}}</h4>
            <div id="gallery">
            @if(count($getpics))
                <div id="gallerycontent">
                @for($i=0;$i<=count($getpics)-1;$i++)               
                    <div class="col-sm-2 eachimage wrapper m-b" style="height:100px;">
                        <a href="{{URL::asset('gallery/'.$getpics[$i]['resource_gallery_filename'])}}" title="{{$getpics[$i]['resource_gallery_text']}}" data-gallery class="thumbnail thumb" target="_blank">
                            <img src="{{URL::asset('gallery/'.$getpics[$i]['resource_gallery_filename'])}}" alt="">
                        </a>
                        <div align="center" style="margin-top:-60px;position: absolute; margin-left: 60px;" class="deleteimage-container"><a href="#" class="deleteimage" data-id="{{$getpics[$i]['id']}}" title="Delete this image">
                        <span class="fa fa-trash-o fa-2x text-danger" style="margin-top:-50px;"></span></a></div>
                    </div>
                @endfor
                </div>
            @else
                Sorry! There are no images in this album.
            @endif
            </div>
        </div>
    </div>
</section>
</div>

<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-modals')
<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Upload Images to Album</h4>
      </div>
      <div class="modal-body">
        <div class="spinner-base">
            <form role="form" class="postUploadform" action="{{url('resources/uploadtogallery/0')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="album">Album </label>
                <input class="form-control" value="{{$getalbumdetails->resource_album_name}}" disabled="true" />
                <input class="hidden" value="{{$getalbumdetails->id}}" name="album">
                {{-- <input class="form-control" type="text" id="imageTitle" name="imageTitle"> --}}
                {{-- <select class="form-control" name="album" required>
                    <option value="">-- Select an Album --</option> --}}
                    {{-- @foreach($getalbums as $val) --}}
                        {{-- <option value="{{$val->id}}">{{$val->resource_album_name}}</option> --}}
                    {{-- @endforeach --}}
                {{-- </select> --}}
              </div>
              <div class="form-group">
                <label for="fileuploadtogallery">Select Files </label>
                <input type="file" id="fileuploadtogallery" name="uploadfiles[]" multiple="true" required>
                <p class="help-block">(Select multiple files and click upload)</p>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="uploadAlbum"> Upload Album</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer-scripts')
<script src="{{URL::asset('js/jquery.blueimp-gallery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-image-gallery.min.js')}}"></script>
@stop