﻿<?php include '../../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL servicioEli(1,".
			idbPost('idServicio').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('../../inicio.php');}
	} else {
		$lcPro = "CALL servicioEli(0,".
			idbPost('idServicio').",".
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Venta</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Servicios</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent"><?php cMostrar($laMel['cNombre']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Eliminar el Servicio</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="_parent">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
    	<input name="idServicio" value="<?php cMostrar($laMel['idServicio']); ?>" type="hidden">
	    <div style="width:280px; padding-top:6px;">
			<div style="padding-top:6px; padding-left:6px;">
       			Introduzca el motivo de la eliminaci&oacute;n.
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
       		    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cMotivo" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laReg['cMotivo']); ?>" maxlength="80">
				</div>
	        </div>
			<div style="padding:6px;"><button type="submit">Eliminar servicio</button></div>
		</div>
	</form>
</body>
</html>
