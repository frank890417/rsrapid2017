<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle Navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <!-- Branding Image --><a href="{{ url('/') }}" class="navbar-brand">睿軒網站後台(開發中)</a>
          </div>
          <div id="app-navbar-collapse" class="collapse navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav"></ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              <li><a href="{{ url('manage/news') }}">新聞管理</a></li>
              @if(Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
              @else
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                  </li>
                </ul>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
    @yield('content')
    @yield('blade_pass_variables')
    {{-- Script BEFORE app.js --}}
    @yield('require_js')
    <script src="/js/app.js"></script>
    {{-- Script AFTER app.js --}}
    @yield('require_js_after')
  </body>
</html>