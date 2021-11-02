<?php
session_start();

include('conexao.php');  

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT HANDLE, USUARIO
            FROM USUARIO
           WHERE USUARIO = '{$usuario}'
             AND SENHA = md5('{$senha}')"; 

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: verifica_login.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = True;
    header('Location: index.php');
    exit();
}

?>