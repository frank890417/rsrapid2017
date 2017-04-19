<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>睿軒檢驗科技</title>
    <!-- Styles -->
    
    <link rel="icon" type="image/png" href="img/favicon.png" />

    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>
    <!--新黑體-->
    <script type="text/javascript" src="//typesquare.com/accessor/zh_tw/apiscript/typesquare.js?HGNrQi080jw%3D" charset="utf-8"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app" :class="big_font?'big_font':''">
      <navbar></navbar>
      <transition name="fade" mode="out-in">
        <router-view :key="$route.path"></router-view>
      </transition>
      <section_footer></section_footer>
    </div>
    <!-- @yield('content') -->
    @yield('blade_pass_variables')
    {{-- Script BEFORE app.js --}}
    @yield('require_js')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rxjs/5.3.0/Rx.min.js"></script>
    <script src="/js/app.js"></script>
    {{-- Script AFTER app.js --}}
    @yield('require_js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  </body>

</html>