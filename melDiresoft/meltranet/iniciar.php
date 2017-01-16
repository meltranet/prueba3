<?php 
	$liMelAccesoError = 0;
	if (sesVarExi('iMelAccesoError')==true) {
		$liMelAccesoError = sesVarVal('iMelAccesoError');
		sesVarRem('iMelAccesoError');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="meltranet.css" rel="stylesheet" type="text/css">
	<link href="../melSocio.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
		</ul>
	</div>
	<h1>Meltranet</h1>
   	<?php if ($liMelAccesoError == 1) {mensaje(0, 'Error al acceder', sesVarVal('cMelAccesoError'));} ?>
	<div style="margin-left:12px;">
       	<form target="_top" action="acceder.php" method="post" >
            <?php include 'formulario.php';?>
		</form>
    </div>
</body>
</html>
