<?php
@session_start();
?>
<style>
    .nav-item:hover {
        background-color: #3197ef;
    }

    .nav-item:hover span,
    .nav-item:hover i {
        color: #fff !important;
    }

    .nav-item-active {
        background-color: #3197ef;
    }

    .nav-item-active-text {
        background-color: #3197ef;
        color: #fff !important;
    }
</style>

<div class="main-header" >
    <div>
        <h1 class="" style="color: rgb(76, 175, 80); font-family: 'Unbounded' ; font-weight:600; font-size: 20px!important; padding: 12px 8px; align-items: center;"><span style="color: #e5ce02">SGEV_</span><span style="color: #3197ef">UP</span></h1>
        {{-- <img src="{{ asset('dist-assets/images/logo_up.png')}} " width="10px" height="10px" alt=""> logo do side bar --}}
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <div>
            {{-- <h2><?=$_SESSION["tipo_usuario"]?></h2> --}}
        </div>
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{ asset('dist-assets/images/user.png') }} " id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        {{-- <i class="i-Lock-User mr-1"></i> <?=$_SESSION["nome"]?> --}}
                    </div>
                    <!-- <a class="dropdown-item" data-toggle="modal" data-target="#myModal">Alteração Senha</a> -->
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#myModal">
                        Alterar Senha
                    </button>
                    <!-- <a class="dropdown-item">Billing history</a> -->
                    <a class="dropdown-item" href="./index.php"> <i class="i-Turn-Down"></i>  Sair</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item" id="dashboard_li">
                <a class="nav-item-hold" href="./dashboard1.php" id="dashboard_link">
                    <i class="i-Bar-Chart text-28 mr-2"></i>
                    <span class="nav-text" style="font-size: 14px;">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            
            <li class="nav-item" id="listagem_funcionarios_li">
                <a class="nav-item-hold" href="./listagem_funcionarios.php" id="listagem_funcionarios_link">
                    <i class="nav-icon i-MaleFemale"></i>
                    <span class="nav-text" style="font-size: 14px;">Funcionarios</span>
                </a>
                <div class="triangle"></div>
            </li>
            
            <li class="nav-item" id="vaga_li" data-item="vaga_group">
                <a class="nav-item-hold" href="./listagem_marcacoes.php" id="vaga_link">
                    <i class="nav-icon fas fa-map"></i>
                    <span class="nav-text" style="font-size: 14px;">Vagas</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item" id="presenca_li" data-item="funcionario_group_presenca">
                <a class="nav-item-hold" href="./listagem_marcacoes.php" id="presenca_link">
                    <i class="nav-icon i-Gears-2"></i>
                    <span class="nav-text" style="font-size: 14px;">Operações</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item" id="distrito_li" data-item="funcionario_group">
                <span class="nav-item-hold" href="./listagem_marcacoes.php" id="distrito_link">
                    <i class="nav-icon fas fa-list"></i>
                    <span class="nav-text" style="font-size: 14px;">Parametrizações</span>
                </span>
                <div class="triangle"></div>
            </li>

            <li class="nav-item" id="config_li" data-item="config_group">
                <span class="nav-item-hold" href="./listagem_marcacoes.php" id="config_link">
                    <i class="nav-icon fas fa-cog"></i>
                    <span class="nav-text" style="font-size: 14px;">Configurações</span>
                </span>
                <div class="triangle"></div>
            </li>
          
            
            <li class="nav-item">
                <a class="nav-item-hold" href="./index.php">
                    <!-- <i class="nav-icon i-File-Horizontal-Text"></i> -->
                    <i class="nav-icon fas fa-door-open"></i>
                    <span class="nav-text" style="font-size: 14px;">Sair</span>
                </a>
                <div class="triangle"></div>
            </li>

        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="childNav" data-parent="funcionario_group">
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_provincia.php" id="provincia_link">
                    <i class="nav-icon i-Map2"></i>
                    <span class="nav-text" style="font-size: 14px;">Provincia</span>
                </a>
            </li>

            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_distrito.php" id="escolas_link">
                    <i class="nav-icon i-Map-Marker"></i>
                    <span class="nav-text" style="font-size: 14px;">Distrito</span>
                </a>
            </li>
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_departamento.php" id="escolas_link">
                    <i class="nav-icon i-Hotel"></i>
                    <span class="nav-text" style="font-size: 14px;">Departamento</span>
                </a>
            </li>
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_departamento.php" id="escolas_link">
                    <i class="nav-icon i-Car-3"></i>
                    <span class="nav-text" style="font-size: 14px;">Vagas</span>
                </a>
            </li>
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_departamento.php" id="escolas_link">
                    <i class="nav-icon i-Car-3"></i>
                    <span class="nav-text" style="font-size: 14px;">Secções</span>
                </a>
            </li>
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_departamento.php" id="escolas_link">
                    <i class="nav-icon i-Male"></i>
                    <span class="nav-text" style="font-size: 14px;">Utilizadores</span>
                </a>
            </li>
        </ul>





        <ul class="childNav" data-parent="funcionario_group_presenca">
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="presenca_funcionarios.php" id="provincia_link">
                    <i class="nav-icon i-Arrow-Next"></i>
                    <span class="nav-text" style="font-size: 14px;">Entradas</span>
                </a>
            </li>

            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_presencas.php" id="escolas_link">
                    <i class="nav-icon i-Arrow-Back-2"></i>
                    <span class="nav-text" style="font-size: 14px;">Saidas</span>
                </a>
            </li>
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_departamento.php" id="escolas_link">
                    <i class="nav-icon i-Map2"></i>
                    <span class="nav-text" style="font-size: 14px;">Permanência</span>
                </a>
            </li>
        </ul>

        <ul class="childNav" data-parent="vaga_group">
            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="presenca_funcionarios.php" id="provincia_link">
                    <i class="nav-icon i-Arrow-Next"></i>
                    <span class="nav-text" style="font-size: 14px;">Todas Vagas</span>
                </a>
            </li>

            <li class="nav-item" id="li_escolas">
                <a class="nav-item-hold" href="listagem_presencas.php" id="escolas_link">
                    <i class="nav-icon i-Lock-2"></i>
                    <span class="nav-text" style="font-size: 14px;">Reservadas</span>
                </a>
            </li>
            
        </ul>

        <ul class="childNav" data-parent="config_group">
            <li class="nav-item" id="li_config">
                <a class="nav-item-hold" href="presenca_funcionarios.php" id="config_link">
                    <i class="nav-icon i-Edit"></i>
                    <span class="nav-text" style="font-size: 14px;">Cores</span>
                </a>
            </li>

            <li class="nav-item" id="li_config">
                <a class="nav-item-hold" href="listagem_presencas.php" id="config_link">
                    <i class="nav-icon i-Settings-Window"></i>
                    <span class="nav-text" style="font-size: 14px;">Interface</span>
                </a>
            </li>
            
        </ul>
        
        
    </div>
    <div class="sidebar-overlay"></div>
</div>
{{-- <?php include_once './components/modals/modal_change_pass.php'; ?> --}}
<!-- <script src="./js/api_queries.js"></script> -->
<script src="./dist-assets/js/scripts/sweetalert2@11.js"></script>
<script>
    function verificarSenhas(e) {
        var novaSenha = document.getElementById("novaSenha").value;
        var confirmarSenha = document.getElementById("confirmarSenha").value;

        if (novaSenha === confirmarSenha) {
            submitForm(e, "change_pass", "change_pass/create.php");
            // As senhas são iguais
            // Swal.fire({
            //     icon: 'success',
            //     title: 'Sucesso!',
            //     text: 'As senhas conferem. Você pode prosseguir.',
            //     showConfirmButton: false,
            //     timer: 1500,
            // }).then(() => {
            // });
        } else {
            // As senhas são diferentes
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'As senhas não conferem. Por favor, verifique novamente.',
                confirmButtonText: 'OK'
            }).then(() => {});
        }
    }

    function togglePassword(inputId) {
        var input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>