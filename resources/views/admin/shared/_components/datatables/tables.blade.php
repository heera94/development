<div class="row">
        <div class="col">
           <div class="card">
              <!-- Card header -->
              <div class="card-header bt-filt">
                 <div class="d-flex">
                    <h3 class="mb-0 w-100">{{(! empty($pageProperties)) ? $pageProperties['pageTitle'] : ''}}</h3>

                    <div class="ml-md-auto w-100 text-right">
                       @include('admin.shared._components.anchor-button', ['url' => (! empty($pageProperties)) ? $pageProperties['createUrl'] : ''])

                        @if(! empty($filter))
                            <button class="btn-filter" data-toggle="tooltip" data-placement="top" title="Filter" onclick="openNav()" onclick="closeNav()"> <i class="ni ni-align-center p-1 "></i> </button>
                        @endif

                    </div>
                 </div>
                 <div class="mt-3  collapse" id="collapseExample">
                 </div>
                 <div id="mySidenav" class="sidenavs">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> <span
                       class="cls-filt-hed">Filter</span> <span class="cls-nav"> &times; </span> </a>
                    <div class="filter-data">
                       {{(! empty($filter)) ? $filter : ''}}
                    </div>
                 </div>
              </div>
              <!-- Modal -->
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">WQR12R</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
                       <div class="container">
                          <div class="row">
                             <div class="col-md-6">
                                <div class="modal-body">
                                   <div class="card card-profile shadow">
                                      <div class="row justify-content-center">
                                         <div class="col-lg-3 order-lg-2">
                                         </div>
                                      </div>
                                      <div class="card-body py-3 pb-4">
                                         <div class="row">
                                            <div class="col">
                                               <div class="card-profile-stats d-flex justify-content-center mt-md-0">
                                                  <div>
                                                     <span class="description">27 July 2019, Monday</span><span class="heading">10:30
                                                     AM</span>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="text-center pat-name">
                                            <h3>Fanto Jose<span class="font-weight-light">, 32 M</span>
                                            </h3>
                                            <div class="h5 font-weight-300">
                                               <i class="fa fa-phone-square" aria-hidden="true"></i> 69835542236
                                            </div>
                                            <hr>
                                            <div class="h4 mt-4">
                                               <i class="ni business_briefcase-24 mr-2"></i> Dr Mohammed Mansoor
                                            </div>
                                            <div class="dot-name">
                                               <i class="ni education_hat mr-2"></i>PEDIATRICS
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="modal-body">
                                   <div class="card card-profile shadow">
                                      <div class="card-body py-3 pb-4">
                                         <form>
                                            <div class="form-group mb-1">
                                               <label for="exampleFormControlTextarea1">Notes</label>
                                               <textarea class="form-control height-txt" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <hr>
                                            <div class="form-group mt-0 pb-0 mb-0">
                                               <label class="form-control-label" for="exampleFormControlSelect1">Select</label>
                                               <select class="form-control" id="exampleFormControlSelect1">
                                                  <option>No Show</option>
                                                  <option>Completed</option>
                                               </select>
                                            </div>
                                         </form>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="py-4">
                 <table id={{(! empty($tableProperties)) ? $tableProperties['tableId'] : '#' }} class="table table-flush action-datatable generate-datatable">
                   @csrf
                    <thead class="thead-light">
                      {{(! empty($table)) ? $table : '<tr><th>Header not found</th></tr>'}}

                    </thead>
                    <tbody>

                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
