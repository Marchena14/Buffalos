<?php

function infoPaquete($con,$str){
	$query ="SELECT * FROM PAQUETES WHERE NOMBRE='$str'";
	try{
		$stmt = $con -> prepare($query);
		$stmt -> execute();
	}catch(PDOException $e){
		$_SESSION['error'] = $e;
		Header("Location: pagError.php");
		exit();
	}
	return $stmt;
}

	function paginatedQuery($con, $query2, $page_num, $page_size){
		try{
			$first = ($page_num - 1) * $page_size + 1;
			$last = $page_num * $page_size;
			$paged_query = $query2;
			$stmt = $con -> prepare($paged_query);
			$stmt -> bindParam(':first', $first);
			$stmt -> bindParam(':last', $last);
			$stmt -> execute();
			return $stmt;
		}catch(PDOException $e){
		
	}
	}
	function totalQuery($con, $query2){
		try{
			$total_query = $query2;
			$stmt = $con -> query($total_query);
			$result = $stmt ->fetch();
			$total = $result['TOTAL'];
			return (int)$total;
		}catch(PDOException $e){
			
		}
	}

?>