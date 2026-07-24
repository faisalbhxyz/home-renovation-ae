<?php
/**
 * One-time SEO pages seed — run via: wp eval-file wp-content/themes/home-renovation-ae/inc/seed-seo-pages.php
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

$created = array();

foreach ( hra_services() as $service ) {
	$existing = get_page_by_path( $service['slug'] );
	if ( $existing ) {
		$created[] = 'exists: ' . $service['slug'];
		continue;
	}
	$id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $service['h1'],
			'post_name'    => $service['slug'],
			'post_content' => $service['lead'],
		),
		true
	);
	if ( is_wp_error( $id ) ) {
		$created[] = 'error: ' . $service['slug'] . ' — ' . $id->get_error_message();
	} else {
		$created[] = 'created: ' . $service['slug'] . ' (#' . $id . ')';
	}
}

$sitemap = get_page_by_path( 'sitemap' );
if ( ! $sitemap ) {
	$id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => 'Sitemap',
			'post_name'    => 'sitemap',
			'post_content' => 'HTML sitemap for Home Renovation AE.',
		),
		true
	);
	$created[] = is_wp_error( $id ) ? 'sitemap error' : 'created: sitemap (#' . $id . ')';
} else {
	$created[] = 'exists: sitemap';
}

// Improve tagline for SEO.
update_option( 'blogdescription', 'Luxury Home Renovation & Interior Décor in Dubai' );

echo implode( "\n", $created ) . "\n";
