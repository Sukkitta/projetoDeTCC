<!DOCTYPE html>
<?php require_once('conexao.php'); ?>
<httml>

    <head>
        <link rel="stylesheet" href="assets/css/telaInicial.css">
    </head>

    <body>
        <header>
        <?php include 'cabecalho.php' ?>
        <script>
            function exibirNoticia(id) {
                document.formexibenot.id.value=id;
                document.formexibenot.submit();
            }
        </script>
        </header>
        <main>
            <?php
            mysqli_select_db($conexao, 'tcc');

            //Receber o número da pagina
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //setar a quantidade de itens por pagina
            $qnt_result_pg = 7;

            //calcular o inicio da vizualicação
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $sql = "SELECT * from noticias ORDER BY id DESC LIMIT $inicio, $qnt_result_pg ";

            $result = mysqli_query($conexao, $sql);
            ?>
            <div class="lado-direito">
            <div class="titulo-conteudo">
                <h2> Últimas Notícias</h2>

            </div>

                <?php while ($linha_usuario = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="noticia">
                        <div class="noticia-imagem" onclick="exibirNoticia(<?php echo $linha_usuario['id'];?>)">
                                <img src="imageView.php?image_id=<?php echo $linha_usuario['id']; ?>" />
                                <!-- <img src="assets/img/teste1.png" width="300" height="240">
                                <?php echo $linha_usuario['imagem']; ?> -->
                            </a>
                        </div>
                        <div class="testando">
                            <div class="cate">
                                <?php
                                $id_cate = $linha_usuario['id_categoria'];
                                $resulto_cate = "select * from categorias where id ='$id_cate'";
                                $resulto_nomeCate = mysqli_query($conexao, $resulto_cate);
                                $row_nomeCate = mysqli_fetch_array($resulto_nomeCate);
                                $nome_Cate = $row_nomeCate['cat_nome'];


                                echo $nome_Cate; ?>
                            </div>
                            <div class="titulo" onclick="exibirNoticia(<?php echo $linha_usuario['id'];?>)">
                                <?php echo $linha_usuario['tituloNoticia']; ?>
                            </div>
                            <div class="texto" onclick="exibirNoticia(<?php echo $linha_usuario['id'];?>)">
                                <?php echo mb_strimwidth($linha_usuario['textoNoticia'], 0, 40, '...'); ?>
                            </div>

                            <?php
                            $id_autor = $linha_usuario['id_funcionario'];
                            $result_autor = "SELECT * from funcionario WHERE id = $id_autor";
                            $result_nomeAutor = mysqli_query($conexao, $result_autor);
                            $row_autor = mysqli_fetch_array($result_nomeAutor);
                            $nome_autor = $row_autor['nome'];
                            ?>
                            <div class="alinha" onclick="exibirNoticia(<?php echo $linha_usuario['id'];?>)">
                                    <ul>
                                        <li class="autor-noticia"><?php echo $nome_autor; ?></li>
                                        <li class="dat-noticia"><?php echo dataUStoBR($linha_usuario['datMateria']); ?></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="alinhar-centro">
                    <button class="botao"><a href="mais-noticias.php" class="btn btn-maisNoticia">Todas Noticias</a></button>

                </div>
            </div>
        </main>
        <form action="noticia.php" id="formexibenot" name="formexibenot" method="post">
          <input type="hidden" name="id">
        </form>
        <footer>
        <?php include 'rodape.php' ?>
    </footer>
    </body>
</httml>
