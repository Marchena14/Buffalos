<?php
	session_start();
include("gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['descripcion']="";
	$formulario['tiempo']="";
	$formulario['paquete']="";
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
		<script type="text/javascript" src="js/actividades.js"></script>
		<title>Añadir Actividades</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
				<h1>Admin Panel</h1>
				<hr class="lineaSeparadora">
				<h2>Actividades</h2>
		</div>
			<div class="containerFlex">
			<fieldset class="fieldCenter">
				<legend>Formulario de Actividades</legend>
				<?php if(isset($errores)){
				print("<div class='div_error'>");
				print("<ul>");
				foreach($errores as $error){		
					print("<li>$error</li>");				
					}
				
				print("</ul></div>");
			}?>
				<form onsubmit="return validaActividades()" class="formInscripcion" action="tratamientos/tratamientoFormularioActividades.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombre" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<a title="Introduzca el nombre de la actividad" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="descripcion" id="label_descripcion">Descripcion</label>
					<input type="text" id="descripcion" name="descripcion" size="50" value="<?=$formulario['descripcion'];?>"/>
					<a title="Introduzca la descripción de la actividad" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanDescripcion" nombre="spanDescripcion"></span>
				</div></br>
				
				<div>
					
					<label for="paquete" id="label_paquete">Paquete</label>
					<select id="select_paquete" name="select_paquete">
					<option value="invalido">---Paquete---</option>
					
					<?php
							$con = conectarBD();
							$nombrePaquete = nombrePaquete($con);
							desconectarBD($con);
							foreach($nombrePaquete as $nombre){
								?><option value="<?=$nombre['ID_PAQUETE']?>"><?=$nombre['NOMBRE'];?></option>
							<?php }
						?>
					
					</select>							
				<a title="Seleccione el paquete al que pertenece" class="tooltip"><span title="More">?</span></a>
				<span class="spanError" id="spanPaquete" nombre="spanPaquete"></span>
				</div></br>
				
				<div>
					<label for="tiempo" id="label_tiempo">Duración</label>
					<input type="text" id="tiempo" name="tiempo" maxlength="2" size="2" value="<?=$formulario['tiempo'];?>"/>
					<a title="Seleccione la duración de la actividad" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanTiempo" nombre="spanTiempo"></span>
				</div></br></br>
				
				<button id="submit">Enviar</button>
			</form>
			</fieldset>
		</div>
		
		
	</body>
</html>

<?php
function nombrePaquete($con){
	
	$resul = $con -> query("SELECT ID_PAQUETE,nombre FROM PAQUETES");
	return $resul;
}
?>