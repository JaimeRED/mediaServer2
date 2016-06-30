<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar fuente de audio</title>
        <link rel="stylesheet" href="http://localhost/mediaServer2/assets/css/main.css" />
    </head>
    <body>
        <?php
        session_start();
        if ($_SESSION) {
            ?>
            <div id="wrapper">
                <div id="index">
                    <h1 style="margin-bottom: 0.05em;">Nuevo</h1>
                    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Usuario</h1>
                    <div>
                        <a href="http://localhost/mediaServer2/index.php"> Inicio</a><br/>

                        <a href="peliculasPlayer.php"> Peliculas</a><br/>

                        <a href="http://localhost/mediaServer2/index.php/Audio_control/index"> Musica y radios</a><br/>

                        <?php
                        if ($_SESSION['categoria'] != 'invitado') {
                            echo '<a href="http://localhost/mediaServer2/index.php/Audio_control/upload"> Subir audio</a><br/>';
                            echo '<a href="videoform.php"> Subir video </a><br/>';
                        }
                        ?>
                        <?php
                        if ($_SESSION['categoria'] == 'admin') {
                            echo '<a href="http://localhost/mediaServer2/index.php/Usuario_control/index"> Menu usuario</a></br>';
                        }
                        ?>

                        <a href="<?php base_url() ?>index.php/Landing_page/logout">salir</a>
                    </div>
                </div>
                <div id="center-side">
                    <form method="post" action="http://localhost/mediaServer2/index.php/Audio_control/upload" enctype="multipart/form-data">
                        Titulo <input type="text" name="nombre""/><br/>
                        <label>Choose File</label>
                        <input type="file" name="file" />
                        <br/>
                        <input type="submit" name="GUARDAR" value="Upload"/>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
        <footer id="footer">
            <ul class="copyright">
                <li>&copy; Jacri.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
        <script src="assets/js/main.js"></script>
    </body>
</html>