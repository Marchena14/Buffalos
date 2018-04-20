<?php
session_start();
ob_start();
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
	$_SESSION['formulario'] = $formulario;
}else{
	$formulario = $_SESSION['formulario'];
}
?>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
<div>
<center><h1>Autorizacion Buffalo Adventure</h1></center>

<p>
	Damos la bienvenida a <?= $formulario['nombre']." ". $formulario['apellidos'];?> </p>
	 <p>con DNI <?= $formulario['dniN']."-".$formulario['dniL'];?></p>
	 <p>nacido el <?= $formulario['dia']." de ". $formulario['mes']." del ". $formulario['anyo'];?> </p>
	<p>con telefono <?=$formulario['telefono'];?> y vivienda <?=$formulario['direccion'];?></p>
	 <p>cuyo correo es	<?=$formulario['email'];?> y el instituto <?=$formulario['instituto'];?></p>

<center><h2>Informacion de Tutor legal</h2></center>
<p>Nombre: ________________________</p>
<p>Apellidos: _____________________________________________</p>
<p>Feccha de Nacimiento: __/__/____</p>
<p>DNI: ________-_</p>
<p>Telefono: _________</p>
</div>

	Firma                                  Firma Tutor Legal
</body>
</html>
<?php
require_once('dompdf/dompdf_config.inc.php');
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename="autorizacion.pdf";
file_put_contents($filename,$pdf);
$dompdf->stream($filename);
?>