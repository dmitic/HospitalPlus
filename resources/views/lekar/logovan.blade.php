@extends('layouts.app')

@section('content')

<body>

  <div class="container-fluid">

    <!-- header -->
    <div class="row justify-content-around header align-items-center">
      <!-- logo -->
      <div class="col-xs-12 col-sm-6 col-lg-3  text-center logo  ">
        <img src="/images/logo1.png" alt="logo">
      </div>

      <!-- info -->
      <div class=" col-xs-12 col-sm-6 col-lg-3  text-center adr-wt">
        <p class=" "> Dunavska 35-37 Beograd</p>
        <p class=" ">Radno vreme: 24/7</p>
      </div>

      <!-- date-time -->
      <div class="col-xs-12 col-sm-6 col-lg-3 text-center adr-wt ">
        <script type="text/javascript">
          var css_file=document.createElement("link"); 
                  css_file.setAttribute("rel","stylesheet"); 
                  css_file.setAttribute("type","text/css"); 
                  css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-120x45.css"); 
                  document.getElementsByTagName("head")[0].appendChild(css_file); 
        </script>
        <div id="tw_6_1870626152">
          <div style="width:130px; height:45px; margin: 0 auto; ">
            <a href="https://www.booked.net/time/belgrade-2997">Belgrade</a><br />
          </div>
        </div>
        <script type="text/javascript">
          function setWidgetData_1870626152(data){ 
                      if(typeof(data) != 'undefined' && data.results.length > 0) { 
                          for(var i = 0; i < data.results.length; ++i) { 
                              var objMainBlock = ''; 
                              var params = data.results[i]; 
                              objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id); 
                              if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; 
                          } 
                      } 
                  } 
                  var clock_timer_1870626152 = -1; 
        </script>
        <script type="text/javascript" charset="UTF-8"
          src="https://widgets.booked.net/time/info?ver=2&domid=&type=6&id=1870626152&scode=124&city_id=2997&wlangid=1&mode=0&details=0&background=ffffff&color=333333&add_background=a0a1a1&add_color=08488d&head_color=333333&border=3&transparent=1">
        </script>
      </div>

      <!-- weather -->
      <div class="col-xs-12 col-sm-6 col-lg-3">
        <a class="weatherwidget-io" href="https://forecast7.com/sr/44d7920d45/belgrade/" data-font="Monaco"
          data-mode="Current" data-days="3">BEOGRAD</a>
      </div>
    </div>

    <!-- cards -->
    <div class="categoriesBoot row ">
      {{-- <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/korisnik2.jpg" class="card-img-top" alt="Korisnici">
        <div class="card-body">
          <p class="card-text text-center">Korisnici</p>
        </div>
      </div> --}}
      {{-- <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/pacijent3.jpg" class="card-img-top" alt="Pacijenti">
        <div class="card-body">
          <p class="card-text text-center">Pacijenti</p>
        </div>
      </div> --}}
      <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/karton2.png" class="card-img-top" alt="Kartoni">
        <div class="card-body">
          <p class="card-text text-center">Kartoni</p>
        </div>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/bolesti5.png" class="card-img-top" alt="Bolesti">
        <div class="card-body">
          <p class="card-text text-center">Bolesti</p>
        </div>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/lekovi10.jpg" class="card-img-top" alt="Lekovi">
        <div class="card-body">
          <p class="card-text text-center">Lekovi</p>
        </div>
      </div>

      <a class="nav-link font-color" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Izlaz') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </div>
  @endsection