<?php 
add_filter('bp_template_include_theme_compat', function($d) {
	if (is_buddypress()) {
		echo App\Template('buddypress');
		return '';
	} else {
		return $d;
	}
});


function oaksage_bp_get_template_part( $templates, $slug, $name ) {
	$t = STYLESHEETPATH.'/views/buddypress/'.$slug.'.blade.php';
	if (file_exists($t)) {
		// output the blade template
		echo App\Template('buddypress/'.$slug.$name);
		return '';
	//	return STYLESHEETPATH.'/index.php';
	}
	return $templates;
}
add_filter( 'bp_get_template_part', 'oaksage_bp_get_template_part', 10, 3 );
