<?php
session_start();
include("gestiones/gestionBD.php");

$con = conectarBD();

if(isset($_SESSION['actividad']))
	$actividad = $_SESSION['actividad'];

unset($_SESSION['actividad']);
if(isset($_SESSION['errores'])){
	$errores = $_SESSION['errores'];
	
}
unset($_SESSION['errores']);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<title>Gestion de Buffalos</title>
	</head>
	<body class="bodyTabla">
		<?php
		$page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
		$page_size = isset($_GET['page_size']) ? (int) $_GET['page_size'] : 10;
		if($page_num < 1) $page_num=1;
		if($page_size < 1) $page_size = 10;
		?>
		<?php
		$query = "SELECT count(*)AS TOTAL FROM Actividades";
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
		<?php
		for($page=1; $page <= $total_pages; $page++){
			if($page == $page_num){
			?>
			<span class="current"><?= $page ?></span>	
			<?php }else{ ?>
				<a href="paginaActividades.php?page_num=<?= $page ?>&page_size=<?=$page_size?>"><?=$page?></a>
			<?php 
		}
		}
		 ?>
		</div>
		
		<form method="get" action"paginaActividades.php">
			<div class="divMostrando">
			<input id="page_num" name="page_num" type="hidden" value="<?=$page_num?>"/>
			Mostrando
			<input id="page_size" name="page_size" type="number" min="1" max="<?=$total?>" value="<?=$page_size?>" autofocus="autofocus"/>
			entradas de <?=$total?>
			<input type="submit" value="Cambiar"/>
			
			</div>
			
				<?php if(isset($errores)){
				print("<div class='div_error_paginado'>");
				print("<ul>");
				print("<li>$errores</li>");
				print("</ul></div>");
			}?>
			
		</form>
		
		<?php
		$query2= "SELECT * FROM(
								SELECT ROWNUM RNUM,AUX.* FROM(SELECT * FROM ACTIVIDADES
								) AUX WHERE ROWNUM<= :last)WHERE RNUM >=:first";
		$filas = paginatedQuery($con, $query2, $page_num,$page_size);
		
		?>
		<div class="divTablaPaginada">
		<table class="tablaPaginada">
			<tr>
				<th>Nombre</th> <th>Descripción</th> <th>Duración</th> <th>Monitores</th> <th>Editar</th> <th>Borrar</th>
			</tr>
		<?php foreach($filas as $fila){
		?>
		<form method="post" action="procesamientos/procesar_actividades.php">
			<?php
				if(isset($actividad) and ($actividad['id_actividad'] == $fila['ID_ACTIVIDAD'])){
					
					?>
					<input id="id_actividad" name="id_actividad" type="hidden" value="<?=$fila['ID_ACTIVIDAD'];?>"/>
					<td>
						<input id='nombre' name='nombre' type='text' value='<?=$fila['NOMBRE'];?>'/>
					</td>
					<td>
						<input id='descripcion' name='descripcion' type='text' value='<?=$fila['DESCRIPCION'];?>'/>
					</td>
					<td>
						<input id='tiempo' name='tiempo' type='text' value='<?=$fila['TIEMPO'];?>'/>
					</td>
					<td>
						<select id="select_monitores" name="select_monitores">
							<?php $cadenaNombres = todosMonitores($con) ?>
							<?php foreach ($cadenaNombres as $monitores) {?>
								<option value="<?=$monitores['ID_PERSONA'];?>"><?=$monitores['NOMBRE']." ".$monitores['APELLIDOS'];?></option>
							<?php }?>
						</select>
						<button id="anadirMonitor" name="anadirMonitor">Añ</button>
						<button id="borrarMonitor" name="borrarMonitor">D</button>
					</td>
					
			<?php } else{ ?>
			
			<?php $cadenaNombres = monitoresActividad($con, $fila['ID_ACTIVIDAD']);?>
		<tr>
		<input id="id_actividad" name="id_actividad" type="hidden" value="<?=$fila['ID_ACTIVIDAD'];?>"/>
		<td> <?=$fila['NOMBRE']?></td>
		<td><?=$fila['DESCRIPCION']?></td>
		<td><?=$fila['TIEMPO']?></td>
		<td>
			<?php foreach ($cadenaNombres as $persona) {
				echo $persona['NOMBRE']."<br>";
			}?>
		</td>
		<?php } ?>
		
		<td>
			<?php if(isset($actividad) and ($actividad['id_actividad'] == $fila['ID_ACTIVIDAD'])){?>
				<button id='grabar' name='grabar' type='submit' class='editar_fila'>
					<img src="images/grabar.png" class='editar_fila'>
				</button>
			<?php }else { ?>
			<button id="editar" name="editar" type="submit" class="editar_fila"><img src="images/pencil.png" class="editar_fila"></button>
			<?php } ?>
			</td>
			<td><button id='quitar' name='quitar' type='submit' class='borrar_fila'>
				<img src="images/cancelar.png" class='borrar_fila'>
			</button></td>
		</tr>
		
		</form>
		<?php
		}?>
		</table>
		<center><button id='anadir' name='anadir' type='submit'>Nuevo</button></center>
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
		$query = "SELECT PERSONAS.ID_PERSONA, PERSONAS.NOMBRE FROM PERSONAS, ACTIVIDADES, MONITORESACTIVIDADES WHERE PERSONAS.ID_PERSONA = MONITORESACTIVIDADES.ID_PERSONA AND ACTIVIDADES.ID_ACTIVIDAD = MONITORESACTIVIDADES.ID_ACTIVIDAD AND MONITORESACTIVIDADES.ID_ACTIVIDAD='$id_Act'";
		$resul = $con -> query($query);
		}catch(PDOException $e){
			
		}
		
		return $resul;
	}
	
	function todosMonitores($con){
		try{
			$query = "SELECT ID_PERSONA,NOMBRE,APELLIDOS FROM PERSONAS WHERE TIPOPERSONA='Monitor'";
			$resul = $con -> query($query);
		}catch(PDOException $e){
			
		}
		
		return $resul;
	}

?>
