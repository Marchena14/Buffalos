<?php
   session_start();
   $error = $_SESSION['error'];
   $paginaAnterior = $_SESSION['paginaActual'];
   unset($_SESSION);
?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="estiles.css" />
	<script src="http://code.jquery.com/jquery.js"></script>
		<title>BuffaError</title>
	</head>
	<body class="bodyError">
		<h1>Ups! Te ha atropellado un Bufalo</h1>
		<div class="msgError">
		<p>Se ha producido un error irreparable. Se informará al administrador para
							su correción. Pulse Volver para retroceder.</p>
							
		<input type="button" class="botonVolver" id="btnVolver" value="Volver"/>
		<input type="hidden" id="pag" value="<?= $paginaAnterior?>"/></div>
		<h1>Mensaje Avanzado</h1>
		<div class="msgErrorAvanzado">
		<p><fieldset>
			<?= $error?>
		</fieldset></p></div>
		
	</body>
</html>
<script>
			$(document).ready(function(){
				$("#btnVolver").click(function(){
					var url = $("#pag").val();
					$(location).attr('href',url);
				});
			});
		</script>