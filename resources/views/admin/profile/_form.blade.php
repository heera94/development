
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
     
     
        
    </div>
    
</div>

@include('admin.shared._components.image-crop', ['url' => url('/upload-user-image')])

      