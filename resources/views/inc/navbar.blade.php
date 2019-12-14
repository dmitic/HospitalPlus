<div class="row justify-content-around header align-items-center">
  <!-- logo -->
  <div class="col-xs-12 col-sm-6 col-lg-3  text-center logo  ">
    <a href="/"><img src="/images/logo1.png" alt="logo"></a>
  </div>

  <!-- info -->
  <div class=" col-xs-12 col-sm-6 col-lg-3  text-center adr-wt">
    <p class=" "> Dunavska 35-37 Beograd</p>
    <p class=" ">Radno vreme: 24/7</p>
    <p class=" ">011/ 123-45-68</p>
  </div>

  <!-- role -->
  <div class="col-xs-12 col-sm-6 col-lg-3 text-center adr-wt ">
    <p>{{ \Auth::user()->rola->naziv }} {{ \Auth::user()->ime }} {{ \Auth::user()->prezime }}</p>
  </div>

  <!-- log-out -->
  <div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center">
    <a class="btn btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
      {{ __('LOG OUT') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>