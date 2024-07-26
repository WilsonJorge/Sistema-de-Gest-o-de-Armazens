
<!-- Modal -->
<div class="modal fade update" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titulo_modal3" id="staticBackdropLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body conteudo3">



            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade alterarPrecoVenda" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titulo_modal2" id="staticBackdropLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="" method="post">
                    <div class="row">
                        <div class="col-md-6" hidden>
                            <label for="">Produto </label>
                            <input type="text" id="produto_id_alt" class="form-control produto_id_alt" placeholder="produto_id_alt">
                        </div>
                        <div class="col-md-6">
                            <label for="">Preço de compra actual </label>
                            <input type="text" id="preco_compra_ant" class="form-control text-right preco_compra_ant" placeholder="Preço de compra actual" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Preço de venda actual</label>
                            <input type="number" class="form-control text-right preco_venda_ant" id="preco_venda_ant" placeholder="Preço de venda actual" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Novo preço de venda</label>
                            <input type="number" class="form-control text-right novo_preco_venda" id="novo_preco_venda" placeholder="Novo preço de venda" required>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success" id="btn_alterar_preco">Submeter</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade validade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titulo_modal2" id="staticBackdropLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="" method="post">
                    <div class="row">
                        <div class="col-md" hidden>
                            <label for="">Produto</label>
                            <input type="text" id="modal_produto" class="form-control" required>
                        </div>
                        <div class="col-md mb-3">
                            <label for="">Data de validade</label>
                            <input type="date" class="prazo form-control" id="data_validade" placeholder="selecione a data de validade" required>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success" id="btn_actualizar_validade">Submeter</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

