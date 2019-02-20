@extends ('layouts.app')

@section ('content')
<div class="container col-12" id="div-margin-top">
    <div class="btn-group" role="group">
        <!-- search engine -->
        <div class="row col-12 mr-5" id="search-res">
            <form class="form-inline" method="GET" action="{{ route('recherche.resultats') }}">      
                <div class="form-group mb-2 mr-sm-2 ">
                    <div class="form-group ui-widget input-group-prepend ml-2 ">
                        <i class="fa fa-search fa-lg mr-2" aria-hidden="true"></i>
                        <input class="ui-autocomplete-input" id="search_text" autocomplete="off" type="text" name="query" placeholder="{{$city->name}}" />
                    </div> 
                    <div>
                        <button type="submit" class="btn btn-dark ml-2" id="search">Rechercher</button>
                    </div>
                </div>
            </form><!-- End search engine -->
        </div>
    </div>
</div>
<hr>
<div class="container col-12 mb-3">
    <h4 class="">Recherche de lieux en {{ $region->name }}</h4>
    <span>Il y a {{$places->count()}} résultat(s).</span>
</div>

@if($places == null)
<div class="alert alert-info" role="alert">
    Il n'y a aucun lieu correspondant à votre recherche. 
</div>
@else
<div class="container-map">
    <div class="list">
        @foreach ($places as $place)
                <div class="item js-marker" data-lat="<?= $place->gps_lat ?>"  data-lng="<?= $place->gps_lng ?>">
                    <img class="card-img-top" style="object-fit: contain;" src="/image/cafe.jpg" alt="" height="260" width="400">
                    <h4 class="card-title">{{ $place->name }} <br><h6>{{$place->address}} <br>{{$place->city->zip_code}} {{$place->city->name}}</h6>
                    <a href="{{ route('lieu.show', $place->slug) }}" class="btn btn-outline-dark">Voir le détail</a>
                </div>
        @endforeach 
    </div>
    
    <div class="side">
        <div class="map" id="map">
        </div>
    </div>
</div>
@endif

{{ $places->links() }}

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/vendor.js') }}" ></script>
<script src="{{ asset('js/mapLeaflet.js') }}" ></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" defer></script>

<script>
src = "{{ route('searchajax') }}";
$("#search_text").autocomplete({
    minLength: 3,
    source: function(request, response) {
        $.ajax({
            url: src,
            dataType: "json",
            type:"GET",
            data: {
                term : request.term
            },
            success: function(data) {
                response(data);
            }
        });
    },
});

$(window).scroll(function(){
    $('.navbar').css("opacity", 1 - $(window).
    scrollTop() / 200)
});
</script>
@endsection

