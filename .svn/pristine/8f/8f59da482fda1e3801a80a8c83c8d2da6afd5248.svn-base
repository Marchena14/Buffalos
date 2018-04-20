<?php
	session_start();
include("gestiones/gestionBD.php");
if(!isset($_SESSION['formulario'])){
	$formulario['nombre']="";
	$formulario['descripcion']="";
	$formulario['precioPvp']="";
	$formulario['precioIns']="";
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
		<script type="text/javascript" src="js/productos.js"></script>
		<title>Añadir Productos</title>
		<link rel="stylesheet" type="text/css" href="estiles.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
	</head>
	<body class="bodyTabla">
		<div class="cabeceraAdmin">
				<h1>Admin Panel</h1>
				<hr class="lineaSeparadora">
				<h2>Productos</h2>
		</div>
		<div class="containerFlex">
			<fieldset class="fieldCenter">
				<legend>Formulario de Productos</legend>
				<?php if(isset($errores)){
				print("<div class='div_error'>");
				print("<ul>");
				foreach($errores as $error){		
					print("<li>$error</li>");				
					}
				
				print("</ul></div>");
			}?>
				<form  onsubmit="return validaProductos()" class="formInscripcion2" action="tratamientos/tratamientoFormularioProductos.php" method="post" id="inscripcion">
				<div>
					<label id="label_nombre" for="nombre" >Nombre</label>
					<input type="text" id="nombre" name="nombre" value="<?=$formulario['nombre'];?>"/>
					<a title="Introduzca el nombre del producto" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanNombre" nombre="spanNombre"></span>
				</div></br>
				<div>
					<label for="descripcion" id="label_descripcion">Descripción</label>
					<input type="text" id="descripcion" name="descripcion" size="50" value="<?=$formulario['descripcion'];?>"/>
					<a title="Introduzca la descripción del producto" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanDescripcion" nombre="spanDescripcion"></span>
				</div></br>
				
				<div>
					<label for="precioPvp" id="label_precioPvp">Precio Público</label>
					<input type="text" id="precioPvp" name="precioPvp" maxlength="5" size="7" value="<?=$formulario['precioPvp'];?>"/>
					<a title="Ejemplo: 22.50" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanPrecioPvp" nombre="spanPrecioPvp"></span>
				</div></br>
				
				<div>
					<label for="precioIns" id="label_precioIns">Precio Instituto</label>
					<input type="text" id="precioIns" name="precioIns" maxlength="5" size="7" value="<?=$formulario['precioIns'];?>"/>
					<a title="Ejemplo: 20" class="tooltip"><span title="More">?</span></a>
					<span class="spanError" id="spanPrecioIns" nombre="spanPrecioIns"></span>
				</div></br>
				<label for="info" class="mensajeInfo">* Campos obligatorios</label>
				</br>
				<center><button id="submit">Enviar</button></center>
			</form>
			</fieldset>
		</div>
		
		
	</body>
</html>

<script>
	$('h1').click(function(){
		location.href="adminPanel.php"
	});	
</script>