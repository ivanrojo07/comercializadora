<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

{{--     <script href="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
 --}}    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

     <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>
    <body>

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- <img src="{{ asset('img/logo.jpeg') }}" height="32" width="70"> --}}
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                    </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                    <li>
                        @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}"><i class="fa fa-clipboard" aria-hidden="true"></i> Register</a>
                    @endif
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Clientes<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/clientes/create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>
                                <a href="{{ url('/clientes') }}"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>
                                <a href="{{ url('/giros') }}"><i class="fa fa-location-arrow" aria-hidden="true"></i> Precargas Giros</a>
                                <a href="{{ url('/formacontactos') }}"><i class="fa fa-location-arrow" aria-hidden="true"></i> Precargas Forma de contactos</a>
                            </li>                     
                        </ul>
                    </li>
                    
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-building" aria-hidden="true"></i> Oficinas <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a>
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>  
                            </li>                     
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a>
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>    
                            </li>                     
                        </ul>
                    </li> --}}
                    
                     <li class="dropdown" role="menu" aria-labelledby="dLabel">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos <span class="caret"></span> </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/clientes/create')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Alta</a>
                            <a href="{{ url('/clientes') }}"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i> Precargas</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/familias') }}">Familia</a>
                                        <a href="{{ url('/tipos') }}">Tipo</a>
                                        <a href="{{ url('/subtipos') }}">Subtipo</a>
                                        <a href="{{ url('/unidads') }}">Unidad</a>
                                        <a href="{{ url('/presentacions') }}">Presentación</a>
                                        <a href="{{ url('/calidads') }}">Calidad</a>
                                        <a href="{{ url('acabados') }}">Acabado</a>
                                    </li>
                                </ul>
                            </li>
                        </li>                     
                    </ul>
                    </li>
                </ul>
            </div>
            @endif
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
    </body>
</html>
