@extends('layouts.main')
@section('title','Home')
@section('content')

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
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            newUserModal();

            @if(count($errors) > 0)
            showErrors();
            @endif;
        });

        function newUserModal(){
            $("#newuser").click(function(){
                $('.modal').modal('show');
            });
        }

        @if(count($errors) > 0)
        function showErrors(){
            $(".modal").modal('show');
        }
        @endif
    </script>
@stop
