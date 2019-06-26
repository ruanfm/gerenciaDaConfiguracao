<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Formulário de cadastro</title>
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all">
        <link href="assets/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    </head>
    <body>
        <div class="navbar">
            <div class="botoes">
                <a type="button" class="btn btn-white btn-primary btn-bold produtos" id="pessoa" href="javascript:void(0)"><i class="menu-icon fa fa-calendar-plus"></i>
                    <span>Clientes</span>
                </a>
                <a type="button" class="btn btn-white btn-primary btn-bold produtos" id="produtos" href="javascript:void(0)"><i class="menu-icon fa fa-calendar-plus"></i>
                    <span>Produtos</span>
                </a>
                <a type="button" class="btn btn-white btn-primary btn-bold produtos" id="pedidos" href="javascript:void(0)"><i class="menu-icon fa fa-calendar-plus"></i>
                    <span>Pedidos</span>
                </a>
            </div>
        </div>
        <div class="main-content">
            <div class="main-content-inner" id="centerIndex">

            </div>
        </div>
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/bootstrap-notify.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#produtos').click(function () {
                    $("#centerIndex").load("view/produtos/Produtos.php");
                });
                $('#pessoa').click(function () {
                    $("#centerIndex").load("view/pessoa/Pessoa.php");
                });
            });
        </script>
    </body
</html>
