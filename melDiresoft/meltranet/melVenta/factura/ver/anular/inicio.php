<?php include '../../../../meltranet.php';

	$lcPro = "CALL facturaAct1(0,".
		idbPost('idFactura').",".
		cdbPost('cMotivo').idbMel();
	$laMel = dbResFilIni($lcPro);
		
	if ($laMel["iError"] == 0) {cargarPag('anular.php');}
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
            <li class="menuN"><a class="menuN" href="../" target="_parent"><?php cMostrar($laMel['cNumero']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Anular la Factura</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="_parent">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
</body>
</html>
