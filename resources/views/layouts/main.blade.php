<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--   Favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png')}}">


        <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Verdana:100,300,400,700,900" rel="stylesheet">
    
  <!-- Bootstrap CSS
		============================================ -->
   
    <link href="{{ asset('dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('dist-assets/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('dist-assets/css/all.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist-assets/select2/css/select22.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('dist-assets/css/plugins/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist-assets/select2-bootstrap4-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('dist-assets/css/toastr.min.css')}}">


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


    <!-- Script geral -->
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script src="{{ asset('dist-assets/js/scripts/sweetalert2@11.js')}}"></script>  
    <script src="{{ asset('dist-assets/select2/js/lodash.min.js')}}"></script>
    <script src="{{ asset('dist-assets/select2/js/select22.min.js')}}"></script>
    <script src="{{ asset('dist-assets/js/toastr.min.js')}}"></script>


    <!-- VentanaCentrada.js -->
    <script src="{{ asset('reports/pdf/js/VentanaCentrada.js')}}"></script>
    <!-- pdf.js --> 
    <script src="{{ asset('reports/pdf/js/pdf.js')}}"></script>
    <script src="{{ asset('js/anexo_script.js')}}"></script>
    <script src="{{ asset('dist-assets/js/jquery.inputmask.min.js')}}"></script>
    <script src="{{ asset('js/api_queries.js')}}"></script>
    <script src="{{ asset('js/pagination.js')}}"></script>


    <script src="{{ asset('dist-assets/js/plugins/sweetalert2.min.js')}}"></script> 
    <script src="{{ asset('dist-assets/js/scripts/sweetalert.script.min.js')}}"></script>

        
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
