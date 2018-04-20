<?php
session_start();
include("gestiones/gestionBD.php");

$con = conectarBD();

if(isset($_SESSION['monitor']))
	$monitor = $_SESSION['monitor'];

unset($_SESSION['monitor']);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<title>Gestion de Buffalos</title>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
			
			<h1>Admin Panel</h1>
			<hr class="lineaSeparadora">
			<h2>Monitores</h2>
		</div>
		<?php
		$page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
		$page_size = isset($_GET['page_size']) ? (int) $_GET['page_size'] : 10;
		if($page_num < 1) $page_num=1;
		if($page_size < 1) $page_size = 10;
		?>
		<?php
		$query = "SELECT count(*)AS TOTAL FROM Personas WHERE TIPOPERSONA='Monitor'";
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
			<li><a href="paginaMonitores.php?page_num=<?= $page ?>&page_size=<?=$page_size?>"><?=$page?></a></li>
			<?php 
		}
		}
		 ?>
		</div>
		<form method="get" action"paginaMonitores.php">
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
								SELECT ROWNUM RNUM,AUX.* FROM(SELECT PERSONAS.ID_PERSONA,PERSONAS.NOMBRE,PERSONAS.APELLIDOS,PERSONAS.DNI,PERSONAS.FECHANACIMIENTO,PERSONAS.TELEFONO,PERSONAS.EMAIL,PERSONAS.DIRECCION,MONITORES.TIPOMONITOR FROM PERSONAS,MONITORES WHERE PERSONAS.ID_PERSONA=MONITORES.ID_PERSONA
								) AUX WHERE ROWNUM<= :last)WHERE RNUM >=:first";
		$filas = paginatedQuery($con, $query2, $page_num,$page_size);
		
		?>
		<div class="divTablaPaginada">
		<table class="tablaPaginada">
			<tr>
				<th>Nombre</th> <th>Apellidos</th> <th>DNI</th> <th>Fecha de Nacimiento</th> <th>Telefono</th> <th>Email</th> <th>Direccion</th> <th>Cargo</th> <th>Editar</th> <th>Borrar</th>
			</tr>
		<?php foreach($filas as $fila){
		?>
		<form method="post" action="procesamientos/procesar_monitores.php">
			<?php
				if(isset($monitor) and ($monitor['id_persona'] == $fila['ID_PERSONA'])){
					
					?>
					<input id="id_persona" name="id_persona" type="hidden" value="<?=$fila['ID_PERSONA'];?>"/>
					<td>
						<input id='nombre' name='nombre' type='text' value='<?=$fila['NOMBRE'];?>'/>
					</td>
					<td>
						<input id='apellidos' name='apellidos' type='text' value='<?=$fila['APELLIDOS'];?>'/>
					</td>
					<td>
						<input id='dni' name='dni' type='text' value='<?=$fila['DNI'];?>'/>
					</td>
					<td>
						<input id='fnac' name='fnac' type='text' value='<?=$fila['FECHANACIMIENTO'];?>'/>
					</td>
					<td>
						<input id='telefono' name='telefono' type='text' value='<?=$fila['TELEFONO'];?>'/>
					</td>
					<td>
						<input id='email' name='email' type='text' value='<?=$fila['EMAIL'];?>'/>
					</td>
					<td>
						<input id='direccion' name='direccion' type='text' value='<?=$fila['DIRECCION'];?>'/>
					</td>
					<td>
						<input id='tipomonitor' name='tipomonitor' type='text' value='<?=$fila['TIPOMONITOR'];?>'/>
					</td>
			<?php } else{ ?>
			
			
		<tr>
		<input id="id_persona" name="id_persona" type="hidden" value="<?=$fila['ID_PERSONA'];?>"/>
		<td> <?=$fila['NOMBRE']?></td>
		<td><?=$fila['APELLIDOS']?></td>
		<td><?=$fila['DNI']?></td>
		<td><?=$fila['FECHANACIMIENTO']?></td>
		<td><?=$fila['TELEFONO']?></td>
		<td><?=$fila['EMAIL']?></td>
		<td><?=$fila['DIRECCION']?></td>
		<td><?=$fila['TIPOMONITOR']?></td>
		<?php } ?>
		
		<td>
			<?php if(isset($monitor) and ($monitor['id_persona'] == $fila['ID_PERSONA'])){?>
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
		<center><a id="botonAnadir" name="botonAnadir" class="botonAnadir" href="anadirMonitor.php">Añadir</a></center>
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

?>
