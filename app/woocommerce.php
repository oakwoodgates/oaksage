<?php

add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
});

// remove woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// archive-product template, single-product template
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// archive-product template
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// content-product template
add_action( 'woocommerce_before_shop_loop_item_title', 'oaksage_product_card_link', 99 );
function oaksage_product_card_link() {
	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink() );
	echo '</a><a href="'.esc_url( $link ).'" class="card-body">';
}

// content-single-product template
add_filter( 'woocommerce_single_product_image_gallery_classes', function($classes){
	$classes[] = 'col-md-6';
	return $classes;
});
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );


// locate template overrides
add_filter( 'wc_get_template', 'oaksage_wc_get_template', 10, 5 );
function oaksage_wc_get_template( $located, $template_name, $args, $template_path, $default_path ) {
	$r = pathinfo($template_name);
	$s = STYLESHEETPATH.'/views/woocommerce/'.$r['dirname'].'/'.$r['filename'].'.blade.php';
	if (file_exists($s)) {
		// output the blade template
		echo App\Template('woocommerce/'.$r['dirname'].'/'.$r['filename']);
		// return '';
		// return a file just to make woocommerce happy
		return STYLESHEETPATH.'/index.php';
	}
	return $located;
}

add_filter( 'wc_get_template_part', 'oaksage_wc_get_template_part', 10, 3 );
function oaksage_wc_get_template_part( $template, $slug, $name ) {
	$name = ($name)?'-'.$name:'';
	$t = STYLESHEETPATH.'/views/woocommerce/'.$slug.$name.'.blade.php';
	if (file_exists($t)) {
		// output the blade template
		echo App\Template('woocommerce/'.$slug.$name);
		return '';
		// return a file just to make woocommerce happy
	//	return STYLESHEETPATH.'/index.php';
	}
	return $template;
}

// add_filter( 'woocommerce_template_path', function( $path ) {
//    return trailingslashit( STYLESHEETPATH ) . trailingslashit( 'views' ) . ( $path );
// } );
