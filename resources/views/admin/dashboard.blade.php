@extends('layouts.admin')

@section('title', 'Accueil')

@section('content')
<div class="row pb-3">
    <div class="col-auto mr-auto">
        <h1 class="h2">Panneau d'administration</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4>Utilisateurs</h4>
                <h1 class="mb-0">{{ $users }}</h1>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.users.index') }}" class="card-link">Tous les utilisateurs</a>
            </div>
        </div>
    </div> 
    <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4>Messages reçus</h4>
                <h1 class="mb-0">{{ $contacts }}</h1>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.contacts.index') }}" class="card-link">Tous les messages</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4>Référencements reçus</h4>
                <h1 class="mb-0">{{ $references }}</h1>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.references.index') }}" class="card-link">Tous les référencements</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <h4>Lieux</h4>
                <h1 class="mb-0">{{ $places }}</h1>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.places.index') }}" class="card-link">Tous les lieux</a>
            </div>
        </div>
    </div>      
</div>
@endsection