@extends('layouts.app')

@section('content')

<body>
  <div class="container-fluid ">

    <!-- header -->
    @include('inc.header_login')

    <!-- landing -->
    <!-- <div class="landing row"> -->
    <div class="landing row d-flex justify-content-around">
      

      <!-- login form -->
      <!-- <div class="container text-light mt-5"> -->
      <div id="weather-date-time"></div>
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
  <script src="/js/app.js"></script>
  @endsection