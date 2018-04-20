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
		<title>Gestion de Actividades</title>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
			
			<h1>Admin Panel</h1>
			<hr class="lineaSeparadora">
			<h2>Actividades</h2>
		</div>
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
			<ul class="pagination modal-5">
		<?php
		for($page=1; $page <= $total_pages; $page++){
			if($page == $page_num){
			?>
			<li><a class="active"><?= $page ?></a></li>	
			<?php }else{ ?>
				<li><a href="paginaActividades.php?page_num=<?= $page ?>&page_size=<?=$page_size?>"><?=$page?></a></li>
			<?php 
		}
		}
		 ?>
		</div>
		
		<form method="get" action="paginaActividades.php">
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
		<?php $cadenaNombres = monitoresActividad($con, $fila['ID_ACTIVIDAD']);?>
		<form method="post" action="procesamientos/procesar_actividades.php">
			<?php
				if(isset($actividad) and ($actividad['id_actividad'] == $fila['ID_ACTIVIDAD'])){
					
					?><tr>
					<input id="id_actividad" name="id_actividad" type="hidden" value="<?=$fila['ID_ACTIVIDAD'];?>"/>
					<td class="tdEditar">
						<input id='nombre' name='nombre' type='text' value='<?=$fila['NOMBRE'];?>'/>
					</td>
					<td class="tdEditar">
						<input id='descripcion' name='descripcion' type='text' value='<?=$fila['DESCRIPCION'];?>'/>
					</td>
					<td class="tdEditar">
						<input id='tiempo' name='tiempo' type='text' value='<?=$fila['TIEMPO'];?>'/>
					</td>
					<td class="tdEditar">
						<select id="select_monitor_borrar" name="select_monitor_borrar">
						<?php foreach ($cadenaNombres as $persona) {
							
							?><option value="<?=$persona['ID_PERSONA'];?>"><?=$persona['NOMBRE']." " .$persona['APELLIDOS']?></option>
							
						<?php } ?>
							</select>
							<button id="borrarMonitor" name="borrarMonitor" class="botonTrans"><img src="images/menos.png"></button></br>
						<select id="select_monitores" name="select_monitores">
							<?php $cadenaNombres = todosMonitores($con, $fila['ID_ACTIVIDAD']) ?>
							<?php foreach ($cadenaNombres as $monitores) {?>
								<option value="<?=$monitores['ID_PERSONA'];?>"><?=$monitores['NOMBRE']." ".$monitores['APELLIDOS'];?></option>
							<?php }?>
						</select>
						<button id="anadirMonitor" name="anadirMonitor" class="botonTrans"><img src="images/mas.png"></button>
					</td>
					
			<?php } else{ ?>
			
			
		<tr>
		<input id="id_actividad" name="id_actividad" type="hidden" value="<?=$fila['ID_ACTIVIDAD'];?>"/>
		<td> <?=$fila['NOMBRE']?></td>
		<td><?=$fila['DESCRIPCION']?></td>
		<td><?=$fila['TIEMPO']?></td>
		<td>
			<?php $cadenaPersona = monitoresActividad($con, $fila['ID_ACTIVIDAD']);
			foreach($cadenaPersona as $persona){?>
				 <?=$persona['NOMBRE'];?>
				<?= "<br>";?>
			<?php }?>
		</td>
		<?php } ?>
		
		<td>
			<?php if(isset($actividad) and ($actividad['id_actividad'] == $fila['ID_ACTIVIDAD'])){?>
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
		</table><br>
		<center><a id="botonAnadir" name="botonAnadir" class="botonAnadir" href="anadirActividad.php">Añadir</a></center>
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
