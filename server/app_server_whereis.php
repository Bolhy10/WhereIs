<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 3/11/15
 * Time: 21:47
 */
require_once('conexion/conex_whereis.php');
/*Metodos de Verificaciones Whereis*/
 switch($_POST["wis"]){

    case 'login_whereis':

        $username = htmlspecialchars($_POST["username"]);
        $username = stripslashes($username);
        $username = mysql_real_escape_string($username);

        $email = htmlspecialchars($_POST["email"]);
        $email = stripslashes($email);
        $email = mysql_real_escape_string($email);

        $password = sha1($_POST["password"]);
        $photo = mt_rand(1,1000);
        if(!empty($username) && !empty($email) && !empty($password)){
            $login = "SELECT Username,email FROM user_Wis WHERE Username = '$username' AND email = '$email' ";
            $row_login  = $mysqli -> query($login);
            if($row_login -> num_rows > 0){
                echo 2;
            }else{
                    $query = "INSERT INTO user_wis (username,email,password,photo,you_lives,places_id) VALUES ('".$username."','".$email."','".$password."','".$photo."',29,29)";
                    $result = $mysqli -> query($query);
                    if($result){
                        $log = "SELECT * FROM user_wis WHERE username = '$username' AND password = '$password' ";
                        $log_row = $mysqli -> query($log);
                        while($f = $log_row -> fetch_array()){
                            $_SESSION["user"] = $f["Username"];
                            $id = $f["id"];
                            $face = $f["photo"];
                        }
                        $ruta = "../images/userwhereis/";
                        $directorio = $ruta.$username;
                            $crear = mkdir($directorio,0777,true);
                        $defecto = "images/userwhereis/defecto/login_usuario.png";
                        $ph = "INSERT INTO photo_user_wis (username,photo,url_photo) VALUES ('".$id."','".$face."','".$defecto."')";
                        $ph_query = $mysqli -> query($ph);
                        echo 1;
                    }else{
                        echo 2;
                    }
            }
        }else{
             echo 3;
        }
        break;

     case 'verify_user':
         $username = $_POST["username"];
                 if(!empty($username)) {
                     $sql = "select Username from user_Wis where Username = '$username' ";
                     $row_user = $mysqli->query($sql);
                     if ($row_user->num_rows > 0) {
                         echo 0;
                     } else {
                         echo 1;
                     }
                 }
         break;
     case 'verify_email':
         $email  = $_POST["email"];
         if(!empty($email)){
             $sql = "select email from user_Wis where email = '$email' ";
             $row_user = $mysqli->query($sql);
             if( $row_user->num_rows > 0) {
                 echo 0;
             }else {
                 echo 1;
             }
         }
         break;

     case 'whereis-in':
         $user = $_POST['user'];
         $password = sha1($_POST["password"]);
         if(!empty($username) && !empty($password)){
             $sq = "SELECT * FROM user_Wis WHERE (Username = '$user' OR email = '$user') AND password = '$password'  ";
             $query_user = $mysqli -> query($sq);
             if($query_user -> num_rows > 0){
                $f = $query_user -> fetch_array();
                 $_SESSION["user"] = $f["Username"];
                 echo "log";
             }else{
                 echo "no-log";
             }
         }
         break;

     case 'change-password':

         if(!empty($_POST["change_pass"]) && !empty($_SESSION["user"]) ){
             $change_pass = sha1($_POST["change_pass"]);
             $change_u = $_SESSION["user"];
             $pas = "UPDATE user_wis SET password = '$change_pass' WHERE username = '$change_u' ";
             $pas_query = $mysqli -> query($pas);
             if($pas){
                 echo "<p class='text-danger'><i class='icon-grin'></i> Cambios actualizados.</p>";
             }else{
                 echo "<p class='text-danger'><i class='icon-warning'></i> Error, intentelo nuevamente.</p>";
             }
         }
         break;

     case 'change_places':
         if(!empty($_POST["places"])){
             $places = $_POST["places"];
             $username = $_SESSION["user"];
             $c = "UPDATE user_wis SET places_id = '$places' WHERE username = '$username' ";
             $c_query  = $mysqli -> query($c);
             if($c_query){
                 $cp = "SELECT * FROM places WHERE id = '$places' ";
                 $cp_query = $mysqli -> query($cp);
                 while($d = $cp_query -> fetch_array()){
                    echo "<img src='".$d["places_photo"]."'/>";
                 }
             }
         }
         break;

     case 'delete-user':
         $username = $_SESSION["user"];
         $del = "SELECT * FROM user_wis WHERE username = '$username' ";
         $del_query = $mysqli -> query($del);
         $q = $del_query -> fetch_array();
         $id = $q["id"];
         $ruta = "../images/userwhereis/".$username;
         if($del_query){
             if(is_dir($ruta)){
                 session_destroy();
                 $borrar = "DELETE FROM user_wis WHERE username = '$username' ";
                 $bquery = $mysqli -> query($borrar);
                 $borrar_photo = "DELETE FROM photo_user_wis WHERE username = '$id' ";
                 foreach(glob($ruta."/*.*") as $archivos_carpeta)
                 {
                     unlink($archivos_carpeta);
                 }
                 rmdir($ruta);
                 echo 1;
             }else{
                 echo 0;
             }
         }
         break;

     case 'sexo':
         $sexo = $_POST["sexo"];
         $username = $_SESSION["user"];
         $se = "UPDATE user_wis SET sexo = '$sexo' WHERE username = '$username' ";
         $se_query = $mysqli-> query($se);
         break;

     case 'search':
         $local = htmlspecialchars($_POST["local"]);
         $local = stripslashes($local);
         $local = mysql_real_escape_string($local);
         //Consulta de los locales o lugares
         $r = "SELECT * FROM places INNER JOIN principalwis ON (principalwis.id_places = places.id) INNER JOIN provincewis ON (provincewis.id_proWis = principalwis.id_proWis) INNER JOIN tradewis ON (tradewis.id_coWis = principalwis.tradewis) INNER JOIN photo_placeswis ON (photo_placeswis.id = principalwis.photo_placesWis) WHERE tradewis.local LIKE '%$local%' OR places.places LIKE '%$local%' ";
         $lc = $mysqli -> query($r);

         if($lc -> num_rows > 0){
         while($j = $lc -> fetch_array()) {
             echo '<div class="col-lg-4">
            <div class="comodin">
                <div class="comodin-img"><img src=' . $j["url_photo"] . '></div>
                <div class="comodin-text">
                    <p>
                        <span><i class="icon-location"></i>' . utf8_encode($j["local"] . " / " . $j["places"]) . '</span>
                        <span>' . utf8_encode($j["province"]) . '</span>
                        <span><i class="icon-clock"></i> ' . $j["horario"] . '</span>
                        <span><i class="icon-phone"></i> ' . $j["phone"] . '</span>
                    </p>
                </div>
            </div>
        </div>';
         }
         }else{
                 echo '<div class="no-search col-lg-12"><h2><i class="icon-confused"></i> !Oh no he encontrado ning&uacute;n resultado. Intentalo Nuevamente.</h2></div>';
             }

         break;







}



