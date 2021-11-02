<?php

include("conexao.php");
$produto = selectIdProduto($_POST["handle"]);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<div class="container">
    <form name="dadosProduto" action="conexao.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>Nome: </td>
                    <td><input type="text" name="nome" value="<?=$produto["nome"]?>" size="20" required></td>
                </tr>
                <tr>
                    <td>Marca: </td>
                    <td><input type="text" name="marca" value="<?=$produto["marca"]?>" required></td>
                </tr>
                <tr>
                    <td>Quantidade: </td>
                    <td><input type="number" name="quantidade" value="<?=$produto["quantidade"]?>" size="20" required></td>
                </tr>
                <tr>
                    <td>Valor unitário: </td>
                    <td><input type="number" name="valorunitario" value="<?=$produto["valorunitario"]?>" size="20" required></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="acao" value="alterar">
                        <input type="hidden" name="handle" value="<?=$produto["HANDLE"]?>">
                    </td>
                    <td><input type="submit" name="Enviar" value="Enviar"></td>
                </tr>
            </tbody>
        </table> 
    </form>
</div>