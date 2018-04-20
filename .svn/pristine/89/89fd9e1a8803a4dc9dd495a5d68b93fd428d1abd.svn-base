<?php
session_start();
$_SESSION['paginaActual'] = "index.php";
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

<html lang="en">
	<head>
		<meta charset="UTF-8">

		<title>Buffalos Adventure</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>

	</head>
	<body>
		<div id="cabecera" class="cabecera">
			<img class="banner" src="banner.jpg"/>
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
			<h1><b>Formulario de Inscripción</b></h1>
			<div class="exitoFormulario">
				<?=$formulario['nombre']." ".$formulario['apellidos'];?></br>
				<?=$formulario['dia']." de ".$formulario['mes']." del ".$formulario['anyo'];?></br>
				<?=$formulario['dniN']."-".$formulario['dniL'];?></br>
				<?=$formulario['telefono'];?></br>
				<?=$formulario['direccion'];?></br>
				<?=$formulario['email'];?></br>
				<?=$formulario['instituto'];?>				
			</div>
			<div id="div_confirmar">
			<label for="confirmar">¿Son estos sus datos?</label>
			<button id="confirmar">Confirmar</button>
			</div>		

		</div>
	</body>
	<footer class="footer">

	</footer>
</html>

<?php

function consejito($con){
	
	$numero = rand(1,4);
	$consulta = "SELECT * FROM CONSEJOS WHERE ID_CONSEJO='$numero'";
	$consejo = $con -> query($consulta);
	
	return $consejo;	
}
?>

<script>
			$(document).ready(function(){
				$("#confirmar").click(function(){
					window.open("autorizacion.php");
					var url = "index.php"
					$(location).attr('href',url);
				});
			});
</script>