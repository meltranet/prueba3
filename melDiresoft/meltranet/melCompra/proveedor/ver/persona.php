<?php include '../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL proveedorAct09(1,".
			idbPost('idProveedor').",".
			idbPost('iPersona').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('inicio.php');}
	} else {
		$lcPro = "CALL proveedorAct09(0,".
			idbPost('idProveedor').",".
			cdbPost('iPersona').",".
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Proveedores</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../ver" target="_self"><?php cMostrar($laMel['cNombre']); ?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Cambiar el Tipo de persona</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../ver" target="_self">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
    	<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
	    <div style="width:280px; padding-top:3px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione la nueva Condici&oacute;n de pago.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iPersona" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="0" <?php if($laMel['iPersona']==0) {cMostrar("selected");}?> >PNR</option>
		        		<option value="1" <?php if($laMel['iPersona']==15) {cMostrar("selected");}?> >PNNR</option>
		        		<option value="2" <?php if($laMel['iPersona']==30) {cMostrar("selected");}?> >PJD</option>
		        		<option value="3" <?php if($laMel['iPersona']==60) {cMostrar("selected");}?> >PJND</option>
		        		<option value="4" <?php if($laMel['iPersona']==90) {cMostrar("selected");}?> >PJNCD</option>
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
			<div style="padding:6px;"><button type="submit">Cambiar tipo</button></div>
		</div>
	</form>
</body>
</html>
