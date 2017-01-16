<?php include '../../../meltranet.php';

	$lcPro = "CALL infcompraRec(0,0".idbMel();
	$loPeriodo = dbResIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compras</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Informes de compras</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Libro de compras</h1>
	<form method="post" action="infcompraRpt.php" target="_blank">
	   	<div style="padding-top:6px; width:280px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px; color:#777777;">
    	   			Seleccione el periodo para el informe.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="cPeriodo" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;"><?php
						while ($laSel = dbResFilCar($loPeriodo)) {?>
		    	    		<option value="<?php cMostrar($laSel['cPeriodo']); ?>"><?php cMostrar($laSel['cOpcion']); ?></option><?php
						}?>
					</select>
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px; color:#777777;">
    	   			Imprimir informe en
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iImprimir" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="0" >Impresora</option>
		        		<option value="1" >Pantalla</option>
					</select>
				</div>
			</div>
			<div style="padding:6px;"><button type="submit">Imprimir libro</button></div>
		</div>
	</form>
</body>
</html>
