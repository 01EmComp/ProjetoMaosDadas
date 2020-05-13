<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=chrome" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="A la carte, buffet e delivery." />
  <meta name="author" content="Sushi - KTA" />
  <title>Sushi - KTA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../css/stylelistacompra.css" />
  <link href="../css/style.css" rel='stylesheet' type='text/css' />
  <link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="../js/modernizr.custom.min.js"></script>
  <style>
    .foo {
      float: left;
      width: 20px;
      height: 20px;
      margin: 5px;
      border: 1px solid rgba(0, 0, 0, .2);
    }

    .verde {
      background: #008000;
    }

    .vermelho {
      background: #990000;
    }

    .branco {
      background: #f2f2f2;
    }
  </style>
</head>

<body>

  <?php

  //Status
  //0-enviado
  //1-em preparo
  //2-negado

  include("../admsushi/conexao.php");

  ?>

  <nav class="navbar navbar-expand-lg navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="#">
          <img src="../images/logo2.png" class="hidden-xs" alt="" style="border-radius: 50%;">
          <h3 class="visible-xs">Sushi-kta</h3>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a data-toggle="collapse" data-target=".in" class="page-scroll" href="../index.php#intro">Início</a>
          </li>
          <li>
            <a data-toggle="collapse" data-target=".in" class="page-scroll" href="../index.php#sobre">Sobre nós</a>
          </li>
          <li>
            <a data-toggle="collapse" data-target=".in" class="page-scroll" href="../index.php#sugestoes">Sugestões</a>
          </li>
          <li>
            <a data-toggle="collapse" data-target=".in" class="page-scroll" href="../index.php#cardapio">Cardápio</a>
          </li>
          <li>
            <a data-toggle="collapse" data-target=".in" class="page-scroll" href="../index.php#local">Local</a>
          </li>
          <li id="iconelogin">
            <a class="page-scroll" href="../cliente/"><i class="fa fa-user"></i></a>
          </li>
          <li id="nomecliente">
            <a class="page-scroll" href="../cliente/">
              <div class="nomecliente" style="font-weight: bold;"></div>
            </a>
          </li>
          <li id="botaosair">
            <a class="page-scroll" href="../cliente/logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  td {
  text-align: left;
  }
  </style>
  <section class="box-2 box-style" id="pedido_concluido" style="padding-top: 100px;height:100vh;">
    <div class="container">
      <div class="row heading">
        <div class="col-lg-12">
          <div class="intro">
            <?php
            if (isset($_SESSION["codCli"])) {
              $sql2 = "SELECT `nomeCliente` FROM `cliente` WHERE `codCliente`=" . $_SESSION['codCli'];
              $result2 = $con->query($sql2);
              while ($row2 = $result2->fetch_assoc()) {
                $nome = $row2['nomeCliente'];
              }

            ?>
              <script>
                $('.nomecliente').html("<i class='fa fa-user'></i> <?= $nome; ?>");
                $('#iconelogin').remove();
              </script>
              <?php

            } else {
              echo "<script>$('#nomecliente').remove();</script>";
              echo "<script>$('#botaosair').remove();</script>";
            }
            if (!isset($_SESSION["codCli"])) {
              echo "<script>window.location.replace('index.php');</script>";
            } else {
              $cod = $_SESSION["codCli"];
            }

            $sqlp = "SELECT `status` FROM `pedido` WHERE codPedido=" . $_GET['cod'];
            $resultp = $con->query($sqlp);
            while ($rowp = $resultp->fetch_assoc()) {
              if ($rowp['status'] == 1) {
              ?>
                <div class="alert alert-success" role="alert"><b>Pedido em preparação!</b></div>
              <?php
              } else if ($rowp['status'] == 2) {
              ?>
                <div class="alert alert-danger" role="alert"><b>Pedido recusado!</b></div>
              <?php
              } else {
              ?>
                <div class="alert alert-info" role="alert"><b>Pedido enviado, aguardando confirmação do Sushi KTA</b></div>
            <?php
              }
            } ?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Produto</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $sql = "SELECT * FROM itempedido, item WHERE itempedido.codItem=item.codItem AND itempedido.codPedido=" . $_GET['cod'] . "";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {
                  echo "
                  tr>
            <td>" . $row['nomeItem'] . "</td>
            <td>R$ " . $row['preco_unitario'] . "</td>
            <td>" . $row['quantidade'] . "</td>
            <td>R$ " . number_format($row['precoTotal'], 2) . "</td>
            </tr> ";
                }
                $sql = "SELECT `total`,codCliente FROM `pedido` WHERE `codPedido`=" . $_GET['cod'] . "";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                  $total = $row['total'];
                  echo "<b><tr>
            <td colspan='3'></td>

            <td style='font-size: 18px;'><b>R$ " . $row['total'] . "</b></td>
            </tr> </b>";
                  $codcliente = $row['codCliente'];
                }
                echo "</tbody>
                
                </table>";
                $sql = "SELECT `descricao`, `troco`,`pagamento` FROM `pedido` WHERE codPedido=" . $_GET['cod'] . "";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                  if ($row['descricao']) echo '<p style="text-align: left;"><div class="alert alert-warning" role="alert">Observações informadas por você:</p><p><b>' . $row['descricao'] . '</b></div></p>';
                  else echo '<p style="text-align: left;"><i><div class="alert alert-warning" role="alert">Você não informou nenhuma observação para este pedido.</i></p></div>';

                  if ($row['pagamento'] == 'dinheiro') {
                    echo '<div class="alert alert-success" role="alert"><p style="text-align: left;">Você selecionou como método de pagamento <b>dinheiro</b>.</p></div>';
                    if ($row['troco']) {
                      $total = $row['troco'] - $total;
                      echo '<p style="text-align: left;"><div class="alert alert-success" role="alert">Troco para R$ ' . $row['troco'] . ' <br>R$ ' . number_format($total, 2) . ' de troco.</div></p>';
                    } else echo '<p style="text-align: left;"><div class="alert alert-success" role="alert">Sem necessidade de troco.</p></div>';
                  } else {
                    echo '<p style="text-align: left;"><div class="alert alert-success" role="alert">Você selecionou como método de pagamento <b>Cartão de Crédito/Débito.</b></div></p><br><br>';
                  }
                }
                ?>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Rua</th>
                      <th scope="col">Bairro</th>
                      <th scope="col">Número</th>
                      <th scope="col">CEP</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT c.`nomeCliente`, c.`telefoneCliente`, c.`emailCliente`,e.`rua`, e.`bairro`, e.`numero`, e.`cep` FROM `cliente` as c,`endereco` as e WHERE c.`codCliente`=e.`codCliente` AND c.`codCliente`=" . $codcliente;
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                <td>" . $row['nomeCliente'] . "</td>
                <td>" . $row['telefoneCliente'] . "</td>
                <td>" . $row['emailCliente'] . "</td>
                <td>" . $row['rua'] . "</td>
                <td>" . $row['bairro'] . "</td>
                <td>" . $row['numero'] . "</td>
                <td>" . $row['cep'] . "</td>
                </tr> ";
                    }
                    echo "</tbody></table>";
                    ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>