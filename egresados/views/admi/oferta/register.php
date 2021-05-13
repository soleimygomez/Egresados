<!--                    -->
<!-- CONTAINER REGISTER -->
<!--                    -->
<div class="container-register-section position-relative">
    <img src="../../../assets/img/svg/oferta.svg">

    <form action="?controller=oferta&&action=save" method="POST" class="register-form">

        <h1 class="title"> Registro Ofertas </h1>

        <div class="form__field form-icon">
            <input type="text" name="empresa" placeholder="Empresa" title="Ingrese Empresa" required>
            <span class="input-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </span>
        </div>

        <div class="form__field-x2 display-flex-between">
            <div class="form__field form-icon">
                <input type="number" name="vacante" placeholder="Vacantes" title="Ingrese Vacantes" required>
                <span class="input-icon">
                    <i class="fas fa-user-tie"></i>
                </span>
            </div>

            <div class="form__field form-icon">
                <input type="text" name="cargo" placeholder="Cargo" title="Ingrese Cargo" required>
                <span class="input-icon">
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
        </div>

        <div class="form__field-x2 display-flex-between">
            <div class="form__field form-icon">
                <input type="text" name="ciudad" placeholder="Ciudad" title="Ingrese Ciudad" required>
                <span class="input-icon">
                    <i class="fas fa-city"></i>
                </span>
            </div>

            <div class="form__field form-icon">
                <input type="text" name="ubicacion" placeholder="Ubicación" title="Ingrese Ubicación" required>
                <span class="input-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
            </div>
        </div>


        <div class="form__field form-icon">
            <input type="date-time" name="fecha" title="Ingrese Fecha" required>
            <span class="input-icon">
                <i class="fas fa-calendar-check"></i>
            </span>
        </div>

        <div class="form__field form-icon">
            <input type="area" name="descripcion" placeholder="Descripción" title="Ingrese Descripción" required>
            <span class="input-icon">
                <i class="fas fa-file-prescription"></i>
            </span>
        </div>

        <div class="display-flex">

            <!--          -->
            <!-- REGISTER -->
            <!--          -->
            <input type="submit" name="registrar" value="Registrar" class="btn btn-x2" title="Registrar Oferta Empleo">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
include_once "../../template/alert.php";
