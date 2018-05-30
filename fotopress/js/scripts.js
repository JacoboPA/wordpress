/*---------------------------------------------------------------*/
/*--------- FOTOPRESS : REQUIRED CUSTOM JQUERY SCRIPTS ------------*/
/*---------------------------------------------------------------*/

// SITE MENU + MOBILE  MENU SCRIPT
//---------------------------------------------------------------
(function( jQuery ) {
	jQuery.fn.fotopressMobMenu = function( options ) { 
		var defaults = {
			'activewidth': 1024
		};
		//call in the default otions
		var options = jQuery.extend(defaults, options);
		var obj     = jQuery(this);
		var mobactive = true;
		
		return this.each(function() {
			if(jQuery(window).width() <= options.activewidth) {
				cmsMobRes();
			}else{
				cmsDeskRes();
			}
			
			jQuery(window).resize(function() {
				if(jQuery(window).width() <= options.activewidth) {
					if(mobactive){
						cmsMobRes();
					}
				}else{
					cmsDeskRes();
				}
			});
			function cmsMobRes() {
				mobactive = false;
				jQuery('#main-nav').superfish('destroy');
				obj.addClass('mobile-menu-active').hide();
				obj.parent().css('position','relative');
				if(obj.prev('.mobmenu-toggle').length === 0) {
					obj.before('<div class="fa fa-bars mobmenu-toggle" id="mobmenu-toggle"></div>');
				}
				obj.parent().find('.mobmenu-toggle').removeClass('active');
			}
			function cmsDeskRes() {
				mobactive = true;
				jQuery('#main-nav').superfish('init');
				obj.removeClass('mobile-menu-active').show();
				if(obj.prev('.mobmenu-toggle').length) {
					obj.prev('.mobmenu-toggle').remove();
				}
			}
			obj.parent().on('click','.mobmenu-toggle',function() {
				if(!jQuery(this).hasClass('active')){
					jQuery(this).addClass('active');
					jQuery(this).next('ul').stop(true,true).fadeIn(300);
				}
				else{
					jQuery(this).removeClass('active');
					jQuery(this).next('ul').stop(true,true).fadeOut(300);
				}
			});
		});
	};
})( jQuery );

// MOBILE NAVIGATION ACTIVATION FUNCTION
jQuery('document').ready(function(){
	jQuery('#main-nav').fotopressMobMenu({'activewidth':fotopress_object.activewidth});
});

jQuery(document).ready(function($) {
    "use strict";

    //FontAwesome Icon Dropdown
    jQuery('body').on('click', '.icon-list li', function(){
        var icon_class = jQuery(this).find('i').attr('class');
        jQuery(this).addClass('icon-active').siblings().removeClass('icon-active');
        jQuery(this).parent('.icon-list').prev('.selected-icon').children('i').attr('class','').addClass(icon_class);
        jQuery(this).parent('.icon-list').next('input').val(icon_class).trigger('change');
    });

   jQuery('body').on('click', '.selected-icon', function(){
        jQuery(this).next().slideToggle();
    });

});