@extends('layouts.app')

@section('dodajKorisnikaCss')
<link rel="stylesheet" href="{{ asset('/css/formeCSS.css') }}">
@endsection

@section('body_class', 'dodajPregledBody')

@section('content')

<!-- header -->
<div class="container-widgetbar">
    @include('inc.navbar')
</div>
<div class="container my-5 dodajPregled">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4">PREGLED</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('snimipregled') }}">
                    {{-- <form method="POST" action="{{ route('snimipregled', ['evlec' => $karton->id]) }}"> --}}
                        @csrf
                        
                        <div class="form-group row">
                            <label for="datum" class="col-md-4 col-form-label text-md-right">Datum Posete</label>

                            <div class="col-md-6 m-2">
                                <input id="datum" type="date" class="form-control" name="datum"
                                    value="{{date("Y-m-d")}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dijagnoza" class="col-md-4 col-form-label text-md-right">Dijagnoza</label>
                            <div class="col-md-6 m-2">
                                <select name="dijagnoza" class="form-control">
                                    @foreach ($dijagnoze as $dijagnoza)
                                    <option value="{{ $dijagnoza->id }}">{{ $dijagnoza->naziv }} -
                                        {{ $dijagnoza->sifra_bolesti }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="terapija" class="col-md-4 col-form-label text-md-right">Terapija</label>
                            <div class="col-md-6 m-2">
                                <select name="terapija" class="form-control">
                                    @foreach ($lekovi as $lek)
                                    <option value="{{ $lek->id }}">{{ $lek->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="karton_id" value="{{$karton->id}}">
                        <div class="form-group row">
                            <label for="opis" class="col-md-4 col-form-label text-md-right">Opis</label>

                            <div class="col-md-6 m-2">
                                <textarea id="opis" type="text" class="form-control" name="opis" value="@error('opis') is-invalid @enderror" rows="10"
                                    autofocus required></textarea>
                                @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-2">
                            <div class="col-md-8 offset-md-2">
                                <a href="/lekar/prikazi/{{$karton->id}}" class="btn btn-outline-secondary float-left">
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