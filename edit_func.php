<?php
require('conexao.php');
session_start();

mysqli_select_db($conexao, 'tcc') or die('Não foi possível conectar');

$id =  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome  = trim($_POST['nome']);
$cpf   = trim($_POST['cpf']);
$sexo  = trim($_POST['sexo']);
$tel   = trim($_POST['tel']);
$cel = trim($_POST['cel']);
$id_cargo = $_POST['id_cargo'];
$datAdm = date('Y-m-d');
$datDem = date('Y-m-d');
$usuario = trim($_POST['usuario']);
$senha = trim($_POST['senha']);
$email = trim($_POST['email']);

$sql = " update funcionario set nome='$nome', cpf='$cpf', sexo='$sexo', tel='$tel', cel='$cel', id_cargo='$id_cargo',
 datAdm='$datAdm', datDem='$datDem', usuario='$usuario', senha='$senha', email='$email' where id='$id'";

$query = mysqli_query($conexao, $sql);

//mysqli_affected_rows se ele afetou alguma linha significa que  ele altero
if (mysqli_affected_rows($conexao)) {
    $_SESSION['alterado_usuario'] = true;
    header("Location: menu-servico.php");
} else {

    header("Location: menu-servico.php");
}
