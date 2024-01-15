<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--   Favicon -->
        <link rel="shortcut icon" type="image/png" href="images/favicon.png">


        <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Verdana:100,300,400,700,900" rel="stylesheet">
    
 <!-- Bootstrap CSS
		============================================ -->
   
        <link href="\css\bootstrap-4.6.1\dist\css\bootstrap.css" type="text/css" rel="stylesheet">
        <!-- <link href="\css\bootstrap-4.6.1\dist\css\bootstrap.min.css" type="text/css" rel="stylesheet">   -->

         
 <!-- Icons fontawesome
		============================================ -->

        <link rel="stylesheet" href="\css\icons\font-awesome\css\font-awesome.css">
        <link rel="stylesheet" href="\css\icons\font-awesome\css\font-awesome.min.css">



        
 <!-- Bootstrap js E CSS normal
		============================================ --> 
       <!-- <script src="\js\bootstrap-4.6.1\dist\js\bootstrap.min.js"></script>  -->

        <script src="\js\bootstrap-4.6.1\dist\js\bootstrap.js"></script>
        
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>



        <title>@yield('title')</title>

       
    </head>

    <body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">

        
        <div class="collapse navbar-collapse" id="navbar">
          
          <div class="col-md-2">
            <a href="/" class="navbar-brand">
              <img src="/img/logo_eventos.svg" alt="logo_evento_do_dia">
              <!-- <span style="color: #F2A340; font-weight: bold; font-family: Verdana;">Eventos</span><span style="color: #2d95d6; font-weight: bold; font-family: Verdana;"> do Dia</span> -->
            </a>
          </div>
            <ul class="navbar-nav">

            <li class="nav-item">
                <a href="/" class="nav-link"><i class="fa fa-home"></i>Home</a>
              </li>

              <li class="nav-item">
                <a href="/eventos" class="nav-link"><i class="fa fa-thumb-tack"></i> Eventos</a>
              </li>

              <li class="nav-item">
                <a href="/events/create" class="nav-link"><i class="fa fa-calendar-o"></i> Criar eventos</a>
              </li>
              
              @auth
              <li class="nav-item">
                <a href="/dashboard" class="nav-link"><i class="fa fa-calendar"></i> Meus Eventos</a>
              </li>
              <li class="nav-item">
                 <form action="/logout" method="post">
                @csrf
                <a href="/logout"
                 class="nav-link"
                 onclick="event.preventDefault();
                 this.closest('form').submit();">
                 <i class="fa fa-sign-out"></i>
                 Sair
                </a>
                </form>
              </li>
          
              @endauth

              @guest
                <li class="nav-item">
                <a href="/login" class="nav-link"><i class="fa fa-sign-in"></i> Entrar</a>
              </li>
              
              <li class="nav-item">
                <a href="/register" class="nav-link"><i class="fa fa-user"></i> Registar-se</a>
              </li>   
              @endguest


            </ul>
        </div>
        </nav>
    </header>
   
    <main>
    <div class="container-fluid">
          @if(session('msg'))
          <p class="msg">{{ session('msg')}}</p>          
          @endif
          @yield('content')
    </div>
    </main>

    <footer>
        <p>&copy; Todos os direitos reservados a Eventos Do Dia- 2022</p>
    </footer>


    </body>
</html>
