@extends('layouts.main')

@section('title', 'Pagina Incial')


@section('content')

<div class="app-admin-wrap layout-sidebar-large">
    @include('components.sidebar')
    
    <!-- =============== Left side End ================-->
    <div class="main-content-wrap sidenav-open d-flex flex-column">


        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="breadcrumb">
                <h1 class="mr-2">Bem vindo ao Sistema de Gestão de Estacionamento de Veículos</h1>
               
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <!-- ICON BG-->
                <div class="col-lg-4 col-md-8 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center"><i class="i-MaleFemale"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Total de Funcionarios</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?=$totais->total ?? "" ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center"><i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Total de  Activos</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?=$totais->total_activos ?? "" ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center"><i class="i-Remove-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0 w-100">Total de  Inactivos</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?=$totais->total_inativos ?? "" ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-13">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Total por genero</div>
                            <div id="echartPie" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"> Total de vagas por secção</div>
                            <div id="basicBar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Progresso de registos por dia</div>
                            <div id="basicLine-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of main-content -->

        <!-- Footer Start -->
        @include('components.copyright')
        <!-- fotter end -->
    </div>
</div>

@endsection


@section('scripts')

<script src="{{ asset('dist-assets/js/plugins/echarts.min.js')}}"></script>  
<script src="{{ asset('dist-assets/js/scripts/echart.options.min.js')}}"></script>  
<script src="{{ asset('dist-assets/js/scripts/dashboard.v1.script.min.js')}}"></script>  
<script src="{{ asset('dist-assets/js/plugins/apexcharts.min.js')}}"></script>  
<script src="{{ asset('js/dashboard.js')}}"></script>  

<script>
        $(document).ready(function() {

            hideLoader();
            $("#dashboard_li").addClass("nav-item-active")
            $("#dashboard_link").addClass("nav-item-active-text")

        });

</script>
@endsection

