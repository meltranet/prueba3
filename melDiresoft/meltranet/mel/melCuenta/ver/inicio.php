<?php include '../../../meltranet.php';

	$lcPro = "CALL melCuentaRec(3,0,0,'','',".
		idbPost('idMelCuenta').idbMel();
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
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Cuentas de usuario</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNombre']);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="contrasena">cambiar la contrase&ntilde;a</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="permiso" target="_self">establecer los permisos</a></li>
			<li class="menuH"><span class="separadorH">&#x2022;</span><a class="menuH" href="eliminar" target="_self">eliminar la cuenta</a></li>
		</ul>
    </div>
   	<div style="padding-top:6px; width:480px;">
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="completo.php">
		        <div style="float:left; color:#777777;">Nombre completo</div>
				<div style="float:right;">
					<input name="idMelCuenta" value="<?php cMostrar($laMel['idMelCuenta']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCompleto']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="categoria.php">
		        <div style="float:left; color:#777777;">Categor&iacute;a</div>
				<div style="float:right;">
					<input name="idMelCuenta" value="<?php cMostrar($laMel['idMelCuenta']); ?>" type="hidden">
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
			<div style="width:600px;" class="listaCeldaTitulo1">Permisos de acceso</div>
			<div class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL melCuentaPermisoRec(0,".
			idbPost('idMelCuenta').idbMel();
		$loDet = dbResIni($lcPro);?>
        <div <?php if($loDet->num_rows>11){cMostrar('style="height:260px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
			   	<div class="<?php cMostrar($lcRegCla);?>">
					<div style="width:20px;" class="listaCeldaNormal0">&nbsp;</div>
					<div style="width:600px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cNombre"]);?></div>
					<div class="listaCeldaNormal2">&nbsp;</div>
					<div class="listaCeldaCorte"></div>
				</div><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
   	<div style="width:480px;">
   		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<div style="padding:3px; border:1px solid #C6D4E0; ">
				<textarea disabled style="width:460px; height:51px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
			</div>
		</div>
	</div>
</body>
</html>
