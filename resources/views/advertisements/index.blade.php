@extends('layouts.layout')
@section('title', 'My advertisements')

@section('style')
    <link href="{{ asset('/plugin/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <style>

        .panel-pricing {
            -moz-transition: all .3s ease;
            -o-transition: all .3s ease;
            -webkit-transition: all .3s ease;
        }
        .panel-pricing:hover {
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
        }
        .panel-pricing .panel-heading {
            padding: 20px 10px;
        }
        .panel-pricing .panel-heading .fa {
            margin-top: 10px;
            font-size: 58px;
        }
        .panel-pricing .list-group-item {
            color: #777777;
            border-bottom: 1px solid rgba(250, 250, 250, 0.5);
        }
        .panel-pricing .list-group-item:last-child {
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }
        .panel-pricing .list-group-item:first-child {
            border-top-right-radius: 0px;
            border-top-left-radius: 0px;
        }
        .panel-pricing .panel-body {
            background-color: #f0f0f0;
            font-size: 37px;
            color: #000066;
            padding: 20px;
            margin: 0px;
        }
    </style>
@stop

@section('content')
    <section class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                Dashboard
                <small>My ads</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="box box-warning">
                    <div class="box-body">
                        <a href="{{route('advertisements.create')}}" class="btn btn-success"><i class="fa fa-plus-circle fa-3x"></i> <br>New Advertisement</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach($ads as $ad)
            {{--*/ $maximg = count($propimg[$ad->id]); $img = rand(0,$maximg-1); /*--}}
            <div class="col-md-4 text-center">
                <div class="panel panel-warning panel-pricing">
                    <div class="panel-heading text-center">
                        <img src="{{$propimg[$ad->id][$img]->path}}" width="290" height="200" alt="img"/>
                        <h3>Propaganda {{$ad->id}}</h3>
                    </div>
                    <div class="panel-body text-center">
                        <p><strong>R$ {{number_format($ad->price,2,',','.')}}</strong></p>
                    </div>
                    <ul class="list-group text-center">
                        <li class="list-group-item"><span class="text-primary"><i class="fa fa-bed"></i><strong> Quartos: </strong> {{$ad->bedrooms}}</span></li>
                        <li class="list-group-item"><span class="text-maroon"><i class="fa fa-cutlery"></i><strong> Cozinhas: </strong> {{$ad->kitchens}}</span></li>
                        <li class="list-group-item"><span class="text-orange"><i class="fa fa-file-o"></i><strong> Code: </strong> {{ $ad->ad_code }}</span></li>
                    </ul>

                    <div class="panel-footer">
                        <a class="btn btn-lg btn-block btn-success" href="{{route('advertisements.show',['ad_code'=>$ad->ad_code])}}">MORE INFO!</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
@stop

@section('scripts')
    <script src="{{asset('/plugin/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugin/datatables/dataTables.bootstrap.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("#ads").dataTable({
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
        })
    </script>
@stop