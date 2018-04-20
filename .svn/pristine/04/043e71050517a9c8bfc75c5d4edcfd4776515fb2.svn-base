<?php

function modificar_instituto($con, $id_instituto, $id_paquete, $nombre, $direccion, $codpostal, $paquete){
		
			$sql = "UPDATE INSTITUTOS SET NOMBRE='$nombre', DIRECCION='$direccion', CODPOSTAL='$codpostal', ID_PAQUETE='$paquete' WHERE ID_INSTITUTO='$id_instituto'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		
	}
}

function borrarInstituto($con, $id){
	$sql = "DELETE FROM INSTITUTOS WHERE ID_INSTITUTO = '$id'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		
	}
	
}
?>