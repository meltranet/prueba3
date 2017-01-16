<?php 
	include '../../../../meltranet.php';

	if (postExi('iImprimir')==true) {
		$lcPro = "CALL melActividadInfRec2(2,".
			idbPost('idMelCuenta').",".
			cdbPost('cDesde').",".
			cdbPost('cHasta').idbMel();
		$laMel = dbResFilIni($lcPro);
	} else {exit;}
		
	$lcPro = "CALL melActividadInfRec2(3,".
		idbPost('idMelCuenta').",".
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
    <h1>Informe de Actividades por T&eacute;cnico</h1>
    <div style="padding-left:24px;">Del&nbsp;<?php cMostrar($laMel["cDesde"]);?>&nbsp;al&nbsp;<?php cMostrar($laMel["cHasta"]);?></div>
    <div style="margin-top:12px; padding-left:12px; margin-right:12px; width:740px;">
		<div class="listaFilaTitulo">
			<div style="width:20px; text-align:left; font-size:11px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:70px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Realizada</div>
			<div style="width:80px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Actividad</div>
			<div style="width:340px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Descripci&oacute;n</div>
			<div style="width:70px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">Incidente</div>
			<div style="width:90px; text-align:center; font-size:11px;" class="listaCeldaTitulo2">Duracion</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		function inf0 ($taInf) {?>
			<div style="padding-top:12px;">
				<?php cMostrar($taInf['cMelCuentaNombre']);?>
			</div><?php
		}
		function inf1 ($taInf) {?>
			<div>
				<div style="width:20px; text-align:left;" class="listaCeldaNormal0"><?php iMostrar($taInf['iFila']);?></div>
				<div style="width:70px; text-align:left;" class="listaCeldaNormal1"><?php dMostrar($taInf['dRealizadaFecha']);?></div>
				<div style="width:80px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($taInf['cNumero']);?></div>
				<div style="width:340px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($taInf['cDescripcion'],40);?></div>
				<div style="width:70px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($taInf['cMelIncidenteNumero']);?></div>
    			<div style="width:90px; text-align:center;" class="listaCeldaNormal2"><?php cMostrar($taInf["cDuracion"]);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		function inf2 ($taInf) {?>
			<div>
				<div style="width:20px; text-align:left;" class="listaCeldaNormal0">&nbsp;</div>
				<div style="width:518px; text-align:left;" class="listaCeldaNormal1">Total&nbsp;<?php cMostrar($taInf['cMelCuentaNombre']);?></div>
				<div style="width:70px; text-align:center;" class="listaCeldaNormal1">&nbsp;</div>
				<div style="width:70px; text-align:center; border-top:#000000 solid 1px;" class="listaCeldaNormal2"><?php cMostrar($taInf["cDuracion"]);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		function total($taInf) {?>
			<div class="listaFilaPie">&nbsp;</div>
			<div>
				<div style="width:20px; text-align:left;" class="listaCeldaNormal0"><?php iMostrar($taInf['iFila']);?></div>
				<div style="width:518px; text-align:left;" class="listaCeldaNormal1">TOTAL</div>
				<div style="width:70px; text-align:center;" class="listaCeldaNormal1">&nbsp;</div>
				<div style="width:70px; text-align:center; border-top:#000000 solid 1px;" class="listaCeldaNormal2"><?php cMostrar($taInf["cDuracion"]);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		while ($laInf = dbResFilCar($loInf)) {
			if ($laInf["iTotal"]==1) {total($laInf);}
			else {
				switch ($laInf["iInf"]) {
					case 0:
						inf0($laInf);
						break;
					case 1:
						inf1($laInf);
						break;
					case 2:
						inf2($laInf);
						break;
					default: $liError = 1;
				}
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
