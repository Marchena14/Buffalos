<?php
session_start();
include("gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['apellidos']="";
	$formulario['dia']="1";
	$formulario['mes']="";
	$formulario['anyo']="2016";
	$formulario['dniN']="";
	$formulario['dniL']="";
	$formulario['telefono']="";
	$formulario['direccion']="";
	$formulario['email']="";
	$formulario['instituto']="";
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Buffalos Adventure</title>
		<link href="css/hover.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>

		
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
				<li><button class="hvr-pulse"><img src="images/botonInicio.png"></button></li>
				<li><button class="hvr-pulse"><img src="images/botonPaquetes.png"></button></li>
				<li><button class="hvr-pulse"><img src="images/botonLocalizanos.png"></button></li>
				<li><button class="hvr-pulse"><img src="images/botonFutbol.png"></button></li>
				<li><button class="hvr-pulse"><img src="images/botonContacta.png"></button></li>
				<li><button class="hvr-pulse"><img src="images/botonAdministracion.png"></button></li>

			</ul>
			</nav>
			<h1>¡¡ Bienvenidos !!</h1>
			<div class="centralPrincipal">
				<div class="interiorPanel">
					<div id="centrar">
					<p>
				<?=$formulario['nombre']." ".$formulario['apellidos'];?></br>
				<?=$formulario['dia']." de ".$formulario['mes']." del ".$formulario['anyo'];?></br>
				<?=$formulario['dniN']."-".$formulario['dniL'];?></br>
				<?=$formulario['telefono'];?></br>
				<?=$formulario['direccion'];?></br>
				<?=$formulario['email'];?></br>
				<?=$formulario['instituto'];?>
				</p>				
			<label for="confirmar">¿Son estos sus datos?</label><br><br>
			
			</div>
			<button id="confirmar">Confirmar</button>
				</div>
			</div>
		</div>
	</body>
	
<script>
			$(document).ready(function(){
				$("#confirmar").click(function(){
					window.open("autorizacion.php");
					var url = "index.php"
					$(location).attr('href',url);
				});
			});
</script>
</html>