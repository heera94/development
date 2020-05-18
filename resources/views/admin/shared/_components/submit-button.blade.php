<div class="row mt-3">
  <div class="col-md-12 text-right">
    {!! Form::button('<i class="fas fa-times text-danger"></i> Clear',['type'=>'button','class' => 'btn btn-secondary form-clear']) !!}
    {!! Form::button((isset($name)) ? $name : 'Button',['type'=>'submit','class' => 'btn btn-info']) !!}
  </div>
</div>
