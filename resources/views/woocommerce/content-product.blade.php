{{--
The template for displaying product content within loops
@see 	    https://docs.woocommerce.com/document/template-structure/
@author 	WooThemes
@package 	WooCommerce/Templates
@version    3.4.0
--}}
@php
    global $product
@endphp

@if(empty($product) || ! $product->is_visible())
    return
@endif
<div {{ post_class('card mb-5 text-center') }}>
    @php 
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * --@hooked woocommerce_template_loop_product_link_open - 10
	 */
    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
    do_action( 'woocommerce_before_shop_loop_item' ) @endphp

	<a href="@php echo esc_url( $link ) @endphp" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
		@php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' ) @endphp
	</a>
    <a href="@php echo esc_url( $link ) @endphp" class="card-body">
	    @php 
		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' ) @endphp

		@php 
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
	    do_action( 'woocommerce_after_shop_loop_item_title' ) @endphp
    </a>

	@php 
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * --@hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
    do_action( 'woocommerce_after_shop_loop_item' ) @endphp
</div>