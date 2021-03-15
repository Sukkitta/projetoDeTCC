<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" ? />
    <link rel="stylesheet" href="css/exibirFunc.css" />
    <title></title>
</head>

<body>
    <header>
        <?php include 'menu-servico.php' ?>
    </header>
    <h1>Listar Funcionarios</h1>
    <?php
    mysqli_select_db($conexao, 'tcc')  or die('Não foi possível conectar');
    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //Setar a quantidade de itens por pagina
    $qnt_result_pg = 3;
    //calcular o inicio da vizualicacao
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $sql = "select  * from funcionario LIMIT $inicio, $qnt_result_pg";

    $result_usuario = mysqli_query($conexao, $sql);

    while ($row_usuario = mysqli_fetch_assoc($result_usuario)) {

        echo "nome: " . $row_usuario['nome'] . "<br>";
        echo "cpf: " . $row_usuario['cpf'] . "<br>";
        echo "email: " . $row_usuario['email'] . "<br>";
        echo "usuario: " . $row_usuario['usuario'] . "<br>";
        echo "<a href ='editarFuncionario.php?id=" . $row_usuario['id'] . "'>Editar</a><br><hr>";
    }
    //Paginção - Somar a quantidade de usuários
    $result_paginacao = "SELECT COUNT(id) AS num_result FROM funcionario";
    $resultado_paginacao = mysqli_query($conexao, $result_paginacao);
    $row_paginacao = mysqli_fetch_assoc($resultado_paginacao);
    // teste para saber qts  id existe no banco
    //echo $row_paginacao['num_result'];

    //Quantidade de pagina
    $quantidade_paginacao = ceil($row_paginacao['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 2;
    echo "<a href='exibirFuncionario.php?pagina=1'>Primeira</a> ";
    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            echo "<a href='exibirFuncionario.php?pagina=$pag_ant'>$pag_ant</a> ";
        }
    }

    echo "$pagina ";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if ($pag_dep <= $quantidade_paginacao) {
            echo "<a href='exibirFuncionario.php?pagina=$pag_dep'>$pag_dep</a> ";
        }
    }
    echo "<a href='exibirFuncionario.php?pagina=$quantidade_paginacao'>Ultima</a> ";

    ?>
</body>

</html>