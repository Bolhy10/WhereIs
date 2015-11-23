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
    <title><?php echo $username; ?> | WhereIs</title>
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
<div class="panel-profile">
    <div class="profile">
        <div class="profile-pant">
        <div class="profile-user">
            <div class="profile-user-img"><img src="<?php echo $photo; ?>"></div>
            <div class="profile-user-text">
                <h3><?php echo $username;?></h3>
                <p>
                    <span><i class="icon-location"></i> <?php echo utf8_encode($you_lives); ?></span>
                    <span><?php echo utf8_encode($about_me); ?></span>
                    <span><a href="https://twitter.com/<?php $socialmedia; ?>"><i class="icon-twitter"></i> <?php echo utf8_encode($socialmedia); ?></a></span>
                </p>
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

