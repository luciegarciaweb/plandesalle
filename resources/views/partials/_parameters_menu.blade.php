<!-- Profile menu -->
<div class="col-sm-10 mt-3 mb-4">
    <h2>{{ __(' Bienvenue') }} {{Auth::user()->firstname}} !</h2>
</div>
<div>
    <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <li class="nav-link text-right"><span class="pull-left"><strong>Email</strong></span>{{Auth::user()->email}}</li>
        <li class="nav-link text-right"><span class="pull-left"><strong>Nom</strong></span> {{Auth::user()->firstname}} {{Auth::user()->lastname}}</li>
    </ul> 
    <hr>
</div>
<div class="card mb-3">
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action @if (Request::is('parameters')) active @endif" 
            href="{{ route('parameters.dashboard') }}">
            Tableau de bord
        </a>
        <a class="list-group-item list-group-item-action @if (Request::is('parameters/compte')) active @endif" 
            href="{{ route('parameters.edit') }}">
            Mon compte
        </a>
        <a class="list-group-item list-group-item-action @if (Request::is('parameters/mot-de-passe')) active @endif" 
            href="{{ route('parameters.passwords.edit') }}">
            Mot de passe
        </a>
        <a class="list-group-item list-group-item-action @if (Request::is('parameters/favoris')) active @endif" 
            href="{{ route('parameters.favoris') }}">
            Mes favoris
        </a>
    </div>
</div>