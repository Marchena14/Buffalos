<?php
    session_start();
	$instituto['id_instituto'] = $_REQUEST['id_instituto'];
	$instituto['id_paquete'] = $_REQUEST['id_paquete'];
	$instituto['nombre'] = $_REQUEST['nombre'];
	$instituto['direccion'] = $_REQUEST['direccion'];
	$instituto['codpostal'] = $_REQUEST['codpostal'];
	$instituto['paquete'] = $_REQUEST['paquete'];
	$_SESSION['instituto'] = $instituto;
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaInstitutos.php");
	else if(isset($_REQUEST['anadir'])) Header("Location: ../anadirInstituto.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarInstituto.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarInstituto.php");



?>