<?php
    session_start();
	$monitor['id_persona'] = $_REQUEST['id_persona'];
	$monitor['nombre'] = $_REQUEST['nombre'];
	$monitor['apellidos'] = $_REQUEST['apellidos'];
	$monitor['dni'] = $_REQUEST['dni'];
	$monitor['fnac'] = $_REQUEST['fnac'];
	$monitor['telefono'] = $_REQUEST['telefono'];
	$monitor['email'] = $_REQUEST['email'];
	$monitor['direccion'] = $_REQUEST['direccion'];
	$monitor['tipomonitor'] = $_REQUEST['tipomonitor'];
	$_SESSION['monitor'] = $monitor;
	$page_num = $_SESSION['page_num'];
	$page_size = $_SESSION['page_size'];
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaMonitores.php?page_num=$page_num&page_size=$page_size");
	else if(isset($_REQUEST['anadir'])) Header("Location: ../anadirMonitor.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarMonitor.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarMonitor.php");



?>