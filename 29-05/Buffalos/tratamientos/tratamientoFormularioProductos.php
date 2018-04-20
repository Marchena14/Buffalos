<?php
    session_start();
	if(isset($_SESSION['formulario'])){
		$formulario['nombre'] = $_REQUEST['nombre'];
		$formulario['descripcion'] = $_REQUEST['descripcion'];
		$formulario['precioPvp'] = $_REQUEST['precioPvp'];
		$formulario['precioIns'] = $_REQUEST['precioIns'];
		$_SESSION['formulario']=$formulario;
		$errores = validar($formulario);
	
	if(count($errores) > 0){
		$_SESSION['errores']=$errores;
		Header("Location: ../anadirProducto.php");
	}else{
		
		Header("Location: ../exitos/exitoProductos.php");
	}
}else{
	Header("Location: ../anadirProducto.php");
}

function validar($formulario){
	if(empty($formulario['nombre'])){
			$errores[]="El nombre no puede estar vacio";
		}
		
		if(empty($formulario['descripcion'])){
			$errores[]="La descripción no pueden estar vacios";
		}
		
		if(empty($formulario['precioPvp'])){
			$errores[]="El precio para el público no puede ser vacio";
		}else if($formulario['precioPvp'] <0){
			$errores[]="El precio público no puede ser negativo";
		}
		
		if(empty($formulario['precioIns'])){
				$errores[]="El precio para los institutos no puede ser vacío";
		}else if($formulario['precioIns']<0){
			$errores[]="El precio para los institutos no puede ser negativo";
		}
		
		
		
		
		return $errores;
	}

?>