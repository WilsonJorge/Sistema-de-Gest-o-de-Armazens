@extends('layouts.main')

@section('title', 'Lista de Funcionarios')


@section('content')

<div class="app-admin-wrap layout-sidebar-large">
    @include('components.sidebar')
    <!-- =============== Left side End ================-->
    <div class="main-content-wrap sidenav-open d-flex flex-column">


        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="breadcrumb">
                <h1 class="font-weight-bold">Lista de Provincias</h1>
                <!-- <ul>
                    <li><a href="#">Home</a></li>
                    <li>Buttons</li>
                </ul> -->
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <!-- <h1 class="font-weight-bold">Multas</h1><br> -->
                            <div class="row">
                                {{-- <div class="col-md-12 text-right ">
                                    <!-- <button  href="rg_aluno.php" class="btn btn-success btn-lg" type="button" id="registar">Registar</button> -->
                                    <a href="rg_distrito.php" class="btn btn-success btn-lg">Registar</a>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome da provincia</label>
                                    <input type="text" class="form-control" name="nome" id="nome" />
                                </div>
                                 <div class="col-md-4 mb-3" hidden>
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Estado</label>
                                    <select name="genero" id="genero" class="form-control select2">

                                        <option value="" seleted> -- Selecione --</option>
                                        <option value="M">Activo</option>
                                        <option value="F">Inactivo</option>
                                    </select>
                                </div>
                                {{--
                                <div class="col-md-4 mb-3">
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia</label>
                                    <select name="provincia_id" id="provincia_id" class="form-control select2">
                                        <option value="">--selecione uma opção--</option>

                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Distrito<span class="text-danger" style="font-family: 'Arial narrow'; font-size: 14px; color: #6b6076; line-height: 21px; font-weight: bold"></span></label>
                                    <select name="distrito_id" id="distrito_id" class="form-control select2" required>
                                        <option value="">--selecione uma opção--</option>

                                    </select>
                                </div> --}}
                                <div class="col-md-12 mb-3 text-right" style="text-align: right">
                                    <button class="btn btn-secondary btn-lg search pesquisar">Pesquisar</button>
                                </div>
                            </div>
                            <br><br>

                            {{-- <div class="table-responsive"> --}}
                            <div>
                                <div class="list_provincia"></div>
                            </div>
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
<script>
    $(document).ready(function() {
        $(".select2").select2({
            allowClear: true,
        });

        list("");

        $(document).on('click', '.pagination a', paginaClickHandler);

        $("#distrito_li").addClass("nav-item-active")
        $("#distrito_link").addClass("nav-item-active-text")

        $(".pesquisar").click(function() {
            list("")
        })
    });



        function list(page) {
            showLoader();
            $.ajax({
                url: '{{url("provincias")}}',
                method: 'GET',
                data: {
                    // "nome": $("#nome_aluno").val(),
                    // "genero": $("#genero").val(),
                    // "id_provincia": $("#id_provincia").val(),
                    // "id_distrito": $("#id_distrito").val(),
                },
                dataType: 'html', // Vamos ajustar para 'json' para esperar uma resposta JSON
                success: function(data) {
                    $(".list_provincia").html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            }).always(function() {
                hideLoader();
            });
        }

</script>
@endsection

