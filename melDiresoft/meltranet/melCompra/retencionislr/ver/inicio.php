<?php include '../../../meltranet.php';

	$lcPro = "CALL retencionislrRec(3,0,0,'','',".
		idbPost('idRetencionislr').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Retenciones de I.S.L.R.</a><span class="separadorN">/</span></li>
		</ul>
    </div>
    <h1><?php cMostrar($laMel['cNumero']); if ($laMel['iEstado']<1) {cMostrar(' ('.$laMel['cEstado'].')'); }?></h1>
    <div class="menuH">&nbsp;</div>
   	<div style="padding-top:6px; width:400px;">
	    <form>
	    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Fecha</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php dMostrar($laMel["dFecha"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Proveedor</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cProveedorNombre']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Compra</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCompraNumero']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Factura</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php if ($laMel["cFacturaSerie"]!='') {cMostrar('Serie '.$laMel["cFacturaSerie"].' - ');} cMostrar('Numero '.$laMel["cFacturaNumero"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Base</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php yMostrar($laMel["ySubtotal"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Al&iacute;cuota</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php nMostrar($laMel["nAlicuota"],1);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Monto retenido</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php yMostrar($laMel["yMonto"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
	   		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding:3px; border:1px solid #C6D4E0; ">
					<textarea disabled style="width:380px; height:54px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
