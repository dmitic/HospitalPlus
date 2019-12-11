@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  @section('dodajLoggedCss')
    <link rel="stylesheet" href="{{ asset('/css/log-asistent.css') }}">
  @endsection

  <!-- cards -->
  <div class="categoriesBoot row ">
    <div id="korisnici-main" class="card categoryBoot" style="width: 15rem;">
      <div id="korisnici">
        <img src="images/korisnik2a.jpg" class="card-img-top" alt="Korisnici">
        <div class="card-body">
          <p class="card-text text-center">Korisnici</p>
        </div>
      </div>
    </div>

    <div id="pacijenti-main" class="card categoryBoot" style="width: 15rem;">
      <a href="/sestra/pacijenti">
        <div id="pacijenti">
          <img src="images/pacijent3.jpg" class="card-img-top" alt="Pacijenti">
          <div class="card-body">
            <p class="card-text text-center">Pacijenti</p>
          </div>
        </div>
      </a>
    </div>

    <div id="kartoni-main" class="card categoryBoot" style="width: 15rem;">
      <a href="/sestra/kartoni">
        <div id="kartoni">
          <img src="images/karton2.png" class="card-img-top" alt="Kartoni">
          <div class="card-body">
            <p class="card-text text-center">Kartoni</p>
          </div>
        </div>
      </a>
    </div>

    <div id="bolesti-main" class="card categoryBoot" style="width: 15rem;">
      <a href="/sestra/bolesti">
        <div id="bolesti">
          <img src="images/sickheart.jpg" class="card-img-top" alt="Bolesti">
          <div class="card-body">
            <p class="card-text text-center">Bolesti</p>
          </div>
        </div>
      </a>
    </div>

    <div id="lekovi-main" class="card categoryBoot" style="width: 15rem;">
      <a href="/sestra/lekovi">
        <div id="lekovi">
          <img src="images/lekovi10.jpg" class="card-img-top" alt="Lekovi">
          <div class="card-body">
            <p class="card-text text-center">Lekovi</p>
          </div>
        </div>
      </a>
    </div>

  </div>

</div>
@endsection