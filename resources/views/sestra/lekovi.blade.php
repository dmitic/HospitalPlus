@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')
  <!-- Tabela korisnik -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/sestra/pretragaLekova" method="get">
          <div class="row justify-content-between">
            <a href="/sestra" class=" btn btn-warning col-md-1">Back</a>

            <div class="input-group col-md-3">

              <input type="text" name="str" class="form-control" placeholder="Pretraga..." value="{{ $_GET['str'] ?? '' }}">

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

          <table class="table table-striped tabProizvodi" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Naziv</th>
                <th>Količina</th>
                <th style="width:50px"></th>
                <th style="width:50px"></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Naziv</th>
                <th>Količina</th>
                <th style="width:50px"></th>
                <th style="width:50px"></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($lekovi as $lek)
                <tr>
                  <td>{{ $lek->naziv }}</td>
                  <td>{{ $lek->kolicina }}</td>
                  <td><a href="{{ route('izmeniLek', ['lek' => $lek->id]) }}" class="btn btn-primary" title="Izmeni...">Izmeni</a></td>
                  <td style="text-align:center; width:180px;">
                    <form action="{{ route('obrisiLek', ['lek' => $lek->id]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="return confirm('Da li si siguran da želiš da obrišeš?')"title="Obriši lek">Obriši</button>
                    </form>
                  </td>
              @endforeach
              
              </tr>

            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-12 row justify-content-center">
            {{ isset($_GET['str']) ? $lekovi->appends(request()->input())->links() : $lekovi->links() }}
          </div>
        </div>
      </div>
      <div class="row justify-content-between">
        <a href="{{ route('dodajLek') }}" class=" btn btn-primary m-1 ml-4" title="Dodaj novi lek">Dodaj lek</a>
        {{-- <a href="{{ route('dodajLek') }}" class=" btn btn-primary m-1 ml-4" title="Dodaj novi lek">Dodaj lek</a> --}}

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