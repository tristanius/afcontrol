$(document).foundation();

function setWidths(selector){
	var widths = [];
	$( selector+" tbody tr:first-child td" ).each(function(indice){
		widths[indice] = {w:$(this).outerWidth(), text: $(this).text() };
	});
	$( selector+" thead tr:first-child th ").each(function(indice){
		var cell = widths[indice];
		$(this).css( { "width": cell.w+"px" } );
	});
}

function setHeader(selector1){
	$(selector1+' tbody tr:first-child').clone().appendTo(selector1+' thead#thead2');
	$(selector1+' tbody').css({"top": "-"+$(selector1+' thead#thead2').height()+"px"});
	
	$(selector1).css({ "width": $(selector1+" tbody").outerWidth()+"px" });
	var widths = [];	
	$(selector1+' tbody tr:last-child td').each(function(indice){
		widths[indice] = {w:$(this).outerWidth(), text: $(this).text() };
		console.log(widths[indice]);
	});
	
	$( selector1+' thead#thead2 tr:first-child th').each(function(indice){
		var cell = widths[indice];
		$(this).css( { "width": cell.w+"px" } );
	});
}

$(document).ready(function(){
	setTimeout(setHeader("#LaTabla"), 2000);
});

