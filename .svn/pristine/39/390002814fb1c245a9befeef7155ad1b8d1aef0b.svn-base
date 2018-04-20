<?php
    session_start();
	$paquete['id_paquete'] = $_REQUEST['id_paquete'];
	$paquete['nombre'] = $_REQUEST['nombre'];
	$paquete['descripcion'] = $_REQUEST['descripcion'];
	$paquete['precio'] = $_REQUEST['precio'];
	$_SESSION['paquete'] = $paquete;
	
	$page_num = $_SESSION['page_num'];
	$page_size = $_SESSION['page_size'];
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaPaquetes.php?page_num=$page_num&page_size=$page_size");
	else if(isset($_REQUEST['anadir'])) Header("Location: ../anadirPaquete.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarPaquete.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarPaquete.php");



?>