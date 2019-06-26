<div class="modal fade" id="editar_pessoa" style="margin-top: 150px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style=" border-radius: 5px;">
            <div class="modal-header navbar" >
                <button type="button" style="border-radius: 5px; float: right" data-dismiss="modal" aria-label="Fechar" class="btn btn-white btn-sm btn-primary btn-bold"><span aria-hidden="true">Fechar</span></button>
                <h4 class="modal-title text-center" style="color: white">Pessoa</h4>
            </div>
            <div class="modal-body" style="background-color: rgb(240,240,254)">
                <form method="post" id="form_edita_pessoa">
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="nome2" style="color: #ff3333">Nome</label>
                            <div class="input-group">
                                <input type="text" name="nome2" id="nome2" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="cpf2" style="color: #ff3333">CPF</label>
                            <div class="input-group">
                                <input type="text" name="cpf2" id="cpf2" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="logradouro2" style="color: #ff3333">Logradouro</label>
                            <div class="input-group">
                                <input type="text" name="logradouro2" id="logradouro2" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="numero2" style="color: #ff3333">Numero</label>
                            <div class="input-group">
                                <input type="text" name="numero2" id="numero2" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="bairro2" style="color: #ff3333">Bairro</label>
                            <div class="input-group">
                                <input type="text" name="bairro2" id="bairro2" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="cidade2" style="color: #ff3333">Cidade</label>
                            <div class="input-group">
                                <input type="text" name="cidade2" id="cidade2" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="cep2" style="color: #ff3333">CEP</label>
                            <div class="input-group">
                                <input type="text" name="cep2" id="cep2" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-4 col-md-4">
                            <label for="estado2" style="color: #ff3333">Estado</label>
                            <div class="input-group">
                                <input type="text" name="estado2" id="estado2" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="editar"/>
                    <input type="hidden" name="id2" id="id2" class="form-control"/>
                    <button type="submit" style="margin-left: 24px; margin-top: 5px;  border-radius: 5px;" class="btn btn-white btn-sm btn-primary btn-bold inserir_pessoa" name="editar_pessoa" id="editar_pessoa">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  jQuery(document).ready(function () {
      jQuery('#form_edita_pessoa').submit(function () {
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
                          message: 'Cliente <strong>editado</strong> com sucesso.',
                          allow_dismiss: true,
                      }, {
                          type: 'success'
                      });
                  } else {
                      $.notify({
                          message: 'Erro ao <strong>editar</strong> cliente.',
                          allow_dismiss: true,
                      }, {
                          type: 'warning'
                      });
                  }
              }
          });
      });
  });

</script>