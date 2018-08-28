<aside class="col-md-4 col-lg-3 col-xl-3">
	<div class="row">
		@if (is_archive())
			@if( class_exists('WooCommerce') && is_woocommerce()) 
				@php dynamic_sidebar('sidebar-shop') @endphp
			@else 
				@include('partials.sidebar')
			@endif
		@endif
	</div>
</aside>