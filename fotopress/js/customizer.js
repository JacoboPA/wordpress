/**
 * Live-update changed settings in real time in the Customizer preview.
 */
( function( $ ) {
	var style = $( '#fotopress-color-scheme-css' ), api = wp.customize;

	// Site title.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site tagline.
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Add custom-header-image #header class when header image is added.
	api( 'header_image', function( value ) {
		value.bind( function( to ) {
			$( '#header' ).toggleClass( 'custom-header-image', '' !== to );
		} );
	} );
	
	// Featured Page icons
	api('featured_page_icon1', function( value ) {
		value.bind( function( to ) {
			$('.featured-post1 i').removeClass().addClass(''+to);
		} );
	} );
	api('featured_page_icon2', function( value ) {
		value.bind( function( to ) {
			$('.featured-post2 i').removeClass().addClass(''+to);
		} );
	} );
	api('featured_page_icon3', function( value ) {
		value.bind( function( to ) {
			$('.featured-post3 i').removeClass().addClass(''+to);
		} );
	} );

})( jQuery );