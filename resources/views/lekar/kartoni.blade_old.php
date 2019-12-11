@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')
  <!-- Tabela korisnik -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/lekar/pretragaKartona" method="get">
          <div class="row justify-content-between">
            <a href="/lekar" class=" btn btn-warning col-md-1">Back</a>
            <div class="input-group col-md-3">
              <input type="text" name="str" class="form-control" placeholder="Pretraga..." value="{{ $_GET['str'] ?? '' }}">
              <span class="input-group-btn ml-1">
                <button class="btn btn-success">Traži!</button>
              </span>
            </div>
          </div>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>LBO</th>
                <th>Izabrani lekar</th>
                <th>Broj kartona</th>
                <th style="width:50px"></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>LBO</th>
                <th>Izabrani lekar</th>
                <th>Broj kartona</th>
                <th style="width:50px"></th>
              </tr>
            </tfoot>
            <tbody>
              {{-- {{dd($kartoni)}} --}}
              @foreach ($kartoni as $karton)
                <tr>
                  <td>{{ $karton->pacijent->ime }}</td>
                  <td>{{ $karton->pacijent->prezime }}</td>
                  <td>{{ $karton->pacijent->lbo }}</td>
                  <td>{{ $karton->lekar->ime }} {{ $karton->lekar->prezime }}</td>
                  {{-- <td>{{ $karton->lekar['ime'] }} {{ $karton->lekar['prezime'] }}</td> --}}
                  <td><a href="#" style="text-decoration:none;" title="Detaljnije....">{{ $karton->broj_kartona }}</a></td>
                  <td><a href="#" class="btn btn-primary" title="Izmeni proizvod">Izmeni</a></td>
                </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
              <div class="col-md-12 row justify-content-center">
                {{ isset($_GET['str']) ? $kartoni->appends(request()->input())->links() : $kartoni->links() }}
              </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-between">
        <a href="/lekar/dodajKarton" class=" btn btn-primary m-1 ml-4" title="Dodaj novog korisnika">Dodaj karton</a>

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