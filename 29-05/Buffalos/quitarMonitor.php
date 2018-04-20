<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionMonitores.php");
	$con = conectarBD();
	$monitor = $_SESSION['monitor'];
	unset($_SESSION['monitor']);
	borrarMonitor($con, $monitor['id_persona']);
	Header("Location: paginaMonitores.php");	
	
?>