<?php
    session_start();
	include("../gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['descripcion']="";
	$formulario['tiempo']="1";
	$formulario['paquete']="";
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
}

	$con = conectarBD();
	try{
	$stmt = $con -> prepare("CALL crear_actividad(:nombre, :descripcion, :tiempo)");
	$stmt -> bindParam(":nombre", $formulario['nombre']);
	$stmt -> bindParam(":descripcion", $formulario['descripcion']);
	$stmt -> bindParam(":tiempo", $formulario['tiempo']);
	$stmt -> execute();
	
	$stmt3 = $con -> query("SELECT MAX(ID_ACTIVIDAD) AS ID FROM ACTIVIDADES");
	$stmt4 = $stmt3->fetch();
	
	
	$stmt2 = $con -> prepare("CALL alta_actividadpaquete(:idActividad, :idPaquete)");
	$stmt2 -> bindParam(":idActividad",$stmt4['ID']);
	$stmt2 -> bindParam(":idPaquete",$formulario['paquete']);
	$stmt2 -> execute();
	Header("Location: ../paginaActividades.php");
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: ../pagError.php");
	}


?>