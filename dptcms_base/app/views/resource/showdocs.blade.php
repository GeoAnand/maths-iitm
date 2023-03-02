@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content')
<div>
	<div class="col-sm-8">
		<h3 class="dpt-text-dark">Documents</h3>
	</div>
	<div class="col-sm-4">
		<ol class="breadcrumb pull-right">
		  <li>Resource</li>
		  <li class="active">Documents</li>
		</ol>
	</div>
</div>
<div class="col-sm-12 line line-solid"></div>
<div class="col-sm-12">
	@if(count($getalldocs))
		@for($i=0;$i < count($getalldocs);$i++)
			@if($getalldocs[$i]['needlogin']==0)
				<div class="m-t m-b">
				    <a href="{{url('resources/document/'.$getalldocs[$i]['id'])}}" target="_blank" data-title="{{$getalldocs[$i]['resource_document_title']}}" class="viewdoc list-group-item noborder"> 
				    	<i class="fa fa-fw fa-file-text"></i> {{$getalldocs[$i]['resource_document_title']}}
				    </a>
				</div>
			 		
			@else
				@if(Auth::check())
					<div class="m-t m-b">
					    <a href="{{url('resources/document/'.$getalldocs[$i]['id'])}}" target="_blank" data-title="{{$getalldocs[$i]['resource_document_title']}}" class="viewdoc list-group-item noborder"> 
					    	<i class="fa fa-fw fa-file"></i> {{$getalldocs[$i]['resource_document_title']}}
					    </a>
					</div>
					
				@endif
			@endif
		@endfor
	@else
		<span class="text-muted wrapper text-center center-block">
	        <i class="fa fa-warning fa-4x"></i> <br/>Sorry! There are no documents to be displayed. 
	    </span>
	@endif
</div>
@stop

@section('modals')
<!-- Doc View Modal -->
<div class="modal fade" id="DocViewModal" tabindex="-1" role="dialog" aria-labelledby="DocViewModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: 0px;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="viewdocbody">
        
      </div>
      <div class="modal-footer" style="border: 0px;">
        <button type="button" class="btn dpt-btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop