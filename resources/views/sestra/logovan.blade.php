@extends('layouts.app')

@section('content')

<body>

  <div class="container-fluid">

    <!-- header -->
    @include('inc.navbar')

    <!-- cards -->
    <div class="categoriesBoot row ">
      <div class="card categoryBoot" style="width: 15rem;">
        <a href="/sestra/pacijenti">
          <img src="/images/pacijent3.jpg" class="card-img-top" alt="Pacijenti">
          <div class="card-body">
            <p class="card-text text-center">Pacijenti</p>
          </div>
        </a>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/karton2.png" class="card-img-top" alt="Kartoni">
        <div class="card-body">
          <p class="card-text text-center">Kartoni</p>
        </div>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <a href="/sestra/bolesti">
          <img src="/images/bolesti5.png" class="card-img-top" alt="Bolesti">
          <div class="card-body">
            <p class="card-text text-center">Bolesti</p>
          </div>
        </a>
      </div>
      <div class="card categoryBoot" style="width: 15rem;">
        <a href="/sestra/lekovi">
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