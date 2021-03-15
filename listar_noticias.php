<?php
include "conexao.php";


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/listar_noticias.css">
</head>

<body>

    <header>
        <?php include "menu-servico.php" ?>
    </header>
    <h1>Listar Noticia</h1>


    <div class="container">
        <?php
        mysqli_select_db($conexao, 'tcc');
        //Receber o numero da pagina
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantida de itens por pagina
        $qnt_result_pg = 6;

        //calcular o inicio da vizulicao
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $sql = "select * from noticias LIMIT $inicio, $qnt_result_pg";

        $resultado = mysqli_query($conexao, $sql);

        if (($resultado) and ($resultado->num_rows != 0)) {

            while ($row_usuario = mysqli_fetch_assoc($resultado)) {
        ?>
                <table>

                    <tr>

                        <div class="while">
                    <?php
                    echo $row_usuario['tituloNoticia'] . "<br>";
                    echo $row_usuario['textoNoticia'] . "<br>";
                }
            } else {
                echo "nenhuma Noticia Encontrada";
            }
                    ?>
                        </div>

                    </tr>
                </table>
    </div>

</body>

</html>