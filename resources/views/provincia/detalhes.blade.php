@extends('layouts.main')

@section('title', 'Detalhes da Província')


@section('content')

<div class="app-admin-wrap layout-sidebar-large">
    @include('components.sidebar')


    <!-- =============== Left side End ================-->
    <div class="main-content-wrap sidenav-open d-flex flex-column">


        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="breadcrumb">
                <h1 class="font-weight-bold">Detalhes da Provincias</h1>
                <!-- <ul>
                    <li><a href="#">Home</a></li>
                    <li>Buttons</li>
                </ul> -->
            </div>
            <div class="separator-breadcrumb border-top"></div>
            
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
            var url = '{{url("provincia")}}/' + provincia_id;

            $.ajax({
                url: url,
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

