<?php include '../../../meltranet.php';

	if (postExi('cNombre')==true) {
		$lcPro = "CALL servicioIns(1,".
			cdbPost('cNombre').",".
			edbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../ver/inicio.php');}
	} else {
		$lcPro = "CALL servicioIns(0,".
			cdbPost('cNombre').",".
			edbPost('eNota').idbMel();
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
		</ul>
    </div>
	<h1>Crear un Servicio</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
	    <div style="width:280px;">
        	<div style="padding-top:6px;">
				<div style="padding-top:6px; padding-left:6px;">
    	   			Introduzca un nombre para el nuevo servicio.
				</div>
	   			<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
    	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
			            <input name="cNombre" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
				        	value="<?php cMostrar($laMel['cNombre']); ?>" maxlength="80">
					</div>
		        </div>
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; color:#777777; padding:6px;">
       		    <div style="padding:3px; border:1px solid #C6D4E0; ">
   	                <textarea name="eNota" style="width:260px; height:54px; font-family:Arial; font-size:13px; border:none; background:none;"><?php eMostrar($laMel["eNota"]);?></textarea>
				</div>
			</div>
			<div style="padding:6px;"><button type="submit">Crear servicio</button></div>
		</div>
	</form>
</body>
</html>
