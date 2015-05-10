<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imobiliária - @yield('title')</title>

    <link href="{{ asset('/css/superHero.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    @yield('style')
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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

</head>
<body>

@include('layouts.main_header')

<div class="container-fluid">
    @if( !Auth::user())
        @include('users.modal_register')
    @endif

    <div class="row">
        <form class="form-horizontal">

            <div class="col-md-12 well">
                <div class="input-group input-group-lg">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="text" placeholder="YOUR PROPERTY CODE HERE!" name="codeSearch" class="form-control text-center"/>
                    <div class="input-group-btn"><button type="button" name="search" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Search!"><i class="fa fa-search"></i> </button> </div>
                </div>
            </div>

        </form>

    </div>

    <br>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Busca avançada <i class="fa fa-search"></i> </h3>
                </div>
                <div class="panel-body">
                    <br>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Imobiliária &copy; {{date('Y')}}</p>
            </div>
        </div>
    </footer>
</div>




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('/js/superHero.min.js')}}"></script>
@yield('scripts')
</body>
</html>