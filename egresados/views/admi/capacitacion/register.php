<!--                    -->
<!-- CONTAINER REGISTER -->
<!--                    -->
<div class="container-register-section position-relative">
  <img src="../../../assets/img/svg/admi/capacitacion.svg">

  <form action="?controller=capacitacion&&action=save" method="POST" class="register-form">

    <h1 class="title"> Registro Capacitaciones </h1>

    <div class="form__field form-icon">
      <input type="text" name="tema" placeholder="Tema" title="Ingrese Tema" required>
      <span class="input-icon">
        <i class="fas fa-chalkboard-teacher"></i>
      </span>
    </div>

    <div class="form__field form-icon">
      <input type="text" name="encargado" placeholder="Encargado" title="Ingrese Encargado" required>
      <span class="input-icon">
        <i class="fas fa-user-tie"></i>
      </span>
    </div>

    <div class="form__field-x2 display-flex-between">
      <div class="form__field form-icon">
        <input type="number" name="cupo_total" title="Actualizar Cupo Total"  required>
        <span class="input-icon">
          <i class="fas fa-sort-numeric-up"></i>
        </span>
      </div>
      <div class="form__field form-icon">
        <input type="number" name="cupo_disponible" title="Actualizar Cupo Disponible"      required>
        <span class="input-icon">
          <i class="fas fa-sort-numeric-down"></i>
        </span>
      </div>
      </div>
    <div class="form__field form-icon">
      <input type="text" name="lugar" placeholder="Lugar" title="Ingrese Lugar" required>
      <span class="input-icon">
        <i class="fas fa-directions"></i>
      </span>
    </div>

    <div class="form__field form-icon">
      <input type="date" name="fecha" title="Fecha Incio" required>
      <span class="input-icon">
        <i class="fas fa-calendar-check"></i>
      </span>
    </div>

    <div class="form__field form-icon">
      <input type="date" name="fecha_fin" title="Fecha Fin" required>
      <span class="input-icon">
        <i class="far fa-calendar-times"></i>
      </span>
    </div>

    <div class="form__field form-icon">
      <input type="area" name="descripcion" placeholder="Descripción" title="Ingrese Descripción" required>
      <span class="input-icon">
        <i class="fas fa-file-prescription"></i>
      </span>
    </div>
    <div class="form__field ">
            <input name="poster" type="file" title="Poster">
      </div>

    <div class="display-flex">

      <!--          -->
      <!-- REGISTER -->
      <!--          -->
      <input type="submit" name="registrar" value="Registrar" class="btn btn-x2" title="Registrar Capacitación">
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php 
 include_once "../../template/alert.php";
