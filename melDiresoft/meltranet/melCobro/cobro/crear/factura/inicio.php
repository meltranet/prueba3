<?php include '../../../../meltranet.php';

	if (postExi('eNota')==true) {
		$lcPro = "CALL cobroIns2(1,".
			edbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('../../ver/inicio.php');}
	} else {
		if (postExi('idFactura')==true) {
			$lcPro = "CALL cobroFacturaIns(0,".
				idbPost('idFactura').idbMel();
			$laMel = dbResFilIni($lcPro);
		}	
	
		$lcPro = "CALL cobroIns2(0,".
			edbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
	}

	$laLis = lisIni('facturaRec2');	

	$lcPro = "CALL facturaRec2(0,0,0,'','',".
		idbPost('idCliente').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Cuentas por cobrar</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cobros</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear un cobro</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../cliente/" target="_parent"><?php cMostrar($laMel['cClienteNombre'], 40);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cCuentaNombre']);?></h1>
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

			$lcPro = "CALL facturaRec2(".idbVal($laLis['iRec']).",".
				idbVal($laLis['iRegPri']).",".
				idbVal($laLis['iExpSen']).",".
				cdbVal($laLis['cExpSen']).",".
				cdbVal($laLis['cExpBus']).",".
				idbPost('idCliente').idbMel();
			$loReg = dbResIni($lcPro);

			while ($laReg = dbResFilCar($loReg)) {
				$liReg = $liReg + 1;
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');
				if ($liReg==1) {$liRegPri = $laReg["iRegPri"]; $liRegUlt = $laReg["iRegUlt"]; $liRegTot = $laReg["iRegTot"];}?>
				<form method="post">
    		    	<input type="hidden" name="idFactura" value="<?php iMostrar($laReg["idFactura"]);?>">
	    			<div class="<?php cMostrar($lcRegCla);?>">
            			<button type="submit" class="enviarFila0">
							<div style="width:66px;" class="enviarFila"><?php cMostrar($laReg["cNumero"]);?></div>
							<div style="width:82px;" class="enviarFila"><?php dMostrar($laReg["dFecha"]);?></div>
							<div style="width:72px; text-align:right;" class="enviarFila"><?php yMostrar($laReg["ySubtotal"]);?></div>
							<div style="width:56px; text-align:right;" class="enviarFila"><?php yMostrar($laReg["yImpuesto"]);?></div>
							<div style="width:72px; text-align:right;" class="enviarFila"><?php yMostrar($laReg["yTotal"]);?></div>
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
			$lcPro = "CALL cobroFacturaRec(0,0".idbMel();
			$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);
			if ($liDet==0) {cMostrar("Seleccione una factura para ser agregada.");}
			else {?>
		    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
					<div style="width:16px; text-align:left;" class="listaCeldaTitulo0">&nbsp;</div>
					<div style="width:60px; text-align:left;" class="listaCeldaTitulo1">Origen</div>
					<div style="width:60px; text-align:left;" class="listaCeldaTitulo1">Numero</div>
					<div style="width:72px; text-align:right;" class="listaCeldaTitulo1">Saldo</div>
					<div style="width:74px; text-align:right;" class="listaCeldaTitulo1">Monto</div>
					<div style="width:16px;" class="listaCeldaTitulo2">&nbsp;</div>
		  	    	<div class="listaCeldaCorte"></div>
				</div>
				<?php $lcOverflow = ifInmediato(($liDet>9), "height:266px; overflow:auto;", ""); ?>
				<div style=" <?php cMostrar($lcOverflow);?> border-bottom:1px solid #C6D4E0; font-size:10px;"><?php
					$lcRegCla = ''; 
					while ($laDet = dbResFilCar($loDet)) {
						$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0'); 
						$lcClaseIni = ifInmediato(($laDet["iClase"] == 1), '(-)', '(+)'); ?>
                       	<form action="factura.php" method="post">
	        				<input type="hidden" name="idFactura" value="<?php iMostrar($laDet["idFactura"]);?>">
		    				<div class="<?php cMostrar($lcRegCla);?>">
								<div style="width:16px;" class="listaCeldaNormal0"><?php cMostrar($lcClaseIni);?></div>
			            		<div style="width:60px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigen"]);?></div>
			            		<div style="width:60px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($laDet["cOrigenNumero"]);?></div>
			            		<div style="width:72px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yDeuda"]);?></div>
			            		<div style="width:74px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet["yMonto"]);?></div>
		    		        	<div style="width:16px;" class="listaCeldaNormal2">
                                	<?php if($laDet["iOrigen"]==0) { ?>
										<button type="submit" style="padding:0px; margin: 0px; font-size:9px;">...</button>
                                    <?php } else {?>
                                    &nbsp;
                                    <?php } ?>
								</div>
        	    	            <div class="listaCeldaCorte"></div>
							</div>
						</form><?php
					}
					dbResRem($loDet);?>
				</div>
				<form method="post">
				   	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				    	<div style="padding-top:0px;">
		    			    <div style="float:left; color:#777777;">Monto</div>
							<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
								<input disabled style="width:100px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; text-align:right "
	   				        		value="<?php yMostrar($laMel['yMonto']); ?>" >
							</div>
							<div style="margin:0px; padding:0px; clear:both;"></div>
						</div>
					</div>
   					<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
       				    <div style="padding:3px; border:1px solid #C6D4E0; ">
		   	                <textarea name="eNota" style="width:344px; height:54px; font-family:Arial; font-size:13px; border:none; background:none;"><?php eMostrar($laMel["eNota"]);?></textarea>
						</div>
					</div>
					<div style="padding:6px; text-align:right;"><button type="submit">Crear cobro</button></div>
				</form><?php
			}?>
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>
