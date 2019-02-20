@extends('layouts.app')

@section('title', 'Nous contacter')

@section('content')
<div class="container col-12 " id="div-margin-top">
    <div class="row ">
            @include('partials/_alert')
        <div class="card" id="card-contact">
            <div class="card-header h4" >
                Contact
            </div>
            <div class="card-body">  
                <form method="POST" action="{{ route('contacts.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group col-6 ">
                        <label for="fullname">Votre nom</label>
                        <input id="fullname" type="text" 
                            class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" 
                            name="fullname" 
                            value="{{ old('fullname') }}" 
                            required>
                        
                        @if ($errors->has('fullname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif
                    </div>
                
                    <div class="form-group col-6">
                        <label for="email">Votre e-mail</label>
                        <input id="email" type="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required>
                        
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-6">
                        <label for="object">Sujet</label>
                        <input id="object" type="text"  
                            class="form-control form-lg{{ $errors->has('object') ? ' is-invalid' : '' }}" 
                            name="object" 
                            value="{{ old('object') }}" 
                            required>
                        
                        @if ($errors->has('object'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('object') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-6">
                        <label for="message">Votre message</label>
                        <textarea id="message" type="text" rows="12" cols="40"
                            class="form-control-sm{{ $errors->has('message') ? ' is-invalid' : '' }}" 
                            name="message" rows="10" cols="20" value="{{ old('message') }}"
                            required>{{ old('message') }}</textarea>
                            
                        @if ($errors->has('message'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                                                
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="card" id="card-contact">
                <div class="card-header h3" >
                    Plan de salle
                </div>
            </div>

            <div class="card mt-3" id="card-contact">
                <div class="card-header h6">
                    Nos coordonnées: contact@plandesalle.fr
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}" ></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>

<script>
$(window).scroll(function(){
    $('.navbar').css("opacity", 1 - $(window).
    scrollTop() / 200)
});
</script>
@endsection