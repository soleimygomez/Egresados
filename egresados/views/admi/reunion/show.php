<div class="container-section-main">
    <div class="container container-image-svg position-relative">
        <img src="../../../assets/img/reunion.jpg" class="image-80 image-dark">

        <div class="container-headers-absolute-center container-headers-absolute-center-section">
            <h1 class="title">Reunion</h1>
            <h2 class="subtitle">Lista Reuniones</h2>
            <a class="btn" href="ir-registro.php" title="Agregar Reunión!">Agregar</a>
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
			    <th>TEMA</th>
                <th>FECHA</th>
                <th>DESCRIPCIÓN</th>
                <th>LUGAR</th>
				<th>CUPO DISPONIBLE</th>
				<th>CUPO</th>
                <th>ACCIONES</th>
				
				
				
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaReunion as $reunion) { ?>
                <tr><th> <?php echo $reunion->getId(); ?> </th>
				    <td> <?php echo $reunion->getTema(); ?> </td>
                    <td> <?php echo $reunion->getFecha(); ?></td>
                    <td> <?php echo $reunion->getDescripcion(); ?></td>
                    <td> <?php echo $reunion->getLugar(); ?> </td>
                   <td> <?php  echo $reunion->getCupoDisponible(); ?> </td>
				   <td> <?php  echo $reunion->getCupo(); ?> </td>
                    <td class="display-flex">
                        <a href="?controller=reunion&&action=updateshow&&id=<?php echo $reunion->getId() ?>" title="Editar Reunión" class="link">
                            <span>
                                <i class="far fa-edit icon-awasome awasome-editar"></i>
                            </span>
                        </a>
                        <a id="elimi" href="#"  title="Eliminar Reunion" class="link" data-id="<?php echo $reunion->getId() ?>" >
                             <span>
                                <i class="far fa-trash-alt icon-awasome awasome-eliminar"></i>
                            </span>
                        </a>
						<a title="Ver imagen"   onclick="otra('img_<?php echo $reunion->getId() ?>')">
                        <div  > 
                                    <?php if (is_null($reunion->getPoster())) { ?>
                                        <img src="../../../assets/img/usuario.jpg" style="height:100px; width:100px;"   >
                                    <?php } else { ?>
                                        <img  style="height:100px; width:100px;"  src="data:image/jpeg;base64,<?php echo base64_encode($reunion->getPoster()); ?>">
                                    <?php } ?>

                        </div>
                        <div id="img_<?php echo $reunion->getId()?>" class="img-full" > 
                                    <?php if (is_null($reunion->getPoster())) { ?>
                                        <img src="../../../assets/img/usuario.jpg"    >
                                    <?php } else { ?>
                                        <img   src="data:image/jpeg;base64,<?php echo base64_encode($reunion->getPoster()); ?>">
                                    <?php } ?>
                         <a class="cerra-img" onclick="cerrar('img_<?php echo $reunion->getId() ?>')">X</a>            
                        </div>
                         </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!--       -->
<!-- MODAL -->
<!--       -->
<style>


.img-full{
    width:600px;
    height:600px;
    display: flex;
    justify-content:center;
    align-content:center;
    border-radius:15px;
    transition: all .5s linear;
    opacity: 0;
    visibility: hidden;
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    z-index:1000;
    background: rgba(255,255,255,0.5);
    box-shadow: 0px 0px 30px -5px #34322f;
   
}
.img-full img{

    width:100%;
    height:100%;
    position:relative;
    z-index:1000;

}
.dataTables_wrapper .dataTables_scroll .dataTables_scrollBody,


.table-generic,.dataTables_wrapper,.dataTables_scroll{
    overflow:visible !important
    ;


}
.img-full.cualquier
{
    opacity: 1;
    visibility: visible;
}
.cerra-img {
    width: 50px;
    height: 40px;
    border-radius:50%;
    color:#fff;
    background:rgba(1,1,1,0.5);
    line-height: 40px;
    border:1px solid #fff;
    transition: all .5s linear;

}
.cerra-img:hover {
    
    border-color: #e2031a ;
    background:rgba(255,255,255,0.5);
    color:#e2031a ;
   

}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

        function otra(img){
        var holi=document.getElementById(img);
        console.log(""+holi);
        holi.classList.add("cualquier");
         }
        function cerrar(img){
            var holi=document.getElementById(img);
            console.log(""+holi);
            holi.classList.remove("cualquier");
        }
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
            window.location = "?controller=reunion&&action=delete&&id="+id;
           
           
        }
        })
    
                                        });

         
</script>
<?php 
 include_once "../../template/alert.php";
 