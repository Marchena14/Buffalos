<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionProductos.php");
$con = conectarBD();
$producto = $_SESSION['producto'];
unset($_SESSION['producto']);
borrarProducto($con, $producto['id_producto']);
Header("Location: paginaProductos.php");	


?>