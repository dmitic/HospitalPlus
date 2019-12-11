@extends('layouts.app')

@section('dodajKorisnikaCss')
<link rel="stylesheet" href="{{ asset('/css/formeCSS.css') }}">
@endsection

@section('body_class', 'dodajLekBody')

@section('content')

<!-- header -->
<div class="container-widgetbar">
  @include('inc.navbar')
</div>
<div class="container my-5 dodajLek">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @if (isset($lek))
        <div class="card-header mb-4">IZMENA PODATKA O LEKU: {{ $lek->naziv }}</div>
        @else
        <div class="card-header mb-4">DODAJ LEK</div>
        @endif

        <div class="card-body">
          @if (isset($lek->id))
          <form action="{{ route('snimiLekLekar', ['lek' => $lek->id]) }}" method="post">
            @method('PUT')
            @else
            <form method="POST" action="{{ route('dodajLekLekar') }}">
              @endif
              @csrf

              <div class="form-group row">
                <label for="naziv" class="col-md-4 col-form-label text-md-right">Naziv</label>

                <div class="col-md-6 m-2">
                  <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv"
                    value="{{ $lek->naziv ?? old('naziv') }}" autofocus>
                  @error('naziv')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">

                <label for="kolicina" class="col-md-4 col-form-label text-md-right">Količina</label>

                <div class="col-md-6 m-2">
                  <input id="kolicina" type="number" class="form-control @error('kolicina') is-invalid @enderror"
                    name="kolicina" value="{{ $lek->kolicina ?? old('kolicina') }}" autofocus>
                  @error('kolicina')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-md-8 offset-md-2">
                  <a href="/lekar/bolesti" class="btn btn-outline-secondary float-left">
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