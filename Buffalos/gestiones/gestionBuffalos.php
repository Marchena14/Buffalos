<?php
    function modificar_buffalo($con, $id_persona, $nombre, $apellidos, $dni, $fnac, $telefono, $email, $direccion, $cargo){
			$sql = "UPDATE PERSONAS SET NOMBRE='$nombre', APELLIDOS='$apellidos', DNI='$dni', FECHANACIMIENTO='$fnac', TELEFONO='$telefono', EMAIL='$email', DIRECCION='$direccion' WHERE ID_PERSONA='$id_persona'";
			$sql2 = "UPDATE BUFFALOS SET TIPOBUFFALO='$cargo' WHERE ID_PERSONA='$id_persona'";
	try{
		$con -> exec($sql);
		$con -> exec($sql2);
	}catch(PDOException $e){
		
	}
}
	
	function borrarBuffalo($con, $id){
	$sql = "DELETE FROM BUFFALOS WHERE ID_PERSONA = '$id'";
	$sql2 = "DELETE FROM PERSONAS WHERE ID_PERSONA= '$id'";
	try{
		$con -> exec($sql);
		$con -> exec($sql2);
	}catch(PDOException $e){
		
	}
	
}
	
	
?>

