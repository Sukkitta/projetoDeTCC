<?php
include('conexao.php');
mysqli_select_db($conexao, 'tcc') or die('Não foi possível conectar');

//recebendo id da pagina listar Funcionarios
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "select * from funcionario where id ='$id'";
$result_usuario = mysqli_query($conexao, $result);
$row_usuario = mysqli_fetch_array($result_usuario);
$id_cargo = $row_usuario['id_cargo'];
$sexo = $row_usuario['sexo'];

//recebe nome do a Cargo pelo id_cargo
$resulto_cargo = "select * from cargo where id ='$id_cargo'";
$resulto_nomeCargo = mysqli_query($conexao, $resulto_cargo);
$row_nomeCargo = mysqli_fetch_array($resulto_nomeCargo);
$nome_Cargo = $row_nomeCargo['cargo_nome'];


?>
<!DOCTYPE html>


<html>

<head>

    <meta charset="UTF-8" />
    <!-- teg viewport  ele dizendo q codigo e adaptavel -->

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar cadastro funcionario</title>
    <link rel="stylesheet" href="assets/css/cadastro_funcionario.css" />
</head>

<body>
    <header>
        <?php include 'menu-servico.php' ?>
    </header>

    <form id="form" action="edit_func.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>">
        <div class="principal">

            <h1>Editar cadastro funcionario</h1>
            <div class="primario">
                <fieldset>
                    <legend>Dados Pessoais</legend>

                    <table>
                        <tr>
                            <td><label>Nome Completo:</label></td>
                            <td><input type="text" name="nome" placeholder="Seu nome" value="<?php echo $row_usuario['nome'] ?>"></td>
                            <td><label for="cpf">Cpf:</label></td>
                            <td><input type="text" name="cpf" value="<?php echo $row_usuario['cpf'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="tel">Telefone:</label></td>
                            <td> <input type="text" name="tel" id="tel" value="<?php echo $row_usuario['tel'] ?>"></td>
                            <td><label for="cel">Celular:</label></td>
                            <td><input type="text" name="cel" id="cel" value="<?php echo $row_usuario['cel'] ?>"></td>

                        </tr>
                        <tr>
                            <td><label>Sexo:</label></td>
                            <td>
                              <?php
                              if ($sexo == "M") {
                                ?>
                                <input type="radio" id="masc" value="M" name="sexo" checked> Masculino
                                <input type="radio" id="fem" value="F" name="sexo"> Feminino
                                <?php
                              } else {
                                ?>
                                <input type="radio" id="masc" value="M" name="sexo"> Masculino
                                <input type="radio" id="fem" value="F" name="sexo" checked>Feminino
                                <?php
                              }
                              ?>
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
                                      $sql_cargo = "Select * from cargo";
                                      echo "<option value ='" . $id_cargo . "'>" . $nome_Cargo . "</option>";
                                      echo "<option value='0'>--Selecione um Cargo--</option><br/>";
                                      $rs_cargo = mysqli_query($conexao, $sql_cargo);
                                      while ($row_cargo = mysqli_fetch_assoc($rs_cargo)) {
                                          $cargo_nome = $cargo_nome . "<option value='" . $row_cargo['id'] . "'>" . $row_cargo['cargo_nome'] . "</option><br/>";
                                      }
                                      print $cargo_nome;
                                      ?>
                                </select>
                            </td>
                            <td><label for="email">E-mail:</label></td>
                            <td><input type="text" name="email" id="email" value="<?php echo $row_usuario['email'] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="login">Login:</label></td>
                            <td><input type="text" name="usuario" id="usuario" value="<?php echo $row_usuario['usuario'] ?>"></td>
                            <td><label for="senha">Senha:</label></td>
                            <td><input type="password" name="senha" id="senha" value="<?php echo $row_usuario['senha'] ?>"></td>


                        </tr>
                        <tr>
                            <td><label for=" datAdm">Data de Admissão:</label></td>
                            <td><input type="date" name="datAdm" value="<?php echo $row_usuario['datAdm'] ?>"></td>

                        </tr>
                    </table>

                </fieldset>
            </div>
            <div class="alinhar-centro" id="alinhar-centro">
                <button class="teste"><a type="submit" class="btn btn-cadastrar">Atualizar</a></button>
                <a class="btn btn-voltar" href="index.php">Voltar</a>


            </div>


        </div>
    </form>

</body>

</html>
