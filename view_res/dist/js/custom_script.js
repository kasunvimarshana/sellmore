if(typeof jQuery === "undefined"){
    throw new Error("requires jQuery");
}
/*
$.fn.extend({
	custom_method: function( data ){
	}
});
*/
/*
$.fn.function_name = function( data ){};
*/
/* REQUIRED JS SCRIPTS */
// To make Pace works on Ajax calls
/*
$(document).ajaxStart(function(){
    Pace.restart()
});
*/
$(function(){
	/* disable right click */
	$(document).on("contextmenu", function(e){
    	return false;
    });
	/*
    $(this).bind("contextmenu", function(e){
		e.preventDefault();
		alert("right click is disabled!");
	});
    */
	/* disable ctrl + left mouse click */
	$("a").click(function(e){  
		if(e.ctrlKey){
			return false;
		}
    });
});