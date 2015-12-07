<?php
/**
 * Created by PhpStorm.
 * User: Bolhy
 * Date: 06/12/2015
 * Time: 20:44
 */
require_once("../server/conexion/conex_whereis.php");
if(isset($_SESSION['user']) == true){
    session_destroy();
    header('Location: whereispanama');
}else{
    header('Location: inicio');
}
?>

