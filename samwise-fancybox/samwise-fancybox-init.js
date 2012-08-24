( function( $, undefined ) {

	$( document ).ready( function() {

		// fancybox on galleries
		try {
			$( '.gallery' ).each( function() {
				var links = $( this ).find( 'a' );
				links.attr( 'rel', $( this ).attr( 'id' ) );
				links.fancybox( { titlePosition : 'inside' } );
				links.addClass( 'lightbox' );
			});
		} catch(e) {}
		
		// fancybox on links to images (not already fancybox'ed)
		try {
			$( 'a:not([class~="lightbox"])' ).each( function() {
				if ( $( this ).prop( 'href' ) != undefined ) {
					if ( $( this ).prop( 'href' ).match( new RegExp(/\.(jpg|jpeg|png|gif)$/i) ) ) {
						if ( ! $( this ).prop( 'rel' ).length ) {
							$( this ).prop( 'rel', 'fancybox' );
						}
						if ( $( this ).siblings( '.wp-caption-text' ).length ) {
							$( this ).prop( 'title', $( this ).siblings( '.wp-caption-text' ).first().text() );
						} else {
							var $img = $( this ).find( 'img' ).first();
							$( this ).prop( 'title', ( $img.prop( 'title' ).length ) ? $img.prop( 'title' ) : $img.prop( 'alt' ) );
						}
						$(this).fancybox( { 'titlePosition' : 'inside' } );
						$(this).addClass( 'lightbox' );
					}
				}
			} );
		} catch( e ) {}
	} );
} )( jQuery );