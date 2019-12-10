@extends('layouts.app')

@section('dodajKorisnikaCss')
<link rel="stylesheet" href="{{ asset('/css/formeCSS.css') }}">
@endsection

@section('body_class', 'dodajKorisnikaBody')

@section('content')

<!-- header -->
<div class="container-widgetbar">
    @include('inc.navbar')
</div>

<div class="container mt-5 dodajKorisnika">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if (isset($korisnik))
                    <div class="card-header mb-4">IZMENA KORISNIKA: {{ $korisnik->username }}</div>
                @else
                    <div class="card-header mb-4">DODAJ KORISNIKA</div>
                @endif

                <div class="card-body">
                    @if (isset($korisnik->id))
                    <form action="{{ route('snimiKorisnika', ['korisnik' => $korisnik->id]) }}" method="post">
                        @method('PUT')
                        @else
                        <form action="{{ route('dodajKorisnika') }}" method="post">
                            @endif
                            @csrf

                            <div class="form-group row">
                                <label for="ime" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>
                                <div class="col-md-6 m-2">
                                    <input id="ime" type="text" class="form-control @error('ime') is-invalid @enderror"
                                        name="ime" required value="{{ $korisnik->ime ?? old('ime') }}"
                                        autocomplete="ime" autofocus>
                                    @error('ime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="prezime"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>

                                <div class="col-md-6 m-2">
                                    <input id="prezime" type="text"
                                        class="form-control @error('prezime') is-invalid @enderror" name="prezime"
                                        required value="{{ $korisnik->prezime ?? old('prezime') }}"
                                        autocomplete="prezime" autofocus>

                                    @error('prezime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefon"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

                                <div class="col-md-6 m-2">
                                    <input id="telefon" type="text"
                                        class="form-control @error('telefon') is-invalid @enderror" name="telefon"
                                        required value="{{ $korisnik->telefon ?? old('telefon') }}"
                                        autocomplete="telefon" autofocus>

                                    @error('telefon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6 m-2">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $korisnik->email ?? old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Korisničko ime') }}</label>

                                <div class="col-md-6 m-2">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ $korisnik->username ?? old('username') }}" required
                                        autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="uloga" class="col-md-4 col-form-label text-md-right">Uloga</label>
                                <div class="col-md-6 m-2">
                                    <select name="uloga" id="uloga" class="form-control">
                                        @foreach ($role as $rola)
                                        <option value="{{ $rola->id }}" {{ old('uloga') == $rola->id ? "selected":"" }}
                                            @if (isset($korisnik->rola->id) && ($korisnik->rola->id === $rola->id))
                                            {{ 'selected' }}
                                            @endif
                                            >{{ $rola->naziv }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

                                <div class="col-md-6 m-2">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Potvrdi lozinku') }}</label>

                                <div class="col-md-6 m-2">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
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