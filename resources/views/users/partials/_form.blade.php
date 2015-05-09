<div class="form-group @if($errors->has('name')) has-warning @endif">
    {!! Form::label('name','Name:',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('name',Form::old('name'),['class'=>'form-control']) !!}
        @if($errors->has('name')) <p class="help-block">{{$errors->first('name')}}</p> @endif
    </div>
</div>

<div class="form-group @if($errors->has('email')) has-warning @endif">
    {!! Form::label('email','Email:',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('email',Form::old('email'),['class'=>'form-control']) !!}
        @if($errors->has('email')) <p class="help-block">{{$errors->first('email')}}</p> @endif
    </div>
</div>

<div class="form-group @if($errors->has('password')) has-warning @endif">
    {!! Form::label('password','Password:',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::password('password',['class'=>'form-control']) !!}
        @if($errors->has('password')) <p class="help-block">{{$errors->first('password')}}</p> @endif
    </div>
</div>

<div class="form-group @if($errors->has('password_confirmation')) has-warning @endif">
    {!! Form::label('password_confirmation','Password Confirmation:',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        @if($errors->has('password_confirmation')) <p class="help-block">{{$errors->first('password_confirmation')}}</p> @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
    {!! Form::submit($submit_text,['class'=>'btn btn-primary btn-lg']) !!}
    </div>
</div>