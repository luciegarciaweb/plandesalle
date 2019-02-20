@extends('layouts.parameter')

@section('title', 'Mes coordonnées')

@section('content')
<div class="container col-sm-12" id="div-margin-top">
    <div class="row">
        <div class="col-md-3">
            @include ('partials/_parameters_menu')
        </div>
        <div class="card col-md-9">
            <div class="card-header">
                Mes coordonnées
            </div>
            <div class="card-body" name="professionals" id="pro" >
                @include('partials/_alert')
                <form method="POST" action="{{ route('parameters.edit') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label" for="firstname">Prénom</label>
                        <input id="firstname" type="firstname" 
                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                            name="firstname" 
                            value="{{Auth::user()->firstname}}"
                            required>
                        
                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="lastname">Nom</label>
                        <input id="lastname" type="lastname" 
                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                            name="lastname" 
                            value="{{Auth::user()->lastname}}"
                            required>
                        
                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="email">Email</label>
                        <input id="email" type="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            name="email" 
                            value="{{Auth::user()->email}}"
                            required>
                        
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="phone">Téléphone</label>
                        <input id="phone" type="phone" 
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            name="phone" 
                            value="{{Auth::user()->phone}}"
                            >
                        
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="address">Adresse</label>
                        <input id="address" type="address" 
                            class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
                            name="address" 
                            value="{{Auth::user()->address}}"
                            >
                        
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="postal_code">Code postal</label>
                        <input id="postal_code" type="postal_code" 
                            class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" 
                            name="postal_code" 
                            value="{{Auth::user()->postal_code}}"
                            >
                        
                        @if ($errors->has('postal_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('postal_code') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="city">Ville</label>
                        <input id="city" type="city" 
                            class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" 
                            name="city" 
                            value="{{Auth::user()->city}}"
                            >
                        
                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-form-label" for="job">Emploi</label>
                        <input id="job" type="job" 
                            class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" 
                            name="job" 
                            value="{{Auth::user()->job}}"
                            >
                        
                        @if ($errors->has('job'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('job') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Modifier</button>
                </form>
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
