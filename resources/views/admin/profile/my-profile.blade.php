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
        'pageTitle' => 'Personal Details',
        'pageRow' => 'col-md-9',
        'showPage' => true
      ])

      @slot('setView')
        <div class="row">
          <div class="col-md-12">
            <strong><label>Name : </label></strong>
            <span>{{Auth::user()->name}}</span>
            <br>
            <strong><label>Email : </label></strong>
            <span>{{Auth::user()->email}}</span>
            <br>
            <strong><label>City : </label></strong>
            <span>{{$user->city}}</span>
            <br>
            <strong><label>Date of birth : </label></strong>
            <span>{{$user->dob}}</span>
          </div>
          <hr/>
        </div>
        <div>
        <a  style="float:right" href="{{url('/edit-profile')}}" type="button" class="btn btn-primary">Edit Profile</a>
        </div>
    
      @endslot

    @endcomponent
    

  @endcomponent

@endsection

