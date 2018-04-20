<?php
    session_start();
	$buffalo['id_persona'] = $_REQUEST['id_persona'];
	$buffalo['nombre'] = $_REQUEST['nombre'];
	$buffalo['apellidos'] = $_REQUEST['apellidos'];
	$buffalo['dni'] = $_REQUEST['dni'];
	$buffalo['fnac'] = $_REQUEST['fnac'];
	$buffalo['telefono'] = $_REQUEST['telefono'];
	$buffalo['email'] = $_REQUEST['email'];
	$buffalo['direccion'] = $_REQUEST['direccion'];
	$buffalo['cargo'] = $_REQUEST['cargo'];
	$_SESSION['buffalo'] = $buffalo;
	$page_num = $_SESSION['page_num'];
	$page_size = $_SESSION['page_size'];
	
	if(isset($_REQUEST['editar'])) Header("Location: ../paginaBuffalos.php?page_num=$page_num&page_size=$page_size");
	else if(isset($_REQUEST['anadir'])) Header("Location: ../anadirBuffalo.php");
	else if(isset($_REQUEST['quitar'])) Header("Location: ../quitarBuffalo.php");
	else if(isset($_REQUEST['grabar'])) Header("Location: ../modificarBuffalo.php");



?>