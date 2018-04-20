<?php
	include("gestiones/gestionBD.php");
	$con = conectarBD();
    $nombreInstituto = $_REQUEST["a"];
	$resul = $con -> query("SELECT PAQUETES.NOMBRE FROM PAQUETES,INSTITUTOS WHERE PAQUETES.ID_PAQUETE = INSTITUTOS.ID_PAQUETE AND INSTITUTOS.NOMBRE = '$nombreInstituto'");
	$resul2 = $resul -> fetch();
	echo $resul2['NOMBRE'];
?>