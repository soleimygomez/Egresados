<!--                 -->
<!-- FORGOT PASSWORD -->
<!--                 -->
<div class="container-forgot form-effect container-generic-login" id="container-login__forgot">

    <img class="logo" src="<?php echo $_URL_CORE_  ?>assets/img/ufps/logo-ufps.jpg" alt="Error show logo" title="Logo Nuestra Universidad!">
    <h1 class="title" title="Nuestra Carrera">Ingenieria Electromecanica</h1>
    <h2 class="subtitle">Recuperar</h2>

    <form action="" method="POST" id="forgot__form" class="forgot__form">

        <div class="form__control form__control__move">
            <label> Codigo <span class="span required">*</span> </label>
            <input name="codigo" type="text" class="input-text" id="login-forgot-codigo" title="Digite Codigo" required autofocus>
        </div>

        <div class="form__control form__control__move">
            <label> Email <span class="span required">*</span> </label>
            <input name="email" type="email" class="input-text" id="login-forgot-email" title="Digite Email" required autofocus>
        </div>

        <!--        -->
        <!-- STATUS -->
        <!--        -->
        <div class="display-flex container___">
            <span class="span" title="Iniciar Sesión">
                Iniciar <a href="#Login" class="link" onclick="statuLogin()">Sesion</a></span>
        </div>

        <!--                 -->
        <!-- FORGOT PASSWORD -->
        <!--                 -->
        <div class="display-flex">

            <!--                 -->
            <!-- FORGOT PASSWORD -->
            <!--                 -->
            <input class="login__btn-forgot btn btn-x2" type="submit" value="Recuperar" id="login__btn-forgot" title="Recuperar"
                   placeholder="<?php echo $_URL_CORE_?>">

            <!--        -->
            <!-- LOADER -->
            <!--        -->
            <div class="loader-google" id="forgot-loader-google">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </form>
</div>