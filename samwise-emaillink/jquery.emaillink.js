/*
 * emailLink - jQuery Plugin
 * Email address cloaking
 * 
 * Copyright (c) 2009 - 2012 Bjørn Johansen. All rights reserved.
 * 
 * Version: 1.4
 * Requires: jQuery v1.3+
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
( function( $ ) {
    $.fn.emailLink = function( options )
    {
		var settings = {
			'domainDelimeter' : ' / ',
			'dotDelimeter' : ', ',
			'textSrc'  : 'title'
		};
		
		var hostname = document.location.hostname.replace( /^www\./, '' );
		
        return this.each( function()
        {
			if ( options ) { 
				$.extend( settings, options );
			}
		
            var addr, em, $link;
			try {
				em = $( this ).text().split( settings.domainDelimeter );
				addr = (em.length == 2) ? em[0] + '@' + em[1] : em[0] + '@' + hostname;
				
				addr = addr.replace( new RegExp( settings.dotDelimeter, 'g' ), '.' );
				
				$link = $( document.createElement( 'a' ) );
				
				$link.prop( 'href', 'mailto:' + addr );
				if ( $( this ).prop( settings.textSrc ) ) {
					$link.text( $( this ).prop( settings.textSrc ) );
				} else {
					$link.text( addr );
				}
				$link.addClass( 'e-mail' );
				
				$( this ).replaceWith( $link );
				
			} catch ( e ){};
        });
    };
} )( jQuery );


