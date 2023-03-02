@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Recent Publications | DeptCMS</title>
@stop

@section('content')
	<div class="col-sm-12">
	  <!-- .breadcrumb -->
	  <ul class="breadcrumb">
	    <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
	    <li><a href="{{url('admin/research/dashboard')}}"><i class="fa fa-book"></i> Research</a></li>
	    <li class="active"> Recent Publications </li>
	  </ul>
	  <!-- / .breadcrumb -->
	    
	<section class="panel">
	    <header class="panel-heading font-bold"> 
	    	Recent Publications
	    </header>	    
	    <div class="panel-body">
			<section class="panel">		        	
		        <div class="row">		        	
		        	<div class="col-sm-12 m-t m-b" align="center">
		        		<form class="form-inline" role="form" action="javascript:void(0)">
							<div class="form-group has-feedback">
								<input type="text" class="form-control" id="publicationsearch" placeholder="Search Publications">
								<span class="fa fa-search form-control-feedback"></span>
							</div>
						</form>
		        	</div>
		        </div>				
		        <div class="table-responsive">
			        <table class="table table-striped b-t text-sm">
			            <thead>
			              <tr>
			                <th width="62">S. No.</th>
			                <th class="th-sortable" data-toggle="class">Title
			                  <span class="th-sort">
			                    <i class="fa fa-sort-down text"></i>
			                    <i class="fa fa-sort-up text-active"></i>
			                    <i class="fa fa-sort"></i>
			                  </span>
			                </th>
			                <th>Authors</th>
			                <th>Journal</th>
			                <th>Year</th>
			              </tr>
			            </thead>
			            <tbody id="publicationlist">
			              	@if(count($getRecentPublications))
			              	<?php $i=1; ?>		                  	
		                  		@foreach($getRecentPublications as $val)
				                  	<tr>                    
				                      	<td>
				                     		{{$i}} 
				                      	</td>
				                      	<td>
				                      		{{$val->title}} 
				                      	</td>
				                      	<td>
				                       		{{$val->author}}
				                      	</td>
				                      	<td>
				                      		{{$val->journal}}
				                      	</td>
				                      	<td>
				                       		{{$val->year}}
				                      	</td>
				                    </tr>
			                    	<?php $i++ ?>
		                    	@endforeach
		              		@endif	              
			            </tbody>
			        </table>
		        </div>
		        <div class="col-sm-12 text-center" id="publicationsPaginate">
				      {{$getRecentPublications->links()}}
				</div>		        
			</section>
		</div>
	</section>
</div>
@stop
