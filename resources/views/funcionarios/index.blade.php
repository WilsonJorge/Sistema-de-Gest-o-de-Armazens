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
                <h1 class="font-weight-bold">Lista de Funcionarios</h1>
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
                            <div class="row">
                                <div class="col-md-12 text-right ">
                                    {{-- <button class="btn btn-success" type="button" data-toggle="modal" data-target="#registar_funcionario_modal"><i class="i-Edit"></i> Novo funcionario</button> --}}

                                    <a class="btn btn-primary lg" href="{{ route('funcionarios.form_create') }}">
                                        <i class="i-Edit"></i> Novo funcionario
                                        {{-- <button class="btn btn-success" type="button" data-toggle="modal" data-target="#registar_funcionario_modal"><i class="i-Edit"></i> Novo funcionario</button> --}}
                                    </a>
                                    

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3 mb-3">
                                    <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome do Funcionario</label>
                                    <input type="text" class="form-control" name="nome" id="nome" />
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                                 <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia Residência</label>
                                                 <select name="id_provincia" id="id_provincia" class="form-control select2" required>
                                                     <option value="">--selecione uma opção--</option>
                                                     <?php foreach ($provincias as $item) : ?>
                                                         <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                     <?php endforeach ?>
                                                 </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                                 <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Distrito Residência</label>
                                                 <select name="id_distrito" id="id_distrito" class="form-control select2" required>
                                                     <option value="">--selecione uma opção--</option>
                                                 </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                                 <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Género</label>
                                                 <select name="genero" id="genero" class="form-control select2" required>
                                                     <option value="">selecione uma opção</option>
                                                     <option value="Masculino">Masculino</option>
                                                     <option value="Feminino">Feminino</option>
                                                 </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                        <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Estado</label>
                                                 <select name="estado" id="estado" class="form-control select2" required>
                                                     <option value="">selecione uma opção</option>
                                                     <option value="1"> Activo</option>
                                                     <option value="0"> Inactivo</option>
                                               </select>
                                </div>
                                

                                <div class="col-md-12 mb-3 text-right" style="text-align: right">
                                    <button class="btn btn-secondary btn-xs search pesquisar">Pesquisar</button>
                                </div>

                            </div>
                            <br><br>

                            <div class="table-responsive">
                                <div class="list_funcionarios"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of main-content -->
        
        <!-- Footer Start -->
        <!-- modla update e registrar -->
        
        @include('components.copyright')
        <!-- fotter end -->
    </div>
</div>
    
@endsection



