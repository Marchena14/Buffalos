<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionMonitores.php");
	$con = conectarBD();
	$monitor = $_SESSION['monitor'];
	unset($_SESSION['monitor']);
	modificar_monitor($con, $monitor['id_persona'], $monitor['nombre'], $monitor['apellidos'], $monitor['dni'], $monitor['fnac'], $monitor['telefono'], $monitor['email'], $monitor['direccion'], $monitor['tipomonitor']);
	Header("Location: paginaMonitores.php");	
	
?>