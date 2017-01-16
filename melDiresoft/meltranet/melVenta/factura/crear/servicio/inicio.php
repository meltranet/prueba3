<?php include '../../../../meltranet.php';

	if (postExi('idServicio')==true) {
		$lcPro = "CALL facturaServicioIns(0,".
			idbPost('idServicio').idbMel();
		$laMel = dbResFilIni($lcPro);
	}	
	
	$lcPro = "CALL facturaIns1(0".idbMel();
	$laMel = dbResFilIni($lcPro);

	$laLis = lisIni('servicioRec1');	

	$lcPro = "CALL servicioRec1(0,0,0,'',''".idbMel();
	$loSen = dbResIni($lcPro);
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Venta</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Facturas</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear una factura</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cClienteNombre'],40);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<div style="padding-top:6px;">
		<div style="width:370px; float:left; border-right:none;" class="lista">
			<form method="post">
				<div style="display:inline;">
					<select style="width:290px; margin:0px; padding: 0px;" name="cExpSen"><?php
						$lcSen = ''; $lcOpcion = '';
						while ($laSen = dbResFilCar($loSen)) {
        		        if ($lcSen == '') {$lcSen = $laSen["cExpSen"]; $lcOpcion = $laSen["cOpcion"];}?>
    				    	<option value="<?php cMostrar($laSen["cExpSen"]);?>"<?php
								if ($laLis["cExpSen"] == $laSen["cExpSen"]) {
									cMostrar('selected'); $lcSen = $laSen["cExpSen"]; $lcOpcion = $laSen["cOpcion"];
								}?> ><?php cMostrar($laSen["cOpcion"]);?> </option><?php
						}
						$laLis['cExpSen'] = $lcSen;?>
					</select>
				</div>
				<div style="display:inline;">
        			<input type="hidden" name="iRec" value="1">
					<button type="submit">Mostrar</button>
				</div>
			</form>
			<div style="border-left:none;" class="lista">
				<div style="margin-bottom:2px;" class="listaFilaNormal1"><?php
					if ($laLis['iRec']==2 && $laLis['cExpBus']=='') {cMostrar('Se debe introducir una expresión de búsqueda.');} 
					else {
						if ($laLis['iRec']<2) {cMostrar($lcOpcion);}
						else {?>Resultados de la b&uacute;squeda de:<strong>&nbsp;<?php cMostrar($laLis['cExpBus']);?>&nbsp;</strong><?php }
					}?>
			    </div>
			</div><?php
			$liReg = 0; $lcRegCla = '';
			$liRegPri=0; $liRegUlt=0; $liRegTot=0;

			$lcPro = "CALL servicioRec1(".idbVal($laLis['iRec']).",".
				idbVal($laLis['iRegPri']).",".
				idbVal($laLis['iExpSen']).",".
				cdbVal($laLis['cExpSen']).",".
				cdbVal($laLis['cExpBus']).idbMel();
			$loReg = dbResIni($lcPro);

			while ($laReg = dbResFilCar($loReg)) {
				$liReg = $liReg + 1;
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');
				if ($liReg==1) {$liRegPri = $laReg["iRegPri"]; $liRegUlt = $laReg["iRegUlt"]; $liRegTot = $laReg["iRegTot"];}?>
				<form method="post">
    		    	<input type="hidden" name="idServicio" value="<?php iMostrar($laReg["idServicio"]);?>">
	    			<div title="<?php cMostrar($laReg["cNombre"]);?>" class="<?php cMostrar($lcRegCla);?>">
            			<button type="submit" class="enviarFila0">
							<div style="width:284px;" class="enviarFila"><?php cMostrar($laReg["cNombre"],32);?></div>
							<div style="width:70px; text-align:right;" class="enviarFila"><?php yMostrar($laReg["yPrecio"]);?></div>
						</button>
					</div>
				</form><?php
			}
			dbResRem($loReg);
			if ($liReg==0) {?><div>La b&uacute;squeda no ha obtenido resultados.</div><?php ;}?> 
		   	<div style="margin-top:2px; text-align:right;" class="listaFilaNormal1"><?php
    		   	if ($liRegPri > 1) {?>
					<form style="display:inline;" method="post">
	        	   		<input type="hidden" name="iExpSen" value="2">
    	       			<input type="hidden" name="iRegPri" value="<?php iMostrar($liRegPri);?>">
						<button type="submit" style="padding:0px;" title="Página anterior"><</button>
					</form><?php 
				}?>
	    	   	&nbsp;<strong><?php iMostrar($liRegPri);?></strong>&nbsp;-&nbsp;<strong><?php iMostrar($liRegUlt);?></strong>&nbsp;de&nbsp;<strong><?php iMostrar($liRegTot);?></strong>&nbsp;<?php 
				if ($liRegTot > $liRegUlt) {?>
        	    	<form style="display:inline;" method="post">
	        	   		<input type="hidden" name="iExpSen" value="1">
    	       			<input type="hidden" name="iRegPri" value="<?php iMostrar($liRegPri);?>">
						<button type="submit" style="padding:0px;" title="Página siguiente">></button>
					</form><?php 
				}?>
    	    	&nbsp;
			</div>
			<form method="post">
				<div style="display:inline;">
					<input style="width:290px; margin:0px; padding: 0px;" name="cExpBus" maxlength="40" type="text" 
        	    		value="<?php cMostrar($laLis['cExpBus']);?>">
				</div>
				<div style="display:inline;">
					<input type="hidden" name="iRec" value="2">
					<button type="submit">Buscar</button>
				</div>
			</form>
		</div>
		<div style="width:364px; float:right;"><?php
			$lcPro = "CALL facturaServicioRec(0,0".idbMel();
			$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);
			if ($liDet==0) {cMostrar("Seleccione un servicio para agregar a la factura.");}
			else {?>
		    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
					<div style="width:190px; text-align:left;" class="listaCeldaTitulo0">Productos y Servicios</div>
					<div style="width:50px; text-align:center;" class="listaCeldaTitulo1">Cantidad</div>
					<div style="width:60px; text-align:right;" class="listaCeldaTitulo1">Subtotal</div>
					<div style="width:0px; text-align:right;" class="listaCeldaTitulo2">&nbsp;</div>
		  	    	<div class="listaCeldaCorte"></div>
				</div><?php 
				$lcOverflow = ifInmediato(($laMel['iPx']>280), "height:280px; overflow:auto;", ""); ?>
				<div style="border-bottom:1px solid #C6D4E0; font-size:10px; <?php cMostrar($lcOverflow);?> "><?php
					$lcRegCla = ''; 
					while ($laDet = dbResFilCar($loDet)) {
						$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
						<form action="servicio.php" method="post">
	        				<input type="hidden" name="idFacturaServicio" value="<?php iMostrar($laDet["idFacturaServicio"]);?>">
		    				<div style="padding-top:1px; padding-bottom:1px;" class="<?php cMostrar($lcRegCla);?>">
								<div style="height:19px; padding-top:0px; padding-bottom:0px; width:190px;" class="listaCeldaNormal0" title="<?php cMostrar($laDet["cServicioNombre"]);?>"><?php cMostrar($laDet["cServicioNombre"],30);?></div>
			            		<div style="height:19px; padding-top:0px; padding-bottom:0px; width:50px; text-align:center;" class="listaCeldaNormal1"><?php iMostrar($laDet["iCantidad"]);?></div>
			            		<div style="height:19px; padding-top:0px; padding-bottom:0px; width:60px; text-align:right;" class="listaCeldaNormal1" title="<?php yMostrar($laDet["yServicioPrecio"]);?>"><?php yMostrar($laDet["ySubtotal"]);?></div>
		    		        	<div style="height:19px; padding:0px;" class="listaCeldaNormal2">
									<button type="submit" style="padding:0px; margin: 0px; font-size:9px;">...</button>
								</div>
        	    	            <div class="listaCeldaCorte"></div><?php
								if ($laDet["cDescripcion0"]!='') {?><div style="height:13px; padding-top:0px; padding-bottom:0px; padding-left:24px;"><?php cMostrar($laDet["cDescripcion0"],40);?></div><?php }
								if ($laDet["cDescripcion1"]!='') {?><div style="height:13px; padding-top:0px; padding-bottom:0px; padding-left:24px;"><?php cMostrar($laDet["cDescripcion1"],40);?></div><?php }
								if ($laDet["cDescripcion2"]!='') {?><div style="height:13px; padding-top:0px; padding-bottom:0px; padding-left:24px;"><?php cMostrar($laDet["cDescripcion2"],40);?></div><?php }?>
							</div>
						</form><?php
					}
					dbResRem($loDet);?>
				</div>
				<form action="control.php" method="post">
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
		    			    <div style="float:left; color:#777777;">I.V.A.&nbsp;<?php cMostrar($laMel['cImpuesto']); ?></div>
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
