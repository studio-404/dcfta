var Config = {
	website: "http://dcfta.404.ge", 
	deviceWidth: (window.outterWidth > 0) ? window.outteWidth : screen.width, 
	deviceHeight: (window.outteHeight > 0) ? window.outteHeight : screen.height

};

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

var openNavigation = function(){
	if($("header .nav_bg .nav_bar .c-hamburger").hasClass("is-active")){
		$(".mobileNavigation").css("display","block");
		var headerTop = parseInt($("header .top").height());
		var topBottom = parseInt($("header .topBottom").height());
		var mobileNavMinHeight = Config.deviceHeight - (headerTop + topBottom);
		var bluBoxWidth = Config.deviceWidth - 20;

		var navigation = $("header .navigation").html(); 

		$(".mobileNavigation").css("min-height", mobileNavMinHeight+"px"); 
		$(".mobileNavigation .yellowBox").css("min-height", (mobileNavMinHeight-20)+"px"); 
		$(".mobileNavigation .blueBox").css({
			"min-height": (mobileNavMinHeight-20)+"px",
			"top": "20px", 
			"right": "-"+ bluBoxWidth+"px",
			"width": bluBoxWidth+"px"
		}); 
		$(".mobileNavigation .yellowBox").fadeIn(500);
		$(".mobileNavigation .blueBox").animate({
			right: "0px"
		}, 1000 );
		$(".mobileNavigation .blueBox").html(navigation);
	}else{
		$(".mobileNavigation").fadeOut();	
		$(".mobileNavigation .yellowBox").fadeOut(500);
	}
};

$(document).ready(function(){

    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }

});
