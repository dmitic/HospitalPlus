@extends('layouts.app')

@section('dodajKorisnikaCss')
<link rel="stylesheet" href="{{ asset('/css/formeCSS.css') }}">
@endsection

@section('body_class', 'dodajPacijentaBody')

@section('content')

<!-- header -->
<div class="container-widgetbar">
  @include('inc.navbar')
</div>
{{-- {{dd($lekari)}} --}}
<div class="container my-5 dodajPacijenta">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          @if (isset($pacijent))
              <div class="card-header mb-4">IZMENA PACIJENTA: {{ $pacijent->ime }}</div>
          @else
              <div class="card-header mb-4">DODAJ PACIJENTA</div>
          @endif

        <div class="card-body">
            @if (isset($pacijent->id))
            <form action="{{ route('snimiPacijenta', ['pacijent' => $pacijent->id]) }}" method="post">
                @method('PUT')
                @else
                <form action="{{ route('dodajPacijenta') }}" method="post">
                    @endif
            @csrf

            <div class="form-group row">
              <label for="ime" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

              <div class="col-md-6 m-2">
                <input id="ime" type="text" class="form-control @error('ime') is-invalid @enderror"
                  name="ime" required value="{{ $pacijent->ime ?? old('ime') }}"
                  autocomplete="ime" autofocus>
                @error('ime')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
                <label for="prezime" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>
              <div class="col-md-6 m-2">
                <input id="prezime" type="text"
                  class="form-control @error('prezime') is-invalid @enderror" name="prezime"
                  required value="{{ $pacijent->prezime ?? old('prezime') }}"
                  autocomplete="prezime" autofocus>

                @error('prezime')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
                <label for="telefon" class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

              <div class="col-md-6 m-2">
                <input id="telefon" type="text"
                  class="form-control @error('telefon') is-invalid @enderror" name="telefon"
                  required value="{{ $pacijent->telefon ?? old('telefon') }}"
                  autocomplete="telefon" autofocus>

                @error('telefon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="adresa" class="col-md-4 col-form-label text-md-right">{{ __('Adresa') }}</label>

              <div class="col-md-6 m-2">
                <input id="adresa" type="text"
                  class="form-control @error('adresa') is-invalid @enderror" name="adresa"
                  value="{{ $pacijent->adresa ?? old('adresa') }}" required autocomplete="adresa">

                @error('adresa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
                <label for="grad" class="col-md-4 col-form-label text-md-right">{{ __('Grad') }}</label>

              <div class="col-md-6 m-2">
                <input id="grad" type="text"
                  class="form-control @error('grad') is-invalid @enderror" name="grad"
                  value="{{ $pacijent->grad ?? old('grad') }}" required autocomplete="grad">

                @error('grad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="datumRodjenja" class="col-md-4 col-form-label text-md-right">Datum Rodjenja</label>

              <div class="col-md-6 m-2">
                <input id="datumRodjenja" type="date" class="form-control" name="datumRodjenja" value="{{ $pacijent->datum_rodjenja ?? old('datum_rodjenja') }}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="grad" class="col-md-4 col-form-label text-md-right">{{ __('Lični Broj Osiguranja (LBO)') }}</label>

              <div class="col-md-6 m-2">
                <input id="lbo" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                  class="form-control @error('lbo') is-invalid @enderror" name="lbo"
                  value="{{ $pacijent->lbo ?? old('lbo') }}" required autocomplete="lbo">

                @error('lbo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
                <label for="iz_lekar" class="col-md-4 col-form-label text-md-right">Izabrani lekar</label>
                <div class="col-md-6 m-2">
                    <select name="iz_lekar" id="iz_lekar" class="form-control">
                        <option value="">Nema izabranog lekara</option>
                        @foreach ($lekari as $lekar)
                        <option value="{{ $lekar->id }}" {{ old('iz_lekar') == $lekar->id ? "selected":"" }}
                            @if (isset($pacijent->izabraniLekar->id) && ($pacijent->izabraniLekar->id === $lekar->id))
                              {{ 'selected' }}
                            @endif
                            >{{ $lekar->ime }} {{ $lekar->prezime }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
              <label for="krv" class="col-md-4 col-form-label text-md-right">Krvna Grupa</label>
              <div class="col-md-6 m-2">
                <select id="krv" name="krv" class="form-control" required>
                  <option value="0+" {{isset($pacijent) ? ($pacijent->krvna_grupa === '0+' ? 'selected' : '') : ''}}>0+</option>
                  <option value="0-" {{isset($pacijent) ? ($pacijent->krvna_grupa === '0-' ? 'selected' : '') : ''}}>0-</option>
                  <option value="A+" {{isset($pacijent) ? ($pacijent->krvna_grupa === 'A+' ? 'selected' : '') : ''}}>A+</option>
                  <option value="A-" {{isset($pacijent) ? ($pacijent->krvna_grupa === 'A-' ? 'selected' : '') : ''}}>A-</option>
                  <option value="B+" {{isset($pacijent) ? ($pacijent->krvna_grupa === 'B+' ? 'selected' : '') : ''}}>B+</option>
                  <option value="B-" {{isset($pacijent) ? ($pacijent->krvna_grupa === 'B-' ? 'selected' : '') : ''}}>B-</option>
                  <option value="AB+" {{isset($pacijent) ? ($pacijent->krvna_grupa === 'AB+' ? 'selected' : '') : ''}}>AB+</option>
                  <option value="AB-" {{isset($pacijent) ? ($pacijent->krvna_grupa === 'AB-' ? 'selected' : '') : ''}}>AB-</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="pol" class="col-md-4 col-form-label text-md-right">Pol</label>
              <div class="col-md-6 m-2">
                <select id="pol" name="pol" class="form-control" required>
                  <option value="M"  {{isset($pacijent) ? ($pacijent->pol === 'M' ? 'selected' : '') : ''}}>Muški</option>
                  <option value="Ž"  {{isset($pacijent) ? ($pacijent->pol === 'Ž' ? 'selected' : '') : ''}}>Ženski</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-2">
              <div class="col-md-8 offset-md-2">
                <a href="/sestra/pacijenti" class="btn btn-outline-secondary float-left">
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