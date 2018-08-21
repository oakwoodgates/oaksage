{{--
The Template for displaying product archives, including the main shop page which is a post type archive
@see        https://docs.woocommerce.com/document/template-structure/
@author     WooThemes
@package    WooCommerce/Templates
@version    3.4.0
--}}
@extends('layouts.app')

@section('content')

    @php
    /**
     * Hook: woocommerce_before_main_content.
     *
     * --@hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * --@hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action('woocommerce_before_main_content') @endphp

    <header class="woocommerce-products-header jumbotron bg-primary text-light">
        <div class="container">
            <h1 class="text-center text-uppercase woocommerce-products-header__title page-title">{!! App::title() !!}</h1>
            @php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action( 'woocommerce_archive_description' )
            // woocommerce_product_loop_start()
            @endphp
        </div>
    </header>
    <div class="container-fluid">
        @if(have_posts())
            @php
            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked wc_print_notices - 10
             * --@hooked woocommerce_result_count - 20
             * --@hooked woocommerce_catalog_ordering - 30
             */
             do_action('woocommerce_before_shop_loop') @endphp

            @if(wc_get_loop_prop('total'))
                <div class="row">
                    @while(have_posts()) @php the_post() @endphp
                        @php 
                        /**
                         * Hook: woocommerce_shop_loop.
                         *
                         * @hooked WC_Structured_Data::generate_product_data() - 10
                         */
                        do_action('woocommerce_shop_loop') @endphp
                        @include('woocommerce.content-product')
                    @endwhile
                </div>
            @endif
            @php 
            // woocommerce_product_loop_end()
            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action( 'woocommerce_after_shop_loop' ) @endphp
        @else
            @php
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action( 'woocommerce_no_products_found' ) @endphp
        @endif
        @php
        /**
         * Hook: woocommerce_after_main_content.
         *
         * --@hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' ) @endphp
    </div>


@endsection