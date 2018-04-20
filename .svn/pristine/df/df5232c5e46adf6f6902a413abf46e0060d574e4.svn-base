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
	$formulario['tipoMonitor']="Normal";
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
		<script type="text/javascript" src="js/inscripcion.js"></script>
		<title>Añadir Monitores</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
				<h1>Admin Panel</h1>
				<hr class="lineaSeparadora">
				<h2>Monitores</h2>
		</div>
		<div class="containerFlex">
			<fieldset class="fieldCenter">
				<?php if(isset($errores)){
				print("<div class='div_error'>");
				print("<ul>");
				foreach($errores as $error){		
					print("<li>$error</li>");				
					}
				
				print("</ul></div>");
			}?>
				<form onsubmit="return validacionInscripcion()" class="formInscripcion" action="tratamientos/tratamientoFormularioMonitores.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombre" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<a title="Introduzca el nombre del Monitor" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="apellidos" id="label_apellidos">Apellidos</label>
					<input type="text" id="apellidos" name="apellidos" size="50" value="<?=$formulario['apellidos'];?>"/>
					<a title="Introduzca los apellidos del Monitor" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanApellidos" nombre="spanApellidos"></span>
				</div></br></br>
				<div>
					<label for="fNac" id="label_fNac">Fecha de Nacimiento</label>
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
					<select id="anyo" name="anyo">
						<?php
							for($i=1900; $i<=2016; $i++){
								print("<option>$i</option>");
							}
						?>
					</select>
					<a title="Introduzca la fecha de nacimiento" class="tooltip"><span title="More">?</span></a>
				</div></br></br>
				<div>
					<label for="dni" id="label_dni">DNI</label>
					<input type="text" id="dniN" name="dniN" maxlength="8" size="8" value="<?=$formulario['dniN'];?>"/>
					<label for>-</label>
					<input type="text" id="dniL" name="dniL" maxlength="1" size="1" value="<?=$formulario['dniL'];?>"/>
					<a title="Introduzca el DNI del Monitor" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanDNI" nombre="spanDNI"></span>
				</div></br></br>
				
				<div>
					<label for="telefono" id="label_telefono">Teléfono</label>
					<input type="text" id="telefono" name="telefono" maxlength="9" size="9" value="<?=$formulario['telefono'];?>"/>
					<a title="Introduzca el teléfono del Monitor" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanTelefono" nombre="spanTelefono"></span>
				</div></br></br>
				<div>
					<label for="direccion" id="label_direccion">Dirección</label>
					<input type="text" id="direccion" name="direccion" size="70" value="<?=$formulario['direccion'];?>"/>
				<a title="Introduzca la dirección del Monitor" class="tooltip"><span title="More">?</span></a>
				<span class="spanError" id="spanDireccion" nombre="spanDireccion"></span>
				</div>
				</br></br>
				
				<div>
					<label for="email" id="label_email">Email</label>
					<input type="email" id="email" name="email" value="<?=$formulario['email'];?>"/>
					<a title="example@example.com" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" nombre="spanEmail" id = "spanEmail"></span>
				</div></br></br>
				<div>
					<label for="tipoBuffalo" id="label_tipoBuffalo">Tipo de Monitor</label>
					<input checked="true" type="radio" id="tipoMonitor" name="tipoMonitor" value="Jefe">Jefe</input>
					<input type="radio" id="tipoMonitor" name="tipoMonitor" value="Normal">Normal</input>
					<input type="radio" id="tipoMonitor" name="tipoMonitor" value="Becario">Becario</input>
					<a title="¿Qué tipo de monitor es?" class="tooltip"><span title="More">?</span></a>
				</div>
				<button id="submit">Enviar</button>
			</form>
			</fieldset>
		</div>
		
		
	</body>
</html>