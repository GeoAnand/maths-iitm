<div class="col-sm-12">
		<h3 style="display:inline">Events : </h3>
		<h5 style="display:inline" class="pull-right">Total : ({{count($getallactivities)}})</h5>
		@if(count($getallactivities))
		<section class="panel">
                <table class="table table-striped m-b-none text-sm">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>Activities</th>
                      	<th>User</th>                    
                      	<th>Date</th>
                    </tr>
                  </thead>
                  <tbody id="studentlistbyyear">
	              	<?php $i=1; ?>		                  	
                  		@foreach($getallactivities as $val)
		                  	<tr>                    
		                      	<td>
		                     		{{$i}} 
		                      	</td>
		                      	<td>
		                      		{{$val->activity}}
		                      	</td>
		                      	<td>
		                       		{{$val->added_by}}
		                      	</td>
		                      	<td>
		                      		{{$val->created_at}}
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