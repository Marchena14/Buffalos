<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionActividades.php");
$con = conectarBD();
$actividad = $_SESSION['actividad'];
unset($_SESSION['actividad']);
borrarActividad($con, $actividad['id_actividad']);
Header("Location: paginaActividades.php");	
?>