<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionActividades.php");
	$con = conectarBD();
	$actividad = $_SESSION['actividad'];
	unset($_SESSION['actividad']);
	modificar_actividad($con, $actividad['id_actividad'], $actividad['nombre'], $actividad['descripcion'], $actividad['tiempo']);
	Header("Location: paginaActividades.php");	
	
	
?>