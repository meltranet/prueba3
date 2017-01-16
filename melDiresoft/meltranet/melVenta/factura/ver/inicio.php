<?php include '../../../meltranet.php';

	$lcPro = "CALL facturaRec(3,0,0,'','',".
		idbPost('idFactura').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Venta</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Facturas</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNumero']); if ($laMel['iEstado']<1) {cMostrar(' ('.$laMel['cEstado'].')'); }?>
    </h1>
    <div class="menuH">
		<ul class="menuH">
	        <li class="menuH"><a class="menuH" href="javascript:imprimir();">imprimir la factura</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="javascript:imprimir1();">imprimir copia</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="anular" target="_self">anular la factura</a></li>
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
		</form>
	</div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:360px;" class="listaCeldaTitulo1">Servicios</div>
			<div style="width:80px; text-align:center;" class="listaCeldaTitulo1">Cantidad</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Precio</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Subtotal</div>
			<div style="width:10px;" class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL facturaServicioRec(1,".
			idbPost('idFactura').idbMel();
		$loDet = dbResIni($lcPro);?>
        <div <?php if($laMel['iPx']>260){cMostrar('style="height:232px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0" ><?php iMostrar($laDet["iFila"]);?></div>
					<div style="width:360px;" class="listaCeldaNormal1" title="<?php cMostrar($laDet["cServicioNombre"]);?>"><?php cMostrar($laDet["cServicioNombre"],40);?></div>
					<div style="width:80px; text-align:center;" class="listaCeldaNormal1"><?php iMostrar($laDet["iCantidad"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yServicioPrecio"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["ySubtotal"]);?></div>
					<div style="width:10px;" class="listaCeldaNormal2">&nbsp;</div>
					<div class="listaCeldaCorte"></div><?php
					if ($laDet["cDescripcion0"]!='') {?><div style="height:16px; padding-top:0px; padding-bottom:0px; padding-left:50px;"><?php cMostrar($laDet["cDescripcion0"]);?></div><?php }
					if ($laDet["cDescripcion1"]!='') {?><div style="height:16px; padding-top:0px; padding-bottom:0px; padding-left:50px;"><?php cMostrar($laDet["cDescripcion1"]);?></div><?php }
					if ($laDet["cDescripcion2"]!='') {?><div style="height:16px; padding-top:0px; padding-bottom:0px; padding-left:50px;"><?php cMostrar($laDet["cDescripcion2"]);?></div><?php }?>                    
				</div><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
    <div>
    	<form>
		   	<div style="width:400px; float:left;">
   				<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
					<div style="padding:3px; border:1px solid #C6D4E0; ">
						<textarea disabled style="width:380px; height:88px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
					</div>
				</div>
			</div>
		   	<div style="width:320px; float:right;">
    			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		    	    <div style="float:left; color:#777777;">Subtotal</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input disabled style="text-align:right; width:120px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
	   				        value="<?php yMostrar($laMel["ySubtotal"]);?>" >
					</div>
					<div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
    			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		    	    <div style="float:left; color:#777777;">Impuesto</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input disabled style="text-align:right; width:120px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
	   				        value="<?php yMostrar($laMel["yImpuesto"]);?>" >
					</div>
					<div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
    			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		    	    <div style="float:left; color:#777777;">Total</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input disabled style="text-align:right; width:120px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
	   				        value="<?php yMostrar($laMel["yTotal"]);?>" >
					</div>
					<div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
	        <div style="margin:0px; padding:0px; clear:both;"></div>
		</div>
	</form>
</body>
</html>
<script language="JavaScript">
	function imprimir() {loRpt.imprimir("facturaRpt.php?id=0", 1);}
	function imprimir1() {loRpt.imprimir("facturaRpt1.php?id=0", 1);}
</script>
