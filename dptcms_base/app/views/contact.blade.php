@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('header-styles')
@parent
<style type="text/css">
	#contactinfo{
		width: *;
		padding: 5px;
		background: #f1f1f1;
	//	margin-left: 20%;
	}
</style>
@stop

@section('content')
		
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-8">
					<h3 class="dpt-text-dark">Admission Details</h3>
				</div>
				<div class="col-sm-4">
					<ol class="breadcrumb pull-right">
					  <li>Admissions</li>
					  <li class="active">Ph.D-Admission</li>
					</ol>
				</div>
				<div class="col-sm-12 line line-solid"></div>
			</div>			
		</div>		

		<div id="contactinfo" background:"#f1f1f1;">
<!--			@if(count($getcontact))
				<div class="m-b">
					<span style="font-size: 18px;">{{$getcontact[0]['contact_for']}}</span>
				</div>
				<div>
					{{$getcontact[0]['contact_details']}}
				</div>
			@else
				<div>Contact page not updated</div>
			@endif -->

<style type="text/css">
#left_col {
   float:left;
   width:50%;
 background:#f1f1f1;
font-family:"Alegreya";
 font-size:16px;
}
#right_col {
   float:right;
   width:50%;
 background:#f1f1f1;
font-family:"Alegreya";
 font-size:16px;
}
</style>

<div id="contactinfo">
    <div id="left_col">

	<p>This page describes the PhD admission process and syllabus for the admission Test/Interview. Once the applicants are shorlisted and called for the interview, they need to appear for a written test for 2 hours. The candidates should be prepared to answer questions in at least&nbsp; 3 of the following areas.</p>
<ul><li>Linear Algebra &amp; Abstract Algebra</li><li>Real Analysis &amp; Complex Analysis</li><li>Differential Equations (ODE &amp; PDE)</li><li>Discrete Mathematics</li><li>Probability and Statistics</li><li>Topology<br></li></ul>
<h4>Interview<br>
					      </h4>
<div>The candidates who are successful after the test shall appear for an interview. This will be mainly based on one or two<br></div><div>topics that the candidate chooses (typically their area of interest). The areas for the upcoming interviews will be posted <br></div><div>here at the time of announcement.<br></div><div>Kindly <a href="https://mat.iitm.ac.in/phd33.html" target="_blank">click here</a> for more details.</div>

    </div>
    <div id="right_col">
 This page is under updation. Please check back after sometime for more details.    
    </div>
</div>

		</div> 
@stop
