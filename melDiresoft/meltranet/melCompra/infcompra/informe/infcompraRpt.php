<?php include '../../../meltranet.php';

	$lcPro = "CALL infcompraRec(1,".
		cdbPost('cPeriodo').idbMel();
	$laMel = dbResFilIni($lcPro);

	$lcPro = "CALL infcompraRec(2,".
		cdbPost('cPeriodo').idbMel();
	$loInf = dbResIni($lcPro);
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
	<?php 
	function pie() {?>
	   		</table>
	    </div><?php
	}
	function encabezado($tcTitulo) {
		rptEncabezado();?>
		<div style="font-size:9px; margin-left:24px;">
   		   	DIRSOFT SISTEMA DE GESTION, C.A.
    	</div>
		<div style="font-size:9px; margin-left:24px;">
   		   	R.I.F. J-40181444-1
    	</div>
		<div style="font-size:9px; margin-left:24px;">
        	Av. Valencia, C.C. y P. Dinast&iacute;a, Nivel Mezzanina, Of. 13, Urb. Parque Naguanagua, Edo. Carabobo
    	</div>
	    <h1>LIBRO DE COMPRAS correspondiente al mes de <?php cMostrar($tcTitulo);?></h1>
		<div style=" width:1340px; font-size:9px;">
    <table cellpadding="0" cellspacing="0" vspace="0" hspace="0"> 		
   		<tr>
    		<td rowspan="2" style="width:24px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000; vertical-align:top;">Oper.<br>Nro.</td>
    		<td rowspan="2" style="width:54px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Fecha<br>de<br>Factura</td>
    		<td rowspan="2" style="width:70px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">R.I.F.</td>
    		<td rowspan="2" style="width:240px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Nombre o Razón Social</td>
    		<td rowspan="2" style="width:46px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Número<br>de<br>Registro</td>
    		<td colspan="2" style="text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">DOCUMENTO</td>
    		<td rowspan="2" style="width:66px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Nro. Control<br>o<br>Maquina Fiscal</td>
    		<td rowspan="2" style="width:38px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Número<br>Nota<br>Debito</td>
    		<td rowspan="2" style="width:38px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Número<br>Nota<br>Crédito</td>
    		<td rowspan="2" style="width:62px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Número<br>Factura<br>Afecta</td>
    		<td rowspan="2" style="width:60px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">T/Compras<br>Incluyendo<br>el IVA</td>
    		<td rowspan="2" style="width:50px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Exenta</td>
    		<td rowspan="2" style="width:50px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Exonerada</td>
    		<td rowspan="2" style="width:50px; text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">No Sujeta</td>
       		<td colspan="4" style="text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">COMPRAS INTERNAS o IMPORTACIONES</td>
       		<td colspan="2" style="text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">RETENCIONES de IVA</td>
		</tr>
   		<tr>
    		<td style="width:26px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Serie</td>
    		<td style="width:62px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Número</td>
    		<td style="width:50px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Base<br>8%</td>
    		<td style="width:50px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">IVA<br>8%</td>
    		<td style="width:60px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Base<br>12%</td>
    		<td style="width:50px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">IVA<br>12%</td>
    		<td style="width:50px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">IVA<br>Retenido</td>
    		<td style="width:80px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; vertical-align:top;">Número de<br>Comprobante</td>
		</tr><?php
	}
	function inf10($taInf) {?>
   		<tr>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;"><?php iMostrar($taInf['iFila']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFecha']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cProveedorIdentidad']); ?></td>
    		<td style="text-align:left; padding-left:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cProveedorNombre']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFacturaSerie']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFacturaNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFacturaControl']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cDebitoNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cCreditoNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cAfectaNumero']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yTotal']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yExenta']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yExonerada']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yNosujeta']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible0']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto0']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible1']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto1']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
		</tr><?php
	}
	function inf11($taInf) {?>
   		<tr>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;"><?php iMostrar($taInf['iFila']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFecha']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cProveedorIdentidad']); ?></td>
    		<td style="text-align:left; padding-left:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cProveedorNombre']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFacturaSerie']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFacturaNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cFacturaControl']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cDebitoNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cCreditoNumero']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cAfectaNumero']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yRetencionivaMonto']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php cMostrar($taInf['cRetencionivaComprobante']); ?></td>
		</tr><?php
	}
	function inf2($taInf) {?>
   		<tr>
    		<td colspan="11" style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">TOTALES</td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yTotal']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yExenta']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yExonerada']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yNosujeta']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible0']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto0']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible1']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto1']); ?></td>
    		<td style="text-align:right; padding-right:2px; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yRetencionivaMonto']); ?></td>
    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
		</tr>
        <tr><td colspan="21">&nbsp;</td></tr>
        <tr><td colspan="21">&nbsp;</td></tr>
		<tr>
    		<td colspan="21">
				<table cellpadding="0" cellspacing="0" vspace="0" hspace="0">    
			   		<tr>
    					<td style="width:280px; text-align:left; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">RESUMEN</td>
			    		<td colspan="2" style="text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000;">Base imponible</td>
		       			<td colspan="2" style="text-align:center; border-top:1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000;">Credito fiscal</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Total: Compras Exentas y/o sin derecho a credito fiscal</td>
			    		<td style="width:66px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">30</td>
			    		<td style="width:66px; text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yExenta']+$taInf['yNosujeta']); ?>&nbsp;</td>
		       			<td colspan="2" style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Compras Importaciones Afectas solo Alícuota General</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">31</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
			    		<td style="width:66px; text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">32</td>
		       			<td style="width:66px; text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Compras Importaciones Afectas en Alícuota General + Adicional</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">312</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">322</td>
		       			<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Compras Importaciones Afectas en Alícuota Reducida</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">313</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">323</td>
		       			<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Compras Internas Afectas solo Alícuota General</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">33</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible1']); ?>&nbsp;</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">34</td>
		       			<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto1']); ?>&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Compras Internas Afectas en Alícuota General + Adicional</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">332</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">342</td>
		       			<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;">&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Compras Internas Afectas en Alícuota Reducida</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">333</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible0']); ?>&nbsp;</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">343</td>
		       			<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto0']); ?>&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Total: Compras y Creditos fiscales</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">35</td>
			    		<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImponible0']+$taInf['yImponible1']); ?>&nbsp;</td>
			    		<td style="text-align:center; border-right:1px solid #000000; border-bottom:1px solid #000000;">36</td>
		       			<td style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yImpuesto0']+$taInf['yImpuesto1']); ?>&nbsp;</td>
					</tr>
			   		<tr>
    					<td style="text-align:left; border-right:1px solid #000000; border-bottom:1px solid #000000; border-left:1px solid #000000;">Total: Retenciones IVA</td>
		       			<td colspan="4" style="text-align:right; border-right:1px solid #000000; border-bottom:1px solid #000000;"><?php yMostrar($taInf['yRetencionivaMonto']); ?>&nbsp;</td>
					</tr>
				</table>
            </td>
		</tr><?php
	}
	$liMax=48; $liFil = 0; 
	while ($laInf = dbResFilCar($loInf)) {
		if($laInf["iInf"]>0) {$liFil = $liFil + 1;}
		if($liFil==1) {encabezado($laMel['cTitulo']);}
		switch ($laInf["iInf"]) {
			case 1:
				if($laInf["iClase"]==1) {inf11($laInf);}
				else {inf10($laInf);}
				break;
			case 2:
				for ($i = $liFil; $i <= $liMax; $i++) {?>
	   				<tr>
    					<td colspan="21">&nbsp</td>
					</tr><?php
				}
				pie();
				encabezado($laMel['cTitulo']);
				inf2($laInf);
				pie();
				break;
			default: $liError = 1;
		}
		if($liFil==$liMax){$liFil = 0;}
	}?>
</body>
</html>
<?php if (iPost('iImprimir')==1) {exit;}?>
<script language="JavaScript">
	window.print();
	loRpt.iInterval = setInterval(loRpt.cerrar, 1);
</script>
