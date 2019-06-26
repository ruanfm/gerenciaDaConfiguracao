<?php
include_once '../../classes/Produto.class.php';

$objProduto = new Produto();
?>
<div class="container-tabela">
    <div class="page-header-tabela col-md-12">
        <div class="col-md-10">
            <h1>Produtos</h1>
        </div>
        <div class=" col-md-2" id="duvidas">
            <a href="javascript:void(0)" class="fa fa-question fa-2x"></a>
        </div>
    </div>
    <div class="clearfix col-xs-12" id="botoes_tabela">
        <div class="col-xs-12 col-md-4">
            <div class="pull-left" style="padding-right: 10px; padding-bottom: 20px">
                <button  type="button" name="add_button" id="add_button" class="btn btn-white btn-primary btn-bold">Incluir</button>
            </div>
            <div class="pull-left tableTools-container"></div>
        </div>
    </div>
    <div>
        <table style="text-align: center;" id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead >
                <tr style="font-family: initial;  font-size: 15px;">
                    <th style="text-align: center;" class="col-xs-1">ID</th>
                    <th style="text-align: center;" class="col-xs-5">Descrição</th>
                    <th style="text-align: center;" class="col-xs-5">Fabricante</th>
                    <th style="text-align: center;" class="col-xs-1">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($objProduto->buscaTodos() as $query) { ?>
                  <tr> 
                      <td class="descricao col-md-1"> <?= $query['id'] ?> </td>
                      <td class="descricao col-md-5"> <?= $query['descricao'] ?> </td>
                      <td class="fabricante col-md-5"> <?= $query['fabricante'] ?> </td>
                      <td class="menu col-md-1"> 
                          <ul class="acoes col-md-12">
                              <li class="col-md-4 acao"><button onclick="visualiza(<?= $query['id'] ?>, 1)" id="visualiza" class="fa fa-search btn_acao"></button></li>
                              <li class="col-md-4 acao"><button onclick="visualiza(<?= $query['id'] ?>, 2)" id="<?= $query['id'] ?>" class="fa fa-edit btn_acao"></button></li>
                              <li class="col-md-4 acao"><button onclick="deleta(<?= $query['id'] ?>)" class="fa fa-trash btn_acao"></button></li>
                          </ul>
                      </td>
                  </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once './Modal_incluir.php'; ?>
<?php include_once './Moda_visualizar.php'; ?>
<?php include_once './Modal_editar.php'; ?>
<script>
  function deleta(id) {
      $.ajax({
          url: 'classes/Produto_ajax.php',
          method: 'POST',
          dataType: 'json',
          data: {action: 'delete', id: id},
          success: function (data) {
              if (data == 1) {
                  $("#centerIndex").load("view/produtos/Produtos.php");
                  $.notify({
                      message: 'Produto <strong>excluído</strong> com sucesso.',
                      allow_dismiss: true,
                  }, {
                      type: 'success'
                  });
              } else {
                  $.notify({
                      message: 'Erro ao <strong>excluir</strong> produto.',
                      allow_dismiss: true,
                  }, {
                      type: 'warning'
                  });
              }
          }
      });
  }
  function visualiza(id, tipo) {
      if (tipo == 1) {
          $('#visualiza_produto').modal('show');
          $.ajax({
              url: 'classes/Produto_ajax.php',
              method: 'POST',
              dataType: 'json',
              data: {action: 'buscaIndividual', id: id},
              success: function (data) {
                  $('#descricao2').val(data.descricao).attr('readonly', true);
                  $('#fabricante2').val(data.fabricante).attr('readonly', true);
              }
          });
      } else {
          $('#editar_produto').modal('show');
          $.ajax({
              url: 'classes/Produto_ajax.php',
              method: 'POST',
              dataType: 'json',
              data: {action: 'buscaIndividual', id: id},
              success: function (data) {
                  $('#id3').val(id);
                  $('#descricao3').val(data.descricao);
                  $('#fabricante3').val(data.fabricante);
              }
          });
      }
  }

  $('#add_button').on('click', function () {
      $('#novo_produto').modal('show');
  });

</script>

