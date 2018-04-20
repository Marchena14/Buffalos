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
	$formulario['tipoBuffalo']="Alumno";
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
		<title>Añadir Buffalos</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
			
				<h1>Admin Panel</h1>
				<hr class="lineaSeparadora">
				<h2>Buffalos</h2>
			
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
				<form onsubmit="return validacionInscripcion()" class="formInscripcion" action="tratamientos/tratamientoFormularioBuffalos.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombre" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<a title="Introduzca el nombre del Buffalo" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="apellidos" id="label_apellidos">Apellidos</label>
					<input type="text" id="apellidos" name="apellidos" size="50" value="<?=$formulario['apellidos'];?>"/>
					<a title="Introduzca el apellido del Buffalo" class="tooltip"><span title="More">?</span></a>
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
				<a title="Introduzca su fecha de nacimiento" class="tooltip"><span title="More">?</span></a>
				</div></br></br>
				<div>
					<label for="dni" id="label_dni">DNI</label>
					<input type="text" id="dniN" name="dniN" maxlength="8" size="8" value="<?=$formulario['dniN'];?>"/>
					<label for>-</label>
					<input type="text" id="dniL" name="dniL" maxlength="1" size="1" value="<?=$formulario['dniL'];?>"/>
					<a title="XXXXXXXXX-L" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanDNI" nombre="spanDNI"></span>
				</div></br></br>
				
				<div>
					<label for="telefono" id="label_telefono">Teléfono</label>
					<input type="text" id="telefono" name="telefono" maxlength="9" size="9" value="<?=$formulario['telefono'];?>"/>
					<a title="123456789" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanTelefono" nombre="spanTelefono"></span>
				</div></br></br>
				<div>
					<label for="direccion" id="label_direccion">Dirección</label>
					<input type="text" id="direccion" name="direccion" size="70" value="<?=$formulario['direccion'];?>"/>
					<a title="Introduzca su dirección" class="tooltip"><span title="More">?</span></a>
				<span class="spanError" id="spanDireccion" nombre="spanDireccion"></span>
				</div>
				</br></br>
				<div>
					
					<label for="instituto" id="label_instituto">Instituto</label>
					<select id="select_instituto" name="select_instituto">
					<option>---Instituto---</option>
					
					<?php
							$con = conectarBD();
							$nombreInstituto = nombreInstituto($con);
							desconectarBD($con);
							foreach($nombreInstituto as $nombre){
								?><option value="<?=$nombre['ID_INSTITUTO']?>"><?=$nombre['NOMBRE'];?></option>
							<?php }
						?>
					
					</select>
					<a title="Seleccione su Instituto" class="tooltip"><span title="More">?</span></a>
					<span name="quePaquete" id="quePaquete"></span>
							

				</div></br>
				<div>
					<label for="email" id="label_email">Email</label>
					<input type="email" id="email" name="email" value="<?=$formulario['email'];?>"/>
					<a title="example@example.com" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" nombre="spanEmail" id = "spanEmail"></span>
				</div></br></br>
				<div>
					<label for="tipoBuffalo" id="label_tipoBuffalo">Tipo de Buffalo</label>
					<input checked="true" type="radio" id="tipoBuffalo" name="tipoBuffalo" value="Alumno">Alumno</input>
					<input type="radio" id="tipoBuffalo" name="tipoBuffalo" value="Profesor">Profesor</input>
					<a title="¿Qué tipo de Buffalo es usted?" class="tooltip"><span title="More">?</span></a>
				</div>
				<button id="submit">Enviar</button>
			</form>
			</fieldset>
		</div>
		
		
	</body>
</html>

<?php
function nombreInstituto($con){
	
	$resul = $con -> query("SELECT ID_INSTITUTO,nombre FROM INSTITUTOS");
	return $resul;
}
?>