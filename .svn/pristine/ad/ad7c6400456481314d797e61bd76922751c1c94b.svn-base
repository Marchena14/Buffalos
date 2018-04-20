<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionActividades.php");
$con = conectarBD();
$pageNum = $_SESSION['page_num'];
$pageSiz = $_SESSION['page_size'];
if(isset($_SESSION['actividad'])){
	$act = $_SESSION['actividad'];
}else{
	
}

$total = compruebaExiste($con, $act['ID_PERSONA_BORRAR'], $act['id_actividad']);
if($total !=1){
	$_SESSION['errores'] = "No puede borrar un monitor que no existe";
	
}else{
	borrarMonitorActividad($con, $act['ID_PERSONA_BORRAR'], $act['id_actividad']);
	
}
Header("Location: ./paginaActividades.php?page_num=$pageNum&page_size=$pageSiz");

?>