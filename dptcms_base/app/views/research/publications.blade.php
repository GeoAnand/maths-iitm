@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content-heading')
Publications
@stop

@section('header-styles')
@parent
<link rel="stylesheet" href="{{ URL::asset('js/admin/theme/select2/select2.css') }}" type="text/css" />
@stop

@section('footer-scripts')
@parent
<script type='text/javascript' src="{{URL::asset('js/admin/theme/select2/select2.min.js')}}"></script>
<script type="text/javascript">
	$("#noResult").hide();
	$(document).ready(function(){
		$(".select2").select2();
		$("#spinner").hide();
		$(document).on("change", "#select2-pub-year", function(){
			//$('#noResult').hide();
          	$("#spinner").show().delay(300).hide(0);
			var y = $(this).val();
			var i=0;
			$(".each-publication").each(function(index) 
    		{
    			var py = $(this).data('pyear');
    			var pa = $(this).data('pauth');
    			var pk = $(this).data('pjournal');
    			var a = $("#select2-pub-author").val();
    			var k = $("#select2-pub-journal").val();
    			if ((py==y || (py=="all") )&&(pa.indexOf(a)>=0 || a=="all")&&(pk.indexOf(k)>=0 || k=="all")) {
    				$(this).show();
    				i++; console.log(i);
    			} else{
    				$(this).hide();
    			};    			
    		});
    		if(i==0){
				$('#noResult').hide().delay(300).show(0);
			}else{
				$('#noResult').hide();
			}
		});
		$(document).on("change", "#select2-pub-author", function(){
			$('#noResult').hide();
			$("#spinner").show().delay(300).hide(0);
			var a = $(this).val();
			var i=0;
			$(".each-publication").each(function(index) 
    		{
    			var py = $(this).data('pyear');
    			var pa = $(this).data('paddedby');
    			var pau = $(this).data('pauth');
    			var pk = $(this).data('pjournal');
    			var y = $("#select2-pub-year").val();
    			var k = $("#select2-pub-journal").val();
    			
    			if ((py==y || y=="all")&&(pa==a || a=="all")&&(pk.indexOf(k)>=0 || k=="all")) {
    				$(this).show();
    				i++;
    			} else{
    				$(this).hide();
    			};    			
    		});
    		if(i==0){
				$('#noResult').show();
			}else{
				$('#noResult').hide();
			}
		});
		$(document).on("change", "#select2-pub-journal", function(){
			$('#noResult').hide();
			$("#spinner").show().delay(300).hide(0);
			var k = $(this).val();
			var i=0;
			$(".each-publication").each(function(index) 
    		{
    			var py = $(this).data('pyear');
    			var pa = $(this).data('pauth');
    			var pk = $(this).data('pjournal');
    			var a = $("#select2-pub-author").val();
    			var y = $("#select2-pub-year").val();    			
    			if ((py==y || y=="all")&&(pa.indexOf(a)>=0 || a=="all")&&(pk.indexOf(k)>=0 || k=="all")) {
    				$(this).show();
    				i++;
    			} else{
    				$(this).hide();
    			};    			
    		});
    		if(i==0){
				$('#noResult').show();
			}else{
				$('#noResult').hide();
			}
		});
		$(document).on("click", "#searchTitle", function(){
			$('#noResult').hide();
			$("#spinner").show().delay(300).hide(0);
			var b = $("#inputTitle").val().toLowerCase();
			var i=0;
			$(".each-publication").each(function(index) 
    		{    			
    			var pb = $(this).data('ptitle').toLowerCase();
    			
    			if (pb.indexOf(b)>=0) {
    				$(this).show();
    				i++;
    			} else{
    				$(this).hide();
    			};    			
    		});
    		if(i==0){
				$('#noResult').show();
			}else{
				$('#noResult').hide();
			}
		});
		$('#inputTitle').keypress(function(e){
	        if(e.which == 13){//Enter key pressed
	            $('#searchTitle').click();//Trigger search button click event
	        }
	    });
		$(document).on("click", "#clearResults", function(){
			$('#noResult').hide();
			$("#spinner").show().delay(100).hide(0);
			$(".each-publication").each(function(index) 
    		{
    			$(this).show();    				
    		});
    		$('#inputTitle').val('');
		$("#select2-pub-author option").val('All');
		location.reload();
		});
	});
