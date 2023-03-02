<h3>{{$getdodetails->resource_document_title}}</h3>

<div class="row">
	<div class="col-sm-4">
		<span>Document Details : </span>
	</div>
	<div class="col-sm-8">
		<p>{{$getdodetails->resource_document_body}}</p>
	</div>
</div>

@if(!empty($getdodetails->resource_document_link))
<div class="row">
	<div class="col-sm-4">
		<span>Document link : </span>
	</div>
	<div class="col-sm-8">
		<p class="text-muted">{{$getdodetails->resource_document_link}}</p>
	</div>
</div>
@endif

@if(!empty($getdodetails->resource_document_file))
<div class="row">
	<div class="col-sm-4">
		<span>Attachment :  </span>
	</div>
	<div class="col-sm-8">
		{{-- <a href="{{$getdodetails->resource_document_link}}" class="btn btn-primary"><i class="fa fa-download"></i> Download</a> --}}
		<a href="{{URL::asset('resources/'.$getdodetails->resource_document_file)}}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Open / Download</a>
	</div>
</div>
@endif