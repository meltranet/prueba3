<?php include '../../../../meltranet.php';

	if (postExi('cDescripcion')==true) {
		$lcPro = "CALL retencionvenIns1(1,".
			cdbPost('cDescripcion').",".
			cdbPost('cComprobanteNumero').",".
			cdbPost('cComprobanteFecha').",".
			idbPost('iBase').",".
			cdbPost('cAlicuota').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('../factura/inicio.php');}
	} else {
		$lcPro = "CALL retencionvenIns1(0,".
			cdbPost('cDescripcion').",".
			cdbPost('cComprobanteNumero').",".
			cdbPost('cComprobanteFecha').",".
			idbPost('iBase').",".
			cdbPost('cAlicuota').idbMel();
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
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Cuentas por cobrar</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Retenciones en ventas</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Crear una retenci&oacute;n</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cClienteNombre'], 40);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
    <div style="padding-top:6px; width:280px;">
		<form method="post">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca una descripci&oacute;n de la retenci&oacute;n.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cDescripcion" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cDescripcion']); ?>" maxlength="40">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca el numero de comprobante.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cComprobanteNumero" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cComprobanteNumero']); ?>" maxlength="20">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
                	Introduzca la fecha del comprobante.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
                	<div style="margin:0px; padding:3px; float:left;">
			            <input id="txtComprobanteFecha" name="cComprobanteFecha" style="width:200px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
				        	value="<?php cMostrar($laMel['cComprobanteFecha']); ?>" maxlength="10">
					</div>
                	<div style="margin:0px; padding:2px; float:right;"> 
						<img id="imgComprobanteFecha" src="../../../../png/fecha.png" style="margin:0px; padding:0px;" align="top" border="0">
					</div>
        	        <div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione la base para el calculo.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iBase" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="-1" <?php if($laMel['iBase']==-1) {cMostrar("selected");}?> >...</option>
		        		<option value="0" <?php if($laMel['iBase']==0) {cMostrar("selected");}?> >Monto de venta</option>
		        		<option value="1" <?php if($laMel['iBase']==1) {cMostrar("selected");}?> >Monto de impuesto (I.V.A.)</option>
					</select>
		        </div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca la al&iacute;cuota de establecida.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cAlicuota" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cAlicuota']); ?>" maxlength="6">
				</div>
			</div>

			<div style="padding:6px;"><button type="submit">Continuar</button></div>
		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	Calendar.setup({inputField:"txtComprobanteFecha", ifFormat:"%d/%m/%Y", button:"imgComprobanteFecha"});
</script>
