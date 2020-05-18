@extends('layouts.admin.app')
@section('title', 'Create')
@section('content')
<div class="row">
   <div class="col-md-8 ">
      <div class="card">
         <!-- Card header -->
         <div class="card-header">
            <h3 class="mb-0">{{trans('forms.create-newuser')}}</h3>
            <div class="col-12 text-right">
              <a href="{{ route('users.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>
          </div>
          <!-- Card body -->
          <div class="card-body">
            {!! Form::open(['route' => ['users.store']]) !!}
                @include('user._form')
                <!-- Submit Form Button -->
            {!! Form::close() !!}
            <div>Note:<p class="mandatory"> fields are Mandatory</p><div>
          </div>
       </div>
    </div>
</div>
</div>
</div>

@endsection
@section('script')
<link rel="stylesheet" href="{{asset('css/image.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script src="{{asset('js/admin/user/cropimage.js')}}" type="text/javascript"></script>
@endsection
