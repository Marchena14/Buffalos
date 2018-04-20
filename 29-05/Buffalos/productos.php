<?php
session_start();
include("gestiones/gestionBD.php");
include("functions/funciones.php");

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
		<title>Buffalos Adventure</title>
		<link href="css/hover.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script type="text/javascript" src="js/funciones.js"></script>

	</head>
	<body>
		<div class="menuIzq">
			<div id="centrar" name="centrar">
			<img class="logoBuffalo" src="images/iconoIzquierda.png"/></div>
			<div class="botonesSociales">
				<ul class="social-buttons" id="demo2">
					  <li>
					    <a href="http://twitter.com/buffalos10" class="brandico-twitter-bird"></a>
					  </li>
					  <li>
					    <a href="http://www.facebook.com/BuffalosAdventure/" class="brandico-facebook"></a>
					  </li>
					  <li>
					    <a href="http://www.instagram.com/buffalos_adventure" class="brandico-instagram"></a>
				</ul>
			</div>
			<div id="div-img" class="div-img"><a href="inscripcion.php"><img class="img" src="images/btnInscripcion.png" alt=""/></a></div>
			<div id="div-img" class="div-img"><a href="galeria.php"><img class="img" src="images/btnGaleria.png" alt=""/></a></div>
			<div id="div-img" class="div-img"><a href="productos.php"><img class="img" src="images/btnProductos.png" alt=""/></a></div>
			<div id="div-img" class="div-img"><a href="sponsors.php"><img class="img" src="images/btnSponsor.png" alt=""/></a></div>

		</div>
		<div class="menuCentral">
			<a href="index.php">
			<div class="cabecera"></div></a>
			<div id="centrar" name="centrar">
				
			
			</div>
			<nav class="barraBotones">
				<ul>
				<li><button value="Inicio" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonInicio.png"></button></li>
				<li><button value="Paquetes" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonPaquetes.png"></button></li>
				<li><button value="Localizanos" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonLocalizanos.png"></button></li>
				<li><button value="Futbol" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonFutbol.png"></button></li>
				<li><button value="Contacta" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonContacta.png"></button></li>
				<li><button value="Administracion" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonAdministracion.png"></button></li>

			</ul>
			</nav>
			<h1>Productos</h1>
			<div class="centralPrincipal">
				<div class="interiorPanel">
					<?php
					
		$page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
		$page_size = isset($_GET['page_size']) ? (int) $_GET['page_size'] : 1;
		if($page_num < 1) $page_num=1;
		if($page_size < 1) $page_size = 1;
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
			<ul id="fondoRojo" class="pagination modal-5">
				
		<?php
		if(isset($_REQUEST['enviar'])){
					$page_num = $page_num +1;
					}
		for($page=1; $page <= $total_pages; $page++){
			if($page == $page_num){
			?>
			<li><a class="active"><?= $page ?></a></li>
			<?php }else{ ?>
			<li><a href="productos.php?page_num=<?= $page ?>&page_size=<?=$page_size?>"><?=$page?></a></li>
			<?php 
		}
		}
		 ?>
		 </ul>
		</div>
		
		<form method="get" action="productos.php">
			<div class="divMostrando">
			<input id="page_num" name="page_num" type="hidden" value="<?=$page_num?>"/>
			Mostrando
			1
			entradas de <?=$total?>
			
			</div>
		</form>
			<div>
				<?php
		$query2= "SELECT * FROM(
								SELECT ROWNUM RNUM,AUX.* FROM(SELECT * FROM PRODUCTOS
								) AUX WHERE ROWNUM<= :last)WHERE RNUM >=:first";
		$filas = paginatedQuery($con, $query2, $page_num,$page_size);
		$fila = $filas->fetch();
		
		?>
		<div class="divTablaPaginada">
		<table class="tablaPaginada">
			<form method="post" action="productos.php">
			<tr>
				<td colspan="2">
					<?=$fila['NOMBRE'];?>
				</td>
			</tr>
			<tr id="celdaCentrada">
				<td>
					<?=$fila['PRECIOINSTITUTO'];?>
				</td>
				<td>
					<?=$fila['PRECIOPVP'];?>
				</td>
			</tr>
			<tr id="celdaCentrada">
				<td colspan="2"><?=$fila['DESCRIPCION'];?></td>
			</tr>
			<tr id="celdaCentrada">
				<td colspan="2">NO IMAGEN</td>
			</tr>

			</form>
		</table>
		</div>
		<div id="centrar">
		<a href="productos.php?page_num=<?= $page_num+1 ?>&page_size=<?=$page_size?>">Siguiente</a>
		</div>
		<div id="centrar">
		<a href="productos.php?page_num=<?= $page_num-1 ?>&page_size=<?=$page_size?>">Atrás</a>
		</div>
			</div>
				</div>
			</div>
		</div>
	</body>
</html>