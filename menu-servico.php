<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel="stylesheet" href="assets/css/menu-rodape-servico.css">
</head>
<body>
    <div class="card">
        <form action="">
            <header>
                <main>
                    <div class="menu-primario">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo.png">
                        </div>
                        <div class="rede-sociais">
                            <ul>
                                <li><a href=""><img src="assets/img/facebook.png" /></a></li>
                                <li><a href=""><img src="assets/img/twitter.png" /></a></li>
                                <li><a href=""><img src="assets/img/linkdin.png" /></a></li>
                                <li><a href=""><img src="assets/img/youtube.png" /></a></li>
                            </ul>
                        </div>

                    </div>
                </main>
                <main class="col-100">
                    <div class="menu-secundario">
                        <div class="menu">
                            <div class="menu-opcao">
                                <ul>
                                    <li><a href="cadastrarFuncionario.php">Cadastrar Funcionario</a></li>
                                    <li><a href="cadastrarNoticia.php">Cadastrar Noticia</a></li>
                                </ul>
                            </div>
                            <!-- <div class="busca">
                                <input type="text" name="buscar" id="busca" placeholder="Buscar..">
                            </div> -->
                            <div class="usuario-logado">
                                <h4>Olá, <?php echo $_SESSION['usuario']; ?><h4>
                                        <h4><a href="logout.php">Logout</a>
                                            <h4 id="testi">
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                if (isset($_SESSION['usuario_existe'])) :
                ?>
                    <div class="cadastro-sucesso">
                        <p>Usuario Cadastrado Com Sucesso</p>
                    </div>
                <?php
                    unset($_SESSION['usuario_existe']);
                endif;
                ?>
                <?php
                if (isset($_SESSION['alterado_usuario'])) :
                ?>
                    <div class="cadastro-sucesso">
                        <p>Usuario Alterado Com Sucesso</p>
                    </div>
                <?php
                    unset($_SESSION['alterado_usuario']);
                endif;
                ?>
                <?php
                if (isset($_SESSION['noticia_cadastrada'])) :
                ?>
                    <div class="cadastro-sucesso">
                        <p>Notícia Cadastrada Com Sucesso</p>
                    </div>
                <?php
                    unset($_SESSION['noticia_cadastrada']);
                endif;
                ?>
                <?php
                if (isset($_SESSION['alterado_noticia'])) :
                ?>
                    <div class="cadastro-sucesso">
                        <p>Notícia Alterado com Sucesso</p>
                    </div>
                <?php
                    unset($_SESSION['alterado_noticia']);
                endif;
                ?>
                <?php
                if (isset($_SESSION['excluir_noticia'])) :
                ?>
                    <div class="excluido-sucesso">
                        <p>Notícia Excluida com Sucesso</p>
                    </div>
                <?php
                    unset($_SESSION['excluir_noticia']);
                endif;
                ?>
            </header>
        </form>

    </div>

</body>

</html>
