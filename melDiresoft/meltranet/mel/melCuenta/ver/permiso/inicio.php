<?php include '../../../../meltranet.php';

	if (postExi('idMelCuenta')==true) {
		$lcPro = "CALL melCuentaPermisoIns0(2,".
			idbPost('idMelCuenta').",".
			idbPost('idMelPermiso').idbMel();
		$laMel = dbResFilIni($lcPro);
		
		if ($laMel["iError"] == 0) {cargarPag('../inicio.php');}
	} else {
		if (postExi('idMelPermiso')==true) {
			$lcPro = "CALL melCuentaPermisoIns0(1,".
				idbPost('idMelCuenta').",".
				idbPost('idMelPermiso').idbMel();
			$laMel = dbResFilIni($lcPro);
		} else {
			$lcPro = "CALL melCuentaPermisoIns0(0,".
				idbPost('idMelCuenta').",".
				idbPost('idMelPermiso').idbMel();
			$laMel = dbResFilIni($lcPro);
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../../melSocio.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="menuN">
		<ul class="menuN">
			<li class="menuN"><a class="menuN" href="../../../../../" target="_top">Diresoft</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../../" target="_top">Meltranet</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../../" target="ifmMeltranet">Sistema</a><span class="separadorN">/</span></li>
			<li class="menuN"><a class="menuN" href="../../" target="ifmMeltranet">Cuentas de usuario</a><span class="separadorN">/</span></li>
            <li class="menuN"><a class="menuN" href="../" target="_parent"><?php cMostrar($laMel['cNombre']);?></a><span class="separadorN">/</span></li>
		</ul>
    </div>
	<h1>Establecer los permisos</h1>
    <div class="menuH">
		<ul class="menuH">
			<li class="menuH"><a class="menuH" href="../" target="_parent">cancelar</a></li>
		</ul>
    </div>
	<div style="margin-top:6px; border-bottom:1px solid #C6D4E0;">
    	<div style="background-color:#DBE7F0; color:#515F6C; border-bottom:1px solid #C6D4E0;" class="listaFilaTitulo">
			<div style="width:20px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:600px;" class="listaCeldaTitulo1">Permisos de acceso</div>
			<div class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$lcRegCla = '';
		$lcPro = "CALL melCuentaPermisoRec(1,".
			idbPost('idMelCuenta').idbMel();
		$loDet = dbResIni($lcPro);?>
        <div <?php if($loDet->num_rows>14){cMostrar('style="height:378px; overflow:auto;"');}?> ><?php
			while ($laDet = dbResFilCar($loDet)) {
				$lcRegCla = ifInmediato(($lcRegCla == 'listaFilaNormal0'), 'listaFilaNormal1', 'listaFilaNormal0');?>
                <form method="post">
    	    		<input type="hidden" name="idMelPermiso" value="<?php iMostrar($laDet["idMelPermiso"]);?>">
				   	<div class="<?php cMostrar($lcRegCla);?>">
						<div style="width:20px;" class="listaCeldaNormal0">&nbsp;</div>
						<div style="width:600px;" class="listaCeldaNormal1"><?php cMostrar($laDet["cNombre"]);?></div>
						<div class="listaCeldaNormal2">
							<button style="background:none; border:none;">
								<img src="../../../../jpg/<?php if($laDet["idMelCuenta"]==0){cMostrar('casilla1.jpg');} else {cMostrar('casilla0.jpg');} ?>" align="top" border="0" >
							</button>
    	   	            </div>
					<div class="listaCeldaCorte"></div>
					</div>
				</form><?php
			}?>
		</div><?php
		dbResRem($loDet);?>
	</div>
	<div style="margin-top:6px;">
        <form method="post">
    		<input name="idMelCuenta" value="<?php cMostrar($laMel['idMelCuenta']); ?>" type="hidden">
            <div style="padding:6px;"><button type="submit">Establecer permisos</button></div>
		</form>
	</div>
</body>
</html>
