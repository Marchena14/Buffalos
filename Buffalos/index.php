<?php
session_start();
$_SESSION['paginaActual'] = "index.php";
include("gestiones/gestionBD.php");
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">

		<title>Buffalos Adventure</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>

	</head>
	<body>
		<div id="cabecera" class="cabecera">
			<img class="banner" src="images/banner.jpg"/>
		</div>
		<div id="barraBotones" class="barraBotones">
			<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Campamento</a></li>
				<li><a href="#">Paquetes</a>
				<li><a href="#">Donde estamos</a></li>
				<li><a href="#">Actividades</a></li>
				<li><a href="#">Contacta</a></li>
				<li class="botonLogin"><a href="#">Login</a></li>
				
			</ul>
			</nav>
		</div>
		<div id="menuIzq" class="menuIzq" >
		
			<div id="botonInscripcion" class="botonIzquierda">
				<div id="div-img" class="div-img">
				<a href="#"><img class="img" src="images/galeriafinal1.png" alt="" /></a>
			</div></div>
			<div id="botonGaleria" class="botonIzquierda">
				<div id="div-img" class="div-img">
					<a href="#"><img class="img" src="images/inscripcionfinal1.png" alt=""/></a>
				</div>
			</div>
			
		</div>
		<div id="menuDer" class="menuDer">
			
			<div align="center">
			<table cellspacing="0" cellpadding="0" id="tablaDerecha" class="tablaInfo">
				<tr>
					<th></th>
				</tr>
				<tr>
					<?php
						$con = conectarBD();
						$consejo = consejito($con);
						$resul = $consejo->fetch();
						
					?>
					<td><h2><?=$resul['NOMBRE'];?></h2>
							<p><?=$resul['DESCRIPCION'];
								desconectarBD($con);?></p>
					</td>
				</tr>
			</table>
			</div>
			<div id="botonesSociales">
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
		</div>
		<div id="menuCentral" class="menuCentral">
			<h1><b>Bienvenidos a Buffalos Adventure</b></h1>
			
		</div>
	</body>

</html>

<?php

function consejito($con){
	
	$numero = rand(1,4);
	$consulta = "SELECT * FROM CONSEJOS WHERE ID_CONSEJO='$numero'";
	$consejo = $con -> query($consulta);
	
	return $consejo;	
}
?>

