<?php
    session_start();
	include("../gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['descripcion']="";
	$formulario['precio']="";
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
}

	$con = conectarBD();
	try{
	$stmt = $con -> prepare("CALL alta_paquete(:nombre, :descripcion, :precio)");
	$stmt -> bindParam(":nombre", $formulario['nombre']);
	$stmt -> bindParam(":descripcion", $formulario['descripcion']);
	$stmt -> bindParam(":precio", $formulario['precio']);
	
	$stmt -> execute();

	Header("Location: ../paginaPaquetes.php");
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: ../pagError.php");
		exit();
	}


?>