@section('scripts')
<script>
    $(document).ready(function() {

        
        hideLoader(); //loader

        $(".select2").select2({
            allowClear: true,
        });

        list("");

        $(document).on('click', '.pagination a', paginaClickHandler);

        $("#listagem_funcionarios_li").addClass("nav-item-active")
        $("#listagem_funcionarios_link").addClass("nav-item-active-text")

        $(".pesquisar").click(function() {
            list("")
        });

    });


    function getDistritos(selectDistritoID,provincia_id){
        $.ajax({
                 url: './app/ajax/distritos/list.php',
                 method: 'GET',
                 data: {
                     "provincia_id": provincia_id
                 },
                 dataType: 'html',
                 success: function(data) {
                     $(`${selectDistritoID}`).html(data)
                 },
                 error: function(err) {
                     console.log(err);
                 }
             }).always(function() {
                 // hideLoader();
             });
    }

    $(document).on("change", "#id_provincia", function(e) {
        let provincia_id = $(this).val()
        getDistritos("#id_distrito",provincia_id)
    });

    $(document).on("change", "#id_provincia_modal", function(e) {
        let provincia_id = $(this).val()
        getDistritos("#id_distrito_modal",provincia_id)
    });
    


    function list(page) {
                // alert(page)
                //showLoader();
                $.ajax({
                    url: './app/ajax/funcionario/list.php',
                    method: 'GET',
                    data: {
                        
                        "nome": $("#nome").val(),
                        "genero": $("#genero").val(),
                        "id_provincia": $("#id_provincia").val(),
                        "id_distrito": $("#id_distrito").val(),
                        "estado": $("#estado").val(),
                    },
                    dataType: 'html',
                    success: function(data) {
                        // console.log(data);
                        $(".list_funcionarios").html(data)
                    },
                    error: function(err) {
                        console.log(err);
                    }
                }).always(function() {
                    hideLoader();
                });
            }


            $(document).on("click", "#desactivar_funcionario", function(e) {
                let id = $(this).val()
                swal({
                    title: 'Tens a certeza que deseja desactivar o funcionario?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: 'Sim!',
                    cancelButtonText: 'Não!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                    }).then(function () {
                        desactivar(id)
                         
                    }, function (dismiss) {
                    if (dismiss === 'cancel') {  
                        swal('Operação cancelada!', '', 'error');
                        list("")
                     }
                });
            });


            function desactivar(id){
                
                $.ajax({
                    url: './app/ajax/funcionario/delete.php',
                    method: 'POST',
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(data) {  
                                     
                        swal({
                        type: 'success',
                        title: 'Sucesso!',
                        text: `${data.message}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                    
                    
                    });
                    list("")
                    },
                    error: function(err) {
                        console.log(err);
                        swal({
                        type: 'warning',
                        title: 'Error',
                        text: `${err.message}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-danger'
                    });
                    }
                }).always(function() {
                    // hideLoader();
                });
                       
        }

            $(document).on("click", "#activar_funcionario", function(e) {
                let id = $(this).val()
                swal({
                    title: 'Tens a certeza que deseja activar o funcionario?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: 'Sim!',
                    cancelButtonText: 'Não!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                    }).then(function () {
                        activar(id)

                    }, function (dismiss) {
                    if (dismiss === 'cancel') {  
                        swal('Operação cancelada!', '', 'error');
                        list("")
                     }
                });
            });


            function activar(id){
                
                $.ajax({
                    url: './app/ajax/funcionario/update.php',
                    method: 'POST',
                    data: {
                        "id": id,
                        "estado": 1,
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)               
                        swal({
                        type: 'success',
                        title: 'Sucesso!',
                        text: 'Funcionario activado com sucesso!',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                    
                    
                    });
                    list("")
                    },
                    error: function(err) {
                        console.log(err);
                        swal({
                        type: 'warning',
                        title: 'Error',
                        text: `${err.message}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-danger'
                    });
                    }
                }).always(function() {
                    // hideLoader();
                });
                       
        }



        //Registar
        $(document).on("click", "#registar_funcionario", function(e) {
             
            $.ajax({
                    url: './app/ajax/funcionario/create.php',
                    method: 'POST',
                    data: {
                        
                        "nome": $("#nome_func").val(),
                        "id_departamento": $("#id_departamento_func").val(),
                        "id_provincia": $("#id_provincia_modal").val(),
                        "id_distrito": $("#id_distrito_modal").val(),
                        "data_nascimento": $("#data_nascimento_func").val(),
                        "contacto": $("#contacto_func").val(),
                        "genero": $("#genero_func").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        swal({
                        type: 'success',
                        title: 'Sucesso!',
                        text: `${data.message}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                          });

                          list("")
                          
                    },
                    error: function(err) {
                        console.log(err);
                        swal({
                        type: 'warning',
                        title: 'Erro!',
                        text: `${err}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                          });
                    }
                
                }).always(function() {
                    hideLoader();
               });     
         });



    $(document).on("click","#editar_funcionario",function(){
        let id_funcionario = $(this).val()
        $("#id").val(id_funcionario)
                    
        getOneFunc(id_funcionario)

      });

       function getOneFunc(id_func){
        $.ajax({
                 url: './app/ajax/funcionario/getOne.php',
                 method: 'GET',
                 data: {
                     "id": id_func
                 },
                 dataType: 'html',
                 success: function(data) {
                    // console.log(data)       
                     $("#form_modal_update").html(data)
                 },
                 error: function(err) {
                     console.log(err);
                 }
             }).always(function() {
                 // hideLoader();
             });
         }


        $(document).on("click", "#actualizar_funcionario", function(e) {
                    let id_funcionario = $('#id').val()
                    update(id_funcionario)
                    $ ("#update_funcionario_modal").modal ('hide'); 
                    
         });


         function update(id_funcionario){

            $.ajax({
                    url: './app/ajax/funcionario/update.php',
                    method: 'POST',
                    data: {
                        
                        "id": id_funcionario,
                        "nome": $("#nome_func").val(),
                        "id_departamento": $("#id_departamento").val(),
                        "id_provincia": $("#id_provincia_modal").val(),
                        "id_distrito": $("#id_distrito_modal").val(),
                        "data_nascimento": $("#data_nascimento").val(),
                        "contacto": $("#contacto").val(),
                        "genero": $("#genero_func").val()
                        
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        swal({
                        type: 'success',
                        title: 'Sucesso!',
                        text: `${data.message}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                          });

                          list("")
                          
                    },
                    error: function(err) {
                        console.log(err);
                        swal({
                        type: 'warning',
                        title: 'Erro!',
                        text: `${err}`,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                          });
                    }
                
                }).always(function() {
                    hideLoader();
               });

             }


</script>
@endsection 