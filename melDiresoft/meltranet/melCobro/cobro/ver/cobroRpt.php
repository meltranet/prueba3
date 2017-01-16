<?php include '../../../meltranet.php';

	$lcPro = "CALL cobroRec(3,0,0,'','',".
		idbPost('idCobro').idbMel();
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
    	Cobro&nbsp;<?php cMostrar($laMel["cNumero"]);?>
		<?php if ($laMel['iEstado']==0) {cMostrar(' ('.$laMel['cEstado'].')'); }?>
	</h1>
    <div style="margin-left:24px; width:700px;">
        <div style="padding-top:6px; padding-left:6px;">
	       	<div style="width:100px; float:left;">Fecha</div>
	    	<div style="font-weight:bold; float:left;"><?php dMostrar($laMel["dFecha"]);?></div>
   		    <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:100px; float:left;">Cliente</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cClienteNombre"]);?></div>
            <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;">
    	   	<div style="width:100px; float:left;">Cuenta</div>
   	   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cCuentaNombre"]);?></div>
            <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="padding-top:6px; padding-left:6px;"><?php
			if ($laMel['iDocumento']==0) {?>
	    	   	<div style="width:100px; float:left;">Documento</div>
   		   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cDocumento"]);?></div><?php
			} else {?>
	    	   	<div style="width:100px; float:left;"><?php cMostrar($laMel["cDocumento"]);?></div>
   		   		<div style="font-weight:bold; float:left;"><?php cMostrar($laMel["cDocumentoNumero"]);?>&nbsp;<?php dMostrar($laMel['dDocumentoFecha']); ?></div><?php	
			} ?>
            <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
		<div style="margin-top:12px;">
    		<div style="border-top:1px solid #000000; border-bottom:1px solid #000000;" class="listaFilaTitulo">
				<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
				<div style="width:20px;" class="listaCeldaTitulo1">&nbsp;</div>
				<div style="width:80px;" class="listaCeldaTitulo1">Origen</div>
				<div style="width:80px;" class="listaCeldaTitulo1">Numero</div>
				<div style="width:230px;" class="listaCeldaTitulo1">Concepto</div>
				<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Saldo</div>
				<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Monto</div>
				<div class="listaCeldaTitulo2">&nbsp;</div>
  	    		<div class="listaCeldaCorte"></div>
			</div><?php
			$lcPro = "CALL cobroFacturaRec(1,".
				idbPost('idCobro').idbMel();
			$loDet = dbResIni($lcPro); ?>
    	    <div><?php
				while ($laDet = dbResFilCar($loDet)) {
					$lcClaseIni = ifInmediato(($laDet["iClase"] == 1), '(-)', '(+)');?>
				   	<div>
						<div style="width:20px;" class="listaCeldaNormal0"><?php iMostrar($laDet["iFila"]);?></div>
                        <div style="width:20px;" class="listaCeldaNormal1"><?php cMostrar($lcClaseIni);?></div>
						<div style="width:80px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigen"]);?></div>
						<div style="width:80px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigenNumero"]);?></div>
						<div style="width:230px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigenConcepto"]);?></div>
						<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yOrigenSaldo"]);?></div>
						<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
						<div class="listaCeldaNormal2">&nbsp;</div>
						<div class="listaCeldaCorte"></div>
					</div><?php
				}?>
			</div><?php
			dbResRem($loDet);?>
		</div>
		<div style="border-top:1px solid #000000; border-bottom:1px solid #000000;">
			<div style="width:20px;" class="listaCeldaNormal0">&nbsp;</div>
			<div style="width:20px;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:80px;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:80px;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:230px; text-align:right;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:100px; text-align:right;" class="listaCeldaNormal1">MONTO</div>
			<div style="width:100px; text-align:right; font-weight:bold;" class="listaCeldaNormal1"><?php yMostrar($laMel["yMonto"]);?></div>
			<div class="listaCeldaNormal2">&nbsp;</div>
			<div class="listaCeldaCorte"></div>
		</div>
		<div style="padding:6px;">
        	<?php eMostrar($laMel["eNota"]);?>
        </div>
	</div>
</body>
</html>
<script language="JavaScript">
//	window.print();
//	loRpt.iInterval = setInterval(loRpt.cerrar, 1);
</script>
