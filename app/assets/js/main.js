
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
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};