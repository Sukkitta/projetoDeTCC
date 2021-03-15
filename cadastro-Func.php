<?php
session_start();
require('conexao.php');

mysqli_select_db($conexao, 'tcc') or die('Não foi possível conectar');


$nome  = trim($_POST['nome']);
$cpf   = trim($_POST['cpf']);
$email = trim($_POST['email']);
$sexo  = trim($_POST['sexo']);
$tel   = trim($_POST['tel']);
$cel = trim($_POST['cel']);
$id_cargo = $_POST['id_cargo'];
$datAdm = date('Y-m-d');
$datDem = date('Y-m-d');
$usuario = trim($_POST['usuario']);
$senha = trim($_POST['senha']);


if (empty($usuario) || empty($senha)) {
    header('Location: cadastrarFuncionario.php');
    exit();
}

$sql = "INSERT INTO funcionario (nome, cpf, sexo, tel, cel, id_cargo, datAdm, datDem, usuario, senha, email) 
values ('$nome', '$cpf', '$sexo', '$tel', '$cel', '$id_cargo', '$datAdm', '', '$usuario', '$senha', '$email')";

$query = mysqli_query($conexao, $sql);

$row = mysqli_num_rows($query);

if ($row = 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: menu-servico.php');
    exit();
}
