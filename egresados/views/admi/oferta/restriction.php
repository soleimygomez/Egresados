<!--                    -->
<!-- CONTAINER REGISTER -->
<!--                    -->
<div class="container-register-section position-relative">
    <img src="../../../assets/img/svg/oferta.svg">

    <form action="?controller=oferta&&action=saverestriction" method="POST" class="register-form">

        <h1 class="title"> Registro Requerimiento Oferta <?php echo $oferta->getEmpresa()." Cargo ".$oferta->getCargo()  ?> </h1>

        <div class="form__field form-icon">
            <input type="area" name="descripcion" placeholder="Requerimiento" title="Ingrese Requerimiento" required>
            <span class="input-icon">
                <i class="fas fa-file-prescription"></i>
            </span>
        </div>

        <input type="area" name="id_oferta" value="<?php echo $id ?>" style="display:none">

        <div class="display-flex">

            <!--          -->
            <!-- REGISTER -->
            <!--          -->
            <input type="submit" name="registrar" value="Registrar" class="btn btn-x2" title="Registrar Requerimiento Oferta Empleo">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
include_once "../../template/alert.php";
