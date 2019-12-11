@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')
  <!-- Tabela korisnik -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/lekar/pretragaBolesti" method="get">
          <div class="row justify-content-between">
            <a href="/lekar" class=" btn btn-warning col-md-1">Back</a>
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
          @if (count($bolesti) > 0)
          <table class="table table-striped tabProizvodi" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Naziv</th>
                <th>Šifra</th>
                <th style="width:50px"></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Naziv</th>
                <th>Šifra</th>
                <th style="width:50px"></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($bolesti as $bolest)
              <tr>
                <td>{{ $bolest->naziv }}</td>
                <td>{{ $bolest->sifra_bolesti }}</td>
                <td><a href="{{ route('izmeniBolestLekar', ['bolest' => $bolest->id]) }}" class="btn btn-primary"
                    title="Izmeni...">Izmeni</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p><strong>
              @if(isset($_GET['str']))
              {{ $_GET['str'] }}
              @endif
            </strong> ne postoji u bazi!</p>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12 row justify-content-center">
            {{ isset($_GET['str']) ? $bolesti->appends(request()->input())->links() : $bolesti->links() }}
          </div>
        </div>
      </div>
      <div class="row justify-content-between">
        <a href="/lekar/dodajBolest" class=" btn btn-primary m-1 ml-4" title="Dodaj novu bolest">Dodaj bolest</a>
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