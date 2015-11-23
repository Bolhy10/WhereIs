<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 7/11/15
 * Time: 2:23
 */
require_once("../server/conexion/conex_whereis.php");
if(isset($_SESSION['user']) == true){
    header('Location: inicio');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhereIs</title>
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
include('../tools/header.php');
?>
<div class="login-whereis">
    <form>
    <div class="login-panel">
        <div class="text-login">Ingresar a Whereis</div>
        <div class="login-username">
            <label for="">Usuario o Correo electronico</label>
            <input type="text" class="form-control" id="username-email">
            <label>Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="username-password">
        </div>
        <div class="button-login">
            <div><button type="button" id="login-button"><b>Ingresar</b></button></div>
            <div class="loader"></div>
        </div>
        </div>
        </form>
    </div>
<?php
include('../tools/footer.php');
?>
<script type="text/javascript" src="js/assets/app_whereis_test.js"></script>
</body>
</html>


