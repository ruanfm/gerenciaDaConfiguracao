<?php
<<<<<<< HEAD
include_once '../../classes/Pessoa.class.php';

$objPessoa = new Pessoa();
?>
<div class="container-tabela">
    <div class="page-header-tabela col-md-12">
        <div class="col-md-10">
            <h1>Pessoa</h1>
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
                    <th style="text-align: center;" class="col-xs-5">Nome</th>
                    <th style="text-align: center;" class="col-xs-3">CPF</th>
                    <th style="text-align: center;" class="col-xs-2">Cidade</th>
                    <th style="text-align: center;" class="col-xs-1">Estado</th>
                    <th style="text-align: center;" class="col-xs-1">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($objPessoa->buscaTodos() as $query) { ?>
                    <tr> 
                        <td class="descricao col-md-5"> <?= $query['nome'] ?> </td>
                        <td class="descricao col-md-3"> <?= $query['cpf'] ?> </td>
                        <td class="fabricante col-md-2"> <?= $query['cidade'] ?> </td>
                        <td class="fabricante col-md-1"> <?= $query['estado'] ?> </td>
                        <td class="menu col-md-1"> 
                            <ul class="acoes col-md-12">
                                <li class="col-md-4 acao"><button class="fa fa-search btn_acao"></button></li>
                                <li class="col-md-4 acao"><button id="<?= $query['id'] ?>" class="fa fa-edit btn_acao"></button></li>
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
<script>
    function deleta(id) {
        $.ajax({
            url: 'classes/Pessoa_ajax.php',
            method: 'POST',
            dataType: 'json',
            data: {action: 'delete', id: id},
            success: function (data) {
                if (data == 1) {
                    $("#centerIndex").load("view/pessoa/Pessoa.php");
                    $.notify({
                        message: 'Pessoa <strong>excluída</strong> com sucesso.',
                        allow_dismiss: true,
                    }, {
                        type: 'success'
                    });
                } else {
                    $.notify({
                        message: 'Erro ao <strong>excluir</strong> a pessoa.',
                        allow_dismiss: true,
                    }, {
                        type: 'warning'
                    });
                }
            }
        });
    }
    
    $('#add_button').on('click', function () {
        $('#nova_pessoa').modal('show');
    });
    
</script>
=======

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
>>>>>>> 233b9ad7af0fea4f48858c5d79511aa873e8507b

