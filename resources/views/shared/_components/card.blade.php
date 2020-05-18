    <div class={{(! empty($pageProperties['pageRow'])) ?  $pageProperties['pageRow'] : ''}}>
       <div class="card">
          <!-- Card header -->
           <div class="card-header bt-filt">
                <div class="d-flex">
                    <h3 class="mb-0 w-100">{!! (! empty($pageProperties['pageTitle'])) ? '<i class="far fa-file-alt"></i> '.$pageProperties['pageTitle'] : '' !!}</h3>

                    <div class="ml-md-auto w-100 text-right">

                        @if(! empty($form))

                            @if(! empty($pageProperties['backUrl']))
                                @if($pageProperties['backUrl'] != 'hide')
                                    @include('admin.shared._components.back-btn', ['url' => (! empty($pageProperties['backUrl'])) ? $pageProperties['backUrl'] : ''])
                                @endif

                            @else

                            @include('admin.shared._components.back-btn')

                            @endif

                        @endif

                        @if(! empty($pageProperties['createUrl']))
                              @include('admin.shared._components.anchor-button', [
                                  'url' => (! empty($pageProperties['createUrl'])) ? $pageProperties['createUrl'] : '',
                                  'buttonName' => (! empty($pageProperties['buttonName'])) ? $pageProperties['buttonName'] : ''
                              ])
                        @endif

                        @if(! empty($filter))
                            <button class="btn-filter" data-toggle="tooltip" data-placement="top" title="Filter" onclick="openNav()" onclick="closeNav()"> <i class="ni ni-align-center p-1 "></i> </button>
                        @endif

                    </div>
                </div>
                @if(! empty($filter))
                <div class="mt-3  collapse" id="collapseExample">
                </div>
                <div id="mySidenav" class="sidenavs">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> <span
                        class="cls-filt-hed">Filter</span> <span class="cls-nav"> &times; </span> </a>
                    <div class="filter-data">
                        {{(! empty($filter)) ? $filter : ''}}

                        <div class="text-right">
                            <button onClick="closeNav()" class="btn btn-sm btn-secondary clear-datatable-filter">Clear</button>
                            <button class="btn btn-sm btn-primary filter-datable-data">Filter</button>
                        </div>
                    </div>
                </div>
                @endif
           </div>
           <div class="card-body wait-loader">
                <div>
                    <div class="block text-center">
                        <p class="circle">
                            <span class="ouro ouro3">
                            <span class="left"><span class="anim"></span></span>
                            <span class="right"><span class="anim"></span></span>
                            </span>
                        </p>
                        <div style="margin-top: -31px;font-size: 13px;">Please wait...</div>
                    </div>
                </div>
           </div>

            @if(! empty($table))
                @php $cardClass = "hidden py-4"; @endphp
            @else
                @php $cardClass = "hidden card-body"; @endphp
            @endif

           <!-- Card body -->
           <div class="{{$cardClass}} after-wait-card-section">
               @if(empty($setView))
                    @if(! empty($table))
                        @include('admin.shared._components.tables', $table)
                        @include('admin.shared._components.delete-confirm-model')
                    @else
                        {{ (! empty($form)) ? $form : null }}
                    @endif

                @else
                    {{$setView}}
                @endif
            </div>
         </div>
     </div>
