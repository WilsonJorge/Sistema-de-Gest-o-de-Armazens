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
                <h1 class="font-weight-bold">Registar Funcionarios</h1>
                <!-- <ul>
                    <li><a href="#">Home</a></li>
                    <li>Buttons</li>
                </ul> -->
            </div>
            <div class="separator-breadcrumb border-top"></div>

            <div class="row mb-3">
                <div class="col-12 col-lg-6 col-sm-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="theme_selector">Themes</label>
                            <select class="custom-select col-lg-6 col-sm-12" id="theme_selector">
                                <option value="default">default</option>
                                <option value="arrows">arrows</option>
                                <option value="circles">circles</option>
                                <option value="dots">dots</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--  SmartWizard html -->
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Passo 1<br /><small>Descrição do passo 1</small></a></li>
                            <li><a href="#step-2">Passo 2<br /><small>Descrição do passo 2</small></a></li>
                            <li><a href="#step-3">Passo 3<br /><small>Descrição do passo 3</small></a></li>
                            <li><a href="#step-4">Passo 4<br /><small>Descrição do passo 4</small></a></li>
                        </ul>
                        <div>
                            <div id="step-1">
                                @include('funcionarios.formAdd')
                            </div>
                            <div id="step-2">
                                <h3 class="border-bottom border-gray pb-2">Step 2 Content</h3>
                                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                    to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                            </div>
                            <div id="step-3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 

                            </div>
                            <div id="step-4">
                                <h3 class="border-bottom border-gray pb-2">Step 4 Content</h3>
                                <div class="card o-hidden">
                                    <div class="card-header">My Details</div>
                                    <div class="card-block p-0">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>Tim Smith</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>example@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- end of main-content -->
        
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