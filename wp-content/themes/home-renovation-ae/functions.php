<?php
/**
 * Home Renovation AE theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HRA_VERSION', '1.3.0' );
define( 'HRA_PHONE', '+971562889635' );
define( 'HRA_PHONE_DISPLAY', '+971 56 288 9635' );
define( 'HRA_WHATSAPP', '971562889635' );
define( 'HRA_INSTAGRAM', 'https://www.instagram.com/home_decor_dubai_/' );
define( 'HRA_FACEBOOK', 'https://www.facebook.com/profile.php?id=61572522867914' );
define( 'HRA_PUBLIC_URL', 'https://homerenovationae.com' );

require_once get_template_directory() . '/inc/helpers.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'home-renovation-ae' ),
			'footer'  => __( 'Footer Menu', 'home-renovation-ae' ),
		)
	);
} );

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'hra-fonts',
			'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap',
			array(),
			null
		);
		wp_enqueue_style( 'hra-main', get_template_directory_uri() . '/assets/css/main.css', array( 'hra-fonts' ), HRA_VERSION );
		wp_enqueue_script( 'hra-main', get_template_directory_uri() . '/assets/js/main.js', array(), HRA_VERSION, true );
	}
);

add_filter(
	'robots_txt',
	function ( $output, $public ) {
		if ( '0' === (string) $public ) {
			return "User-agent: *\nDisallow: /\n";
		}
		$public_base = defined( 'HRA_PUBLIC_URL' ) ? untrailingslashit( HRA_PUBLIC_URL ) : untrailingslashit( home_url( '/' ) );
		$lines = array(
			'User-agent: *',
			'Allow: /',
			'Disallow: /wp-admin/',
			'Allow: /wp-admin/admin-ajax.php',
			'',
			'Sitemap: ' . $public_base . '/sitemap.xml',
			'Sitemap: ' . $public_base . '/wp-sitemap.xml',
		);
		return implode( "\n", $lines ) . "\n";
	},
	10,
	2
);

/**
 * Resolve SEO meta for current view.
 */
function hra_seo_meta() {
	$default_desc = 'Home Renovation AE — Dubai\'s premium home décor, painting, flooring, furniture, curtains & office interiors. Free consultation. Call ' . HRA_PHONE_DISPLAY;
	$meta         = array(
		'title'       => 'Home Renovation Dubai | Luxury Interior Décor & Fit-Out — Home Renovation AE',
		'description' => $default_desc,
		'canonical'   => home_url( '/' ),
		'og_type'     => 'website',
	);

	if ( is_front_page() ) {
		return $meta;
	}

	if ( is_page() ) {
		$slug    = get_post_field( 'post_name', get_queried_object_id() );
		$service = hra_get_service_by_slug( $slug );
		if ( $service ) {
			$meta['title']       = $service['meta_title'];
			$meta['description'] = $service['meta_desc'];
			$meta['canonical']   = get_permalink();
			$meta['og_type']     = 'article';
			return $meta;
		}
		if ( 'sitemap' === $slug ) {
			$meta['title']       = 'Sitemap | Home Renovation AE Dubai';
			$meta['description'] = 'HTML sitemap for Home Renovation AE — home renovation, décor, painting, flooring, furniture and curtains pages in Dubai.';
			$meta['canonical']   = get_permalink();
			return $meta;
		}
		$meta['title']       = wp_strip_all_tags( get_the_title() ) . ' | Home Renovation AE Dubai';
		$meta['description'] = has_excerpt() ? wp_strip_all_tags( get_the_excerpt() ) : $default_desc;
		$meta['canonical']   = get_permalink();
	}

	return $meta;
}

add_filter(
	'document_title_parts',
	function ( $parts ) {
		$seo = hra_seo_meta();
		if ( ! empty( $seo['title'] ) ) {
			$parts = array( 'title' => $seo['title'] );
		}
		return $parts;
	}
);

add_filter(
	'document_title_separator',
	function () {
		return '|';
	}
);

