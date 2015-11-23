<!-- cabecera de whereis -->
<header>
    <div class="menu_bar">
        <a href="inicio" class="bt-menu"><span class="icon-list2"></span><img src="images/asset/whereis.png"  width="135" height="50"/></a>
    </div>
    <a href="inicio" class="whereislogo"><div class="header-logo"></div></a>
    <nav>
        <ul>
            <?php
            if(@$_SESSION["user"] == false) {
                ?>
                <li><a href="login" class="register">INICIAR</a></li>
                <li><a href="#registrar" class="sign">REGISTRATE</a></li>
                <?php
            }else {
                ?>
                <li class="tou"><a href="#" class="perfil-user"><img src="<?php print $photo; ?>"/></a>
                    <ul class="children">
                        <li><a href="profile">Ver mi perfil</a></li>
                        <li><a href="account">Configuracion de la cuenta</a></li>
                        <li><a href="log_out">Log out</a></li>
                    </ul>
                </li>
                <?php
            }
            ?>
        </ul>
    </nav>
</header>

