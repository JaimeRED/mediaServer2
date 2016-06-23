<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>inicio</title>
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>
        <div id="index">
            <?php
            session_start();
            if ($_SESSION) {
                ?>
                <h1 style="margin-bottom: 0.05em;">Bienvenido</h1>
                <h1>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre'] ?></h1>
                <div>
                    <a href="index.php"> Inicio</a><br/>

                    <a href="peliculasPlayer.php"> Peliculas</a><br/>

                    <a href="musicaRadioPlayer.php"> Musica y radios</a><br/>

                    <?php
                    if ($_SESSION['cat'] != 'invitado') {
                        echo '<a href="audioform.php"> Subir audio</a><br/>';
                        echo '<a href="videoform.php"> Subir video </a><br/>';
                    }
                    ?>
                    <?php
                    if ($_SESSION['cat'] == 'admin') {
                        echo '<a href="usuarioform.php"> Crear usuario</a></br>';
                    }
                    ?>

                    <a href="../progra/cerrar.php">salir</a>
                </div>
                <?php
            } else {
                header('Location: login.php');
            }
            ?>
        </div>
        <footer id="footer">
            <ul class="copyright">
                <li>&copy; Jacri.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
        <script src="assets/js/main.js"></script>
    </body>
</html>
