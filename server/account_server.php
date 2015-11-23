<?php
/**
 * Created by PhpStorm.
 * User: Bolhy
 * Date: 12/11/2015
 * Time: 1:48
 */
require_once('conexion/conex_whereis.php');


if(!empty($_FILES["file_photo"]) && !empty($_POST["email"])
    && !empty($_POST["you_lives"]) && !empty($_POST["about_me"]) && !empty($_POST["socialmedia"]) && !empty($_POST["name"]) )
{
    $username = utf8_decode($_POST["username"]);
    $nom = utf8_decode($_POST["name"]);
    $email = utf8_decode($_POST["email"]);
    $you_lives = utf8_decode($_POST["you_lives"]);
    $about_me = utf8_decode($_POST["about_me"]);
    $socialmedia = utf8_decode($_POST["socialmedia"]);
        $file = $_FILES["file_photo"];
        $nombre  = $file["name"];
        $tipo = $file["type"];
        $ruta_p = $file["tmp_name"];
        $size = $file["size"];
        @$dimensiones = getimagesize($ruta_p);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../images/userwhereis/$username/";

        if(is_dir($carpeta)){
            $src = $carpeta.$nombre;
            $src_1 = "images/userwhereis/$username/$nombre";

            move_uploaded_file($ruta_p,$src);
            $user = $mysqli -> query("UPDATE user_Wis SET last_name='$nom', email = '$email', you_lives = '$you_lives', about_me = '$about_me', socialmedia = '$socialmedia' WHERE username = '$username' ");
            if($ruta_p != null){
                $photo = $mysqli -> query("UPDATE photo_user_wis SET url_photo = '$src_1' ");
            }
            if($user && $photo){
                echo "<p class='text-danger'><i class='icon-grin'></i> !Oh, Se actualizo la cuenta.</p>";
            }else{
                echo "<p class='text-danger'><i class='icon-warning'></i> !Oh, Error al actualizar. Intentelo Nuevamente.</p>";
            }
        }else{
            echo "<p class='text-danger'><i class='icon-warning'></i> !Oh, Error en el sistema, contactenos a whereis@support.com.</p>";
        }

}else{
    echo "<p class='text-danger'><i class='icon-warning'></i> !Ooh, Debe llenar los campos. No pueden estar vacíos.</p>";
}
