@php bp_nouveau_member_hook( 'before', 'home_content' ); @endphp

<div id="item-header" role="complementary" data-bp-item-id="@php echo esc_attr( bp_displayed_user_id() ); @endphp" data-bp-item-component="members" class="users-header single-headers">

	@php bp_nouveau_member_header_template_part(); @endphp

</div><!-- #item-header -->

<div class="bp-wrap container-fluid">
			@php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : @endphp

				@php bp_get_template_part( 'members/single/parts/item-nav' ); @endphp

			@php endif; @endphp
		<div id="item-body" class="item-body">

			@php bp_nouveau_member_template_part(); @endphp

		</div><!-- #item-body -->
</div><!-- // .bp-wrap -->

@php bp_nouveau_member_hook( 'after', 'home_content' ); @endphp
