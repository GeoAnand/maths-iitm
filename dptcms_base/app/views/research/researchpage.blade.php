@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
	@parent
	<script src="{{URL::asset('js/datatables/datatables.css')}}"></script>
@stop

@section('content')		
	<div class="col-sm-12" style="background: #fff;">
		<div class="row">
			<section class="panel">
	            <header class="panel-heading bg-light">
	              <ul class="nav nav-tabs nav-justified">
	                <li class="active"><a href="#researchArea" data-toggle="tab"><i class="fa fa-list text-default"></i> Major areas of Research</a></li>
	                <li class=""><a href="#researchGroups" data-toggle="tab"><i class="fa fa-users text-default"></i> Research Groups</a></li>
	                <li class=""><a href="#recentPublications" data-toggle="tab"><i class="fa fa-book text-default"></i> Recent Publications</a></li>
	              </ul>
	            </header>
	            <div class="panel-body">
	              <div class="tab-content">
	                <div class="tab-pane active" id="researchArea">
	                	<div id="majorAreasOfResearch">
							<div class="col-sm-8">
								<h3 class="dpt-text-dark">Major Areas of Research</h3>
							</div>
							<div class="col-sm-4">
								<ol class="breadcrumb pull-right">
								  <li>Research</li>
								  <li class="active">Major Areas of Research</li>
								</ol>
							</div>
						</div>

						<div class="col-sm-12 line line-solid"></div>
						@foreach($getallinfo as $val)
							<article style="padding: 10px;">
								{{$val->researchinfo_desc}}
							</article>
							<div align="center" style="padding: 10px;">
								@if($val->researchinfo_image)
									<img src="{{URL::asset('siteimages/'.$val->researchinfo_image)}}"/>
								@endif
							</div>
						@endforeach
						<br/>
	                </div>
	                <div class="tab-pane" id="researchGroups">
	                	@if(count($getallgroup))
							<div class="col-sm-12">
								<div id="researchGroup">
									<div class="col-sm-8">
										<h3 class="dpt-text-dark">Research Group<label class="label label-warning text-sm m-l hide">Page Under Construction</label></h3>
									</div>
									<div class="col-sm-4">
										<ol class="breadcrumb pull-right">
										  <li>Research</li>
										  <li class="active">Research Group</li>
										</ol>
									</div>
								</div>
								<div class="col-sm-12 line line-solid"></div>
								<form class="form-inline m-b m-t" align="center" role="form" action="javascript:void(0)">
									<div class="form-group has-feedback">
										<input type="text" class="form-control" id="searchgroup" placeholder="Search group" style="border-color: #C5B7B7;">
										<span class="fa fa-search form-control-feedback"></span>
									</div>
								</form>
							</div>
							<div class="col-sm-12" align="center">
								@foreach($getallgroup as $val)
									<div class="researchgroup">
										<div class="row" style="margin:0px">
							                <div class="col-xs-3 groupfollow dpt-bg-lighter">
							                    <div class="padder-v">
							                    	<span class="m-l m-b-xs h4 block">
							                    		<i class="fa fa-users fa-3x"></i>
							                    	</span>
							                        <!-- <small class="text-muted block">{{count(array_values(array_filter(explode(',',$val->researchgroup_users))))}} Followers</small> -->
							                    </div>
							                </div>
							                <div class="col-xs-9 dpt-bg-lighter">
												<div style="display: table;height: 130px;padding: 0px;">
													<div style="display: table-cell; vertical-align: middle;">
														<a href="{{url('researchgrouppage/'.$val->id)}}">
											            <div class="">
													        <p class="researchgroup-title font-bold">
													        	@if(strlen($val->researchgroup_name)>66) 
								                            		{{substr($val->researchgroup_name,0,66)}} ...
								                            	@else
								                            		{{$val->researchgroup_name}}
								                            	@endif
								                            </p>
													        <span class="text-muted">
														        @if(strlen($val->researchgroup_desc)>105) 
								                            		{{substr($val->researchgroup_desc,0,105)}} ...
								                            	@else
								                            		{{$val->researchgroup_desc}}
								                            	@endif
							                            	</span>
													    </div>
													    </a>
														<div class="hide" style="padding: 1px 15px 0px 15px;float:left">
															<?php $ttluser=0;?>
									                    	@if($val->researchgroup_users)
														    	<?php
														    		$tmp=array_values(array_filter(explode(',',$val->researchgroup_users)));
														    		$ttluser=count($tmp);
														    	?>
														    	<ul>
														    	@for($i=0;$i < $ttluser && $i < 2;$i++)
														    		<li>
													    				<?php $getuser=User::find($tmp[$i]);?>
														    			@if(count($getuser))
														    			<small class="text-muted rg-user-small">
														    				<a href="{{url($getuser->user_namehandle)}}" target="_blank">
														    					{{$getuser->user_title.' '.$getuser->user_fname.' '.$getuser->user_lname}}
														    				</a>
														    			</small>
														    			@endif					    				
													    			</li>
														    	@endfor
														    	</ul>									    	
														    @endif
											    		</div>
											    		@if(($ttluser>2))
											    		<div class="hide" style="padding: 5px 15px 5px 15px;float:right">										
															<b class="badge dpt-bg-dark pull-right">+{{($ttluser-2)}} Members</b>
														</div>
														@endif
													</div>
												</div>
							                </div>
							            </div>	
						            </div>			
								@endforeach
							</div>
						@endif
	                </div>
	                <div class="tab-pane" id="recentPublications">
	                	@if(count($getRecentPublications))
							<div class="col-sm-12 m-t-lg">			
								<div id="recentPublications">
									<div class="col-sm-8">
										<h3 class="dpt-text-dark">Recent Publications</h3>
									</div>
									<div class="col-sm-4">
										<ol class="breadcrumb pull-right">
										  <li>Research</li>
										  <li class="active">Recent Publications</li>
										</ol>
									</div>
								</div>
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
						              	<?php $current_page_number=$getRecentPublications->getCurrentPage(); $items_per_page=$getRecentPublications->getPerPage(); ?>
						              	<?php $count = (($current_page_number - 1) * $items_per_page) + 1; ?>      	
						              		@foreach($getRecentPublications as $val)
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
							                      		<p>@if($val->volume) Volume: <span class="pub-volume">{{$val->volume}} @endif @if($val->pages)</span> Page: <span class="pub-page">{{$val->pages}}</span>@endif @if($val->doi) <span class="pub-doi"><a href="http://dx.doi.org/{{$val->doi}}">DOI:{{$val->doi}} </a></span>@endif				
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
								      {{$getRecentPublications->links()}}
								    </div>						            
						        </section>
							</div>
						@endif
	                </div>
	              </div>
	            </div>
	        </section>
	    </div>
	</div>
@stop

@section('footer-scripts')
	@parent
	<!-- datatables -->
  	<script src="{{URL::asset('js/datatables/jquery.dataTables.min.js')}}"></script>  	
  	<script type="text/javascript">
  		$(document).on("click", "#publicationsPaginate .pagination a", function(e){
			e.preventDefault();
			$.get($(this).attr('href'), function(data){
				var studentlistbyyear = $(data).find("#studentlistbyyear").html();
				var publicationsPaginate = $(data).find("#publicationsPaginate").html();
				$("#studentlistbyyear").html(studentlistbyyear);
				$("#publicationsPaginate").html(publicationsPaginate);
			});	
		});
  	</script>
@stop
