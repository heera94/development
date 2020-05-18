@extends('layouts.app')

@section('page-title', 'Password reset')


@section('content')


@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
{!! Form::open(['route' => ['password.email'] ]) !!}
  <div class="form-group mb-3">
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
      </div>
      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    </div>
    @error('email')
        <span style="color: red;font-size: 13px;" role="alert">
            <div>{{ $message }}</div>
        </span>
    @enderror
  </div>
  <div class="text-center mt-4">
      @if(env('GOOGLE_RECAPTCHA_KEY'))
        <div class="g-recaptcha d-inline-block"
              data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
        </div>
        @error('g-recaptcha-response')
          <span style="color: red;font-size: 13px;" role="alert">
              <div>{{ $message }}</div>
          </span>
        @enderror
      @endif
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary my-4">Send Password Reset Link</button>
  </div>
  {!! Form::close() !!}
@endsection
