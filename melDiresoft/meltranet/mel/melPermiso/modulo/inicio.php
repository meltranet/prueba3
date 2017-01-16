<?php 
	include '../../../meltranet.php';

	if (postExi('idMelPermiso')==true) {
		$lcPro = "CALL melPermisoModuloIns0(2,".
			idbPost('idMelPermiso').",".
			idbPost('idMelModulo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('../ver/inicio.php');}
	} else {
		if (postExi('idMelModulo')==true) {
			$lcPro = "CALL melPermisoModuloIns0(1,".
				idbPost('idMelPermiso').",".
				idbPost('idMelModulo').idbMel();
			$laMel = dbResFilIni($lcPro);
		} else {
			$lcPro = "CALL melPermisoModuloIns0(0,".
				idbPost('idMelPermiso').",".
				idbPost('idMelModulo').idbMel();
			$laMel = dbResFilIni($lcPro);
		}
	}
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Permisos de acceso</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../ver" target="_parent"><?php cMostrar($laMel['cNombre']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Establecer los modulos</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../ver" target="_parent">cancelar</a></li>
		</ul>
    </div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:600px;" class="listaCeldaTitulo1">Aplicaciones/Modulos con acceso</div>
			<div class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL melPermisoModuloRec(1,".
			idbPost('idMelPermiso').idbMel();
		$loDet = dbResIni($lcPro);?>
        <div <?php if($loDet->num_rows>14){cMostrar('style="height:378px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');
				$lcMargen = ifInmediato(($laDet["iEstado"] == 1), 'margin-left:0px;', 'margin-left:60px;');?>
                <form method="post">
    	    		<input type="hidden" name="idMelModulo" value="<?php iMostrar($laDet["idMelModulo"]);?>">
				   	<div class="<?php cMostrar($lcRegCla);?>">
						<div style="width:20px;" class="listaCeldaNormal0">&nbsp;</div>
						<div style="width:560px; <?php cMostrar($lcMargen);?>" class="listaCeldaNormal1"><?php cMostrar($laDet["cNombre"]);?></div>
						<div class="listaCeldaNormal2"><?php
                        	if ($laDet["iEstado"] == 1) {cMostrar('&nbsp;');}
							else { ?>
								<button style="background:none; border:none;">
									<img src="../../../jpg/<?php if($laDet["idMelPermiso"]==0){cMostrar('casilla1.jpg');} else {cMostrar('casilla0.jpg');} ?>" align="top" border="0" >
								</button><?php
							} ?>
    	   	            </div>
					<div class="listaCeldaCorte"></div>
					</div>
				</form><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
	<div style="margin-top:6px;">
        <form method="post">
    		<input name="idMelPermiso" value="<?php cMostrar($laMel['idMelPermiso']); ?>" type="hidden">
            <div style="padding:6px;"><button type="submit">Establecer modulos</button></div>
		</form>
	</div>
</body>
</html>
