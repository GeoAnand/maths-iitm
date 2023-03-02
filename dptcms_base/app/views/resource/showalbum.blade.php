@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
@parent
<link rel="stylesheet" href="{{URL::asset('css/blueimp-gallery.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/bootstrap-image-gallery.min.css')}}">
<style type="text/css">
    .thumb{
        width: 15%;
    }
    .thumb img{
        height: 100px;
    }
</style>
@stop

@section('content')
<div class="container">
    <div>
        <div class="col-sm-8">
            <h3>Album</h3>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb pull-right">
              <li>Resource</li>
              <li><a href="{{url('resources/gallery')}}">Gallery</a></li>
              <li class="active">Album</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-12 line line-solid"></div>
    <div class="col-sm-12" style="margin:10px">
        <div class="col-sm-12" style="margin:10px">
            <h4>{{$getalbumdetails->resource_album_name}}</h4>
            @if(count($getpics))
                <div id="links">
                @for($i=0;$i<=count($getpics)-1;$i++)               
                    <a href="{{URL::asset('gallery/'.$getpics[$i]['resource_gallery_filename'])}}" title="{{$getpics[$i]['resource_gallery_originalname']}}" data-gallery class="thumbnail thumb">
                        <img src="{{URL::asset('gallery/'.$getpics[$i]['resource_gallery_filename'])}}" alt="Mathematician">
<div class="desc" align="center"><?php echo str_replace(".jpg","",str_replace("_"," ", "{$getpics[$i]['resource_gallery_originalname']}"))?></div>
                    </a>
                @endfor
                </div>
            @else
                <span class="text-muted wrapper text-center center-block">
                    <i class="fa fa-warning fa-4x"></i> <br/>Sorry! There are no images in this album.
                </span>
            @endif
        </div>
    </div>
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

@section('footer-scripts')
@parent
<script src="{{URL::asset('js/jquery.blueimp-gallery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-image-gallery.min.js')}}"></script>
@stop
