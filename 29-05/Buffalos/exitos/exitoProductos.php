<?php
    session_start();
	include("../gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['descripcion']="";
	$formulario['precioPvp']="";
	$formulario['precioIns']="";
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
}

	$con = conectarBD();
	try{
	$stmt = $con -> prepare("CALL alta_producto(:nombre, :descripcion, :precioPvp, :precioIns)");
	$stmt -> bindParam(":nombre", $formulario['nombre']);
	$stmt -> bindParam(":descripcion", $formulario['descripcion']);
	$stmt -> bindParam(":precioPvp", $formulario['precioPvp']);
	$stmt -> bindParam(":precioIns", $formulario['precioIns']);
	
	$stmt -> execute();

	Header("Location: ../paginaProductos.php");
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: ../pagError.php");
		exit();
	}


?>