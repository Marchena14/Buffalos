<?php
session_start();
$_SESSION['paginaActual'] = "adminPanel.php";
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="adminPanel">
		<div class="bannerAdmin">
		<h1>Bienvenido al Panel de Administracion</h1>
		</div>
		<div class="listaOpc">
			<div class="listaOpc2"><ul>
			<li><button value="Buffalos" class="botonAdmin" id="botonBuffalos" name="botonBuffalos" onClick="clickBoton(this.value)">Buffalos</button></li>
			<li><button class="botonAdmin" id="botonMonitores" name="botonMonitores">Monitores</button></li>
			<li><button class="botonAdmin" id="botonActividades" name="botonActividades">Actividades</button></li>
			<li><button class="botonAdmin" id="botonPaquetes" name="botonPaquetes">Paquetes</button></li>
			<li><button class="botonAdmin" id="botonInstituto" name="botonInstituto">Institutos</button></li>
			<li><button class="botonAdmin" id="botonProducto" name="botonProducto">Productos</button></li>
			</ul></div>
		
		<div class="listaOpc3">
			<button onClick="infoPagina()">
			<img src="images/logo3.png" width:"300" height="300"/></button>
			<div class ="dialogInfo" id="dialogInfo">
				
					Esta páginada ha sido creada por: </br>
					Jesús Marchena Carrera </br>
					Jesús Perez Carmona </br>
					Super Pepe Bros
				
			</div>
		</div>
		</div>
		
		
		
	</body>
	<footer class="footer">
		Hola
	</footer>
	
</html>

<script>
	function clickBoton(str){
		if(str == "Buffalos"){
			location.href="paginaBuffalos.php";
		}
	}
	
	function infoPagina(){
		
		var dialog = document.getElementById("dialogInfo");
		dialog.style.display ="block";
		
		
	}
</script>