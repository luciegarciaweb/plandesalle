@extends('layouts.parameter')

@section('title', 'Mon tableau de bord')

@section('content')
<div class="container col-md-12" id="div-margin-top">
    <div class="row">
    	<div class="col-md-3">
            @include ('partials/_parameters_menu')
        </div>
        <div class="card col-md-9">
            <div class="card-header">
                Tableau de bord
            </div>
            <div class="card-body" name="professionals" id="pro" >
                 <div class="col-sm-12 col-md-4">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h4>Favoris</h4>
                            <h1 class="mb-0">{{ $favorites }}</h1>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('parameters.favoris') }}" class="card-link">Mes favoris</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="{{ asset('js/app.js') }}" ></script>
@endsection