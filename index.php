<?php
/*
* Plugin Name: Simple Post Carousel
* Plugin URI: https://github.com/reandimo/nativo-carousel
* Description: Crea banners con scroll infinito para tu web
* Version: 1.0
* Author: Renan Diaz
* Author URI: https://github.com/reandimo/
* License: MIT
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function nativo_post_carousel( $atts ) {

    // get attibutes and set defaults
        extract(shortcode_atts(array(
                'cat' => '',
                'per_page' => 3
       ), $atts));

    //If polylang is set, get the translation
    $term = get_term_by('slug', $cat, 'category'); 

    $pl_cat = ( function_exists('pll_get_term') ) ? pll_get_term( $term->ID ) : $cat ;

    //output buffer template
     ob_start();
	 include('includes/shortcode.php');

	 return ob_get_clean();

}

	//Register string in polylang
	add_action('wp_loaded', function(){

		if( function_exists('pll_register_string') ){

		    pll_register_string('nativo-posts', 'No se encontraron Posts', 'Nativo Post Carousel');
		}

	});

	//Future Litter Shortcode
	if (!is_admin()) {
		add_shortcode('nativo-carousel', 'nativo_post_carousel');
	}
