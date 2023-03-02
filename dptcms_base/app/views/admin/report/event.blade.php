<div class="col-sm-12">
		<h3 style="display:inline">Events : </h3>
		<h5 style="display:inline" class="pull-right">Total : ({{count($getallevents)}})</h5>
		@if(count($getallevents))
		<section class="panel">
                <table class="table table-striped m-b-none text-sm">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>Titles</th>
                      	<th>Date</th>                    
                      	<th>Links</th>
                    </tr>
                  </thead>
                  <tbody id="studentlistbyyear">
	              	<?php $i=1; ?>		                  	
                  		@foreach($getallevents as $val)
		                  	<tr>                    
		                      	<td>
		                     		{{$i}} 
		                      	</td>
		                      	<td>
		                      		{{$val->events_name}}
		                      	</td>
		                      	<td>
		                       		{{$val->events_date}}
		                      	</td>
		                      	<td>
		                      		@if($val->needpage=0)
	                          		<a href="{{$val->externallink}}" target="_blank">Read more ...</a>
			                        @else
			                        <a href="{{url('event/view/'.$val->id)}}" target="_blank">Read more ...</a>
			                        @endif
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