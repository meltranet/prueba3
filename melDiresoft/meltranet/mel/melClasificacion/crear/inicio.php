<?php 
	include '../../../meltranet.php';

	if (postExi('cNombre')==true) {
		$lcPro = "CALL melClasificacionIns(1,".
			cdbPost('cNombre').",".
			idbPost('iProceso').",".
			edbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../ver/inicio.php');}
	} else {
		$lcPro = "CALL melClasificacionIns(0,".
			cdbPost('cNombre').",".
			idbPost('iProceso').",".
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
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Clasificaciones</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Crear una Clasificaci&oacute;n</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
   	<div style="padding-top:6px; width:280px;">
		<form method="post">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca un nombre para la nueva clasificaci&oacute;n.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cNombre" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cNombre']); ?>" maxlength="40">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione en donde utilizada.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iProceso" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="-1" <?php if($laMel['iProceso']==-1) {cMostrar("selected");}?> >...</option>
		        		<option value="2" <?php if($laMel['iProceso']==2) {cMostrar("selected");}?> >Compras</option>
					</select>
		        </div>
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
       		    <div style="padding:3px; border:1px solid #C6D4E0; ">
   	                <textarea name="eNota" style="width:260px; height:51px; font-family:Arial; font-size:13px; border:none; background:none;"><?php eMostrar($laMel["eNota"]);?></textarea>
				</div>
			</div>
			<div style="padding:6px;"><button type="submit">Crear clasificaci&oacute;n</button></div>
		</form>
	</div>
</div>
</body>
</html>
