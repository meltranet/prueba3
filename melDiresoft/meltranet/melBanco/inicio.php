<?php include '../meltranet.php';

	$lcPro = "CALL melModuloAccesoRec(2,'03'".idbMel();
	$loMen = dbResIni($lcPro);

	$lcPro = "CALL melModuloAccesoRec(1,''".idbMel();
	$loRap = dbResIni($lcPro);
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
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
		</ul>
	</div>
	<h1>Banco</h1>
	<div>
		<div style="width:524px; border:0px #FF0000 solid; float:left;">
			<ul class="menuA"><?php 
				while ($laMen = dbResFilCar($loMen)) {?>
					<li class="menuA"><a class="menuA" href="<?php cMostrar($laMen["cDireccion"]);?>/" target="_parent"><div class="menuA1"><?php cMostrar($laMen["cNombre"]);?></div></a></li><?php
				}?>
			</ul>
		</div>
		<div style="width:210px; border:0px #FF0000 solid; float:right;">
			<h2>Enlaces R&aacute;pidos</h2>
            <div style="height:6px; background:url(../jpg/linea.jpg)"></div>
            <ul class="menuR"><?php 
				while ($laMen = dbResFilCar($loRap)) {?>
					<li class="menuR"><a class="menuR" href="../<?php cMostrar($laMen["cDireccion"]);?>/" target="_parent"><?php cMostrar($laMen["cNombre"]);?></a></li><?php
				}?>
			</ul>
		</div>
        <div style="clear:both;"></div> 
	</div>
</body>
</html>
