@extends('layouts.admin')

@section('title', 'Référencements reçus')

@section('content')
<div class="row pb-3">
    <div class="col-auto mr-auto">
        <h1 class="h2">Référencements reçus</h1>
    </div>
</div>

@include('partials/_alert')

@if ($references->isEmpty())
<div class="alert alert-info" role="alert">
  Vous n'avez pas encore de référencement.
</div>
@else
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom du lieu</th>
                <th scope="col">Ville</th>
                <th scope="col">Date réception</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($references as $reference)
            <tr>
                <td>{{ $reference->name }}</td>
                <td>{{ $reference->city }}</td>
                <td>{{ $reference->created_at }}</td>             
                <td>
                    @if ($reference->is_read) 
                    <span class="badge badge-info">lu</span> 
                    @else
                    <span class="badge badge-warning">non-lu</span>
                    @endif
                </td>
                <td>
                   <a href="{{ route('admin.references.show', $reference) }}">
                        <button type="button" class="btn btn-primary btn-sm">
                            Voir
                        </button>
                     </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $reference->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>   
                    @component('admin/components/delete_modal', ['data' => $reference, 'route' => 'references']) 
                    @endcomponent
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

{{ $references->links() }}

@endsection
