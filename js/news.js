
function	getCheckedString() {
    var checked = '';
    $(".feed .checker img").each(function() {
	    if ($(this).attr('alt') == 'check')
		checked += $(this).parent().parent().attr('id') + ',';
	});
    return checked;
}

function	getCheckedArray() {
    var checked = [];
    $(".feed .checker img").each(function() {
	    if ($(this).attr('alt') == 'check')
		checked.push($(this).parent().parent().attr('id'));
	});
    return checked;
}

function	getUncheckedArray() {
    var unchecked = [];
    $(".feed .checker img").each(function() {
	    if ($(this).attr('alt') == 'uncheck')
		unchecked.push($(this).parent().parent().attr('id'));
	});
    return unchecked;
}

function	getUncheckedString() {
    var unchecked = '';
    $(".feed .checker img").each(function() {
	    if ($(this).attr('alt') == 'uncheck')
		unchecked += $(this).parent().parent().attr('id') + ',';
	});
    return unchecked;
}

function	domToObj(a) {
    return $('<div/>').html(a).contents();
}

var tester = 0;

function	getNews(feed, useloader, callback, total, format, afterallnews) {
    if (typeof(useloader) == 'undefined') { useloader = true; }
    if (typeof(format) == 'undefined') { format = 'html'; }

    if (useloader)
	$("#loading").show();
    jQuery.get('rss',
	       { feed: feed,
		 type: format },
	       function(data) {
		   $("#latest_news").append(data);
		   if (typeof(callback) != 'undefined')
		       callback();
		   $('.feed_item .timestamp').sortElements(function(a, b) {
			   return $(a).text() < $(b).text() ? 1 : -1;

		       }, function() {
			   return this.parentNode.parentNode.parentNode;
		       });
		   if (typeof(total) != 'undefined') {
		       tester++;
		       if (tester == total && useloader) {
			   $("#refresher").show();
			   $("#loading").hide();
			   tester = 0;
			   if (typeof(afterallnews) != 'undefined')			   
			       afterallnews();
		       }
		   } else {
		       if (useloader)
			   $("#loading").hide();
		   }
		   displayNewsDetails();
	       },
	       'html');
}

function	displayNewsDetails() {
    $(".feed_item .toggler").show('fast');
    $(".feed_item .toggler").unbind('click');
    $(".feed_item .toggler").click(function(event) {
	    event.preventDefault();
	    $(this).next().slideToggle("fast");
	});
}

function	setCheckers() {
    $(".feed .checker img").click(function(event) {
	    event.preventDefault();
	    if ($(this).attr('alt') == 'check') {
		$(this).attr('src', 'http://icons.db0.fr/g/unchecked.png');
		$(this).attr('alt', 'uncheck');
		$("." + $(this).parent().attr('id')).hide('slow');
	    }
	    else {
		$(this).attr('src', 'http://icons.db0.fr/g/check.png');
		$(this).attr('alt', 'check');
		$("." + $(this).parent().attr('id')).show('slow');
	    }
	    $("#rss_link").attr('href', 'http://rss.db0.fr/?feed='
				+ getCheckedString());
	    
	});
}

function	getUnchekedNews() {
    getNews(getUncheckedString(), false, function() {
	    $.each(getUncheckedArray(), function(_, a) {
		    $("#latest_news ." + a).hide();
		});
	});
}

function	getCheckedNews() {
    var toCheck = getCheckedArray();
    var total = 0; // no idea why .lenght is not working
    $("#refresher").hide();
    $.each(toCheck, function(i) { total++; });
    $.each(toCheck, function(_, n) {
	    getNews(n, true, undefined, total);
	});
}


$(document).ready(function() {
	getCheckedNews();
	getUnchekedNews();
	setCheckers();
	$("#refresher").click(function(event) {
		event.preventDefault();
		$("#latest_news .feed_item").remove();
		getCheckedNews();
		getUnchekedNews();
	    });
    });

jQuery.fn.sortElements = (function(){
 
	var sort = [].sort;
 
	return function(comparator, getSortable) {
 
	    getSortable = getSortable || function(){return this;};
 
	    var placements = this.map(function(){
 
		    var sortElement = getSortable.call(this),
		    parentNode = sortElement.parentNode,
 
		    // Since the element itself will change position, we have
		    // to have some way of storing its original position in
		    // the DOM. The easiest way is to have a 'flag' node:
		    nextSibling = parentNode.insertBefore(
							  document.createTextNode(''),
                    sortElement.nextSibling
							  );
 
		    return function() {
 
			if (parentNode === this) {
			    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
					    );
			}
 
			// Insert before flag:
			parentNode.insertBefore(this, nextSibling);
			// Remove flag:
			parentNode.removeChild(nextSibling);
 
		    };
 
		});
 
	    return sort.call(this, comparator).each(function(i){
		    placements[i].call(getSortable.call(this));
		});
 
	};
 
    })();

