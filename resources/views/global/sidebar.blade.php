@section('sidebar')
<?
if(Auth::user())
    $user = Auth::user();

?>
<nav class="navbar navbar-inverse sidebar-style">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- button show menu is mobile -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a href="{{ url('/') }}" class="navbar-brand" >{{Config::get('app.setting.app_name')}}</a>
</div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
        
                @foreach($sidebar as $only)
                    <li><a href="{{$only->url}}">{{$only->name}}</a></li>
                @endforeach
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (!isset($user))
                <li><a href="{{ url('/auth/login') }}">Авторизация</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   <span class="glyphicon glyphicon-user"></span> {{ $user['name'] }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/profile') }}">Поиск</a></li>
                        <li><a href="{{ url('/profile') }}">Профиль</a></li>
                        <li><a href="{{ url('/auth/logout') }}">Выход</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@endsection