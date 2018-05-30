<?php
#-----------------------------------------------------------------#
#------------------ FOTOPRESS : CUSTOM STYLES --------------------#
#-----------------------------------------------------------------#

//Get required theme custom values
$image_dirpath    = get_template_directory_uri() . '/images/'; 
$header_image     = get_header_image();
$header_image     = !empty($header_image) ? $header_image : '';
$color_scheme     = esc_attr(get_theme_mod( 'color_scheme', '#156e8e'));
?>
<!-- Fotopress Customizer Options// -->
<style type="text/css">

::selection{
	background: <?php echo $color_scheme; ?>;
	color: #fff;
	text-shadow: none;
}
::-moz-selection {
	background: <?php echo $color_scheme; ?>;
	color: #fff;
	text-shadow: none;
}

/*Global css*/
a,a:active,a:focus,a:hover,#respond form .form-submit input[type="submit"],a.comment-reply-link{color:<?php echo $color_scheme; ?>;}
.services .icon i,
#home-content .content .page-title,
.services .section-title,
#design .design-desc h2,
.home .section-title,
.projects a.project-title:hover,
.services .service-item:hover > h5 a,
.projects .project-item article figure:hover > .project-title a,
.projects .project-item:hover > article figure figcaption p a,
.dots,
.page-title,
#sidebar h3.widget-title,
.post-notfound .notfound-title,
#content .post .post-meta span i{
	color:<?php echo $color_scheme; ?>;
}


<?php if(!empty($header_image)){ ?>
	#header .header-banner, #header .global-banner{background-image:url('<?php echo esc_url( $header_image ); ?>')}
<?php } ?>


#header .header-topbar,
.section-title::after,
.btn,
.services h5::after,
.project-item .project-title::after,
#sidebar h3.widget-title::before{
	background-color:<?php echo $color_scheme; ?>;
}

button,
html input[type="button"],
#searchform input[type="submit"],
input[type="reset"],
input[type="submit"],
a.comment-reply-link,
a.comment-edit-link,
.main-navigation .mobmenu-toggle,
.error404 #content #searchform input[type="submit"] {
	border:1px solid <?php echo $color_scheme; ?>;
	color:<?php echo $color_scheme; ?>;
}

.main-navigation ul ul{
	border-top:2px solid <?php echo $color_scheme; ?>;
}

.page-inner-wrap{border-left:5px solid <?php echo $color_scheme; ?>;}
.btn{border-color:<?php echo $color_scheme; ?>}
.btn:hover,
button:hover,
#content .post-read-more a:hover,
a.comment-reply-link:hover,
a.comment-edit-link:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
.search-wrapper .submitbutton:hover,
.services .service-item:hover > a .ficon,
.comment-edit-link,
.reply a,
input[type="submit"],
#content .post-read-more a,
.widget_tag_cloud a,
input[type="submit"]:hover{background-color:<?php echo $color_scheme; ?>!important;color:#fff !important;}

/*color scheme*/
.main-navigation li:hover > a,
.main-navigation .current_page_item > a,
.main-navigation .current_page_ancestor > a,
.main-navigation .current-menu-item > a,
.main-navigation .current-menu-ancestor > a,
#logo #site-title a,
#follow-icons li a,
h1.entry-title span,
.services .ficon,
#content .sticky-post, 
#footer a:hover,
#sidebar .widget ul li a:hover{
	color:<?php echo $color_scheme; ?>;
}
#follow-icons li a:hover,{background-color:<?php echo $color_scheme; ?>;color:#fff;border:1px solid <?php echo $color_scheme; ?>;}

/*Search From Submit*/
#searchform input[type="submit"]{color:<?php echo $color_scheme; ?>;}
</style>