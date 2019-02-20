@extends('layouts.admin')

@section('title', 'Message de '.$reference->email)

@section('content')
<div class="row pb-3">
    <div class="col-auto mr-auto">
        <a href="{{ route('admin.references.index') }}" class="btn btn-primary">Retour</a>
        <h1 class="h2">Message de <small class="text-primary">{{ $reference->email }}</small></h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="card border-dark m-3" style="box-shadow: 2px 6px 10px grey;">
            <div class="card-message" style='margin-top: 60px; margin-bottom: 340px; margin-right: 100px; margin-left: 50px;'>
                
                <h6 class="card-subemail mb-2 "><strong class="card-email text-muted">Référencement reçu le:  </strong>{{ $reference->created_at }}</h6>
                <hr>
                <p class="card-text">
                    <strong>Nom du lieu :</strong> {{ $reference->name }} </br></br>
                    <strong>Adresse :</strong>  {{ $reference->address }}</br></br>
                    <strong>Ville :</strong> {{ $reference->city }}</br></br>
                </p>
                <p>
                    <strong>Type du lieu :</strong> {{ $reference->typePlace }}</br></br>
                    <strong>Nombre minimum de personnes :</strong>  {{ $reference->cap_min }}</br></br>
                    <strong>Nombre maximum de personnes :</strong> {{ $reference->cap_max  }}</br></br>
                </p>
                <p>
                    <strong>Email du référenceur :</strong> {{ $reference->email }} </br></br>
                    <strong>Telephone référenceur :</strong>  {{ $reference->phone }}</br></br>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
