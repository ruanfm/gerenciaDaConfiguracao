<div class="modal fade" id="nova_pessoa" style="margin-top: 150px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style=" border-radius: 5px;">
            <div class="modal-header navbar" >
                <button type="button" style="border-radius: 5px; float: right" data-dismiss="modal" aria-label="Fechar" class="btn btn-white btn-sm btn-primary btn-bold"><span aria-hidden="true">Fechar</span></button>
                <h4 class="modal-title text-center" style="color: white">Pessoa</h4>
            </div>
            <div class="modal-body" style="background-color: rgb(240,240,254)">
                <form method="post" id="form_nova_pessoa">
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="nome" style="color: #ff3333">Nome</label>
                            <div class="input-group">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="cpf" style="color: #ff3333">CPF</label>
                            <div class="input-group">
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="logradouro" style="color: #ff3333">Logradouro</label>
                            <div class="input-group">
                                <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="numero" style="color: #ff3333">Numero</label>
                            <div class="input-group">
                                <input type="text" name="numero" id="numero" class="form-control" placeholder="Número"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="bairro" style="color: #ff3333">Bairro</label>
                            <div class="input-group">
                                <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="cidade" style="color: #ff3333">Cidade</label>
                            <div class="input-group">
                                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="cep" style="color: #ff3333">CEP</label>
                            <div class="input-group">
                                <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="estado" style="color: #ff3333">Estado</label>
                            <div class="input-group">
                                <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="insere"/>
                    
                    <button type="submit" style="margin-left: 24px; margin-top: 5px;  border-radius: 5px;" class="btn btn-white btn-sm btn-primary btn-bold inserir_pessoa" name="inserir_pessoa" id="inserir_pessoa">Incluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

  jQuery(document).ready(function () {
      jQuery('#form_nova_pessoa').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
          url: 'classes/Pessoa_ajax.php',
          method: 'POST',
          dataType: 'json',
          data: dados,
          success: function (data) {
                alert(data);
              if (data == 1) {
                  $("#centerIndex").load("view/pessoa/Pessoa.php");
                  $.notify({
                      message: 'Pessoa <strong>excluída</strong> com sucesso.',
                      allow_dismiss: true
                  }, {
                      type: 'success'
                  });
              } else {
                  $.notify({
                      message: 'Erro ao <strong>excluir</strong> pessoa.',
                      allow_dismiss: true
                  }, {
                      type: 'warning'
                  });
              }
            }
          });
      });
  });

</script>

