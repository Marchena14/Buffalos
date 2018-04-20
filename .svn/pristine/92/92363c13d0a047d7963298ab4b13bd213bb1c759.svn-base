<?php
    session_start();
	$actividad['id_actividad'] = $_REQUEST['id_actividad'];
	$actividad['nombre'] = $_REQUEST['nombre'];
	$actividad['descripcion'] = $_REQUEST['descripcion'];
	$actividad['tiempo'] = $_REQUEST['tiempo'];
	$actividad['id_persona'] = $_REQUEST['select_monitores'];
	$_SESSION['actividad'] = $actividad;
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaActividades.php");
	else if(isset($_REQUEST['anadir'])) Header("Location: anadirActividad.php");
	else if(isset($_REQUEST['anadirMonitor'])) Header("Location: ../anadirMonitorActividad.php");
	else if(isset($_REQUEST['borrarMonitor'])) Header("Location: ../borrarMonitorActividad.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarActividad.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarActividad.php");



?>