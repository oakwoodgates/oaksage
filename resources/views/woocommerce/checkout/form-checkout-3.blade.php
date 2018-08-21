{{--
Checkout Form
@see 	    https://docs.woocommerce.com/document/template-structure/
@author 	WooThemes
@package 	WooCommerce/Templates
@version    2.3.0
--}}
@php 
$checkout = WC()->checkout();
wc_print_notices();
do_action( 'woocommerce_before_checkout_form', $checkout );
// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}
@endphp

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="@php echo esc_url( wc_get_checkout_url() ); @endphp" enctype="multipart/form-data">
	<div class="row">

		@php if ( $checkout->get_checkout_fields() ) : @endphp
			<div class="col-md-6">

				@php do_action( 'woocommerce_checkout_before_customer_details' ); @endphp

				<div id="customer_details">
					@php do_action( 'woocommerce_checkout_billing' ); @endphp
					@php do_action( 'woocommerce_checkout_shipping' ); @endphp
				</div>

				@php do_action( 'woocommerce_checkout_after_customer_details' ); @endphp
			</div>
		@php endif; @endphp
		<div class="col-md-6">

			<h3 id="order_review_heading">@php _e( 'Your order', 'woocommerce' ); @endphp</h3>

			@php do_action( 'woocommerce_checkout_before_order_review' ); @endphp

			<div id="order_review" class="woocommerce-checkout-review-order">
				@php do_action( 'woocommerce_checkout_order_review' ); @endphp
			</div>

			@php do_action( 'woocommerce_checkout_after_order_review' ); @endphp
		</div>
	</div>

</form>

@php do_action( 'woocommerce_after_checkout_form', $checkout ); @endphp
