var Config = {
	website: "http://dcfta.404.ge",
	mainLang: "ge",
	mainClass: "home",
	ajax:"http://dcfta.404.ge/ge/ajax/index",  
	deviceWidth: (window.outterWidth > 0) ? window.outteWidth : screen.width, 
	deviceHeight: (window.outteHeight > 0) ? window.outteHeight : screen.height,
	waitGeo:"მოთხოვნა იგზავნება...",
	waitEng:"Please wait...",
	waitRus:"пожалуйста, подождите..."

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
		navToMobile();
		$("main").css("display","none");
		$("footer").css("display","none");
	}else{
		$(".mobileNavigation").fadeOut();	
		$(".mobileNavigation .yellowBox").fadeOut(500);
		$("main").css("display","block");
		$("footer").css("display","block");
	}
};

var detectmob = function(){
	if( navigator.userAgent.match(/Android/i) || 
		navigator.userAgent.match(/webOS/i) || 
		navigator.userAgent.match(/iPhone/i) || 
		navigator.userAgent.match(/iPad/i) || 
		navigator.userAgent.match(/iPod/i) || 
		navigator.userAgent.match(/BlackBerry/i) || 
		navigator.userAgent.match(/Windows Phone/i) 
	){
		return true;
	} else {
 		return false;
 	}
};

var navToMobile = function(){
	if(detectmob()){
		$(".mobileNavigation .blueBox ul li").each(function(){
			if($(this).hasClass("sub")){
				var sub = $(this).attr("data-sub"); 
				$(".slide", this).attr("href","javascript:void(0)");
				$(".slide", this).attr("onclick","slideDownMe('"+sub+"')");
				$("."+sub).attr("data-active","false");
			}
		});
	}
};

var slideDownMe = function(s){
	var active = $("."+s).attr("data-active"); 
	console.log("shevida" +active+" "+s);
	if(active=="false"){
		$("."+s).slideDown(500);
		$("."+s).attr("data-active","true"); 
		$("."+s).prev(".arrow").css({"transform":"rotate(90deg)"});
	}else{
		$("."+s).slideUp(500);
		$("."+s).attr("data-active","false"); 
		$("."+s).prev(".arrow").css({"transform":"rotate(0deg)"});
	}
};

var filesMobilize = function(){
	$(".files-mobile").each(function(){
		console.log("count me"); 
		var type = $(this).attr("data-type"); 
		var ht = $("."+type).html(); 
		$(this).html(ht); 
	});
};

var leftNavYellowBoxChangeHeight = function(){
	setTimeout(function(){
		var h = parseInt($(".leftNavigation .nav").height()) + 20;
		$(".leftNavigation .yellowBG").css("height", h+"px");
	}, 200); 	
};

var openComment = function(cid, commentForm){
	if($('.'+commentForm+':visible').length == 0)
	{
		$('.'+commentForm).slideDown();
	}
	$('.'+commentForm+' .commentId').val(cid);
};

var comment = function(formBox, lang){
	var ajaxFile = "/addcomment";
	var commentId = $("."+formBox+" form .commentId").val();
	var firstname = $("."+formBox+" form .first_name").val(); 
	var organization = $("."+formBox+" form .organization").val(); 
	var email = $("."+formBox+" form .email").val(); 
	var csrf = $("."+formBox+" form .csrf").val(); 
	var comment = $("."+formBox+" form .comment").val(); 
	if(lang=="ge"){
		$("." + formBox + "_msg").text(Config.waitGeo);
	}else if(lang=="en"){
		$("." + formBox + "_msg").text(Config.waitEng);
	}else{
		$("." + formBox + "_msg").text(Config.waitRus);
	}
	$("." + formBox + " input[type='text']").attr("disabled","disabled");
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { commentId: commentId, firstname:firstname, organization:organization, email:email, comment:comment, csrf:csrf, lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Error.Code==1){
			$("." + formBox + "_msg").text(obj.Error.Text);
		}else if(obj.Success.Code==1){
			$("." + formBox + "_msg").text(obj.Success.Text);
			$("." + formBox + " input[type='text']").val('');
			setTimeout(function(){
				location.reload();
			}, 1500);
		}else{
			$("." + formBox + "_msg").text("Error");
		}
		$("." + formBox + " input[type='text']").removeAttr("disabled");
	});
};