</script>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-8">
				<h3 class="dpt-text-dark">Publications</h3>
			</div>
			<div class="col-sm-4">
				<ol class="breadcrumb pull-right">
				  <li>Research</li>
				  <li class="active">Publications</li>
				</ol>
			</div>
			<div class="col-sm-12 line line-solid"></div>
		</div>			
	</div>
	<div class="wrapper">
		<section class="panel">
            <div class="panel-body">
				@if(count($getpublications))	
					<h4>Find Publications</h4>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
					            <!-- <label class="col-sm-6 control-label">Year</label> -->
					            <div class="">
					              <div class="pull-right m-b">Year:
					                <select id="select2-pub-year"  class="select2" style="min-width:100px;">
				                    	<option value="all">All</option>
				                        @foreach($pubyears as $y)
										<option value="{{$y}}">{{$y}}</option>
										@endforeach                          
					                </select>
					              </div>
					            </div>
					        </div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
					            <!-- <label class="col-sm-6 control-label">Author</label> -->
					            <div class="row" style="padding-left:10px;">
					              <div class="pull-right m-b">Authors:
					                <select id="select2-pub-author" class="select2" style="min-width:180px;">
					                    <option value="all">All</option>
				                        @foreach($getallauthors as $author)
		   				        	<option value="{{$author['id']}}">{{$author['user_fname']}} {{$author['user_lname']}}</option>
										@endforeach                            
					                </select>
					              </div>
					            </div>
					        </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
					            <!-- <label class="col-sm-6 control-label">Keyword</label> -->
					            <div class="row"  style="padding-left:10px;">
					              <div class="pull-right m-b">Journal:
					                <select id="select2-pub-journal" class="select2" style="min-width:200px;">
					                    <option value="all">All</option>	                    
						                    @foreach($pubjournals as $j)
						                    <option value="{{$j}}">{{$j}}</option>					
											@endforeach 
					                </select>
					              </div>
					            </div>
					        </div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">          
				          <div class="col-md-9">
				          	<div class="">Title:
				            	<input type="text" class="form-control pull-right input-md" placeholder="Title" id="inputTitle" style="max-width:450px; border-color:#aaa;">
				            </div>
				          </div>
				          <div class="col-md-3">
				          	<button class="btn btn-md dpt-btn-dark pull-left" id="searchTitle">Search</button>
				            <button class="btn btn-md btn-gray pull-right" id="clearResults">Clear</button>

				          </div>
				        </div>
					</div>	
					<div class="row m-t" id="pubContainer">
						<p class="m-t-lg text-center" id="spinner"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>
						<p class="m-t-lg text-center" id="noResult"><i class="fa fa-warning fa-2x"></i> Sorry! No Publication could be Found.</p>
						@for($i=0;$i < count($getpublications);$i++)	
							<?php 
								$a = $getpublications[$i]['author'];
								// $b = explode(',', $a);
								// foreach ($b as $authid) {
								// 	$c1=User::where('id', '=', $authid)->pluck('user_fname');
								// 	$c2=User::where('id', '=', $authid)->pluck('user_lname');
								// 	$c[] = $c1." ".$c2;
								// }
								// $authors = implode(",",$c);
								$authors = $a;
								$c=[];
							?>
							<section class="panel-body each-publication" data-pyear="{{$getpublications[$i]['year']}}" data-pauth="{{$authors}}" data-pjournal="{{$getpublications[$i]['journal']}}" data-ptitle="{{$getpublications[$i]['title']}}" data-paddedby="{{$getpublications[$i]['added_by']}}">
			                    <a href="{{url('/publications/viewpublication/'.$getpublications[$i]['id'])}}" style="display:block;">
				                    <article class="media">
				                      <div class="pull-left m-r-sm">
				                      	
				                        <span class="fa fa-stack fa-2x">
				                          <i class="fa fa-circle text-light fa-stack-2x"></i>
				                          <i class="fa fa-file-text text-white fa-stack-1x"></i>
				                        </span>
				                        
				                      </div>
				                      <div class="media-body">                        
				                        <a href="{{url('/publications/viewpublication/'.$getpublications[$i]['id'])}}" class="h4">{{$getpublications[$i]['title']}}</a><br/>
				                        <small class="clock m-r"> Authors: {{$authors}}</small><br/>
				                        <em class="text m-r"> Year: {{$getpublications[$i]['year']}}</em>
				                        <em class="text m-r"> Journal: {{$getpublications[$i]['journal']}}</em><br/>
				                        <a href="{{url('/publications/viewpublication/'.$getpublications[$i]['id'])}}"><button class="btn btn-xs btn-info m-t-sm"><i class="fa fa-external-link"></i> Read More</button></a>
				                        @if(!empty($getpublications[$i]['url']))
				                        <a href="{{$getpublications[$i]['url']}}"><button class="btn btn-xs bg-default m-t-sm"><i class="fa fa-link"></i> Website</button></a>
				                        @endif
				                      </div>
				                    </article>
				                </a>
			                    <div class="line line-dashed pull-in"></div>
			                    
			                </section>
							
						@endfor
						
					</div>
				@else
					<span class="text-muted wrapper text-center center-block">
				        <i class="fa fa-warning fa-4x"></i> <br/>Sorry! There are no Publications. Probably data has not been populated. 
				    </span>
				@endif
			</div>
		</section>
	</div>
@stop
