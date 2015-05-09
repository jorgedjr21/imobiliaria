<div class="form-group has-feedback @if($errors->has('email')) has-error @endif">
    {!! Form::text('email',Form::old('email'),['class'=>'form-control','placeholder'=>'Email']) !!}
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    @if($errors->has('email')) <p class="help-block">{{$errors->first('email')}}</p> @endif
</div>

<div class="form-group has-feedback @if($errors->has('password')) has-error @endif">
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    @if($errors->has('password')) <p class="help-block">{{$errors->first('password')}}</p> @endif
</div>

<div class="row">
    <div class="col-xs-8">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('remember',1,['class'=>'checkbox'])!!}
                Remember Me
            </label>
        </div>
    </div><!-- /.col -->

    <div class="col-xs-4">
        {!! Form::button('Login',['class' => 'btn btn-primary btn-block btn-flat','type'=>'submit']) !!}
    </div>
</div>