

$(document).ready(function() {
	console.log('ok');
	Galleria.loadTheme('js/galleria.classic.min.js');
	Galleria.run('#galleria-drawings', {
		picasa: 'useralbum:zero.fansub/drawings'
		    });
	Galleria.run('#galleria-photos', {
		picasa: 'useralbum:zero.fansub/photography'
		    });
	Galleria.run('#galleria-web', {
		picasa: 'useralbum:zero.fansub/design'
		    });
    });

