<?php
session_start();
include("gestiones/gestionBD.php");

$con = conectarBD();

if(isset($_SESSION['producto']))
	$producto = $_SESSION['producto'];

unset($_SESSION['producto']);
if(isset($_SESSION['errores'])){
	$errores = $_SESSION['errores'];
	
}
unset($_SESSION['errores']);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
		<link class="cssdeck" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
		<script src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="js/funciones.js"></script>
		<title>Gestion de Productos</title>
	</head>
	<body class="bodyTabla">
			<div class="cabeceraAdmin">
			
			<h1>Admin Panel</h1>
			<hr class="lineaSeparadora">
			<h2>Productos</h2>
		</div>
		<?php
		$page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
		$page_size = isset($_GET['page_size']) ? (int) $_GET['page_size'] : 5;
		if($page_num < 1) $page_num=1;
		if($page_size < 1) $page_size = 5;
		?>
		<?php
		$query = "SELECT count(*)AS TOTAL FROM PRODUCTOS";
		$total = totalQuery($con, $query);
		$total_pages = ($total/$page_size);
		
		if($total%$page_size > 0){
			$total_pages++;
		}
		if($page_num > $total_pages){
			$page_num=1;
		}
		
		?>
		<div class="buscadorPagina">
			<ul class="pagination modal-5">
				
		<?php
		for($page=1; $page <= $total_pages; $page++){
			if($page == $page_num){
			?>
			<li><a class="active"><?= $page ?></a></li>
			<?php }else{ ?>
			<li><a href="paginaProductos.php?page_num=<?= $page ?>&page_size=<?=$page_size?>"><?=$page?></a></li>
			<?php 
		}
		}
		 ?>
		 </ul>
		</div>
		
		<form method="get" action="paginaProductos.php">
			<div class="divMostrando">
			<input id="page_num" name="page_num" type="hidden" value="<?=$page_num?>"/>
			Mostrando
			<input id="page_size" name="page_size" type="number" min="1" max="<?=$total?>" value="<?=$page_size?>" autofocus="autofocus"/>
			entradas de <?=$total?>
			<input type="submit" value="Cambiar"/>
			
			</div>
			
			
		</form>
		
		<?php
		$query2= "SELECT * FROM(
								SELECT ROWNUM RNUM,AUX.* FROM(SELECT * FROM PRODUCTOS
								) AUX WHERE ROWNUM<= :last)WHERE RNUM >=:first";
		$filas = paginatedQuery($con, $query2, $page_num,$page_size);
		
		?>
		<div class="divTablaPaginada">
		<table class="tablaPaginada">
			<tr>
				<th>Nombre</th> <th>Descripción</th> <th>Precio Público</th> <th>Precio Instituto</th> <th>Editar</th> <th>Borrar</th>
			</tr>
		<?php foreach($filas as $fila){
		?>
		<form method="post" action="procesamientos/procesar_productos.php">
			<?php
				if(isset($producto) and ($producto['id_producto'] == $fila['ID_PRODUCTO'])){
					
					?><tr>
					<input id="id_producto" name="id_producto" type="hidden" value="<?=$fila['ID_PRODUCTO'];?>"/>
					<td>
						<input id='nombre' name='nombre' type='text' value='<?=$fila['NOMBRE'];?>'/>
					</td>
					<td>
						<input id='descripcion' name='descripcion' type='text' value='<?=$fila['DESCRIPCION'];?>'/>
					</td>
					<td>
						<input id='precioPvp' name='precioPvp' type='text' value='<?=$fila['PRECIOPVP'];?>'/>€
					</td>
					<td>
						<input id='precioIns' name='precioIns' type='text' value='<?=$fila['PRECIOINSTITUTO'];?>'/>€
					</td>
					
			<?php } else{ ?>
			
			
		<tr>
		<input id="id_producto" name="id_producto" type="hidden" value="<?=$fila['ID_PRODUCTO'];?>"/>
		<td> <?=$fila['NOMBRE']?></td>
		<td><?=$fila['DESCRIPCION']?></td>
		<td><?=$fila['PRECIOPVP']?> €</td>
		<td><?=$fila['PRECIOINSTITUTO']?> €</td>

		<?php } ?>
		
		<td>
			<?php
			$_SESSION['page_num'] = $page_num;
			$_SESSION['page_size'] = $page_size;
			?>
			<?php if(isset($producto) and ($producto['id_producto'] == $fila['ID_PRODUCTO'])){?>
				<button id='grabar' name='grabar' type='submit' class='botonTrans'>
					<img src="images/grabar.png">
				</button>
			<?php }else { ?>
			<button id="editar" name="editar" type="submit" class="botonTrans"><img src="images/pencil.png"></button>
			<?php } ?>
			</td>
			<td><button id='quitar' name='quitar' type='submit' class='botonTrans'>
				<img src="images/cancelar.png">
			</button></td>
		</tr>
		
		</form>
		<?php
		}?>
		</table></br>
		<center><a id="botonAnadir" name="botonAnadir" class="botonAnadir" href="anadirProducto.php">Añadir</a></center>
		</div>
	</body>
	
</html>



<?php

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
	
	function monitoresActividad($con, $id_Act){
		
		try{
		$query = "SELECT PERSONAS.ID_PERSONA, PERSONAS.NOMBRE, PERSONAS.APELLIDOS FROM PERSONAS, ACTIVIDADES, MONITORESACTIVIDADES WHERE PERSONAS.ID_PERSONA = MONITORESACTIVIDADES.ID_PERSONA AND ACTIVIDADES.ID_ACTIVIDAD = MONITORESACTIVIDADES.ID_ACTIVIDAD AND MONITORESACTIVIDADES.ID_ACTIVIDAD='$id_Act'";
		$resul = $con -> query($query);
		}catch(PDOException $e){
			
		}
		
		return $resul;
	}
	
	function todosMonitores($con, $id_actividad){
		try{
			$query = "SELECT PERSONAS.ID_PERSONA, PERSONAS.NOMBRE, PERSONAS.APELLIDOS FROM PERSONAS WHERE TIPOPERSONA='Monitor' MINUS SELECT PERSONAS.ID_PERSONA,PERSONAS.NOMBRE, PERSONAS.APELLIDOS FROM PERSONAS, ACTIVIDADES,MONITORESACTIVIDADES WHERE PERSONAS.ID_PERSONA=MONITORESACTIVIDADES.ID_PERSONA AND MONITORESACTIVIDADES.ID_ACTIVIDAD = ACTIVIDADES.ID_ACTIVIDAD AND MONITORESACTIVIDADES.ID_ACTIVIDAD='$id_actividad'";
			$resul = $con -> query($query);
		}catch(PDOException $e){
			
		}
		
		return $resul;
	}

?>


<script>
	$('h1').click(function(){
		location.href="adminPanel.php"
	});	
</script>
