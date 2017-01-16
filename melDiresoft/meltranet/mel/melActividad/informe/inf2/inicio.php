<?php 
	include '../../../../meltranet.php';

	$lcPro = "CALL melActividadInfRec2(0,0,'',''".idbMel();
	$loSel = dbResIni($lcPro);

	$lcPro = "CALL melActividadInfRec2(1,0,'',''".idbMel();
	$laMel = dbResFilIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
	<script type="text/javascript" src="../../../../tmp/calendar/calendar.js"></script> 
	<script type="text/javascript" src="../../../../tmp/calendar/lang/calendar-es.js"></script> 
	<script type="text/javascript" src="../../../../tmp/calendar/calendar-setup.js"></script> 
	<link href="../../../../tmp/calendar/calendar-blue.css" rel="stylesheet" type="text/css" media="all" title="win2k-cold-1" /> 
    <link href="../../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Actividades</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent">Informes de Actividades</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Informe de Actividades por T&eacute;cnico</h1>
	<form method="post" action="melActividadRpt2.php" target="_blank">
	    <div style="width:280px; padding-top:6px;">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
					Seleccione el t&eacute;cnico.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="idMelCuenta" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;"><?php
						while ($laSel = dbResFilCar($loSel)) {?>
			        		<option value="<?php iMostrar($laSel['idMelCuenta']); ?>" ><?php cMostrar($laSel['cMelCuentaNombre']); ?></option><?php 
						}?>
					</select>
		        </div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div>
                	Introduzca el periodo para crear el informe.
				</div>
				<div>
					<div style="padding-top:6px; padding-bottom:3px; color:#777777;">
						Del
					</div>
					<div style="padding:3px; border:1px solid #C6D4E0;">
						<div style="margin:0px; padding:3px; float:left;">
							<input id="txtDesde" name="cDesde" style="width:200px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
								value="<?php cMostrar($laMel['cDesde']); ?>" maxlength="10">
						</div>
						<div style="margin:0px; padding:2px; float:right;"> 
							<img id="imgDesde" src="../../../../png/fecha.png" style="margin:0px; padding:0px;" align="top" border="0">
						</div>
						<div style="margin:0px; padding:0px; clear:both;"></div>
					</div>
				</div>
				<div>
					<div style="padding-top:6px; padding-bottom:3px; color:#777777;">
						Al
					</div>
					<div style="padding:3px; border:1px solid #C6D4E0;">
						<div style="margin:0px; padding:3px; float:left;">
							<input id="txtHasta" name="cHasta" style="width:200px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
								value="<?php cMostrar($laMel['cHasta']); ?>" maxlength="10">
						</div>
						<div style="margin:0px; padding:2px; float:right;"> 
							<img id="imgHasta" src="../../../../png/fecha.png" style="margin:0px; padding:0px;" align="top" border="0">
						</div>
						<div style="margin:0px; padding:0px; clear:both;"></div>
					</div>
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
					Imprimir informe en.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iImprimir" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="0" >Impresora</option>
		        		<option value="1" >Pantalla</option>
					</select>
		        </div>
			</div>
			<div style="padding:6px;"><button type="submit">Imprimir informe</button></div>
		</div>
	</form>
</body>
</html>
<script type="text/javascript">
	Calendar.setup({inputField:"txtDesde", ifFormat:"%d/%m/%Y", button:"imgDesde"});
	Calendar.setup({inputField:"txtHasta", ifFormat:"%d/%m/%Y", button:"imgHasta"});
</script>
