<?php include '../../../../meltranet.php';
	$lcPro = "CALL compraRec(3,0,0,'','',".
		idbPost('idCompra').idbMel();
	$laMel = dbResFilIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compras</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent"><?php cMostrar($laMel['cNumero']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Ver Detalles</h1>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:240px;" class="listaCeldaTitulo1">Impuesto aplicado</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Monto Base</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Calculado</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Ajuste</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Impuesto</div>
			<div style="width:10px;" class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL compraImpuestoRec(1,".
			idbPost('idCompra').idbMel();
		$loDet = dbResIni($lcPro);?>
        <div><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0" >&nbsp;</div>
					<div style="width:240px;" class="listaCeldaNormal1" ><?php cMostrar($laDet["cImpuesto"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yBase"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yCalculo"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yAjuste"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
					<div style="width:10px;" class="listaCeldaNormal2">&nbsp;</div>
					<div class="listaCeldaCorte"></div>
				</div><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div><?php 
	$lcPro = "CALL compraRetencionRec(1,".
			idbPost('idCompra').idbMel();
	$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);
	if ($liDet>0) {?>
		<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
			<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
				<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
				<div style="width:240px;" class="listaCeldaTitulo1">Retenci&oacute;n aplicada</div>
				<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Monto Base</div>
				<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Bruto</div>
				<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Deducible</div>
				<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Retencion</div>
				<div style="width:10px;" class="listaCeldaTitulo2">&nbsp;</div>
				<div class="listaCeldaCorte"></div>
			</div><?php
			$lcRegCla = '';
			$lcPro = "CALL compraRetencionRec(1,".
				idbPost('idCompra').idbMel();
			$loDet = dbResIni($lcPro);?>
			<div><?php
				while ($laDet = dbResFilCar($loDet)) {
					$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
					<div class="<?php cMostrar($lcRegCla);?>">
						<div style="width:20px;" class="listaCeldaNormal0" >&nbsp;</div>
						<div style="width:240px;" class="listaCeldaNormal1" ><?php cMostrar($laDet["cRetencionNombre"]);?></div>
						<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yBase"]);?></div>
						<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yBruto"]);?></div>
						<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yDeducibleMonto"]);?></div>
						<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
						<div style="width:10px;" class="listaCeldaNormal2">&nbsp;</div>
						<div class="listaCeldaCorte"></div>
					</div><?php
				}?>
			</div><?php
			dbResRem($loDet);?>
		</div><?php 
	}?>
</body>
</html>
