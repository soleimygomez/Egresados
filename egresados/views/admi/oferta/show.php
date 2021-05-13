<div class="container-section-main">
    <div class="container container-image-svg position-relative">
        <img src="../../../assets/img/oferta.jpg" class="image-80 image-dark">

        <div class="container-headers-absolute-center container-headers-absolute-center-section">
            <h1 class="title">Oferta Empleo</h1>
            <h2 class="subtitle">Lista Ofertas</h2>
            <a class="btn" href="ir-registro.php" title="Agregar Oferta!">Agregar</a>
        </div>
        <div <div class="container-svg">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-0.27,23.19 C170.71,199.83 205.70,95.22 500.84,-0.48 L500.00,150.00 L0.00,150.00 Z">
                </path>
            </svg>
        </div>
    </div>

    <table id="datos" class="table-generic capaciacion__tabla">
        <thead>
            <tr><th>ID</th>
                <th>EMPRESA</th>
                <th>VACANTES</th>
                <th>CARGO</th>
                <th>CIUDAD</th>
                <th>UBICACIÓN</th>
                <th>FECHA</th>
                <th>DESCRIPCIÓN</th>
                <th class="hidden-display">REQUISITOS</th>
                <th>ACCIÓN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            foreach ($listaOferta as $oferta) { ?>
                <tr> <th> <?php echo $oferta->getId(); ?></th>
                    <td> <?php echo $oferta->getEmpresa(); ?></td>
                    <td> <?php echo $oferta->getVacantes(); ?></td>
                    <td> <?php echo $oferta->getCargo(); ?> </td>
                    <td> <?php echo $oferta->getCiudad(); ?></td>
                    <td> <?php echo $oferta->getUbicacion(); ?> </td>
                    <td> <?php echo $oferta->getFecha(); ?></td>
                    <td> <?php echo $oferta->getDescripcion(); ?> </td>
                    <td class="hidden-display"> <?php foreach ($oferta->getRequisitos() as $requisito) { ?>
                            <li><?php echo $requisito->getDescripcion(); ?></li>
                        <?php } ?>
                    </td>
                    <td class="display-flex" style="min-height: 100% !important">
                        <a href="?controller=oferta&&action=updateshow&&id=<?php echo $oferta->getId() ?>" title="Editar Encuesta" class="link">
                            <span>
                                <i class="far fa-edit icon-awasome"></i>
                            </span>
                        </a>

                        <a title="Ver Requisitos" class="link" onclick="viewReq(<?php echo $contador ?>)">
                            <span>
                                <i class="far fa-eye icon-awasome"></i>
                            </span>
                        </a>
                        <a href="?controller=oferta&&action=restriction&&id=<?php echo $oferta->getId() ?>" title="Agregar Requisito" class="link">
                            <span>
                                <i class="fas fa-file-signature icon-awasome"></i>
                            </span>
                        </a>
                        <a id="elimi" href="#"  title="Eliminar Oferta" class="link" data-id="<?php echo $oferta->getId() ?>" >
                           <span>
                                <i class="far fa-trash-alt icon-awasome"></i>
                            </span>
                        </a>
                    </td>
                </tr>
            <?php $contador = $contador + 1;
            } ?>
        </tbody>
    </table>
</div>


<!--       -->
<!-- MODAL -->
<!--       -->
<div class="container-dialog" id="container-dialog_views-ofert-req">
    <div class="dialog">
        <div class="dialog__container-image">
            <img title="Nuestra Portada!" alt="Error Mostrar Nuestra Portada!" src="../../../assets/img/empleo.jpg">
        </div>
        <div class="dialog__container__info">
            <h1 id="title">Requisitos</h1>
            <div id="dialog-info__info"></div>
        </div>
        <a class="dialog__link-close link icon" onclick="closeDialogOfert()">X</a>
    </div>
</div>

<script>
    function viewReq(id){
        viewDialogOfert();
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

        $("#elimi").click(function(ev){
            ev.preventDefault();
            var id=($(this).parents('tr').find('th').text());
            Swal.fire({
        title: '¿Quieres eliminar el registro '+id+'?',
        text: "El registro sera eliminado permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
        }).then((result) => {
        if (result.value) {
            window.location = "?controller=oferta&&action=delete&&id="+id;
           
           
        }
        })
    
                                        });

         
</script>
<?php
include_once "../../template/alert.php";
