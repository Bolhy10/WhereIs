<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 15/09/15
 * Time: 1:21
 */
require_once("server/conexion/conex_whereis.php");
if(isset($_SESSION['user']) == true){
    header('Location: inicio');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Whereis - Tu mejor forma de buscar tu local</title>
    <link href="images/asset/favicon.ico" rel="icon" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhereIs - Busca tu sucursal al instante</title>
    <!-- Latest compiled  CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/loaders.min.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,cyrillic,latin-ext,greek,greek-ext,vietnamese' rel='stylesheet' type='text/css'>
    <!-- Compiled JavaScript -->
    <script type="text/javascript" src="js/assets/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/assets/bootstrap.min.js"></script>
    </head>
<body>
<!-- cabecera de whereis -->
<?php
include('tools/header.php');
?>
<div class="proper" id="registrar">
<div class="body-whereis">
    <div id="particles-js">
    </div>
    <div class="form-panel">
        <form action="#">
            <div class="input">
                <div class="a"><input type="text" class="input-form" placeholder="Elige tu nombre usuario" id="username" /></div>
                <div class="b validate-user "></div>

            </div>
            <div class="input">
                <div class="a"><input type="text" class="input-form" placeholder="Tu correo electr&oacute;nico" id="email"/></div>
                <div class="b validate-email"></div>
            </div>
            <div class="input">
                <div class="a"><input type="password" class="input-form pass-verify" placeholder="Crear tu contrase&ntilde;a" id="password"/></div>
                    <div class="b validate-pass"></div>
                <span class="password-validate">Utilice al menos una letra mayuscula, un numero y siete caracteres.</span>
            </div>
            <div class="input">
                <button type="button" class="input-form register-button" onclick="login_data_user();">Inscribirse en Whereis</button>
                    <span>Al hacer clic en "Inscríbete Whereis", usted acepta nuestros
                    <a href="#">T&eacute;rminos de servicio</a> y la <a href="#">pol&iacute;tica de privacidad</a>.
                    Le enviaremos su cuenta e-mails relacionados ocasionalmente.</span>
            </div>
        </form>
        <div class="loader">
        </div>
    </div>
</div>
</div>
<?php
include('tools/footer.php');
?>
<script type="text/javascript" src="js/assets/particles.js"></script>
<script type="text/javascript" src="js/assets/app.js"></script>
<script type="text/javascript" src="js/assets/app_whereis.js"></script>
</body>
</html>
