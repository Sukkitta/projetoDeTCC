<?php include('conexao.php');
mysqli_select_db($conexao, 'tcc') or die('Não foi possível conectar');

//recebendo id da pagina listar Funcionarios
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "select * from noticias where id ='$id'";
$result_usuario = mysqli_query($conexao, $result);
$row_usuario = mysqli_fetch_array($result_usuario);
$id_func = $row_usuario['id_funcionario'];
$id_cate = $row_usuario['id_categoria'];


//recebe nome do func pelo id_funcionario
$resulto_func = "select * from funcionario where id ='$id_func'";
$resulto_nome = mysqli_query($conexao, $resulto_func);
$row_nome = mysqli_fetch_array($resulto_nome);
$nome_func = $row_nome['nome'];

//recebe nome do da Categoria pelo id_categoria
$resulto_cate = "select * from categorias where id ='$id_cate'";
$resulto_nomeCate = mysqli_query($conexao, $resulto_cate);
$row_nomeCate = mysqli_fetch_array($resulto_nomeCate);
$nome_Cate = $row_nomeCate['cat_nome'];




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <Ttile>

        <link rel="stylesheet" href="assets/css/cad_noticias.css">
    </Ttile>

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
    <form action="edit_not.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id'] ?>">
        <div class="corpo">
            <div class="Conteudo">
                <h1>Editar Noticia</h1>
                <table>

                    <tr>
                        <td><label>Categoria:</label></td>
                        <td><select name="id_categoria">
                                <?php

                                $sql_cat = "Select * from categorias";
                                echo "<option value ='" . $id_cate . "'>" . $nome_Cate . "</option>";
                                echo "<option value='0'>--Selecione uma categoria--</option><br/>";
                                $rs_cat = mysqli_query($conexao, $sql_cat);
                                while ($row_cat = mysqli_fetch_assoc($rs_cat)) {


                                    $cat_nome = $cat_nome . "<option value='" . $row_cat['id'] . "'>" . $row_cat['cat_nome'] . "</option><br/>";
                                }
                                print $cat_nome;
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Titulo da Noticia:</label></td>
                        <td><input type="text" name="tituloNoticia" value="<?php echo $row_usuario['tituloNoticia'] ?>" style="width:400px"></td>
                    </tr>
                    <tr>
                        <td><label>Autor da Matéria:</label></td>
                        <td><select name="id_funcionario">
                                <?php

                                $sql_func = "select * from funcionario Where id_cargo = '2'";
                                echo "<option value ='" . $id_func . "'>" . $nome_func . "</option>";
                                echo "<option value='0'>-------Selecione o Autor-------</option><br/>";
                                $rs_func = mysqli_query($conexao, $sql_func);
                                while ($row_func = mysqli_fetch_array($rs_func)) {
                                    

                                    $func_nome = $func_nome . "<option value='" . $row_func['id'] . "'>" . $row_func['nome'] . "</option><br/>";
                                }
                                print $func_nome;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dataMateria">Data da Matéria: </label></td>
                        <td><input type="date" name="datMateria" id="datMateria" value="<?php echo $row_usuario['datMateria'] ?>" /></td>
                    </tr>
                    <tr>
                        <td><label>Imagem: </label></td>
                        <td><input type="file" name="imagem" id="imagem" value="<?php echo $row_usuario['imagem'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Descrição da Noticia: </label></td>
                        <td> <textarea name="textoNoticia" rows="10" cols="40"><?php echo $row_usuario['textoNoticia'] ?></textarea></td>
                    </tr>

                </table>

            </div>
            <div class="alinhar-centro" id="alinhar-centro">
                <button class="botao"><a type="submit" class="btn btn-cadastrar">Atualizar</a></button>
                <a class="btn btn-voltar" href="index.php">Voltar</a>
                <a type="submit" class="btn btn-delete" href="excluir-noticia.php?id=<?php echo $row_usuario['id'] ?>">Excluir</a>


            </div>
        </div>
    </form>

</body>

</html>