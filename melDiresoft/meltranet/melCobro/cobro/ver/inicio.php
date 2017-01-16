
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
    <script type="text/javascript" src="../../../meltranet.js"></script>
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cuentas por cobrar</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Cobros</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNumero']); if ($laMel['iEstado']<1) {cMostrar(' ('.$laMel['cEstado'].')'); }?>
    </h1>
    <div class="menuH">
		<ul class="menuH">
	        <li class="menuH"><a class="menuH" href="javascript:imprimir();">imprimir el cobro</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="anular" target="_self">anular el cobro</a></li>
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
		        <div style="float:left; color:#777777;">Cuenta</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCuentaNombre']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
    		<div style="border-bottom:1px solid #C6D4E0; padding:6px;"><?php
				if ($laMel['iDocumento']==0) {?>
			        <div style="float:left; color:#777777;">Documento</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   					        value="<?php cMostrar($laMel['cDocumento']); ?>" >
					</div><?php
				} else {?>
			        <div style="float:left; color:#777777;"><?php cMostrar($laMel['cDocumento']); ?></div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   					        value="<?php cMostrar($laMel['cDocumentoNumero']); ?> <?php dMostrar($laMel['dDocumentoFecha']); ?>" >
					</div><?php	
				} ?>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
		</form>
	</div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:30px; text-align:center;" class="listaCeldaTitulo1">&nbsp;</div>
			<div style="width:80px;" class="listaCeldaTitulo1">Origen</div>
			<div style="width:80px;" class="listaCeldaTitulo1">Numero</div>
			<div style="width:250px;" class="listaCeldaTitulo1">Concepto</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Saldo</div>
			<div style="width:100px; text-align:right;" class="listaCeldaTitulo1">Monto</div>
			<div style="width:10px;" class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL cobroFacturaRec(1,".
			idbPost('idCobro').idbMel();
		$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);
		$lcOverflow = ifInmediato(($liDet>6), 'style="height:232px; overflow:auto;"', ""); ?>
        <div <?php cMostrar($lcOverflow);?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');
				$lcClaseIni = ifInmediato(($laDet["iClase"] == 1), '(-)', '(+)');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0"><?php iMostrar($laDet["iFila"]);?></div>
					<div style="width:30px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($lcClaseIni);?></div>
					<div style="width:80px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigen"]);?></div>
					<div style="width:80px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigenNumero"]);?></div>
					<div style="width:250px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigenConcepto"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yDeuda"]);?></div>
					<div style="width:100px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
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
					<div style="padding:3px; border:1px solid #C6D4E0; ">
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
		</div>
	</form>
</body>
</html>
<script language="JavaScript">
	function imprimir() {loRpt.imprimir("cobroRpt.php?id=0", 1);}
</script>
