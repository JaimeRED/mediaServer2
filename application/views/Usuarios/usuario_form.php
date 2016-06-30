<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar/Editar Usuario</title>
        <link rel="stylesheet" href="http://localhost/mediaServer2/assets/css/main.css" />
    </head>
    <body>
        <?php
        session_start();
        if ($_SESSION) {
            if ($_SESSION['categoria'] == 'admin') {
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
                                echo '<a href="audioform.php"> Subir audio</a><br/>';
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
                        <form method="post" action="http://localhost/mediaServer2/index.php/Usuario_control/guardar_post/<?php echo $id_usuario?>">
                            Nombre <input type="text" name="nombre" value="<?php echo $nombre?>"/><br/>
                            Usuario <input type="text" name="usuario" value="<?php echo $username?>"/><br/>
                            Contraseña <input type="password" name="pwd" value="<?php echo $username?>" ><br/>
                            Categoria<br/>
                            <div id="radios">
                                <input type="radio" name="categoria" value="invitado"> Invitado<br/>
                                <input type="radio" name="categoria" value="miembro"> Miembro <br/>
                                <input type="radio" name="categoria" value="admin"> administrador <br/>
                            </div>
                            <br/>
                            <input type="text" name="id_usuario" value="<?php echo $id_usuario ?>" style="display: none"/>
                            <input type="submit" value="GUARDAR"/>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                header('Location: index.php');
            }
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