<?php
    session_start();
	$actividad['id_actividad'] = $_REQUEST['id_actividad'];
	$actividad['ID_PERSONA_BORRAR'] = $_REQUEST['select_monitor_borrar'];
	$actividad['nombre'] = $_REQUEST['nombre'];
	$actividad['descripcion'] = $_REQUEST['descripcion'];
	$actividad['tiempo'] = $_REQUEST['tiempo'];
	$actividad['id_persona'] = $_REQUEST['select_monitores'];
	$_SESSION['actividad'] = $actividad;
	$pageNum = $_SESSION['page_num'];
	$pageSiz = $_SESSION['page_size'];
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaActividades.php?page_num=$pageNum&page_size=$pageSiz");
	else if(isset($_REQUEST['anadir'])) Header("Location: anadirActividad.php");
	else if(isset($_REQUEST['anadirMonitor'])) Header("Location: ../anadirMonitorActividad.php");
	else if(isset($_REQUEST['borrarMonitor'])) Header("Location: ../borrarMonitorActividad.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarActividad.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarActividad.php");



?>