<?php include '../../../../meltranet.php';

	if (postExi('cBase')==true) {
		$lcPro = "CALL compraIns2(1,".
			cdbPost('cBase').",".
			ndbPost('nImpuesto').idbMel();
	} else {
		$lcPro = "CALL compraIns2(0,".
			cdbPost('cBase').",".
			ndbPost('nImpuesto').idbMel();
	}
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
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear una compra</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../factura" target="_parent"><?php cMostrar($laMel['cProveedorNombre'],40);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cDescripcion'],40);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<div style="padding-top:3px;">
		<div style="width:280px; float:left;">
			<form method="post">
				<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
					<div style="padding-bottom:3px;">
						Introduzca el monto base.
					</div>
					<div style="padding:3px; border:1px solid #C6D4E0;">
						<input name="cBase" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
							value="<?php cMostrar($laMel['cBase']); ?>" maxlength="13">
					</div>
				</div>
				<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
					<div style=" padding-bottom:3px;">
						Seleccione el impuesto aplicable.
					</div>
					<div style="padding:3px; border:1px solid #C6D4E0;">
						<select name="nImpuesto" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
							<option value="-1" <?php if($laMel['nImpuesto']==-1) {cMostrar("selected");}?> >...</option>
							<option value="12" <?php if($laMel['nImpuesto']==12) {cMostrar("selected");}?> >G 12,00%</option>
							<option value="8" <?php if($laMel['nImpuesto']==12) {cMostrar("selected");}?> >R 8,00%</option>
							<option value="0" <?php if($laMel['nImpuesto']==12) {cMostrar("selected");}?> >Exento</option>
						</select>
					</div>
				</div>
				<div style="padding:6px;"><button type="submit">Agregar</button></div>
			</form>
		</div>
		<div style="width:364px; float:right;"><?php
			$lcPro = "CALL compraImpuestoRec(0,0".idbMel();
			$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);
			if ($liDet>0) {?>
		    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
					<div style="width:140px; text-align:left;" class="listaCeldaTitulo0">Impuesto aplicado</div>
					<div style="width:80px; text-align:right;" class="listaCeldaTitulo1">Monto Base</div>
					<div style="width:80px; text-align:right;" class="listaCeldaTitulo1">Impuesto</div>
					<div style="width:0px; text-align:right;" class="listaCeldaTitulo2">&nbsp;</div>
		  	    	<div class="listaCeldaCorte"></div>
				</div><?php 
				$lcOverflow = ifInmediato(($laMel['iPx']>280), "height:280px; overflow:auto;", ""); ?>
				<div style="border-bottom:1px solid #C6D4E0; font-size:10px; <?php cMostrar($lcOverflow);?> "><?php
					$lcRegCla = ''; 
					while ($laDet = dbResFilCar($loDet)) {
						$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
						<form action="impuesto.php" method="post">
	        				<input type="hidden" name="idCompraImpuesto" value="<?php iMostrar($laDet["idCompraImpuesto"]);?>">
		    				<div style="padding-top:1px; padding-bottom:1px;" class="<?php cMostrar($lcRegCla);?>">
								<div style="height:19px; padding-top:0px; padding-bottom:0px; width:140px;" class="listaCeldaNormal0"><?php cMostrar($laDet["cImpuesto"]);?></div>
			            		<div style="height:19px; padding-top:0px; padding-bottom:0px; width:80px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yBase"]);?></div>
			            		<div style="height:19px; padding-top:0px; padding-bottom:0px; width:80px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
		    		        	<div style="height:19px; padding:0px;" class="listaCeldaNormal2">
									<button type="submit" style="padding:0px; margin: 0px; font-size:9px;">...</button>
								</div>
        	    	            <div class="listaCeldaCorte"></div>
							</div>
						</form><?php
					}
					dbResRem($loDet);?>
				</div>
				<form action="../retencion/inicio.php" method="post">
				   	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				    	<div style="padding-top:0px;">
		    			    <div style="float:left; color:#777777;">Subtotal</div>
							<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
								<input disabled style="width:100px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; text-align:right "
	   				        		value="<?php yMostrar($laMel['ySubtotal']); ?>" >
							</div>
							<div style="margin:0px; padding:0px; clear:both;"></div>
						</div>
				    	<div style="padding-top:6px;">
		    			    <div style="float:left; color:#777777;">Impuesto</div>
							<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
								<input disabled style="width:100px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; text-align:right "
	   				        		value="<?php yMostrar($laMel['yImpuesto']); ?>" >
							</div>
							<div style="margin:0px; padding:0px; clear:both;"></div>
						</div>
				    	<div style="padding-top:6px;">
		    			    <div style="float:left; color:#777777;">Total</div>
							<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
								<input disabled style="width:100px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; text-align:right "
	   				        		value="<?php yMostrar($laMel['yTotal']); ?>" >
							</div>
							<div style="margin:0px; padding:0px; clear:both;"></div>
						</div>
					</div>
					<div style="padding:6px; text-align:right;"><button type="submit">Continuar</button></div>
				</form><?php
			}?>
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>
