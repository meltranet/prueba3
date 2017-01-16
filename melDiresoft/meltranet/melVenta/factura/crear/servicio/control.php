<?php include '../../../../meltranet.php';

	if (postExi('eNota')==true) {
		$lcPro = "CALL facturaIns2(1,".
			cdbPost('cControl').",".
			edbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../../ver/inicio.php');}
	} else {
		$lcPro = "CALL facturaIns2(0,".
			cdbPost('cControl').",".
			edbPost('eNota').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Facturas</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear una factura</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../servicio" target="_parent"><?php cMostrar($laMel['cClienteNombre'],40);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>N&uacute;mero de control</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
	    <div style="width:280px; padding-top:3px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca un n&uacute;mero de control para la nueva factura.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cControl" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cControl']); ?>" maxlength="10">
				</div>
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
       		    <div style="padding:3px; border:1px solid #C6D4E0; ">
   	                <textarea name="eNota" style="width:260px; height:54px; font-family:Arial; font-size:13px; border:none; background:none;"><?php eMostrar($laMel["eNota"]);?></textarea>
				</div>
			</div>
			<div style="padding:6px;"><button type="submit">Crear factura</button></div>
		</div>
	</form>
</body>
</html>
