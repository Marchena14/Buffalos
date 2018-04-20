<?php

function modificar_instituto($con, $id_instituto, $id_paquete, $nombre, $direccion, $codpostal, $paquete){
		
			$sql = "UPDATE INSTITUTOS SET NOMBRE='$nombre', DIRECCION='$direccion', CODPOSTAL='$codpostal', ID_PAQUETE='$paquete' WHERE ID_INSTITUTO='$id_instituto'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		session_start();
		$_SESSION['error'] = $e;
		Header("Location: ./pagError.php");
		exit();
	}
}

function borrarInstituto($con, $id){
	$sql = "DELETE FROM INSTITUTOS WHERE ID_INSTITUTO = '$id'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		session_start();
		$_SESSION['error'] = $e;
		Header("Location: ./pagError.php");
		exit();
	}
	
}

function listarInstitutos($con){
	$query = "SELECT * FROM INSTITUTOS WHERE ROWNUM<=5";
	try{
		$stmt = $con -> query($query);
	}catch(PDOException $e){
		session_start();
		$_SESSION['error'] = $e;
		Header("Location: ./pagError.php");
		exit();
		
	}
	
	return $stmt;
	
}
?>