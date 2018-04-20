<?php
    session_start();
	$paquete['id_paquete'] = $_REQUEST['id_paquete'];
	$paquete['nombre'] = $_REQUEST['nombre'];
	$paquete['descripcion'] = $_REQUEST['descripcion'];
	$paquete['precio'] = $_REQUEST['precio'];
	$_SESSION['paquete'] = $paquete;
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaPaquetes.php");
	else if(isset($_REQUEST['anadir'])) Header("Location: ../anadirPaquete.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarPaquete.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarPaquete.php");



?>