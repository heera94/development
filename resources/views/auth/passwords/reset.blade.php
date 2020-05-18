@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

{!! Form::open(['route' => ['password.update'] ]) !!}
<input type="hidden" name="token" value="{{ $token }}">
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
    <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
        </div>
        @error('password')
            <span style="color: red;font-size: 13px;" role="alert">
                <div>{{ $message }}</div>
            </span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confrim password']) !!}
        </div>
        @error('password_confirmation')
            <span style="color: red;font-size: 13px;" role="alert">
                <div>{{ $message }}</div>
            </span>
        @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary my-4">Reset password</button>
    </div>
{!! Form::close() !!}

@endsection
