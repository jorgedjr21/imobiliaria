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

<header class="navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <strong><a href="/" class="navbar-brand"><i class="fa fa-home "></i> Imobiliária</a></strong>
        </div>
        <nav class="navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
                @if(!is_null($user))
                    <li><a href="{{route('advertisements.index')}}">My ads ({{$count_add[0]->total}})</a></li>
                @endif
                <li>
                    <a href="#">Edit</a>
                </li>
                <li>
                    <a href="#">Visualize</a>
                </li>
                <li>
                    <a href="#">Prototype</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(is_null($user))
                    <li><a href="{{route('users.login')}}">Login</a></li>
                @else
                    <li><a href="{{route('users.show',['id'=>$user->id])}}"><strong>Profile</strong></a></li>
                    <li><a href="{{route('users.logout')}}">Logout &nbsp; <i class="fa fa-arrow-right"></i></a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>


    <div class="container">
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


        <div class="col-md-8" style="margin-left: 10px;">

                @if(count($ads) > 0)

                    @foreach($ads as $ad)
                        {{--*/ $maximg = count($propimg[$ad->id]); $img = rand(0,$maximg-1); /*--}}
                        <div class="col-md-6 text-center">
                            <div class="panel panel-warning panel-pricing">
                                <div class="panel-heading text-center">
                                    <a href="{{route('advertisements.show',['ad_code'=>$ad->ad_code])}}"><img src="{{$propimg[$ad->id][$img]->path}}" width="290" height="200" alt="img"/></a>
                                    <h3>{{$ad->street.', '.$ad->city.' - '.$ad->state}}</h3>
                                </div>
                                <div class="panel-body text-center">
                                    <p><strong>R$ {{number_format($ad->price,2,',','.')}}</strong></p>
                                </div>
                                <ul class="list-group text-center">
                                    <li class="list-group-item"><span class="text-primary"><i class="fa fa-bed"></i><strong> Quartos: </strong> {{$ad->bedrooms}}</span></li>
                                    <li class="list-group-item"><span class="text-warning"><i class="fa fa-cutlery"></i><strong> Cozinhas: </strong> {{$ad->kitchens}}</span></li>
                                    <li class="list-group-item"><span class="text-default"><i class="fa fa-file-text-o"></i><strong> Type: </strong> {{ $ad->type_ad }}</span></li>
                                    <li class="list-group-item"><span class="text-info"><i class="fa fa-search"></i><strong> Code: </strong> {{ $ad->ad_code }}</span></li>
                                </ul>

                                <div class="panel-footer">
                                    <a class="btn btn-lg btn-block btn-success" href="{{route('advertisements.show',['ad_code'=>$ad->ad_code])}}">MORE INFO!</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    {!! $ads->render() !!}
                @else
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="panel-title">Anúncios: {{count($ads)}}</h3></div>
                        <div class="panel-body">
                            <p class="text-warning"><strong>Nenhum anúncio encontrado!</strong></p>
                        </div>
                    </div>
                @endif
        </div>

        </div>
        @yield('content')

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Imobiliária &copy; {{date('Y')}}</p>
                </div>
            </div>
        </footer>
    </div>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/app.min.js')}}"></script>
@yield('scripts')
</body>
</html>