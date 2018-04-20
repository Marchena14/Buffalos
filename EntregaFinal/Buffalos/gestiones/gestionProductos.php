<?php

function modificar_producto($con, $id_producto, $nombre, $descripcion, $precioPvp, $precioIns){
			$sql = "UPDATE PRODUCTOS SET NOMBRE='$nombre', DESCRIPCION='$descripcion', PRECIOPVP='$precioPvp', PRECIOINSTITUTO='$precioIns' WHERE ID_PRODUCTO=$id_producto";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
}

function borrarProducto($con, $id){
	$sql = "DELETE FROM PRODUCTOS WHERE ID_PRODUCTO = '$id'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
	
}
?>