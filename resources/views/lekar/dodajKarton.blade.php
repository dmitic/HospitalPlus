@extends('layouts.app')

@section('dodajKorisnikaCss')
<link rel="stylesheet" href="{{ asset('/css/formeCSS.css') }}">
@endsection

@section('body_class', 'dodajKartonBody')

@section('content')

<!-- header -->
<div class="container-widgetbar">
  @include('inc.navbar')
</div>
<div class="container my-5 dodajKarton">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @if (isset($pacijent->karton->broj_kartona))
        <div class="card-header mb-4">IZMENA KARTONA: {{ $pacijent->karton->broj_kartona }}</div>
        @else
        <div class="card-header mb-4">DODAJ KARTON</div>
        @endif

        <div class="card-body">
          @if (isset($pacijent->karton->broj_kartona))
          <form action="{{ route('izmeniKartonLekar', ['pacijent' => $pacijent->id]) }}" method="post">
            {{-- <form action="{{ route('snimiKarton', ['pacijent' => $pacijent->id]) }}" method="post"> --}}
            @method('PUT')
            @else
            <form method="POST" action="{{ route('dodajKartonLekar', ['pacijent' => $pacijent->id]) }}">
              @endif
              @csrf

              <div class="form-group row">
                <label for="ime" class="col-md-4 col-form-label text-md-right">Ime</label>

                <div class="col-md-6 m-2">
                  <input id="ime" type="text" class="form-control" name="ime" value="{{ $pacijent->ime ?? old('ime') }}"
                    readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="prezime" class="col-md-4 col-form-label text-md-right">Prezime</label>

                <div class="col-md-6 m-2">
                  <input id="prezime" type="text" class="form-control" name="prezime"
                    value="{{ $pacijent->prezime ?? old('prezime') }}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="datumRodjenja" class="col-md-4 col-form-label text-md-right">Datum Rodjenja</label>

                <div class="col-md-6 m-2">
                  <input id="datumRodjenja" type="date" class="form-control" name="datumRodjenja"
                    value="{{ $pacijent->datum_rodjenja ?? old('datum_rodjenja') }}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="lbo" class="col-md-4 col-form-label text-md-right">Licni Broj Osiguranja (LBO)</label>

                <div class="col-md-6 m-2">
                  <input id="lbo" type="number" class="form-control" name="lbo"
                    value="{{ $pacijent->lbo ?? old('lbo') }}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="brojKartona" class="col-md-4 col-form-label text-md-right">Broj Kartona</label>

                <div class="col-md-6 m-2">
                  <input id="brojKartona" type="text" class="form-control @error('brojKartona') is-invalid @enderror"
                    name="brojKartona" value="{{ $pacijent->karton->broj_kartona ?? old('brojKartona') }}" autofocus>
                  @error('brojKartona')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-2 dugme">
                <div class="col-md-8 offset-md-2">
                  <a href="/lekar/kartoni" class="btn btn-outline-secondary float-left">
                    OTKAŽI
                  </a>
                  <button type="submit" class="btn btn-primary float-right">
                    SAČUVAJ
                  </button>
                </div>
              </div>

            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection