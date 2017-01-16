<?php include '../../../meltranet.php';

	$lcPro = "CALL retencionvenRec(3,0,0,'','',".
		idbPost('idRetencionven').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cuentas por cobrar</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Retenciones en ventas</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNumero']); if ($laMel['iEstado']<1) {cMostrar(' ('.$laMel['cEstado'].')'); }?>
    </h1>
    <div class="menuH">
		<ul class="menuH">
	        <li class="menuH"><a class="menuH" href="anular" target="_self">anular la retenci&oacute;n</a></li>
		</ul>
    </div>
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
		        <div style="float:left; color:#777777;">Cliente</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cClienteNombre']); ?>" >
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
		        <div style="float:left; color:#777777;">Comprobante</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cComprobanteNumero']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Fecha comprobante</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['dComprobanteFecha']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
		</form>
	</div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:360px;" class="listaCeldaTitulo1">Facturas</div>
			<div style="width:140px; text-align:right;" class="listaCeldaTitulo1">Monto Base</div>
			<div style="width:140px; text-align:right;" class="listaCeldaTitulo1">Monto Retenido</div>
			<div style="width:10px;" class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL retencionvenFacturaRec(1,".
			idbPost('idRetencionvenFactura').idbMel();
		$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);?>
        <div <?php if($liDet>8){cMostrar('style="height:232px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0" onClick="javascrip"><?php iMostrar($laDet["iFila"]);?></div>
					<div style="width:360px;" class="listaCeldaNormal1" title="<?php cMostrar($laDet["cProductoNombre"]);?>"><?php cMostrar($laDet["cFacturaNumero"]);?></div>
					<div style="width:140px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yBase"]);?></div>
					<div style="width:140px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
					<div style="width:10px;" class="listaCeldaNormal2">&nbsp;</div>
					<div class="listaCeldaCorte"></div>
				</div><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
    <div>
    	<form>
		   	<div style="width:400px; float:left;">
   				<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
					<div style="padding:3px; border:1px solid #C6D4E0;">
						<textarea disabled style="width:380px; height:51px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
					</div>
				</div>
			</div>
		   	<div style="width:320px; float:right;">
    			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		    	    <div style="float:left; color:#777777;">Monto</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input disabled style="text-align:right; width:120px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
	   				        value="<?php yMostrar($laMel["yMonto"]);?>" >
					</div>
					<div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
	        <div style="margin:0px; padding:0px; clear:both;"></div>
		</form>
	</div>
</body>
</html>
