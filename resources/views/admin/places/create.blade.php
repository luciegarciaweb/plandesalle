@extends('layouts.admin')

@section('content')
<div class="container offset-md-2">
    <div class="row justify-content-md-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card-header">
                <h4>Répertorier un nouveau lieu</h4>
            </div>

            @include('partials/_alert')
            
            <form method="POST" action="{{ route('admin.places.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body ">  
                <!--  PLACES -->
                <!-- name -->
                    <div class="form-group col-md-10 mt-4">
                        <label for="name">Nom du lieu*</label>
                        <input id="name" type="text" 
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                            name="name" 
                            required>
                        
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                
                   <!-- address -->
                    <div class="form-group col-md-10 mb-5">
                        <label for="address">Adresse*</label>
                        <input id="address" type="text" 
                            class=" form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
                            name="address" 
                            required>
                        
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- CITY -->
                    <!--  autocomplete -->                       
                    <div class="form-group ui-widget col-md-10 mb-5">
                        <label class="mr-3" for="city" >Ville*</label>
                        <input class="ui-autocomplete-input" id="search_text" autocomplete="off" type="text" name="auto" placeholder="ex: Lyon" value="{{ old('auto') }}" />

                        <input type="hidden" id="city" class="form-control" name="city">
                        <input type="hidden" id="city_gps_lat" class="form-control" name="city_gps_lat">
                        <input type="hidden" id="city_gps_lng" class="form-control" name="city_gps_lng">
                    </div>
                    <!-- typeplace -->
                    <div class="form-group col-md-10 mt-5">
                        <label for="typeplace">Type de lieu*</label>
                        <select class="custom-select form-control{{ $errors->has('typeplace') ? ' is-invalid' : '' }}" 
                            id="typeplace"
                            name="typeplace">
                            @foreach ($typeplaces as $typeplace)
                            <option value="{{ $typeplace->id }}">{{ $typeplace->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <!-- description -->
                    <div class="form-group col-md-10">
                        <label class="col-form-label" for="description">Présentation*</label>
                        <textarea id="description" type="text" rows="10" cols="50"
                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                            name="description" 
                            required></textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif 
                    </div>
                    <!-- is privatized -->
                    <div class="form-group col-md-10 mt-5">
                        <label>Peut-il être entiérement privatisé?*</label><br>
                        <label for="is_privatized">oui</label>
                        <input checked="checked" name="is_privatized" type="radio" value="1" id="is_privatized">
                        <label for="is_privatized">non</label>
                        <input name="is_privatized" type="radio" value="0" id="is_privatized">
                    </div>
                    <!-- surface -->
                    <div class="form-group col-md-10">
                        <label class="col-form-label" for="surface">Superficie en m²*</label>
                        <input id="surface" type="number" min="10" max="100000"
                            class="form-control{{ $errors->has('surface') ? ' is-invalid' : '' }}" 
                            name="surface" 
                            required>
                        @if ($errors->has('surface'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surface') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- people quantity -->
                    <div class="form-group col-md-10 mb-5">
                        <label class="col-form-label" for="persQuantity">Capacité de personnes*</label>
                        <input id="persQuantity" type="number" min="1" max="100000" 
                            class="form-control{{ $errors->has('persQuantity') ? ' is-invalid' : '' }}" 
                            name="persQuantity" 
                            required>
                        
                        @if ($errors->has('persQuantity'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('persQuantity') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- rooms quantity -->
                    <div class="form-group col-md-10 mb-5">
                        <label class="col-form-label" for="roomQuantity">Nombre de salles à louer*</label>
                        <input id="roomQuantity" type="number" min="1" max="100"
                            class="form-control{{ $errors->has('roomQuantity') ? ' is-invalid' : '' }}" 
                            name="roomQuantity" 
                            required>
                        
                        @if ($errors->has('roomQuantity'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roomQuantity') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <!-- ROOMS -->
                    <!-- name -->
                    <div class="form-group col-md-10 mt-4">
                        <label for="name_room">Nom de la salle*</label><br>
                        <span>ex: salle de réception, salle de fête, etc</span><br>
                        <input id="name_room" type="text" 
                            class="form-control{{ $errors->has('name_room') ? ' is-invalid' : '' }}" 
                            name="name_room" 
                            required>
                        
                        @if ($errors->has('name_room'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name_room') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- description -->
                    <div class="form-group col-md-10">
                        <label class="col-form-label" for="description_room">Présentation*</label>
                        <textarea id="description_room" type="text" rows="10" cols="50"
                            class="form-control{{ $errors->has('description_room') ? ' is-invalid' : '' }}" 
                            name="description_room" 
                            required></textarea>
                        @if ($errors->has('description_room'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description_room') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- room surface -->
                    <div class="form-group col-md-10">
                        <label class="col-form-label" for="surface_room">Superficie en m²*</label>
                        <input id="surface_room" type="number" min="20" max="100000"
                            class="form-control{{ $errors->has('surface_room') ? ' is-invalid' : '' }}" 
                            name="surface_room" 
                            required>
                        @if ($errors->has('surface_room'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surface_room') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- events -->
                    <div class="form-group col-md-10 mt-5">
                        <label>Selectionner les événements accéptés*</label>
                            <div class="bg">
                                @foreach($events as $event)
                                <div class="chiller_cb">
                                    <input id="{{$event->name}}" type="checkbox" name="event[]" value="{{$event->id}}">
                                    <label for="{{$event->name}}">{{$event->name}}</label>
                                    <span></span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- is dancing -->
                    <div class="form-group col-md-10 mt-5">
                        <label>Peut-il être un lieu dançant?*</label><br>
                        <label for="is_dancing">oui</label>
                        <input checked="checked" name="is_dancing" type="radio" value="1" id="is_dancing">
                        <label for="is_dancing">non</label>
                        <input name="is_dancing" type="radio" value="0" id="is_dancing">
                    </div>
                    <!-- is seat -->
                    <div class="form-group col-md-10 mt-5">
                        <label>Les personnes peuvent-elles rester assises?*</label><br>
                        <label for="is_seat">oui</label>
                        <input checked="checked" name="is_seat" type="radio" value="1" id="is_seat">
                        <label for="is_seat">non</label>
                        <input name="is_seat" type="radio" value="0" id="is_seat">
                    </div>
                    <!-- is stand-->
                    <div class="form-group col-md-10 mt-5">
                        <label>Les personnes peuvent-elles rester debout?*</label><br>
                        <label for="is_stand">oui</label>
                        <input checked="checked" name="is_stand" type="radio" value="1" id="is_stand">
                        <label for="is_stand">non</label>
                        <input name="is_stand" type="radio" value="0" id="is_stand">
                    </div>
                    <!-- capacity minimum stand -->
                    <div class="form-group col-md-10">
                        <label class="col-form-label" for="min_capacity_stand">Nombre minimum de personnes debout*</label>
                        <input id="min_capacity_stand" type="number" min="1" max="100000"
                            class="form-control{{ $errors->has('min_capacity_stand') ? ' is-invalid' : '' }}" 
                            name="min_capacity_stand" 
                            required>
                        
                        @if ($errors->has('min_capacity_stand'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('min_capacity_stand') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- capacity maximum stand -->
                    <div class="form-group col-md-10 mb-5">
                        <label class="col-form-label" for="max_capacity_stand">Nombre maximum de personnes debout*</label>
                        <input id="max_capacity_stand" type="number" min="1" max="100000"
                            class="form-control{{ $errors->has('max_capacity_stand') ? ' is-invalid' : '' }}" 
                            name="max_capacity_stand" 
                            required>
                        
                        @if ($errors->has('max_capacity_stand'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('max_capacity_stand') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- capacity minimum seat -->
                    <div class="form-group col-md-10">
                        <label class="col-form-label" for="min_capacity_seat">Nombre minimum de personnes assises*</label>
                        <input id="min_capacity_seat" type="number" min="1" max="100000"
                            class="form-control{{ $errors->has('min_capacity_seat') ? ' is-invalid' : '' }}" 
                            name="min_capacity_seat" 
                            required>
                        
                        @if ($errors->has('min_capacity_seat'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('min_capacity_seat') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- capacity minimum seat -->
                    <div class="form-group col-md-10 mb-5">
                        <label class="col-form-label" for="max_capacity_seat">Nombre maximum de personnes assises*</label>
                        <input id="max_capacity_seat" type="number" min="1" max="100000"
                            class="form-control{{ $errors->has('max_capacity_seat') ? ' is-invalid' : '' }}" 
                            name="max_capacity_seat" 
                            required>
                        
                        @if ($errors->has('max_capacity_seat'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('max_capacity_seat') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- photos -->
                    <div class="container mb-5 mt-5">
                        <div class="row">
                            <div class="col-md-2"> <img src="/image/upload1.png" width="80" /></div>
                            <div class="col-md-8"><h2>Publier des photos</h2>
                                <h4>Conseils & directives</h4>
                                <p style="color: red;"><strong>Une photo, au minimum, est obligatoire pour enregistrer ce nouveau lieu</strong></p>
                                <p>Formats de photos acceptés : .jpg .jpeg et .png</p>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="photos[]" value="photos" multiple />
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-dark ">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts') 
<!-- autocompletion scripts -->
<script src="{{ asset('js/app.js') }}" ></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}"/>
<script src="{{ asset('js/jquery-ui.js') }}"></script>

<script>
src = "{{ route('searchajax') }}";
$("#search_text").autocomplete({
    minLength: 2,
    select: function (event, ui) {
        $('#city').val(ui.item.id);
        $('#city_gps_lat').val(ui.item.gps_lat);
        $('#city_gps_lng').val(ui.item.gps_lng);
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
