<?php include '../../../../meltranet.php';

	if (postExi('eNota')==true) {
		$lcPro = "CALL compraIns4(0,".
			edbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../../ver/inicio.php');}
	} else {
		if (postExi('idRetencion')==true) {
			$lcPro = "CALL compraIns3(".
				idbPost('iIns').",".
				idbPost('idRetencion').",".
				edbPost('eNota').idbMel();
		} else {
			$lcPro = "CALL compraIns3(0,".
				idbPost('idRetencion').",".
				edbPost('eNota').idbMel();
		}
		$laMel = dbResFilIni($lcPro);
	}

	$laLis = lisIni('retencionRec1');

	$lcPro = "CALL retencionRec1(0,0,0,'',''".idbMel();
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compras</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear una compra</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../factura" target="_parent"><?php cMostrar($laMel['cProveedorNombre'],40);?></a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../impuesto" target="_parent">Total&nbsp;<?php yMostrar($laMel['yTotal']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Retenci&oacute;n de Impuesto</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
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

			$lcPro = "CALL retencionRec1(".idbVal($laLis['iRec']).",".
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
    		    	<input type="hidden" name="idRetencion" value="<?php iMostrar($laReg["idRetencion"]);?>">
    		    	<input type="hidden" name="iIns" value="1">
	    			<div title="<?php cMostrar($laReg["cNombre"]);?>" class="<?php cMostrar($lcRegCla);?>">
            			<button type="submit" class="enviarFila0">
							<div style="width:354px;" class="enviarFila"><?php cMostrar($laReg["cNombre"]);?></div>
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
			$lcPro = "CALL compraRetencionRec(0,0".idbMel();
			$loDet = dbResIni($lcPro); $liDet = dbResNum($loDet);
			if ($liDet==0) {cMostrar("Si es requerido seleccione una retención para aplicar el calculo.");}
			else {?>
		    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
					<div style="width:220px; text-align:left;" class="listaCeldaTitulo0">Retenci&oacute;n aplicado</div>
					<div style="width:80px; text-align:right;" class="listaCeldaTitulo1">Retenci&oacute;n</div>
					<div style="width:0px; text-align:right;" class="listaCeldaTitulo2">&nbsp;</div>
		  	    	<div class="listaCeldaCorte"></div>
				</div><?php 
				$lcOverflow = ifInmediato(($laMel['iPx']>280), "height:280px; overflow:auto;", ""); ?>
				<div style="border-bottom:1px solid #C6D4E0; font-size:10px; <?php cMostrar($lcOverflow);?> "><?php
					$lcRegCla = ''; 
					while ($laDet = dbResFilCar($loDet)) {
						$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
						<form method="post">
	        				<input type="hidden" name="idRetencion" value="<?php iMostrar($laDet["idRetencion"]);?>">
	        				<input type="hidden" name="iIns" value="2">
		    				<div style="padding-top:1px; padding-bottom:1px;" class="<?php cMostrar($lcRegCla);?>">
								<div style="height:19px; padding-top:0px; padding-bottom:0px; width:220px;" class="listaCeldaNormal0" title="<?php cMostrar($laDet["cRetencionNombre"]);?>"><?php cMostrar($laDet["cRetencionNombre"],30);?></div>
			            		<div style="height:19px; padding-top:0px; padding-bottom:0px; width:80px; text-align:right;" class="listaCeldaNormal1" ><?php yMostrar($laDet["yMonto"]);?></div>
		    		        	<div style="height:19px; padding:0px;" class="listaCeldaNormal2">
									<button type="submit" style="padding:0px; margin: 0px; font-size:9px;">x</button>
								</div>
        	    	            <div class="listaCeldaCorte"></div>
							</div>
						</form><?php
					}
					dbResRem($loDet);?>
				</div><?php
			}?>
			<form method="post">
				<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
   				    <div style="padding:3px; border:1px solid #C6D4E0; ">
	   	                <textarea name="eNota" style="width:344px; height:54px; font-family:Arial; font-size:13px; border:none; background:none;"><?php eMostrar($laMel["eNota"]);?></textarea>
					</div>
				</div>
				<div style="padding:6px; text-align:right;"><button type="submit">Crear compra</button></div>
			</form>
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>
