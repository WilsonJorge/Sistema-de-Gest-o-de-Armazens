@extends('layouts.main')

@section('title', 'Lista de Provincias')


@section('content')

<div class="app-admin-wrap layout-sidebar-large">
    @include('components.sidebar')
    @include('provincia.modal.form_add')
    @include('provincia.modal.form_edit')
    @include('provincia.modal.detalhes')

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
                                <div class="col-md-12 text-right ">
                                     <button  title="Adicionar nova provincia" class="btn btn-primary" type="button" data-toggle="modal" data-target="#rg-provincia" id="btn_registar"><i class="fa fa-plus"></i> ADICIONAR</button> 
                                     <button  title="Imprimir um pdf" class="btn btn-info" type="button" id="print"><i class="fa fa-print"></i> PDF</button> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome da provincia</label>
                                    <input type="text" class="form-control" name="nome" id="nome" />
                                </div>
                                 <div class="col-md-3 mb-3">
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Estado</label>
                                    <select name="estado_filtro" id="estado_filtro" class="form-control select2">

                                        <option value=""> Selecione uma opção </option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
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
                                    <button class="btn btn-secondary search pesquisar">Pesquisar</button>
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

        $(document).on("click", "#btn_edit", function(){

            let id = $(this).val()
            let nome = $(this).attr('nome');

            //Preencher os campos do modal de upadte
            $("#id").val(id)
            $("#nome_editar").val(nome)


        });


        $(document).on("click", "#btn_delete", function(){
                    var provincia_id = $(this).val();
                    var estado = '2'


                    Swal.fire({
                            title: 'ALERTA!',
                            text: "Tem certeza que deseja remover a província?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#0CC27E',
                            cancelButtonColor: '#FF586B',
                            confirmButtonText: 'Sim, Tenho!',
                            cancelButtonText: 'Não, cancelar!',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-success mr-5',
                                cancelButton: 'btn btn-danger'
                            }
                        }).then((result) => {
                        if (result.isConfirmed) {
                            // Ação quando o botão de confirmação é clicado
                            update_estado(provincia_id, estado);
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // Ação quando o botão de cancelamento é clicado
                            Swal.fire('', 'Operação foi cancelada!', 'warning');
                        }
                    });


        });


        $(document).on("click", "#btn_show", function(){
            showLoader();

            var provincia_id = $(this).val();

            $.ajax({
                url: '{{url("provincia/1")}}',
                method: 'GET',
                data: {
                    _token: '{{csrf_token()}}',
                },
                dataType: 'json', 
                success: function(response) {
                    console.log(response)
                },
                error: function(err) {
                    console.log(err);
                }
            }).always(function() {
                hideLoader();
            });

        });




        function update_estado(provincia_id, estado) {
            showLoader();
            $.ajax({
                url: '{{url("provincia/delete")}}',
                method: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    provincia : provincia_id,
                    estado : estado,
                },
                dataType: 'json', 
                success: function(response) {
                    // console.log(response)
                    if(response.success == true){
                        Swal.fire({
                            icon: "success",
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 2000,
                        });
        
                        list("")

                    }else{
                        Swal.fire({
                            icon: "error",
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }


                },
                error: function(err) {
                    console.log(err);
                    Swal.fire({
                        icon: "error",
                        title: `${err}`,
                        showConfirmButton: false,
                        timer: 2000,
                    });

                }
            }).always(function() {
                hideLoader();
            });
        }



        $(document).on("click", "#btn_active", function(){
                    provincia_id = $(this).val();
                    var estado = '1';


                    Swal.fire({
                            title: 'ALERTA!',
                            text: "Tem certeza que deseja activar a província?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#0CC27E',
                            cancelButtonColor: '#FF586B',
                            confirmButtonText: 'Sim, Tenho!',
                            cancelButtonText: 'Não, cancelar!',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-success mr-5',
                                cancelButton: 'btn btn-danger'
                            }
                        }).then((result) => {
                        if (result.isConfirmed) {
                            // Ação quando o botão de confirmação é clicado
                            update_estado(provincia_id, estado);
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // Ação quando o botão de cancelamento é clicado
                            Swal.fire('', 'Operação foi cancelada!', 'error');
                        }
                    });


        });



        function list(page) {
            showLoader();
            var estado = $("#estado_filtro").val() == "" ? "1" : $("#estado_filtro").val();


            $.ajax({
                url: '{{url("provincias")}}',
                method: 'GET',
                data: {
                    "estado": estado,
                },
                dataType: 'html', 
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

