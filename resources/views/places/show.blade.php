@extends ('layouts.app')


@section ('content')
    <div class="container col-10" id='div-margin-top'>
        <!-- carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/image/pub.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/image/table.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/image/pub.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end carousel -->

        <!-- general card -->
        <div class="row  mt-5">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><strong>{{$place->name}}</strong></h3>

                        <p class="card-text">{{$place->address}}, {{$place->city->zip_code}} {{$place->city->name}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <a type="button" class="btn btn-outline-info ml-3 float-right" href="/dessiner/{place}/{room}"><i
                            class="fas fa-pencil-alt"></i>
                    Dessiner votre plan de salle </a>
            </div>
        </div>
        <!-- tab -->
        <div class="row">
            <div class="tabs mt-5">
                <div class="tab-button-outer">
                    <ul id="tab-button">
                        <li><a href="#presentation">Présentation</a></li>
                        <li><a href="#access">Accès</a></li>
                        <li><a href="#photos">Photos</a></li>
                    </ul>
                </div>
                <div class="tab-select-outer ">
                    <select id="tab-select">
                        <option value="#presentation">Présentation</option>
                        <option value="#access">Accès</option>
                        <option value="#photos3">Photos</option>
                    </select>
                </div>

                <div id="presentation" class="tab-contents">
                    <h4 class="mt-3">{{$place->name}}</h4>

                    <p class="product-description mt-4">{{$place->description}}</p>
                    @foreach ($rooms as $room)
                        <a href="{{ url('/lieu/'.$place->slug.'/'.$room->slug) }}"
                           class="bubbly-button btn-outline-dark mt-5 ml-4">Voir la {{$room->name}}</a>
                    @endforeach
                </div>
                <div id="access" class="tab-contents">
                    <h4 class="mt-3">Comment y accéder?</h4>

                    <div class="row">
                        <div class="">
                            <div class="card  mt-5 ml-5">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Adresse :</strong></h5>

                                    <p class="card-text">{{$place->address}}, {{$place->city->zip_code}} {{$place->city->name}}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="photos" class="tab-contents">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="row">
                                @if($place->count())
                                    @foreach ($place->picturesplaces as $picturesplace)
                                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                            <a class="thumbnail" href="{{ asset('storage/app/public/places/'.$place->picture_url) }}"
                                               data-image-id="" data-toggle="modal" data-title=""
                                               data-image="">
                                               <img src="{{ asset('storage/app/public/places/'.$place->picture_url) }}" height="200px" style="object-fit: contain;" class="img-responsive">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="image-gallery-title"></h4>
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-left"
                                                    id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                            </button>

                                            <button type="button" id="show-next-image"
                                                    class="btn btn-secondary float-right"><i
                                                        class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- add pictures with this form -->
                        <!-- @if (count($errors) > 0)

                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-md-2"><img src="/image/upload1.png" width="80"/></div>
                                <div class="col-md-8"><h2>Publier des photos</h2>
                                    <h4>Conseils & directives</h4>

                                    <p>Formats de photos acceptés : .jpg .jpeg et .png</p>
                                </div>
                            </div>
                            <br>

                            <div class="col-md-8">
                                <form action="/multiuploads" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control" name="place_id" id="place_id"
                                           value="{{$place->id}}"/>
                                    <br/>
                                    <input type="file" class="form-control" name="photos[]" multiple/>
                                    <br/><br/>
                                    <input type="submit" class="btn btn-primary" value="Télécharger des photos"/>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        $(window).scroll(function () {
            $('.navbar').css("opacity", 1 - $(window).
                            scrollTop() / 200)
        });
    </script>
@endsection
