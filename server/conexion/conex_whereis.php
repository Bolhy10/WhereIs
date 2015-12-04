<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 3/11/15
 * Time: 21:54
 */
header("Content-type: text/html; charset=utf8");
include('ez_sql_core.php');
include('ez_sql_mysql.php');

//$con = new ezSQL_mysql('root','','whereis','localhost');
    $hostname = 'localhost';
    $database = 'whereis_pma';
    $username = 'root';
    $password = '';
//MySQLi
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
    die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno()
        . ") " . $mysqli -> mysqli_connect_error());
}else{
    session_start();
    $data = "SELECT * FROM user_wis
             INNER JOIN photo_user_wis ON (photo_user_wis.photo = user_wis.photo)
             INNER JOIN places ON (places.id = user_wis.you_lives)
            WHERE 1";
    $row_data = $mysqli -> query($data);
    while($fi = $row_data -> fetch_array()){
        $username = $fi["Username"];
        $name = $fi["last_name"];
        $email = $fi["email"];
        $you_lives = $fi["places"];
        $lives = $fi["id"];
        $photo = $fi["url_photo"];
        $socialmedia = $fi["socialmedia"];
        $about_me = $fi["about_me"];
        $places_id = $fi["places_id"];
        $sexo = $fi["sexo"];
    }









}
/*Consulting data*/


