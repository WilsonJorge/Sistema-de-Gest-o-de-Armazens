<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--   Favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('dist-assets/images/logo_up.png')}}">


            <!-- Google Fonts
        ============================================ -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Verdana:100,300,400,700,900" rel="stylesheet"> --}}
        
      <!-- Bootstrap CSS
        ============================================ -->

        <input type="hidden" value="<?= base_url()."/";?>" id="base_url">
        @php
        function base_url(){
            $proto = "http";//strtolower(preg_replace("/[^a-zA-Z\s]/", '', $_SERVER["SERVER_PROTOCOL"]));

            $server_name = $_SERVER["SERVER_NAME"];

            $port = $_SERVER["SERVER_PORT"] == "80" ? "" : ":8000";//":".$_SERVER["SERVER_PORT"];

            $scriptname = str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);

            $request_url = $_SERVER["REQUEST_URI"];

            return "{$proto}://{$server_name}{$port}{$scriptname}";
        }
        @endphp
      
        <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('dist-assets/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('dist-assets/css/all.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('dist-assets/select2/css/select22.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('dist-assets/select2-bootstrap4-theme/select2-bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('dist-assets/css/toastr.min.css')}}">

        {{-- Timeline --}}
        <link rel="stylesheet" href="{{ asset('dist-assets/css/plugins/smart.wizard/smart_wizard.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('dist-assets/css/plugins/smart.wizard/smart_wizard_theme_arrows.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('dist-assets/css/plugins/smart.wizard/smart_wizard_theme_circles.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('dist-assets/css/plugins/smart.wizard/smart_wizard_theme_dots.min.css')}}" />


        <!-- preloader css-->
        <link rel="stylesheet" href="{{ asset('dist-assets/css/preloader.css')}}" />
        <!-- favicon -->
        <link href="{{ asset('dist-assets/images/logo_up.png')}}" rel="shortcut icon">
        <link href="{{ asset('dist-assets/css/flatpickr.min.css')}}" rel="stylesheet">
            
    <!-- Icons fontawesome
        ============================================ -->

        <link rel="stylesheet" href="{{ asset('css\icons\font-awesome\css\font-awesome.css')}}">
        <link rel="stylesheet" href="{{ asset('css\icons\font-awesome\css\font-awesome.min.css')}}">

    <!--   Javascript generico-->


        <script src="{{ asset('dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/scripts/script.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/scripts/script_2.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/scripts/sidebar.large.script.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/flatpickr.js')}}"></script>
        <script src="{{ asset('js/imask.js')}}"></script>
        <script src="{{ asset('dist-assets/js/plugins/jquery.smartWizard.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/scripts/smart.wizard.script.min.js')}}"></script>


        <!-- Script geral -->
        <script src="{{ asset('js/scripts.js')}}"></script>
        <script src="{{ asset('dist-assets/js/scripts/sweetalert2@11.js')}}"></script>  
        <script src="{{ asset('dist-assets/js/scripts/sweetalert.script.min.js')}}"></script>  
        <script src="{{ asset('dist-assets/select2/js/lodash.min.js')}}"></script>
        <script src="{{ asset('dist-assets/select2/js/select22.min.js')}}"></script>
        <script src="{{ asset('dist-assets/js/toastr.min.js')}}"></script>


        {{--  pdf  --}}
        <script src="{{ asset('pdf/js/VentanaCentrada.js')}}"></script>
        <script src="{{ asset('pdf/js/pdf.js')}}"></script>
        {{-- <script src="{{ asset('js/anexo_script.js')}}"></script> --}}
        <script src="{{ asset('dist-assets/js/jquery.inputmask.min.js')}}"></script>
        <script src="{{ asset('js/api_queries.js')}}"></script>
        <script src="{{ asset('js/pagination.js')}}"></script>


        
 <!-- Bootstrap js E CSS normal
		============================================ --> 

        <title>@yield('title')</title>

       
    </head>

  <body class="text-left">
      <!-- Start preloader -->
      <div class="loader-bg">
          <div class="loader-p"></div>
      </div>  
      
          @yield('content')



          @yield('scripts')



    
  </body>

</html>
