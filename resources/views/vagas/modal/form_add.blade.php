
<div class="modal fade" id="rg_vaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle-2">Registar vaga</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">

          <form action="#"  id="form_registrar_vaga" method="post" enctype="multipart/form-data">
              <div class="row">

                    <div class="col-md-12 form-group">
                          <label for="firstName1" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Número da Vaga<span class="text-danger">*</span></label>
                          <input class="form-control" id="numero" name="numero" type="text"  placeholder="Digite o número da vaga" required/>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="ul-form__label" for="seccao_id">Secção</label>
                        <select name="seccao_id" id="seccao_id" class="form-control select2" required>
                            <option value="">--selecione uma opção--</option>
                            <?php foreach ($seccoes as $item) : ?>
                                <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                            <?php endforeach ?>
                        </select>

                    </div>


                  </div>

          @csrf
          </form>


          </div>
          <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
              <button class="btn btn-success ml-2" id="registrar_vaga" type="button">Registar</button>
          </div>
      </div>
  </div>
</div>
