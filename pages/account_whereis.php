<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 5/11/15
 * Time: 0:59
 */
require_once("../server/conexion/conex_whereis.php");
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
include('../tools/header.php');
?>

<div class="account">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="list-info">
            <ul>
                <li class="informacion-basica"><a href="#info-basic">Informaci&oacute;n b&aacute;sica</a></li>
                <li><a href="#">Cambiar contrase&ntilde;a</a></li>
                <li><a href="#">Mis lugares favoritos</a></li>
                <li><a href="#">Eliminar cuenta</a></li>
            </ul>
                    </div>
            </div>
            <div class="col-lg-8" id="info-basic">
                <div class="info-basic">
                    <div class="row">
                        <form enctype="multipart/form-data" id="account-username" method="post">
                        <div class="col-lg-6">
                            <h3>Informaci&oacute;n b&aacute;sica</h3>
                            <div class="alerta-user info-input"></div>
                            <div class="info-input">
                                <label for="">Nombre de usuario:</label>
                                <input type="text" name="username" id="username" class="put-info" value="<?php echo $username; ?>"/>
                            </div>
                            <div class="info-input">
                                <label for="">Nombre:</label>
                                <input type="text" name="name" id="name" class="put-info" value="<?php echo $name; ?>"/>
                            </div>
                            <div class="info-input">
                                <label for="">Correo electr&oacute;nico:</label>
                                <input type="text" name="email" id="email" class="put-info" value="<?php echo $email; ?>"/>
                            </div>
                            <div class="info-input">
                                <label for="">Donde vivo:</label>
                                <input type="text" name="you_lives" id="you_lives" class="put-info" value="<?php echo utf8_encode($you_lives); ?>"/>
                            </div>
                            <div class="info-input">
                                <label for="">Sobre mi:</label>
                                <textarea name="about_me" cols="40" rows="4" id="about_me" class="put-info"><?php echo $about_me; ?></textarea>
                            </div>
                            <div class="info-input">
                                <label for="">Twitter</label>
                                <input type="text" name="socialmedia" id="socialmedia" class="put-info" value="<?php echo $socialmedia; ?>"/>
                            </div>
                            <div class="info-input-button">
                                <button type="button" class="info-button">Actualizar perfil</button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="info-input-img">
                                <div class="foto_user">
                                    <span class="llo"></span>
                                    <?php
                                    echo '<div id="img-user"><img src="'.$photo.'" id="images-user"/></div>';
                                    ?>
                                    <p>
                                        <div class="div_file">
                                            <p class="text_foto"><i class="icon-image"></i> Actualiza tu foto</p>
                                            <input type="file" class="btn_foto" name="file_photo" id="file_photo" title="Automaticamente la Foto Perfil"/>
                                        </div>

                                    </p></div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../tools/footer.php');
?>
<script type="text/javascript" src="js/assets/app_whereis_test.js"></script>
</body>
</html>