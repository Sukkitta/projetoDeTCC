<?php
session_start();
include('conexao.php');
mysqli_select_db($conexao, 'tcc') or die('Não foi possível selecionar o banco.');

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['imagem']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
        $imageProperties = getimageSize($_FILES['imagem']['tmp_name']);
    }
}

$id_categoria   = $_POST['id_categoria'];
$tituloNoticia  = $_POST['tituloNoticia'];
$id_funcionario = $_POST['id_funcionario'];
$datMateria     = $_POST['datMateria'];
$textoNoticia   = $_POST['textoNoticia'];

$sql = "INSERT INTO noticias (id_categoria, tituloNoticia, id_funcionario, datMateria, textoNoticia, imageType, imageData) 
             VALUES ($id_categoria, '$tituloNoticia', $id_funcionario, '$datMateria', '$textoNoticia', '{$imageProperties['mime']}', '{$imgData}')";

// DEBUG
echo "Informação de Debug: <br/><hr>";
echo "count(_FILES): [" . count($_FILES) . "]<br />";
echo "id_categoria: [" . $id_categoria . "]<br />";
echo "tituloNoticia: [" . $tituloNoticia . "]<br />";
echo "id_funcionario: [" . $id_funcionario . "]<br />";
echo "datMateria: [" . $datMateria . "]<br />";
echo "textoNoticia: [" . $textoNoticia . "]<br />";
echo "FILES['imagem']['tmp_name']: [" . $_FILES['imagem']['tmp_name'] . "]<br />";
echo "<hr>";
// DEBUG FIM

$current_id = mysqli_query($conexao, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conexao));

if (isset($current_id)) {
	$_SESSION['noticia_cadastrada'] = true;
	header("Location: menu-servico.php");
}
