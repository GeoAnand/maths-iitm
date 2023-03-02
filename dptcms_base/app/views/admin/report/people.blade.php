<div class="col-sm-12">
		<h3 style="display:inline">People : </h3>
		<h5 style="display:inline" class="pull-right">Total : ({{count($getallpeople)}})</h5>
		@if(count($getallpeople))
		<section class="panel">
                <table class="table table-striped m-b-none text-sm">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>Name</th>
                      	<th>Date</th>    
                      	<th>User Type</th>                       
                      	<!--<th>Links</th>-->
                    </tr>
                  </thead>
                  <tbody id="studentlistbyyear">
	              	<?php $i=1; ?>		                  	
                  		@foreach($getallpeople as $val)
		                  	<tr>                    
		                      	<td>
		                     		{{$i}} 
		                      	</td>
		                      	<td>
		                      		{{$val->user_fname}} {{$val->user_lname}}
		                      	</td>
		                      	<td>
		                       		{{$val->created_at}}
		                      	</td>
		                      	<td>
		                       		{{$val->user_type}}
		                      	</td>
		                      	<!--<td>
		                      		<a href="#" id="peopleDesc" class="btn btn-xs btn-primary"  data-description="{{$val->news_description}}">Details</a>
		                      	</td>-->
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