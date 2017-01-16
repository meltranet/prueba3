<?php 
	include '../../../meltranet.php';

	$lcPro = "CALL melPermisoRec(3,0,0,'','',".
		idbPost('idMelPermiso').idbMel();
	$laMel = dbResFilIni($lcPro);
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
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNombre']);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../modulo" target="_self">establecer los modulos</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="../eliminar" target="_self">eliminar el permiso</a></li>
		</ul>
    </div>
   	<div style="width:480px; padding-top:6px;">
    	<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
			<form method="post" action="descripcion.php">
		        <div style="float:left;">Descripci&oacute;n</div>
				<div style="float:right;">
					<input name="idMelPermiso" value="<?php cMostrar($laMel['idMelPermiso']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cDescripcion']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
			<form method="post" action="categoria.php">
		        <div style="float:left;">Categor&iacute;a</div>
				<div style="float:right;">
					<input name="idMelPermiso" value="<?php cMostrar($laMel['idMelPermiso']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCategoria']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
	</div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:600px;" class="listaCeldaTitulo1">Aplicaciones/Modulos con acceso</div>
			<div class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL melPermisoModuloRec(0,".
			idbPost('idMelPermiso').idbMel();
		$loDet = dbResIni($lcPro);?>
        <div <?php if($loDet->num_rows>11){cMostrar('style="height:260px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');
				$lcMargen = ifInmediato(($laDet["iEstado"] == 1), 'margin-left:0px;', 'margin-left:60px;');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0">&nbsp;</div>
					<div style="width:600px; <?php cMostrar($lcMargen);?>" class="listaCeldaNormal1"><?php cMostrar($laDet["cNombre"]);?></div>
					<div class="listaCeldaNormal2">&nbsp;</div>
					<div class="listaCeldaCorte"></div>
				</div><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
   	<div style="width:480px;">
   		<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
			<div style="padding:3px; border:1px solid #C6D4E0; ">
				<textarea disabled style="width:460px; height:54px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
			</div>
		</div>
	</div>
</body>
</html>
