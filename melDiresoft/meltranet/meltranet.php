<?php session_start();
	function rptEncabezado() {
		$lcArc = cUrlWeb()."jpg/rptMeltranet.jpg"; ?>
		<div style="padding-top:24px; padding-right:24px; padding-bottom:0px; padding-left:24px;">
    		<div style="float:left; width:182px;"><img border="0" src="<?php cMostrar($lcArc);?>" align="middle"></div>
			<div style="margin: 0px; padding: 0px; width: 0px; height: 0px; clear: both;"></div>
        </div><?php
	}
	function iDia($td) {return intval(substr($td, 8, 2));}
	function iMes($td) {return intval(substr($td, 5, 2));}
	function iAno($td) {return intval(substr($td, 0, 4));}
	function lisIni($tcLis) {
		$lcLis = 'aLis_'.$tcLis;
		$laLis = array('iRec' => 1, 
			iRegPri => 0,
			iExpSen => 0,
			cExpSen => '',
			cExpBus => '');
		if (postExi('iRec')==true) {
			$laLis['iRec'] = iPostVal('iRec');
			if (postExi('cExpSen')==true) {
				$laLis['cExpSen'] = cPostVal('cExpSen');
			}
			if (postExi('cExpBus')==true) {
				$laLis['cExpBus'] = cPostVal('cExpBus');
			}
		} else {
			if (sesVarExi($lcLis)) {$laLis = sesVarVal($lcLis);}
			if (postExi('iRegPri')==true) {
				$laLis['iRegPri'] = iPostVal('iRegPri');
			}
			if (postExi('iExpSen')==true) {
				$laLis['iExpSen'] = iPostVal('iExpSen');
			}
		}
		sesVarIni($lcLis, $laLis);
		return $laLis;
	}
	function lisRem($tcLis, $tlRemover=false) {
		$lcLis = 'aLis_'.$tcLis;
		sesVarRem($lcLis);
	}
	function cLargo($tc) {return  strlen($tc);}
	function sltHora($tiClase, $tcName, $tcClass, $tcValSel) {
		$laHora = array(
			'12:00',
			'12:30',
			'01:00', 
			'01:30', 
			'02:00', 
			'02:30', 
			'03:00', 
			'03:30', 
			'04:00', 
			'04:30', 
			'05:00', 
			'05:30', 
			'06:00', 
			'06:30', 
			'07:00', 
			'07:30', 
			'08:00', 
			'08:30', 
			'09:00', 
			'09:30', 
			'10:00', 
			'10:30', 
			'11:00', 
			'11:30');?>
		<select name="<?php echo $tcName;?>" class="<?php echo $tcClass;?>" style="width:88px;">
			<option value="" <?php if ($tcValSel=='') {echo 'selected';}?>>...</option><?php
        	foreach ($laHora as $lcHora) {
				$lcHora = $lcHora.' a.m.';?>
            	<option value="<?php echo $lcHora;?>" <?php if ($lcHora==$tcValSel) {echo 'selected';}?>><?php echo $lcHora;?></option><?php
			}
        	foreach ($laHora as $lcHora) {
				$lcHora = $lcHora.' p.m.';?>
            	<option value="<?php echo $lcHora;?>" <?php if ($lcHora==$tcValSel) {echo 'selected';}?>><?php echo $lcHora;?></option><?php
			}?>
		</select><?php
	}
	function sltAno($tcName, $tcClass, $tiValSel, $tiMin, $tiMax, $tiOrden) {
		if ($tiMin == '' || $tiMax == '') {$tiMin = date("Y"); $tiMax = date("Y");}?>
		<select name="<?php echo $tcName;?>" class="<?php echo $tcClass;?>" style="width:58px;">
			<option value="0" <?php if ($tiValSel==0) {echo 'selected';}?>>...</option><?php
			if ($tiOrden==1) {
	        	for ($liAno = $tiMax; $liAno >= $tiMin; $liAno--) {?>
    	        	<option value="<?php echo $liAno;?>" <?php if ($liAno==$tiValSel) {echo 'selected';}?>><?php echo $liAno;?></option><?php
				}
			} else {
	        	for ($liAno = $tiMin; $liAno <= $tiMax; $liAno++) {?>
    	        	<option value="<?php echo $liAno;?>" <?php if ($liAno==$tiValSel) {echo 'selected';}?>><?php echo $liAno;?></option><?php
				}
            }?>
		</select><?php
	}
	function sltMes($tcName, $tcClass, $tiValSel) {
		$laMes = mesIni();?>
		<select name="<?php echo $tcName;?>" class="<?php echo $tcClass;?>" style="width:58px;">
			<option value="0" <?php if ($tiValSel==0) {echo 'selected';}?>>...</option><?php
			$liMes = 0;
        	foreach ($laMes as $lcMes) {
            	$liMes = $liMes + 1;?>
            	<option value="<?php echo $liMes;?>" <?php if ($liMes==$tiValSel) {echo 'selected';}?>><?php echo $lcMes;?></option><?php
			}?>
		</select><?php
	}
	function sltDia($tcName, $tcClass, $tiValSel) {
		$laDia = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');?>
		<select name="<?php echo $tcName;?>" class="<?php echo $tcClass;?>" style="width:48px;">
			<option value="0" <?php if ($tiValSel==0) {echo 'selected';}?>>...</option><?php
        	foreach ($laDia as $lcDia) {
				$liDia = intval($lcDia);?>
            	<option value="<?php echo $liDia;?>" <?php if ($liDia==$tiValSel) {echo 'selected';}?>><?php echo $lcDia;?></option><?php
			}?>
		</select><?php
	}
	function mensaje($tiMensaje, $tcMensaje, $tvMensaje) {
		$lcDir = cDir('../../../meltranet/mel/png/');
		switch ($tiMensaje) {
			case 1:?>
	    		<div class="error10">
    	    		<div style="float:left; padding:12px;"><img src="<?php cMostrar($lcDir);?>mensage2.png"></div>
					<div class="error11">
						<?php cMostrar($tcMensaje);?>
						<div style="color:#000000; font-size:13px; font-weight:normal; padding-top:12px;">
							<?php vMostrar($tvMensaje);?>
						</div>
					</div>
				</div><?php 
		        break;
    		case 2:?>
	    		<div class="error20">
    	    		<div style="float:left; padding:12px;"><img src="<?php cMostrar($lcDir);?>mensage3.png"></div>
					<div class="error21">
						<?php cMostrar($tcMensaje);?>
						<div style="color:#000000; font-size:13px; font-weight:normal; padding-top:12px;">
							<?php vMostrar($tvMensaje);?>
						</div>
					</div>
				</div><?php 
		        break;
		    default:?>
	    		<div class="error00">
    	    		<div style="float:left; padding:12px;"><img src="<?php cMostrar($lcDir);?>mensage1.png"></div>
					<div class="error01">
						<?php cMostrar($tcMensaje);?>
						<div style="color:#000000; font-size:13px; font-weight:normal; padding-top:12px;">
							<?php vMostrar($tvMensaje);?>
						</div>
					</div>
				</div><?php 
		}
	}
	function cDir($tcDir) {
		$liDirIni = substr_count(sesVarVal('cDir'), '/'); 
		$liDirAct = substr_count($_SERVER['PHP_SELF'], '/'); 
		
		$liDirDif = $liDirIni-$liDirAct;
		
		$lcDir = '';
		for ($i = 1; $i <= $liDir; $i++) {$lcDir = $lcDir.'../';}

		return $lcDir.$tcDir;
	}
	function cargarPag($tcPag) {
		header('Location: '.$tcPag);
		exit;
	}
	function postExi($tcVar) {return isset($_POST[$tcVar]);}
	function getExi($tcVar) {return isset($_GET[$tcVar]);}
	function cGet($tcVar, $tcVal) {
		if(getExi($tcVar)==true) {return trim($_GET[$tcVar]);} 
		else {return $tcVal;}
	}
	function iGet($tcVar, $tiVal) {
		if(getExi($tcVar)==true) {return intval($_GET[$tcVar]);} 
		else {return $tiVal;}
	}
	function cPost($tcVar, $tcVal=NULL) {
		if(postExi($tcVar)==true) {return trim($_POST[$tcVar]);} 
		else {return $tcVal;}
	}
	function iPost($tcVar, $tiVal=NULL) {
		if(postExi($tcVar)==true) {return intval($_POST[$tcVar]);} 
		else {return $tiVal;}
	}
	function nPost($tcVar, $tnVal=NULL) {
		if(postExi($tcVar)==true) {return floatval($_POST[$tcVar]);} 
		else {return $tnVal;}
	}
	function dPost($tcVar, $tdVal=NULL) {
		if(postExi($tcVar)==true) {return trim($_POST[$tcVar]);} 
		else {return $tdVal;}
	}
	function vPost($tcVar, $tvVal=NULL) {
		if(postExi($tcVar)==true) {return trim($_POST[$tcVar]);} 
		else {return $tvVal;}
	}
	function ePost($tcVar, $teVal=NULL) {
		if(postExi($tcVar)==true) {return trim($_POST[$tcVar]);} 
		else {return $teVal;}
	}
	function lPost($tlVar, $tlVal=NULL) {
		if(postExi($tlVar)==true) {return $_POST[$tlVar];} 
		else {return $tlVal;}
	}
	function ydb($tc) {
		$lc = str_replace('.', '', $tc);
		return str_replace(',', '.', $lc);
	}
	function udbNull() {return 'NULL';}
	function cdbPost($tcVar) {
		$tc = cPost($tcVar, NULL);
		if(is_null($tc)) {$lcVal = udbNull();} 
		else {$lcVal = cdbVal($tc);}
		return $lcVal;
	}
	function idbPost($tcVar, $ti=NULL) {
		$li = iPost($tcVar, NULL);
		if(is_null($li)) {
			if(is_null($ti)) {$lcVal = udbNull();}
			else {$lcVal = idbVal($ti);}
		} else {$lcVal = idbVal($li);}
		return $lcVal;
	}
	function idbPostChk($tcVar) {
		if(postExi($tcVar)==true) {$li=1;} 
		else {$li=0;}
		$lcVal = idbVal($li);
		return $lcVal;
	}
	function ndbPost($tcVar) {
		$tn = nPost($tcVar, NULL);
		if(is_null($tn)) {$lcVal = udbNull();} 
		else {$lcVal = idbVal($tn);}
		return $lcVal;
	}
	function ddbPost($tiClase, $tcVar) {
		$ld = dPost($tcVar, NULL);
		if(is_null($ld)) {$ldVal = udbNull();} 
		else {$ldVal = ddbVal($tiClase, $ld);}
		return $ldVal;
	}
	function vdbPost($tcVar) {
		$tv = vPost($tcVar, NULL);
		if(is_null($tv)) {$lcVal = udbNull();} 
		else {$lcVal = vdbVal($tv);}
		return $lcVal;
	}
	function edbPost($tcVar) {
		$te = ePost($tcVar, NULL);
		if(is_null($te)) {$lcVal = udbNull();} 
		else {$lcVal = edbVal($te);}
		return $lcVal;
	}
	function ldbPost($tlVar) {
		$ll = lPost($tlVar, NULL);
		if(is_null($ll)) {$llVal = udbNull();} 
		else {$llVal = ldbVal($ll);}
		return $llVal;
	}
	function cdbSes($tcVar) {
		$tc = sesVarVal($tcVar);
		if(is_null($tc)) {$lcVal = udbNull();} 
		else {$lcVal = cdbVal($tc);}
		return $lcVal;
	}
	function idbSes($tcVar) {
		$ti = sesVarVal($tcVar);
		if(is_null($ti)) {$lcVal = udbNull();} 
		else {$lcVal = idbVal($ti);}
		return $lcVal;
	}
	function cdbValCaracter() {return "'";}
	function cdbVal($tc) {return cdbValCaracter().$tc.cdbValCaracter();}
	function vdbVal($tv) {return cdbValCaracter().$tv.cdbValCaracter();}
	function edbVal($te) {return cdbValCaracter().$te.cdbValCaracter();}
	function idbVal($ti) {return strval($ti);}
	function ldbVal($tl) {if ($tl == true) {return '1' ;} else {return '0';}}
	function mesNum() {return array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');}
	function mesIni() {return array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');}
	function ddbVal($tiClase, $td) {
		if ($tiClase == 0) {
			$lcDia = substr($td, 0, 2);
			$lcMesIni = substr($td, 3, 3);
			
			$laMesNum = mesNum();
			$laMesIni = mesIni();
			$liMes = array_search($lcMesIni, $laMesIni); 
			$lcMes = $laMesNum[$liMes];
			
			$lcAno = substr($td, 7, 4);
		} elseif ($tiClase == 1) {
			$lcDia = substr($td, 0, 2);
			$lcMes = substr($td, 3, 2);
			$lcAno = substr($td, 6, 4);
		} else {
			$lcDia = substr($td, 8, 2);
			$lcMes = substr($td, 5, 2);
			$lcAno = substr($td, 0, 4);
		}
		$lcFecha = cdbValCaracter().$lcAno."-".$lcMes."-".$lcDia.cdbValCaracter();
		return $lcFecha;
	}
	function idbMel() {return ','.idbVal(sesVarVal('idMelAcceso')).");";}
	function cdb($tc){
		$lc = str_replace('Á', '&Aacute;', $tc);
		$lc = str_replace('á', '&aacute;', $lc);
		$lc = str_replace('É', '&Eacute;', $lc);
		$lc = str_replace('é', '&eacute;', $lc);
		$lc = str_replace('Í', '&Iacute;', $lc);
		$lc = str_replace('í', '&iacute;', $lc);
		$lc = str_replace('Ó', '&Oacute;', $lc);
		$lc = str_replace('ó', '&oacute;', $lc);
		$lc = str_replace('Ú', '&Uacute;', $lc);
		$lc = str_replace('ú', '&uacute;', $lc);
		$lc = str_replace('Ñ', '&Ntilde;', $lc);
		$lc = str_replace('ñ', '&ntilde;', $lc);
		$lc = str_replace('<', '&lt;', $lc);
		$lc = str_replace('>', '&gt;', $lc);
		return $lc;
	}
	function ddb($td) {return substr($td, 8, 2)."/".substr($td, 5, 2)."/".substr($td, 0, 4);}
	function cSalto($tv){
		$lv = str_replace(chr(13), "<BR>", $tv);
		echo $lv;
	}
	function lMostrar($ti) {if ($ti == 1) {echo "checked";}}
	function eMostrar($te){
		$le = cdb($te);
		$le = cSalto($le);
		echo $le;
	}
	function vMostrar($tv, $tiLargo=0){
		if($tiLargo==0) {$lv = cdb($tv);}
		else {$lv = cdb(substr($tv,0,$tiLargo));}
		$lv = cSalto($lv);
		echo $lv;
	}
	function cFecha($td) {
		$laMesIni = mesIni();
		$liMes = intval(substr($td, 5, 2))-1;
		return substr($td, 8, 2)."-".$laMesIni[$liMes]."-".substr($td, 0, 4);
	}
	function dMostrar($td) {
		$lcFecha = cFecha($td);
		echo $lcFecha;
	}
	function iMostrar($ti){echo $ti;}
	function yFormato($ty){return number_format($ty, 2, ",", ".");}
	function yMostrar($ty, $tiCero=1){
		$ly = yFormato($ty);
		if ($tiCero==0) {
			if ($ty<>0) {echo $ly;}
		} else {echo $ly;}
	}
	function nFormatoCantidad($tn){return number_format($tn, 3, ",", ".");}
	function nMostrarCantidad($tn){
		$ln = nFormatoCantidad($tn);
		echo $ln;
	}
	function nFormato($tn, $ti=0){return number_format($tn, 3, ",", ".");}
	function nMostrar($tn, $ti=0){
		if ($ti==1) {
			$ln = nFormato($tn);
			$ln = $ln."%";
		} else {$ln = nFormato($tn, $ti);}
		echo $ln;
	}
	function cMostrar($tc, $tiLargo=0){
		if($tiLargo==0) {$lc = cdb($tc);}
		else {$lc = cdb(substr($tc,0,$tiLargo));}
		echo $lc;
	}
	function cMostrarLargo($tc, $tiPx) {
		$liLargo = round($tiPx / 9);
		$lc = substr($tc, 0, $liLargo);
		cMostrar($lc);
	}
	function chkMostrar($ti) {if ($ti == 1) {echo "checked";}}
	function dbDbMysqlIni($tcUsuario, $tcContrasena, $tiDB, $tiSalir){
		$llIniRestaurar = false;
		if (ini_get('display_errors')) {
			$llIniRestaurar = true;
			$llDisplayErrors = ini_get('display_errors');
		    ini_set('display_errors', false);
		}
		
		$lcServidor = sesVarVal('cServidor');
		$laBaseDato = sesVarVal('aBaseDato');
		$lcBaseDato = $laBaseDato[$tiDB];
//exit($lcBaseDato);
		if (sesVarExi('cBaseDato')==true) {$lcBaseDato = sesVarVal('cBaseDato');}

		$loDbMysql = new mysqli($lcServidor, $tcUsuario, $tcContrasena, $lcBaseDato);

		if ($llIniRestaurar) {ini_set('display_errors', $llDisplayErrors);}

		if ($loDbMysql->connect_errno) {
			if ($tiSalir == 1) {die('Falla al conectarse con la base de datos. '.$loDbMysql->connect_errno);}
		}
		
		return $loDbMysql;
	}
	function dbDbMysqlRem($toDbMysql){$toDbMysql->close();}
	function dbConIni($tiDB){
		$lcUsuario    = sesVarVal('cUsuario');
		$lcContrasena = sesVarVal('cContrasena');
		
		$loDbMysql = dbDbMysqlIni($lcUsuario, $lcContrasena, $tiDB, 1);
		
		sesVarIni('oDbMysql', $loDbMysql);
	}
	function dbConRem(){
		$loDbMysql = sesVarVal('oDbMysql');
		dbDbMysqlRem($loDbMysql);
		sesVarRem('oDbMysql');
	}
	function dbResRec($tcPro, $tiSalir){
		$loDbMysql = sesVarVal('oDbMysql');
		if (!$loDbRes = $loDbMysql->query($tcPro)) {
			if ($tiSalir == 1) {die("Falla al ejecutar el procedimiento almacenado: ".$tcPro." ".$loDbMysql->error.".");}
		}
		return $loDbRes;
	}
	function dbResIni($tcPro, $tiMostrar=0, $tiDB=0){
		if ($tiMostrar==1) {exit($tcPro);}
		dbConIni($tiDB);
		$loDbRes = dbResRec($tcPro, 1);
		dbConRem();
		return $loDbRes;
	}
	function dbResRem($toDbRes){
		if(is_null($toDbRes->num_rows)) {$laDbFil = NULL;}
		else {$toDbRes->close();}
	}
	function dbResNum($toDbRes){
		$liResNum = $toDbRes->num_rows;
		return $liResNum;
	}
	function dbResFilCar($toDbRes){
		if(is_null($toDbRes->num_rows)) {$laDbFil = NULL;}
		else {$laDbFil = $toDbRes->fetch_array(MYSQLI_ASSOC);}
		return $laDbFil;
	}
	function dbResFilIni($tcPro, $tiDB=0){
		$loDbRes = dbResIni($tcPro, $tiDB);
		$laDbFil = dbResFilCar($loDbRes);
		dbResRem($loDbRes);
		return $laDbFil;
	}
	function ifInmediato ($tlExpresion, $tuRetornoVerdadero, $tuRetornoFalso) {
		if ($tlExpresion==true) {return $tuRetornoVerdadero;} else {return $tuRetornoFalso;}
	}
	function ses() {return 'ses'.$_SESSION['iSes'];}
	function sesVarExi($tcVar) {
		$lcSes = ses();
		return isset($_SESSION[$lcSes][$tcVar]);
	}
	function sesVarIni($tcVar, $tcVal) {
		if(sesVarExi($tcVar)==true) {sesVarRem($tcVar);}
		$lcSes = ses();
		$_SESSION[$lcSes][$tcVar] = $tcVal;

	}
	function sesVarVal($tcVar) {
		if(sesVarExi($tcVar)==true) {
			$lcSes = ses();
			return $_SESSION[$lcSes][$tcVar];
		} else {return NULL;}
	}
	function sesVarRem($tcVar) {
		if(sesVarExi($tcVar)==true) {
			$lcSes = ses();
			unset($_SESSION[$lcSes][$tcVar]);}
		}
	function melUsuario() {
		sesVarIni('cUsuario', 'melUsuario');
		sesVarIni('cContrasena', '0123Mel');
		sesVarIni('idMelAcceso', 0);
	}
	function sesIni() {
		if (isset($_SESSION['iSes'])==false) {
			$_SESSION['iSes'] = 0;

			sesVarIni('cDir', $_SERVER['PHP_SELF']);

			$lcServidor = 'localhost';

			$laBaseDato = array(
							0 => "melDiresoft", 
							1 => "meltranet"
							);
			
			sesVarIni('idMelAcceso', 0);
			sesVarIni('cServidor', $lcServidor);
			sesVarIni('cUsuario', 'melUsuario3');
			sesVarIni('cContrasena', '0123Mel');
			sesVarIni('aBaseDato', $laBaseDato);
		}
	}
	function sesRem() {
		if (isset($_SESSION['iSes'])==true) {unset($_SESSION['iSes']);}
	}
	function sesVarDef($tcVar, $tuVal=NULL) {
		if (sesVarExi($tcVar)==true) {$luVal = sesVarVal($tcVar);} 
		else {$luVal = $tuVal;}
		sesVarIni($tcVar, $luVal);
		return $luVal;
	}
	function cPostVal($tcVar) {
		if(postExi($tcVar)==true) {return trim($_POST[$tcVar]);} 
		else {return NULL;}
	}
	function iPostVal($tcVar) {
		if(postExi($tcVar)==true) {return intval($_POST[$tcVar]);} 
		else {return NULL;}
	}
	function vPostVal($tcVar) {
		if(postExi($tcVar)==true) {return trim($_POST[$tcVar]);} 
		else {return NULL;}
	}
	function lPostVal($tlVar) {
		if(postExi($tlVar)==true) {return $_POST[$tlVar];} 
		else {return NULL;}
	}
	function cPostValDef($tcVar, $tcVal) {
		$lcVal = cPostVal($tcVar);
		if(is_null($lcVal)) {$lcVal = $tcVal;} 
		return $lcVal;
	}
	function iPostValDef($tcVar, $tiVal) {
		$liVal = iPostVal($tcVar);
		if(is_null($liVal)) {$liVal = $tiVal;} 
		return $liVal;
	}
	
	function dbCaracter() {return "'";}
	function dbSeparador() {return ",";}
	
	function cdbValor($tc) {return dbCaracter().$tc.dbCaracter();}
	function idbValor($ti) {return strval($ti);}

	function dbValor($ti, $tu) {
		if ($ti==1) {return idbValor($tu).dbSeparador();}
		else {return cdbValor($tu).dbSeparador();}
	}
	
	function oResIni($tiIni, $tcPro, $tcPar) {
		$lcPro = "CALL ".$tcPro."(".
			$tcPar.
			idbValor(sesVarVal('idMelAcceso')).");";

		if ($tiIni == 0) {$loRes = dbResIni($lcPro, 0);}
		else {exit($lcPro);}
		
		return $loRes; 
	}
	function oResRem($toRes){$toRes->close();}
	function aResCar($toRes){
		$laRes = $toRes->fetch_array(MYSQLI_ASSOC);
		return $laRes;
	}
	function incluir($tcArchivo) {
		include $tcArchivo ;
	}
	function cUrlWeb() {
		$lcUrlMeltranet = cUrlMeltranet();
		$lcUrlWeb = substr($lcUrlMeltranet, 0, strlen($lcUrlMeltranet)-10);
		return $lcUrlWeb;
	}
	function cUrlMeltranet() {
		$lcHost  = $_SERVER['HTTP_HOST'];
		$lcUri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

		$lcUrlCompleto = "http://".$lcHost.$lcUri."/";

		$liPos = strpos($lcUrlCompleto, 'meltranet');
		
		$lcUrlMeltranet = substr($lcUrlCompleto, 0, $liPos+10); 

		return $lcUrlMeltranet;
	}

	sesIni();
	
	set_time_limit(600);
?>
