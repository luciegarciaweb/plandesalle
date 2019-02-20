@extends('layouts.parameter')

@section('title', 'Mes favoris')

@section('content')
<div class="container col-sm-12" id="div-margin-top">
    <div class="row">
    	<div class="col-md-3">
            @include ('partials/_parameters_menu')
        </div>
        <div class="card col-md-9">
            <div class="card-header ">
                Mes favoris
            </div>
            <div class="card-body" name="professionals" id="pro" >
                @include('partials/_alert')
            </div>
            @if(!isset($favorites))
                <div class="alert alert-info" role="alert">
                    Il n'y a aucun lieu mis en favoris.
                </div>
            @else
            <div class="list">
                @foreach ($favorites as $favorite)
                <div class="item js-marker">
                    <img class="card-img-top" style="object-fit: contain;" src="/image/salle11.jpg" alt=""
                         height="260" width="400">

                    <h4 class="card-title">{{ $favorite->place->name }}</h4><h6>{{$favorite->place->address}}
                        <br>{{$favorite->place->zip_code}} {{$favorite->place->cityname}}</h6>
                    
                    @if(Auth::user() && Auth::user()->isFavorite($favorite->place))
                        <button class="toggle-favorite btn" data-slug="{{$favorite->place->slug}}" type="button"><i class="fa fa-heart text-danger fa-1x" aria-hidden="true"></i></button>
                        @else
                        <button class="toggle-favorite btn" data-slug="{{$favorite->place->slug}}" type="button"><i class="fa fa-heart text-muted fa-1x" aria-hidden="true"></i></button>
                    @endif

                    <a href="{{ url('/lieu/'.$favorite->place->slug) }}" class="btn btn-outline-dark mt-2 mb-2">Voir le détail</a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>       
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script>
$('.toggle-favorite').click(function(){
        var $that =  $(this);
        var place =$that.data('slug');
        $.getJSON('/lieu/'+place+'/favorite', function(response){
            var coeur = $that.find('i');
           if(response.favorite == 'add'){
            $(coeur).removeClass('text-muted').addClass('text-danger');
           }
           if(response.favorite == 'delete'){
            $(coeur).addClass('text-muted').removeClass('text-danger');
           }
           if(response.favorite == 'error'){
            window.alert($('#msg-favorite-error').text());
           }
        })
    })
</script>
@endsection
