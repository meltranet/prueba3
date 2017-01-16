<?php include '../../../meltranet.php';

	$lcPro = "CALL infcobroRec(1,".
		idbPost('idCliente').idbMel();
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
	<?php rptEncabezado();?>
    <h1>An&aacute;lisis de vencimiento</h1>
    <div style="padding-left:24px;">Cuentas por cobrar</div>
    <div style="margin-top:12px; padding-left:12px; margin-right:12px; width:740px;">
		<div class="listaFilaTitulo">
			<div style="width:70px; text-align:left; font-size:11px;" class="listaCeldaTitulo0">Factura</div>
			<div style="width:80px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Fecha</div>
			<div style="width:80px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Vencimiento</div>
			<div style="width:90px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">Total</div>
			<div style="width:90px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">Saldo</div>
			<div style="width:90px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">A 30 d&iacute;as</div>
			<div style="width:90px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">De 31 a 60 d&iacute;as</div>
			<div style="width:90px; text-align:right; font-size:11px;" class="listaCeldaTitulo2">Mayor a 60 d&iacute;as</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		function inf0 ($taInf) {?>
			<div style="padding-top:12px;">
				<?php cMostrar($taInf['cClienteNombre']);?>
			</div><?php
		}
		function inf1 ($taInf) {?>
			<div>
				<div style="width:70px; text-align:left;" class="listaCeldaNormal0"><?php cMostrar($taInf['cNumero']);?></div>
				<div style="width:80px; text-align:left;" class="listaCeldaNormal1"><?php dMostrar($taInf['dFecha']);?></div>
				<div style="width:80px; text-align:left;" class="listaCeldaNormal1"><?php dMostrar($taInf['dVence']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['yTotal']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['ySaldo']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['yMonto0']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['yMonto1']);?></div>
    			<div style="width:90px; text-align:right;" class="listaCeldaNormal2"><?php yMostrar($taInf["yMonto2"]);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		function inf2 ($taInf) {?>
			<div>
				<div style="width:238px; text-align:right;" class="listaCeldaNormal0">Total cliente</div>
				<div style="width:90px; text-align:right; border-top:#000000 solid 1px;" class="listaCeldaNormal1"><?php yMostrar($taInf['yTotal']);?></div>
				<div style="width:90px; text-align:right; border-top:#000000 solid 1px;" class="listaCeldaNormal1"><?php yMostrar($taInf['ySaldo']);?></div>
				<div style="width:90px; text-align:right; border-top:#000000 solid 1px;" class="listaCeldaNormal1"><?php yMostrar($taInf['yMonto0']);?></div>
				<div style="width:90px; text-align:right; border-top:#000000 solid 1px;" class="listaCeldaNormal1"><?php yMostrar($taInf['yMonto1']);?></div>
    			<div style="width:90px; text-align:right; border-top:#000000 solid 1px;" class="listaCeldaNormal2"><?php yMostrar($taInf["yMonto2"]);?></div>
	   	        <div class="listaCeldaCorte"></div>
			</div><?php
		}
		function inf3 ($taInf) {?>
			<div class="listaFilaPie">&nbsp;</div>
			<div>
				<div style="width:238px; text-align:left;" class="listaCeldaNormal0">TOTAL</div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['yTotal']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['ySaldo']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['yMonto0']);?></div>
				<div style="width:90px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($taInf['yMonto1']);?></div>
    			<div style="width:90px; text-align:right;" class="listaCeldaNormal2"><?php yMostrar($taInf["yMonto2"]);?></div>
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
				case 2:
					inf2($laInf);
					break;
				case 3:
					inf3($laInf);
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
