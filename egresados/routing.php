<?php 

$controllers=array(
	'usuario'=>['index','register','save','show','updateshow','update','delete','search','profile','newFoto','updateUsuario'],
	'capacitacion'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'encuesta'=>['index','register','save','show','updateshow','update','delete','search','error'],
	'oferta'=>['index','register','save','show','updateshow','updateshow2','update','delete','search','error', 'restriction', 'saverestriction'],
	'reunion'=>['index','register','save','show','updateshow','update','delete','search','error'],
);


if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	} 
	else{
		echo '<script>
        alert("ERROR");
         location.href="ir-registro.php";
        </script>';
		call('capacitacion','error');
		call('oferta','error');
		call('encuesta','error');
		call('reunion','error');
		call('usuario','error');
		
	}		
}else{
	echo("error");
} 

function call($controller, $action){
	require_once('controllers/'.$controller.'Controller.php');

	switch ($controller) {
	
		case 'usuario':
		require_once('models/UsuarioModel.php');
		require_once('models/CapacitacionModel.php');
		require_once('models/OfertaModel.php');
		require_once('models/EncuestaModel.php');
		require_once('models/ReunionModel.php');
		require_once('models/TipoUsuarioModel.php');
		
		$controller= new UsuarioController();
		break;
		
            
        case 'capacitacion':
		require_once('models/CapacitacionModel.php');
		$controller= new CapacitacionController();
		break;

		case 'oferta':
		require_once('models/Oferta.php');
		$controller= new OfertaController();
		break;
        
        case 'encuesta':
		require_once('models/Encuesta.php');
		$controller= new EncuestaController();
		break;
        
        
       
		case 'reunion':
		require_once('models/Reunion.php');
		$controller= new ReunionController();
		break;

        
		default:
				# code...
		break;

	}
	$controller->{$action}();
}
?>