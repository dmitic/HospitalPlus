@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  <!-- cards -->
  <a href="/admin/svikorisnici">
    <div class="categoriesBoot row ">
      <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/korisnik2.jpg" class="card-img-top" alt="Korisnici">
        <div class="card-body">
          <p class="card-text text-center">Korisnici</p>
        </div>
      </div>
  </a>
  {{-- <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/pacijent3.jpg" class="card-img-top" alt="Pacijenti">
        <div class="card-body">
          <p class="card-text text-center">Pacijenti</p>
        </div>
      </div> --}}
  {{-- <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/karton2.png" class="card-img-top" alt="Kartoni">
        <div class="card-body">
          <p class="card-text text-center">Kartoni</p>
        </div>
      </div> --}}
  {{-- <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/bolesti5.png" class="card-img-top" alt="Bolesti">
        <div class="card-body">
          <p class="card-text text-center">Bolesti</p>
        </div>
      </div> --}}
  {{-- <div class="card categoryBoot" style="width: 15rem;">
        <img src="/images/lekovi10.jpg" class="card-img-top" alt="Lekovi">
        <div class="card-body">
          <p class="card-text text-center">Lekovi</p>
        </div>
      </div> --}}
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