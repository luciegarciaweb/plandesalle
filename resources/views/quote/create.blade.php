@extends ('layouts.app')

@section ('content')
<div class="container offset-md-3" id="div-margin-top">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-md-10 justify-content-md-center">
                <div class="card-header">
                    <h4>Demande de devis</h4>
                    <br>Complétez le formulaire ci-dessous avec un maximun d'informations sur votre événement.
                </div>
                <div class="card-body">  
                    <form method="POST" action="{{ route('referencements.store') }}">
                        {{ csrf_field() }}

                    <h3 class="mt-4 mb-4">Votre événement</h3>
                    <!-- event -->
                    <div class="form-group col-md-8">
                        <label for="event">Type d'événement*</label>
                        <select class="custom-select form-control{{ $errors->has('event') ? ' is-invalid' : '' }}" 
                            id="event"
                            name="event" required>
                            @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                            @endforeach
                        </select>   
                    </div>

                    <!-- number_people -->
                    <div class="form-group col-md-8">
                        <label for="number_people">Capacité convives*</label>
                        <input id="number_people" type="number" 
                            class="form-control{{ $errors->has('number_people') ? ' is-invalid' : '' }}" 
                            name="number_people" 
                            value="{{ old('number_people') }}" placeholder="ex: 200" 
                            required>
                        
                        @if ($errors->has('number_people'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('number_people') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- disposition -->
                    <div class="form-group col-md-8">
                        <label for="disposition">Disposition</label>
                        <select class="custom-select form-control{{ $errors->has('disposition') ? ' is-invalid' : '' }}" 
                            id="disposition"
                            name="disposition">
                            <option value="Assis">Assis</option>
                            <option value="Debout">Debout</option>
                        </select>   
                    </div>

                    <!-- start_date -->
                    <div class="form-group col-md-8">
                        <label for="start_date">Date début événement*</label>
                        <input type="date" name="start_date" id="start_date" required>
                    </div>

                     <!-- end_date -->
                    <div class="form-group col-md-8">
                        <label for="end_date">Date fin événement*</label>
                        <input type="date" name="end_date" id="end_date" required>
                    </div>

                    <!-- start_time -->
                    <div class="form-group col-md-8">
                        <label for="start_time">Heure de début</label>
        				<input type="time" id="start_time" name="start_time"
               			min="00:00" max="23:30"/>
                    </div>

                     <!-- end_time -->
                    <div class="form-group col-md-8">
                        <label for="end_time">Heure de fin</label>
        				<input type="time" id="end_time" name="end_time"
               			min="00:00" max="23:30"/>
                    </div>

                    <div class="form-group">
                    	<ul class="list-group list-group-flush">
                    		 	<!-- strict_date -->
                    		<li class="list-group-item">
                    			Dates impératives
		                    	<label class="switch" for="strict_date">
		                        <input type="checkbox" class="success" name="strict_date" id="strict_date" value="1" checked/>
		                        <span class="slider round"></span></label>
                    		</li>
                   				 <!-- regular_date -->
               				<li class="list-group-item">
               					Dates récurrentes
               					<label class="switch" for="regular_date">
		                        <input type="checkbox" class="success" name="regular_date" id="regular_date" value="1"/>
		                        <span class="slider round"></span></label>
	                        </li>
                        </ul>
                    </div>
                    <hr>
                    <h3 class="mt-4 mb-4">Vos besoins</h3>

                    <!-- catere -->
                    <div class="form-group">
                        <label for="catere">Avez-vous besoin d'un traiteur?</label>
                        <select class="custom-select form-control{{ $errors->has('catere') ? ' is-invalid' : '' }}" 
                            id="catere"
                            name="catere" required>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                        </select>   
                    </div>

                    
                    <div class="form-group">
                    	<ul class="list-group list-group-flush">
                    		<!-- is_dance -->
                    		<li class="list-group-item">
                    			Mon événement est dansant
		                    	<label class="switch" for="is_dance">
		                        <input type="checkbox" class="success" name="is_dance" id="is_dance" value="1"/>
		                        <span class="slider round"></span></label>
                    		</li>
                   				 <!-- is_accommodate -->
               				<li class="list-group-item">
               					J'ai besoin d'un hébergement
               					<label class="switch" for="is_accommodate">
		                        <input type="checkbox" class="success" name="is_accommodate" id="is_accommodate" value="1"/>
		                        <span class="slider round"></span></label>
	                        </li>
                        </ul>
                    </div>

                    <!-- budget -->
                    <div class="form-group">
                        <label for="budget">Votre budget est défini: </label>
                        <select class="custom-select form-control{{ $errors->has('budget') ? ' is-invalid' : '' }}" 
                            id="budget"
                            name="budget" required>
                            <option value="Non">Non</option>
                            <option value="Budget global">Budget global</option>
                            <option value="Budget par personne">Budget par personne</option>
                        </select>   
                    </div>

                    <!-- description -->
                    <div class="form-group">
                    	<label for="budget">Ajoutez d'autres renseignements ici: </label>
                        <textarea class="form-control" name="description" id="description" rows="3" cols="75" placeholder="..."></textarea>
                    </div>

                    <hr>
                    <h3 class="mt-4 mb-4">Vos coordonnées</h3>

                    <!-- firstname -->
                    <div class="form-group">
                        <label for="firstname">Prénom*</label>
                        <input id="firstname" type="text" 
                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                            name="firstname" 
                            value="{{ old('firstname') }}" 
                            required>
                        
                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- lastname -->
                    <div class="form-group">
                        <label for="lastname">Nom*</label>
                        <input id="lastname" type="text" 
                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                            name="lastname" 
                            value="{{ old('lastname') }}" 
                            required>
                        
                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!--  email -->
                    <div class="form-group">
                        <label for="email">E-mail*</label>
                        <input id="email" type="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            name="email" 
                            value="{{ old('email') }}" placeholder="@" 
                            required>
                        
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- phone -->
                     <div class="form-group">
                        <label for="phone">Téléphone*</label>
                        <input id="phone" type="text" 
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            name="phone" 
                            value="{{ old('phone') }}" 
                            required>
                        
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                                                
                    <button type="submit" class="btn btn-dark mt-4">Envoyer</button>
                </form>
            </div>
        </div>
    </div>	
</div>
@endsection