@include('global.head')
@include('global.sidebar')

@yield('sidebar')
<!-- Секция контента -->
<div class="container">
<h1>@yield('h1')</h1>
	<div class="row col-lg-11 col-md-offset-1">
       @yield('content')
    </div>
</div>
</body>
</html>
