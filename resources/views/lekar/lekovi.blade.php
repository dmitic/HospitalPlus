@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!-- header -->
  @include('inc.navbar')
  <!-- Tabela korisnik -->
  <div>
    <div class="card mb-3">
      <div class="card-header">
        <form action="/lekar/pretragaLekova" method="get">
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
          @if (count($lekovi) > 0)
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
                <td>{{ $lek->kolicina }} komada</td>
                <td><a href="{{ route('izmeniLekLekar', ['lek' => $lek->id]) }}" class="btn btn-primary"
                    title="Izmeni...">Izmeni</a></td>
                <td style="text-align:center; width:180px;">
                  <form action="{{ route('obrisiLekLekar', ['lek' => $lek->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Da li si siguran da želiš da obrišeš?')"
                      title="Obriši lek">Obriši</button>
                  </form>
                </td>
                @endforeach

              </tr>

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
            {{ isset($_GET['str']) ? $lekovi->appends(request()->input())->links() : $lekovi->links() }}
          </div>
        </div>
      </div>
      <div class="row">
        <a href="{{ route('dodajLekLekar') }}" class=" btn btn-primary m-1 ml-4" title="Dodaj novi lek">Dodaj lek</a>
      </div>
    </div>
    @endsection