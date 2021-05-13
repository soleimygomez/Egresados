
<img src="<?php echo $_URL_CORE_  ?>assets/img/admi/estudiantes.png" 
     class="student-background-image" title="Nuestro Estudiantes!" alt="Error show students">

<!--          -->
<!-- SELECTOR -->
<!--          -->
<div class="container-svg position-absolute-screen container-svg__login">
    <svg viewBox="0 0 500 150" preserveAspectRatio="none">
        <path d="M318.56,-2.45 C140.79,70.55 314.05,93.25 262.69,150.48 L0.00,150.00 L0.00,0.00 Z" class="login-path-1"> </path>
        <path d="M-5.36,-1.47 C164.50,167.27 509.31,-93.25 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" class="login-path-2"></path>
    </svg>
</div>

<!--                -->
<!-- CONTAINER MAIN -->
<!--                -->
<div class="container-login-main display-flex">
    <?php
    require_once("template/login/login.php");
    require_once("template/login/sign-in.php");
    require_once("template/login/forgot.php");
    ?>
</div>

<?php
require_once("template/footer.php");
?>
<!--         -->
<!-- REQUEST -->
<!--         -->
<script src="<?php echo $_URL_CORE_  ?>assets/js/login.js"> </script>