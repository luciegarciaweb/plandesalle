@extends('layouts.admin')

@section('title', 'Lieux')

@section('content')
<div class="row pb-3">
    <div class="col-auto mr-auto">
        <h1 class="h2">Lieux</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('admin.places.create') }}" class="btn btn-primary">Répertorier un nouveau lieu</a>
    </div>
</div>

@include('partials/_alert')

@if ($places->isEmpty())
<div class="alert alert-info" role="alert">
  Vous n'avez pas encore créé de lieu.
</div>
@else
<div class="table-responsive">
    <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Date de création</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
            <tr>
                <td>{{ $place->name }}</td>
                
                <td>{{ $place->created_at }}</td>          
                <td>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $place->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        
                        @component('admin/components/delete_modal', ['data' => $place, 'route' => 'places']) 
                        @endcomponent

                    <form id="delete-form-{{ $place->id }}" action="{{ route('admin.places.destroy', $place) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

{{ $places->links() }}

@endsection
