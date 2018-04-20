<?php

function modificar_paquete($con, $id_paquete, $nombre, $descripcion, $precio){
			$sql = "UPDATE PAQUETES SET NOMBRE='$nombre', DESCRIPCION='$descripcion', PRECIO='$precio' WHERE ID_PAQUETE='$id_paquete'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
}

function borrarPaquete($con, $id){
	$sql = "DELETE FROM PAQUETES WHERE ID_PAQUETE = '$id'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
	
}
?>