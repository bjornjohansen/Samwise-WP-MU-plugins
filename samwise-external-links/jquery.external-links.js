
(function($, undefined) {

	try {
		// Creating custom :external selector
		$.expr[':'].external = function(obj){
			return !obj.href.match(/^mailto\:/)
					&& (obj.hostname != location.hostname);
		};
	} catch(e) {}

	$(document).ready(function() {
	
		// Add 'external' CSS class to all external links and open them in new window
		try {
			$('a:external').addClass('external').prop('target', '_blank');
		} catch(e) {}

	});
})(jQuery);
