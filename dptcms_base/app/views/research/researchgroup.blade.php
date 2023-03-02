@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
	@parent
	<script src="{{URL::asset('js/datatables/datatables.css')}}"></script>
@stop

@section('content')
	<div class="col-sm-12">
		<div id="researchGroup">
			<div class="col-sm-8">
				<h3 class="dpt-text-dark">Research Group<label class="label label-warning text-sm m-l">Page Under Construction</label></h3>
			</div>
			<div class="col-sm-4">
				<ol class="breadcrumb pull-right">
				  <li><a href="#">Research</a></li>
				  <li class="active">Research Group</li>
				</ol>
			</div>
		</div>
		<div class="col-sm-12 line line-solid"></div>
		<form class="form-inline m-b" align="center" role="form" action="javascript:void(0)">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" id="searchgroup" placeholder="Search group" style="border-color: #C5B7B7;">
				<span class="fa fa-search form-control-feedback"></span>
			</div>
		</form>
	</div>
	<div class="col-sm-12" align="center">
		@if(count($getallgroup))
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
		                <div class="col-xs-9 dpt-bg-lighter" style="">
		                	<div style="height: 130px;padding: 0px; display: table-cell; vertical-align: middle;">
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

			                    <div class="hide" style="padding: 15px 15px 10px 15px;float:right">
									@if(($ttluser>2))
									<b class="badge dpt-bg-dark pull-right">+{{($ttluser-2)}} Members</b>
									@endif
								</div>
							</div>
		                </div>
		            </div>	
	            </div>			
			@endforeach
		@else
			<span class="text-muted wrapper text-center center-block">
		        <i class="fa fa-warning fa-4x"></i> <br/>Sorry! There are no existing groups or the list has not been updated.
		    </span>
		@endif
	</div>
@stop

@section('footer-scripts')
	@parent
	<!-- datatables -->
  	<script src="{{URL::asset('js/datatables/jquery.dataTables.min.js')}}"></script>
  	
@stop
