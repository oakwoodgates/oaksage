{{--
The template for displaying product content in the single-product.php template
@see 	    https://docs.woocommerce.com/document/template-structure/
@author 	WooThemes
@package 	WooCommerce/Templates
@version    3.4.0
--}}

@php
    if ( post_password_required() ) {
        echo get_the_password_form();
        return;
    }
@endphp

<div id="product-@php the_ID() @endphp" @php wc_product_class() @endphp>
    @include('partials.page-header')
    <div class="container">
        @php
        /**
         * Hook: woocommerce_before_single_product.
         *
         * @hooked wc_print_notices - 10
         */
        do_action( 'woocommerce_before_single_product' );
        @endphp 
        <div class="row position-relative">
            @php 
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' ) @endphp
            <div class="summary entry-summary col-sm-6">
                @php 
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' ) @endphp
            </div>
            <div class="col-sm-12">
               @php 
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
               do_action( 'woocommerce_after_single_product_summary' ) @endphp
            </div>
        </div> 
    </div>
</div>
@php do_action( 'woocommerce_after_single_product' ) @endphp
