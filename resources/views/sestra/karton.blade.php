@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  <!-- Tabela korisnik -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="#" method="get">
          <div class="row justify-content-between">
            <a href="/sestra/kartoni" class=" btn btn-warning col-md-1">Back</a>
          </div>
        </form>
      </div>
      <div class="card-body">
        {{-- {{dd($stavke)}} --}}
        <div class="row">
          <div class="col-md-12 text-center mb-3">Broj kartona: <strong>{{$karton->broj_kartona}},
              {{$karton->pacijent->ime}} {{$karton->pacijent->prezime}}</strong></div>
        </div>

        <div class="table-responsive">
          @if (count($pregledi) > 0)
          <table class="table table-striped tabProizvodi" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Datum pregleda</th>
                <th>Lekar</th>
                <th>Dijagnoza</th>
                <th>Terapija</th>
                <th style="width:800px;">Opis</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Datum pregleda</th>
                <th>Lekar</th>
                <th>Dijagnoza</th>
                <th>Terapija</th>
                <th>Opis</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($pregledi as $pregled)
              <tr>
                <td>{{ Carbon\Carbon::parse($pregled->datum_posete)->format('j. F Y.') }}</td>
                <td>{{ $pregled->lekar->ime }} {{ $pregled->lekar->prezime }}</td>
                <td>{{ $pregled->bolest->naziv}}</td>
                <td>{{ $pregled->lek->naziv}}</td>
                <td>{{ $pregled->opis }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>Do sada nije bilo pregleda!</p>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12 row justify-content-center">
            {{ isset($_GET['str']) ? $pregledi->appends(request()->input())->links() : $pregledi->links() }}
          </div>
        </div>
      </div>
    </div>
    @endsection