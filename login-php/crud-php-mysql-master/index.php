<!DOCTYPE html>

<?php include("conexao.php");

    $grupo = selectAllProduto();
    
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Login - CRUD - PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<div class="container">
    <body>
     <div class="posicionarCabecalho">
          <h1>Produtos</h1>
      </div>
      <table border="1" class="table">
          <thead class="thead-light">
              <tr>
                  <th>Nome</th>
                  <th>Marca</th>
                  <th>Quantidade</th>
                  <th>Valor unitário</th>
                  <th>Valor total</th>
                  <th>Editar</th>
                  <th>Excluir</th>
              </tr>
          </thead>
          <tbody>
             <?php 
                foreach($grupo as $produto) { ?>

                   <tr>
                      <th><?=$produto["NOME"]?></th>
                      <th><?=$produto["MARCA"]?></th>
                      <th><?=$produto["QUANTIDADE"]?></th>
                      <th>$<?=number_format($produto["VALORUNITARIO"], 2, '.', ',')?></th>
                      <th>$<?= number_format(($produto["VALORUNITARIO"] * $produto["QUANTIDADE"]), 2, '.', ',');?></th>
                      <th>
                          <form name="alterar" action="alterar.php" method="post">
                              <input type="hidden" name="handle" value="<?=$produto["HANDLE"]?>">
                              <input type="submit" name="editar" value="Editar">
                          </form>
                      </th>
                      <th>
                          <form name="excluir" action="conexao.php" method="post">
                              <input type="hidden" name="handle" value="<?=$produto["HANDLE"]?>">
                              <input type="hidden" name="acao" value="excluir">
                              <input type="submit" name="excluit" value="Excluir">
                          </form>
                      </th>
                  </tr>   
                <?php }
              ?>
          </tbody>
     </table>
      <div class="text-center">
           <button type="button" class="btn btn-primary"><a href="inserir.php">Adicionar produto</a></button>
      </div>
      <div class="text-left">
           <button type="button" class="btn btn-primary"><a href="../index.php">Sair</a></button>
      </div>
    </body>
</div>
</html>