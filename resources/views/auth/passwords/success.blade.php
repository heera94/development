@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
    
	<div class="card-body ">
    <h3 class="card-title text-left text-center">Registration Successfully completed!</h3>

		<div class="card-text">
            <div>
            <a href="{{url('/login')}}" type="submit" class="btn btn-primary btn-block">Back to login</a>
            </div>
		</div>
	
</div>
        </div>
    </div>
</div>
@endsection




