@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>

                @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
    {!! session('message.content') !!}
    </div>
@endif
                   
                <div class="card-body">
                    <form method="POST" id= "save-register"action="{{url('/save-register')}}">
                        @csrf

                        <div class="form-group ">
                            <label for="name" >Name*</label>

                        
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group ">
                            <label for="email" >Email*</label>

                           
                                <input id="email" type="email" class="form-control form-control-sm @ @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password" >{{ __('Password') }}*</label>

                          
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm">{{ __('Confirm Password') }}*</label>

                            
                                <input id="password-confirm" type="password" class="form-control form-control-sm " name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
                        <div class="form-group ">
                            <label for="city" >City*</label>

                           
                                <input id="city" type="city" class="form-control form-control-sm " name="city" required autocomplete>
                           
                        </div>
                        <div class="form-group ">
                            <label for="dob" >Date of birth*</label>

                           
                                <input id="dob"  class="date-picker form-control form-control-sm"  type="date"  name="dob">
                           
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
        
    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('modules/auth/js/change-password.js')}}"></script>
@endsection

