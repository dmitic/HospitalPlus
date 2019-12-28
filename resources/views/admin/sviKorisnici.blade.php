@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')

  <!-- Tabela korisnik -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/admin/pretragaKorisnika" method="get">
          <div class="row justify-content-between">
            <a href="/admin" class=" btn btn-warning col-md-1">Back</a href="">

            <div class="input-group col-md-3">

              <input type="text" name="str" class="form-control" placeholder="Pretraga korisnika"
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
          @if (count($korisnici) > 0)
          <table class="table table-striped tabProizvodi" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Korisničko ime</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>ID/Rola</th>
                <th>Aktivan</th>
                <th style="width:50px"></th>
                <th style="width:50px"></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Korisničko ime</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>ID/Rola</th>
                <th>Aktivan</th>
                <th style="width:50px"></th>
                <th style="width:50px"></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($korisnici as $korisnik)

              <tr>
                <td>{{ $korisnik->username }}</td>
                <td>{{ $korisnik->ime }}</td>
                <td>{{ $korisnik->prezime }}</td>
                <td>{{ $korisnik->telefon }}</td>
                <td>{{ $korisnik->email }}</td>
                <td>{{ $korisnik->rola->naziv }}</td>
                <td>{{ $korisnik->active === 1 ? 'Aktivan' : 'Neaktivan' }}</td>
                <td><a href="izmenikorisnika/{{ $korisnik->id }}" class="btn btn-primary"
                    title="Izmeni korisnika">Izmeni</a></td>
                <td style="text-align:center; width:180px;">
                  <form action="{{ route('statusKorisnika', ['korisnik' => $korisnik->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger" onclick="return confirm('Da li si siguran da želiš da aktiviraš/deaktiviraš korisnika?')"
                      title="Promeni status korisnika">{{ $korisnik->active === 1 ? 'Deaktiviraj' : 'Aktiviraj'}}</button>
                  </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          @else
          <p><strong>{{ $_GET['str'] ?? '' }}</strong> ne postoji u bazi!</p>
          @endif
        </div>
        <div class="col-md-12 row justify-content-center">
          {{ isset($_GET['str']) ? $korisnici->appends(request()->input())->links() : $korisnici->links() }}
        </div>
      </div>
      <div class="row">
        <a href="/admin/dodajkorisnika" class=" btn btn-primary m-1 ml-4" title="Dodaj novog korisnika">Dodaj
          korisnika</a>
      </div>
    </div>
    @endsection