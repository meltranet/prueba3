<?php include '../../../meltranet.php';

	$lcPro = "CALL proveedorRec(3,0,0,'','',".
		idbPost('idProveedor').idbMel();
	$laMel = dbResFilIni($lcPro);
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
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cNombre']);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="eliminar" target="_self">eliminar el proveedor</a></li>
		</ul>
    </div>
<div style="height:457px; overflow:auto;">
   	<div style="padding-top:6px; width:480px;">
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="identidad.php">
		        <div style="float:left; color:#777777;">Identidad</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cIdentidad']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="direccion.php">
	    	   	<div style="float:left; color:#777777; ">Direcci&oacute;n</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
   			    <div style="padding:3px; float:right; border:1px solid #C6D4E0;">
        	       	<textarea disabled style="width:260px; height:54px; font-family:Arial; font-size:13px; border:none; background:none; "><?php vMostrar($laMel["vDireccion"]);?></textarea>
   	        	</div>
			    <div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="ciudad.php">
		        <div style="float:left; color:#777777;">Ciudad</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCiudad']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="telefono.php">
		        <div style="float:left; color:#777777;">Tel&eacute;fono</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cTelefono']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="fax.php">
		        <div style="float:left; color:#777777;">Fax</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cFax']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="movil.php">
		        <div style="float:left; color:#777777;">Mov&iacute;l</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cMovil']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="correo.php">
		        <div style="float:left; color:#777777;">Correo e.</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCorreo']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="nacionalidad.php">
		        <div style="float:left; color:#777777;">Nacionalidad</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cNacionalidad']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="persona.php">
		        <div style="float:left; color:#777777;">Tipo de persona</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cPersona']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="noimpuesto.php">
		        <div style="float:left; color:#777777;">
					<div style="float:left;">
						<input disabled type="checkbox" <?php chkMostrar($laMel["iNoimpuesto"]);?>>
					</div>
					<div style="padding-top:2px; float:left; color:#777777;">
						Proveedor no sujeto a impuesto
					</div>
					<div style="clear:both;"></div>
		        </div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
    	<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<form method="post" action="categoria.php">
		        <div style="float:left; color:#777777;">Categor&iacute;a</div>
				<div style="float:right;">
					<input name="idProveedor" value="<?php cMostrar($laMel['idProveedor']); ?>" type="hidden">
					<button type="submit">cambiar</button>
				</div>
				<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
					<input disabled style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
   				        value="<?php cMostrar($laMel['cCategoria']); ?>" >
				</div>
				<div style="margin:0px; padding:0px; clear:both;"></div>
			</form>
		</div>
   		<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
			<div style="padding:3px; border:1px solid #C6D4E0; ">
				<textarea disabled style="width:460px; height:54px; font-family:Arial; font-size:13px; border:none; background:none; "><?php eMostrar($laMel["eNota"]);?></textarea>
			</div>
		</div>
	</div>
</div>
</body>
</html>
