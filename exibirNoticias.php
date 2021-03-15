<?php
include('conexao.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="assets/css/bootstrap.css" />

</head>

<body>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php mysqli_select_db($conexao, 'tcc');

                //Receber o número da página
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //Setar a quantidade de itens por pagina
                $qnt_result_pg = 6;
                //calcular o inicio da vizualicacao
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                $sql = "select  * from noticias LIMIT $inicio, $qnt_result_pg";

                $result = mysqli_query($conexao, $sql);

                while ($linha_usuario = mysqli_fetch_assoc($result)) {

                ?>


                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">

                            <div class="card-body">
                                <p class="card-text h5"><?php echo $linha_usuario['tituloNoticia'] ?></p>
                                <p class="card-text"><?php echo $linha_usuario['textoNoticia'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo "<a href ='editarNoticia.php?id=" . $linha_usuario['id'] . "'>Editar</a>"; ?></button>
                                    </div>
                                    <small class=" text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>


        </div>
    </div>


    <script type="text/javascript" src="./tcc/assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="./tcc/assets/js/jquery-3.5.1.min.js"></script>
</body>

</html>