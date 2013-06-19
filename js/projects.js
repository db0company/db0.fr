
$(document).ready(function() {
	var biggestHeight = 0;
	$("#messages .well").each(function(i, v) {
		if ($(this).height() > biggestHeight)
		    biggestHeight = $(this).height();
	    });
	$("#messages .well").css('minHeight', biggestHeight);
	$("#messages .well").hover(function() {
		$("#" + $(this).attr('id') + " p").show('slow');
	    }, function() {
		$("#" + $(this).attr('id') + " p").hide('slow');
	    });
});
