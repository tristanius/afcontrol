$(document).foundation()

function menuHeight(){
	var h = $("html").outerHeight()-$("nav").outerHeight();
	$("#menu").css({"min-height":  h+"px"});
}

function toggleMenu(){
	$('#menu').toggleClass('nodisplay');
	$('#panel').toggleClass('large-10');
}

$(document).ready(function(){
	//menuHeight();
	$('nav #toggleMenu').on('click', function(){
		toggleMenu();
	});
});