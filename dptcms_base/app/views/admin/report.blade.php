@extends('admin.layouts.main')

@section('header-title')
    <title> Admin Panel - Home | DeptCMS</title>
@stop

@section('content') 
 <div class="col-md-12 col-xs-12 col-sm-12">
  <ul class="breadcrumb">
      <li><a href="#"><i class="fa fa-bar-chart-o"></i>&nbsp;Report Statistics</a></li>
  </ul>
  <section class="panel" style="min-height: 200px;">
      <div class="panel-body">
          <form action="admin/report/pubdownload" class="form-horizontal" role="form" id="reportform">
            <div class="form-group">
              <div class="col-sm-2">
                <label>Report Type : </label>
              </div>
              <div class="col-sm-10">
                <select name="account" class="form-control" id="reportmodule"> 
                  <option value="0">--Select Report Type--</option>
                  <option value="people">People</option>
                  <!--<option value="student">Student</option> -->
                  <option value="publication">Publication</option>
                  <option value="books">Books</option>
                  <option value="events">Events</option>
                  <option value="activities">Activities</option>
                 <!--  <option value="resources">Resource</option> -->
                  <option value="news">News</option>
                  <option value="announcement">Announcement</option>
                </select>
              </div>
           </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label>Report From : </label>
              </div>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="reportfrom" name="reportfrom" data-date-format="YYYY-MM-DD" placeholder="Start Date" title="Start Date" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label>Report To : </label>
              </div>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="reportto" name="reportto"data-date-format="YYYY-MM-DD" placeholder="To Date(Default Today)" title="To Date(Default Today)">
              </div>
            </div>
            <div class="col-sm-10 col-sm-offset-2 m-t-sm">
              <button type="submit" class="m-l-n-sm btn btn-default"><i class="fa fa-eye"></i> View Report</button>
              <a href="#" class="btn btn-primary" id="downloadReport"><i class="fa fa-download"></i> Generate .xls Report</a>
            </div>
          </form>                  
      </div>
      <div class="panel-body" id="resultBody">
          <h4 style="text-align:center">Select above options to get Report</h4>
      </div>
  </section>
 </div>    
@stop