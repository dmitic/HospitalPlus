@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  <!-- Tabela pacijenti -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/sestra/pretragaPacijenata" method="get">
          <div class="row justify-content-between">
            <a href="/sestra" class=" btn btn-warning col-md-1">Back</a href="">

            <div class="input-group col-md-3">

              <input type="text" name="str" class="form-control" placeholder="Pretraga pacijenata"
                value="{{ $_GET['str'] ?? '' }}">

              <span class="input-group-btn ml-1">
                <button class="btn btn-success">Traži!</button>
              </span>
            </div>
          </div>
        </form>
      </div>

      @error('poruka')
      <div class="row  text-center">
        <div class="col-md-12">
          <div class="alert alert-success">{{ $message }}</div>
        </div>
      </div>
      @enderror

      <div class="card-body">
        <div class="table-responsive">
          @if (count($pacijenti) > 0)
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Adresa</th>
                <th>Grad</th>
                <th>Telefon</th>
                <th>Pol</th>
                <th>Datum rodjenja</th>
                <th>Krvna grupa</th>
                <th>LBO</th>
                <th style="width:50px"></th>
                <th style="width:50px"></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Adresa</th>
                <th>Grad</th>
                <th>Telefon</th>
                <th>Pol</th>
                <th>Datum rodjenja</th>
                <th>Krvna grupa</th>
                <th>LBO</th>
                <th style="width:50px"></th>
                <th style="width:50px"></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($pacijenti as $pacijent)
              <tr>
                <td>{{ $pacijent->ime }}</td>
                <td>{{ $pacijent->prezime }}</td>
                <td>{{ $pacijent->adresa }}</td>
                <td>{{ $pacijent->grad }}</td>
                <td>{{ $pacijent->telefon }}</td>
                <td>{{ $pacijent->pol }}</td>
                <td>{{ Carbon\Carbon::parse($pacijent->datum_rodjenja)->format('j. F Y.') }}</td>
                <td>{{ $pacijent->krvna_grupa }}</td>
                <td>{{ $pacijent->lbo }}</td>
                <td><a href="izmenipacijenta/{{ $pacijent->id }}" class="btn btn-primary"
                    title="Izmeni pacijenta">Izmeni</a></td>
                <td style="text-align:center; width:180px;">
                  <form action="{{ route('obrisiPacijenta', ['pacijent' => $pacijent->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Da li si siguran da želiš da obrišeš?')"
                      title="Obriši pacijenta">Obriši</button>
                  </form>
                </td>
              </tr>
              @endforeach


            </tbody>
          </table>
          @else
          <p>Pacijent <strong>
              @if(isset($_GET['str']))
              {{ $_GET['str'] }}
              @endif
            </strong> ne postoji u bazi!</p>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12 row justify-content-center">
            {{ isset($_GET['str']) ? $pacijenti->appends(request()->input())->links() : $pacijenti->links() }}
          </div>
        </div>
      </div>
      <div class="row justify-content-between">
        <a href="/sestra/dodajPacijenta" class=" btn btn-primary m-1 ml-4" title="Dodaj novog pacijenta">Dodaj pacijenta</a href="">

        <a class="btn btn-danger m-1 mr-4" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          {{ __('Log Out') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

      </div>
    </div>

    @endsection