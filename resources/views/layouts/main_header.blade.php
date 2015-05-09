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
                @if(is_null($user))
                        <li>
                            <a href="#" id="newuser">Register</a>
                        </li>
                    @endif
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
