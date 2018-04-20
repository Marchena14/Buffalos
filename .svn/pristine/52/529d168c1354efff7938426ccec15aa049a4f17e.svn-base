<?php
    session_start();
	$_SESSION['paginaActual'] = "exitoMonitores.php";
	include("../gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['apellidos']="";
	$formulario['dia']="1";
	$formulario['mes']="";
	$formulario['anyo']="2016";
	$formulario['dniN']="";
	$formulario['dniL']="";
	$formulario['telefono']="";
	$formulario['direccion']="";
	$formulario['email']="";
	$formulario['tipoMonitor']="";
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
	switch($formulario['mes']){
		case 'Enero':
			$mes="01";
			break;
		case 'Febrero':
			$mes="02";
			break;
		case 'Marzo':
			$mes="03";
			break;
		case 'Abril':
			$mes="04";
			break;
		case 'Mayo':
			$mes="05";
			break;
		case 'Junio':
			$mes="06";
			break;
		case 'Julio':
			$mes="07";
			break;
		case 'Agosto':
			$mes="08";
			break;
		case 'Septiembre':
			$mes="09";
			break;
		case 'Octubre':
			$mes="10";
			break;
		case 'Noviembre':
			$mes="11";
			break;
		case 'Diciembre':
			$mes="12";
			break;
	}
	$dni = $formulario['dniN'].$formulario['dniL'];
	$fecha = $formulario['dia']."/".$mes."/".$formulario['anyo'];
	$con = conectarBD();
	try{
	$stmt = $con -> prepare("CALL alta_monitor(:nombre,:apellidos,:dni,to_date(:fechaNacimiento,'DD/MM/RR'),:telefono,:email,:direccion,:tipoMonitor)");
	$stmt -> bindParam(":nombre", $formulario['nombre']);
	$stmt -> bindParam(":apellidos", $formulario['apellidos']);
	$stmt -> bindParam(":dni", $dni);
	$stmt -> bindParam(":fechaNacimiento", $fecha);
	$stmt -> bindParam(":telefono", $formulario['telefono']);
	$stmt -> bindParam(":email", $formulario['email']);
	$stmt -> bindParam(":direccion", $formulario['direccion']);
	$stmt -> bindParam(":tipoMonitor", $formulario['tipoMonitor']);
	$stmt -> execute();
	Header("Location: ../paginaMonitores.php");
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: ../pagError.php");
	}
}

?>