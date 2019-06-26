<div class="modal fade" id="editar_produto" style="margin-top: 150px;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style=" border-radius: 5px;">
            <div class="modal-header navbar" >
                <button type="button" style="border-radius: 5px; float: right" data-dismiss="modal" aria-label="Fechar" class="btn btn-white btn-sm btn-primary btn-bold"><span aria-hidden="true">Fechar</span></button>
                <h4 class="modal-title text-center" style="color: white">Produtos</h4>
            </div>
            <div class="modal-body" style="background-color: rgb(240,240,254)">
                <form method="post" id="form_edita_produto">
                    <div class="form-row col-xs-12 col-md-12">
                        <div class="form-group col-xs-6 col-md-6">
                            <label for="descricao" style="color: #ff3333">Descrição</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-adn"></span></span>
                                <input type="text" name="descricao3" id="descricao3" class="form-control" placeholder="Descri��o do Produto"/>
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-md-6">
                            <label for="fabricante" style="color: #ff3333">Fabricante</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-reddit-alien"></span></span>
                                <input type="text" name="fabricante3" id="fabricante3" class="form-control" placeholder="Fabricante do Produto"/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id3" id="id3" class="form-control"/>
                    <input type="hidden" name="action" id="action" value="editar"/>
                    <button type="submit" style="margin-left: 24px; margin-top: 5px;  border-radius: 5px;" class="btn btn-white btn-sm btn-primary btn-bold edita_produto" name="edita_produto" id="edita_produto">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  jQuery(document).ready(function () {
      jQuery('#form_edita_produto').submit(function () {
          var dados = jQuery(this).serialize();
          $.ajax({
              url: 'classes/Produto_ajax.php',
              method: 'POST',
              dataType: 'json',
              data: dados,
              success: function (data) {
                  alert(data);
                  if (data == 1) {
                      $("#centerIndex").load("view/produtos/Produtos.php");
                      $.notify({
                          message: 'Produto <strong>editado</strong> com sucesso.',
                          allow_dismiss: true,
                      }, {
                          type: 'success'
                      });
                  } else {
                      $.notify({
                          message: 'Erro ao <strong>editar</strong> produto.',
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