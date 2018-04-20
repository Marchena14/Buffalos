<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionPaquetes.php");
	$con = conectarBD();
	$paquete = $_SESSION['paquete'];
	unset($_SESSION['paquete']);
	modificar_paquete($con, $paquete['id_paquete'], $paquete['nombre'], $paquete['descripcion'], $paquete['precio']);
	Header("Location: paginaPaquetes.php");	
	
	
?>