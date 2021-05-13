<?php

if (!isset($reunion) || is_null($reunion->getId())) {
  $_SESSION['_alert_'] = true;
  $_SESSION['_alert_type'] = 'error';
  $_SESSION['_alert_title'] = "Reunión No Existe.";
  $_SESSION['_alert_text'] = "La Reunión ID." . $id . " No se encuentra registrada.";
  echo '<script>
			location.href="ir-lista-reunion.php";
     </script>';
} else { ?>
  <!--                  -->
  <!-- CONTAINER UPDATE -->
  <!--                  -->
  <div class="container-register-section position-relative">
    <img src="../../../assets/img/svg/reunion.svg">

    <form action="?controller=reunion&&action=update" method="POST" class="register-form">

      <h1 class="title"> Actualizar Reunión </h1>


      <div class="form__field form-icon">
        <input type="text" name="lugar" placeholder="Lugar" title="Actualizar Lugar" value="<?php echo $reunion->getLugar(); ?>" required>
        <span class="input-icon">
          <i class="fas fa-directions"></i>
        </span>
      </div>
      <div class="form__field form-icon">
      <input type="text" name="tema" placeholder="Tema" title="Ingrese Tema" value="<?php echo $reunion->getTema(); ?>" required>
      <span class="input-icon">
        <i class="fas fa-file-prescription"></i>
      </span>
      </div>

          <div class="form__field form-icon">
          <input type="date-time" name="fecha" title="Fecha " value="<?php echo $reunion->getFecha(); ?>" required>
          <span class="input-icon">
            <i class="far fa-calendar-times"></i>
          </span>
        </div>

      <div class="form__field form-icon">
        <input type="area" name="descripcion" placeholder="Descripción" title="Actualizar Descripción" value="<?php echo $reunion->getDescripcion(); ?>" required>
        <span class="input-icon">
          <i class="fas fa-file-prescription"></i>
        </span>
      </div>

      <div class="form__field-x2 display-flex-between">
      <div class="form__field form-icon">
        <input type="number" name="cupo" title="Actualizar Cupo Total" value="<?php echo $reunion->getCupo(); ?>"  required>
        <span class="input-icon">
          <i class="fas fa-sort-numeric-up"></i>
        </span>
      </div>
      <div class="form__field form-icon">
        <input type="number" name="cupo_disponible" title="Actualizar Cupo Disponible"  value="<?php echo $reunion->getCupoDisponible(); ?>"    required>
        <span class="input-icon">
          <i class="fas fa-sort-numeric-down"></i>
        </span>
      </div>
      </div>

        <div class="form__field ">
                <input name="imagen" type="file" title="Poster" value="<?php $reunion->getId(); ?>">
          </div>

          <input type="text" name="id" value="<?php echo $reunion->getId(); ?>" style="display: none">
          <input type="text" name="usuario" value="<?php echo ucfirst($_SESSION['id_usuario']); ?>" style="display: none">
       
      <div class="display-flex">
        <!--           -->
        <!-- REGISTRAR -->
        <!--           -->
        <input type="submit" name="registrar" value="Actualizar" class="btn btn-x2" title="Actualizar Reunión">
      </div>
    </form>
  </div>

<?php
} ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
include_once "../../template/alert.php";
?>