@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 intro-section">
            <div class="intro-content-wrapper" style="background-color:#3197ef; border-radius: 10px">
                <h1 style="color: white; font-weight:bold; text-align:center">Bem-vindo</h1>
                <h5 style="color: white; font-weight:bold; text-align:center;">Ao portal de gestão</h5>
            </div>
            <div class="intro-section-footer" style="background-color:#3197ef; border-radius: 10px; margin-top:10px; margin-bottom:10px">
                <p style="color: white; font-weight:bold; text-align:center; font-size:smaller">Copyright 2023 UPM - Universidade Pedagogica de Maputo - Eng.Adelson Saguate</p>
            </div>
        </div>
        <div class="col-sm-7 form-section">
            <div class="login-wrapper">
                <div class="mb-3" style="text-align: center;">
                    <img src="./dist-assets/images/logo_up.png" style="width: 100px;" alt="" class="logo">
                </div>
                <h3 style="text-align: center;">Portal de Gestão</h3>
                <form action="#" id="frm_login" method="POST">
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label for="email" class="sr-only" style="font-weight: bold;">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" >
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label for="password" class="sr-only" style="font-weight: bold;">Senha: </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                        </div>
                        <!-- <div class="form-group mb-3 col-md-12"> 
                            <div class="g-recaptcha" data-sitekey="6LetJZwjAAAAAFBLSr8NOjCe2RpyaVjFdd5nEHVd" data-callback="verifyCaptcha"></div>
                            <div id="g-recaptcha-error"></div>
                        </div> -->
                        <!-- <div class="custom-control custom-checkbox login-check-box">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                        </div>  -->
                        <div class="col-md-12" style="text-align: right;">
                            <button type="submit" class="btn login-btn" id="entrar">
                                <span class="ent">Entrar</span>
                                <span class="spinner-border spinner-border-sm spin" role="status" aria-hidden="true" hidden></span>
                                <span class="carregando" hidden>Carregando...</span>
                            </button>
                            <!-- <a href="#!" class="forgot-password-link">Password?</a> -->
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection 
