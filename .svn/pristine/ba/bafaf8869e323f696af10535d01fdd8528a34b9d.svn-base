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
			<h1>Contáctanos</h1>
			<div class="centralPrincipal">
				<div class="interiorPanel">
					<?php
					if (!isset($_POST['correo'])){?>
					<form class="formInscripcion" action="<?=$_SERVER['PHP_SELF']?>" method="post">
					<div>
					<label id="label_nombrePpal" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre">
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
					</div><br><div>
					<label id="label_correoPpal" for="correo" >Correo</label>
					<input type="text" id="correo" name="correo" >
					<span class="spanError" id="spanCorreo" nombre="spanCorreo"></span>
					</div><br><div>
					<label id="label_descripcionPpal" for="descripcion" >Descripcion</label>
					<textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea>
					</div><br><br>
					<button id="submit">Enviar</button>
					</form>
					<?php }else{
						$mensaje = "Mensaje del formulario de contacto";
						$mensaje.= "\nNombre: ".$_POST['nombre'];
						$mensaje.= "\nCorreo: ".$_POST['correo'];
						$mensaje.= "\nMensaje: ".$_POST['descripcion'];
						$destino ="marchena014@gmail.com";
						$remitente = $_POST['correo'];
						$asunto ="Mensaje enviado por: ".$_POST['nombre'];
						mail($destino,$asunto,$mensaje);
						?><p>Mensaje enviado</p><?php
					} ?>
					
				</div>
			</div>
		</div>
	</body>
</html>