<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de usuarios</title>
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
                                echo '<a href="http://localhost/mediaServer2/index.php/Usuario_control/index"> Menu usuario</a></br>';
                            }
                            ?>

                            <a href="http://localhost/mediaServer2/index.php/Landing_page/logout">salir</a>
                        </div>
                    </div>
                    <div id="center-side" center>
                        <h1>Listado de todos los usuarios</h1>
                        <?php if (count($lusuarios)): ?>
                            <table>
                                <tr>
                                    <th>ID usuario &nbsp;&nbsp;</th>
                                    <th>NOMBRE &nbsp;&nbsp;</th>
                                    <th>USERNAME &nbsp;&nbsp;</th>
                                    <th>CATEGORIA &nbsp;&nbsp;</th>
                                    <th>EDITAR &nbsp;&nbsp;</th>
                                    <th>ELIMINAR &nbsp;&nbsp;</th>
                                </tr>
                                <?php foreach ($lusuarios as $item): ?>
                                    <tr>
                                        <td><?php echo $item->id_usuario ?>&nbsp;&nbsp;</td>
                                        <td><?php echo $item->nombre ?>&nbsp;&nbsp;</td>
                                        <td><?php echo $item->username ?>&nbsp;&nbsp;</td>
                                        <td><?php echo $item->categoria ?>&nbsp;&nbsp;</td>
                                        <td><a href="http://localhost/mediaServer2/index.php/Usuario_control/guardar/<?php echo $item->id_usuario ?>">EDITAR &nbsp;&nbsp;</a></td>
                                        <td><a href="http://localhost/mediaServer2/index.php/Usuario_control/eliminar/<?php echo $item->id_usuario ?>">ELIMINAR &nbsp;&nbsp;</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php
                        else:
                            echo 'No hay usuarios registrados';
                        endif;
                        ?>
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
        <script src="http://localhost/mediaServer2/assets/js/main.js"></script>
    </body>
</html>