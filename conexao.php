<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "tcc";

$conexao =  mysqli_connect($host, $user, $senha, $banco) or die('Não foi possível conectar');

// pra testa se tava inserindo no banco se tava tentando conexao
//mysqli_query($conexao, "Create table estado (
//  codigo serial not null,
//nome varchar (50),
//primary key (codigo)
//);");
