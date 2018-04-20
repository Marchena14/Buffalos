<?php
    session_start();
	if(isset($_SESSION['formulario'])){
		$formulario['nombre'] = $_REQUEST['nombre'];
		$formulario['apellidos'] = $_REQUEST['apellidos'];
		$formulario['dia'] = $_REQUEST['dia'];
		$formulario['mes'] = $_REQUEST['mes'];
		$formulario['anyo'] = $_REQUEST['anyo'];
		$formulario['dniN'] = $_REQUEST['dniN'];
		$formulario['dniL'] = $_REQUEST['dniL'];
		$formulario['telefono'] = $_REQUEST['telefono'];
		$formulario['direccion'] = $_REQUEST['direccion'];
		$formulario['email'] = $_REQUEST['email'];
		$formulario['instituto'] = $_REQUEST['select_instituto'];
		$_SESSION['formulario']=$formulario;
		$errores = validar($formulario);
	
	if(count($errores) > 0){
		$_SESSION['errores']=$errores;
		Header("Location: ../inscripcion.php");
	}else{
		
		Header("Location: ../confirmaFormulario.php");
	}
}else{
	Header("Location: ../inscripcion.php");
}
	
	function validar($formulario){
		if(empty($formulario['nombre'])){
			$errores[]="El nombre no puede estar vacio";
		}
		if(empty($formulario['apellidos'])){
			$errores[]="Los apellidos no pueden estar vacios";
		}
		if(empty($formulario['dniN'])){
			$errores[]="El número del DNI no puede estar vacío";
		}
		if(empty($formulario['dniL'])){
			$errores[]="La letra del DNI no puede estar vacia";
		}
		if(empty($formulario['telefono'])){
			$errores[]="El teléfono no puede estar vacio";
		}
		if(empty($formulario['direccion'])){
			$errores[]="La dirección no puede estar vacía";
		}
		if(empty($formulario['email'])){
			$errores[]="El email no puede estar vacio";
		}
		if(!filter_var($formulario['email'],FILTER_VALIDATE_EMAIL)){
		$errores[]="Esta direccion de correo no es valida";
		}
		if (substr("TRWAGMYFPDXBNJZSQVHLCKE",$formulario['dniN']%23,1) != $formulario['dniL']){
		$errores[]="La letra del dni introducida no es correcta";
	}
		
		return $errores;
	}
?>