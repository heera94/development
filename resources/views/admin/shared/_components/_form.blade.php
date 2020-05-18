

@if(! empty($formType))

@if(empty($formUrl))
  @include('admin.shared._components.text-error', ['message' => 'The form action url is empty'])

  @else

  @if($formType == 'new')

    {!! Form::open(['route' => $formUrl, 'id' => (! empty($formId)) ? $formId : rand()]) !!}

  @elseif($formType == 'update')

    {!! Form::model($result, ['method' => 'PUT', 'route' => [$formUrl,  (! empty($id)) ? $id : ''  ] ]) !!}

  @endif

  @if(! empty($_form))

    @if($formType == 'update')

      @if((empty($id)))
        @include('admin.shared._components.text-error', ['message' => 'Form action(Update) "id" is empty.'])
      @endif

    @endif

    @include($_form)

  @else

  @include('admin.shared._components.text-error', ['message' => 'The _form url is empty'])

  @endif

  @php $name = '<i class="fas fa-edit"></i> Update' @endphp

  @if($formType == 'new')
    @php $name = '<i class="fas fa-check"></i> Submit' @endphp
  @endif
  @if(! empty($hideSubmit))
    @if($hideSubmit !== true)
      @include('admin.shared._components.submit-button', ['name' => $name])
    @endif

  @else
    @include('admin.shared._components.submit-button', ['name' => $name])
  @endif

  {!! Form::close() !!}

@endif

@else
  @include('admin.shared._components.text-error', ['message' => 'The form type is empty'])
@endif

@push('module-script')
<script src="{{asset('plugins/form-validation/form-validation.js')}}"></script>
@endpush
