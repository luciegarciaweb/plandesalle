@extends('layouts.admin')

@section('title', 'Voir l\'utilisateur '.$user->email)

@section('content')
<div class="row pb-3">
    <div class="col-auto mr-auto">
        <h1 class="h2">Voir l'utilisateur <small class="text-primary">{{ $user->email }}</small></h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Liste des utilisateurs</a>
    </div>
</div>
@include('partials/_alert')
<div class="row">
    <div class="col-sm-4">
        <div class="card mb-3">
            <div class="card-header">
                <div class="float-left">
                    {{ $user->fullname() }} 
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="font-weight-bold pr-2">E-mail</span> {{ $user->email }}
                </li>
                <li class="list-group-item">
                    <span class="font-weight-bold pr-2">Téléphone</span> 
                    @if ($user->phone) 
                    {{ $user->phone }} 
                    @else 
                    n\a
                    @endif
                </li>
            </ul>
            <div class="card-footer">
                <a href="{{ route('admin.users.active', $user) }}">
                    @if ($user->is_active)
                    <button type="button" class="btn btn-success btn-sm">
                        Activer
                    </button>
                    @else
                    <button type="button" class="btn btn-warning btn-sm">
                        Désactiver
                    </button>
                    @endif
                </a>
                <a href="{{ route('admin.users.admin', $user) }}" class="btn btn-info btn-sm">
                    @if ($user->is_admin)
                    Administrateur                      
                    @else
                    Client
                    @endif
                </a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Adresse
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                        <span class="float-left font-weight-bold">Prénom</span> 
                        <span class="float-right">{{ $user->firstname }}</span>
                    </li>
                <li class="list-group-item">
                    <span class="float-left font-weight-bold">Nom</span> 
                    <span class="float-right">{{ $user->lastname }}</span>
                </li>
                <li class="list-group-item">
                    <span class="float-left font-weight-bold">Adresse</span> 
                    <span class="float-right">{{ $user->address }}</span>
                </li>               
                <li class="list-group-item">
                    <span class="float-left font-weight-bold">Complément</span> 
                    <span class="float-right">{{ $user->complement }}</span>
                </li>  
                <li class="list-group-item">
                    <span class="float-left font-weight-bold">Code postal</span> 
                    <span class="float-right">{{ $user->postal_code }}</span>
                </li>
                <li class="list-group-item">
                    <span class="float-left font-weight-bold">Ville</span> 
                    <span class="float-right">{{ $user->city }}</span>
                </li>                  
            </ul>
        </div>
    </div>
</div>
@endsection