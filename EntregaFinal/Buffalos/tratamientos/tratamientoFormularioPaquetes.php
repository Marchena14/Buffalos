<?php
    session_start();
	if(isset($_SESSION['formulario'])){
		$formulario['nombre'] = $_REQUEST['nombre'];
		$formulario['descripcion'] = $_REQUEST['descripcion'];
		$formulario['precio'] = $_REQUEST['precio'];
		$_SESSION['formulario']=$formulario;
		$errores = validar($formulario);
	
	if(count($errores) > 0){
		$_SESSION['errores']=$errores;
		Header("Location: ../anadirPaquete.php");
	}else{
		
		Header("Location: ../exitos/exitoPaquetes.php");
	}
}else{
	Header("Location: ../anadirPaquete.php");
}

function validar($formulario){
	if(empty($formulario['nombre'])){
			$errores[]="El nombre no puede estar vacio";
		}
		
		if(empty($formulario['descripcion'])){
			$errores[]="La descripción no pueden estar vacios";
		}
		
		if(empty($formulario['precio'])){
			$errores[]="El precio no puede ser vacio";
		}else if($formulario['precio'] <0){
			$errores[]="El precio no puede ser negativo";
		}		
		
		return $errores;
	}

?>