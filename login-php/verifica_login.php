<?php

session_start();

if (!$_SESSION['usuario']) {
    header('Location: index.php');
    exit();
} else {
    header('Location: crud-php-mysql-master\index.php');
    exit();    
}

?>