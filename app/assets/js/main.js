
jQuery(document).ready(function($) {
	init();
});
function init(){
	console.log("Inicializando pagina.");
	dashboard();
}
function table(){
	jQuery("#dynamic").empty();
	jQuery(".active").removeClass("active");
	jQuery("#htable").addClass("active");
	console.log("Cargando dashboard");
	loading();
	jQuery("#dynamic").load("./app/table/table.html");	
}
function dashboard(){
	jQuery("#dynamic").empty();
	jQuery(".active").removeClass("active");
	jQuery("#hdash").addClass("active");
	console.log("Cargando dashboard");
	loading();
	jQuery("#dynamic").load("./app/dashboard/dashboard.html");	
}
/* Auxiliares */
function loading() {
	jQuery("#dynamic").empty();
	jQuery("#dynamic").append("<div class='loader'></div>").delay(1000);
	console.log("Time out exipred");
}