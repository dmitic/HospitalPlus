@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  @section('dodajLoggedCss')
  <link rel="stylesheet" href="{{ asset('/css/log-lekar.css') }}">
  @endsection

  <!-- cards -->
  <div class="categoriesBoot row">
    <div id="korisnici-main" class="card categoryBoot bg-see border2 ml-4" style="width: 15rem;">
      <div id="korisnici">
        <img src="/images/admins.png" class="card-img-top p-3" alt="Korisnici">
        <div class="card-body">
          <p class="card-text text-center text-muted">Korisnici</p>
        </div>
      </div>
    </div>

    <div id="pacijenti-main" class="card categoryBoot bg-see border2 ml-4" style="width: 15rem;">
      <!-- <a href="/sestra/pacijenti">-->
      <div id="pacijenti">
        <img src="/images/pacijentis.png" class="card-img-top p-3" alt="Pacijenti">
        <div class="card-body">
          <p class="card-text text-center text-muted">Pacijenti</p>
        </div>
      </div>
      </a>
    </div>

    <div id="kartoni-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <a href="/lekar/kartoni">
        <div id="kartoni">
          <img src="/images/kartoni.png" class="card-img-top p-3" alt="Kartoni">
          <div class="card-body">
            <p class="card-text text-center">Kartoni</p>
          </div>
        </div>
      </a>
    </div>

    <div id="bolesti-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <a href="/lekar/bolesti">
        <div id="bolesti">
          <img src="/images/bolesti.png" class="card-img-top p-3" alt="Bolesti">
          <div class="card-body">
            <p class="card-text text-center">Bolesti</p>
          </div>
        </div>
      </a>
    </div>

    <div id="lekovi-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <a href="/lekar/lekovi">
        <div id="lekovi">
          <img src="/images/lekovi.png" class="card-img-top p-3" alt="Lekovi">
          <div class="card-body">
            <p class="card-text text-center">Lekovi</p>
          </div>
        </div>
      </a>
    </div>

  </div>

</div>
@endsection