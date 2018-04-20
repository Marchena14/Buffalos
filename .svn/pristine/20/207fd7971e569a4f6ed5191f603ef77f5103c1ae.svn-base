<?php
	session_start();
include("gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['descripcion']="";
	$formulario['precio']="";
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
		<script type="text/javascript" src="js/paquetes.js"></script>
		<title>Añadir Paquetes</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
				<h1>Admin Panel</h1>
				<hr class="lineaSeparadora">
				<h2>Paquetes</h2>
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
				<form onsubmit="return validaPaquetes()" class="formInscripcion2" action="tratamientos/tratamientoFormularioPaquetes.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombre" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<a title="Introduzca el nombre del paquete" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="descripcion" id="label_descripcion">Descripcion</label>
					<input type="text" id="descripcion" name="descripcion" size="50" value="<?=$formulario['descripcion'];?>"/>
					<a title="Introduzca la descripción del paquete" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanDescripcion" nombre="spanDescripcion"></span>
				</div></br>
								
				<div>
					<label for="precio" id="label_precio">Precio</label>
					<input type="text" id="precio" name="precio" maxlength="5" size="5 value="<?=$formulario['precio'];?>"/>
					<a title="Introduzca cuanto cuesta el paquete" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanPrecio" nombre="spanPrecio"></span>
				</div></br>
				<label for="info" class="mensajeInfo">* Campos obligatorios</label><br>
				<center><button id="submit">Enviar</button></center>
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
<script>
	$('h1').click(function(){
		location.href="adminPanel.php"
	});	
</script>