@extends('layouts.layout')
@section('title', 'Property Advertisement')

@section('content')
    <section class="content">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dissmissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                <p class="text-bold">{{Session::get('success')}}</p>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dissmissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i> Erro!</h4>
                <p class="text-bold">{{Session::get('error')}}</p>
            </div>
        @endif
    </section>
@stop