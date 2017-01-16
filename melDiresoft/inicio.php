<?php include 'meltranet/meltranet.php';?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nati Vitae</title>
	<link href="melSocio.css" rel="stylesheet" type="text/css">
	<link href="meltranet/tmp/slider/nivo-slider.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="meltranet/tmp/slider/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="meltranet/tmp/slider/jquery.form.js"></script>
	<script type="text/javascript" src="meltranet/tmp/slider/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript" src="meltranet/tmp/slider/jquery.prettyPhoto.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect:'random', //Specify sets like: 'fold,fade,sliceDown'
				slices:7,
				animSpeed:500,
				pauseTime:5000,
				startSlide:0, //Set starting Slide (0 index)
				directionNav:true, //Next & Prev
				directionNavHide:true, //Only show on hover
				controlNav:true, //1,2,3...
				controlNavThumbs:false, //Use thumbnails for Control Nav
				controlNavThumbsFromRel:false, //Use image rel for thumbs
				controlNavThumbsSearch: '.jpg', //Replace this with...
				controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
				keyboardNav:true, //Use left & right arrows
				pauseOnHover:false, //Stop animation while hovering
				manualAdvance:false, //Force manual transitions
				captionOpacity:0.8, //Universal caption opacity
				beforeChange: function(){},
				afterChange: function(){},
				slideshowEnd:function(){}, //Triggers after all slides have been shown
			});
		});
	</script>
</head>

<body>
	<div style="padding-right:20px; padding-left:20px;">
    	<div>
	    	<div id="slider" style="width:749px; height:196px; float:left;">
		  		<img name="slide1" src="jpg/banner0.jpg" width="749" height="196" />
				<img name="slide2" src="jpg/banner1.jpg" width="749" height="196" />
				<img name="slide3" src="jpg/banner2.jpg" width="749" height="196" />
    	    </div>
    		<div style="width:190px; float:right;">
				<div style="border-bottom:2px solid #D7D7D7;">
	       			<span style="color:#005A99; font-size:17px; font-weight:bold;">Acceder a Meltranet</span>
				</div>
        		<div style="padding-left:6px;">
            		<form action="meltranet/acceder.php" target="_top" method="post">
		            	<?php include 'meltranet/formulario.php';?>
					</form>
    	        </div>
				<div style="padding:6px; color:#F17918;">¿No puedes acceder?</div>
	        </div>
    	    <div style="clear:both;"></div>
	    </div>
    	<div style="padding-top:12px;">
	    	<div style="width:200px; float:left;">
				<div style="border-bottom:2px solid #D7D7D7;">
	       			<span style="color:#005A99; font-size:17px; font-weight:bold;">Servicios en l&iacute;nea</span>
				</div>
				<div style="padding-top:2px; color:#878787; font-size:12px;">
			       	<div style="padding-top:4px;">Contabilidad B&aacute;sica</div>
                    <div style="padding-top:4px;">Contabilidad Fiscal</div>
                    <div style="padding-top:4px;">Patente de Industria y Comercio</div>
                    <div style="padding-top:4px;">Gestion, Declaraci&oacute;n, Pago, etc.</div>
                    <div style="padding-top:4px;">Declaraci&oacute;n y Retenci&oacute;n de IVA</div>
                    <div style="padding-top:4px;">Contribuyentes Ordinarios y Esp.</div>
                    <div style="padding-top:4px;">Estados Financieros</div>
                </div>
        		<div style="color:#F17918; text-align:right;">Ver m&aacute;s</div>
            </div>
	    	<div style="width:220px; float:left; padding-left:36px;">
				<div style="border-bottom:2px solid #D7D7D7;">
	       			<span style="color:#005A99; font-size:17px; font-weight:bold;">Meltranet</span>
				</div>
				<div style="padding-top:2px; color:#878787; font-size:12px;">
			       	<div style="padding-top:4px;">
                    	Es un paquete de aplicaciones y programas de Informtica, desarrollado para satisfacer las actuales necesidades de automatizaci&oacute;n de los procesos administrativos y operativos, que tiene las PyMEs en sus operaciones de gesti&oacute;n y control, elaborado bajo el concepto de <em>Software</em> Libre con Est&aacute;ndares Abiertos.                    </div>
              </div>
        		<div style="color:#F17918; text-align:right;">Ver m&aacute;s</div>
            </div>
	    	<div style="width:456px; float:right;">
				<div>
			       	<div style="color:#F17918; font-size:16px; font-weight:bold;">
                    	Nuevo Valor de la Unidad Tributaria
					</div>
                    <div style="color:#878787; padding-top:2px; font-size:12px;">
                    	Providencia mediante la cual, se reajusta la unidad tributaria de noveta bolvares (Bs. 90,00) a ciento siete bolvares (Bs. 107,00)
                    </div>
			       	<div style="color:#005A99; padding-top:4px;">
                    	Mie, 06 de febr | www.seniat.gob.ve
					</div>
                </div>
				<div>
			       	<div style="color:#F17918; font-size:16px; font-weight:bold; padding-top:12px;">
                    	Saldo Favorable en el 4 trimestre del 2010
					</div>
                    <div style="color:#878787; padding-top:2px; font-size:12px;">
                    	En el cuarto trimestre de 2010, las transacciones corrientes de la balanza de pagos arrojaron un saldo favorable de US$ 3.554 millones
                    </div>
			       	<div style="color:#005A99; padding-top:4px;">
                    	Mar, 22 de febr | www.bcv.org.ve
					</div>
                </div>
        		<div style="color:#F17918; text-align:right;">Ver m&aacute;s</div>
            </div>
            <div style="width:0px; height:0px; clear:both;">&nbsp;</div>
		</div>
    </div>
</body>
</html>
