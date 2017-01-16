<?php include '../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL servicioAct2(1,".
			idbPost('idServicio').",".
			cdbPost('cDescripcion0').",".
			cdbPost('cDescripcion1').",".
			cdbPost('cDescripcion2').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('inicio.php');}
	} else {
		$lcPro = "CALL servicioAct2(0,".
			idbPost('idServicio').",".
			cdbPost('cDescripcion0').",".
			cdbPost('cDescripcion1').",".
			cdbPost('cDescripcion2').",".
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Venta</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Servicios</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../ver" target="_self"><?php cMostrar($laMel['cNombre']); ?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Cambiar la Descripci&oacute;n</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../ver" target="_self">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
    	<input name="idServicio" value="<?php cMostrar($laMel['idServicio']); ?>" type="hidden">
	    <div style="width:280px; padding-top:6px;">
			<div style="padding-top:6px; padding-left:6px;">
       			Introduzca la nueva Descripci&oacute;n.
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
       		    <div style="margin-top:3px; padding:3px; border:1px solid #C6D4E0;">
		            <input name="cDescripcion0" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cDescripcion0']); ?>" maxlength="40">
				</div>
       		    <div style="margin-top:3px; padding:3px; border:1px solid #C6D4E0;">
		            <input name="cDescripcion1" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cDescripcion1']); ?>" maxlength="40">
				</div>
       		    <div style="margin-top:3px; padding:3px; border:1px solid #C6D4E0;">
		            <input name="cDescripcion2" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cDescripcion2']); ?>" maxlength="40">
				</div>
	        </div>
			<div style="padding-top:6px; padding-left:6px;">
       			Introduzca el motivo del cambio.
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
       		    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cMotivo" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cMotivo']); ?>" maxlength="80">
				</div>
	        </div>
			<div style="padding:6px;"><button type="submit">Cambiar descripci&oacute;n</button></div>
		</div>
	</form>
</body>
</html>
