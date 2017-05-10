$(document).foundation();

function setHeader(selector1){
	$(selector1+' tbody tr:last-child').clone().appendTo(selector1+' thead#thead2');
	
	$(selector1).css({ "width": $(selector1+" tbody").outerWidth()+"px" });
	var widths = [];
	$(selector1+' tbody tr:first-child td').each(function(indice){
		widths[indice] = {w:$(this).outerWidth(), text: $(this).text() };
		console.log(widths[indice]);
	});
	
	$( selector1+' thead#thead2 tr:last-child th').each(function(indice){
		var cell = widths[indice];
		$(this).css( { "width": cell.w+"px" } );
	});
}

$(document).ready(function(){
	setTimeout(setHeader("#LaTabla"), 2000);
});

