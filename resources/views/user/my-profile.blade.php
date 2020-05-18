@extends('layouts.admin.app')
@section('title', 'My Profile')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <!-- Card header -->
         <div class="card-header">
            <h3 class="mb-0">{{trans('forms.user-profile')}}</h3>
            <a style="float:right" href="#" ></i>Edit Profile</a>
         </div>
         <!-- Card body -->
         <div class="row">
            <div class="col-md-3">
               <div class="d-flex p-3">
                  <div>
                    
                  </div>
                  <div class="col-md-9 ml-3">
                     <div class="row">
                        <h3>
                           {!! Form::label('name',$userDetails->name) !!}
                        </h3>
                     </div>
                     <div class="row">                      
                        {!! Form::label('Email',$userDetails->email) !!}
                     </div>
                     <div class="row">
                        <h3>
                        <h3>{!! Form::label('location','Location') !!}:</h3>
                       
                     </div>
                     <div class="row">
                        <h3>
                        <h3> {!! Form::label('mobile','Mobile Number') !!}:</h3>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<link rel="stylesheet" href="{{asset('css/image.css')}}">
@endsection
