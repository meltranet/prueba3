<?php include '../../meltranet.php';

	if (postExi('iAct')==true) {
		$lcPro = "CALL melCuentaModuloAct(".
			idbPost('iAct').",0,".
			idbPost('idMelModulo').idbMel();
		$laMel = dbResFilIni($lcPro);
	}
	if (postExi('iEli')==true) {
		$lcPro = "CALL melCuentaModuloEli(0,0,".
			idbPost('idMelModulo').idbMel();
		$laMel = dbResFilIni($lcPro);
	}

	$lcPro = "CALL melCuentaRec1(0".idbMel();
	$laMel = dbResFilIni($lcPro);

	$lcPro = "CALL melCuentaModuloRec(0".idbMel();
	$loDet = dbResIni($lcPro);
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
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
		</ul>
	</div>
	<h1><?php cMostrar($laMel["cNombre"]);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="contrasena">cambiar la contrase&ntilde;a</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="agregar" target="_self">agregar un enlace r&aacute;pido</a></li>
		</ul>
    </div>
   	<div style="padding-top:6px; width:400px;">
	    <form>
	    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
		        <div style="float:left; color:#777777;">Nombre completo</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel["cCompleto"]);?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</div>
		</form>
	</div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:240px;" class="listaCeldaTitulo1">Enlaces R&aacute;pidos</div>
			<div style="width:240px;" class="listaCeldaTitulo1">Aplicaci&oacute;n</div>
			<div class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';?>
        <div <?php if($loDet->num_rows>14){cMostrar('style="height:378px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0">&nbsp;</div>
					<div style="width:240px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cNombre"]);?></div>
					<div style="width:240px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cAplicacion"]);?></div>
					<div style="width:60px;" class="listaCeldaNormal1">
		                <form method="post">
    			    		<input type="hidden" name="idMelModulo" value="<?php iMostrar($laDet["idMelModulo"]);?>">
    			    		<input type="hidden" name="iAct" value="0">
	                       	<button type="submit">Subir</button>
						</form>
                    </div>
					<div style="width:60px;" class="listaCeldaNormal1">
		                <form method="post">
    			    		<input type="hidden" name="idMelModulo" value="<?php iMostrar($laDet["idMelModulo"]);?>">
    			    		<input type="hidden" name="iAct" value="1">
	                       	<button type="submit">Bajar</button>
						</form>
                    </div>
					<div class="listaCeldaNormal2">
		                <form method="post">
    			    		<input type="hidden" name="idMelModulo" value="<?php iMostrar($laDet["idMelModulo"]);?>">
    			    		<input type="hidden" name="iEli" value="0">
	                       	<button type="submit">Quitar</button>
						</form>
					</div>
					<div class="listaCeldaCorte"></div>
				</div><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
</body>
</html>
