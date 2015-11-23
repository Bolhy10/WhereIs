<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 5/11/15
 * Time: 0:59
 */
require_once("../../server/conexion/conex_whereis.php");
if(isset($_SESSION['user']) == false){
    header('Location: whereispanama');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar cuenta | WhereIs</title>
    <link href="images/asset/favicon.ico" rel="icon" type="image/x-icon" />
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
<?php
include('../../tools/header.php');
?>

<div class="account">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="list-info">
                    <ul>
                        <li><a href="account">Informaci&oacute;n b&aacute;sica</a></li>
                        <li class="activado"><a href="password">Cambiar contrase&ntilde;a</a></li>
                        <li><a href="myplaces">Mi lugar favorito</a></li>
                        <li><a href="delete_act">Eliminar cuenta</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8" id="info-basic">
                <div class="info-basic">
                    <div class="row">
                            <div class="col-lg-6">
                                <h3>Cambiar Contrase&ntilde;a</h3>
                                <div class="alerta-user"></div>
                                <div class="info-input">
                                    <label for="">Nueva contrase&ntilde;a:</label>
                                    <input type="password" name="password" id="password" class="put-info"/>
                                </div>
                                <div class="info-input-button">
                                    <button type="button" id="password-button">Cambiar</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../tools/footer.php');
?>
<script type="text/javascript" src="js/assets/app_whereis_test.js"></script>
</body>
</html>