<?php
    require_once "conexao.php";
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData FROM noticias WHERE Id=" . $_GET['image_id'];
		$result = mysqli_query($conexao, $sql) or die("<b>Erro:</b> Problema ao receber a imagem BLOB<br/>" . mysqli_error($conexao));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
	mysqli_close($conexao);
?>