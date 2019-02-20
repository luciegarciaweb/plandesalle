<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app_name', 'Plan de salle') }}</title>
    
     <!-- STYLES -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/style.css') }}" media="screen" rel="stylesheet" >
    <link href="{{ asset('css/mapRegions.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/presentation.css') }}" rel="stylesheet" >

    <!-- jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}"/>
    
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>

     <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="/image/logo.png" width="60px" height="60px">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app_name', 'Plan de salle') }}</a>
            
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" data-toggle="collapse">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item active">
                        <a class="nav-active" id="navbar Dropdown reference" href="{{ route('referencement.create') }}">{{ __('Référencer une salle') }}</a>
                    </li>
                    <li class="nav-item">
                       <a  id="navbar Dropdown" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </li>
                    <li class="nav-item">
                    @if (Route::has('register'))
                        <a  href="{{ route('register') }}">{{ __('Inscription') }}</a>
                    @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbar Dropdown" class="dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user-edit"></i>

                            {{ __(' Compte') }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
                            @if (Auth::user()->is_admin) 
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-lock"></i>{{ __(' Administration') }}</a>
                            @endif
                            <a  class="dropdown-item" href="{{ route('parameters.dashboard') }}"><i class="far fa-user"></i>{{ __(' Mon profil') }}</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> 
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
            
        <main class="py-4">
            @yield('content')
        </main>
       
        <!-- deuxieme footer test -->
        <footer class="footer">
            <div class="container bottom_border">
                <div class="row">
                    <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                        <h5 class="headin5_amrc col_white_amrc pt2">Plan de salle</h5>
                        <!--headin5_amrc-->
                        <p class="mb10">Site annuaire de salles événementielles en France en collaboration avec ArchiFacile.fr, éditeur de plans de salles, pour organiser vos événements privés et/ou professionnels</p>
                        <!-- <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
                        <p><i class="fa fa-phone"></i>  +91-9999878398  </p> -->
                        <a  href="/contact"><i class="fa fa fa-envelope"></i> Contactez-nous </a>
                    </div>

                    <div class=" col-sm-4 col-md  col-6 col">
                        <h5 class="headin5_amrc col_white_amrc pt2">Mon compte</h5>
                        <!--headin5_amrc-->
                        <ul class="footer_ul_amrc">
                            <li><a href="/login">Connexion</a></li>
                            <li><a href="/register" >Créer un compte</a></li>
                            
                        </ul>
                        <!--footer_ul_amrc ends here-->
                    </div>

                    <div class=" col-sm-4 col-md  col-6 col">
                        <h5 class="headin5_amrc col_white_amrc pt2">A propos</h5>
                        <!--headin5_amrc-->
                        <ul class="footer_ul_amrc">
                            <li style="color: grey;">Qui sommes-nous ?</li>
                            <li style="color: grey;">Mentions légales</li>
                        </ul>
                        <!--footer_ul_amrc ends here-->
                    </div>

                    <div class=" col-sm-4 col-md  col-12 col">
                        <h5 class="headin5_amrc col_white_amrc pt2">Référencement</h5>
                        <!--headin5_amrc ends here-->

                        <ul class="footer_ul2_amrc">
                        <li><a href="/referencement" >Référencer un lieu</a></li>
                        </ul>
                        <!--footer_ul2_amrc ends here-->
                    </div>
                </div>
            </div>

            <div class="container">
                <ul class="foote_bottom_ul_amrc">
                <li><a  href="/">Home</a></li>
                <li><a href="https://www.archifacile.fr/">ArchiFacile</a></li>
                <li><a href="/contact">Contact</a></li>
                </ul>
                <!--foote_bottom_ul_amrc ends here-->
                <p class="text-center">Copyright @2019 |  Designed With by <strong style="color: lightblue;">Plan de salle</strong></p>

                <ul class="social_footer_ul">
                <li><i class="fab fa-facebook-f"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-linkedin"></i></li>
                <li><i class="fab fa-instagram"></i></li>
                </ul>
                <!--social_footer_ul ends here-->
            </div>
        </footer>

    </div> <!-- end of app -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" defer></script>

    <!-- SCRIPTS -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/polyfill.js') }}" defer></script>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin=""></script>

    <script>
    $(".navbar-toggle span").click(function() {
        $("#navbarSupportedContent").collapse('hide');
    });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-47315534-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-47315534-2');
    </script>

    @yield('scripts')
</body>
</html>
