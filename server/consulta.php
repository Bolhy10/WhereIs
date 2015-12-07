<?php
/**
 * Created by PhpStorm.
 * User: Reynaldo
 * Date: 12/04/2015
 * Time: 10:31 PM
 */
require_once('conexion/conex_whereis.php');

$comercio = $_POST["comercio"];
$lugar = $_POST["lugar"];
$intent = $_POST["intent"];

$search = "SELECT tradewis.local, places.places, principalwis.phone, principalwis.horario, photo_placeswis.url_photo, provincewis.province
           FROM principalwis
           INNER JOIN tradewis ON tradewis.id_coWis = principalwis.tradewis
		   INNER JOIN photo_placeswis ON photo_placeswis.id = principalwis.photo_placesWis
		   INNER JOIN places ON places.id = principalwis.id_places
		   INNER JOIN provincewis ON provincewis.id_proWis = principalwis.id_proWis
		   WHERE tradewis.local='$comercio' AND places.places='$lugar' ";

$result = $mysqli -> query($search);

if($result -> num_rows > 0) {
    while ($f = $result -> fetch_array()) {

        echo '<div class="col-lg-4">
            <div class="comodin">
                <div class="comodin-img"><img src=' . $f["url_photo"] . '></div>
                <div class="comodin-text">
                    <p>
                        <span><i class="icon-location"></i>' . utf8_encode($f["local"] . " / " . $f["places"]) . '</span>
                        <span>' . utf8_encode($f["province"]) . '</span>
                        <span><i class="icon-clock"></i> ' . $f["horario"] . '</span>
                        <span><i class="icon-phone"></i> ' . $f["phone"] . '</span>
                    </p>
                </div>
            </div>
        </div>';
    }
}else{
    echo '<div class="no-search col-lg-12"><h2><i class="icon-confused"></i> !Oh no he encontrado ning&uacute;n resultado. Intentalo Nuevamente.</h2></div>';

}
?>