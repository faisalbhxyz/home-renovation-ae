<?php
/**
 * Home Renovation AE theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HRA_VERSION', '1.1.1' );
define( 'HRA_PHONE', '+971562889635' );
define( 'HRA_PHONE_DISPLAY', '+971 56 288 9635' );
define( 'HRA_WHATSAPP', '971562889635' );

require_once get_template_directory() . '/inc/helpers.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 320,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'home-renovation-ae' ),
			'footer'  => __( 'Footer Menu', 'home-renovation-ae' ),
		)
	);
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'hra-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'hra-main', get_template_directory_uri() . '/assets/css/main.css', array( 'hra-fonts' ), HRA_VERSION );
	wp_enqueue_script( 'hra-main', get_template_directory_uri() . '/assets/js/main.js', array(), HRA_VERSION, true );
} );

add_filter( 'robots_txt', function ( $output, $public ) {
	if ( '0' === (string) $public ) {
		return "User-agent: *\nDisallow: /\n";
	}
	$sitemap = home_url( '/wp-sitemap.xml' );
	return "User-agent: *\nAllow: /\n\nSitemap: {$sitemap}\n";
}, 10, 2 );

add_action( 'wp_head', function () {
	if ( is_front_page() ) {
		$desc = 'Home Renovation AE — Dubai\'s premium home décor, painting, flooring, furniture, curtains & office interiors. Free consultation. Call ' . HRA_PHONE_DISPLAY;
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
		echo '<meta name="keywords" content="home renovation Dubai, interior décor Dubai, painting Dubai, flooring Dubai, furniture Dubai, curtains Dubai, office fit out Dubai, Home Renovation AE">' . "\n";
		echo '<meta name="geo.region" content="AE-DU">' . "\n";
		echo '<meta name="geo.placename" content="Dubai">' . "\n";
		echo '<link rel="canonical" href="' . esc_url( home_url( '/' ) ) . '">' . "\n";
		$og_image = hra_get_image_url( 'hero' );
		echo '<meta property="og:type" content="website">' . "\n";
		echo '<meta property="og:title" content="Home Renovation AE | Luxury Home Renovation Dubai">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( home_url( '/' ) ) . '">' . "\n";
		if ( $og_image ) {
			echo '<meta property="og:image" content="' . esc_url( $og_image ) . '">' . "\n";
		}
		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	}

	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'HomeAndConstructionBusiness',
		'name'        => 'Home Renovation AE',
		'description' => 'Premium home renovation, interior décor, painting, flooring, furniture and curtains services in Dubai, UAE.',
		'url'         => home_url( '/' ),
		'telephone'   => HRA_PHONE_DISPLAY,
		'areaServed'  => array(
			'@type' => 'City',
			'name'  => 'Dubai',
		),
		'address'     => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => 'Dubai',
			'addressCountry'  => 'AE',
		),
		'priceRange'  => '$$',
		'contactPoint'=> array(
			'@type'             => 'ContactPoint',
			'telephone'         => HRA_PHONE_DISPLAY,
			'contactType'       => 'sales',
			'availableLanguage' => array( 'English', 'Arabic' ),
		),
		'hasOfferCatalog' => array(
			'@type' => 'OfferCatalog',
			'name'  => 'Renovation Services',
			'itemListElement' => array(
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Home Decorations' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Painting' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Furniture Sale' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Flooring Work' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Office Decorations' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Curtains Service' ) ),
			),
		),
	);
	$logo = hra_get_image_url( 'logo' );
	if ( $logo ) {
		$schema['logo']  = $logo;
		$schema['image'] = $logo;
	}
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}, 5 );

add_filter( 'document_title_parts', function ( $parts ) {
	if ( is_front_page() ) {
		$parts['title']   = 'Home Renovation AE';
		$parts['tagline'] = 'Luxury Home Renovation & Interior Décor in Dubai';
	}
	return $parts;
} );
