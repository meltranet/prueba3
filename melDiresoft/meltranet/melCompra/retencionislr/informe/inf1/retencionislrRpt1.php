<?php include '../../../../meltranet.php';

	if (postExi('iImprimir')==true) {
		$lcPro = "CALL retencionislrInfRec1(1,".
			cdbPost('cDesde').",".
			cdbPost('cHasta').",".
			idbSes('idMelAcceso').");";
		$laReg = dbResFilIni($lcPro);
	} else {exit;}
		
	$lcPro = "CALL retencionislrInfRec1(2,".
		cdbPost('cDesde').",".
		cdbPost('cHasta').",".
		idbSes('idMelAcceso').");";
	$loInf = dbResIni($lcPro);
	
	if (iPost('iImprimir')==2) {
		$lcBuffer=='';
		while ($laInf = dbResFilCar($loInf)) {
			if($lcBuffer=='') {
				$lcBuffer='<?xml version="1.0" encoding="ISO-8859-1"?>
<RelacionRetencionesISLR RifAgente="'.$laInf["cAgenteIdentidad"].'" Periodo="'.$laInf["cPeriodo"].'">'; 
			}
			$lcBuffer = $lcBuffer.'
<DetalleRetencion>
<RifRetenido>'.$laInf["cProveedorIdentidad"].'</RifRetenido>
<NumeroFactura>'.$laInf["cFacturaNumero"].'</NumeroFactura>
<NumeroControl>'.$laInf["cFacturaControl"].'</NumeroControl>
<CodigoConcepto>'.$laInf["cRetencionCodigo"].'</CodigoConcepto>
<MontoOperacion>'.$laInf["cSubtotal"].'</MontoOperacion>
<PorcentajeRetencion>'.$laInf["cAlicuota"].'</PorcentajeRetencion>
</DetalleRetencion>';
		}
	$lcBuffer = $lcBuffer.'
</RelacionRetencionesISLR>';
		dbResRem($loInf);
		$lcArchivo = "../../../../xml/retencionislr.xml";
		$lrArchivo = fopen($lcArchivo, "w+"); 
		fwrite($lrArchivo, $lcBuffer); 
		fclose($lrArchivo); 
		cargarPag($lcArchivo); 
	}
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
		if ($laReg["iError"] == 1) {
			mensaje($laReg["iMensaje"], $laReg["cMensaje"], $laReg["vMensaje"]);
			exit;
		} 
	?>
    <h1>Informe de Retenciones de I.S.L.R. Para Declaraci&oacute;n</h1>
    <div style="padding-left:24px;">Del&nbsp;<?php cMostrar($laReg["cDesde"]);?>&nbsp;al&nbsp;<?php cMostrar($laReg["cHasta"]);?></div>
    <div style="margin-top:12px; padding-left:12px; margin-right:12px; width:740px;">
		<div class="listaFilaTitulo">
			<div style="width:90px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">
            	N&uacute;mero<br>
                de<br>
            	R.I.F.
            </div>
			<div style="width:80px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">
            	N&uacute;mero<br>
                de<br>
            	Documento
            </div>
			<div style="width:80px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">
            	N&uacute;mero<br>
            	Control<br>
                Factura
            </div>
			<div style="width:80px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">
            	C&oacute;digo<br>
            	de<br>
                Retenci&oacute;n
            </div>
			<div style="width:80px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">
            	Monto<br>
            	Base<br>
                Imponible
            </div>
			<div style="width:80px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">
            	%<br>
            	de<br>
                Al&iacute;cuota
            </div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		function inf0 ($taInf) {?>
			<div>
				<div style="width:90px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($taInf['cProveedorIdentidad']);?></div>
    			<div style="width:80px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($taInf["cFacturaNumero"]);?></div>
    			<div style="width:80px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($taInf["cFacturaControl"]);?></div>
    			<div style="width:80px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($taInf["cRetencionCodigo"]);?></div>
    			<div style="width:80px; text-align:right;" class="listaCeldaNormal1"><?php cMostrar($taInf["cSubtotal"]);?></div>
    			<div style="width:80px; text-align:center;" class="listaCeldaNormal2"><?php cMostrar($taInf["cAlicuota"]);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		while ($laInf = dbResFilCar($loInf)) {
			switch ($laInf["iInf"]) {
				case 0:
					inf0($laInf);
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
