<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>睿軒網站後台(開發中)</title>
    <link href="/css/admin_css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin_css/datepicker3.css" rel="stylesheet">
    <link href="/css/admin_css/styles.css" rel="stylesheet">
    <!-- Icons -->
    <script src="/js/admin_js/lumino.glyphs.js"></script>
    <!--      
      script(src='/js/admin_js/html5shiv.js')
      script(src='/js/admin_js/respond.min.js')
    -->
    <script>
      window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body>
    <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#sidebar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><span>RapidSure 2017</span> Admin</a>
          <ul class="user-menu">
            <li class="dropdown pull-right"><a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <svg class="glyph stroked male-user">
                  <use xlink:href="#stroked-male-user"></use>
                </svg> {{ Auth::user()->name }}  <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">
                    <svg class="glyph stroked male-user">
                      <use xlink:href="#stroked-male-user"></use>
                    </svg> Profile</a></li>
                <li><a href="#">
                    <svg class="glyph stroked gear">
                      <use xlink:href="#stroked-gear"></use>
                    </svg> Settings</a></li>
                <li><a href="#">
                    <svg class="glyph stroked cancel">
                      <use xlink:href="#stroked-cancel"></use>
                    </svg> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
      <form role="search">
        <div class="form-group">
          <input type="text" placeholder="Search" class="form-control">
        </div>
      </form>
      <ul class="nav menu">
        {{--          
          a(href='index.html')
            svg.glyph.stroked.dashboard-dial
              use(xlink:href='#stroked-dashboard-dial')
            |  網站資料
        --}}
        <li class="active"><a href="{{ url('manage/news') }}">
            <svg class="glyph stroked calendar">
              <use xlink:href="#stroked-calendar"></use>
            </svg> 新聞管理</a></li>
        {{--          
          a(href='charts.html')
            svg.glyph.stroked.line-graph
              use(xlink:href='#stroked-line-graph')
            |  Charts
        --}}
        {{--          
          a(href='tables.html')
            svg.glyph.stroked.table
              use(xlink:href='#stroked-table')
            |  Tables
        --}}
        {{--          
          a(href='forms.html')
            svg.glyph.stroked.pencil
              use(xlink:href='#stroked-pencil')
            |  Forms
        --}}
        {{--          
          a(href='panels.html')
            svg.glyph.stroked.app-window
              use(xlink:href='#stroked-app-window')
            |  Alerts & Panels
        --}}
        {{--          
          a(href='icons.html')
            svg.glyph.stroked.star
              use(xlink:href='#stroked-star')
            |  Icons
        --}}
        {{--          
          a(href='#')
            span(data-toggle='collapse', href='#sub-item-1')
              svg.glyph.stroked.chevron-down
                use(xlink:href='#stroked-chevron-down')
            |  Dropdown
          ul#sub-item-1.children.collapse
            li
              a(href='#')
                svg.glyph.stroked.chevron-right
                  use(xlink:href='#stroked-chevron-right')
                |  Sub Item 1
            li
              a(href='#')
                svg.glyph.stroked.chevron-right
                  use(xlink:href='#stroked-chevron-right')
                |  Sub Item 2
            li
              a(href='#')
                svg.glyph.stroked.chevron-right
                  use(xlink:href='#stroked-chevron-right')
                |  Sub Item 3
        --}}
        <li role="presentation" class="divider"></li>
        <li><a href="login.html">
            <svg class="glyph stroked male-user">
              <use xlink:href="#stroked-male-user"></use>
            </svg> Login Page</a></li>
      </ul>
      <div class="attribution">Template by <a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/">Medialoot</a><br><a href="http://www.glyphs.co" style="color: #333;">Icons by Glyphs</a></div>
    </div>
    <!-- /.sidebar -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      @yield('content')
      <div class="clearfix"></div>
      <!-- /.row -->
      {{--        
        .col-lg-12
          h1.page-header 新聞管理
      --}}
      <!-- /.row -->
      {{--        
        .col-xs-12.col-md-6.col-lg-3
          .panel.panel-blue.panel-widget
            .row.no-padding
              .col-sm-3.col-lg-5.widget-left
                svg.glyph.stroked.bag
                  use(xlink:href='#stroked-bag')
              .col-sm-9.col-lg-7.widget-right
                .large 120
                .text-muted New Orders
        .col-xs-12.col-md-6.col-lg-3
          .panel.panel-orange.panel-widget
            .row.no-padding
              .col-sm-3.col-lg-5.widget-left
                svg.glyph.stroked.empty-message
                  use(xlink:href='#stroked-empty-message')
              .col-sm-9.col-lg-7.widget-right
                .large 52
                .text-muted Comments
        .col-xs-12.col-md-6.col-lg-3
          .panel.panel-teal.panel-widget
            .row.no-padding
              .col-sm-3.col-lg-5.widget-left
                svg.glyph.stroked.male-user
                  use(xlink:href='#stroked-male-user')
              .col-sm-9.col-lg-7.widget-right
                .large 24
                .text-muted New Users
        .col-xs-12.col-md-6.col-lg-3
          .panel.panel-red.panel-widget
            .row.no-padding
              .col-sm-3.col-lg-5.widget-left
                svg.glyph.stroked.app-window-with-content
                  use(xlink:href='#stroked-app-window-with-content')
              .col-sm-9.col-lg-7.widget-right
                .large 25.2k
                .text-muted Page Views
      --}}
      <!-- /.row -->
      {{--        
        .col-lg-12
          .panel.panel-default
            .panel-heading Site Traffic Overview
            .panel-body
              .canvas-wrapper
                canvas#line-chart.main-chart(height='200', width='600')
      --}}
      <!-- /.row -->
      {{--        
        .col-xs-6.col-md-3
          .panel.panel-default
            .panel-body.easypiechart-panel
              h4 New Orders
              #easypiechart-blue.easypiechart(data-percent='92')
                span.percent 92%
        .col-xs-6.col-md-3
          .panel.panel-default
            .panel-body.easypiechart-panel
              h4 Comments
              #easypiechart-orange.easypiechart(data-percent='65')
                span.percent 65%
        .col-xs-6.col-md-3
          .panel.panel-default
            .panel-body.easypiechart-panel
              h4 New Users
              #easypiechart-teal.easypiechart(data-percent='56')
                span.percent 56%
        .col-xs-6.col-md-3
          .panel.panel-default
            .panel-body.easypiechart-panel
              h4 Visitors
              #easypiechart-red.easypiechart(data-percent='27')
                span.percent 27%
      --}}
      <!-- /.row -->
      {{--        
        .col-md-8
          .panel.panel-default.chat
            #accordion.panel-heading
              svg.glyph.stroked.two-messages
                use(xlink:href='#stroked-two-messages')
              |  Chat
            .panel-body
              ul
                li.left.clearfix
                  span.chat-img.pull-left
                    img.img-circle(src='http://placehold.it/80/30a5ff/fff', alt='User Avatar')
                  .chat-body.clearfix
                    .header
                      strong.primary-font John Doe
                      small.text-muted 32 mins ago
                    p
                      | Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies.
                li.right.clearfix
                  span.chat-img.pull-right
                    img.img-circle(src='http://placehold.it/80/dde0e6/5f6468', alt='User Avatar')
                  .chat-body.clearfix
                    .header
                      strong.pull-left.primary-font Jane Doe
                      small.text-muted 6 mins ago
                    p
                      | Mauris dignissim porta enim, sed commodo sem blandit non. Ut scelerisque sapien eu mauris faucibus ultrices. Nulla ac odio nisl. Proin est metus, interdum scelerisque quam eu, eleifend pretium nunc. Suspendisse finibus auctor lectus, eu interdum sapien.
                li.left.clearfix
                  span.chat-img.pull-left
                    img.img-circle(src='http://placehold.it/80/30a5ff/fff', alt='User Avatar')
                  .chat-body.clearfix
                    .header
                      strong.primary-font John Doe
                      small.text-muted 32 mins ago
                    p
                      | Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies.
            .panel-footer
              .input-group
                input#btn-input.form-control.input-md(type='text', placeholder='Type your message here...')
                span.input-group-btn
                  button#btn-chat.btn.btn-success.btn-md Send
        // /.col
        .col-md-4
          .panel.panel-blue
            .panel-heading.dark-overlay
              svg.glyph.stroked.clipboard-with-paper
                use(xlink:href='#stroked-clipboard-with-paper')
              | To-do List
            .panel-body
              ul.todo-list
                li.todo-list-item
                  .checkbox
                    input#checkbox(type='checkbox')
                    label(for='checkbox') Make a plan for today
                  .pull-right.action-buttons
                    a(href='#')
                      svg.glyph.stroked.pencil
                        use(xlink:href='#stroked-pencil')
                    a.flag(href='#')
                      svg.glyph.stroked.flag
                        use(xlink:href='#stroked-flag')
                    a.trash(href='#')
                      svg.glyph.stroked.trash
                        use(xlink:href='#stroked-trash')
                li.todo-list-item
                  .checkbox
                    input#checkbox(type='checkbox')
                    label(for='checkbox') Update Basecamp
                  .pull-right.action-buttons
                    a(href='#')
                      svg.glyph.stroked.pencil
                        use(xlink:href='#stroked-pencil')
                    a.flag(href='#')
                      svg.glyph.stroked.flag
                        use(xlink:href='#stroked-flag')
                    a.trash(href='#')
                      svg.glyph.stroked.trash
                        use(xlink:href='#stroked-trash')
                li.todo-list-item
                  .checkbox
                    input#checkbox(type='checkbox')
                    label(for='checkbox') Send email to Jane
                  .pull-right.action-buttons
                    a(href='#')
                      svg.glyph.stroked.pencil
                        use(xlink:href='#stroked-pencil')
                    a.flag(href='#')
                      svg.glyph.stroked.flag
                        use(xlink:href='#stroked-flag')
                    a.trash(href='#')
                      svg.glyph.stroked.trash
                        use(xlink:href='#stroked-trash')
                li.todo-list-item
                  .checkbox
                    input#checkbox(type='checkbox')
                    label(for='checkbox') Drink coffee
                  .pull-right.action-buttons
                    a(href='#')
                      svg.glyph.stroked.pencil
                        use(xlink:href='#stroked-pencil')
                    a.flag(href='#')
                      svg.glyph.stroked.flag
                        use(xlink:href='#stroked-flag')
                    a.trash(href='#')
                      svg.glyph.stroked.trash
                        use(xlink:href='#stroked-trash')
                li.todo-list-item
                  .checkbox
                    input#checkbox(type='checkbox')
                    label(for='checkbox') Do some work
                  .pull-right.action-buttons
                    a(href='#')
                      svg.glyph.stroked.pencil
                        use(xlink:href='#stroked-pencil')
                    a.flag(href='#')
                      svg.glyph.stroked.flag
                        use(xlink:href='#stroked-flag')
                    a.trash(href='#')
                      svg.glyph.stroked.trash
                        use(xlink:href='#stroked-trash')
                li.todo-list-item
                  .checkbox
                    input#checkbox(type='checkbox')
                    label(for='checkbox') Tidy up workspace
                  .pull-right.action-buttons
                    a(href='#')
                      svg.glyph.stroked.pencil
                        use(xlink:href='#stroked-pencil')
                    a.flag(href='#')
                      svg.glyph.stroked.flag
                        use(xlink:href='#stroked-flag')
                    a.trash(href='#')
                      svg.glyph.stroked.trash
                        use(xlink:href='#stroked-trash')
            .panel-footer
              .input-group
                input#btn-input.form-control.input-md(type='text', placeholder='Add new task')
                span.input-group-btn
                  button#btn-todo.btn.btn-primary.btn-md Add
        // /.col
      --}}
      <!-- /.row -->
    </div>
    <!-- /.main -->
    
    @yield('blade_pass_variables')
    {{-- Script BEFORE app.js --}}
    @yield('require_js')
    <script src="/js/admin_js/jquery-1.11.1.min.js"></script>
    <script src="/js/admin_js/bootstrap.min.js"></script>
    {{-- script(src='/js/admin_js/chart.min.js') --}}
    <script src="/js/app.js"></script>
    {{-- script(src='/js/admin_js/chart-data.js') --}}
    {{-- script(src='/js/admin_js/easypiechart.js') --}}
    {{-- script(src='/js/admin_js/easypiechart-data.js') --}}
    {{-- script(src='/js/admin_js/bootstrap-datepicker.js') --}}
    {{--      
      $('#calendar').datepicker({
      });
      !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){
      $(this).find('em:first').toggleClass("glyphicon-minus");
      });
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
      }(window.jQuery);
      $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
      })
      $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
      })
      
      
    --}}
    {{-- Script AFTER app.js --}}
    @yield('require_js_after')
  </body>
