// JavaScript Document
rpt = function () {
	var iInterval = 0;
	this.imprimir = function (tcArchivo, tiSalida) {
		var lcArchivo = tcArchivo+'&iSalida='+tiSalida ; 
		var lnAleatorio = Math.random();
		var lcAleatorio = String(lnAleatorio);
		var lcVentana = 'Imprimir' + lcAleatorio.split(".").join("");
		window.open(lcArchivo, lcVentana, 'top=0,left=0,scrollbars');
	}
	this.cerrar = function () {
	  clearInterval(this.iInterval);
	  window.close();
	}   

}
loRpt = new rpt();
