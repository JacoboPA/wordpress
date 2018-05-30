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