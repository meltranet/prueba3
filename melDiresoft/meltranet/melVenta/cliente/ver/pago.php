<?php include '../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL clienteAct5(1,".
			idbPost('idCliente').",".
			idbPost('iPago').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('inicio.php');}
	} else {
		$lcPro = "CALL clienteAct5(0,".
			idbPost('idCliente').",".
			idbPost('iPago').",".
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
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Clientes</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../ver" target="_self"><?php cMostrar($laMel['cNombre']); ?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Cambiar la Condici&oacute;n de pago</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../ver" target="_self">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
    	<input name="idCliente" value="<?php cMostrar($laMel['idCliente']); ?>" type="hidden">
	    <div style="width:280px; padding-top:3px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione la nueva Condici&oacute;n de pago.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iPago" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="0" <?php if($laMel['iPago']==0) {cMostrar("selected");}?> >Contado</option>
		        		<option value="15" <?php if($laMel['iPago']==15) {cMostrar("selected");}?> >Cr&eacute;dito a 15 d&iacute;as</option>
		        		<option value="30" <?php if($laMel['iPago']==30) {cMostrar("selected");}?> >Cr&eacute;dito a 30 d&iacute;as</option>
		        		<option value="60" <?php if($laMel['iPago']==60) {cMostrar("selected");}?> >Cr&eacute;dito a 60 d&iacute;as</option>
		        		<option value="90" <?php if($laMel['iPago']==90) {cMostrar("selected");}?> >Cr&eacute;dito a 90 d&iacute;as</option>
		        		<option value="120" <?php if($laMel['iPago']==120) {cMostrar("selected");}?> >Cr&eacute;dito a 120 d&iacute;as</option>
					</select>
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
			<div style="padding:6px;"><button type="submit">Cambiar condici&oacute;n</button></div>
		</div>
	</form>
</body>
</html>