add_action(
	'wp_head',
	function () {
		$seo      = hra_seo_meta();
		$og_image = hra_get_image_url( 'hero' );
		$logo     = hra_get_image_url( 'logo' );

		echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";
		echo '<meta name="description" content="' . esc_attr( $seo['description'] ) . '">' . "\n";
		echo '<meta name="keywords" content="home renovation Dubai, interior décor Dubai, painting Dubai, flooring Dubai, furniture Dubai, curtains Dubai, office fit out Dubai, Home Renovation AE">' . "\n";
		echo '<meta name="author" content="Home Renovation AE">' . "\n";
		echo '<meta name="geo.region" content="AE-DU">' . "\n";
		echo '<meta name="geo.placename" content="Dubai">' . "\n";
		echo '<meta name="geo.position" content="25.2048;55.2708">' . "\n";
		echo '<meta name="ICBM" content="25.2048, 55.2708">' . "\n";
		echo '<link rel="canonical" href="' . esc_url( $seo['canonical'] ) . '">' . "\n";

		echo '<meta property="og:locale" content="en_AE">' . "\n";
		echo '<meta property="og:type" content="' . esc_attr( $seo['og_type'] ) . '">' . "\n";
		echo '<meta property="og:site_name" content="Home Renovation AE">' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( $seo['title'] ) . '">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $seo['description'] ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $seo['canonical'] ) . '">' . "\n";
		$og_alt = 'Luxury marble TV feature wall with wood slats and LED lighting — home renovation Dubai by Home Renovation AE';
		$og_id  = hra_get_attachment_by_key( 'luxury-marble-tv-feature-wall-dubai' );
		if ( $og_id ) {
			$stored_alt = get_post_meta( $og_id, '_wp_attachment_image_alt', true );
			if ( $stored_alt ) {
				$og_alt = $stored_alt;
			}
		}
		if ( $og_image ) {
			$og_meta = $og_id ? wp_get_attachment_metadata( $og_id ) : array();
			echo '<meta property="og:image" content="' . esc_url( $og_image ) . '">' . "\n";
			echo '<meta property="og:image:secure_url" content="' . esc_url( $og_image ) . '">' . "\n";
			echo '<meta property="og:image:type" content="image/jpeg">' . "\n";
			if ( ! empty( $og_meta['width'] ) ) {
				echo '<meta property="og:image:width" content="' . esc_attr( (string) (int) $og_meta['width'] ) . '">' . "\n";
			}
			if ( ! empty( $og_meta['height'] ) ) {
				echo '<meta property="og:image:height" content="' . esc_attr( (string) (int) $og_meta['height'] ) . '">' . "\n";
			}
			echo '<meta property="og:image:alt" content="' . esc_attr( $og_alt ) . '">' . "\n";
		}

		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr( $seo['title'] ) . '">' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr( $seo['description'] ) . '">' . "\n";
		if ( $og_image ) {
			echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '">' . "\n";
			echo '<meta name="twitter:image:alt" content="' . esc_attr( $og_alt ) . '">' . "\n";
		}

		$business = array(
			'@type'       => 'HomeAndConstructionBusiness',
			'@id'         => home_url( '/#business' ),
			'name'        => 'Home Renovation AE',
			'description' => 'Premium home renovation, interior décor, painting, flooring, furniture and curtains services in Dubai, UAE.',
			'url'         => home_url( '/' ),
			'telephone'   => HRA_PHONE_DISPLAY,
			'priceRange'  => '$$',
			'image'       => $logo ? $logo : $og_image,
			'logo'        => $logo ? $logo : $og_image,
			'areaServed'  => array(
				'@type' => 'City',
				'name'  => 'Dubai',
			),
			'address'     => array(
				'@type'           => 'PostalAddress',
				'addressLocality' => 'Dubai',
				'addressRegion'   => 'Dubai',
				'addressCountry'  => 'AE',
			),
			'geo'         => array(
				'@type'     => 'GeoCoordinates',
				'latitude'  => 25.2048,
				'longitude' => 55.2708,
			),
			'openingHoursSpecification' => array(
				array(
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ),
					'opens'     => '09:00',
					'closes'    => '21:00',
				),
			),
			'sameAs'      => array( HRA_INSTAGRAM, HRA_FACEBOOK ),
			'contactPoint'=> array(
				'@type'             => 'ContactPoint',
				'telephone'         => HRA_PHONE_DISPLAY,
				'contactType'       => 'sales',
				'areaServed'        => 'AE',
				'availableLanguage' => array( 'English', 'Arabic' ),
			),
			'hasOfferCatalog' => array(
				'@type'           => 'OfferCatalog',
				'name'            => 'Home Renovation Services Dubai',
				'itemListElement' => array_map(
					function ( $service ) {
						return array(
							'@type'       => 'Offer',
							'itemOffered' => array(
								'@type'       => 'Service',
								'name'        => $service['title'],
								'url'         => home_url( '/' . $service['slug'] . '/' ),
								'areaServed'  => 'Dubai',
								'description' => $service['text'],
							),
						);
					},
					hra_services()
				),
			),
		);

		$graph = array(
			array(
				'@type' => 'WebSite',
				'@id'   => home_url( '/#website' ),
				'url'   => home_url( '/' ),
				'name'  => 'Home Renovation AE',
				'publisher' => array( '@id' => home_url( '/#business' ) ),
				'inLanguage' => 'en-AE',
			),
			$business,
		);

		if ( is_front_page() ) {
			$portfolio_images = hra_get_portfolio_images();
			if ( $portfolio_images ) {
				$image_entities = array();
				foreach ( $portfolio_images as $item ) {
					$image_entities[] = array(
						'@type'      => 'ImageObject',
						'contentUrl' => $item['full'],
						'url'        => $item['full'],
						'name'       => $item['title'] . ' — Home Renovation AE Dubai',
						'description'=> $item['alt'],
						'caption'    => $item['alt'],
						'width'      => $item['width'],
						'height'     => $item['height'],
						'copyrightHolder' => array( '@id' => home_url( '/#business' ) ),
						'creator'    => array( '@id' => home_url( '/#business' ) ),
						'representativeOfPage' => true,
					);
				}
				$graph[] = array(
					'@type'            => 'ImageGallery',
					'@id'              => home_url( '/#portfolio-gallery' ),
					'name'             => 'Home Renovation AE Dubai Portfolio',
					'description'      => 'Luxury home renovation and interior décor projects across Dubai villas and apartments by Home Renovation AE.',
					'isPartOf'         => array( '@id' => home_url( '/#website' ) ),
					'image'            => $image_entities,
				);
			}
			$faq_entities = array();
			foreach ( hra_faqs() as $faq ) {
				$faq_entities[] = array(
					'@type'          => 'Question',
					'name'           => $faq['q'],
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $faq['a'],
					),
				);
			}
			$graph[] = array(
				'@type'      => 'FAQPage',
				'@id'        => home_url( '/#faq' ),
				'mainEntity' => $faq_entities,
			);
		}

		if ( is_page() ) {
			$slug    = get_post_field( 'post_name', get_queried_object_id() );
			$service = hra_get_service_by_slug( $slug );
			if ( $service ) {
				$graph[] = array(
					'@type' => 'BreadcrumbList',
					'itemListElement' => array(
						array(
							'@type'    => 'ListItem',
							'position' => 1,
							'name'     => 'Home',
							'item'     => home_url( '/' ),
						),
						array(
							'@type'    => 'ListItem',
							'position' => 2,
							'name'     => $service['title'],
							'item'     => get_permalink(),
						),
					),
				);
				$graph[] = array(
					'@type'       => 'Service',
					'name'        => $service['title'] . ' Dubai',
					'description' => $service['meta_desc'],
					'provider'    => array( '@id' => home_url( '/#business' ) ),
					'areaServed'  => 'Dubai',
					'url'         => get_permalink(),
				);
			}
		}

		$schema = array(
			'@context' => 'https://schema.org',
			'@graph'   => $graph,
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	},
	5
);
