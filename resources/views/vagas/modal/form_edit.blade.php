
<div class="modal fade" id="edit-vaga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle-2">Editar vaga</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">

          <form action="#"  id="form_editar_provincia" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
              <div class="row">    
                      
                      <div class="col-md-12 form-group">
                          <label for="firstName1" style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Número da vaga<span class="text-danger">*</span></label>
                          <input class="form-control" id="nome_editar" name="nome_editar" type="text"  placeholder="Digite o nome" required/>
                      </div>
                      
                      
                  </div>

          @csrf
          </form>

             
          </div>
          <div class="modal-footer">
              <button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>
              <button class="btn btn-success ml-2" id="editar_vaga" type="button">Salvar</button>
          </div>
      </div>
  </div>
</div>