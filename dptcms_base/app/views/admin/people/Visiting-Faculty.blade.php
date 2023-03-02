@extends('admin.layouts.main')

@section('header-title')
   <title>Admin Panel - Visiting faculty | DeptCMS</title>
@stop

@section('content')
   <div class="col-sm-12">
     <!-- .breadcrumb -->
      <ul class="breadcrumb">
        <li><a href="{{url('admin/home')}}" class="link"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{url('admin/people')}}" class="link"><i class="fa fa-user"></i> People</a></li>
        <li class="active"> Visiting Faculty</li>
      </ul>
     <!-- / .breadcrumb -->
    <section class="panel">
       <header class="panel-heading text-right bg-light">
         <ul class="nav nav-tabs pull-left">
           <li class="active"><a href="#faculties" data-toggle="tab"><i class="fa fa-user text-default"></i> Visiting Faculty Members</a></li>
          <!--  <li class="">
             <a href="#editFacultyPage" data-toggle="tab"><i class="fa fa-pencil text-default"></i> Edit Faculty Page Content</a>              
           </li> -->
         </ul>
         <span class="v-spacer-16"></span>
       </header>
       <div class="panel-body">
         <div class="tab-content">              
           <div class="tab-pane fade active in" id="faculties">
               <header class="panel-heading">
                 Visiting Faculty Members
                 <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
               </header>
               <div class="table-responsive">
                 <table class="table table-striped m-b-none" id="visitingTable">
                   <thead>
                     <tr>
                        <th width="20%">Name</th>
                         <th width="20%">Designation</th>
                         <th width="15%">Email</th>
                         <th width="10%">Phone No.</th>
                         <th width="11%">Office</th>
                          <th>Opeartions</th>
                     </tr>
                   </thead>
                   <tbody>
                   </tbody>
                 </table>
               </div>
           </div>
           <!-- <div class="tab-pane fade " id="editFacultyPage">
               
           </div> -->
         </div>
       </div>
     </section>     
   </div>
      <script type="text/javascript">
    var root="{{url('/')}}";
    var oTable;
      $(document).ready(function() {
            $('#visitingTable').dataTable( {
                "processing": true,
                "serverSide": true,
                "sAjaxSource": "{{ URL::to('admin/allvisitingfaculty')}}",
            });
      });
    </script>

@stop
