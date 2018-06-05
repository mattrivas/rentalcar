var t = $('#tautos').DataTable();
$(document).ready(function($) {
	init();
});
function init(){
	console.log("Inicializada tabla");
	traeTabla();
}

function traeTabla(){
	$.ajax({
		type:"get", 
		data:{
			"fechaDesde" : "2017-06-01",
			"fechaHasta" : "2018-06-01",
			"cant" : "4",
			"ciudad" : "General Pico",
			"provincia" : "La Pampa",
			"pais" : "Argentina"
		},
		url:"./api/auto/trae", dataType:'json',cache:false, success:function(datos,textStatus,jqXHR){
			console.log("RTA: "+datos.auto);
		}
	});
}
