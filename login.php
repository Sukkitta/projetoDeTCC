<?php
session_start();
?>
<!DOCTYPE html>

<hml>

    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/login.css" />

    </head>

    <body>
        <div class="card">
            <form action="logado.php" method="POST">
                <img src="assets/img/userr.svg" alt="Login">
                <h1>Login</h1>
                <?php
                if (isset($_SESSION['nao_autenticado'])) :
                ?>
                    <div class="erro-login">
                        <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                <?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>
                <div>
                    <input type="text" placeholder="login" name="usuario" id="login">
                </div>
                <div>
                    <input type="password" placeholder="senha" name="senha" id="senha">
                </div>
                <div>
                    <button type="submit">Entrar</button>
                </div>
                

            </form>
        </div>
    </body>


</hml>