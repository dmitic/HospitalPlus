@include('inc.head')
  <body class="@yield('body_class')">
    <div id="app">
      @yield('content')
    </div>
@include('inc.footer')