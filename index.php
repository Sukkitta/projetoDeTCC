<?php
include('conexao.php');
?>
<html>
<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/exibir_index.css" />
		<script src='assets/script.js'></script>
	</head>
    <body>
    <header>
    <?php include 'menu-servico.php'; ?>

    </header>
        <?php
        mysqli_select_db($conexao, 'tcc');

                //Receber o número da página
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //Setar a quantidade de itens por pagina
                $qnt_result_pg = 6;
                //calcular o inicio da vizualicacao
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                $sql = "SELECT * from noticias ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";

                $result = mysqli_query($conexao, $sql);
                ?>
                <div class="container">
									<style>
									.noticias--box {
										box-sizing: border-box;
									}
									</style>
                <?php
                while($linha_usuario = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="noticias--box">
                        <h1><?php echo $linha_usuario['tituloNoticia'];?></h1>
                        <p><?php echo $linha_usuario['textoNoticia'];?></p>
                        <h3>Categoria:<?php
                        $id_cate = $linha_usuario['id_categoria'];
                        $resulto_cate = "select * from categorias where id ='$id_cate'";
                        $resulto_nomeCate = mysqli_query($conexao, $resulto_cate);
                        $row_nomeCate = mysqli_fetch_array($resulto_nomeCate);
                        $nome_Cate = $row_nomeCate['cat_nome'];
                        echo $nome_Cate;?></h3>
                        <a type="submit" class="btn btn--noticias" href="editarNoticia.php?id=<?php echo $linha_usuario['id'];?>"> Acessar</a>
                    </div>
                <?php
                }
                ?>
                </div>
                <?php
                //Paginacao - SOmar a quantidade de noticias
                $result_paginacao = "SELECT COUNT(id) AS num_result FROM noticias";
                $resultado_paginacao = mysqli_query($conexao,$result_paginacao);
                $row_paginacao = mysqli_fetch_assoc($resultado_paginacao);

                $quantidade_paginacao = ceil($row_paginacao['num_result'] / $qnt_result_pg);

                //limitar os link antes e depois
                $max_link = 1;
                ?>
                <div class="container">
                <div class="conteiner_paginacao">

                <a class="paginacao simbolo" href="index.php?pagina=1"><</a>
                    <?php
                     for($pag_ant = $pagina - $max_link; $pag_ant <= $pagina -1; $pag_ant++){
                        if($pag_ant >= 1){
                        ?>
                        <a class="paginacao active" href="index.php?pagina=<?php echo $pag_ant;?>"><?php echo $pag_ant;?></a>
                        <?php

                        }
                    }
                    echo "$pagina";
                    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_link; $pag_dep++) {
                    if ($pag_dep <= $quantidade_paginacao) {
                        ?>
                        <a class="paginacao" href="index.php?pagina=<?php echo $pag_dep;?>"><?php echo $pag_dep;?></a>
                        <?php
                    }
                    }
                    ?>
                    <a class="paginacao simbolo" href="index.php?pagina=<?php echo $quantidade_paginacao;?>">></a>
                </div>
                </div>
</body>
</html>
