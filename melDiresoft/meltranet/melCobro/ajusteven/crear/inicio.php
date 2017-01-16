<?php include '../../../meltranet.php';

	if (postExi('idFactura')==true) {
		$lcPro = "CALL ajustevenIns(0,".
			idbPost('idFactura').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('descripcion.php');}
	}
	
	$laLis = lisIni('facturaRec1');	

	$lcPro = "CALL facturaRec1(0,0,0,'',''".idbMel();
	$loSen = dbResIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cuentas por cobrar</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Ajustes en ventas</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Crear un ajuste</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="ifmMeltranet">cancelar</a></li>
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

			$lcPro = "CALL facturaRec1(".idbVal($laLis['iRec']).",".
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
    		    	<input type="hidden" name="idFactura" value="<?php iMostrar($laReg["idFactura"]);?>">
	    			<div class="<?php cMostrar($lcRegCla);?>" title="<?php cMostrar($laReg["cClienteNombre"]);?>">
            			<button type="submit" class="enviarFila0">
							<div style="width:66px;" class="enviarFila"><?php cMostrar($laReg["cNumero"]);?></div>
							<div style="width:82px;" class="enviarFila"><?php dMostrar($laReg["dFecha"]);?></div>
							<div style="width:128px;" class="enviarFila"><?php cMostrar($laReg["cClienteNombre"],14);?></div>
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
		<div style="width:364px; float:right;">
			Seleccione una factura para el ajuste.
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>
