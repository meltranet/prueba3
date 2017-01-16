<?php 
	include '../../../meltranet.php';

	if (postExi('cDescripcion')==true) {
		$lcPro = "CALL melActividadIns1(1,".
			cdbPost('cDescripcion').",".
			cdbPost('cRealizadaFecha').",".
			cdbPost('cRealizadaHora').",".
			idbPost('iTipo').",".
			idbPost('iDuracion').",".
			idbPost('iMelIncidenteEstado').",".
			cdbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../ver/inicio.php');}
	} else {
		$lcPro = "CALL melActividadIns1(0,".
			cdbPost('cDescripcion').",".
			cdbPost('cRealizadaFecha').",".
			cdbPost('cRealizadaHora').",".
			idbPost('iTipo').",".
			idbPost('iDuracion').",".
			idbPost('iMelIncidenteEstado').",".
			cdbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
	<link rel="stylesheet" type="text/css" media="all" href="../../../tmp/calendar/calendar-blue.css" title="win2k-cold-1" /> 
	<script type="text/javascript" src="../../../tmp/calendar/calendar.js"></script> 
	<script type="text/javascript" src="../../../tmp/calendar/lang/calendar-es.js"></script> 
	<script type="text/javascript" src="../../../tmp/calendar/calendar-setup.js"></script> 
    <link href="../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Actividades</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../crear" target="ifmModulo">Crear una Actividad</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1><?php cMostrar($laMel['cMelIncidenteDescripcion'],40);?></h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="ifmMeltranet">cancelar</a></li>
		</ul>
    </div>
<div style="padding-top:6px; height:447px; overflow:auto;">
	<?php if ($laMel["iError"] == 1){mensaje($laMel["iMensaje"], $laMel["cMensaje"], $laMel["vMensaje"]);}?>
   	<div style="padding-top:6px; width:280px;">
		<form method="post">
<input type="hidden" name="eNota" value="">
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca una descripci&oacute;n para la actividad.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cDescripcion" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cDescripcion']); ?>" maxlength="80">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
                	Introduzca la fecha en que se realizo.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
                	<div style="margin:0px; padding:3px; float:left;">
			            <input id="txtRealizadaFecha" name="cRealizadaFecha" style="width:200px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
				        	value="<?php cMostrar($laMel['cRealizadaFecha']); ?>" maxlength="10">
					</div>
                	<div style="margin:0px; padding:2px; float:right;"> 
						<img id="imgRealizadaFecha" src="../../../png/fecha.png" style="margin:0px; padding:0px;" align="top" border="0">
					</div>
        	        <div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
    	   			Introduzca la hora de la actividad.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cRealizadaHora" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cRealizadaHora']); ?>" maxlength="10">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione el tipo de actividad.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iTipo" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="-1" <?php if($laMel['iTipo']==-1) {cMostrar("selected");}?> >...</option>
		        		<option value="0" <?php if($laMel['iTipo']==0) {cMostrar("selected");}?> >Desarrollo</option>
		        		<option value="1" <?php if($laMel['iTipo']==1) {cMostrar("selected");}?> >Remota</option>
		        		<option value="2" <?php if($laMel['iTipo']==2) {cMostrar("selected");}?> >Teléfonica</option>
		        		<option value="3" <?php if($laMel['iTipo']==3) {cMostrar("selected");}?> >Visita</option>
					</select>
		        </div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione la duraci&oacute;n de la actividad.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iDuracion" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="0" <?php if($laMel['iDuracion']==0) {cMostrar("selected");}?> >...</option>
		        		<option value="15" <?php if($laMel['iDuracion']==15) {cMostrar("selected");}?> >15 Min</option>
		        		<option value="30" <?php if($laMel['iDuracion']==30) {cMostrar("selected");}?> >30 Min</option>
		        		<option value="60" <?php if($laMel['iDuracion']==60) {cMostrar("selected");}?> >1 Hora</option>
		        		<option value="120" <?php if($laMel['iDuracion']==120) {cMostrar("selected");}?> >2 Horas</option>
		        		<option value="180" <?php if($laMel['iDuracion']==180) {cMostrar("selected");}?> >3 Horas</option>
		        		<option value="240" <?php if($laMel['iDuracion']==240) {cMostrar("selected");}?> >4 Horas</option>
					</select>
		        </div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style=" padding-bottom:3px;">
    	   			Seleccione como quedo el incidente.
				</div>
   	   		    <div style="padding:3px; border:1px solid #C6D4E0;">
					<select name="iMelIncidenteEstado" style="width:260px; background-color:#FFFFFF; font-family:Arial; font-size:13px; margin:0px; padding:3px; border:none;">
		        		<option value="1" <?php if($laMel['iMelIncidenteEstado']==1) {cMostrar("selected");}?> >Activo</option>
		        		<option value="2" <?php if($laMel['iMelIncidenteEstado']==2) {cMostrar("selected");}?> >Cerrado</option>
		        		<option value="3" <?php if($laMel['iMelIncidenteEstado']==3) {cMostrar("selected");}?> >Suspendido</option>
					</select>
		        </div>
			</div>
			<div style="padding:6px;"><button type="submit">Crear actividad</button></div>
		</form>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	Calendar.setup({inputField:"txtRealizadaFecha", ifFormat:"%d/%m/%Y", button:"imgRealizadaFecha"});
</script>
