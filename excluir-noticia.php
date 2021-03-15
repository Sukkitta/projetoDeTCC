<?php
session_start();
require('conexao.php');

mysqli_select_db($conexao, 'tcc') or die('Não foi possível conectar');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);



    $sql = "DELETE FROM noticias WHERE id ='$id'";
   
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao)) {
        $_SESSION['excluir_noticia'] = true;
        header('Location: menu-servico.php');
    } else {
        header('Locattion:menu-servico.php');
    }



