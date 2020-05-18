@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
    
	<div class="card-body ">
    <h3 class="card-title text-left text-center">To completete registration get your otp!</h3>


       
        @if($errors->any())
        <div  class="alert alert-danger text-center">
         <h5>{{$errors->first()}}</h5>
         </div>
        @endif
      
		<div class="card-text">
            <form method="POST" id="verify-email" action="{{url('/verify-otp')}}">
                @csrf
                
            
               

				<button href= type="submit" class="btn btn-primary btn-block">Get Otp</button>
			</form>
		</div>
	
</div>
        </div>
    </div>
</div>
@endsection

<


