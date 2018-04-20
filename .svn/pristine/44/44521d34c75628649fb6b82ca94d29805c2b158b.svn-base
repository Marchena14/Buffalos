<?php
	session_start();
include("gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['direccion']="";
	$formulario['codPostal']="";
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
		<script type="text/javascript" src="js/institutos.js"></script>
		<title>Añadir Institutos</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
				<h1>Admin Panel</h1>
				<hr class="lineaSeparadora">
				<h2>Institutos</h2>
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
				<form onsubmit="return validaInstitutos()" class="formInscripcion" action="tratamientos/tratamientoFormularioInstitutos.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombre" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<a title="Introduzca el nombre del instituto" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="direccion" id="label_direccion">Dirección</label>
					<input type="text" id="direccion" name="direccion" size="50" value="<?=$formulario['direccion'];?>"/>
					<a title="Introduzca la dirección del instituto" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanDireccion" nombre="spanDireccion"></span>
				</div></br>
				
				<div>
					<label for="codPostal" id="label_codPostal">Código Postal</label>
					<input type="text" id="codPostal" name="codPostal" maxlength="5" size="5" value="<?=$formulario['codPostal'];?>"/>
					<a title="Introduzca el código postal del instituto" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanCodPostal" nombre="spanCodPostal"></span>
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
				<a title="Introduzca el paquete contratado del instituto" class="tooltip"><span title="More">?</span></a>
				<span class="spanError" id="spanPaquete" nombre="spanPaquete"></span>
				</div></br>				
				</br>
				
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