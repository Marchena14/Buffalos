<?php
    function modificar_monitor($con, $id_persona, $nombre, $apellidos, $dni, $fnac, $telefono, $email, $direccion, $cargo){
			$sql = "UPDATE PERSONAS SET NOMBRE='$nombre', APELLIDOS='$apellidos', DNI='$dni', FECHANACIMIENTO='$fnac', TELEFONO='$telefono', EMAIL='$email', DIRECCION='$direccion' WHERE ID_PERSONA='$id_persona'";
			$sql2 = "UPDATE MONITORES SET TIPOMONITOR='$cargo' WHERE ID_PERSONA='$id_persona'";
	try{
		$con -> exec($sql);
		$con -> exec($sql2);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
}
	
	function borrarMonitor($con, $id){
	$sql = "DELETE FROM MONITORES WHERE ID_PERSONA = '$id'";
	$sql2 = "DELETE FROM PERSONAS WHERE ID_PERSONA= '$id'";
	try{
		$con -> exec($sql);
		$con -> exec($sql2);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
	
}
	
	
?>
