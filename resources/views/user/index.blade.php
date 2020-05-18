@extends('layouts.admin.app')
{{-- Title --}}
@section('title', 'My profile')
{{-- breadcrumbs --}}


@section('content')
  {{-- Card components --}}
  @component('admin.shared._components.row')

    @component('admin.shared._components.card')

      {{-- Page properties --}}
      @slot('pageProperties', [
        'pageTitle' => 'My profile',
        'pageRow' => 'col-md-3',
        'showPage' => true
      ])

      @slot('setView')
        <div class="row">
          <div class="col-md-12 text-center">
            <img style="width: 210px;" class="view-crop-image-block" src="https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?k=6&m=476085198&s=612x612&w=0&h=5cDQxXHFzgyz8qYeBQu2gCZq1_TN0z40e_8ayzne0X0=" alt="User profile">
            <label for="crop-img-resource" class="btn btn-sm btn-seocndary w-100 mt-2">Change image <span class="hidden crop-description">(Image type: png, jpg)</span></label>
            <div>{{Auth::user()->name}}</div>
            <div class="f-s-13">{{Auth::user()->email}}</div>
          </div>
        

        </div>
      @endslot

    @endcomponent


  
    @component('admin.shared._components.card')

      {{-- Page properties --}}
      @slot('pageProperties', [
        'pageTitle' => 'Edit profile',
        'pageRow' => 'col-md-9',
        'showPage' => true
      ])

      @slot('setView')
        
<div class="row">
    <div class="col-md-6">
        <!-- Name Form Input -->
        <div class="form-group @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', 'Name',array('class' => 'required')) !!}
            {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
        </div>
        
        <input type="hidden" name ="image" id="hidden-image-field" value="{{isset($image)?$image:Request::old('image')}}">
        <!-- email Form Input -->
        <div class="form-group @if ($errors->has('email')) has-error @endif">
            {!! Form::label('email', 'Email',array('class' => 'required')) !!}
            {!! Form::text('email', Auth::user()->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>
        <div class="form-group @if ($errors->has('city')) has-error @endif">
            {!! Form::label('city', 'City',array('class' => 'required')) !!}
            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
            @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
        </div>
        <div class="form-group ">
            <label for="dob" >Date of birth*</label>
               <input id="dob"  class="date-picker form-control"  type="date"  name="dob">
        </div>
     
        <div>
        <a   href="{{url('/home')}}" type="button" class="btn btn-primary">Submit</a>
        </div>
        
    </div>
    
</div>

@include('admin.shared._components.image-crop', ['url' => url('/upload-user-image')])

      
      @endslot
    @endcomponent

  @endcomponent

@endsection

