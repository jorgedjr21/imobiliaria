@extends('layouts.layout')
@section('title', 'Register')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Edit User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box box-info">
                        <div class="box-header"><h3 class="box-title">Register</h3></div>
                        <div class="box-body">
                            {!!Form::model($user,['method'=>'PATCH','class'=>'form-horizontal','route'=>['users.update',$id]]) !!}
                            @include('users/partials/_form',['submit_text'=>'Edit User'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

