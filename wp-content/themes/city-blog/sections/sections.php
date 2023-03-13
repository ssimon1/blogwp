<?php
/**
 * Render homepage sections.
 */
function city_blog_homepage_sections() {

	$homepage_sections = array_keys( city_blog_get_homepage_sections() );

	foreach ( $homepage_sections as $section ) {
		require get_template_directory() . '/sections/' . $section . '.php';
	}

}
