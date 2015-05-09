@extends('layouts.layout')
@section('title', 'Profile: '.$userInfo->name)

@section('content')
    <section class="content">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{$userInfo->name}}</h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="text-bold">Name: </td>
                                <td>{{$userInfo->name}}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Email: </td>
                                <td>{{$userInfo->email}}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Member Since: </td>
                                <td>{{date('F Y',strtotime($user->created_at))}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@stop

