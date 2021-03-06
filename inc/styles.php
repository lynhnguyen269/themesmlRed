<?php
/**
 * @package redbiz
 */
//Output all custom styles for this theme

function themesflat_custom_styles( $custom ) {
	$custom = '';
	$logo_position = themesflat_decode(themesflat_choose_opt('logo_controls'));
	themesflat_render_box_position(".logo",$logo_position);

	$style = "padding-left: {$logo_position['padding-left']}px";

	$logo_width = themesflat_choose_opt('logo_width');
	// Logo Height
	if ( $logo_width !='' ) {
		$custom .= ".logo img { width:" . $logo_width . "px; }"."\n";
	}

	$logo_height = themesflat_choose_opt('logo_height');
	// Logo Height
	if ( $logo_height !='' ) {
		$custom .= ".logo img { height:" . $logo_height . "px; }"."\n";
	}

    $footer_controls = themesflat_decode(themesflat_choose_opt('footer_controls'));
    themesflat_render_box_position(".footer",$footer_controls);

	$page_title_controls = themesflat_decode(themesflat_choose_opt('page_title_controls'));
    themesflat_render_box_position(".page-title",$page_title_controls);

    //  Page Title Opacity
	$page_title_overlay_color = themesflat_choose_opt( 'page_title_overlay_color');
	if ( $page_title_overlay_color !='' ) {
		$custom .= ".page-title .overlay { background:" . esc_attr($page_title_overlay_color) . ";}"."\n";
	}

    $page_title_img = themesflat_choose_opt('page_title_background_image');
    $custom .= '.page-title {background: url('.$page_title_img.') center /cover no-repeat;}';    
	$custom .= ".page-title h1 {color:" .themesflat_choose_opt('page_title_text_color')."!important;
	}"."\n";

	$custom .= ".breadcrumbs span,.breadcrumbs span a, .breadcrumbs a {color:" .themesflat_choose_opt('page_title_link_color').";
		}"."\n"; 

	$font = themesflat_get_json('body_font_name');

	$font_style = themesflat_font_style($font['style']);

	$body_fonts = $font['family'];

	$body_line_height = $font['line_height'];

	$body_font_weight = $font_style[0];

	$body_font_style = $font_style[1];

	$body_size = $font['size'];		

	$headings_fonts_ = themesflat_get_json('headings_font_name');

	$headings_fonts_family = $headings_fonts_['family'];	

	$headings_style = themesflat_font_style( $headings_fonts_['style'] );

	$headings_font_weight = $headings_style[0];

	$headings_font_style = $headings_style[1];

	$menu_fonts_ = themesflat_get_json('menu_font_name');

	$menu_fonts_family = $menu_fonts_['family'];

	$menu_fonts_size = $menu_fonts_['size'];

	$menu_line_height = $menu_fonts_['line_height'];

	$menu_style = themesflat_font_style( $menu_fonts_['style'] );

	$menu_font_weight = $menu_style[0];

	$menu_font_style = $menu_style[1];	

	// Body font family
	if ( $body_fonts !='' ) {
		$custom .= "body,button,input,select,textarea { font-family:" . $body_fonts . ";}"."\n";
	}

	// Body font weight
	if ( $body_font_weight !='' ) {
		$custom .= "body,button,input,select,textarea { font-weight:" . $body_font_weight . ";}"."\n";
	}

	// Body font style
	if ( isset( $body_font_style ) ) {
        $custom .= "body,button,input,select,textarea { font-style:" . $body_font_style . "; }"."\n";        
	}

    // Body font size
    if ( $body_size !=''  ) {
        $custom .= "body,button,input,select,textarea { font-size:" . intval( $body_size ) . "px; }"."\n";    
    }

    // Body line height
    if ( $body_line_height != '' ) {
        $custom .= "body,button,input,select,textarea { line-height:" . intval( $body_line_height ) . "px ; }"."\n";    
    }

	// Headings font family
	if ( $headings_fonts_family !='' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { font-family:" . $headings_fonts_family . ";}"."\n";

	}

	//Headings font weight
	if ( $headings_font_weight !='' ) {
		$custom .= "h1,h2,h3,h4,h5,h6 { font-weight:" . $headings_font_weight . ";}"."\n";
	}

	// Headings font style
	if ( isset( $headings_font_style )) {
        $custom .= "h1,h2,h3,h4,h5,h6  { font-style:" . $headings_font_style . "; }"."\n";
	}

	// Menu font family
	if ( $menu_fonts_family != '') {
		$custom .= "#mainnav > ul > li > a, #mainnav ul.sub-menu > li > a { font-family:" . $menu_fonts_family . ";}"."\n";
	}

	// Menu font weight
	if ( $menu_font_weight != '' ) {
		$custom .= "#mainnav > ul > li > a, #mainnav ul.sub-menu > li > a { font-weight:" . $menu_font_weight . ";}"."\n";
	}

	// Menu font style
	if ( isset( $menu_font_style )) {
        $custom .= "#mainnav > ul > li > a, #mainnav ul.sub-menu > li > a  { font-style:" . $menu_font_style . "; }"."\n";   
	}

    // Menu font size
    if ( $menu_fonts_size != '' ) {
        $custom .= "#mainnav ul li a, #mainnav ul.sub-menu > li > a { font-size:" . intval($menu_fonts_size) . "px;}"."\n";
    }

    // Menu line height
    if ( $menu_line_height != '' ) {
        $custom .= "#mainnav > ul > li > a, #header .show-search a, #header .wrap-cart-count, .button-menu { line-height:" . intval($menu_line_height) . "px;}"."\n";
    }  

	// H1 font size
	if ( $h1_size = themesflat_get_opt( 'h1_size' ) ) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}

    // H2 font size
    if ( $h2_size = themesflat_get_opt( 'h2_size' ) ) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }

    // H3 font size
    if ( $h3_size = themesflat_get_opt( 'h3_size' ) ) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }

    // H4 font size
    if ( $h4_size = themesflat_get_opt( 'h4_size' ) ) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }

    // H5 font size
    if ( $h5_size = themesflat_get_opt( 'h5_size' ) ) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }

    // H6 font size
    if ( $h6_size = themesflat_get_opt( 'h6_size' ) ) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }   

    // Body color
	$body_text = themesflat_get_opt( 'body_text_color' );

	if ($body_text !='') {
		$custom .= "#Financial_Occult text,#F__x26__O tspan { fill:" . esc_attr( $body_text ) . ";}"."\n";
		$custom .= "body { color:" . esc_attr($body_text) . "}"."\n";

		$custom .= "a,.themesflat-portfolio .item .category-post a:hover,.title-section .title,ul.iconlist .list-title a,h1, h2, h3, h4, h5, h6,.testimonial-content .author-info,.themesflat_counter.style2 .themesflat_counter-content-bottom,.themesflat_counter.style2 .themesflat_counter-content-top, .widget_search .search-form input[type=search],.entry-meta ul,.entry-meta ul.meta-right,.entry-footer strong, .themesflat_button_container .themesflat-button.no-background, article .entry-meta ul li { color:" . esc_attr($body_text) . "}"."\n";

		//border bodycolor
		$custom .= ".widget .widget-title:after, .widget .widget-title:before,ul.iconlist li.circle:before { background-color:" . esc_attr($body_text) . "}"."\n";
	}

	// background bodycolor
	$custom .= ".page-links > span { border-color:" . esc_attr($body_text) . "}"."\n";

    if ( themesflat_choose_opt ('top_background_color') !='' ) {
		$custom .= ".themesflat-top { background-color:" . esc_attr(themesflat_choose_opt ('top_background_color')) ." ; } "."\n";
    }

    // background bodycolor
    if ( themesflat_choose_opt ('body_background_color') !='' ) {
		$custom .= "body, .page-wrap, .boxed .themesflat-boxed { background-color:" . esc_attr(themesflat_choose_opt ('body_background_color')) ." ; } "."\n";
    }	

    //Top text color
    $top_text_color = themesflat_choose_opt( 'topbar_textcolor' );
    if ( themesflat_choose_opt( 'topbar_textcolor' ) !='' ) {
	    $border_topbar_color = themesflat_hex2rgba($top_text_color,0.2);
    	$custom .= ".themesflat-top .border-left:before, .themesflat-widget-languages:before, .themesflat-top .border-right:after, .themesflat-top .show-search a:before, .flat-language > ul > li.current:before { background-color: ".esc_attr($border_topbar_color).";}";

		$custom .= ".themesflat-top,.info-top-right, .themesflat-top, .themesflat-top .themesflat-socials li a, .themesflat-top, .info-top-right, .themesflat-top .themesflat-socials li a, .flat-language .current > a, .themesflat-top a, .themesflat-top ul.themesflat-socials li a  { color:" . esc_attr( themesflat_choose_opt( 'topbar_textcolor' ) ) ." ;} "."\n";
    }	  

    // Menu Background
	$mainnav_backgroundcolor = themesflat_choose_opt( 'mainnav_backgroundcolor');
	if ( $mainnav_backgroundcolor !='' ) {		
		$custom .= ".header.widget-header .nav { background-color:" . esc_attr( $mainnav_backgroundcolor ) . ";}"."\n";
	} 

	// Menu mainnav a color
	$mainnav_color = themesflat_choose_opt( 'mainnav_color');
	if ( $mainnav_color !='' ) {
		$custom .= "#mainnav > ul > li > a, #header .show-search a i, .show-search.active .fa-search:before, #header .wrap-cart-count a { color:" . esc_attr( $mainnav_color ) . ";}"."\n";
		$custom .= " { background:" . esc_attr( $mainnav_color ) . ";}"."\n";
	}

	// mainnav_hover_background
	$mainnav_hover_background = themesflat_choose_opt( 'mainnav_hover_background');
	if ( $mainnav_hover_background != '' ) {
		$custom .= "#mainnav > ul > li:hover, #mainnav > ul > li.current-menu-item, #mainnav > ul > li.current-menu-ancestor { background:" . esc_attr( $mainnav_hover_background ) . "}"."\n";
	}

	// mainnav_hover_color
	$mainnav_hover_color = themesflat_choose_opt( 'mainnav_hover_color');

	if ( $mainnav_hover_color !='' ) {
		$custom .= "#mainnav > ul > li > a:hover,#mainnav > ul > li.current-menu-item > a, #mainnav > ul > li.current-menu-ancestor > a { color:" . esc_attr( $mainnav_hover_color ) . " !important;}"."\n";
	}

	//Subnav a color
	$sub_nav_color = themesflat_choose_opt( 'sub_nav_color');
	if ( $sub_nav_color !='' ) {
		$custom .= "#mainnav ul.sub-menu > li > a { color:" . esc_attr( $sub_nav_color ) . ";}"."\n";
	}

	//Subnav background color
	$sub_nav_background = themesflat_choose_opt( 'sub_nav_background');
	if ( $sub_nav_background !='' ) {
		$custom .= "#mainnav ul.sub-menu { background-color:" . esc_attr( $sub_nav_background ) . ";}"."\n";
		$custom .= "#mainnav ul.sub-menu > li > a:hover, #mainnav ul.sub-menu > li.current-menu-item > a { background-color:" . esc_attr($sub_nav_background) . "!important;}"."\n";			
	}

	//sub_nav_background_hover
	$sub_nav_background_hover = themesflat_choose_opt( 'sub_nav_background_hover');
	if ( $sub_nav_background_hover !='' ) {
		$custom .= "#mainnav ul.sub-menu > li > a:hover, #mainnav ul.sub-menu > li.current-menu-item > a { color:" . esc_attr( $sub_nav_background_hover ) . ";}"."\n";
	}

	//border color sub nav
	$border_color_sub_nav = themesflat_choose_opt( 'border_color_sub_nav');
	if ( $border_color_sub_nav !='' ) {
		$custom .= "#mainnav ul.sub-menu > li { border-color:" . esc_attr($border_color_sub_nav) . "!important;}"."\n";
	}	

	// Footer simple background color
	global $themesflat_mainID;
	$footer_background_image = themesflat_choose_opt( 'footer_background_image');
	if ( $footer_background_image !='' ) {
		$custom .= ".footer_background { background:url(" . esc_attr($footer_background_image) . ") no-repeat center/cover;}"."\n";
	}

	$footer_background_color = themesflat_choose_opt( 'footer_background_color');
	if ( $footer_background_color !='' ) {
		$custom .= ".footer { background-color:" . esc_attr($footer_background_color) . ";}"."\n";
	}

	// Footer simple text color
	$footer_text_color = themesflat_choose_opt( 'footer_text_color');
	if ( $footer_text_color !='' ) {
		$custom .= ".footer a, .footer, .themesflat-before-footer .custom-info > div,.footer-widgets ul li a,.footer-widgets .company-description p, .widget_nav_menu ul li a:before, .footer-widgets .widget.widget_tag_cloud .tagcloud a, .footer-widgets .widget.widget-recent-news .recent-news.style2 li .text .date, .footer-widgets .widget.widget-recent-news .recent-news.style2 li .text h4 a, .footer-widgets .widget .widget-title, .footer .widget.widget_archive > ul > li a, .footer .widget.widget_categories > ul > li a, .footer caption { color:" . esc_attr($footer_text_color) . ";}"."\n";
	}

	// Footer simple text color
	$footer_background_color_blocks = themesflat_choose_opt( 'footer_background_color_blocks');
	if ( $footer_background_color_blocks !='' ) {
		$custom .= ".footer-widgets .widget.widget_tag_cloud .tagcloud a, .footer .themesflat-shortcode-socials li a { background:" . esc_attr($footer_background_color_blocks) . ";}"."\n";
	}



	// bottom__background_color
	$bottom__background_color = themesflat_choose_opt( 'bottom__background_color');
	if ( $bottom__background_color !='' ) {
		$custom .= ".bottom { background-color:" . esc_attr( $bottom__background_color ) . ";}"."\n";
	}

	// Bottom text color
	$bottom_text_color = themesflat_choose_opt( 'bottom_text_color');

	if ( $bottom_text_color !='' ) {
		$custom .= ".bottom .copyright p, .bottom .copyright a:hover, .bottom #menu-bottom li a { color:" . esc_attr( $bottom_text_color ) . ";}"."\n";
	}
	$custom .='.white #Financial_Occult text,.white #F__x26__O tspan {
			fill: #fff; }';

	$custom .= 'test_filter_render';

	// Hover Body Color
    $scheme_color = themesflat_choose_opt( 'scheme_color' );
     if ( $scheme_color !='' ) {
     	$custom .= "a:hover, a:focus, .widget ul li a:hover, .footer-widgets ul li a:hover, .footer a:hover, .themesflat-portfolio .portfolio-container.grid2 .title-post a:hover, .breadcrumbs span a:hover, .breadcrumbs a:hover, .sidebar ul li a:hover, article .entry-meta ul li a:hover, .breadcrumbs span a:hover, .breadcrumbs a:hover, .themesflat_imagebox.style1 .imagebox-content .imagebox-desc a:hover, .themesflat_imagebox.style2 .imagebox-content .imagebox-desc a:hover, .themesflat_imagebox.style3 .imagebox-content .imagebox-desc a:hover, .title-section .title-content a:hover, .themesflat-portfolio .item .link a:hover, .themesflat-portfolio .grid2 .item .category-post-2 a:hover, article .entry-title a:hover, article .content-post .themesflat-button:hover, .themesflat-portfolio .grid4 .portfolio-details a:hover, .themesflat-portfolio .item .category-post-1 a:hover, .themesflat-portfolio .item .category-post-2 a:hover, .themesflat-top ul.themesflat-socials li a:hover, .themesflat-portfolio .grid-no-padding2 .item .title-post a:hover, .themesflat-portfolio .grid4 .category-post-1 a:hover,.themesflat-portfolio .item .title-post a:hover, .show-search a:hover, .show-search a i:hover, .show-search.active .fa-search:hover:before, .themesflat_client_slider .owl-theme .owl-controls .owl-nav div.owl-prev:before, .themesflat_client_slider .owl-theme .owl-controls .owl-nav div.owl-next:before, .section-video .themesflat-video-fancybox .icon-play:hover i, .themesflat_counter .counter-content-top .counter-surfix, .themesflat_counter .counter-content-top .counter-prefix, .blog-shortcode.blog-grid article .entry-meta.meta-below .post-date a, .portfolio-single .content-portfolio-detail .project-single-text ul li:before, .blog-shortcode.blog-grid-image-left article .entry-meta.meta-below .post-date a, .themesflat_imagebox.style1 .themesflat-button:hover, .themesflat_imagebox.style1 .themesflat-button i, .themesflat-portfolio.masonry .item .title-post a:hover, .themesflat-portfolio.masonry .item .wrap-border .portfolio-details-content .category-post-1 a:hover, .themesflat-portfolio.masonry .item .wrap-border .portfolio-details-content .themesflat-button:hover, .portfolio-container.grid .item .title-post a:hover, .portfolio-container.grid .item .portfolio-details-content .date a, .breadcrumb-trail.breadcrumbs,.widget.widget-recent-news .recent-news.style2 li .text h4 a:hover, .themesflat-portfolio .list-small .item .title-post a:hover, .themesflat-portfolio .list-small .item .portfolio-details-content .themesflat-button:hover, .themesflat-services-shortcodes .services-details-content .services-title a:hover, .themesflat-services-shortcodes .services-details-content .date a, .themesflat-team .themesflat-button:hover, .themesflat_counter.style3 .counter-content-bottom .counter-link:hover, #header .show-search a:hover i, #header .wrap-cart-count a:hover, .themesflat-top a:hover, .themesflat-top ul.flat-information > li i, .footer-widgets .widget.widget_recent_entries ul li > .post-date:before, .bottom .copyright a, .testimonial-content .fa, .testimonial-sliders .testimonial-logo, .wrap-header-content > ul > li .border-icon i, .themesflat_price .price-header .price-subprice, .themesflat-top .content-left ul > li i, .sidebar .widget.widget_categories > ul > li:hover a, .sidebar .widget.widget_categories > ul > li:hover:after, .sidebar .widget.widget_categories > ul > li:hover, .sidebar .widget.widget_product_categories > ul > li:hover a, .sidebar .widget.widget_product_categories > ul > li:hover:after, .sidebar .widget.widget_product_categories > ul > li:hover, .countdown .square .numb, .comments-area ol.comment-list article .comment_content .comement_reply a:hover, #cancel-comment-reply-link:hover, .single article .entry-meta .dot, .blog-single .entry-footer .themesflat-socials li a:hover, .entry-content a:hover, .footer-widgets .widget.widget_nav_menu ul li a:hover, .footer-widgets .widget.widget_nav_menu ul li a:hover:before, a:hover, a:focus, .testimonial-sliders.sidebar .author-name a:hover,  .breadcrumbs span.trail-browse, .blog-post .entry-meta ul li:before, .blog-shortcode article .entry-meta ul li:before, .price_slider_amount .price_label, .widget.widget-recent-news li .text .date,.comments-area ol.comment-list article .comment_content .comment_meta .comment_time, .single article .entry-meta a:hover, ul.infomation-project.left_content li:before, .primary-list li:before, .download-file-button a:before, .vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading a i, .vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a i, .themesflat-contact-us .contact-list li:before, .title-section .top-title, .themesflat_imagebox.style1 .imagebox-header .imagebox-subtitle, .wpb-js-composer .accordion.style2.vc_tta-color-grey .vc_tta-panel .vc_tta-panel-body ul li:before, .wpb-js-composer .accordion.style2.vc_tta.vc_general .vc_active .vc_tta-panel-title > a:before, .themesflat_price .themesflat-button:hover, .themesflat_price.style2 .price-content ul li:before, .themesflat_iconbox .iconbox-content .themesflat-button:hover, .themesflat_iconbox .title a:hover, .themesflat-team .team-name a:hover, .themesflat-team .team-position, .themesflat-team .social-links a:hover i, .about-text-box ul li:before, .themesflat_imagebox.style3 .themesflat-button, .countdown .timer, .address-list li:before, .blog-grid article .content-post .post-categories a, .blog-list-full-width article .content-post .post-categories a, .blog-shortcode.blog-grid-style2 article .content-post h2:before, .blog-shortcode.blog-grid-style2 article .entry-content .entry-meta .themesflat-button-container .themesflat-button, .wpb-js-composer .vc_tta.vc_general .vc_tta-icon, .sidebar .widget.widget_archive > ul > li, .blog-shortcode.blog-grid-style2 article .entry-content .entry-meta .themesflat-button-container .themesflat-button:before, .wpb-js-composer .accordion.style1.vc_tta.vc_general .vc_active .vc_tta-panel-title > a:before, .countdown .square .text, .construction-icons i, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.flat-tab .vc_tta-tab > a, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a span, .sidebar .widget.widget_themesflat_socials li a:hover, .navigation.posts-navigation .nav-links li a .meta-nav, ul.infomation-project li a:hover, .content-product .themesflat-wrap-product .product .price, .content-product .themesflat-wrap-product .product .price ins, .woocommerce .social-share-article .themesflat-socials li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__published-date,.woocommerce .themesflat-related .product .price,.woocommerce .themesflat-related .product .price ins, .woocommerce-cart table.cart td.product-name a:hover, .woocommerce-message::before, .woocommerce table.shop_attributes th:before, .blog-grid article .content-post .post-categories a, .blog-list-small article .content-post .post-categories a, .woocommerce-info::before, .woocommerce-cart .cart-collaterals .cart_totals table td a:hover, #mainnav-mobi ul li.current-menu-ancestor > a, #mainnav-mobi ul li.current-menu-item > a, .widget.widget_archive > ul > li, .widget.widget_categories > ul > li, .themesflat-related .product .price, .themesflat-related .product .price ins, .woocommerce .product p.price, .woocommerce .product span.price, .mc4wp-response { color:" . esc_attr( $scheme_color ) . ";}"."\n";

     	// Background color
		$custom .= ".info-top-right a.appoinment, .wrap-header-content a.appoinment,button, input[type=button], input[type=reset], input[type=submit],.go-top:hover,.portfolio-filter.filter-2 li a:hover, .portfolio-filter.filter-2 li.active a,.themesflat-socials li a:hover, .entry-footer .social-share-article ul li a:hover,.featured-post.blog-slider .flex-prev, .featured-post.blog-slider .flex-next,mark, ins,#themesflat-portfolio-carousel ul.flex-direction-nav li a, .flex-direction-nav li a,.navigation.posts-navigation .nav-links li a:after,.title_related_portfolio:after, .navigation.loadmore a:before, .owl-theme .owl-controls .owl-nav [class*=owl-],.widget.widget_tag_cloud .tagcloud a,.themesflat_counter.style2 .themesflat_counter-icon .icon,widget a.appoinment,.themesflat_imagebox .imagebox-image:after,.nav-widget a.appoinment, .wrap-video .flat-control a:hover, .themesflat_imagebox.button-bg-color .themesflat-button, .themesflat-portfolio .grid .item .featured-post a, .themesflat-portfolio .grid-no-padding .item .featured-post a, .themesflat_iconbox.inline-left .title:before, .portfolio-filter > li a:hover:before, .portfolio-filter > li.active a:before, .themesflat-portfolio .grid2 .item .line, .themesflat_imagebox.style7 .themesflat-button.circle-outlined:hover,.themesflat_btnslider:not(:hover), .bottom .themesflat-socials li a:hover, .section-video .themesflat-video-fancybox .icon-play, .themesflat_counter.style2 .counter-icon .icon, .themesflat-related .title:before, .vc_tta.vc_general .vc_tta-panel.vc_active h4 a:before, .quote-link .themesflat-button:hover, .themesflat_timeline .data.line-step:before, .wrap-header-content .button-header, .flat-language .current .unstyled li:hover, .loader:before, .themesflat-portfolio .portfolio-container.grid .wrap-border .portfolio-details .portfolio-details-content .title-post:before, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .themesflat-contact-us button:hover:before, .themesflat-button-banner:before, .themesflat-loader:before, .themesflat-loader:after, .wpcf7-form button::before, .sidebar .download-pdf::before,  .sidebar .download-pdf::before, breadcrumb-trail,.footer-widgets .widget .widget-title:before,.themesflat-shortcode-socials li a:hover, .sidebar .widget .widget-title:before, .blog-post .themesflat-button-container .themesflat-button, .blog-shortcode .themesflat-button-container .themesflat-button, .ui-slider-handle, .navigation.paging-navigation a:hover, .navigation.paging-navigation .current, .page-links > span, .themesflat_price .themesflat-button::before, .blog-post .featured-post .data-box, .title-project:after, .blog-shortcode article .featured-post .data-box, #mc4wp_form_widget-2 form p input[type='submit'], .testimonial-sliders.style2 .testimonial-content .author-info:before, .themesflat_imagebox.style2 .imagebox-title:before, .button-bg-color .themesflat-button::before, .themesflat-button.button-bg-color::before, .form-contact-1 > h6:before, .themesflat_price .themesflat-button, .themesflat_price.style2 .themesflat-button:hover, .themesflat_counter .counter-content-bottom .title:before, .contact-form-box div input[type='submit']:hover, .themesflat-team.detail-style .social-links a, .about-text-box a, .section-call-us.title-section .title-content a, .flat-call-back .title-section h6:before, .flat-call-back .button-contact, .primary-button, .newsletter-form input[type='submit'], .title-section .title-content a, .btn-menu:before, .btn-menu:after, .btn-menu span, .error404 .themesflat-button:hover, .themesflat_imagebox .imagebox-header .image-line, .themesflat_price .price-wrapper .status, .themesflat-team .team-info .team-line, .sidebar .widget .widget-title:before, .footer-widgets .widget.widget_tag_cloud .tagcloud a:hover,.related-post .box-title:after, .themesflat-portfolio .portfolio-container.masonry .wrap-border .portfolio-details .portfolio-details-content .title-post:before, .woocommerce .themesflat_add_to_cart_button a.button.button.add_to_cart_button, .woocommerce .themesflat_add_to_cart_button a.added_to_cart:hover, .woocommerce .product form.cart .button, .woocommerce #review_form #respond .form-submit .submit:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .title-section .title-line, .progress-item .progress-animate, .woocommerce-tabs .woocommerce-Tabs-panel h2:after, .woocommerce a.remove, #add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button, .woocommerce-tabs .woocommerce-Tabs-panel h2:after, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .blog-single .entry-footer .tags-links a { background:" . esc_attr($scheme_color) . "; }"."\n";		

     	// Border color
		$custom .= ".loading-effect-2 > span, .loading-effect-2 > span:before, .loading-effect-2 > span:after,textarea:focus, input[type=text]:focus, input[type=password]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=date]:focus, input[type=month]:focus, input[type=time]:focus, input[type=week]:focus, input[type=number]:focus, input[type=email]:focus, input[type=url]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=color]:focus,select:focus,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .section-video .themesflat-video-fancybox .icon-play, .testimonial-sliders .owl-theme .owl-dots .owl-dot span,breadcrumb-trail, .navigation.paging-navigation .current, .page-links > span, .themesflat_price .themesflat-button, .themesflat_iconbox.style5 .number-text:before, blockquote, .woocommerce-info { border-color:" . esc_attr($scheme_color) . "}"."\n";

		// Border color important
		$custom .= '.wrap-video .flat-control a:hover, input:focus, select:focus, textarea:focus, .woocommerce-message { border-color:' . esc_attr($scheme_color) . '!important;}'."\n";

		$custom .= '.testimonial-sliders.style2 .testimonial-slider .owl-stage .active:nth-of-type(even) blockquote:after, .testimonial-sliders.style2 .item blockquote::after { border-top-color :' . esc_attr($scheme_color) . '!important;}'."\n";

		
		$custom .= '#menu-sidebar-services li.current-menu-item, #menu-sidebar-services li:hover { -webkit-box-shadow: 3px 0px 0px 0px ' . themesflat_hex2rgba($scheme_color, 1).' inset' . '}'."\n";
		$custom .= '#menu-sidebar-services li.current-menu-item, #menu-sidebar-services li:hover { -moz-box-shadow: 3px 0px 0px 0px ' . themesflat_hex2rgba($scheme_color, 1).' inset' . '}'."\n";
		$custom .= '#menu-sidebar-services li.current-menu-item, #menu-sidebar-services li:hover { box-shadow: 3px 0px 0px 0px ' . themesflat_hex2rgba($scheme_color, 1).' inset' . '}'."\n";


     }

	// Primary color
    $hover_body_color = themesflat_choose_opt( 'hover_body_color' );
    $links_color = get_theme_mod('links_color');

    if ( $hover_body_color !='' ) {
    	$custom .= ".iconbox .box-header .box-icon span, .themesflat-portfolio .item .category-post a, .color_theme, .themesflat-button.blog-list-small, .comment-list-wrap .comment-reply-link,.portfolio-single .content-portfolio-detail h3,.portfolio-single .content-portfolio-detail ul li:before, .testimonial-sliders.style3 .author-name a,.themesflat_iconbox .iconbox-icon .icon span.top_bar2 .wrap-header-content ul li i, .themesflat-portfolio .grid .item .featured-post a::before, .themesflat-portfolio .grid-no-padding .item .featured-post a::before, .testimonial-sliders.style1 .testimonial-author .author-name, .testimonial-sliders.style2 .testimonial-author .author-name, .testimonial-sliders.style1 .testimonial-author .author-name a, .testimonial-sliders.style2 .testimonial-author .author-name a, .themesflat_imagebox.style7 .themesflat-button.circle-outlined i, .themesflat-portfolio .grid4 .category-post-1 a:hover:before, .themesflat_button_container .themesflat-button.no-background:hover, .themesflat-socials li a:hover, .blog-shortcode.blog-grid article .entry-meta.meta-below .post-date a:hover, .blog-shortcode.blog-grid-image-left article .entry-meta.meta-below .post-date a:hover, .themesflat-related .title, .themesflat_imagebox.style1 .themesflat-button,  .portfolio-container.grid .item .portfolio-details-content .date a:hover, .themesflat-portfolio .list-small .item .title-post a, .themesflat-portfolio .list-small .item .portfolio-details-content .themesflat-button, .themesflat-services-shortcodes .services-details-content .services-title a, .themesflat-services-shortcodes .services-details-content .date a:hover, .themesflat-team .team-name, .themesflat-team .themesflat-button, .themesflat-team.grid-style2 .themesflat-button:hover, .themesflat-team.grid-style2 .social-links a, .themesflat_counter.style3 .counter-icon .icon, .themesflat_counter.style3 .counter-content-bottom .counter-link, .themesflat_counter.style3 .counter-content-bottom .counter-content, .flat-language .current .unstyled li:hover a, .themesflat_price .price-header .title, .themesflat_imagebox .imagebox-title a, .comment-reply-title, .comment-title, .widget .widget-title, .testimonial-sliders.sidebar .author-name a, article .entry-title a, article .entry-title, article .content-post .themesflat-button, .widget.widget-themesflat-contact-us .widget-title, .wrap-header-content > ul > li > .text strong, .testimonial-sliders .sub-title1, .testimonial-sliders .sub-title2, .testimonial-sliders .sub-title3, .blog-shortcode-title, .title_related_portfolio, .themesflat_iconbox .iconbox-content .themesflat-button, .themesflat-team .team-name a, .themesflat_iconbox.style5 .number-text, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a span, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.style2 .vc_tta-tab.vc_active > a span, .navigation.posts-navigation .nav-links li a .meta-nav:hover, .woocommerce .content-product .themesflat-wrap-product .product .star-rating, .woocommerce .products .product .star-rating, .blog-single .entry-footer .themesflat-socials li a, .woocommerce .social-share-article .themesflat-socials li a, .blog-shortcode.blog-grid-style2 article .entry-content .entry-meta .themesflat-button-container .themesflat-button:hover, .blog-grid article .content-post .post-categories a:hover, .blog-list-small article .content-post .post-categories a:hover { color:" . esc_attr($hover_body_color) . ";}"."\n";

    	// Background color
		$custom .= '.wrap-header-content .button-header:hover, .themesflat_iconbox.style2:before, .themesflat-top .button-topbar:before, .themesflat-top .flat-language > ul > li > ul li, .themesflat-button-banner, .widget.widget_tag_cloud .tagcloud a:hover, .themesflat_iconbox.style2 .box-iconbox2,
		.wrap-header-content .button-header:before, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .sidebar .widget > ul > li:before, .themesflat-contact-us button, .sidebar .download-pdf, .navigation.loadmore a, .button-header:before, #mc4wp_form_widget-2 form p input[type="submit"]:hover, .themesflat-team.detail-style .social-links a:hover, .about-text-box a:hover, .section-call-us.title-section .title-content a:hover, .flat-call-back .button-contact:hover, .error404 .themesflat-button, .woocommerce .themesflat_add_to_cart_button a.added_to_cart, .woocommerce .themesflat_add_to_cart_button a.button.button.add_to_cart_button:hover, .woocommerce .product form.cart .button:hover,.woocommerce a.remove:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover,.woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .title-section .title-content a:hover, .blog-single .entry-footer .tags-links a:hover { background:' . esc_attr($hover_body_color) . "; }"."\n";

		// Background color !important
		$custom .= '.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a { background:' . esc_attr($hover_body_color) . "!important; }"."\n";	

    	$custom .= " #Ellipse_7 circle,.testimonial-sliders .logo_svg path { fill:" . esc_attr($hover_body_color) . ";}"."\n";	
		
    }

	$custom = apply_filters('themesflat/render/style',$custom);
	wp_add_inline_style( 'inline-css', $custom );

}

add_action( 'wp_enqueue_scripts', 'themesflat_custom_styles' );