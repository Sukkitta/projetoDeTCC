<?php
session_start();
//pegando conexao com banco
include('conexao.php');

//verificando se cliente digitou no campo usuario e senha empty=vazio
if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    //redireciona para inicio no caso aki volta pra pagina login.php
    header('Location: login.php');
    exit();
}
//essa funcao mysqli_real_escape_string protege contra ataque mysql inject
// contra nosso login e  faz alguma validacoes
//passando primeiro campo a nossa conexao e segundo campo dados pegando nos campo usuario e senha
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario from funcionario where usuario = '{$usuario}' and senha = ('{$senha}')";


$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: login.php');
    exit();
}
