<?php
/**
 * One-time: SEO-friendly image filenames + alt/title/caption/description.
 * Run: wp eval-file wp-content/themes/home-renovation-ae/inc/optimize-image-seo.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

$catalog = array(
	'img_12' => array(
		'file'    => 'home-renovation-ae-dubai-logo.png',
		'title'   => 'Home Renovation AE Dubai Logo',
		'short'   => 'Home Renovation AE Logo',
		'alt'     => 'Home Renovation AE logo — luxury home renovation and interior décor Dubai',
		'caption' => 'Home Renovation AE — Dubai home renovation & interior décor specialists.',
		'desc'    => 'Official logo of Home Renovation AE, providing premium home renovation, interior décor, painting, flooring, furniture and curtains services across Dubai, UAE.',
	),
	'img_14' => array(
		'file'    => 'luxury-marble-tv-feature-wall-dubai.jpg',
		'title'   => 'Luxury Marble TV Feature Wall Dubai',
		'short'   => 'Marble Feature Wall',
		'alt'     => 'Luxury marble TV feature wall with wood slats and LED lighting — home renovation Dubai by Home Renovation AE',
		'caption' => 'Marble TV feature wall with fluted wood panels and ambient LED lighting in Dubai.',
		'desc'    => 'Premium living room TV wall renovation in Dubai featuring gold-veined marble cladding, vertical wood slats, floating media console and warm LED accent lighting by Home Renovation AE.',
	),
	'img_10' => array(
		'file'    => 'arched-media-wall-living-room-dubai.jpg',
		'title'   => 'Arched Media Wall Living Room Dubai',
		'short'   => 'Arch Media Wall',
		'alt'     => 'Arched media wall luxury living room with cove lighting — interior décor Dubai by Home Renovation AE',
		'caption' => 'Arched fluted media wall with gold chandelier and floating console in Dubai.',
		'desc'    => 'Luxury Dubai living room renovation with triple arched TV wall, fluted panels, indirect LED lighting and designer gold chandelier by Home Renovation AE.',
	),
	'img_15' => array(
		'file'    => 'luxury-living-room-interior-design-dubai.jpg',
		'title'   => 'Luxury Living Room Interior Design Dubai',
		'short'   => 'Luxury Living Room',
		'alt'     => 'Luxury living room with modular sofa and stone wood TV wall — furniture & décor Dubai by Home Renovation AE',
		'caption' => 'Complete luxury living room fit-out with furniture and feature TV wall in Dubai.',
		'desc'    => 'Dubai luxury living room interior featuring modular bouclé sofa, leather Chesterfield, stone and wood-slat TV wall with LED lighting by Home Renovation AE.',
	),
	'img_00' => array(
		'file'    => 'modern-bathroom-renovation-dubai.jpg',
		'title'   => 'Modern Bathroom Renovation Dubai',
		'short'   => 'Modern Bathroom',
		'alt'     => 'Modern bathroom renovation with wood vanity and matte black fixtures — home renovation Dubai by Home Renovation AE',
		'caption' => 'Minimalist bathroom renovation with floating vanity and walk-in shower in Dubai.',
		'desc'    => 'Contemporary Dubai bathroom renovation with beige marble tiles, light-wood vanity, backlit mirror and matte black fittings by Home Renovation AE.',
	),
	'img_01' => array(
		'file'    => 'custom-tv-unit-villa-interior-dubai.jpg',
		'title'   => 'Custom TV Unit Villa Interior Dubai',
		'short'   => 'Villa Interior',
		'alt'     => 'Custom TV unit and villa interior joinery with LED shelving — home renovation Dubai by Home Renovation AE',
		'caption' => 'Custom entertainment wall and villa interior cabinetry in Dubai.',
		'desc'    => 'Dubai villa interior renovation with custom TV unit, illuminated display shelving and warm ambient lighting by Home Renovation AE.',
	),
	'img_02' => array(
		'file'    => 'ambient-living-space-interior-dubai.jpg',
		'title'   => 'Ambient Living Space Interior Dubai',
		'short'   => 'Ambient Living Space',
		'alt'     => 'Ambient living space with layered lighting and décor — interior design Dubai by Home Renovation AE',
		'caption' => 'Warm ambient living space renovation and décor styling in Dubai.',
		'desc'    => 'Ambient Dubai living space renovation with layered lighting, premium finishes and curated décor by Home Renovation AE.',
	),
	'img_06' => array(
		'file'    => 'premium-fit-out-home-renovation-dubai.jpg',
		'title'   => 'Premium Fit-Out Home Renovation Dubai',
		'short'   => 'Premium Fit-Out',
		'alt'     => 'Premium residential fit-out and interior finishes — home renovation Dubai by Home Renovation AE',
		'caption' => 'Premium fit-out project showcasing refined finishes in Dubai.',
		'desc'    => 'Premium home fit-out in Dubai with high-end materials, feature lighting and polished interior finishes by Home Renovation AE.',
	),
	'img_13' => array(
		'file'    => 'modern-residence-interior-dubai.jpg',
		'title'   => 'Modern Residence Interior Dubai',
		'short'   => 'Modern Residence',
		'alt'     => 'Modern residence interior design and renovation — Dubai home décor by Home Renovation AE',
		'caption' => 'Modern residence interior renovation in Dubai.',
		'desc'    => 'Modern Dubai residence interior renovation featuring clean lines, premium surfaces and designer décor by Home Renovation AE.',
	),
	'img_16' => array(
		'file'    => 'statement-interiors-feature-wall-dubai.jpg',
		'title'   => 'Statement Interiors Feature Wall Dubai',
		'short'   => 'Statement Interiors',
		'alt'     => 'Statement interior feature wall design — luxury home décor Dubai by Home Renovation AE',
		'caption' => 'Statement feature wall and interior styling in Dubai.',
		'desc'    => 'Statement interiors in Dubai with bold feature walls, lighting and luxury finishing by Home Renovation AE.',
	),
	'img_17' => array(
		'file'    => 'warm-neutral-suite-interior-dubai.jpg',
		'title'   => 'Warm Neutral Suite Interior Dubai',
		'short'   => 'Warm Neutral Suite',
		'alt'     => 'Warm neutral suite interior with soft tones — apartment renovation Dubai by Home Renovation AE',
		'caption' => 'Warm neutral suite décor and renovation in Dubai.',
		'desc'    => 'Warm neutral suite renovation in Dubai with soft beige tones, layered textiles and calm luxury styling by Home Renovation AE.',
	),
	'img_19' => array(
		'file'    => 'designer-living-room-dubai.jpg',
		'title'   => 'Designer Living Room Dubai',
		'short'   => 'Designer Living',
		'alt'     => 'Designer living room interior renovation — luxury décor Dubai by Home Renovation AE',
		'caption' => 'Designer living room project in Dubai.',
		'desc'    => 'Designer living room renovation in Dubai with curated furniture, lighting and premium décor by Home Renovation AE.',
	),
	'img_05' => array(
		'file'    => 'custom-joinery-interior-dubai.jpg',
		'title'   => 'Custom Joinery Interior Dubai',
		'short'   => 'Custom Joinery Space',
		'alt'     => 'Custom joinery and built-in cabinetry interior — home renovation Dubai by Home Renovation AE',
		'caption' => 'Custom joinery and built-in cabinetry for Dubai homes.',
		'desc'    => 'Custom joinery interior renovation in Dubai featuring built-in cabinets, precise finishes and designer detailing by Home Renovation AE.',
	),
	'img_03' => array(
		'file'    => 'elegant-apartment-interior-dubai.jpg',
		'title'   => 'Elegant Apartment Interior Dubai',
		'short'   => 'Elegant Apartment',
		'alt'     => 'Elegant apartment interior décor and renovation — Dubai apartment makeover by Home Renovation AE',
		'caption' => 'Elegant apartment interior makeover in Dubai.',
		'desc'    => 'Elegant Dubai apartment renovation with refined décor, soft lighting and premium finishes by Home Renovation AE.',
	),
	'img_04' => array(
		'file'    => 'dubai-villa-makeover-interior.jpg',
		'title'   => 'Dubai Villa Makeover Interior',
		'short'   => 'Dubai Villa Makeover',
		'alt'     => 'Dubai villa makeover and luxury interior renovation by Home Renovation AE',
		'caption' => 'Full villa makeover and interior refresh in Dubai.',
		'desc'    => 'Dubai villa makeover with luxury interior finishes, décor styling and complete home renovation by Home Renovation AE.',
	),
	'img_07' => array(
		'file'    => 'refined-home-decor-dubai.jpg',
		'title'   => 'Refined Home Décor Dubai',
		'short'   => 'Refined Décor',
		'alt'     => 'Refined home décor and styling for Dubai villas — Home Renovation AE',
		'caption' => 'Refined home décor styling project in Dubai.',
		'desc'    => 'Refined home decorations in Dubai with curated styling, textures and finishing touches by Home Renovation AE.',
	),
	'img_08' => array(
		'file'    => 'stylish-family-home-interior-dubai.jpg',
		'title'   => 'Stylish Family Home Interior Dubai',
		'short'   => 'Stylish Family Home',
		'alt'     => 'Stylish family home interior renovation — Dubai home décor by Home Renovation AE',
		'caption' => 'Stylish family home interior renovation in Dubai.',
		'desc'    => 'Stylish family home renovation in Dubai balancing comfort, durability and elegant interior design by Home Renovation AE.',
	),
	'img_09' => array(
		'file'    => 'boutique-interior-design-dubai.jpg',
		'title'   => 'Boutique Interior Design Dubai',
		'short'   => 'Boutique Interior',
		'alt'     => 'Boutique interior design and décor — luxury apartment Dubai by Home Renovation AE',
		'caption' => 'Boutique-style interior design project in Dubai.',
		'desc'    => 'Boutique interior design in Dubai with distinctive finishes, lighting and curated décor by Home Renovation AE.',
	),
	'img_11' => array(
		'file'    => 'feature-lighting-room-dubai.jpg',
		'title'   => 'Feature Lighting Room Dubai',
		'short'   => 'Feature Lighting Room',
		'alt'     => 'Feature lighting and ambient interior design — home renovation Dubai by Home Renovation AE',
		'caption' => 'Feature lighting room design and renovation in Dubai.',
		'desc'    => 'Feature lighting interior renovation in Dubai with cove lights, accent fixtures and warm ambience by Home Renovation AE.',
	),
	'img_18' => array(
		'file'    => 'complete-home-renovation-dubai.jpg',
		'title'   => 'Complete Home Renovation Dubai',
		'short'   => 'Complete Home Renovation',
		'alt'     => 'Complete home renovation and luxury interior fit-out in Dubai by Home Renovation AE',
		'caption' => 'End-to-end complete home renovation project in Dubai.',
		'desc'    => 'Complete home renovation in Dubai covering décor, finishes, lighting and furniture coordination by Home Renovation AE.',
	),
	'img_20' => array(
		'file'    => 'custom-sheer-curtains-living-room-dubai.jpg',
		'title'   => 'Custom Sheer Curtains Living Room Dubai',
		'short'   => 'Custom Curtains',
		'alt'     => 'Custom sheer white curtains and beige drapes in curved living room — curtains Dubai by Home Renovation AE',
		'caption' => 'Custom floor-to-ceiling sheer curtains and side drapes for a Dubai living room.',
		'desc'    => 'Custom curtains service in Dubai featuring sheer white pleated curtains, beige tie-back drapes and elegant living room window treatments by Home Renovation AE.',
	),
);

$uploads = wp_upload_dir();
$basedir = trailingslashit( $uploads['basedir'] );
$updated = 0;

foreach ( $catalog as $old_key => $seo ) {
	$query = new WP_Query(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_hra_key',
			'meta_value'     => $old_key,
		)
	);
	if ( ! $query->posts ) {
		WP_CLI::warning( "Missing attachment for {$old_key}" );
		continue;
	}
	$id       = (int) $query->posts[0];
	$relative = get_post_meta( $id, '_wp_attached_file', true );
	if ( ! $relative ) {
		WP_CLI::warning( "No attached file for {$old_key}" );
		continue;
	}

	$dir      = trailingslashit( dirname( $relative ) );
	$old_base = basename( $relative );
	$new_base = $seo['file'];
	$old_path = $basedir . $relative;
	$new_rel  = $dir . $new_base;
	$new_path = $basedir . $new_rel;

	$meta = wp_get_attachment_metadata( $id );
	if ( ! is_array( $meta ) ) {
		$meta = array();
	}

	// Rename original.
	if ( file_exists( $old_path ) && $old_base !== $new_base ) {
		if ( ! @rename( $old_path, $new_path ) ) {
			WP_CLI::warning( "Failed rename original {$old_path}" );
			continue;
		}
	}

	// Rename generated sizes.
	$old_name = pathinfo( $old_base, PATHINFO_FILENAME );
	$new_name = pathinfo( $new_base, PATHINFO_FILENAME );
	$ext      = pathinfo( $new_base, PATHINFO_EXTENSION );
	if ( ! empty( $meta['sizes'] ) && is_array( $meta['sizes'] ) ) {
		foreach ( $meta['sizes'] as $size => $size_data ) {
			if ( empty( $size_data['file'] ) ) {
				continue;
			}
			$size_old = $size_data['file'];
			$size_new = preg_replace( '/^' . preg_quote( $old_name, '/' ) . '/', $new_name, $size_old, 1 );
			if ( $size_new === $size_old ) {
				// Fallback: rebuild from dimensions.
				if ( ! empty( $size_data['width'] ) && ! empty( $size_data['height'] ) ) {
					$size_new = $new_name . '-' . (int) $size_data['width'] . 'x' . (int) $size_data['height'] . '.' . $ext;
				}
			}
			$from = $basedir . $dir . $size_old;
			$to   = $basedir . $dir . $size_new;
			if ( file_exists( $from ) && $from !== $to ) {
				@rename( $from, $to );
			}
			$meta['sizes'][ $size ]['file'] = $size_new;
		}
	}

	$meta['file'] = $new_rel;
	if ( empty( $meta['image_meta'] ) || ! is_array( $meta['image_meta'] ) ) {
		$meta['image_meta'] = array();
	}
	$meta['image_meta']['title']       = $seo['title'];
	$meta['image_meta']['caption']     = $seo['caption'];
	$meta['image_meta']['copyright']   = 'Home Renovation AE';
	$meta['image_meta']['credit']      = 'Home Renovation AE Dubai';
	$meta['image_meta']['keywords']    = array(
		'home renovation Dubai',
		'interior décor Dubai',
		$seo['short'],
		'Home Renovation AE',
	);

	update_post_meta( $id, '_wp_attached_file', $new_rel );
	wp_update_attachment_metadata( $id, $meta );
	update_post_meta( $id, '_wp_attachment_image_alt', $seo['alt'] );
	update_post_meta( $id, '_hra_key', pathinfo( $new_base, PATHINFO_FILENAME ) );

	wp_update_post(
		array(
			'ID'           => $id,
			'post_title'   => $seo['title'],
			'post_name'    => sanitize_title( pathinfo( $new_base, PATHINFO_FILENAME ) ),
			'post_excerpt' => $seo['caption'],
			'post_content' => $seo['desc'],
		)
	);

	$updated++;
	WP_CLI::log( "OK {$old_key} → {$new_base} (#{$id})" );
}

WP_CLI::success( "Updated {$updated} images with SEO filenames and meta." );
