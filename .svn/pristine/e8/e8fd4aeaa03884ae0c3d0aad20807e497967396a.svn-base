<?php
    session_start();
	if(isset($_SESSION['formulario'])){
		$formulario['nombre'] = $_REQUEST['nombre'];
		$formulario['direccion'] = $_REQUEST['direccion'];
		$formulario['codPostal'] = $_REQUEST['codPostal'];
		$formulario['paquete'] = $_REQUEST['select_paquete'];
		$_SESSION['formulario']=$formulario;
		$errores = validar($formulario);
	
	if(count($errores) > 0){
		$_SESSION['errores']=$errores;
		Header("Location: ../anadirInstituto.php");
	}else{
		
		Header("Location: ../exitos/exitoInstitutos.php");
	}
}else{
	Header("Location: ../anadirInstituto.php");
}

function validar($formulario){
	if(empty($formulario['nombre'])){
			$errores[]="El nombre no puede estar vacio";
		}
		
		if(empty($formulario['direccion'])){
			$errores[]="La descripción no pueden estar vacios";
		}
		
		if(empty($formulario['codPostal'])){
			$errores[]="La duración no puede estar vacía";
		}
		
		if($formulario['paquete']=='invalido'){
			$errores[] = "Este valor de paquete no es válido";
		}
		
		return $errores;
	}

?>