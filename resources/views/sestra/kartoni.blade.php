@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')
  <!-- Tabela korisnik -->
  {{-- {{dd($pacijenti)}} --}}
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/sestra/pretragaKartona" method="get">
          <div class="row justify-content-between">
            <a href="/sestra" class=" btn btn-warning col-md-1">Back</a>
            <div class="input-group col-md-3">
              <input type="text" name="str" class="form-control" placeholder="Pretraga..."
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
                <th>LBO</th>
                <th>Izabrani lekar</th>
                <th>Broj kartona</th>
                <th style="width:200px"></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>LBO</th>
                <th>Izabrani lekar</th>
                <th>Broj kartona</th>
                <th style="width:200px"></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($pacijenti as $pacijent)
              <tr>
                <td>{{ $pacijent->ime }}</td>
                <td>{{ $pacijent->prezime }}</td>
                <td>{{ $pacijent->lbo }}</td>
                <td>{{ $pacijent->izabraniLekar->ime ?? 'Nema izabranog lekara' }} {{ $pacijent->izabraniLekar->prezime ?? '' }}</td>
                <td><a href="/sestra/prikazi/{{$pacijent->karton->id ?? ''}}" style="text-decoration:none;"
                    title="Detaljnije....">{{ $pacijent->karton->broj_kartona ?? ''}}</a></td>
                <td><a href="{{ route('izmeniKarton', ['pacijent' => $pacijent->id]) }}" class="btn btn-primary"
                    title="Izmeni">Dodaj karton/Izmeni</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p><strong>{{ $_GET['str'] ?? '' }}</strong> ne postoji u bazi!</p>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="col-md-12 row justify-content-center">
              {{ isset($_GET['str']) ? $pacijenti->appends(request()->input())->links() : $pacijenti->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection