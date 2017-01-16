<?php include '../../../../meltranet.php';

	if (postExi('iImprimir')==true) {
		$lcPro = "CALL retencionislrInfRec(1,".
			cdbPost('cDesde').",".
			cdbPost('cHasta').idbMel();
		$laMel = dbResFilIni($lcPro);
	} 
		
	$lcPro = "CALL retencionislrInfRec(2,".
		cdbPost('cDesde').",".
		cdbPost('cHasta').idbMel();
	$loInf = dbResIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../../melSocio.css" rel="stylesheet" type="text/css">
	<link href="../../../../../melRpt.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../../../meltranet.js"></script>
</head>
<body>
	<?php rptEncabezado();?>
    <?php 
		if ($laMel["iError"] == 1) {
			mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);
			exit;
		} 
	?>
    <h1>Listado de Retenciones de I.S.L.R.</h1>
    <div style="padding-left:24px;">Del&nbsp;<?php cMostrar($laMel["cDesde"]);?>&nbsp;al&nbsp;<?php cMostrar($laMel["cHasta"]);?></div>
    <div style="margin-top:12px; padding-left:12px; margin-right:12px; width:740px;">
		<div class="listaFilaTitulo">
			<div style="width:20px; text-align:left; font-size:11px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:70px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Retenci&oacute;n</div>
			<div style="width:80px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Fecha</div>
			<div style="width:240px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Proveedor</div>
			<div style="width:120px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Factura</div>
			<div style="width:70px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">Base</div>
			<div style="width:70px; text-align:right; font-size:11px;" class="listaCeldaTitulo2">Monto</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		function inf0 ($taInf) {?>
			<div>
				<div style="width:20px; text-align:left;" class="listaCeldaNormal0"><?php iMostrar($taInf['iFila']);?></div>
				<div style="width:70px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($taInf['cNumero']);?></div>
				<div style="width:80px; text-align:left;" class="listaCeldaNormal1"><?php dMostrar($taInf['dFecha']);?></div>
				<div style="width:240px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($taInf['cProveedorNombre'],40);?></div>
				<div style="width:120px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($taInf['cFacturaNumero']);?></div>
				<div style="width:70px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['ySubtotal']);?></div>
    			<div style="width:70px; text-align:right;" class="listaCeldaNormal2"><?php yMostrar($taInf['yMonto']);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		function inf1 ($taInf) {?>
			<div class="listaFilaPie">&nbsp;</div>
			<div>
				<div style="width:20px; text-align:left;" class="listaCeldaNormal0">&nbsp;</div>
				<div style="width:596px; text-align:left;" class="listaCeldaNormal1">TOTAL</div>
				<div style="width:70px; text-align:right;" class="listaCeldaNormal2"><?php yMostrar($taInf['yMonto']);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		while ($laInf = dbResFilCar($loInf)) {
			switch ($laInf["iInf"]) {
				case 0:
					inf0($laInf);
					break;
				case 1:
					inf1($laInf);
					break;
				default: $liError = 1;
			}

		}?>
    </div>
</body>
</html>
<?php if (iPost('iImprimir')==1) {exit;}?>
<script language="JavaScript">
	window.print();
	loRpt.iInterval = setInterval(loRpt.cerrar, 1);
</script>
