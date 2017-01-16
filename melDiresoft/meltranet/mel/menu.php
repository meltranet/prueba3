<?php include '../meltranet.php';
	$lcPro = "CALL melModuloAccesoRec(2,'99'".idbMel();
	$loMen = dbResIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
   	<div style="height:40px; background:url(../jpg/categoriaFondo.jpg); border:1px solid #DDDDDD;">
		<div class="categoria"><a href="../mel" target="_parent">Sistema</a></div>
	</div>
	<div style="padding:18px;">
		<ul class="menuV"><?php 
			while ($laMen = dbResFilCar($loMen)) {?>
				<li><a class="menuV" href="<?php cMostrar($laMen["cDireccion"]);?>/" target="_parent"><?php cMostrar($laMen["cNombre"]);?></a></li><?php
			}?>
   			<li><a class="menuV" href="../../" target="_top">Salir de Meltranet</a></li>
		</ul>
	</div>
</body>
</html>
