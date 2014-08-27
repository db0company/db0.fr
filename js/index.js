
function	getWhatToDisplay() {
    var todisplay = [];
    return todisplay;
}

$(document).ready(function() {
	var biggestHeight = 0;
	$(".messages .well").each(function(i, v) {
		if ($(this).height() > biggestHeight)
		    biggestHeight = $(this).height();
	    });
	$(".messages .well").css('minHeight', biggestHeight);
	$(".messages .well").hover(function() {
		$("#" + $(this).attr('id') + " p").show('slow');
	    }, function() {
		$("#" + $(this).attr('id') + " p").hide('slow');
	    });

	$("head").append('<script src="js/news.js"></script>');
	$("#default_news span").each(function() {
		getNews($(this).html(), true, function () {
			// $('#latest_news > .row-fluid').hide();;
			$('#latest_news > .row-fluid').each(function(idx, elt) {
				if (idx > 3)
				    $(this).hide();
			    });
			// 	$(this).attr('id', 'news_' + idx);			
		    },
			$("#default_news span").size(),
			'html_grid',
			function afterallnews() {
			});
	    });
});
