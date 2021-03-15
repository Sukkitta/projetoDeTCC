<!DOCTYPE html>
<?php require_once('conexao.php'); ?>

<html>

<head>
    <link rel="stylesheet" href="assets/css/teste.css" />
</head>

<body>
    <header>
        <?php include 'cabecalho.php' ?>
        <script>
            function exibirNoticia(id) {
                document.formexibenot.id.value = id;
                document.formexibenot.submit();
            }
        </script>
    </header>
    <h2>Notícias: Free Fire</h2>

    <?php
    mysqli_select_db($conexao, 'tcc');

    //Receber o número da pagina
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //setar a quantidade de itens por pagina
    $qnt_result_pg = 9;

    //calcular o inicio da vizualicação
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $sql = "SELECT * from noticias  WHERE id_categoria ='3' ORDER BY id DESC LIMIT $inicio, $qnt_result_pg ";

    $result = mysqli_query($conexao, $sql);
    ?>
    <div class="container">


        <?php while ($linha_usuario = mysqli_fetch_assoc($result)) {
        ?>
            <div class="noticias">
            <div class="noticia-imagem" onclick="exibirNoticia(<?php echo $linha_usuario['id']; ?>)">
                    <img src="imageView.php?image_id=<?php echo $linha_usuario['id']; ?>" />

                </div>
                <div class="titulo" onclick="exibirNoticia(<?php echo $linha_usuario['id']; ?>)">
                    <?php echo $linha_usuario['tituloNoticia']; ?></div>
                <?php
                $id_autor = $linha_usuario['id_funcionario'];
                $result_autor = "SELECT * from funcionario WHERE id = $id_autor";
                $result_nomeAutor = mysqli_query($conexao, $result_autor);
                $row_autor = mysqli_fetch_array($result_nomeAutor);
                $nome_autor = $row_autor['nome'];
                ?>

                <div class="alinha" onclick="exibirNoticia(<?php echo $linha_usuario['id']; ?>)">
                        <ul>
                            <li class="autor-noticia"><?php echo $nome_autor; ?></li>
                            <li class="dat-noticia"><?php echo dataUStoBR($linha_usuario['datMateria']); ?></li>
                        </ul>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
    //Paginacao - SOmar a quantidade de noticias
    $result_paginacao = "SELECT COUNT(id) AS num_result FROM noticias WHERE id_categoria ='1'";
    $resultado_paginacao = mysqli_query($conexao, $result_paginacao);
    $row_paginacao = mysqli_fetch_assoc($resultado_paginacao);

    $quantidade_paginacao = ceil($row_paginacao['num_result'] / $qnt_result_pg);

    //limitar os link antes e depois
    $max_link = 1;
    ?>
    <div class="container-2">
        <div class="conteiner_paginacao">

            <a class="paginacao simbolo" href="freefire.php?pagina=1"><</a>
                    <?php
                    for ($pag_ant = $pagina - $max_link; $pag_ant <= $pagina - 1; $pag_ant++) {
                        if ($pag_ant >= 1) {
                    ?>
                            <a class="paginacao active" href="freefire.php?pagina=<?php echo $pag_ant; ?>"><?php echo $pag_ant; ?></a>
                        <?php

                        }
                    }
                    echo "$pagina";
                    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_link; $pag_dep++) {
                        if ($pag_dep <= $quantidade_paginacao) {
                        ?>
                            <a class="paginacao" href="freefire.php?pagina=<?php echo $pag_dep; ?>"><?php echo $pag_dep; ?></a>
                    <?php
                        }
                    }
                    ?>
                    <a class="paginacao simbolo" href="freefire.php?pagina=<?php echo $quantidade_paginacao; ?>">></a>
        </div>
    </div>
    <form action="noticia.php" id="formexibenot" name="formexibenot" method="post">
        <input type="hidden" name="id">
    </form>
    <footer>
        <?php include 'rodape.php' ?>
    </footer>
</body>

</html>