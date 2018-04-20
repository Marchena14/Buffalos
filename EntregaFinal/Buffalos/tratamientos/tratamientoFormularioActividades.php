<?php
    session_start();
	if(isset($_SESSION['formulario'])){
		$formulario['nombre'] = $_REQUEST['nombre'];
		$formulario['descripcion'] = $_REQUEST['descripcion'];
		$formulario['tiempo'] = $_REQUEST['tiempo'];
		$formulario['paquete'] = $_REQUEST['select_paquete'];
		$_SESSION['formulario']=$formulario;
		$errores = validar($formulario);
	
	if(count($errores) > 0){
		$_SESSION['errores']=$errores;
		Header("Location: ../anadirActividad.php");
	}else{
		
		Header("Location: ../exitos/exitoActividades.php");
	}
}else{
	Header("Location: ../anadirActividad.php");
}

function validar($formulario){
	if(empty($formulario['nombre'])){
			$errores[]="El nombre no puede estar vacio";
		}
		
		if(empty($formulario['descripcion'])){
			$errores[]="La descripción no pueden estar vacios";
		}
		
		if(empty($formulario['tiempo'])){
			$errores[]="La duración no puede estar vacía";
		}
		
		if($formulario['paquete']=='invalido'){
			$errores[] = "Este valor de paquete no es válido";
		}
		
		return $errores;
	}

?>