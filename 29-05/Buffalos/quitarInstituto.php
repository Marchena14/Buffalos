<?php
session_start();
include("gestiones/gestionBD.php");
include("gestiones/gestionInstitutos.php");
$con = conectarBD();
$instituto = $_SESSION['instituto'];
unset($_SESSION['instituto']);
borrarInstituto($con, $instituto['id_instituto']);
Header("Location: paginaInstitutos.php");
?>