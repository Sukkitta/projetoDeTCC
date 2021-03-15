<?php require_once("conexao.php"); ?>
<html>

<head>
    <link rel="stylesheet" href="assets/css/menu-site.css">

</head>

<body>
    <?php
    function dataUStoBR ($dataUS) {
        // CONVERTE DATA DIGITADA EM FORMATO EUA AAAA-MM-DD para DD/MM/AAAA.
    
        $novadata = explode("-",$dataUS);
        for ($i = 0; $i <= 2;$i++) {
            if ($i == 0) { $ano = $novadata[$i]; }
            if ($i == 1) { $mes = $novadata[$i]; }
            if ($i == 2) { $dia = $novadata[$i]; }
        }
        $result = $dia . "/" . $mes . "/" . $ano;
        return $result;
    }
    
    function dataUStoBRbarra ($dataUS) {
        // CONVERTE DATA DIGITADA EM FORMATO EUA AAAA/MM/DD para DD/MM/AAAA.
    
        $novadata = explode("/",$dataUS);
        for ($i = 0; $i <= 2;$i++) {
            if ($i == 0) { $ano = $novadata[$i]; }
            if ($i == 1) { $mes = $novadata[$i]; }
            if ($i == 2) { $dia = $novadata[$i]; }
        }
        $result = $dia . "/" . $mes . "/" . $ano;
        return $result;
    }
    
    ?>
    <header class="menu-principal">
        <main>
            <div class="header-1">
                <div class="logo">
                    <a href="inicial.php"><img src="assets/img/logo.png" /> </a>

                </div>
                <div class="rede-sociais">
                    <ul>
                        <li><a href="https://www.facebook.com/"><img src="assets/img/facebook.png" /></a> </li>
                        <li><a href="https://twitter.com/home"><img src="assets/img/twitter.png" /></a></li>
                        <li><a href="https://www.linkedin.com/"><img src="assets/img/linkdin.png" /></a></li>
                        <li><a href="https://www.youtube.com/"><img src="assets/img/teste.png" /></a></li>

                    </ul>

                </div>
            </div>
        </main>

        <main class="col-100 menu-urls">
            <div class="header-3">
                <div class="menu">
                    <ul>
                        <li><a href="league-of-legends.php">Legue Of Legends</a></li>
                        <li><a href="csgo.php">CS: GO</a></li>
                        <li><a href="valorant.php">Valorant</a></li>
                        <li><a href="freefire.php">Free Fire</a></li>
                        <li><a href="tft.php">TFT</a></li>
                       <!-- <li><a href="">+Jogos</a></li> -->
                    </ul>
                </div>
               
            </div>
        </main>
    </header>

</body>

</html>