<?php include('conexao.php');
mysqli_select_db($conexao, 'tcc')
//recebendo id da pagina listar Funcionarios

?>
<!DOCTYPE html>


<html>

<head>

    <meta charset="UTF-8" />
    <!-- teg viewport  ele dizendo q codigo e adaptavel -->

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro funcionario</title>
    <link rel="stylesheet" href="assets/css/cadastro_funcionario.css" />
</head>

<body>
    <header>
        <?php include 'menu-servico.php' ?>
        <style> 
        .menu {
            margin-top: -5px;
        }
        </style>
    </header>

    <form id="form" action="cadastro-Func.php" method="POST" enctype="multipart/form-data">
        <div class="principal">

            <h1>Cadastro funcionario</h1>
            <div class="primario">
                <fieldset>
                    <legend>Dados Pessoais</legend>

                    <table>
                        <tr>
                            <td><label>Nome Completo:</label></td>
                            <td><input type="text" name="nome" placeholder="Seu nome"></td>
                            <td><label for="cpf">Cpf:</label></td>
                            <td><input type="text" name="cpf"></td>
                        </tr>
                        <tr>
                            <td><label for="tel">Telefone:</label></td>
                            <td> <input type="text" name="tel" id="tel"></td>
                            <td><label for="cel">Celular:</label></td>
                            <td><input type="text" name="cel" id="cel"></td>

                        </tr>
                        <tr>
                            <td><label>Sexo:</label></td>
                            <td>Masculino
                                <input type="radio" id="masc" value="M" name="sexo">
                                Feminino
                                <input type="radio" id="fem" value="F" name="sexo">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="secundario">
                <fieldset>

                    <legend>Função:</legend>

                    <table>
                       
                        <tr>
                            <td><label>Cargo:</label></td>
                            <td>
                                <select name="id_cargo">
                                <?php
                                $cargo_nome = "<option value='0'>--Selecione um cargo--</option><br/>";
                                $sql_cargo = "Select * from cargo";

                                $rs_cargo = mysqli_query($conexao, $sql_cargo);
                                while ($row_cargo = mysqli_fetch_assoc($rs_cargo)) {


                                    $cargo_nome = $cargo_nome . "<option value='" . $row_cargo['id'] . "'>" . $row_cargo['cargo_nome'] . "</option><br/>";
                                }
                                print $cargo_nome;
                                ?>
                                </select>
                            </td>
                            <td><label for="email">E-mail:</label></td>
                            <td><input type="text" name="email" id="email"></td>
                        </tr>
                        <tr>
                            <td><label for="login">Login:</label></td>
                            <td><input type="text" name="usuario" id="usuario"></td>
                            <td><label for="senha">Senha:</label></td>
                            <td><input type="password" name="senha" id="senha"></td>

                        </tr>
                        <tr>
                            <td><label for="datAdm">Data de Admissão:</label></td>
                            <td><input type="date" name="datAdm"></td>

                        </tr>
                    </table>

                </fieldset>
            </div>
            <div class="alinhar-centro" id="alinhar-centro">
                <button class="teste"><a type="submit" class="btn btn-cadastrar">Cadastrar</a></button>
                <a class="btn btn-voltar" href="index.php">Voltar</a>


            </div>


        </div>
    </form>

</body>

</html>