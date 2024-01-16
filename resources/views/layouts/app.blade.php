<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Gestão de estacionamento de veículos || Login</title>
      <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
      <meta name="csrf-token" content="{{ csrf_token() }}">

      {{-- <link rel="icon" href="{{asset('./assets/img/icon.ico')}}" type="image/x-icon"/> --}}

     
      <!-- Fonts and icons -->
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
      	<input type="hidden" value="<?= base_url()."/";?>" id="base_url">
        <?php
        function base_url(){
          $proto = "http";//strtolower(preg_replace("/[^a-zA-Z\s]/", '', $_SERVER["SERVER_PROTOCOL"]));

          $server_name = $_SERVER["SERVER_NAME"];

          $port = $_SERVER["SERVER_PORT"] == "80" ? "" : ":".$_SERVER["SERVER_PORT"];

          $scriptname = str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);

          $request_url = $_SERVER["REQUEST_URI"];

          return "{$proto}://{$server_name}{$port}{$scriptname}";
        }
        ?>
        <!-- CSS Files -->
        {{-- <link rel="stylesheet" href="{{asset('./assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('./assets/css/azzara.min.css')}}">
        <script src="{{asset('./assets/js/core/jquery.3.2.1.min.js')}}"></script>
        <script src="{{asset('./assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
        <script src="{{asset('./assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('./assets/js/core/bootstrap.min.js')}}"></script> --}}
        
        <link rel="stylesheet" href="./css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/login.css">
        <link href="./dist-assets/images/logo_up.png" rel="shortcut icon">


        <!-- JS Files / Scripts-->

        <script src="./dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./dist-assets/js/scripts/sweetalert2@11.js"></script>
  




        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if($('#show_hide_password input').attr("type") == "text"){
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass( "fa-eye-slash" );
                        $('#show_hide_password i').removeClass( "fa-eye" );
                    }else if($('#show_hide_password input').attr("type") == "password"){
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass( "fa-eye-slash" );
                        $('#show_hide_password i').addClass( "fa-eye" );
                    }
                });
            });
        </script>
    </head>
<body>
  <div class="wrapper wrapper-login">
        <main>
            @yield('content')
        </main>
  </div>


</body>
</html>