</html>
{{-- doctype html --}}
{{-- html(lang="{{ config('app.locale') }}") --}}
{{-- head --}}
{{-- meta(charset='utf-8') --}}
{{-- meta(http-equiv='X-UA-Compatible', content='IE=edge') --}}
{{-- meta(name='viewport', content='width=device-width, initial-scale=1') --}}
{{-- // CSRF Token --}}
{{-- meta(name='csrf-token', content='{{ csrf_token() }}') --}}
{{-- title {{ config('app.name', 'Laravel') }} --}}
{{-- // Styles --}}
{{-- link(href="{{ asset('css/app.css') }}", rel='stylesheet') --}}
{{-- // Scripts --}}
{{-- script. --}}
{{-- window.Laravel = {!! json_encode([ --}}
{{-- 'csrfToken' => csrf_token(), --}}
{{-- ]) !!}; --}}
{{-- body --}}
{{-- #app --}}
{{-- nav.navbar.navbar-default.navbar-static-top --}}
{{-- .container --}}
{{-- .navbar-header --}}
{{-- // Collapsed Hamburger --}}
{{-- button.navbar-toggle.collapsed(type='button', data-toggle='collapse', data-target='#app-navbar-collapse') --}}
{{-- span.sr-only Toggle Navigation --}}
{{-- span.icon-bar --}}
{{-- span.icon-bar --}}
{{-- span.icon-bar --}}
{{-- // Branding Image --}}
{{-- a.navbar-brand(href="{{ url('/') }}") --}}
{{-- | 睿軒網站後台(開發中) --}}
{{-- #app-navbar-collapse.collapse.navbar-collapse --}}
{{-- // Left Side Of Navbar --}}
{{-- ul.nav.navbar-nav --}}
{{-- // Right Side Of Navbar --}}
{{-- ul.nav.navbar-nav.navbar-right --}}
{{-- // Authentication Links --}}
{{-- li --}}
{{-- a(href="{{ url('manage/news') }}") 新聞管理 --}}
{{-- @if (Auth::guest()) --}}
{{-- li --}}
{{-- a(href="{{ route('login') }}") Login --}}
{{-- li --}}
{{-- a(href="{{ route('register') }}") Register --}}
{{-- @else --}}
{{-- li.dropdown --}}
{{-- a.dropdown-toggle(href='#', data-toggle='dropdown', role='button', aria-expanded='false') --}}
{{-- | {{ Auth::user()->name }} --}}
{{-- span.caret --}}
{{-- ul.dropdown-menu(role='menu') --}}
{{-- li --}}
{{-- a(href="{{ route('logout') }}", onclick="event.preventDefault();\ --}}
{{-- document.getElementById('logout-form').submit();") --}}
{{-- | Logout --}}
{{-- form#logout-form(action="{{ route('logout') }}", method='POST', style='display: none;') --}}
{{-- | {{ csrf_field() }} --}}
{{-- @endif --}}
{{-- @yield('content') --}}
{{-- @yield('blade_pass_variables') --}}

{{-- {{-- Script BEFORE app.js --}} --}}
{{-- @yield('require_js') --}}
{{-- script(src="/js/app.js") --}}
{{-- {{-- Script AFTER app.js --}} --}}
{{-- @yield('require_js_after') --}}


