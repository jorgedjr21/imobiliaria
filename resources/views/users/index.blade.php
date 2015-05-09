@extends('layouts.layout')
@section('title', 'Register')

@section('style')
    <link href="{{ asset('/plugin/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Dashboard
            <small>Register User</small>
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
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Usuários</h3>
                        <div class="box-tools pull-right">
                            <button type="button" id="newuser" class="btn btn-box-tool btn-info"><i class="fa fa-plus-circle"></i> New User</button>
                        </div>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered table-striped table-hover" id="user">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data de Criação</th>
                                <th>Info</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $us)
                                <tr>
                                    <td>{{$us->name}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{ date('d/m/Y H:i:s',strtotime($us->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="{{route('users.show',['id'=>$us->id])}}" class="btn bg-navy"><i class="fa fa-info"></i></a>
                                    </td>
                                    <td class="text-center">
                                        {!! Form::open(array('method'=>'DELETE','route'=>array('users.delete',$us->id))) !!}
                                        {!! Form::button('<i class="fa fa-minus-circle"></i>', array('class' => 'btn btn-danger','type'=>'submit')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td class="text-center">
                                        @if(Auth::user()->id == $us->id)
                                            <a href="{{route('users.edit',['id'=>$us->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        @else
                                            {{''}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!!Form::open(['method'=>'POST','class'=>'form-horizontal','url'=>['users/register']]) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-danger">x</span>
                        </button>
                        <h4 class="modal-title">Cadastro de Usuário</h4>

                    </div>
                    <div class="modal-body">
                         @include('users/partials/_form',['submit_text'=>'Create User'])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-lg pull-left" data-dismiss="modal">Close</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
    <script src="{{asset('/plugin/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugin/datatables/dataTables.bootstrap.js')}}"></script>

    <script>
        $(document).ready(function(){

            $("#user").dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false,
                "oLanguage": {
                    "sUrl": "http:////cdn.datatables.net/plug-ins/1.10.6/i18n/Portuguese-Brasil.json"
                }
            });

            newUserModal();
            @if(count($errors) > 0)
                showErrors();
            @endif;
        })

        function newUserModal(){
            $("#newuser").click(function(){
                 $(".modal").modal('show');
            });
        }

        @if(count($errors) > 0)
            function showErrors(){
                $(".modal").modal('show');
            }
        @endif
    </script>
@stop