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
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>
        <b style="display: none"><?php
            include 'index.php';
            include '../baseDatos/audioBD.php'
            ?></b>
        <!--<div id="wrapper">
            <div id="index">
                <h1 style="margin-bottom: 0.05em;">Musica y</h1>
                <h1>&nbsp;&nbsp;&nbsp;&nbsp;Señal en Vivo</h1>
                <div>
                    <a href="index.php"> Inicio</a><br/>

                    <a href="peliculasPlayer.php"> Peliculas</a><br/>

                    <a href="musicaRadioPlayer.php"> Musica y radios</a><br/>

                    <?php
                    /*if ($_SESSION['cat'] != 'invitado') {
                        echo '<a href="audioform.php"> Subir audio</a><br/>';
                        echo '<a href="videoform.php"> Subir video </a><br/>';
                    }
                    ?>
                    <?php
                    if ($_SESSION['cat'] == 'admin') {
                        echo '<a href="usuarioform.php"> Crear usuario</a></br>';
                    }*/
                    ?>

                    <a href="../progra/cerrar.php">salir</a>
                </div>
            </div> -->
            <div id="center-side" center>
                <form method="post" action="musicaRadioPlayer.php" id="selector" name="selector">
                            <select name="audio">
                                <?php
                                $listaAud = listaAudios();
                                foreach ($listaAud as $audio) {
                                    echo '<option value=' . $audio['id_audio'] . '>' . $audio['titulo'] . '</option>';
                                }
                                ?>
                            </select><br/>
                            <input type="submit" value="reproducir"/>
                        </form>
                        <?php
                        if ($_POST) {
                            $dir = recoverDirectory($_POST['audio']);
                            $image = recoverThumbnail($_POST['audio']);
                            echo '<script type="text/javascript">
                            var audioSelector = document.querySelector("#selector");
                            audioSelector.style.display="none";
                        </script>';
                            echo '<br/>';
                            echo '<img src="'.$image.'" alt="imagen no disponible" width="40%" heigth="40%"/>';
                            echo '<br/>';
                            echo '<audio controls autoplay> <source src=' . $dir. ' type="audio/mpeg"></audio>';
                        }
                        ?>
            </div>
        <!--</div>-->
        <footer id="footer">
            <ul class="copyright">
                <li>&copy; Jacri.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
        <script src="assets/js/main.js"></script>
    </body>
</html>
