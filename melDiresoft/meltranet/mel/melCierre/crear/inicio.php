<?php 
	include '../../../meltranet.php';

	if (postExi('cConcepto')==true) {
		$lcPro = "CALL melCierreIns(1,".
			cdbPost('cConcepto').",".
			cdbPost('cCierre').",".
			cdbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
		if ($laMel["iError"] == 0) {cargarPag('../ver/inicio.php');}
	} else {
		$lcPro = "CALL melCierreIns(0,".
			cdbPost('cConcepto').",".
			cdbPost('cCierre').",".
			cdbPost('eNota').idbMel();
		$laMel = dbResFilIni($lcPro);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
	<link href="../../../tmp/calendar/calendar-blue.css" rel="stylesheet" type="text/css" media="all"  title="win2k-cold-1" /> 
    <link href="../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../melSocio.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../../../tmp/calendar/calendar.js"></script> 
	<script type="text/javascript" src="../../../tmp/calendar/lang/calendar-es.js"></script> 
	<script type="text/javascript" src="../../../tmp/calendar/calendar-setup.js"></script> 
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../" target="ifmMeltranet">Cierres</a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Crear un Cierre</h1>
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
    	   			Introduzca un concepto para el cierre.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
		            <input name="cConcepto" style="width:260px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
			        	value="<?php cMostrar($laMel['cConcepto']); ?>" maxlength="80">
				</div>
			</div>
			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
				<div style="padding-bottom:3px;">
                	Introduzca la fecha de cierre.
				</div>
			    <div style="padding:3px; border:1px solid #C6D4E0;">
                	<div style="margin:0px; padding:3px; float:left;">
			            <input id="txtCierre" name="cCierre" style="width:200px; font-family:Arial; font-size:13px; margin:0px; padding:0px; border:none; background:none;"
				        	value="<?php cMostrar($laMel['cCierre']); ?>" maxlength="10">
					</div>
                	<div style="margin:0px; padding:2px; float:right;"> 
						<img id="imgCierre" src="../../../png/fecha.png" style="margin:0px; padding:0px;" align="top" border="0">
					</div>
        	        <div style="margin:0px; padding:0px; clear:both;"></div>
				</div>
			</div>
   			<div style="border-bottom:1px solid #C6D4E0; padding:6px;">
       		    <div style="padding:3px; border:1px solid #C6D4E0; ">
   	                <textarea name="eNota" style="width:260px; height:51px; font-family:Arial; font-size:13px; border:none; background:none;"><?php eMostrar($laMel["eNota"]);?></textarea>
				</div>
			</div>
			<div style="padding:6px;"><button type="submit">Crear incidente</button></div>
		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	Calendar.setup({inputField:"txtCierre", ifFormat:"%d/%m/%Y", button:"imgCierre"});
</script>
