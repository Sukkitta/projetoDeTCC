<?php include('conexao.php');
mysqli_select_db($conexao, 'tcc') or die('Não foi possível conectar');

//recebendo id da pagina listar Funcionarios
//$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "select * from noticias where id ='$id'";
$result_usuario = mysqli_query($conexao, $result);
$row_usuario = mysqli_fetch_array($result_usuario);
$id_func = $row_usuario['id_funcionario'];
$id_cate = $row_usuario['id_categoria'];


//recebe nome do func pelo id_funcionario
$resulto_func = "select * from funcionario where id ='$id_func'";
$resulto_nome = mysqli_query($conexao, $resulto_func);
$row_nome = mysqli_fetch_array($resulto_nome);
$nome_func = $row_nome['nome'];

//recebe nome do da Categoria pelo id_categoria
$resulto_cate = "select * from categorias where id ='$id_cate'";
$resulto_nomeCate = mysqli_query($conexao, $resulto_cate);
$row_nomeCate = mysqli_fetch_array($resulto_nomeCate);
$nome_Cate = $row_nomeCate['cat_nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/noticias.css">
    <title>Document</title>
</head>
<body>
<input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>">
<header>
<?php include 'cabecalho.php' ?>
</header>

<div class="conteudo">

<div class="titulo-noticia">

<h1><?php echo $row_usuario['tituloNoticia']; ?></h1>
</div>

<div class="categoria-noticia">
<?php echo $row_nomeCate['cat_nome']; ?>
</div>

<div class="autor-data-noticia">
    <?php
    $varX = explode("-",$row_usuario['datMateria']);
    $varData=$varX[2] . "/" . $varX[1] . "/" .$varX[0];
    ?>
    Autor: <?php echo $row_nome['nome']; ?>  Publicado: <?php echo $varData; ?>
</div>

<div class="imagen-noticia">
<img src="imageView.php?image_id=<?php echo $id; ?>" width="650" height="500" />
<!--<?php echo $row_usuario['imagem']; ?> -->
</div>

<div class="conteudo-noticia">

<?php echo $row_usuario['textoNoticia']; ?>
</div>
</div>

<footer>
<?php include 'rodape.php' ?>
</footer>

</body>
</html>
