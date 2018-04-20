<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionBuffalos.php");
	$con = conectarBD();
	$buffalo = $_SESSION['buffalo'];
	unset($_SESSION['buffalo']);
	modificar_buffalo($con, $buffalo['id_persona'], $buffalo['nombre'], $buffalo['apellidos'], $buffalo['dni'], $buffalo['fnac'], $buffalo['telefono'], $buffalo['email'], $buffalo['direccion'], $buffalo['cargo']);
	Header("Location: paginaBuffalos.php");	
	
?>