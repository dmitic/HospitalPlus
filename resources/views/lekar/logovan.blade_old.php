@extends('layouts.app')

@section('content')

<body>

  <div class="container-fluid">

    <!-- header -->
    @include('inc.navbar')

    <!-- cards -->
    <div class="categoriesBoot row ">
      <div class="card categoryBoot" style="width: 15rem;">
        <a href="/lekar/kartoni">
          <img src="/images/karton2.png" class="card-img-top" alt="Kartoni">
          <div class="card-body">
            <p class="card-text text-center">Kartoni</p>
          </div>
        </a>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <a href="/lekar/bolesti">
          <img src="/images/bolesti5.png" class="card-img-top" alt="Bolesti">
          <div class="card-body">
            <p class="card-text text-center">Bolesti</p>
          </div>
        </a>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <a href="/lekar/lekovi">
          <img src="/images/lekovi10.jpg" class="card-img-top" alt="Lekovi">
          <div class="card-body">
            <p class="card-text text-center">Lekovi</p>
          </div>
        </a>
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