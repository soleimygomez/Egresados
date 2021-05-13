<!--       -->
<!-- LOGIN -->
<!--       -->
<div class="container-login form-effect container-generic-login" id="container-login__log-in">

    <img class="logo" src="<?php echo $_URL_CORE_  ?>assets/img/ufps/logo-ufps.jpg" alt="Error show logo" title="Logo Nuestra Universidad!">
    <h1 class="title" title="Nuestra Carrera">Ingenieria Electromecanica</h1>
    <h2 class="subtitle">Login</h2>

    <form action="" method="POST" id="login__form" class="login__form">

        <div class="form__control form__control__move">
            <label> Codigo <span class="span required">*</span> </label>
            <input name="codigo" type="text" class="input-text" id="login-login-codigo" title="Digite Codigo" required autofocus>
        </div>

        <div class="form__control form__control__move">
            <label> Contraseña <span class="span required">*</span> </label>
            <input name="password" type="password" class="input-text" id="login-login-clave" title="Digite Contraseña" required>
        </div>

        <!--          -->
        <!-- SELECTOR -->
        <!--          -->
        <div class="container__ display-flex">
            <div class="selector display-flex">
                <select name="tipo_usuario" class="input-selector" required title="Seleccionar Tipo Usuario!">
                    <option value="2" title="Seleccionar Tipo Egresado">Egresado</option>
                    <option value="1" title="Seleccionar Tipo Administrador">Administrador</option>
                </select>
            </div>

            <!--        -->
            <!-- STATUS -->
            <!--        -->
            <div class="display-flex container___">
                <span class="span span-recuperar" title="Crear Cuenta!">
                    ¿Eres <a href="#Sign-In" class="link" onclick="statuLoginNew()">Nuevo</a>?</span>
                <span class="span span-recuperar" title="Recuperar Contraseña">
                    ¿Olvido <a href="#Forgot" class="link" onclick="statuLogin()">Contraseña</a>?</span>
            </div>

        </div>
        <!--        -->
        <!-- LOG IN -->
        <!--        -->
        <div class="display-flex">

            <!--           -->
            <!-- LOGUEARSE -->
            <!--           -->
            <input class="login__btn-login btn btn-x2" type="submit" value="Ingresar" id="login__btn-login" title="Iniciar Sesión"
                   placeholder="<?php echo $_URL_CORE_?>">

            <!--        -->
            <!-- LOADER -->
            <!--        -->
            <div class="loader-google" id="login-login-loader-google">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </form>
</div>