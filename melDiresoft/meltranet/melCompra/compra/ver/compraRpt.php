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
	<link href="../../../../melRpt.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../../meltranet.js"></script>
</head>
<body>
	<?php rptEncabezado();?>
    <h1>
    	Compra&nbsp;<?php cMostrar($laMel["cNumero"]);?>
		<?php if ($laMel['iEstado']==0) {cMostrar(' ('.$laMel['cEstado'].')'); }?>
	</h1>
	<div style="padding-top:6px; padding-left:18px;">
        <div style="padding-top:6px; padding-left:6px;">
	       	<div style="width:120px; float:left;">Fecha</div>
	    	<div style="font-weight:bold; float:left;"><?php dMostrar($laMel["dFecha"]);?></div>
   		    <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Proveedor</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cProveedorNombre"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Descripci&oacute;n</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cDescripcion"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Clasificaci&oacute;n</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cMelClasificacionNombre"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Factura</div>
   	   		<div style="font-weight:bold; float:left;"><?php if ($laMel["cFacturaSerie"]!='') {cMostrar('Serie '.$laMel["cFacturaSerie"].' - ');} cMostrar('Numero '.$laMel["cFacturaNumero"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
        <div style="padding-top:6px; padding-left:6px;">
	       	<div style="width:120px; float:left;">Fecha de emisi&oacute;n</div>
	    	<div style="font-weight:bold; float:left;"><?php dMostrar($laMel["dFacturaFecha"]);?></div>
   		    <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">N&uacute;mero de control</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cFacturaControl"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Subtotal</div>
   	   		<div style="font-weight:bold; float:left;"><?php yMostrar($laMel["ySubtotal"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Impuesto</div>
   	   		<div style="font-weight:bold; float:left;"><?php yMostrar($laMel["yImpuesto"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Total</div>
   	   		<div style="font-weight:bold; float:left;"><?php yMostrar($laMel["yTotal"]);?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Retenci&oacute;n</div>
   	   		<div style="font-weight:bold; float:left;"><?php if ($laMel["yRetencion"]>=0) {yMostrar($laMel["yRetencion"].' - ');} else {cMostrar('<sin calculo de retención>');}?></div>
   	   		<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:120px; float:left;">Departamento</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cDepartamentoNombre"]);?></div>    	    	<div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding:6px;">
        	<?php eMostrar($laMel["eNota"]);?>
        </div>
	</div>
</body>
</html>
<script language="JavaScript">
	window.print();
	loRpt.iInterval = setInterval(loRpt.cerrar, 1);
</script>
