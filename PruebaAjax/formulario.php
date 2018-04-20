<?php
?>

<html>
	<head><title>Prueba Formulario Ajax</title>
	<style>
	span{
		color:red;
	}
	.errores{
		color:red;
	}
	</style>
	<script src="http://code.jquery.com/jquery-1.12.2.min.js"></script>
	</head>
	<body>
		<form method='post' action='gestionFormulario.php'>
		<table>
			<tr>
				<td>
					<label for='nombre'>Nombre</label>
				</td>
				<td>
					<input type='text' id='nombre' name='nombre' onkeyup="validaNombre(this.value)"><span id="txtHint"></span>
				</td>
			</tr>
			<tr>
				<td>
					<label for='apellidos'>Apellidos</label>
				</td>
				<td>
					<input type='text' id='apellidos' name='apellidos' onkeyup="validaApellidos(this.value)"><span id="apellidoHint"></span>
				</td>
			</tr>
			<tr>
				<td>
					<div id="exito" style="display:none">
						Sus datos han sido recibidos con exito
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="error" style="display:none">
						Hay algun error en sus datos
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" style="display:none" id='enviar' name='enviar'>Enviar</button>
				</td>
			</tr>
		</table>
		<div id="errores" class="errores" style="display:none">Existe algun error</div>
		</form>
				<script>
		function validaNombre(str) {
			  var xhttp;
			  if (str.length == 0) { 
			    document.getElementById("txtHint").innerHTML = "No puede dejarlo en blanco";
			    return;
			  }
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (xhttp.readyState == 4 && xhttp.status == 200) {
			      document.getElementById("txtHint").innerHTML = xhttp.responseText;
					if(document.getElementById("txtHint").innerHTML=="Debe introducir Jesus"){
						$('#errores').show(500);
						$('#enviar').hide(500);
					}else{
						$('#errores').hide(500);
						$('#enviar').show(500);
					}
			    }
			  };
			  xhttp.open("GET", "gethint.php?q="+str, true);
			  xhttp.send();   
		}
		</script>
		<script>
		function validaApellidos(str) {
			  var xhttp;
			  if (str.length == 0) { 
			    document.getElementById("apellidoHint").innerHTML = "No puede dejarlo en blanco";
			    return;
			  }
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (xhttp.readyState == 4 && xhttp.status == 200) {
			      document.getElementById("apellidoHint").innerHTML = xhttp.responseText;
			    }
			  };
			  xhttp.open("GET", "apellidoHint.php?a="+str, true);
			  xhttp.send();   
		}
		</script>
	</body>
</html>