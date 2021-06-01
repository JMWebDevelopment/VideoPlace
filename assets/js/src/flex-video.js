jQuery( document ).ready( function() {
	// Adds Flex Video to YouTube and Vimeo Embeds
	jQuery( 'iframe[src*="youtube.com"], iframe[src*="vimeo.com"]' ).wrap( "<div class='flex-video'/>" );
} );
