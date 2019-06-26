<div class="modal fade" id="novo_produto" style="margin-top: 150px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style=" border-radius: 5px;">
            <div class="modal-header navbar" >
                <button type="button" style="border-radius: 5px; float: right" data-dismiss="modal" aria-label="Fechar" class="btn btn-white btn-sm btn-primary btn-bold"><span aria-hidden="true">Fechar</span></button>
                <h4 class="modal-title text-center" style="color: white">Produtos</h4>
            </div>
            <div class="modal-body" style="background-color: rgb(240,240,254)">
                <form method="post" id="form_novo_procedimento">
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-6 col-md-6">
                            <label for="descricao" style="color: #ff3333">Descrição</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-adn"></span></span>
                                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição do Produto"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label for="fabricante" style="color: #ff3333">Fabricante</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-reddit-alien"></span></span>
                                <input type="text" name="fabricante" id="fabricante" class="form-control" placeholder="Fabricante do Produto"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="insere"/>
                    
                    <button type="submit" style="margin-left: 24px; margin-top: 5px;  border-radius: 5px;" class="btn btn-white btn-sm btn-primary btn-bold inserir_produto" name="inserir_produto" id="inserir_produto">Incluir</button>
                </form>
            </div>
        </div>
    </div>
</div>


