<?php include '../../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL melCuentaAct1(1,".
			idbPost('idMelCuenta').",".
			cdbPost('cContrasena').",".
			cdbPost('cConfirmar').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('../inicio.php');}
	} else {
		$lcPro = "CALL melCuentaAct1(0,".
			idbPost('idMelCuenta').",".
			cdbPost('cContrasena').",".
			cdbPost('cConfirmacion').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
	}
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cuentas de usuario</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent"><?php cMostrar($laMel['cNombre']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Cambiar la contrase&ntilde;a</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="_parent">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
    <div style="padding-top:6px; width:280px;">
		<form method="post">
    		<input name="idMelCuenta" value="<?php cMostrar($laMel['idMelCuenta']); ?>" type="hidden">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Escriba la nueva Contrase&ntilde;a.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
                	<input id="txtContrasena" name="cContrasena" type="password" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;" maxlength="12">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Escriba de nuevo la contrase&ntilde;a para confirmar.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
                	<input id="txtConfirmar" name="cConfirmar" type="password" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;" maxlength="12">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca el motivo del cambio.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cMotivo" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cMotivo']); ?>" maxlength="80">
				</div>
			</div>
			<div style="padding:6px;"><button type="submit">Cambiar contrase&ntilde;a</button></div>
		</form>
	</div>
</body>
</html>
