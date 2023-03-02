@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content-heading')
Research Group
@stop

@section('content')	
  
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-8">
        <h3 class="dpt-text-dark">Research Group</h3>
      </div>
      <div class="col-sm-4">
        <ol class="breadcrumb pull-right">
          <li><a href="#">Research</a></li>
          <li class="active">Research Group</li>
        </ol>
      </div>
      <div class="col-sm-12 line line-solid"></div>
    </div>      
  </div>
    <?php //var_dump($getresearchgroup); ?>
  <div class="wrapper">
    <section class="panel">
      <div class="panel-body">
        <div class="col-md-12">
            <h3 class="font-bold m-b">{{$getresearchgroup->researchgroup_name}}</h3>
            <p>
            	{{$getresearchgroup->researchgroup_desc}}
            </p>
            <h4>Members</h4>
            <p>
            	@if($members!='')
            		@foreach($members as $member)
            			<label class="label dpt-bg-dark" style="display: inline-block; font-size: 12px; color: #fff;  padding: 6px 8px; cursor: pointer margin: 2px; ">
            			{{$member['fname']}} {{$member['lname']}}
            			</label>
            		@endforeach
            	@else
            		None
            	@endif
            </p>
            <h4>Publications</h4>
            <p>
        		@if(count($publications))
					<div class="col-sm-12 m-t-lg">
						<div class="col-sm-12 line line-solid"></div>

						<section class="panel">
				            <table class="table table-striped m-b-none text-sm pull-left">
				              <thead>
				                <tr class="dpt-text-dark">
				                	<th>#</th>
				                  	<th>Title</th>
				                  	<th>Authors</th>                    
				                  	<th>Journal</th>
				                  	<th>Year</th>
				                </tr>
				              </thead>
				              
				              <tbody id="studentlistbyyear"> 
				              	<?php $current_page_number=$publications->getCurrentPage(); $items_per_page=$publications->getPerPage(); ?>
				              	<?php $count = (($current_page_number - 1) * $items_per_page) + 1; ?>      	
				              		@foreach($publications as $val)
					                  	<tr>                    
					                      	<td>
					                     		{{$count}} 
					                      	</td>
					                      	<td>
					                      		{{$val->title}}
					                      	</td>
					                      	<td>
					                       		{{$val->author}}
					                      	</td>
					                      	<td>
					                      		{{$val->journal}}
					                      		<p>@if($val->volume) Volume: <span class="pub-volume">{{$val->volume}} @endif @if($val->pages)</span> Page: <span class="pub-page">{{$val->pages}}</span>@endif @if($val->doi)  <span class="pub-doi"><a href="http://dx.doi.org/{{$val->doi}}">DOI:{{$val->doi}} </a></span>@endif				
					                      	</td>
					                      	<td>
					                       		{{$val->year}}
					                      	</td>
					                    </tr>
				                    	<?php $count++ ?>
				                	@endforeach  
				              </tbody>						              
				            </table>
				            <div class="col-sm-12 text-center" id="publicationsPaginate">                
						      {{$publications->links()}}
						    </div>						            
				        </section>
					</div>
            	@else
            		None
            	@endif
            </p>

           
            
        </div>    
      </div>
    </section>
  </div>
@stop
