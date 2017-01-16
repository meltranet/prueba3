<?php include '../../meltranet.php';

	$laLis = lisIni('proveedorRec');	
	
	$lcPro = "CALL proveedorRec(".idbVal(0).",".
		idbVal(0).",".
		idbVal(0).",".
		cdbVal('').",".
		cdbVal('').",".
		idbVal(0).idbMel();
	$loSen = dbResIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
		</ul>
	</div>
	<h1>Proveedores</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="crear" target="_self">crear un proveedor</a></li>
		</ul>
    </div>
   	<div style="margin-top:6px; border-right:none;" class="lista">
	    <div style="display:inline;">
        	<form style="display:inline;" method="post">
		    	<div style="display:inline;">
					<select style="width:260px; margin:0px; padding: 0px;" name="cExpSen"><?php
						$lcSen = ''; $lcOpcion = '';
						while ($laSen = dbResFilCar($loSen)) {
                           	if ($lcSen == '') {$lcSen = $laSen["cExpSen"]; $lcOpcion = $laSen["cOpcion"];}?>
    		            	<option value="<?php cMostrar($laSen["cExpSen"]);?>"<?php
								if ($laLis["cExpSen"] == $laSen["cExpSen"]) {
										cMostrar('selected'); $lcSen = $laSen["cExpSen"]; $lcOpcion = $laSen["cOpcion"];
									}?>
                                ><?php cMostrar($laSen["cOpcion"]);?></option><?php
						}
						$laLis['cExpSen'] = $lcSen;?>
					</select>
			    </div>
				<div style="display:inline;">
                   	<input type="hidden" name="iRec" value="1">
					<button type="submit">Mostrar</button>
			    </div>
            </form>
		</div>
        <div style="padding-left:24px; display:inline;">
	       	<form style="display:inline;" method="post">
		    	<div style="display:inline;">
                   	<input style="width:200px; margin:0px; padding: 0px;" name="cExpBus" type="text" 
                       	value="<?php cMostrar($laLis['cExpBus']);?>">
		    	</div>
			    <div style="display:inline;">
                   	<input type="hidden" name="iRec" value="2">
			        <button type="submit">Buscar</button>
		    	</div>
           	</form>
		</div>
	</div>
<?php
	if ($laLis['iRec']==2 && $laLis['cExpBus']=='') {
		mensaje(0, 'Error al realizar búsqueda.', 'Se debe introducir una expresión de búsqueda.');
		exit;
	}
?>
	<div style="border-top:none; border-right:none;" class="lista">
       	<div style="margin-bottom:2px;" class="listaFilaNormal1">
<?php
	if ($laLis['iRec']<2) {cMostrar($lcOpcion);}
	else {?>Resultados de la b&uacute;squeda de:<strong>&nbsp;<?php cMostrar($laLis['cExpBus']);?>&nbsp;</strong><?php }
?>
        </div>
<?php
	$liReg = 0;
	$lcRegCla = '';
	$liRegPri=0; $liRegUlt=0; $liRegTot=0;

	$lcPro = "CALL proveedorRec(".idbVal($laLis['iRec']).",".
		idbVal($laLis['iRegPri']).",".
		idbVal($laLis['iExpSen']).",".
		cdbVal($laLis['cExpSen']).",".
		cdbVal($laLis['cExpBus']).",".
		idbVal(0).idbMel();
	$loReg = dbResIni($lcPro);

	while ($laReg = dbResFilCar($loReg)) {
		$liReg = $liReg + 1;
		$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');
		if ($liReg==1) {$liRegPri = $laReg["iRegPri"]; $liRegUlt = $laReg["iRegUlt"]; $liRegTot = $laReg["iRegTot"];}
		if ($laReg["iEstado"]<1) {$lcBotCla="enviarFila1";} else {$lcBotCla="enviarFila0";}?>
		<form method="post" action="ver/inicio.php">
        	<input type="hidden" name="idProveedor" value="<?php iMostrar($laReg["idProveedor"]);?>">
	    	<div class="<?php cMostrar($lcRegCla);?>">
            	<button type="submit" class="<?php cMostrar($lcBotCla);?>">
					<div style="width:420px;" class="enviarFila"><?php cMostrar($laReg["cNombre"]);?></div>
					<div style="width:220px;" class="enviarFila"><?php cMostrar($laReg["cIdentidad"]);?></div>
				</button>
			</div>
		</form><?php
	}
	if ($liReg==0) {?><div>La b&uacute;squeda no ha obtenido resultados.</div><?php ;}
	dbResRem($loReg);
?> 
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
    </div>
</body>
</html>
