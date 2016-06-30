<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio Sesion</title>
        <link rel="stylesheet" href="http://localhost/mediaServer2.0/assets/css/main.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="right-side">
                <header id="header">
                    <h1 style="align-self: center">MediaSite</h1>
                    <p>MediaSite es un sitio domestico de streaming the peliculas y audio</p>
                </header>
            </div>
            <div>
                <p>Por favor inicie sesión para entrar</p>
                
                <form method="post" action="<?php base_url()?>index.php/Landing_page/login_post" >
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="user" placeholder="Usuario"/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pwd" placeholder="Contraseña"/><br/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="ENTRAR"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <footer id="footer">
            <ul class="copyright">
                <li>&copy; Jacri.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
        <script src="<?php base_url()?>assets/js/main.js"></script>
    </body>
</html>