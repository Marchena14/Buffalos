<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionBuffalos.php");
$con = conectarBD();
$buffalo = $_SESSION['buffalo'];
unset($_SESSION['buffalo']);
borrarBuffalo($con, $buffalo['id_persona']);
Header("Location: paginaBuffalos.php");	

?>