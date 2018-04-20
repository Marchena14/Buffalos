<?php
   function anadirMonitorActividad($con, $id_monitor, $id_actividad){
   	$query = "CALL ALTA_MONITORESACTIVIDADES('$id_monitor','$id_actividad')";
	$stmt = $con -> prepare($query);
	$stmt -> execute();
   }
   
   function modificar_actividad($con, $id_actividad, $nombre, $descripcion, $tiempo){
			$sql = "UPDATE ACTIVIDADES SET NOMBRE='$nombre', DESCRIPCION='$descripcion', TIEMPO='$tiempo' WHERE ID_ACTIVIDAD='$id_actividad'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
	}
}
   
   function borrarActividad($con, $id){
	$sql = "DELETE FROM ACTIVIDADES WHERE ID_ACTIVIDAD = '$id'";
	try{
		$con -> exec($sql);
	}catch(PDOException $e){
		
	}
	
}
   
   function borrarMonitorActividad($con, $id_monitor, $id_actividad){
   
   	$query = "DELETE FROM MONITORESACTIVIDADES WHERE ID_PERSONA='$id_monitor' AND ID_ACTIVIDAD='$id_actividad'";
	try{
	$stmt = $con -> prepare($query);
	$stmt -> execute();
	}catch(PDOException $e){
		
	}
   }
   
   function compruebaExiste($con, $id_monitor, $id_actividad){
   	$query = "SELECT COUNT(*)AS TOTAL FROM MONITORESACTIVIDADES WHERE ID_PERSONA='$id_monitor' AND ID_ACTIVIDAD='$id_actividad'";
	$stmt = $con ->query($query);
	$result = $stmt -> fetch();
	$total = $result['TOTAL'];
	return $total;
   }
?>