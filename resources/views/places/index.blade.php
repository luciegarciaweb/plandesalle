@extends ('layouts.app')

@section ('content')

    <div class="container col-12" id="div-margin-top">
        <div class="btn-group" role="group">
           @if (isset($query))
            <div class="row col-12 mr-5" id="search-res">
                <form id="form-search" class="form-inline" method="GET" action="/recherche">
                    <div class="form-group mb-2 mr-sm-2 ">
                        <div class="form-group ui-widget input-group-prepend ml-2 ">
                            <i class="fa fa-search fa-lg mr-2" aria-hidden="true"></i>
                            <input class="ui-autocomplete-input" id="search_text" autocomplete="off" type="text"
                                   name="query" value="{{$query}}"/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark ml-2" id="search">Rechercher</button>
                        </div>
                    </div>
                </form>

            </div>
            @endif
        </div>
    </div>
    <!--<hr>-->


    @if(!isset($places))
        <div class="alert alert-info" role="alert">
            Il n'y a aucun lieu correspondant à votre recherche.
        </div>
    @else
        <div class="container col-12">
            @if (isset($city))
                <h3>
                    Salles en <a href="/region-{{$region->slug}}">{{$region->name}}</a> >
                    <a href="/{{$department->slug}}-D{{$department->code}}">{{$department->name}}</a> >
                    {{ $city->name }}
                </h3>
            @elseif (isset($department))
                <h3>Salles en <a href="/region-{{$region->slug}}">{{$region->name}}</a> >
                    {{ $department->name }}
                </h3>
            @elseif (isset($region))
                <h3>Salles en {{ $region->name }}</h3>
            @else
                <h3>Recherche de lieux</h3>
            @endif

        </div>

        <div class="container-map mt-3">
            <div class="list">
                @foreach ($places as $place)
                    <div class="item js-marker" data-lat="<?= $place->gps_lat ?>" data-lng="<?= $place->gps_lng ?>">
                        <img class="card-img-top" style="object-fit: contain;" src="/image/salle11.jpg" alt=""
                             height="260" width="400">

                        <h4 class="card-title">{{ $place->name }}</h4><h6>{{$place->address}}
                            <br>{{$place->zip_code}} {{$place->cityname}}</h6>
                       @if(Auth::user() && Auth::user()->isFavorite($place))
                        <button class="toggle-favorite btn" data-slug="{{$place->slug}}" type="button"><i class="fa fa-heart text-danger fa-1x" aria-hidden="true"></i></button>
                        @else
                        <button class="toggle-favorite btn" data-slug="{{$place->slug}}" type="button"><i class="fa fa-heart text-muted fa-1x" aria-hidden="true"></i></button>
                        @endif

                        <a href="{{ url('/lieu/'.$place->slug) }}" class="btn btn-outline-dark mt-2 mb-2">Voir le
                            détail</a>
                    </div>
                @endforeach
            </div>

            <div class="map" id="map">
            </div>

        </div>
        <div id="msg-favorite-error" style="visibility:hidden;" class="hide">{{ __('Veuillez vous connecter pour mettre en favoris.') }}</div>
        <div class="container col-12">
            @if (count($places)>1)
                <span>Il y a {{count($places)}} résultats.</span>
            @elseif (count($places)==1)
                <span>Il y a {{count($places)}} résultat.</span>
            @else
                <span>Il y a aucun résultat.</span>
            @endif
        </div>

        @if (isset($departments))
            <div class="container col-12">
                <h3>Les départements de {{$region->name}}</h3>

                <div>
                    @foreach ($departments as $department)
                        <a href="/{{$department->slug}}-D{{$department->code}}">{{$department->name}}</a>,
                    @endforeach
                </div>
            </div>
        @endif

        @if (isset($cities))
            <div class="container col-12">
                @if (isset($department))
                    <h3>Les villes de {{$department->name}}</h3>
                @else
                    <h3>Les villes</h3>
                @endif

                <div>
                    @foreach ($cities as $city)
                        <a href="/{{$city->slug}}-{{$city->zip_code}}">{{$city->name}}</a>,
                    @endforeach
                </div>
            </div>
        @endif

        @if (isset($regions))
            <div class="container col-12">
                <h3>Les régions de France</h3>

                <div>
                    @foreach ($regions as $region)
                        <a href="/region-{{$region->slug}}">{{$region->name}}</a>,
                    @endforeach
                </div>
            </div>
        @endif

    @endif




@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/mapLeaflet.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"
            defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"
            defer></script>

    <script>
        src = "{{ route('searchajax') }}";
        $("#search_text").autocomplete({
            minLength: 3,
            source: function (request, response) {
                $.ajax({
                    url: src,
                    dataType: "json",
                    type: "GET",
                    data: {
                        term: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
        });

        $(window).scroll(function () {
            $('.navbar').css("opacity", 1 - $(window).
                            scrollTop() / 200)
        });

        $('#form-search').submit(function () {
           window.location.href ='/recherche/'+$('#search_text').val();
            return false;
        });

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

