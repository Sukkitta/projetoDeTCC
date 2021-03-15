<?php
include('conexao.php');
session_start();
mysqli_select_db($conexao, 'tcc');
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['imagem']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
        $imageProperties = getimageSize($_FILES['imagem']['tmp_name']);

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $id_categoria   = $_POST['id_categoria'];
        $tituloNoticia  = $_POST['tituloNoticia'];
        $id_funcionario = $_POST['id_funcionario'];
        $datMateria     = $_POST['datMateria'];
        $textoNoticia   = $_POST['textoNoticia'];

        $sql = "UPDATE noticias 
                SET id_categoria='$id_categoria', 
                    tituloNoticia='$tituloNoticia', 
                    id_funcionario='$id_funcionario', 
                    datMateria='$datMateria', 
                    textoNoticia='$textoNoticia',
                    imageType='{$imageProperties['mime']}',
                    imageData='{$imgData}' 
                WHERE id='$id'";
    } else {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $id_categoria   = $_POST['id_categoria'];
        $tituloNoticia  = $_POST['tituloNoticia'];
        $id_funcionario = $_POST['id_funcionario'];
        $datMateria     = $_POST['datMateria'];
        $textoNoticia   = $_POST['textoNoticia'];

        $sql = "UPDATE noticias 
                SET id_categoria='$id_categoria', 
                    tituloNoticia='$tituloNoticia', 
                    id_funcionario='$id_funcionario', 
                    datMateria='$datMateria', 
                    textoNoticia='$textoNoticia' 
                WHERE id='$id'";
    }
}

$current_id = mysqli_query($conexao, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conexao));

if (isset($current_id)) {
	$_SESSION['alterado_noticia'] = true;
	header("Location: menu-servico.php");
}