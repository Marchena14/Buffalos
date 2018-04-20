<?php

   function conectarBD(){
  	$host = 'oci:dbname=localhost/XE;charset=UTF8';
	$username = 'Marchena14';
	$password = 'predator';
	try{
		$con = new PDO($host,$username,$password);
	}catch(PDOException $e){
		session_start();
		$_SESSION['error'] = $e;
		Header("Location: ./pagError.php");
	}
	
	return $con;
  }
  
  function desconectarBD($conexion){
  	$conexion = null;
  }
?>