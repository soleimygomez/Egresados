<?php

$_URL_CORE_ = $_SESSION['_URL_CORE_'];
$_URL_CORE_CONTROLLER_ = "../";

// STATUS LOGUEADO
$_STATU_LOGIN_=true;
$_STATU_HOME_= false;

// VERIFICACIÓN
include_once($_URL_CORE_ . 'views/template/template.php');
require_once($_URL_CORE_ . 'views/template/admi/navbar.php');

if ($_IS_SHOW_) {
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datos").DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: " Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 800,
                lengthMenu: [
                    [10, 25, -1],
                    [10, 25, "All"]
                ],
            });
        });
    </script>
<?php
}

// TEMPLATES HTML
include_once($_URL_CORE_ . 'routing.php');


if ($_IS_SHOW_) {
    ?>
        <!--     -->
        <!-- JS  -->
        <!--     -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
        <!-- DATATABLES -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
        </script>
<?php } 
require_once($_URL_CORE_ . 'views/template/footer.php');