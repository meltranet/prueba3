<?php include '../../../meltranet.php';

	$lcPro = "CALL promotorRec(3,0,0,'','',".
		idbPost('idPromotor').idbMel();
	$laMel = dbResFilIni($lcPro);
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Venta</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Promotores</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNombre']);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="eliminar" target="_self">eliminar el promotor</a></li>
		</ul>
    </div>
   	<div style="padding-top:6px;  width:480px;">
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="comision.php">
		        <div style="float:left; color:#777777;">Comisi&oacute;n mercadeo</div>
				<div style="float:right;">
					<input name="idPromotor" value="<?php cMostrar($laMel['idPromotor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php yMostrar($laMel['nComision']); ?>%" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="categoria.php">
		        <div style="float:left; color:#777777;">Categor&iacute;a</div>
				<div style="float:right;">
					<input name="idPromotor" value="<?php cMostrar($laMel['idPromotor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCategoria']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
   		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<div style="padding:3px; border:1px solid #C6D4E0; ">
				<textarea disabled style="width:460px; height:54px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
			</div>
		</div>
	</div>
</body>
</html>
