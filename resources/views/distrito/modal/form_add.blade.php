
<div class="modal fade" id="rg-distrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle-2">Registar distrito</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">

          <form action="#"  id="form_registrar_distrito" method="post" enctype="multipart/form-data">
              <div class="row">    
                      
                      <div class="col-md-12 form-group">
                          <label for="firstName1" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome do Distrito<span class="text-danger">*</span></label>
                          <input class="form-control" id="nome" name="nome" type="text"  placeholder="Digite o nome" required/>
                      </div>

                      <div class="col-md-12 form-group">
                        <label class="ul-form__label" for="provincia_id">Provincia Residência</label>
                        <select name="provincia_id" id="provincia_id" class="form-control select2" required>
                            <option value="">--selecione uma opção--</option>
                            <?php foreach ($provincias as $item) : ?>
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            <?php endforeach ?>
                        </select>
                
                </div>
                      
                      
                  </div>

          @csrf
          </form>

             
          </div>
          <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
              <button class="btn btn-success ml-2" id="registrar_distrito" type="button">Registar</button>
          </div>
      </div>
  </div>
</div>