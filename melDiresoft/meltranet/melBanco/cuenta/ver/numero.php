<?php include '../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL cuentaAct2(1,".
			idbPost('idCuenta').",".
			cdbPost('cNumero').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('inicio.php');}
	} else {
		$lcPro = "CALL cuentaAct2(0,".
			idbPost('idCuenta').",".
			cdbPost('cNumero').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Banco</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Cuentas</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../ver" target="_self"><?php cMostrar($laMel['cNombre']); ?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Cambiar el Numero</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../ver" target="_self">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<div style="padding-top:6px; width:280px;">
		<form method="post">
    		<input name="idCuenta" value="<?php cMostrar($laMel['idCuenta']); ?>" type="hidden">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca el nuevo Numero.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cNumero" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cNumero']); ?>" maxlength="20">
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
			<div style="padding:6px;"><button type="submit">Cambiar numero</button></div>
		</form>
	</div>
</body>
</html>
