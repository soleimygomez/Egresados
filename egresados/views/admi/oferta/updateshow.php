<!--                  -->
<!-- CONTAINER UPDATE -->
<!--                  -->

<div class="container-register-section position-relative">
    <img src="../../../assets/img/svg/oferta.svg">

    <form action="?controller=oferta&&action=update" method="POST" class="register-form">

        <h1 class="title"> Actualizar Ofertas </h1>

        <div class="form__field form-icon">
            <input type="text" name="empresa" placeholder="Empresa" title="Ingrese empresa" value="<?php echo $oferta->getEmpresa(); ?>" required>
            <span class="input-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </span>
        </div>

        <div class="form__field-x2 display-flex-between">
            <div class="form__field form-icon">
                <input type="number" name="vacante" placeholder="Vacantes" title="Ingrese numero vacantes" value="<?php echo $oferta->getVacantes(); ?>" required>
                <span class="input-icon">
                    <i class="fas fa-user-tie"></i>
                </span>
            </div>

            <div class="form__field form-icon">
                <input type="text" name="cargo" placeholder="Cargo" title="Ingrese cargo" value="<?php echo $oferta->getCargo(); ?>" required>
                <span class="input-icon">
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
        </div>

        <div class="form__field-x2 display-flex-between">
            <div class="form__field form-icon">
                <input type="text" name="ciudad" placeholder="Ciudad" title="Ingrese ciudad" value="<?php echo $oferta->getCiudad(); ?>" required>
                <span class="input-icon">
                    <i class="fas fa-city"></i>
                </span>
            </div>

            <div class="form__field form-icon">
                <input type="text" name="ubicacion" placeholder="Ubicación" title="Ingrese ubicación" value="<?php echo $oferta->getUbicacion(); ?>" required>
                <span class="input-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
            </div>
        </div>


        <div class="form__field form-icon">
            <input type="date" name="fecha" title="Fecha" value="<?php echo $oferta->getFecha(); ?>" required>
            <span class="input-icon">
                <i class="fas fa-calendar-check"></i>
            </span>
        </div>

        <div class="form__field form-icon">
            <input type="area" name="descripcion" placeholder="Descripción" title="Ingrese descripción" value="<?php echo $oferta->getDescripcion(); ?>" required>
            <span class="input-icon">
                <i class="fas fa-file-prescription"></i>
            </span>
        </div>


        <input type="text" name="usuario" value="<?php echo ucfirst($_SESSION['id_usuario']); ?>" style="display: none">
        <input type="text" name="id" value="<?php echo $oferta->getId(); ?>" style="display: none">

        <div class="display-flex">
            <!--           -->
            <!-- REGISTRAR -->
            <!--           -->
            <input type="submit" name="actualizar" value="Actualizar" class="btn btn-x2">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
if (isset($_SESSION['success'])) {
    echo '<script type="text/javascript">
  Swal.fire({
    title: "Actualización Completada!",
    showClass: {
      popup: "animated fadeInDown faster"
    },
    hideClass: {
      popup: "animated fadeOutUp faster"
    },
    text: "Se ha actualizado la oferta empleo.",
    icon: "success",
    footer: "Esta información es importante.",
    backdrop: true,
    timer: 5000,
    timerProgressBar: true,
  });
  </script>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<script type="text/javascript">
  Swal.fire({
    title: "Actualización No Completada!",
    showClass: {
      popup: "animated fadeInDown faster"
    },
    hideClass: {
      popup: "animated fadeOutUp faster"
    },
    text: "No Se ha actualizado la oferta empleo",
    icon: "error",
    footer: "Esta información es importante.",
    backdrop: true,
    timer: 5000,
    timerProgressBar: true,
  });
  </script>';
    unset($_SESSION['error']);
}
?>