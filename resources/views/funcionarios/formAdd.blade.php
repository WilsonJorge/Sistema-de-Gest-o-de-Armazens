
<div class="card">
    {{-- <div class="card-header bg-transparent">
        <h3 class="card-title">Dados do Funcionario</h3>
    </div> --}}
    <!-- begin::form-->
    <form action="#">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputtext11">Nome:</label>
                    <input class="form-control" id="inputtext11" type="text" placeholder="Digite o seu nome" />
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your full name
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail12">Contacto:</label>
                    <input class="form-control" id="inputEmail12" type="number" placeholder="Digite o seu contacto" />
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your contact number
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail12">Contacto Alternativo:</label>
                    <input class="form-control" id="inputEmail12" type="text" placeholder="Digite o seu contacto alternativo" />
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your contact number
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail13">Utilizador:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-transparent"><i class="i-Checked-User"></i></div>
                        </div>
                        <input class="form-control" id="inlineFormInputGroup" type="select" placeholder="Username" />
                    </div>
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your username
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail13">Username:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-transparent"><i class="i-Checked-User"></i></div>
                        </div>
                        <input class="form-control" id="inlineFormInputGroup" type="text" placeholder="Username" />
                    </div>
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your username
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                        {{-- <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia Residência</label> --}}
                        <label class="ul-form__label" for="id_provincia">Provincia Residência</label>
                        <select name="id_provincia" id="id_provincia" class="form-control select2" required>
                            <option value="">--selecione uma opção--</option>
                            <?php foreach ($provincias as $item) : ?>
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            <?php endforeach ?>
                        </select>
                
                </div>
                <div class="form-group col-md-3">
                    {{-- <label for="" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Provincia Residência</label> --}}
                    <label class="ul-form__label" for="id_provincia">Distrito Residência</label>
                    <select name="id_distrito" id="id_distrito" class="form-control select2" required>
                        <option value="">--selecione uma opção--</option>
                        <?php foreach ($provincias as $item) : ?>
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        <?php endforeach ?>
                    </select>
            
            </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputtext14">Contact:</label>
                    <input class="form-control" id="inputtext14" type="text" placeholder="Enter contact number " />
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your contact
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail15">Fax:</label>
                    <div class="input-right-icon">
                        <input class="form-control" id="inputEmail15" type="text" placeholder="Fax Number" /><span class="span-right-input-icon"><i class="ul-form__icon i-Information"></i></span>
                    </div>
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your Fax
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail16">Endereço:</label>
                    <div class="input-right-icon">
                        <input class="form-control" id="inputEmail16" type="text" placeholder="Enter your address" /><span class="span-right-input-icon"><i class="ul-form__icon i-Map-Marker"></i></span>
                    </div>
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your address
                    </small> --}}
                </div>
            
          
                <div class="form-group col-md-3 mr-2">
                    <label class="ul-form__label" for="inputEmail17">Email:</label>
                    <div class="input-right-icon">
                        <input class="form-control" id="inputEmail17" type="text" placeholder="Digite o seu email" /><span class="span-right-input-icon"><i class="ul-form__icon i-New-Mail"></i></span>
                    </div>
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please enter your postcode
                    </small> --}}
                </div>
                <div class="form-group col-md-3">
                    <label class="ul-form__label" for="inputEmail18">Genero:</label>
                    <div class="ul-form__radio-inline">
                        <label class="ul-radio__position radio radio-primary form-check-inline">
                            <input type="radio" name="radio" value="0" /><span class="ul-form__radio-font">Masculino</span><span class="checkmark"></span>
                        </label>
                        <label class="ul-radio__position radio radio-primary">
                            <input type="radio" name="radio" value="0" /><span class="ul-form__radio-font">Feminino</span><span class="checkmark"></span>
                        </label>
                    </div>
                    {{-- <small class="ul-form__text form-text" id="passwordHelpBlock">
                        Please select user group
                    </small> --}}
                </div>
            </div>
        </div>
        {{-- <div class="card-footer">
            <div class="mc-footer">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary m-1" type="button">Save</button>
                        <button class="btn btn-outline-secondary m-1" type="button">Cancel</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </form>
    <!--  end::form 3-->
</div>