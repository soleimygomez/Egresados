<!--             -->
<!-- NAVBAR ADMI -->
<!--             -->
<header class="navbar navbar-fixed-top navbar__">

    <div class="navbar-nav">

        <!--      -->
        <!-- LOGO -->
        <!--      -->
        <div class="nav nav-logo">
            <a href="<?php echo $_URL_CORE_CONTROLLER_ ?>index.php">
                <img src="<?php echo $_URL_CORE_ ?>assets/img/ufps/logo-ufps.jpg" title="Nuestra Universidad!" class="logo">
            </a>
        </div>

        <!--       -->
        <!-- LINKS -->
        <!--       -->
        <div class="nav nav-left-swipe" id="menu__superior">
            <a class="link close-nav-left-swipe" onclick="navbarLeftSwipe()">
                <span class="icon icon-close" title="Cerrar Menú">
                    <i class="fas fa-times-circle icono-awasome"></i>
                </span>
            </a>
            <a class="link" title="Ver Capacitaciones" href="<?php echo $_URL_CORE_CONTROLLER_ ?>capacitacion/ir-lista-capacitaciones.php">Capacitaciones</a>
            <a class="link" title="Ver Encuestas" href="<?php echo $_URL_CORE_CONTROLLER_ ?>encuesta/ir-lista-encuesta.php">Encuestas</a>
            <a class="link" title="Ver Ofertas Trabajos" href="<?php echo $_URL_CORE_CONTROLLER_ ?>oferta/ir-lista-ofertas.php">Ofertas Empleo</a>
            <a class="link" title="Ver Egresados" href="<?php echo $_URL_CORE_CONTROLLER_ ?>egresado/ir-lista-egresado.php">Egresados</a>
            <a class="link" title="Ver Reuniones" href="<?php echo $_URL_CORE_CONTROLLER_ ?>reunion/ir-lista-reunion.php">Reuniones</a>
        </div>

        <!--       -->
        <!-- ICONS -->
        <!--       -->
        <div class="nav-x2 nav-icons nav-profile-main">

            <a class="link" onclick="navbarLeftSwipe()" id="abrir-menu-itmes">
                <span title="Abrir Menú">
                    <i class="fas fa-bars icon-awasome"></i>
                </span>
            </a>

            <a class="link" onclick="navbarProfile()">
                <span title="Usuario <?php echo $codigo_usuario; ?>">
                    <i class="fas fa-user icon-awasome"></i>
                </span>
            </a>

            <a class="link" href="<?php echo $_URL_CORE_ ?>controllers/requests/login/close-sesion.php">
                <span title="Cerrar Sesión <?php echo $codigo_usuario; ?>">
                    <i class="fas fa-sign-out-alt icon-awasome"></i>
                </span>
            </a>

            <!--             -->
            <!-- NAV PROFILE -->
            <!--             -->
            <div class="nav nav-profile">
                <div>
                    <a class="link" href="<?php echo $_URL_CORE_CONTROLLER_ ?>perfil.php">Ver Perfil</a>
                </div>
                <div>
                    <a class="link" href="<?php echo $_URL_CORE_ ?>controllers/requests/login/close-sesion.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</header>