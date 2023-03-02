@extends('layout.main')

@section('header-title')
    <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
@stop

@section('content-heading')
Publications
@stop

@section('content')	
  
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-8">
        <h3 class="dpt-text-dark">Publication</h3>
      </div>
      <div class="col-sm-4">
        <ol class="breadcrumb pull-right">
          <li><a href="#">Research</a></li>
          <li class="active">Publications</li>
        </ol>
      </div>
      <div class="col-sm-12 line line-solid"></div>
    </div>      
  </div>
    
  <div class="wrapper">
    <section class="panel">
      <div class="panel-body">
        <div class="col-md-12">
            <h3 class="font-bold m-b">{{$getpublicationdetails['title']}}</h3>
            @if($getpublicationdetails['bibliography']!="")
              <h4 class="font-bold m-t m-b-none">Bibliography:</h4>
              <span style="font-size:14px;">{{$getpublicationdetails['bibliography']}}</span>    <br/>                  
            @endif

            @if($getpublicationdetails['author']!="")
              <h4 class="font-bold m-t m-b-none">Authors:</h4>              
              <span style="font-size:14px;">
              <?php 
                // $getauthors=array_values(array_filter(explode(',',$getpublicationdetails['author'])));
              ?>
              {{-- @for($i=0;$i < count($getauthors);$i++) --}}
                <?php 
                  // $getauthname=User::find($getauthors[$i]);
                ?>
              {{-- {{$getauthname->user_fname}} {{$getauthname->user_lname}} --}}
              {{-- @endfor --}}
              {{$getpublicationdetails['author']}}
              </span>    <br/>                  
            @endif

            @if($getpublicationdetails['journal']!="")
              <h4 class="font-bold m-t m-b-none">Journal:</h4>
              <span style="font-size:14px;">{{$getpublicationdetails['journal']}}</span>    <br/>                  
            @endif

            @if($getpublicationdetails['year']!="")
              <h4 class="font-bold m-t m-b-none">year:</h4>
              <span style="font-size:14px;">{{$getpublicationdetails['year']}}</span>    <br/>                  
            @endif

            @if($getpublicationdetails['abstract']!="")
              <h4 class="font-bold m-t m-b-none">Abstract:</h4>
              <span style="font-size:14px;">{{$getpublicationdetails['abstract']}}</span>    <br/>                  
            @endif

            @if($getpublicationdetails['issn']!="")
              <h4 class="font-bold m-t m-b-none">ISSN:</h4>
              <span style="font-size:14px;">{{$getpublicationdetails['issn']}}</span>    <br/>                  
            @endif

            @if($getpublicationdetails['url']!="")
              <h4 class="font-bold m-t m-b-none">Website:</h4>
              <a href="{{$getpublicationdetails['url']}}">
              <span style="font-size:14px;">{{$getpublicationdetails['url']}}</span></a>    <br/>                  
            @endif
            
        </div>    
      </div>
    </section>
  </div>
@stop