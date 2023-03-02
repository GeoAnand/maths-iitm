<div class="col-sm-12">
		<h3 style="display:inline">Announcement : </h3>
		<h5 style="display:inline" class="pull-right">Total : ({{count($getallannouncement)}})</h5>
		@if(count($getallannouncement))
		<section class="panel">
                <table class="table table-striped m-b-none text-sm">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>Titles</th>
                      	<th>Date</th>    
                      	<th>Status</th>                       
                      	<th>Links</th>
                    </tr>
                  </thead>
                  <tbody id="studentlistbyyear">
	              	<?php $i=1; ?>		                  	
                  		@foreach($getallannouncement as $val)
		                  	<tr>                    
		                      	<td>
		                     		{{$i}} 
		                      	</td>
		                      	<td>
		                      		{{$val->news_title}}
		                      	</td>
		                      	<td>
		                       		{{$val->news_date}}
		                      	</td>
		                      	<td>
		                       		@if($val->news_publish==1)
		                       			<i class="fa fa-check"></i> Published
		                       		@else
		                       			<i class="fa fa-times"></i> Unpublished
		                       		@endif
		                      	</td>
		                      	<td>
		                      		<a href="#" id="newsDesc" class="btn btn-xs btn-primary"  data-description="{{$val->news_description}}">Details</a>
		                      	</td>
		                    </tr>
	                    	<?php $i++ ?>
                    	@endforeach
                  </tbody>
                </table>
            </section>
		@else
		<section class="panel">
			No result found !
		</section>
		@endif
	</div>