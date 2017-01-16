<?php include '../../../meltranet.php';

	$lcPro = "CALL facturaRec(3,0,0,'','',".
		idbPost('idFactura').idbMel();
	$laMel = dbResFilIni($lcPro);

	$lcPro = "CALL facturaServicioRec(1,".
		idbPost('idFactura').idbMel();
	$loDet = dbResIni($lcPro);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Meltranet</title>
    <link href="../../../meltranet.css" rel="stylesheet" type="text/css">
	<link href="../../../../melSocio.css" rel="stylesheet" type="text/css">
	<link href="../../../../melRpt.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../../meltranet.js"></script>
</head>

<body>
    <div style="margin-top:132px; padding-left:14px; width:740px;">
    	<div>
        	<div style="font-size:14px; padding-left:12px; float:left;">
	    	    <span style="width:auto;" class="etiqueta">Fecha:</span>
				<?php 
dMostrar($laMel["dFecha"]);
//echo('01/12/2015');
?>
			</div>
        	<div style="font-size:14px; padding-right:24px; float:right;">
	    	    <span style="width:auto;" class="etiqueta">Factura:</span><?php 
				cMostrar($laMel["cNumero"]);
				if ($laMel["iEstado"]<>1) {cMostrar(" (".$laMel["cEstado"].")");}?>
			</div>
            <div style="clear:both;"></div>
		</div>
        <div class="listaFilaTitulo">&nbsp;</div>
		<div style="padding-top:6px; padding-right:12px; padding-left:12px;">
        	Datos del cliente
			<div style="font-size:14px; padding-top:6px; font-weight:bold;">
    	    	<span style="width:auto;" class="etiqueta">Raz&oacute;n Social:</span>
        	    <?php cMostrar($laMel["cClienteNombre"]);?>
	   	    </div>
			<div style="font-size:14px; padding-top:6px; font-weight:bold;">
    	    	<span style="width:auto;" class="etiqueta">RIF/CI:</span>
        	    <?php cMostrar($laMel["cClienteIdentidad"]);?>
	   	    </div>
			<div style="padding-top:6px;">
       		    <?php eMostrar($laMel["eClienteDato"]);?>
        	</div>
		</div>
		<div class="listaFilaTitulo">&nbsp;</div>
		<div class="listaFilaTitulo">
			<div style="width:24px; text-align:left; font-size:11px;" class="listaCeldaTitulo0">&nbsp;</div>
			<div style="width:400px; text-align:left; font-size:11px;" class="listaCeldaTitulo1">Descripci&oacute;n</div>
			<div style="width:70px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">Cantidad</div>
			<div style="width:30px; text-align:center; font-size:11px;" class="listaCeldaTitulo1">&nbsp;</div>
			<div style="width:70px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">Precio</div>
			<div style="width:80px; text-align:right; font-size:11px;" class="listaCeldaTitulo1">Importe</div>
            <div style="text-align:center; font-size:11px;" class="listaCeldaTitulo2">&nbsp;</div>
  	    	<div class="listaCeldaCorte"></div>
		</div><?php
		$liLineaDet=0;
		while ($laDet = dbResFilCar($loDet)) {
			$liLineaDet = $liLineaDet + 1;?>
        	<div>
				<div style="width:24px; text-align:left;" class="listaCeldaNormal0"><?php iMostrar($laDet['iFila']);?></div>
				<div style="width:400px; text-align:left;" class="listaCeldaNormal1"><?php cMostrar($laDet['cServicioNombre'],56);?></div>
				<div style="width:70px; text-align:center;" class="listaCeldaNormal1"><?php iMostrar($laDet['iCantidad']);?></div>
				<div style="width:30px; text-align:center;" class="listaCeldaNormal1"><?php cMostrar($laDet['cImpuesto']);?></div>
				<div style="width:70px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet['yServicioPrecio']);?></div>
				<div style="width:80px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laDet['ySubtotal']);?></div>
				<div style="text-align:center;" class="listaCeldaNormal2">&nbsp;</div>
	   	        <div class="listaCeldaCorte"></div><?php
				if ($laDet["cDescripcion0"]!='') {
					$liLineaDet = $liLineaDet + 1;?>
                    <div style="padding-left:60px;"><?php cMostrar($laDet["cDescripcion0"],40);?></div><?php 
				}
				if ($laDet["cDescripcion1"]!='') {
					$liLineaDet = $liLineaDet + 1;?>
                    <div style="padding-left:60px;"><?php cMostrar($laDet["cDescripcion1"],40);?></div><?php 
				}
				if ($laDet["cDescripcion2"]!='') {
					$liLineaDet = $liLineaDet + 1;?>
                    <div style="padding-left:60px;"><?php cMostrar($laDet["cDescripcion2"],40);?></div><?php 
				}?>
			</div><?php
		}
		dbResRem($loDet);
		for ($liLine = $liLineaDet; $liLine <= 20; $liLine++) {?>
			<div style="width:24px;" class="listaCeldaNormal0">&nbsp;</div>
			<div style="width:24px;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:24px;" class="listaCeldaNormal2">&nbsp;</div>
			<div class="listaCeldaCorte"></div><?php
		}?>
       	<div>
			<div style="width:24px; text-align:left;" class="listaCeldaNormal0">&nbsp;</div>
			<div style="width:360px; text-align:left; font-style:italic;" class="listaCeldaNormal1">Base Imponible&nbsp;<?php cMostrar($laMel['cImpuesto']);?></div>
			<div style="width:70px; text-align:left;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:70px; text-align:center;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:70px; text-align:right;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:80px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laMel['ySubtotal']);?></div>
			<div style="text-align:center;" class="listaCeldaNormal2">&nbsp;</div>
   	        <div class="listaCeldaCorte"></div>
		</div>
           <div>
			<div style="width:24px; text-align:left;" class="listaCeldaNormal0">&nbsp;</div>
			<div style="width:360px; text-align:left; font-style:italic;" class="listaCeldaNormal1">Impuesto al Valor Agregado&nbsp;<?php cMostrar($laMel['cImpuesto']);?></div>
			<div style="width:70px; text-align:left;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:70px; text-align:center;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:70px; text-align:right;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:80px; text-align:right;" class="listaCeldaNormal1"><?php yMostrar($laMel['yImpuesto']);?></div>
			<div style="text-align:center;" class="listaCeldaNormal2">&nbsp;</div>
   	        <div class="listaCeldaCorte"></div>
		</div>
       	<div style="font-size:14px;">
			<div style="width:24px; text-align:left;" class="listaCeldaNormal0">&nbsp;</div>
			<div style="width:360px; text-align:left;" class="listaCeldaNormal1"><span style="width:auto;" class="etiqueta">Total Factura Bs.</span></div>
			<div style="width:70px; text-align:left;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:70px; text-align:center;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:70px; text-align:right;" class="listaCeldaNormal1">&nbsp;</div>
			<div style="width:80px; text-align:right; font-weight:bold;" class="listaCeldaNormal1"><?php yMostrar($laMel['yTotal']);?></div>
			<div style="text-align:center;" class="listaCeldaNormal2">&nbsp;</div>
   	        <div class="listaCeldaCorte"></div>
		</div>
		<div class="listaFilaTitulo">&nbsp;</div>
		<div class="listaFilaTitulo">&nbsp;</div>
        <div style="padding-top:6px; padding-right:12px; padding-left:12px;"><?php eMostrar($laMel["eNota"]);?></div>
        <div>
    		<div style="width:480px; float:left; padding-left:12px;">
				<div style="padding-top:6px;">
		    	    <span class="etiqueta" style="text-align:left; width:100px;">Promotor:</span>
	    	        <?php cMostrar($laMel["cPromotorNombre"]);?>
    	    	</div>
				<div style="padding-top:6px;">
		    	    <span class="etiqueta" style="text-align:left; width:100px;">Forma de pago:</span>
	    	        [ ]&nbsp;EF&nbsp;&nbsp;[ ]&nbsp;CH&nbsp;&nbsp;[ ]&nbsp;DP&nbsp;&nbsp;[ ]&nbsp;TR&nbsp;&nbsp;[ ]&nbsp;Otra
    	    	</div>
				<div style="padding-top:6px;">
		    	    <span class="etiqueta" style="text-align:left; width:100px;">&nbsp;</span>
	    	        Banco&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nro.
    	    	</div>
			</div>
    		<div style="width:240px; float:right;">
				<div style="padding-top:6px;">
		    	    <span class="etiqueta" style="text-align:left; width:120px;">Numero de control:</span>
	    	        <?php cMostrar($laMel["cControl"]);?>
    	    	</div>
				<div style="padding-top:6px;">
		    	    <span class="etiqueta" style="text-align:left; width:120px;">Condici&oacute;n Pago:</span>
	    	        <?php cMostrar($laMel["cPago"]);?>
    	    	</div>
 				<div style="padding-top:6px;">
	    		    <span class="etiqueta" style="text-align:left; width:120px;">F. Vencimiento:</span>
	        	    <?php dMostrar($laMel["dVence"]);?>
	    	    </div>
			</div>
    	    <div style="clear:both;"></div>
    	</div>
		<div class="listaFilaTitulo">&nbsp;</div>
        <div style="padding-top:6px;">
	        <div style="text-align:right; width:360px; float:left;">
                <div>Tel&eacute;f. (0241) 216.5773</div>
                <div>Correo e. info@diresoft.com.ve</div>
			</div>
	        <div style="text-align:center; width:20px; float:left;">
            	<div>|</div>
            	<div>|</div>
            </div>
    	    <div style="text-align:left; float:left;">
                <div>M&oacute;vil (0416) 640.8911</div>
                <div>Sitio web www.diresoft.com.ve</div>
			</div>
           	<div style="clear:both;"></div>
		</div>
    </div>
</body>
</html>
<script language="JavaScript">
	window.print();
	loRpt.iInterval = setInterval(loRpt.cerrar, 1);
</script>
