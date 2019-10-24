<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
  <link rel="shortcut icon" href="{{ asset('/images/favicon.ico')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="head_left">
      <!-- DIV VACIO -->
    </div>
    <h1><a href="/" class="header_link"><img class="logo" src="{{ asset('images/logo-home.png') }}" alt="logo TeamUp!"></a></h1>
    <nav class="menu">
      <ul>
        @if(Auth::check())
          <li class="nav-items foto-perfil"><img src="{{ asset('storage/'. Auth::user()->photo) }}" alt=""></li>
          <li class="nav-items"><a href="/{{ Auth::user()->username }}" class="header_link user">{{ Auth::user()->username }}</a></li>
          <li class="nav-items">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Salir</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        @else
          <li class="nav-items"><a href="{{ route('register') }}" class="header_link">Registrate</a></li>
          <li class="nav-items"><a href="{{ route('login') }}" class="header_link">Ingresar</a></li>
          <li class="nav-items"><a href="/faq" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>
        @endif
      </ul>
    </nav>
    <div class="burger-icon dropdown">
      <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
      <div id="myDropdown" class="dropdown-content">
        @if(Auth::check())
          <li class="nav-items foto-perfil"><img src="{{ asset('storage/'. Auth::user()->photo) }}" alt=""></li>
          <li class="nav-items"><a href="/{{ Auth::user()->username }}" class="header_link user">{{ Auth::user()->username }}</a></li>
          <li class="nav-items">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Salir</a>
            </li>
          @else
            <li><a href="{{ route('register') }}" class="header_link">Registrate</a></li>
            <li ><a href="{{ route('login') }}" class="header_link">Ingresar</a></li>
            <li ><a href="/faq" class="header_link">¿Qué es <i>TeamUp!?</i></a></li>
          @endif
        </div>
      </div>
    </header>

    @yield('content')

    <footer class="footer_outer container">
      <div class="legales">
        <ul>
          <li> <a href="#">Legal</a></li>
          <li> <a href="#">Privacidad</a></li>
          <li> <a href="#">Cookies</a></li>
          <li> <a href="#">Sobre anuncios</a></li>
        </ul>
      </div>
      <div class="copyright">
        <p>&copy;2017  TEAMUP</p>

      </div>
      <div class="redes">
          <a href="http://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="http://facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="http://instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </div>


    </footer>

    <!-- SCRIPTS -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <!-- script para redireccion de registro -->
    <script src="/js/main.js"></script>
  </body>
  </html>
