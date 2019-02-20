@extends('layouts.admin')

@section('title', 'Message de '.$contact->email)

@section('content')
<div class="row pb-3">
    <div class="col-auto mr-auto">
        <h1 class="h2">Message de <small class="text-primary">{{ $contact->email }}</small></h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">Liste des messages</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card border-dark m-3" style="box-shadow: 2px 6px 10px grey;">
            <div class="card-message" style='margin-top: 60px; margin-bottom: 340px; margin-right: 100px; margin-left: 50px;'>
                <strong class="card-email">Message reçu le:</strong>
                <h6 class="card-subemail mb-2 text-muted">{{ $contact->created_at }}</h6>
                <p class="card-text">
                    <strong>Nom du contact :</strong> {{ $contact->fullname }} </br></br>
                    <strong>Objet :</strong> {{ $contact->object }}</br></br>
                    <strong>Message :</strong> 
                    <p>{{ $contact->message }}</p>
                </p>
            </div>
        </div>
    </div>
 </div>
@endsection
