<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionInstitutos.php");
	$con = conectarBD();
	$instituto = $_SESSION['instituto'];
	unset($_SESSION['instituto']);
	modificar_instituto($con, $instituto['id_instituto'], $instituto['id_paquete'],$instituto['nombre'], $instituto['direccion'], $instituto['codpostal'], $instituto['paquete']);
	Header("Location: paginaInstitutos.php");
	
?>