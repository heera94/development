@extends('layouts.app')
@section('page-title', 'Sign In')

@php $hideForgotPassword = true; @endphp


@section('content')

{!! Form::open(['route' => ['login'] ]) !!}
  <div class="form-group mb-3">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
      </div>
     
      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
    </div>
    @error('email')
        <span style="color: red;font-size: 13px;" role="alert">
            <div>{{ $message }}</div>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
      </div>
      {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

    </div>
    @error('password')
        <span style="color: red;font-size: 13px;" role="alert">
            <div>{{ $message }}</div>
        </span>
    @enderror
  </div>
  
  <div class="text-center">
    <button type="submit" class="btn btn-primary my-4">Sign in </button>
  </div>
  {!! Form::close() !!}

@endsection
