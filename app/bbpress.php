<?php 

function oaksage_bbp_get_template_part( $templates, $slug, $name = null ) {
	if ( isset( $name ) ) 
		$slug = $slug.'-'.$name;

	if ( file_exists( STYLESHEETPATH.'/views/bbpress/'.$slug.'.blade.php' ) ) {
		// output the blade template
		echo App\Template('bbpress/'.$slug);
		return '';
	//	return STYLESHEETPATH.'/index.php';
	}
	return $templates;
}
add_filter( 'bbp_get_template_part', 'oaksage_bbp_get_template_part', 10, 3 );
