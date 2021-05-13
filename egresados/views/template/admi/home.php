<div class="container-section-main">

    <!--          -->
    <!-- REPORTES -->
    <!--          -->
    <section class="container-home-reports">
        <h2 class="title">Generar Reportes</h2>

        <!--     -->
        <!-- ADD -->
        <!--     -->
        <div class="container-dropdown">
            <button class="btn-dropdown">
                <span>Agregar</span>
                <i class="fas fa-chevron-down btn-dropdown-icon"></i>

                <ul class="dropdown">
                    <li class="container-dropdown__active"><a href="<?php echo $_URL_CORE_CONTROLLER_ ?>capacitacion/ir-registro.php">Capacitación</a></li>
                    <li> <a href="<?php echo $_URL_CORE_CONTROLLER_ ?>egresado/ir-registro.php"> Egresado</a></li>
                    <li> <a href="<?php echo $_URL_CORE_CONTROLLER_ ?>reunion/ir-registro.php">Reunion</a></li>
                    <li> <a href="<?php echo $_URL_CORE_CONTROLLER_ ?>encuesta/ir-registro.php"> Encuesta</a></li>
                    <li> <a href="<?php echo $_URL_CORE_CONTROLLER_ ?>oferta/ir-registro.php">Oferta Empleo</a></li>
                </ul>
            </button>
        </div>

        <table border="4">

            <!--          -->
            <!-- EGRESADO -->
            <!--          -->
            <tr>
                <td colspan="2">

                    <div class="container-form-pdf">
                        <form class="display-flex" action="<?php echo $_URL_CORE_ ?>controllers/reports/egresado.php" method="POST">
                            <h2 class="title">Reporte Egresados</h2>
                            <div class="form__field-x2 display-flex-between">
                                <div class="form__field">
                                    <input type="date" id="desdefecha_egresado" placeholder="desde fecha" required title="Fecha Inicio" name="desdefecha">
                                </div>
                                <div class="form__field">
                                    <input type="date" id="hastafecha_egresado" placeholder="hasta fecha" required="" title="Fecha Fin" name="hastafecha">
                                </div>
                            </div>

                            <div class="display-flex-between container-btn-pdf">
                                <input type="submit" value="Generar" class="btn btn-x2">
                            </div>
                        </form>
                        <input class="btn  btn-view-table-pdf_ fas fa-eye" id="btn-view-pdf-egresado" value="&#xf002" placeholder="<?php echo $_URL_CORE_ ?>">
                    </div>


                    <table class="view-data-pdf table-generic" id="container-form-pdf-egresado">
                        <thead>
                            <tr>
                                <th>N.</th>
                                <th>NOMBRE</th>
                                <th>CODIGO</th>
                                <th>EMAIL</th>
                                <th>ACTUALIZADO</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-egresado-add-pdf-view"></tbody>
                    </table>
                </td>
            </tr>


            <!--         -->
            <!-- REUNIÓN -->
            <!--         -->
            <tr>
                <td colspan="2">
                    <div class="container-form-pdf">
                        <form class="display-flex" action="<?php echo $_URL_CORE_ ?>controllers/reports/reunion.php" method="POST">
                            <h2 class="title">Reporte Reuniones</h2>
                            <div class="form__field-x2 display-flex-between">
                                <div class="form__field">
                                    <input type="date" name="desdefecha" id="desdefecha_reunion" placeholder="desde fecha" required title="Fecha Inicio">
                                </div>
                                <div class="form__field">
                                    <input type="date" name="hastafecha" id="hastafecha_reunion" placeholder="hasta fecha" required="" title="Fecha Fin">
                                </div>
                            </div>

                            <div class="display-flex-between container-btn-pdf">
                                <input type="submit" value="Generar" class="btn btn-x2">
                            </div>
                        </form>
                        <input class="btn  btn-view-table-pdf_ fas fa-eye" id="btn-view-pdf-reunion" value="&#xf002" placeholder="<?php echo $_URL_CORE_ ?>">
                    </div>

                    <table class="view-data-pdf table-generic" id="container-form-pdf-reunion">
                        <thead>
                            <tr>
                                <th>N.</th>
                                <th>TEMA</th>
                                <th>FECHA</th>
                                <th>CUPO</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-reunion-add-pdf-view"></tbody>
                    </table>

                </td>
            </tr>

            <!--               -->
            <!-- CAPACITACIÓN  -->
            <!--               -->
            <tr>
                <td colspan="2">

                    <div class="container-form-pdf">
                        <form class="display-flex" action="<?php echo $_URL_CORE_ ?>controllers/reports/capacitacion.php" method="POST">
                            <h2 class="title">Reporte Capacitaciones</h2>
                            <div class="form__field-x2 display-flex-between">
                                <div class="form__field">
                                    <input type="date" name="desdefecha" id="desdefecha_capacitacion" placeholder="desde fecha" required title="Fecha Inicio">
                                </div>
                                <div class="form__field">
                                    <input type="date" name="hastafecha" id="hastafecha_capacitacion" placeholder="hasta fecha" required="" title="Fecha Fin">
                                </div>
                            </div>

                            <div class="display-flex-between container-btn-pdf">
                                <input type="submit" value="Generar" class="btn btn-x2">
                            </div>
                        </form>
                        <input class="btn  btn-view-table-pdf_ fas fa-eye" id="btn-view-pdf-capacitacion" value="&#xf002" placeholder="<?php echo $_URL_CORE_ ?>">
                    </div>

                    <table class="view-data-pdf table-generic" id="container-form-pdf-capacitacion">
                        <thead>
                            <tr>
                                <th>N.</th>
                                <th>TEMA</th>
                                <th>FECHA</th>
                                <th>CUPO</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-capacitacion-add-pdf-view"></tbody>
                    </table>

                </td>
            </tr>

            <!--           -->
            <!-- ENCUESTA  -->
            <!--           -->
            <tr>
                <td colspan="2">

                    <div class="container-form-pdf">
                        <form class="display-flex" action="<?php echo $_URL_CORE_ ?>controllers/reports/encuesta.php" method="POST">
                            <h2 class="title">Reporte Encuestas</h2>
                            <div class="form__field-x2 display-flex-between">
                                <div class="form__field">
                                    <input type="date" id="desdefecha_encuesta" name="desdefecha" placeholder="desde fecha" required title="Fecha Inicio">
                                </div>
                                <div class="form__field">
                                    <input type="date" id="hastafecha_encuesta" name="hastafecha" placeholder="hasta fecha" required title="Fecha Fin">
                                </div>
                            </div>

                            <div class="display-flex-between container-btn-pdf">
                                <input type="submit" value="Generar" class="btn btn-x2">
                            </div>
                        </form>

                        <input class="btn  btn-view-table-pdf_ fas fa-eye" id="btn-view-pdf-encuesta" value="&#xf002" placeholder="<?php echo $_URL_CORE_ ?>">
                    </div>

                    <table class="view-data-pdf table-generic" id="container-form-pdf-encuesta">
                        <thead>
                            <tr>
                                <th>N.</th>
                                <th>URL</th>
                                <th>FECHA</th>
                                <th>CORREO UNIVERSIDAD</th>
                                <th>TIEMPO</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-encuesta-add-pdf-view"></tbody>
                    </table>

                </td>
            </tr>

            <!--                 -->
            <!-- OFERTA LABORAL  -->
            <!--                 -->
            <tr>
                <td colspan="2">
                    <div class="container-form-pdf">
                        <form class="display-flex" action="<?php echo $_URL_CORE_ ?>controllers/reports/oferta.php" method="POST">
                            <h2 class="title">Reporte Ofertas Laborales</h2>
                            <div class="form__field-x2 display-flex-between">
                                <div class="form__field">
                                    <input type="date" id="desdefecha_oferta" name="desdefecha" placeholder="desde fecha" required title="Fecha Inicio">
                                </div>
                                <div class="form__field">
                                    <input type="date" id="hastafecha_oferta" name="hastafecha" placeholder="hasta fecha" required="" title="Fecha Fin">
                                </div>
                            </div>
                            <div class="display-flex-between container-btn-pdf">
                                <input type="submit" value="Generar" class="btn btn-x2">
                            </div>
                        </form>
                        <input class="btn  btn-view-table-pdf_ fas fa-eye" id="btn-view-pdf-oferta" value="&#xf002" placeholder="<?php echo $_URL_CORE_ ?>">
                    </div>

                    <table class="view-data-pdf table-generic" id="container-form-pdf-oferta">
                        <thead>
                            <tr>
                                <th>N.</th>
                                <th>EMPRESA</th>
                                <th>CARGO</th>
                                <th>UBICACIÓN</th>
                                <th>VACANTES</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-oferta-add-pdf-view"></tbody>
                    </table>
                </td>
            </tr>
        </table>
    </section>
</div>