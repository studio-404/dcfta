var searchInputOn = function(){
	var val = $("#searchInput").attr("data-val"); 
	if($("#searchInput").val() == val){
		$("#searchInput").val("");
	}
};
var searchInputOff = function(){
	var val = $("#searchInput").attr("data-val"); 
	if($("#searchInput").val() == ""){
		$("#searchInput").val(val);
	}
};

$(document).ready(function(){

});