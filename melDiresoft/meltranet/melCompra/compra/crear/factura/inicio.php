<?php include '../../../../meltranet.php';

	if (postExi('cDescripcion')==true) {
		$lcPro = "CALL compraIns1(1,".
			cdbPost('cDescripcion').",".
			idbPost('idMelClasificacion').",".
			cdbPost('cFacturaSerie').",".
			cdbPost('cFacturaNumero').",".
			cdbPost('cFacturaFecha').",".
			cdbPost('cFacturaControl').",".
			idbPost('idDepartamento').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../impuesto/inicio.php');}
	} else {
		$lcPro = "CALL compraIns1(0,".
			cdbPost('cDescripcion').",".
			idbPost('idMelClasificacion').",".
			cdbPost('cFacturaSerie').",".
			cdbPost('cFacturaNumero').",".
			cdbPost('cFacturaFecha').",".
			cdbPost('cFacturaControl').",".
			idbPost('idDepartamento').idbMel();
		$laMel = dbResFilIni($lcPro);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../../../tmp/calendar/calendar-blue.css" title="win2k-cold-1" /> 
	<script type="text/javascript" src="../../../../tmp/calendar/calendar.js"></script> 
	<script type="text/javascript" src="../../../../tmp/calendar/lang/calendar-es.js"></script> 
	<script type="text/javascript" src="../../../../tmp/calendar/calendar-setup.js"></script> 
    <link href="../../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Compra</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Compras</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear una compra</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cProveedorNombre'],40);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
<div style="height:457px; overflow:auto;">
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
	<form method="post">
	    <div style="width:280px; padding-top:3px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca una descripci&oacute;n para la compra.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cDescripcion" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cDescripcion']); ?>" maxlength="80">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione una clasificaci&oacute;n.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="idMelClasificacion" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;"><?php
						$lcPro = "CALL melClasificacionRec1(0,2".idbMel();
						$loSel = dbResIni($lcPro);
						while ($laSel = dbResFilCar($loSel)) {?>
							<option value="<?php iMostrar($laSel["idMelClasificacion"]);?>" <?php if($laMel['idMelClasificacion']==$laSel["idMelClasificacion"]) {cMostrar("selected");}?> ><?php cMostrar($laSel["cNombre"]);?></option><?php
						}?>
					</select>
		        </div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca de la factura.
				</div>
				<div style="padding-top:3px; padding-left:6px;">
					<div style="float:left; color:#777777;">Serie</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input name="cFacturaSerie" style="width:160px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
							value="<?php cMostrar($laMel['cFacturaSerie']); ?>" maxlength="6" >
					</div>
					<div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
				<div style="padding-top:6px; padding-left:6px;">
					<div style="float:left; color:#777777;">Numero</div>
					<div style="padding:3px; float:right; border:1px solid #C6D4E0;">
						<input name="cFacturaNumero" style="width:160px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none; "
							value="<?php cMostrar($laMel['cFacturaNumero']); ?>" maxlength="20">
					</div>
					<div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
                	Introduzca la fecha de emisi&oacute;n.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
                	<div style="margin:0px; padding:3px; float:left;">
			            <input id="txtFacturaFecha" name="cFacturaFecha" style="width:200px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
				        	value="<?php cMostrar($laMel['cFacturaFecha']); ?>" maxlength="10">
					</div>
                	<div style="margin:0px; padding:2px; float:right;"> 
						<img id="imgFacturaFecha" src="../../../../png/fecha.png" style="margin:0px; padding:0px;" align="top" border="0">
					</div>
        	        <div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca el n&uacute;mero de control.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cFacturaControl" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cFacturaControl']); ?>" maxlength="20">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione un departamento.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="idDepartamento" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;"><?php
						$lcPro = "CALL departamentoRec1(0".idbMel();
						$loSel = dbResIni($lcPro);
						while ($laSel = dbResFilCar($loSel)) {?>
							<option value="<?php iMostrar($laSel["idDepartamento"]);?>" <?php if($laMel['idDepartamento']==$laSel["idDepartamento"]) {cMostrar("selected");}?> ><?php cMostrar($laSel["cNombre"]);?></option><?php
						}?>
					</select>
		        </div>
			</div>
			<div style="padding:6px;"><button type="submit">Continuar</button></div>
		</div>
	</form>
</div>
</body>
</html>
<script type="text/javascript">
	Calendar.setup({inputField:"txtFacturaFecha", ifFormat:"%d/%m/%Y", button:"imgFacturaFecha"});
</script>
