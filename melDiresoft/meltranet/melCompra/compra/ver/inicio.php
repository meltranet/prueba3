<?php include '../../../meltranet.php';

	$lcPro = "CALL compraRec(3,0,0,'','',".
		idbPost('idCompra').idbMel();
	$laMel = dbResFilIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../melSocio.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../../../meltranet.js"></script>
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Compras</a><span class="separadorN">/</span></li>
		</ul>
    </div>
    <h1><?php cMostrar($laMel['cNumero']); if ($laMel['iEstado']<1) {cMostrar(' ('.$laMel['cEstado'].')'); }?></h1>
    <div class="menuH">
		<ul class="menuH">
	        <li class="menuH"><a class="menuH" href="detalle">ver detalles</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="javascript:imprimir();" target="_self">imprimir la compra</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="javascript:imprimir1();" target="_self">imprimir comprobante de islr</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="proveedor" target="_self">actualizar el proveedor</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="anular" target="_self">anular la compra</a></li>
		</ul>
    </div>
<div style="height:437px; overflow:auto;">
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
		        <div style="float:left; color:#777777;">Descripci&oacute;n</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cDescripcion']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Clasificaci&oacute;n</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cMelClasificacionNombre']); ?>" >
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
		        <div style="float:left; color:#777777;">Fecha de emisi&oacute;n</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php dMostrar($laMel["dFacturaFecha"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">N&uacute;mero de control</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel["cFacturaControl"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Subtotal</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php yMostrar($laMel["ySubtotal"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Impuesto</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php yMostrar($laMel["yImpuesto"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Total</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php yMostrar($laMel["yTotal"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Retenci&oacute;n</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php if ($laMel["yRetencion"]>=0) {yMostrar($laMel["yRetencion"].' - ');} else {cMostrar('<sin calculo de retención>');}?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Departamento</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cDepartamentoNombre']); ?>" >
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
</div>
</body>
</html>
<script language="JavaScript">
	function imprimir() {
		loRpt.imprimir("compraRpt.php?id=0", 1);
	}
	function imprimir1() {
		loRpt.imprimir("compraRpt1.php?id=0", 1);
	}
</script>
