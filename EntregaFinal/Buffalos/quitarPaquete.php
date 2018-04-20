<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionPaquetes.php");
$con = conectarBD();
$paquete = $_SESSION['paquete'];
unset($_SESSION['paquete']);
borrarPaquete($con, $paquete['id_paquete']);
Header("Location: paginaPaquetes.php");	


?>