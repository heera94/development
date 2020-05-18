@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
    
	<div class="card-body ">
    <h3 class="card-title text-left text-center">Please check your email!</h3>

    
    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
    {!! session('message.content') !!}
    </div>
    @endif
       
        @if($errors->any())
        <div  class="alert alert-danger text-center">
         <h5>{{$errors->first()}}</h5>
         </div>
        @endif
      
		<div class="card-text">
            <form method="POST" id="verify-otp" action="{{url('/verify-otp')}}">
                @csrf
                
                <div class="form-group">
					<label for="exampleInputEmail1">Enter the OTP </label>
                    <input type="number" name="otp" value="otp" id="otp" class="form-control form-control-sm" required placeholder=" Enter OTP">
                  
                </div>
               

				<button href="{{url('/success')}}" type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
		</div>
	
</div>
        </div>
    </div>
</div>
@endsection

<script src="{{asset('modules/admin/otp/otp.js')}}"></script>


