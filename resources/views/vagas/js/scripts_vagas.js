$(document).ready(function() {


    alert()
    hideLoader();


    $(".select2").select2({
        allowClear: true,
    });

    var limite = $('#limit').val()
    var page = 1

    list(page,limite);

    // $(document).on('click', '.pagination a', paginaClickHandler);

    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        page = $(this).attr('href').split('page=')[1];
        $(this).attr('href', '');
        list(page, limite);

    });

    $("#distrito_li").addClass("nav-item-active")
    $("#distrito_link").addClass("nav-item-active-text")

    $(".pesquisar").click(function() {
        let limite = $('#limit').val();
        list(page,limite);

    })

    $(document).on("click", "#btn_edit", function(){

        let id = $(this).val()
        let nome = $(this).attr('nome');

        //Preencher os campos do modal de upadte
        $("#id").val(id)
        $("#nome_editar").val(nome)


    });


    $(document).on("click", "#btn_delete", function(){
        var distrito_id = $(this).val();
        var estado = '2'


        Swal.fire({
            title: 'ALERTA!',
            text: "Tem certeza que deseja remover o distrito?",
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
                update_estado(distrito_id, estado);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('', 'Operação foi cancelada!', 'warning');
            }
        });


    });


    $(document).on("click", "#btn_show", function(){
        showLoader();

        var distrito_id = $(this).val();
        var url = '{{url("distrito")}}/' + distrito_id;

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




    function update_estado(distrito_id, estado) {
        showLoader();
        $.ajax({
            url: '{{url("distrito/delete")}}',
            method: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                distrito_id : distrito_id,
                estado : estado,
            },
            dataType: 'json',
            success: function(response) {
                if(response.success == true){
                    Swal.fire({
                        icon: "success",
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 2000,
                    });

                    list(page,limite);


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
        distrito_id = $(this).val();
        var estado = '1';


        Swal.fire({
            title: 'ALERTA!',
            text: "Tem certeza que deseja activar o distrito?",
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
                update_estado(distrito_id, estado);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Ação quando o botão de cancelamento é clicado
                Swal.fire('', 'Operação foi cancelada!', 'error');
            }
        });


    });




    function list(page, limite) {
        showLoader();
        var estado = $("#estado_filtro").val() == "" ? "1" : $("#estado_filtro").val();
        var numero = $("#numero_filtro").val()


        $.ajax({
            url: '{{url("vagas")}}?page=' + page,

            method: 'GET',
            data: {
                "estado": estado,
                "numero": numero,
                "limite": limite,
            },
            dataType: 'html',
            success: function(data) {
                $(".list_vagas").html(data);
            },
            error: function(err) {
                console.log(err);
            }
        }).always(function() {
            hideLoader();
        });
    }
});
