<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionActividades.php");
$con = conectarBD();
if(isset($_SESSION['actividad'])){
	$act = $_SESSION['actividad'];
}else{
	
}

$total = compruebaExiste($con, $act['id_persona'], $act['id_actividad']);
if($total !=1){
	$_SESSION['errores'] = "No puede borrar un monitor que no existe";
	
}else{
	anadirMonitorActividad($con, $act['id_persona'], $act['id_actividad']);
	
}
Header("Location: ./paginaActividades.php");

?>