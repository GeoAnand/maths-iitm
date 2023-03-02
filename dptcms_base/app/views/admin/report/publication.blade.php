<div class="col-sm-12">
			<h3 style="display:inline">Publications : </h3>
			<h5 style="display:inline" class="pull-right">Total : ({{count($getallpublication)}})</h5>
			@if(count($getallpublication))
			<section class="panel">
                <table class="table table-striped m-b-none text-sm">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>Titles</th>
                      	<th>Authors</th>                    
                      	<th>Journal</th>
                      	<th>Year</th>
                    </tr>
                  </thead>
                  <tbody id="studentlistbyyear">
	              	<?php $i=1; ?>		                  	
                  		@foreach($getallpublication as $val)
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
                  </tbody>
                </table>
            </section>
            @else
                <section class="panel">
					No result found !
				</section>
          	@endif
		</div>