var changeLanguage = function(newLang, oldLang){
	var url = window.location.href;
	var find = "/"+oldLang+"/";
	var replace = "/"+newLang+"/";
	var replaced = url.replace(find, replace); 
	console.log();
	if(url.search(find)!="-1"){
		location.href = replaced;
	}else{
		location.href = Config.website+"/"+Config.mainLang+"/"+Config.mainClass;
	}
};

var loadCal = function(type, currentMonth, currentYear, lang){
	var waitText = Config.waitGeo;
	var ajaxFile = "/loadCalendar";
	console.log(type + " " + currentMonth + " " + currentYear + " " + lang);
	if(lang=="en"){ waitText = Config.waitEng; }
	else if(lang=="en"){ waitText = Config.waitRus; }
	$(".CalendarBox").html(waitText);
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { type: type, currentMonth: currentMonth, currentYear:currentYear, lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Error.Code==1){
			console.log(obj.Error.Text);
		}else if(obj.Success.Code==1){
			$(".CalendarBox").html(obj.Success.Html);
			$('.tooltipped').tooltip({delay: 50});
		}else{
			$(".CalendarBox").html("Error");
		}
	});
};

var sendEmail = function(){
	var ajaxFile = "/sendEmail";
	var input_subject = $("#input_subject").val(); 
	var input_name = $("#input_name").val(); 
	var input_organization = $("#input_organization").val(); 
	var input_email = $("#input_email").val(); 
	var input_phone = $("#input_phone").val(); 
	var input_comment = $("#input_comment").val(); 
	var csrf = $(".csrf").val(); 

	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { input_subject: input_subject, input_name: input_name, input_organization:input_organization, input_email:input_email, input_phone:input_phone, input_comment:input_comment, csrf:csrf }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Error.Code==1){
			$(".messageBox").html(obj.Error.Text);
		}else if(obj.Success.Code==1){
			$(".messageBox").html(obj.Success.Text);
			$("input[type='text']").val('');
			setTimeout(function(){
				location.reload();
			}, 1500); 
		}else{
			$(".messageBox").html("Error");
		}
	});
};

var coordinationSvg = function(showMe, showOrHide){
	if(showOrHide=="true"){
		$(showMe).fadeIn(); 
	}else{
		$(showMe).fadeOut(); 
	}
	return false;
};

var strip = function(html){
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}

var getAllStringInsideCurly = function(){
	var content = strip($(".mainText").html());
	var arr = content.match(/[^{}]+(?=\})/g); 
	/*Test Programme*/
};

var dateFormat = function(unix_timestamp){
	var date = new Date(unix_timestamp*1000);
	var day = date.getDay();
	var month = date.getMonth();
	var year = date.getYear();

	var formattedTime = month + ' ' + day + ', ' + year;
	return formattedTime;
};

var timeConverter = function(UNIX_timestamp, lang){
  var a = new Date(UNIX_timestamp * 1000);
  if(lang=="ge"){
  	var months = ['იან','თებ','მარ','აპრ','მაი','ივნ','ივლ','აგვ','სექ','ოქტ','ნოე','დეკ'];
  }else if(lang=="ru"){
  	var months = ['იან','თებ','მარ','აპრ','მაი','ივნ','ივლ','აგვ','სექ','ოქტ','ნოე','დეკ'];
  }else{
  	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  }
  
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();

  var formattedTime = month + ' ' + date + ', ' + year;
  return formattedTime;
};
var v = 1;
var reloadProtect = function(input, cl){
	v=v+1;
	var ajaxFile = "/realodProtect"; 
	var src = Config.website+"/"+Config.mainLang+"/protect?v="+v;
	$(input).attr("disabled","disabled");
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { call: true }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Error.Code==1){
			alert("Error 1");
		}else if(obj.Success.Code==1){
			$(input).removeAttr("disabled");
			$(cl).attr("src", src);
		}else{
			alert("Error 2");
		}
	});
};

window.onbeforeprint = function() {
    console.log('This will be called before the user prints.');
};
window.onafterprint = function() {
    console.log('This will be called after the user prints');   
};

$(document).ready(function(){
	filesMobilize();
	leftNavYellowBoxChangeHeight(); 
	getAllStringInsideCurly();

	$('.collapsible').collapsible({
	  accordion : false
	});

	$('.collapsible .collapsible-header').on('click', function(event) {
	    var target = $(this);
	    setTimeout(function() {
	      if( target.length ) {
	        event.preventDefault();
	        $('html, body').animate({
	            scrollTop: target.offset().top
	        }, 500);
	      }
	    }, 300);
	});
});

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
