<?php 
	include '../../../meltranet.php';

	$lcPro = "CALL compraRec(5,0,0,'','',".
		idbPost('idCompra').idbMel();
	$laReg = dbResFilIni($lcPro);
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
	<?php rptEncabezado();?>
    <div style="margin:12px; width:940px;">
	    <div style="width:600px; float:left; border:1px solid #000000;">
        	<div style="font-weight:bold; text-align:center;">
            	COMPROBANTE DE RETENCIÓN DEL IMPUESTO SOBRE LA RENTA (I.S.L.R.)
            </div>
        	<div style="font-size:9px; text-align:center;">
				(RETENCION DE IMPUESTO SOBRE LA RENTA SEGÚN DECRETO 1008 DEL AÑO 1.997.)
            </div>
		</div>
	    <div style="width:320px; float:right; border:1px solid #000000;">
    		<div style="width:160px; float:left; margin:6px;">
                <div>
	            	0.- RETENCION
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php 
						cMostrar($laReg["cNumero"]);
						if($laReg["iEstado"]<>1) { ?>
                        	<br><?php
                        	cMostrar('('.$laReg["cEstado"].')');
                        }
					?>
				</div>
            </div>
    		<div style="width:100px; float:right; margin:6px;">
                <div>
	            	1.-FECHA
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php dMostrar($laReg["dFecha"]);?>
				</div>
            </div>
		</div>
        <div style="clear:both;"></div>
		<div>
    		<div style="width:300px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	2.- NOMBRE O RAZÓN SOCIAL DEL AGENTE DE RETENCIÓN
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php cMostrar($laReg["cAgenteNombre"]);?>
				</div>
            </div>
    		<div style="width:360px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	3.- REGISTRO DE INFORMACIÓN FISCAL DEL AGENTE (R.I.F.)
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php cMostrar($laReg["cAgenteIdentidad"]);?>
				</div>
            </div>
    		<div style="width:240px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	4.- PERIODO FISCAL
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php cMostrar('AÑO:'.$laReg["cAno"].' / MES:'.$laReg["cMes"]);?>
				</div>
            </div>
	        <div style="clear:both;"></div>
        </div>        
		<div>
    		<div style="width:672px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	5.- DIRECCIÓN FISCAL DEL AGENTE DE RETENCIÓN
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php vMostrar($laReg["vAgenteDireccion"]);?>
				</div>
            </div>
	        <div style="clear:both;"></div>
		</div>
		<div>
    		<div style="width:300px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	6.- NOMBRE O RAZÓN SOCIAL DEL CONTRIBUYENTE 
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php cMostrar($laReg["cProveedorNombre"]);?>
				</div>
            </div>
    		<div style="width:360px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	7.- REGISTRO DE INFORMACIÓN FISCAL DEL CONTRIBUYENTE (R.I.F.)
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php cMostrar($laReg["cProveedorIdentidad"]);?>
				</div>
            </div>
    		<div style="width:240px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	8.- NACIONALIDAD DEL CONTRIBUYENTE 
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php vMostrar($laReg["cProveedorNacionalidad"]);?>
				</div>
            </div>
	        <div style="clear:both;"></div>
        </div>
		<div>
    		<div style="width:672px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	9.- DIRECCIÓN FISCAL DEL CONTRIBUYENTE
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php vMostrar($laReg["vProveedorDireccion"]);?>
				</div>
            </div>
    		<div style="width:240px; float:left; margin:6px;">
                <div style="font-size:10px;">
	            	10.- TIPO DE PERSONA
				</div>
                <div style="margin-top:6px; font-weight:bold;">
	                <?php vMostrar($laReg["cProveedorPersona"]);?>
				</div>
            </div>
	        <div style="clear:both;"></div>
		</div>
		<div style="font-size:9px; border:1px solid #000000;">
        	<div style="width:30px; height:38px; float:left; border-right:1px solid #000000; text-align:center;">
            	Oper.<br>Nro.
        	</div>
        	<div style="width:80px; height:38px; float:left; border-right:1px solid #000000; text-align:center;">
				Fecha<br>de<br>Factura
			</div>
        	<div style="width:70px; height:38px; float:left; border-right:1px solid #000000; text-align:center;">
				Número<br>de<br>Registro
			</div>
        	<div style="float:left; border-right:1px solid #000000; text-align:center;">
            	<div style=" height:14px;border-bottom:1px solid #000000;">
                	FACTURA
                </div>
            	<div>
		        	<div style="width:30px; height:23px; float:left; border-right:1px solid #000000; text-align:center;">
         	           Serie
		            </div>
		        	<div style="width:70px; height:23px; float:left; text-align:center;">
                    	Número
		            </div>
        			<div style="clear:both;"></div>
                </div>
            </div>
        	<div style="width:80px; height:38px; float:left; border-right:1px solid #000000; text-align:center;">
            	Número<br>Control<br>Factura
            </div>
        	<div style="width:200px; height:38px; float:left; border-right:1px solid #000000; text-align:center;">
            	Cantidad Objeto de Retención
            </div>
        	<div style="width:200px; height:38px; float:left; border-right:1px solid #000000; text-align:center;">
            	% Alícuota Retenido
            </div>
        	<div style="width:160px; height:38px; float:left;text-align:center;">
            	Impuesto Retenido
            </div>
        	<div style="clear:both;"></div>
        </div>
		<div style="font-size:11px;">
    	   	<div style="width:30px; float:left; padding-right:1px; text-align:center;">
            	<?php cMostrar($laReg["cOperacion"]);?>
        	</div>
        	<div style="width:80px; float:left; padding-right:1px; text-align:center;">
            	<?php dMostrar($laReg["dFacturaFecha"]);?>
			</div>
        	<div style="width:70px; float:left; padding-right:1px; text-align:center;">
				<?php cMostrar($laReg["cRegistro"]);?>
			</div>
        	<div style="width:30px; float:left; padding-right:1px; text-align:center;">
            	<?php 
					if ($laReg["cFacturaSerie"]=='') {cMostrar("&nbsp;");}
					else {cMostrar($laReg["cFacturaSerie"]);}
				?>
            </div>
        	<div style="width:70px; float:left; text-align:center;">
            	<?php cMostrar($laReg["cFacturaNumero"]);?>
            </div>
        	<div style="width:80px; float:left; padding-right:1px; text-align:center;">
            	<?php cMostrar($laReg["cFacturaControl"]);?>
            </div>
        	<div style="width:200px; float:left; padding-right:1px; text-align:center;">
            	<?php yMostrar($laReg["ySubtotal"]);?>
            </div>
        	<div style="width:200px; float:left; padding-right:1px; text-align:center;">
            	<?php yMostrar($laReg["nAlicuota"]);?>%
            </div>
        	<div style="width:160px; float:left; padding-right:1px; text-align:center;">
            	<?php yMostrar($laReg["yMonto"]);?>
            </div>
        	<div style="clear:both;"></div>
        </div>
	    <div style="height:200px;">&nbsp;</div>  
		<div style="font-size:11px;">
			<div style="border:1px solid #000000; float:right;">
	        	<div style="width:200px; float:left; border-right:1px solid #000000; text-align:center;">
    	        	<?php yMostrar($laReg["ySubtotal"]);?>
        	    </div>
	        	<div style="width:200px; float:left; border-right:1px solid #000000; text-align:center;">
                   	&nbsp;
	            </div>
        		<div style="width:160px; float:left;text-align:center;">
            		<?php yMostrar($laReg["yMonto"]);?>
	            </div>
    	    	<div style="clear:both;"></div>
			</div>
        	<div style="width:40px; float:right; text-align:center;">
            	TOTAL
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="margin-top:60px;">
        	<div style="width:600px; float:left; text-align:center;">
	        	<div>
		        	<div style="float:left;">
	    	        	Lugar:&nbsp;<?php cMostrar($laReg["cRealizadoLugar"]);?>
					</div>
                    <div style="float:left;">
                    	&nbsp;
					</div>
                    <div style="clear:both;"></div>
        	    </div>
	        	<div style="margin-top:48px;">
		        	<div style="width:300px; border-top:1px solid #000000; text-align:center;">
    		        	Firma Agente de Retención
        		    </div>
	        		<div style="width:300px; text-align:center;">
    	        		<?php cMostrar($laReg["cRealizadoNombre"]);?>
	        	    </div>
        	    </div>
	        </div>
        	<div style="float:left; text-align:center;">
	        	<div>
		        	<div style="float:left;">
	    	        	Recibido Por
    	    	    </div>
                    <div style="width:200px; float:left; border-bottom:1px solid #000000;">
                    	&nbsp;
					</div>
                    <div style="clear:both;"></div>
        	    </div>
	        	<div style="margin-top:24px;">
		        	<div style="float:left;">
	    	        	Fecha de Recibido
    	    	    </div>
                    <div style="width:166px; float:left; border-bottom:1px solid #000000;">
                    	&nbsp;
					</div>
                    <div style="clear:both;"></div>
        	    </div>
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
