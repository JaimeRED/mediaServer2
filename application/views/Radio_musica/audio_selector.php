<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Musica y Radios</title>
        <link rel="stylesheet" href="http://localhost/mediaServer2/assets/css/main.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="index">
                <h1 style="margin-bottom: 0.05em;">Musica y</h1>
                <h1>&nbsp;&nbsp;&nbsp;&nbsp;Señal en Vivo</h1>
                <div>
                    <a href="http://localhost/mediaServer2/index.php"> Inicio</a><br/>

                    <a href="peliculasPlayer.php"> Peliculas</a><br/>

                    <a href="../Audio_control/index"> Musica y radios</a><br/>

                    <?php
                    if ($_SESSION['categoria'] != 'invitado') {
                        echo '<a href="audioform.php"> Subir audio</a><br/>';
                        echo '<a href="videoform.php"> Subir video </a><br/>';
                    }
                    ?>
                    <?php
                    if ($_SESSION['categoria'] == 'admin') {
                        echo '<a href="http://localhost/mediaServer2/index.php/Usuario_control/index"> Crear usuario</a></br>';
                    }
                    ?>

                    <a href="http://localhost/mediaServer2/index.php/Landing_page/logout">salir</a>
                </div>
            </div>
            <div id="center-side" center>
                <form method="post" action="player" name="selector">
                    <?php
                    foreach ($lAudio as $audio) {
                        echo '<input type="radio" value="' . $audio->id_audio . '" name="audio"/><image src="http://localhost/mediaServer2/' . $audio->dir_imagen . '" alt="' . $audio->titulo . '" width="25%" heigth="25%"/><br/><br/>';
                    }
                    ?>
                    <br/>
                    <button type='submit' style='float: right; margin-top: -6em; margin-right: 20em'>Escuchar</button>
                </form>
            </div>
        </div>
        <footer id="footer">
            <ul class="copyright">
                <li>&copy; Jacri.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
        <script src="http://localhost/mediaServer2/assets/js/main.js"></script>
    </body>
</html>
