<div style="padding-top:10px">
	@foreach($getall as $val)
		<div style="padding: 10px;">
			<h4>{{$val->course_no.' '.$val->course_name}}</h4>
			<p>
			{{$val->course_details}}
			</p>
			<span><i>References : </i></span>
			<br/><br/>
			<p>{{$val->courser_reference}}</p>
		</div>
	@endforeach
</div>