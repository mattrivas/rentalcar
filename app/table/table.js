jQuery(document).ready(function($) {
	init();
});
function init(){
	console.log("Inicializada tabla");
	traeTabla();
}

function traeTabla(){
	jQuery.ajax({
		type:"get", 
		data:{},
		url:"./api/auto/trae", dataType:'json',cache:false, success:function(datos,textStatus,jqXHR){
			var t = jQuery('#bootstrap-data-table').DataTable();
			for(var j=0; j<datos.auto.length; j++){
				t.row.add([datos.auto[j].nombre,"$"+datos.auto[j].precio,datos.auto[j].marca_nombre,datos.auto[j].categoria_nombre,datos.auto[j].cobertura_titulo,datos.auto[j].fecha_hasta,datos.auto[j].patente,]).draw(false);
			}
		}
	});
}

function insertar()
{
	$.ajax({
		type:"get", data:{},
		url:"./api/auto/guarda", dataType:'json',cache:false, success:function(datos,textStatus,jqXHR){
			console.log("RTA: "+datos.nroReserva);
		}
	});
}
function eliminar()
{
	$.ajax({
		type:"get", data:{},
		url:"./api/auto/eliminar", dataType:'json',cache:false, success:function(datos,textStatus,jqXHR){
			console.log("RTA: "+datos.nrodni);
		}
	});
}
function actualizar()
{
	$.ajax({
		type:"get", data:{},url:"./api/auto/actualizar",dataType:'json',cahe:false, success:function(datos,textStatus,jqXHR){
			console.log("RTA: "+datos.nroReserva);
		}
	})
}