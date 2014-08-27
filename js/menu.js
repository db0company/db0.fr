
$(document).ready(function() {
	$("#morelinks .button.more").click(function(event) {
		event.preventDefault();
		$("#quicklinks .morelinks").show('slow');
		$("#morelinks .button.more").hide('slow');
	    });
	if ($(".tabs ul").width() < (670)) {
	    $(".tabs .inactive span").hide();
	    $(".tabs .inactive").hover(function() {
		    $(".tabs #" + $(this).attr('id') + " span").show();
		}, function() {
		    $(".tabs #" + $(this).attr('id') + " span").hide();
		});
	}

    });

