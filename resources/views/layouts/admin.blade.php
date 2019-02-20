<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Administration Plan de Salle</title>
   
     <!-- STYLES -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

     <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand navbar-dark bg-dark static-top">
            <a class="sidebar-toggler mr-3" href="#"><i class="material-icons text-white align-middle">menu</i></a>
            <a class="navbar-brand mr-1" href="{{ route('admin.dashboard') }}">Administration</a>
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">Accueil du site</a>
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
            </ul>
        </nav>
      
        <div id="wrapper">
      
            <!-- Sidebar -->
            <ul id="sidebar" style="min-width: 250px; max-width: 250px; min-height: 100vh;" class="sidebar navbar-nav">
                <div id="scrollable">
                    <li class="nav-item {{ Request::is('admin') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/contacts*') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('admin.contacts.index') }}">
                            Messages
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/references*') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('admin.references.index') }}">
                            Référencements
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/places*') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('admin.places.index') }}">
                            Lieux
                        </a>
                    </li>
                </div>                                                                                                                           
            </ul>
      
            <div id="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div><!-- /.content-wrapper -->
      
        </div><!-- /end wrapper -->
    </div>
    
     <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/admin.js') }}" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>
