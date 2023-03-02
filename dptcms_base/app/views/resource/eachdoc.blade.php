<div>
	<h4>{{$getdocdetails->resource_document_title}}</h4>
</div>
<div>
	<p style="padding:10px">{{$getdocdetails->resource_document_body}}</p>
</div>
<div>
	<span class="h5">Related Link:</span>
	<p style="padding:10px"><a href="{{$getdocdetails->resource_document_link}}">{{$getdocdetails->resource_document_link}}</a></p>
</div>
<div>
	<span class="h5" style="display:block">Related File:</span>
		<a href="{{URL::asset('resource/'.$getdocdetails->resource_document_file)}}" style="padding:13px" target="_blank"><i class="fa fa-file fa-3x"></i></a>
</div>