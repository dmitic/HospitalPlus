@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  @section('dodajLoggedCss')
    <link rel="stylesheet" href="{{ asset('/css/log-admin.css') }}">
  @endsection

  <!-- cards -->
  <div class="categoriesBoot row ">
    <div id="korisnici-main" class="card categoryBootcard categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <a href="/admin/svikorisnici">
        <div id="korisnici">
          <img src="/images/admin.png" class="card-img-top p-3" alt="Korisnici">
          <div class="card-body">
            <p class="card-text text-center">Korisnici</p>
          </div>
        </div>
      </a>
    </div>

    <div id="pacijenti-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <div id="pacijenti">
        <img src="/images/pacijentis.png" class="card-img-top p-3" alt="Pacijenti">
        <div class="card-body">
          <p class="card-text text-center text-muted">Pacijenti</p>
        </div>
      </div>
    </div>

    <div id="kartoni-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <div id="kartoni">
        <img src="/images/kartonis.png" class="card-img-top" alt="Kartoni">
        <div class="card-body">
          <p class="card-text text-center text-muted">Kartoni</p>
        </div>
      </div>
    </div>

    <div id="bolesti-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <div id="bolesti">
        <img src="/images/bolestis.png" class="card-img-top p-3" alt="Bolesti">
        <div class="card-body">
          <p class="card-text text-center text-muted">Bolesti</p>
        </div>
      </div>
    </div>

    <div id="lekovi-main" class="card categoryBoot bg-see border1 ml-4" style="width: 15rem;">
      <div id="lekovi">
        <img src="/images/lekovis.png" class="card-img-top p-3" alt="Lekovi">
        <div class="card-body">
          <p class="card-text text-center text-muted">Lekovi</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection