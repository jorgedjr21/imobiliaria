@extends('layouts.layout')
@section('title', 'Property Advertisement')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>New Advertisement</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <div class="box box-info box-solid">
                        <div class="box-header"><i class="fa fa-plus-circle"></i><h3 class="box-title">New Advertisement</h3></div>
                        <div class="box-body">
                            {!! Form::open(['method'=>'POST','url'=>['advertisements/new'],'files'=>true]) !!}
                            @include('properties/partials/_form',['submit_text'=>'Create Advertisement'])
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop