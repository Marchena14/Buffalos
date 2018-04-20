<?php
    session_start();
	include("../gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['direccion']="";
	$formulario['codPostal']="";
	$formulario['paquete']="";
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
}

	$con = conectarBD();
	try{
	$stmt = $con -> prepare("CALL alta_instituto(:nombre, :direccion, :codPostal, :paquete)");
	$stmt -> bindParam(":nombre", $formulario['nombre']);
	$stmt -> bindParam(":direccion", $formulario['direccion']);
	$stmt -> bindParam(":codPostal", $formulario['codPostal']);
	$stmt -> bindParam(":paquete", $formulario['paquete']);
	$stmt -> execute();

	Header("Location: ../paginaInstitutos.php");
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: ../pagError.php");
	}


?>