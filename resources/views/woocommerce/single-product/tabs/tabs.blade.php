{{--
Single Product tabs
@see 	    https://docs.woocommerce.com/document/template-structure/
@author 	WooThemes
@package 	WooCommerce/Templates
@version    2.4.0
--}}

@php
/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
@endphp 
@if ( ! empty( $tabs ) ) 

		<ul class="nav nav-tabs nav-justified" id="productTabs" role="tablist">
			@php $i = 0 @endphp 
			@foreach ( $tabs as $key => $tab ) 
				<li class="nav-item">
					<a href="#@php echo esc_attr( $key ); @endphp" id="@php echo esc_attr( $key ); @endphp-tab" role="tab" aria-controls="@php echo esc_attr( $key ); @endphp" 
					@if ($i)
						class="nav-link" aria-selected="false"
					@else 
						class="nav-link active show" aria-selected="true"
					@endif 
					>@php $i++; echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); @endphp</a>
				</li>
			@endforeach
		</ul>
		<div class="tab-content">
			@php $i = 0 @endphp 
			@foreach ( $tabs as $key => $tab )
				<div id="@php echo esc_attr( $key ); @endphp" role="tabpanel" aria-labelledby="@php echo esc_attr( $key ); @endphp-tab" class="tab-pane fade
					@if (!$i) 
						active show
					@endif 
					">@php $i++; if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } @endphp
				</div>
			@endforeach
		</div>


@endif