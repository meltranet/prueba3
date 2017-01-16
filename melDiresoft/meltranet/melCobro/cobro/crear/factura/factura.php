<?php include '../../../../meltranet.php';

	if (postExi('iAct')==true) {
		$lcPro = "CALL cobroFacturaAct(".
			idbPost('iAct').",".
			idbPost('idFactura').",".
			cdbPost('cMonto').idbMel();
		$laMel = dbResFilIni($lcPro);
			
		if ($laMel["iError"] == 0) {cargarPag('inicio.php');}
	} else {
		$lcPro = "CALL cobroFacturaAct(0,".
			idbPost('idFactura').",".
			cdbPost('cMonto').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Cuentas por cobrar</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cobros</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear un cobro</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../cliente/" target="_parent"><?php cMostrar($laMel['cClienteNombre'], 40);?></a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../factura/" target="_parent"><?php cMostrar($laMel['cCuentaNombre']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cFacturaNumero']);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
    <div style="padding-top:6px; width:280px;">
		<form method="post">
   	       	<input name="iAct" value="1" type="hidden">
    		<input name="idFactura" value="<?php cMostrar($laMel['idFactura']); ?>" type="hidden">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca el monto a cobrar.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cMonto" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cMonto']); ?>" maxlength="13">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<button type="submit">Actualizar factura</button>
			</div>
		</form>
		<form method="post">
   	       	<input name="iAct" value="2" type="hidden">
    		<input name="idFactura" value="<?php cMostrar($laMel['idFactura']); ?>" type="hidden">
			<div style="padding:6px;"><button type="submit">Quitar factura</button></div>
		</form>
	</div>
</body>
</html>
