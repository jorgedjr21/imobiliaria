<h4 class="text-info">Property Info</h4>
<div class="row">
    <div class="col-md-2 @if($errors->has('bedrooms')) has-error @endif">
        {!! Form::label('bedrooms','Bedrooms:',['class'=>'col-md-1 control-label']) !!}
        {!! Form::input('number','bedrooms',(Form::old('bedrooms')) ? Form::old('bedrooms') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('bedrooms')) <p class="help-block">{{$errors->first('bedrooms')}}</p> @endif
    </div>

    <div class="col-md-3 @if($errors->has('suiterooms')) has-error @endif">
        {!! Form::label('suiterooms','Suites:',['class'=>'col-md-1 control-label']) !!}
        {!! Form::input('number','suiterooms',(Form::old('suiteroomsrooms')) ? Form::old('suiterooms') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('suiterooms')) <p class="help-block">{{$errors->first('suiterooms')}}</p> @endif
    </div>
    <div class="col-md-3 @if($errors->has('kitchens')) has-error @endif">
        {!! Form::label('kitchens','Kitchens:',['class'=>'col-md-1 control-label']) !!}
        {!! Form::input('number','kitchens',(Form::old('kitchens')) ? Form::old('kitchens') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('kitchens')) <p class="help-block">{{$errors->first('kitchens')}}</p> @endif
    </div>

    <div class="col-md-2 @if($errors->has('bathrooms')) has-error @endif">
        {!! Form::label('bathrooms','Bathrooms:',['class'=>'col-md-1 control-label']) !!}
        {!! Form::input('number','bathrooms',(Form::old('bathrooms')) ? Form::old('bathrooms') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('bathrooms')) <p class="help-block">{{$errors->first('bathrooms')}}</p> @endif
    </div>

    <div class="col-md-2 @if($errors->has('pools')) has-error @endif">
        {!! Form::label('pools','Pools:',0,['class'=>'col-md-1 control-label']) !!}
        {!! Form::input('number','pools',(Form::old('pools')) ? Form::old('pools') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('pools')) <p class="help-block">{{$errors->first('pools')}}</p> @endif
    </div>
</div>

<div class="row">
    <div class="col-md-5 @if($errors->has('type')) has-error @endif">
        {!! Form::label('type','Type:',['class'=>'col-md-1 control-label']) !!}
        {!! Form::select('type',['apartment'=>'Apartment','house'=>'House','farm'=>'Farm','comercial'=>'Comercial'],Form::old('type'),['class'=>'form-control']) !!}
        @if($errors->has('type')) <p class="help-block">{{$errors->first('type')}}</p> @endif
    </div>

    <div class="col-md-4 @if($errors->has('land_area')) has-error @endif">
        {!! Form::label('land_area','Land Area (in m²):',['class'=>'control-label']) !!}
        {!! Form::input('number','land_area',(Form::old('land_area')) ? Form::old('land_area') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('land_area')) <p class="help-block">{{$errors->first('land_area')}}</p> @endif
    </div>

    <div class="col-md-3  @if($errors->has('built_area')) has-error @endif">
        {!! Form::label('built_area','Built Area (in m²):',['class'=>'control-label']) !!}
        {!! Form::input('number','built_area',(Form::old('built_area')) ? Form::old('built_area') : 0,['class'=>'form-control','min'=>'0']) !!}
        @if($errors->has('built_area')) <p class="help-block">{{$errors->first('built_area')}}</p> @endif
    </div>
</div>

<div class="row">
    <div class="col-md-12 @if($errors->has('price')) has-error @endif">
        {!! Form::label('price','Price($):',['class'=>'control-label']) !!}
        {!! Form::text('price',Form::old('price'),['class'=>'form-control']) !!}
        @if($errors->has('price')) <p class="help-block">{{$errors->first('price')}}</p> @endif
    </div>
    <div class="col-md-12">
        {!! Form::label('images','Images:',['class'=>'control-label']) !!}
        {!! Form::file('images[]',['multiple'=>true, 'class'=>'form-control']) !!}
    </div>
    <div class="col-md-12">
        {!! Form::label('remark','Details:',['class'=>'control-label']) !!}
        {!! Form::textArea('remark',Form::old('remark'),['class'=>'form-control','rows'=>6]) !!}
    </div>
</div>
<hr>
<h4 class="text-info">Address Info</h4>
<div class="row">
    <div class="col-md-6 @if($errors->has('street')) has-error @endif">
    {!! Form::label('street','Street:',['class'=>'control-label']) !!}
    {!! Form::text('street',Form::old('street'),['class'=>'form-control']) !!}
        @if($errors->has('street')) <p class="help-block">{{$errors->first('street')}}</p> @endif
    </div>

    <div class="col-md-2">
        {!! Form::label('adjunct','Adjunct:',['class'=>'control-label']) !!}
        {!! Form::text('adjunct',Form::old('adjunct'),['class'=>'form-control']) !!}
    </div>

    <div class="col-md-2 @if($errors->has('number')) has-error @endif">
        {!! Form::label('number','Number:',['class'=>'control-label']) !!}
        {!! Form::text('number',Form::old('number'),['class'=>'form-control']) !!}
        @if($errors->has('number')) <p class="help-block">{{$errors->first('number')}}</p> @endif
    </div>
    <div class="col-md-2">
        {!! Form::label('zipcode','Zip Code:',['class'=>'control-label']) !!}
        {!! Form::text('zipcode',Form::old('zip code'),['class'=>'form-control']) !!}
    </div>

</div>
<div class="row">
    <div class="col-md-4 @if($errors->has('neighborhood')) has-error @endif">
        {!! Form::label('neighborhood','Neighborhood:',['class'=>'control-label']) !!}
        {!! Form::text('neighborhood',Form::old('neighborhood'),['class'=>'form-control']) !!}
        @if($errors->has('neighborhood')) <p class="help-block">{{$errors->first('neighborhood')}}</p> @endif
    </div>
    <div class="col-md-4 @if($errors->has('city')) has-error @endif">
        {!! Form::label('city','City:',['class'=>'control-label']) !!}
        {!! Form::text('city',Form::old('city'),['class'=>'form-control']) !!}
        @if($errors->has('city')) <p class="help-block">{{$errors->first('city')}}</p> @endif
    </div>
    <div class="col-md-2 @if($errors->has('state')) has-error @endif">
        {!! Form::label('state','State:',['class'=>'control-label']) !!}
        {!! Form::text('state',Form::old('state'),['class'=>'form-control']) !!}
        @if($errors->has('state')) <p class="help-block">{{$errors->first('state')}}</p> @endif
    </div>
    <div class="col-md-2 @if($errors->has('country')) has-error @endif">
        {!! Form::label('country','Country:',['class'=>'control-label']) !!}
        {!! Form::text('country',Form::old('country'),['class'=>'form-control']) !!}
        @if($errors->has('country')) <p class="help-block">{{$errors->first('country')}}</p> @endif
    </div>
</div>
<hr>
<h4 class="text-info">Advertisement Info</h4>
<div class="row">
    <div class="col-md-5 @if($errors->has('type_ad')) has-error @endif">
        {!! Form::label('type','Ad Type:',['class'=>'control-label']) !!}
        {!! Form::select('type_ad',['rent'=>'Rent','sell'=>'Sell'],Form::old('type'),['class'=>'form-control'])!!}
        @if($errors->has('type_ad')) <p class="help-block">{{$errors->first('type_ad')}}</p> @endif
    </div>

    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit($submit_text,['class'=>'btn btn-primary btn-lg']) !!}
    </div>
</div>