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
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// content-single-product template
add_filter( 'woocommerce_single_product_image_gallery_classes', function($classes){
	$classes[] = 'col-md-6';
	return $classes;
});
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
