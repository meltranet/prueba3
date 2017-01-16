<?php include '../../../meltranet.php';

	if (postExi('cMotivo')==true) {
		$lcPro = "CALL promotorAct1(1,".
			idbPost('idPromotor').",".
			ndbPost('nComision').",".
			cdbPost('cMotivo').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('inicio.php');}
	} else {
		$lcPro = "CALL promotorAct1(0,".
			idbPost('idPromotor').",".
			ndbPost('nComision').",".
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
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Promotores</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../ver" target="_self"><?php cMostrar($laMel['cNombre']); ?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Cambiar la Comisi&oacute;n mercadeo</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../ver" target="_self">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
    	<input name="idPromotor" value="<?php cMostrar($laMel['idPromotor']); ?>" type="hidden">
	    <div style="width:280px; padding-top:3px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione la nueva Comisi&oacute;n mercadeo.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="nComision" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="0" <?php if($laMel['nComision']==0) {cMostrar("selected");}?> >Sin comisi&oacute;n</option>
		        		<option value="10" <?php if($laMel['nComision']==10) {cMostrar("selected");}?> >10%</option>
		        		<option value="20" <?php if($laMel['nComision']==20) {cMostrar("selected");}?> >20%</option>
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
			<div style="padding:6px;"><button type="submit">Cambiar comisi&oacute;n</button></div>
		</div>
	</form>
</body>
</html>
