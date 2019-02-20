@extends('layouts.app')

@section('content')
    <div class="header ">
        <div class="col-xs-12 col-sm-12" id="searchBG">
            <div class="search-engine col-xs-12 col-sm-12 align-items-center">
                <div class="col-xs-12 col-sm-12" id="title-card">
                    <h1 class="title-home pt-2">Choisissez le lieu parfait pour votre événement et dessinez votre plan de salle </h1>
                </div>
                <form class="col-xs-12 col-sm-12 form-inline" id="search-form" method="GET" action="/recherche">
                    <div class="card-body row no-gutters">
                        <!--end of col-->
                        <div class="ui-widget align-items-center" >
                            <input class=" ui-autocomplete-input form-control form-control-sm form-control-borderless"
                                   id="search_text" autocomplete="off" type="search" name="query"
                                   placeholder="Où cherchez-vous?" >
                            <button class="btn btn-lg btn-dark" type="submit">Rechercher</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
    </div>
    <div class="col-12 mt-2">
        @component('components/presentation')
        @endcomponent
    </div>
    <br>
    <div class="col-12 mt-4">
        <h3 class="pb-3 mb-4 border-bottom">A LA UNE DES SALLES</h3>

        <div class="row blog ">
            <div class="col-md-12 ">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#blogCarousel" data-slide-to="1"></li>
                    </ol>

                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="#">
                                        <img src="/image/table.jpg" alt="Image" style="max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#">
                                        <img src="/image/cafe.jpg" alt="Image" style="max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#">
                                        <img src="/image/pub.jpg" alt="Image" style="max-width:100%;">
                                    </a>
                                </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="#">
                                        <img src="/image/castle.jpg" alt="Image" style="max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#">
                                        <img src="/image/salon.jpg" alt="Image" style="max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#">
                                        <img src="/image/resto.jpg" alt="Image" style="max-width:100%;">
                                    </a>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->
                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="col-12 pb-4">
        <h3 class="pb-3 mb-4 border-bottom">Recherche par régions</h3>
        @component('components/list_regions', ['regions' => $regions])
        @endcomponent
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}"/>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/mapRegions.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"
            defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"
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
                            scrollTop() / 800)
        });

        $('#search-form').submit(function () {
            window.location.href = '/recherche/' + $('#search_text').val();
            return false;
        });
    </script>
@endsection
