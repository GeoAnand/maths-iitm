<div class="col-sm-12">
			<h3 style="display:inline">Publications : </h3>
			<h5 style="display:inline" class="pull-right">Total : ({{count($getallbooks)}})</h5>
			@if(count($getallbooks))
			<section class="panel">
                <table class="table table-striped m-b-none text-sm">
                  <thead>
                    <tr>
                    	<th>#</th>
                      	<th>Name</th>
                      	<th>Authors</th>                    
                      	<th>Publisher</th>
                      	<th>Year</th>
                    </tr>
                  </thead>
                  <tbody id="studentlistbyyear">
	              	<?php $i=1; ?>		                  	
                  		@foreach($getallbooks as $val)
		                  	<tr>                    
		                      	<td>
		                     		{{$i}} 
		                      	</td>
		                      	<td>
		                      		{{$val->book_name}}
		                      	</td>
		                      	<td>
		                       		{{$val->book_authors}}
		                      	</td>
		                      	<td>
		                      		{{$val->book_publisher}}
		                      	</td>
		                      	<td>
		                       		{{$val->book_year}}
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