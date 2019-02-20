@extends('layouts.app')

@section('title', 'Référencer un lieu')

@section('content')
<div class="container-reference ml-5 mr-3">
    <div class="alert">
        @include('partials/_alert')
    </div>
    <div class="row col-12" id="hide-on-submit">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-6" id='card-contact'>
            <div class="card-header">
                <h2><strong>Référencer gratuitement votre lieu</strong></h2>
                <span>en complétant le formulaire ci-dessous</span>
            </div>
            <div class="card-body ">  
                <form method="POST" action="{{ route('referencement.store') }}">
                    {{ csrf_field() }}

                <!-- name -->
                    <div class="form-group col-md-5 mt-3">
                        <label for="name">Nom du lieu*</label>
                        <input id="name" type="text" 
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            value="{{ old('name') }}"
                            name="name" 
                            required>
                        
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                
                   <!-- address -->
                    <div class="form-group col-md-5 mb-5">
                        <label for="address">Adresse*</label>
                        <input id="address" type="text" 
                            class=" form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
                            name="address"
                            value="{{ old('address') }}"
                            required>
                        
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                   <!--  autocomplete -->                       
                    <div class="form-group ui-widget col-md-5 mb-5">
                    	<label class="mr-3" for="city">Ville*</label>
                    	<input class="ui-autocomplete-input" id="search_text" autocomplete="off" type="text" name="auto" placeholder="ex: Lyon" value="{{ old('auto') }}" />
                        <input type="hidden" id="city" class="form-control" name="city">
                    </div>
                    <hr>

                    <!-- typeplace -->
                    <div class="form-group col-md-6 mt-5">
                        <label for="typePlace">Type de lieu*</label>
                        <select class="custom-select form-control{{ $errors->has('typePlace') ? ' is-invalid' : '' }}" 
                            id="typePlace"
                            name="typePlace">
                            @foreach ($typeplaces as $typeplace)
                            <option value="{{ $typeplace->id }}">{{ $typeplace->name }}</option>
                            @endforeach
                        </select>   
                    </div>

                    <!-- cap_min -->
                    <div class="form-group col-md-6">
                        <label for="cap_min">Capacité minimale de personnes*</label>
                        <input id="cap_min" type="number" min="1" max="10000" 
                            class="form-control{{ $errors->has('cap_min') ? ' is-invalid' : '' }}" 
                            name="cap_min" 
                            value="{{ old('cap_min') }}" placeholder="ex: 25" 
                            required>
                        
                        @if ($errors->has('cap_min'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cap_min') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- cap_max -->
                    <div class="form-group col-md-6 mb-5">
                        <label for="cap_max">Capacité maximale de personnes*</label>
                        <input id="cap_max" type="number" min="1" max="10000" 
                            class="form-control{{ $errors->has('cap_max') ? ' is-invalid' : '' }}" 
                            name="cap_max" 
                            value="{{ old('cap_max') }}" placeholder="ex: 400" 
                            required>
                        
                        @if ($errors->has('cap_max'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cap_max') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                   <!--  email -->
                    <div class="form-group col-md-8 mt-5">
                        <label for="email">E-mail*</label>
                        <input id="email" type="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            name="email" 
                            placeholder="@" 
                            value="{{ old('email') }}"
                            required>
                        
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- phone -->
                     <div class="form-group col-md-8 mb-5">
                        <label for="phone">Téléphone</label>
                        <input id="phone" type="text" 
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            name="phone"
                            value="{{ old('phone') }}"
                            >
                        
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                                                
                    <p><input type="submit" class="btn btn-dark" name="submit"/></p>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h5>Créez votre annonce gratuitement en complétant le formulaire ci-contre. <br><br>Ou bien contactez-nous par email: <strong>contact@plandesalle.fr</strong></h5>
                </div> 
                <div class="container mt-5">
                    <a class="btn btn-primary btn-lg" href="/" role="button">Retour à l'accueil</a>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection

@section('scripts')  
<script src="{{ asset('js/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}"/>
<script src="{{ asset('js/jquery-ui.js') }}"></script>

<script>
src = "{{ route('searchajax') }}";
$("#search_text").autocomplete({
    minLength: 2,
    select: function (event, ui) {
        $('#city').val(ui.item.id);
        },
    source: function (request, response) {
        $.getJSON(src, {term: request.term}, function (data) {
        response(data.slice(0, 5));
        }).fail(function () {
        alert('La requête n\'a pas abouti');
    });
    }
});
</script>
@endsection