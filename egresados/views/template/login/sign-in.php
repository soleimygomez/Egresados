<!--         -->
    <!-- SIGN IN -->
    <!--         -->
    <div class="container-sign-in form-effect container-generic-login" id="container-login__sign-in">

        <img class="logo" src="<?php echo $_URL_CORE_  ?>assets/img/ufps/logo-ufps.jpg" alt="Error show logo" title="Logo Nuestra Universidad!">
        <h1 class="title" title="Nuestra Carrera">Ingenieria Electromecanica</h1>
        <h2 class="subtitle">Registrarse</h2>

        <form action="" method="POST" id="sign-in__form" class="sign-in__form">

            <div class="form__control form__control__move" id="login__sign-in__codigo">
                <label> Codigo <span class="span required">*</span> </label>
                <input name="codigo" type="text" class="input-text" id="login-sign-in-codigo" title="Digite Codigo" required autofocus>
            </div>

            <div class="form__control form__control__move hidden-display" id="login__sign-in__password">
                <label> Contraseña <span class="span required">*</span> </label>
                <input name="password" type="password" class="input-text" id="login-sign-in-password" title="Digite Password">
            </div>


            <!--        -->
            <!-- STATUS -->
            <!--        -->
            <div class="display-flex container___">
                <span class="span" title="Iniciar Sesión">
                    Iniciar <a href="#Login" class="link" onclick="statuLogin()">Sesion</a></span>
            </div>

            <!--         -->
            <!-- SIGN IN -->
            <!--         -->
            <div class="display-flex">

                <!--         -->
                <!-- SIGN IN -->
                <!--         -->
                <input class="login__btn-sign-in btn btn-x2" type="submit" value="Registrarse" id="login__btn-sign-in" 
                       title="Registrarse"  placeholder="<?php echo $_URL_CORE_?>">

                <!--        -->
                <!-- LOADER -->
                <!--        -->
                <div class="loader-google" id="sign-in-loader-google">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </form>
    </div>
