<?php
    session_start();
	include("gestiones/gestionBD.php");
	include("gestiones/gestionProductos.php");
	$con = conectarBD();
	$producto = $_SESSION['producto'];
	unset($_SESSION['producto']);
	modificar_producto($con, $producto['id_producto'], $producto['nombre'], $producto['descripcion'], $producto['precioPvp'], $producto['precioIns']);
	Header("Location: paginaProductos.php");	
	
	
?>