@extends('layouts.app')

@section('content')

<body>
  <div class="container-fluid ">

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

    <!-- landing -->
    <div class="landing row">

      <!-- login form -->
      <div class="container text-light mt-5">
        <div class="row justify-content-end mt-5">
          <div class="col-md-7">
            <form action="{{ route('login') }}" method="POST" class="border h-3 rounded-lg bg-light text-center p-5">
              @csrf
              <p class="form-title"> Dobro dosli na web aplikaciju koja omogucava pristup podacima pacijenata.</p>

              <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection