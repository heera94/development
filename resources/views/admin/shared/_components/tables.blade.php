

@if(! empty($tableHead))

@php 
      //array_unshift($tableHead, 'id'); 
      array_push($tableHead, 'created by', 'created at', 'status', 'actions')
@endphp

<table id={{(! empty($tableId)) ? $tableId : rand() }} class="table table-flush" id="datatable-basic" style="width: 100% !important;">
      <thead class="thead-light">
            <tr>        
                  @php $checkBox = '<th><input type="checkbox" class="check-all" /> Sl No</th>'; @endphp

                  @if(! empty($hideCheckBox))

                        @if($hideCheckBox != true)

                              {!! $checkBox !!}

                        @else 

                        <th>{{(! empty($indexColumn)) ? $indexColumn : 'Sl No'}}</th>

                        @endif

                  @else 

                        {!! $checkBox !!}             

                  @endif

                  @foreach($tableHead as $head)
                        @if(! empty($hideColumn))
                              @if(! in_array($head, $hideColumn))
                                    <th>{!! $head !!}</th>
                              @endif

                        @else 

                        <th>{{$head}}</th>

                        @endif
                        

                  @endforeach

                  
            </tr>
      </thead>
      <tbody>
      </tbody>
</table>    
@else 
      @include('admin.shared._components.text-error', ['message' => 'Missing table head'])
@endif



@push('module-script')
<!-- Datatable -->
<script src="{{asset('plugins/datatable/datatable.js')}}"></script>  
@endpush