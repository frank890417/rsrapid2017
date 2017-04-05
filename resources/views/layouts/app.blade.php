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
      <navbar></navbar>
      <transition name="fade" mode="out-in">
        <router-view></router-view>
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
  </body>
</html>