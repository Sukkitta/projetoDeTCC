<?php include('conexao.php');
mysqli_select_db($conexao, 'tcc')
//recebendo id da pagina listar Funcionarios

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
    <form action="cadastro-Noticia.php" method="POST" enctype="multipart/form-data">
        <div class="corpo">
            <div class="Conteudo">
                <h1>Cadastrar Noticia</h1>
                <table>

                    <tr>
                        <td><label>Categoria:</label></td>
                        <td><select name="id_categoria">
                                <?php
                                $cat_nome = "<option value='0'>--Selecione uma categoria--</option><br/>";
                                $sql_cat = "Select * from categorias";

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
                        <td><input type="text" name="tituloNoticia" style="width:400px"></td>
                    </tr>
                    <tr>
                        <td><label>Autor da Matéria:</label></td>
                        <td><select name="id_funcionario">
                                <option value='0'>--Selecione o Autor--</option><br />
                                <?php


                                $sql_func = "select * from funcionario where id_cargo='2'";
                                $rs_func = mysqli_query($conexao, $sql_func);

                                while ($row_func = mysqli_fetch_assoc($rs_func)) {

                                    $func_nome =  "<option value='" . $row_func['id'] . "'>" . $row_func['nome'] . "</option><br/>";
                                    print $func_nome;   
                                }
                                
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="dataMateria">Data da Matéria: </label></td>
                        <td><input type="date" name="datMateria" id="dataMateria" /></td>
                    </tr>
                    <tr>
                        <td><label>Imagem: </label></td>
                        <td><input type="file" name="imagem" id="imagem" value=""></td>
                    </tr>
                    <tr>
                        <td><label>Descrição da Noticia: </label></td>
                        <td> <textarea name="textoNoticia" rows="10" cols="40"></textarea></td>
                    </tr>

                </table>

            </div>
            <div class="alinhar-centro" id="alinhar-centro">
                <button class="botao"><a type="submit" class="btn btn-cadastrar">Cadastrar</a></button>
                <a class="btn btn-voltar" href="index.php">Voltar</a>


            </div>
        </div>
    </form>

</body>

</html>