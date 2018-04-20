<?php
    session_start();
	$producto['id_producto'] = $_REQUEST['id_producto'];
	$producto['nombre'] = $_REQUEST['nombre'];
	$producto['descripcion'] = $_REQUEST['descripcion'];
	$producto['precioPvp'] = $_REQUEST['precioPvp'];
	$producto['precioIns'] = $_REQUEST['precioIns'];
	$_SESSION['producto'] = $producto;
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaProductos.php");
	else if(isset($_REQUEST['anadir'])) Header("Location: ../anadirProducto.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarProducto.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarProducto.php");



?>