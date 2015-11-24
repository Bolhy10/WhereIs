<?php
/**
 * Created by PhpStorm.
 * User: terminator10
 * Date: 5/11/15
 * Time: 0:59
 */
require_once("../server/conexion/conex_whereis.php");
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
    <title>Inicio | WhereIs</title>
    <link href="images/asset/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- Latest compiled  CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/loaders.min.css" type="text/css">
    <link rel="stylesheet" href="js/microphone-0.7.0/microphone.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,cyrillic,latin-ext,greek,greek-ext,vietnamese' rel='stylesheet' type='text/css'>
    <!-- Compiled JavaScript -->
    <script type="text/javascript" src="js/assets/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/assets/bootstrap.min.js"></script>

</head>
<body>
<?php
include('../tools/header.php');
?>
<div class="container-fluid where_is">
    <div class="search-trade">
        <input type="text" name="search" id="search" placeholder="Buscar por: Comercio / Sucursales..."/>
    </div>
    <div class="row">
        <?php
        $r = "SELECT * FROM places INNER JOIN principalwis ON (principalwis.id_places = places.id) INNER JOIN provincewis ON (provincewis.id_proWis = principalwis.id_proWis) INNER JOIN tradewis ON (tradewis.id_coWis = principalwis.tradewis) INNER JOIN photo_placeswis ON (photo_placeswis.id = principalwis.photo_placesWis) WHERE places.id = '$places_id' ";
        $r_query = $mysqli -> query($r);
        while($h = $r_query -> fetch_array()){
            ?>
        <div class="col-lg-4">
            <div class="comodin">
                <div class="comodin-img"><img src="<?php echo $h['url_photo']; ?>"></div>
                <div class="comodin-text">
                    <p>
                        <span><i class="icon-location"></i><?php echo utf8_encode($h['local'].' / '.$h['places']); ?></span>
                        <span><?php echo utf8_encode($h['province']); ?></span>
                        <span><i class="icon-phone"></i> <?php echo $h['phone']; ?></span>
                    </p>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="micro">
            <div id="microphone"></div>
            <div id="result" class="micro-text"></div>
            <div id="info" class="micro-text"></div>
            <div id="error" class="micro-text"></div>
    </div>
	        <div id=consulta></div>
            <div id="boton"></div>
</div>
<?php
include('../tools/footer.php');
?>
<script src="js/microphone-0.7.0/microphone.min.js"></script>
<script src="js/conexion.js"></script>
<script type="text/javascript" src="js/assets/app_whereis_test.js"></script>
</body>
</html>






