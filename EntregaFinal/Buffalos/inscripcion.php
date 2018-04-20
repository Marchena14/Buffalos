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
if(isset($_SESSION['errores'])){
	$errores = $_SESSION['errores'];
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Buffalos Adventure</title>
		<link href="css/hover.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/inscripcion.js"></script>
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
				<li><button value="Inicio" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonInicio.png"></button></li>
				<li><button value="Paquetes" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonPaquetes.png"></button></li>
				<li><button value="Localizanos" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonLocalizanos.png"></button></li>
				<li><button value="Futbol" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonFutbol.png"></button></li>
				<li><button value="Contacta" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonContacta.png"></button></li>
				<li><button value="Administracion" class="hvr-pulse" onClick="clickBoton(this.value)"><img src="images/botonAdministracion.png"></button></li>

			</ul>
			</nav>
			<h1>Formulario de Inscripción</h1>
			<div class="centralPrincipal">
				<div class="interiorPanel">
					<?php if(isset($errores)){
				print("<div class='div_error'>");
				print("<ul>");
				foreach($errores as $error){		
					print("<li>$error</li>");				
					}
				
				print("</ul></div>");
			}?>
			<form onsubmit="return validacionInscripcion()" class="formInscripcion" action="tratamientos/tratamientoFormulario.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombrePpal" for="nombre" >Nombre</label>
					<input onchange="validaBarra(this.value)"  type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="apellidos" id="label_apellidosPpal">Apellidos</label>
					<input onchange="validaBarra(this.value)" type="text" id="apellidos" name="apellidos" size="50" value="<?=$formulario['apellidos'];?>"/>
					<span class="spanError" id="spanApellidos" nombre="spanApellidos"></span>
				</div></br></br>
				<div>
					<label for="fNac" id="label_fNacPpal">Fecha de Nacimiento</label>
					<select id="dia" name="dia">
						<?php
							for($i=1; $i<=31; $i++){
								print("<option>$i</option>");
							}
						?>
					</select>
					<select id="mes" name="mes">
										<option>Enero</option>
										<option>Febrero</option>
										<option>Marzo</option>
										<option>Abril</option>
										<option>Mayo</option>
										<option>Junio</option>
										<option>Julio</option>
										<option>Agosto</option>
										<option>Septiembre</option>
										<option>Octubre</option>
										<option>Noviembre</option>
										<option>Diciembre</option>
									</select>
					<select onchange="validaNacimiento(); this.onchange=function(){return false}" id="anyo" name="anyo">
						<?php
							for($i=1900; $i<=2016; $i++){
								print("<option>$i</option>");
							}
						?>
					</select>
				</div></br></br>
				<div>
					<label for="dni" id="label_dniPpal">DNI</label>
					<input onchange="validaBarra(this.value)" type="text" id="dniN" name="dniN" maxlength="8" size="8" value="<?=$formulario['dniN'];?>"/>
					<label for>-</label>
					<input onchange="validaBarra(this.value)" type="text" id="dniL" name="dniL" maxlength="1" size="1" value="<?=$formulario['dniL'];?>"/>
					<span class="spanError" id="spanDNI" nombre="spanDNI"></span>
				</div></br></br>
				
				<div>
					<label for="telefono" id="label_telefonoPpal">Teléfono</label>
					<input onchange="validaBarra(this.value)" type="text" id="telefono" name="telefono" maxlength="9" size="9" value="<?=$formulario['telefono'];?>"/>
					<span class="spanError" id="spanTelefono" nombre="spanTelefono"></span>
				</div></br></br>
				<div>
					<label for="direccion" id="label_direccionPpal">Dirección</label>
					<input onchange="validaBarra(this.value)" type="text" id="direccion" name="direccion" size="70" value="<?=$formulario['direccion'];?>"/>
				</div>
				<span class="spanError" id="spanDireccion" nombre="spanDireccion"></span>

				</br></br>
				<div>
					
					<label for="instituto" id="label_institutoPpal">Instituto</label>
					<select onchange="validaBarra(this.value); this.onchange=function(){return false}" id="select_instituto" name="select_instituto">
					<option>---Instituto---</option>
					
					<?php
							$con = conectarBD();
							$nombreInstituto = nombreInstituto($con);
							desconectarBD($con);
							foreach($nombreInstituto as $nombre){
								?><option><?=$nombre['NOMBRE'];?></option>
							<?php }
						?>
					
					</select>
					<span name="quePaquete" id="quePaquete"></span>
							

				</div></br>
				<div>
					<label for="email" id="label_emailPpal">Email</label>
					<input onchange="validaBarra(this.value)" type="email" id="email" name="email" value="<?=$formulario['email'];?>"/>
					<span class="spanError" nombre="spanEmail" id = "spanEmail"></span>
				</div></br></br>
				<div>
					<label for="tipoBuffalo" id="label_tipoBuffaloPpal">Tipo de Buffalo</label>
					<input checked="true" type="radio" id="tipoBuffalo" name="tipoBuffalo" value="alumno">Alumno</input>
					<input type="radio" id="tipoBuffalo" name="tipoBuffalo" value="profesor">Profesor</input>
				</div><br><br>
				<button id="submit">Enviar</button>
			</form>
			<div id="barraProgreso" name="barraProgreso">	
					<progress name="progressBar" id="progressBar" value="10" max="100"></progress>	
				</div>
				<div id="barraSpan" name="barraSpan">
					<span id="spanBarra" name="spanBarra">10 %</span></div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
function nombreInstituto($con){
	
	$resul = $con -> query("SELECT nombre FROM INSTITUTOS");
	return $resul;
}
?>

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('#select_instituto').change(function(){
			  var xhttp = new XMLHttpRequest();
			var nombre = $('#select_instituto').val();
			  xhttp.onreadystatechange = function() {
			
			    if (xhttp.readyState == 4 && xhttp.status == 200) {
				
			      document.getElementById("quePaquete").innerHTML = xhttp.responseText;
			      
			    }
			  };
			  xhttp.open("GET", "paqueteInstituto.php?a="+nombre, true);
			  xhttp.send(); 
		});
	});
</script>

<script type="text/javascript">
	function validaBarra(str){
		var barra = document.getElementById("progressBar");
		
		var nCambios=parseInt($('#spanBarra').text());
		
		if(str != "" ){
			nCambios = nCambios+10;
			barra.setAttribute("value",nCambios);
			document.getElementById("spanBarra").innerHTML = nCambios + ' %';
		}else if(str == ""){
			nCambios = nCambios-10;
			barra.setAttribute("value",nCambios);
			document.getElementById("spanBarra").innerHTML = nCambios + '%';
		}
		
	}
	
	function validaNacimiento(){
		var barra = document.getElementById("progressBar");
		var dia = document.getElementById("dia");
		var mes = document.getElementById("mes");
		var anyo = document.getElementById("anyo");
		
		var nCambios=parseInt($('#spanBarra').text());
		
		if(dia != "1" && mes !="Enero" && anyo!="1900"){
			nCambios = nCambios + 10;
			barra.setAttribute("value",nCambios);
			document.getElementById("spanBarra").innerHTML = nCambios + '%';
		}
	}

	
</script>
