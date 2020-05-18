@extends('layouts.admin.app')
@section('content')
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <div class="cui-utils-title">
                 
               </div>
               <div class="cui-utils-title-description text-center">
               <strong>Dashboard</strong>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead class="thead-default">
                        <tr>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Age</th>
                           <th>Office</th>
                           <th>Date</th>
                           <th>Salary</th>
                        </tr>
                     </thead>
                     <tr>
                        <td>Damon</td>
                        <td>5516 Adolfo Green</td>
                        <td>18</td>
                        <td>Littelhaven</td>
                        <td>2014/06/13</td>
                        <td>553.536</td>
                     </tr>
                     <tr>
                        <td>Miracle</td>
                        <td>176 Hirthe Squares</td>
                        <td>35</td>
                        <td>Ryleetown</td>
                        <td>2013/09/27</td>
                        <td>784.802</td>
                     </tr>
                     <tr>
                        <td>Torrey</td>
                        <td>1995 Richie Neck</td>
                        <td>15</td>
                        <td>West Sedrickstad</td>
                        <td>2014/09/12</td>
                        <td>344.302</td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
