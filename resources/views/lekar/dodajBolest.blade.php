@extends('layouts.app')

@section('dodajKorisnikaCss')
<link rel="stylesheet" href="{{ asset('/css/formeCSS.css') }}">
@endsection

@section('body_class', 'dodajBolestBody')

@section('content')

<!-- header -->
<div class="container-widgetbar">
  @include('inc.navbar')
</div>
<div class="container my-5 dodajBolest">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @if (isset($bolest))
          <div class="card-header mb-4">IZMENA BOLESTI: {{ $bolest->naziv }}</div>
        @else
          <div class="card-header mb-4">DODAJ BOLESTI</div>
        @endif
        <div class="card-body">
          @if (isset($bolest->id))
          <form action="{{ route('snimiBolestLekar', ['bolest' => $bolest->id]) }}" method="post">
            @method('PUT')
            @else
            <form method="POST" action="{{ route('dodajBolestLekar') }}">
              @endif
              @csrf

              <div class="form-group row">
                <label for="naziv" class="col-md-4 col-form-label text-md-right">Naziv</label>

                <div class="col-md-6 m-2">
                  <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ $bolest->naziv ?? old('naziv') }}" autofocus>
                  @error('naziv')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">

                <label for="sifra_bolesti" class="col-md-4 col-form-label text-md-right">Šifra Bolesti</label>

                <div class="col-md-6 m-2">
                  <input id="sifra_bolesti" type="text" class="form-control @error('sifra_bolesti') is-invalid @enderror" name="sifra_bolesti" value="{{ $bolest->sifra_bolesti ?? old('sifra_bolesti') }}" autofocus>
                  @error('sifra_bolesti')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-2">
                <div class="col-md-6 offset-md-4">
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