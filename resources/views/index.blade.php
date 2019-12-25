@extends('layouts.app')

@section('dodajIndex')
<link rel="stylesheet" href="/css/login.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">
@endsection

@section('content')
<body>
  <div class="container-fluid">

    <!-- header -->
    @include('inc.header_login')
    <div class="row justify-content-around align-items-center h-85">
      

      <div id="weather-date-time" class="col-md-4 text-center"></div>
      <form action="{{ route('login') }}" method="POST" class="col-md-4 text-center forma p-5 rounded">
            @csrf                
            <p class="nekitekst mt-2 p-1 pb-2 mb-5">
                    Dobro dosli na web aplikaciju koja omogucava pristup podacima pacijenata.
            </p>
            <div class="form-group">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail">
                @error('email')
                    <span class="invalid-feedback" role="alert" style="text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">{{ __('Login') }}</button>
        </form>
      </div>
    </div>
  <script src="/js/app.js"></script>
  @endsection