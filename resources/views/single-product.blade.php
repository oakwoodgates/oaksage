{{--
The Template for displaying all single products
@see 	    https://docs.woocommerce.com/document/template-structure/
@author 	WooThemes
@package 	WooCommerce/Templates
@version    1.6.4
--}}
@extends('layouts.app')
@section('content')
    @php 
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
    do_action( 'woocommerce_before_main_content' ) @endphp
    @while(have_posts()) @php the_post() @endphp
    	@include('woocommerce.content-single-product')
    @endwhile
	@php 
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' ) @endphp
@endsection
