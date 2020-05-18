<!--Image input -->
<div class="row">
  <div class="col-md-3">
      <div id="preview-crop-image" class="user-profile-img"></div>
      <label for="image" class="btn btn-sm btn-primary mt-3 mb-3 w-100">Upload Profile Picture</label>
      <input type="file" id="image" class="hidden">
      @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
  </div>
</div>
<!-- Name Form Input -->
 <div class="form-group @if ($errors->has('name')) has-error @endif">
     {!! Form::label('name', 'Name',array('class' => 'required')) !!}
     {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
     @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
 </div>

<input type="hidden" name ="image" id="hidden-image-field" value="{{isset($image)?$image:Request::old('image')}}">
 <!-- email Form Input -->
 <div class="form-group @if ($errors->has('email')) has-error @endif">
     {!! Form::label('email', 'Email',array('class' => 'required')) !!}
     {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
     @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
 </div>

 <!-- password Form Input -->
 <div class="form-group @if ($errors->has('password')) has-error @endif">
     {!! Form::label('password', 'Password',array('class' => 'required')) !!}
     {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
     @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
 </div>

 <!--Contact Number Input -->
 <div class="form-group @if ($errors->has('contact_number')) has-error @endif">
     {!! Form::label('Contact Number', 'Contact Number',array('class' => 'required')) !!}
     {!! Form::number('contact_number', isset($user->user_details->contact_number)?$user->user_details->contact_number:null, ['class' => 'form-control', 'placeholder' => 'Mobile Number']) !!}
     @if ($errors->has('contact_number')) <p class="help-block">{{ $errors->first('contact_number') }}</p> @endif
 </div>
 <!--Location Input -->
 <div class="form-group @if ($errors->has('location')) has-error @endif">
     {!! Form::label('Location', 'Location',array('class' => 'required')) !!}
     {!! Form::text('location', isset($user->user_details->location)?$user->user_details->location:null, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
     @if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif
 </div>
 
 {!! Form::button('Submit',['type'=>'submit','class' => 'btn btn-info']) !!}
 <!-- Permissions -->
 @if(isset($user))
     @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
 @endif

 <div class="modal fade" id="crop-image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLongTitle">Crop Image</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <div class="col-md-12 text-center">
                <div id="upload-croper-image"></div>
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary upload-image">Save changes</button>
          </div>
       </div>
    </div>
 </div>



<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif
