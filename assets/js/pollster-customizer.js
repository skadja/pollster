(function($) {

	var $tplPath = '';
	if ( typeof js_vars.tplDir !== 'undefined' && js_vars.tplDir != null) {
	    $tplPath =  js_vars.tplDir;
	}

	// reset vote count - from  customizer admin
	wp.customize.control( 'poll_reset_control', function( control ) {
    	control.container.find( '#_customize-input-poll_reset_control' ).on( 'click', function() {

			var r = confirm('This will remove all poll data and reset votes count to zero.');
			if (r == true) {

				var $timestmap = new Date().getTime();
				$.get($tplPath + '/assets/php/clear-poll.php?' + $timestmap, function(data) {
					//console.log(data);
				}).fail(function() {
					alert('An error occured. Please try agan later.')
				});

			}

    	});
	});

})(jQuery);
