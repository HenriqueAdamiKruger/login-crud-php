<?php

// Verifica se o POST existe antes de inserir uma nova produto
if(isset($_POST["acao"])){
    if ($_POST["acao"]=="inserir"){
        inserirProduto();
    }
    if ($_POST["acao"]=="alterar"){
        alterarProduto();
    }
    if($_POST["acao"]=="excluir"){
        excluirProduto();
    }
}

// Responsável por criar uma conexão com meu banco
function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "", "login");
    return $conexao;
}

// Função responsável inseir uma produto no meu banco de dados
    function inserirProduto() {
        $banco = abrirBanco();
        $sql = "INSERT INTO PRODUTO(NOME, MARCA, QUANTIDADE, VALORUNITARIO) 
        VALUES ('{$_POST["nome"]}', '{$_POST["marca"]}', '{$_POST["quantidade"]}', '{$_POST["valorunitario"]}')";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

// Função responsável editar uma produto no meu banco de dados
    function alterarProduto() {
        $banco = abrirBanco(); 
        $sql = "UPDATE PRODUTO SET NOME = '{$_POST["nome"]}', MARCA = '{$_POST["marca"]}', QUANTIDADE = '{$_POST["quantidade"]}', VALORUNITARIO = '{$_POST["valorunitario"]}' WHERE HANDLE = '{$_POST["handle"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

// Função responsável excluir uma produto no meu banco de dados
    function excluirProduto() {
        $banco = abrirBanco();
        $sql = "DELETE FROM PRODUTO WHERE HANDLE = '{$_POST["handle"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function selectAllProduto() {
        $banco = abrirBanco();
        $sql = "SELECT * FROM PRODUTO ORDER BY NOME";
        $resultado = $banco->query($sql);
        $banco->close();
        // Laço que pega as informações do meu banco, organiza linha a linha e armazena na var $grupo
        while($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectIdProduto($handle) {
        $banco = abrirBanco();
        $sql = "SELECT * FROM PRODUTO WHERE HANDLE = ".$handle;
        $resultado = $banco->query($sql);
        $banco->close();
        // Laço que pega as informações do meu banco, organiza linha a linha e armazena na var $grupo
        $produto = mysqli_fetch_assoc($resultado);
        return $produto;
    }

// Após inserir uma nova produto, retorna para a página principal
    function voltarIndex(){
        header("Location:index.php");
    }

?>