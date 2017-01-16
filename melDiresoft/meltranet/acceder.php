<?php include 'meltranet.php';

	$liValidar        = 0;
	$liMelAccesoError = 1;
	
	$lcUsuario = '';
	if (postExi('cUsuario')==true && postExi('cContrasena') == true) {
		$liValidar = 1;
		$lcUsuario = cPostVal('cUsuario');
		if ($lcUsuario==''){$lcMelAccesoError = 'Debe introducir su Nombre de usuario.';}
		else {
			$lcContrasena = cPostVal('cContrasena');
			$loDbMysql = dbDbMysqlIni($lcUsuario, $lcContrasena, 0, 0);
			switch ($loDbMysql->connect_errno) {
				case 0:
					$liMelAccesoError = 0;
					$lcMelAccesoError = 'Acceso permitido.';
					dbDbMysqlRem($loDbMysql);
					sesVarIni('cUsuario', $lcUsuario);
					sesVarIni('cContrasena', $lcContrasena);
					$lcPro = "CALL melAccesoIns();";
					$laMelAcceso = dbResFilIni($lcPro, 0);
					sesVarIni('idMelAcceso', $laMelAcceso['idMelAcceso']);
					break;
				case 2003:
					$lcMelAccesoError = 'En este momento el Equipo servidor no esta disponible.';
					break;
				case 1044:
					$lcMelAccesoError = 'En este momento el Manejador de base de datos no esta disponible.';
					break;
				case 1045:
//					$lcMelAccesoError = 'Asegúrese de que su Nombre de usuario sea correcto, luego repita su Contraseña. Las letras se deben escribir usando mayúsculas y minúsculas correctamente.';
					$lcMelAccesoError = 'El Nombre de usuario o Contraseña no es correcto.';
					break;
				case 1049:
					$lcMelAccesoError = 'En este momento la Base de datos no esta disponible.';
					break;
				default:
					$lcMelAccesoError = 'En este momento Meltranet no esta disponible.';
			}
		}
	}
	sesVarIni('iMelAccesoError', $liMelAccesoError);
	sesVarIni('cMelAccesoError', $lcMelAccesoError);
	cargarPag('../meltranet/');
?>
