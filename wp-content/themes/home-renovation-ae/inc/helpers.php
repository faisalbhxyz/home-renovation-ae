<?php
/**
 * Theme helpers.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function hra_get_attachment_by_key( $key ) {
	$query = new WP_Query(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_hra_key',
			'meta_value'     => $key,
		)
	);
	return $query->posts ? (int) $query->posts[0] : 0;
}

function hra_get_image_url( $role, $size = 'full' ) {
	$map = array(
		'logo'  => 'home-renovation-ae-dubai-logo',
		'hero'  => 'luxury-marble-tv-feature-wall-dubai',
		'cta'   => 'arched-media-wall-living-room-dubai',
		'about' => 'luxury-living-room-interior-design-dubai',
	);
	$key = isset( $map[ $role ] ) ? $map[ $role ] : $role;
	$id  = hra_get_attachment_by_key( $key );
	if ( ! $id ) {
		return '';
	}
	$url = wp_get_attachment_image_url( $id, $size );
	return $url ? $url : '';
}

function hra_image_seo_catalog() {
	return array(
		'luxury-marble-tv-feature-wall-dubai'      => array(
			'title' => 'Marble Feature Wall',
			'alt'   => 'Luxury marble TV feature wall with wood slats and LED lighting — home renovation Dubai by Home Renovation AE',
		),
		'arched-media-wall-living-room-dubai'      => array(
			'title' => 'Arch Media Wall',
			'alt'   => 'Arched media wall luxury living room with cove lighting — interior décor Dubai by Home Renovation AE',
		),
		'luxury-living-room-interior-design-dubai' => array(
			'title' => 'Luxury Living Room',
			'alt'   => 'Luxury living room with modular sofa and stone wood TV wall — furniture & décor Dubai by Home Renovation AE',
		),
		'modern-bathroom-renovation-dubai'         => array(
			'title' => 'Modern Bathroom',
			'alt'   => 'Modern bathroom renovation with wood vanity and matte black fixtures — home renovation Dubai by Home Renovation AE',
		),
		'custom-tv-unit-villa-interior-dubai'      => array(
			'title' => 'Villa Interior',
			'alt'   => 'Custom TV unit and villa interior joinery with LED shelving — home renovation Dubai by Home Renovation AE',
		),
		'ambient-living-space-interior-dubai'      => array(
			'title' => 'Ambient Living Space',
			'alt'   => 'Ambient living space with layered lighting and décor — interior design Dubai by Home Renovation AE',
		),
		'premium-fit-out-home-renovation-dubai'    => array(
			'title' => 'Premium Fit-Out',
			'alt'   => 'Premium residential fit-out and interior finishes — home renovation Dubai by Home Renovation AE',
		),
		'modern-residence-interior-dubai'          => array(
			'title' => 'Modern Residence',
			'alt'   => 'Modern residence interior design and renovation — Dubai home décor by Home Renovation AE',
		),
		'statement-interiors-feature-wall-dubai'   => array(
			'title' => 'Statement Interiors',
			'alt'   => 'Statement interior feature wall design — luxury home décor Dubai by Home Renovation AE',
		),
		'warm-neutral-suite-interior-dubai'        => array(
			'title' => 'Warm Neutral Suite',
			'alt'   => 'Warm neutral suite interior with soft tones — apartment renovation Dubai by Home Renovation AE',
		),
		'designer-living-room-dubai'               => array(
			'title' => 'Designer Living',
			'alt'   => 'Designer living room interior renovation — luxury décor Dubai by Home Renovation AE',
		),
		'custom-joinery-interior-dubai'            => array(
			'title' => 'Custom Joinery Space',
			'alt'   => 'Custom joinery and built-in cabinetry interior — home renovation Dubai by Home Renovation AE',
		),
		'elegant-apartment-interior-dubai'         => array(
			'title' => 'Elegant Apartment',
			'alt'   => 'Elegant apartment interior décor and renovation — Dubai apartment makeover by Home Renovation AE',
		),
		'dubai-villa-makeover-interior'            => array(
			'title' => 'Dubai Villa Makeover',
			'alt'   => 'Dubai villa makeover and luxury interior renovation by Home Renovation AE',
		),
		'refined-home-decor-dubai'                 => array(
			'title' => 'Refined Décor',
			'alt'   => 'Refined home décor and styling for Dubai villas — Home Renovation AE',
		),
		'stylish-family-home-interior-dubai'       => array(
			'title' => 'Stylish Family Home',
			'alt'   => 'Stylish family home interior renovation — Dubai home décor by Home Renovation AE',
		),
		'boutique-interior-design-dubai'           => array(
			'title' => 'Boutique Interior',
			'alt'   => 'Boutique interior design and décor — luxury apartment Dubai by Home Renovation AE',
		),
		'feature-lighting-room-dubai'              => array(
			'title' => 'Feature Lighting Room',
			'alt'   => 'Feature lighting and ambient interior design — home renovation Dubai by Home Renovation AE',
		),
		'complete-home-renovation-dubai'           => array(
			'title' => 'Complete Home Renovation',
			'alt'   => 'Complete home renovation and luxury interior fit-out in Dubai by Home Renovation AE',
		),
		'custom-sheer-curtains-living-room-dubai'  => array(
			'title' => 'Custom Curtains',
			'alt'   => 'Custom sheer white curtains and beige drapes in curved living room — curtains Dubai by Home Renovation AE',
		),
	);
}

function hra_get_portfolio_images() {
	$catalog = hra_image_seo_catalog();
	$keys    = array_keys( $catalog );
	$items   = array();
	foreach ( $keys as $key ) {
		$id = hra_get_attachment_by_key( $key );
		if ( ! $id ) {
			continue;
		}
		$url  = wp_get_attachment_image_url( $id, 'large' );
		$full = wp_get_attachment_image_url( $id, 'full' );
		if ( ! $url ) {
			continue;
		}
		$meta  = wp_get_attachment_metadata( $id );
		$seo   = $catalog[ $key ];
		$alt   = get_post_meta( $id, '_wp_attachment_image_alt', true );
		$items[] = array(
			'id'     => $id,
			'url'    => $url,
			'full'   => $full ? $full : $url,
			'title'  => $seo['title'],
			'alt'    => $alt ? $alt : $seo['alt'],
			'width'  => ! empty( $meta['width'] ) ? (int) $meta['width'] : 1200,
			'height' => ! empty( $meta['height'] ) ? (int) $meta['height'] : 900,
		);
	}
	return $items;
}

function hra_services() {
	return array(
		array(
			'slug'        => 'home-decorations-dubai',
			'title'       => 'Home Decorations',
			'text'        => 'Complete styling and decorative finishes that turn villas and apartments into refined, livable luxury.',
			'icon'        => 'decor',
			'meta_title'  => 'Home Decorations Dubai | Interior Décor & Styling — Home Renovation AE',
			'meta_desc'   => 'Professional home decorations in Dubai for villas & apartments. Luxury styling, feature walls & finishes. Free consultation. Call +971 56 288 9635.',
			'h1'          => 'Home Decorations in Dubai',
			'lead'        => 'Transform your villa or apartment with premium home decorations in Dubai — curated styling, feature finishes and calm luxury designed for UAE living.',
			'body'        => array(
				'Home Renovation AE delivers end-to-end home decorations across Dubai: living rooms, bedrooms, reception areas and full-villa refreshes that look expensive and feel effortless.',
				'We plan colour, lighting, textiles, décor objects and statement walls so every room feels intentional — not overdone. Ideal for Marina, JVC, Arabian Ranches, Palm and Downtown homes.',
			),
			'bullets'     => array( 'Full décor concepts for villas & apartments', 'Feature walls, lighting & styling layers', 'Furniture & accessory coordination', 'WhatsApp quotes with clear scope' ),
		),
		array(
			'slug'        => 'painting-dubai',
			'title'       => 'Painting',
			'text'        => 'Premium wall painting, feature finishes and colour consultation for a flawless Dubai-ready look.',
			'icon'        => 'paint',
			'meta_title'  => 'Painting Services Dubai | Wall & Feature Painting — Home Renovation AE',
			'meta_desc'   => 'Expert painting services in Dubai: premium wall paint, feature finishes & colour advice for homes and offices. Fast, clean work. Call +971 56 288 9635.',
			'h1'          => 'Painting Services in Dubai',
			'lead'        => 'Flawless painting services in Dubai for homes and offices — smooth walls, durable finishes and colour consultation tailored to Dubai light.',
			'body'        => array(
				'From single rooms to full property repaints, our Dubai painting team focuses on prep, clean edges and premium paint systems that hold up in the UAE climate.',
				'Need a feature wall, ceiling refresh or full villa repaint? We coordinate colours with your décor so the finish looks designed, not rushed.',
			),
			'bullets'     => array( 'Interior painting for villas & apartments', 'Feature walls & accent finishes', 'Surface prep for a smooth result', 'Colour consultation included' ),
		),
		array(
			'slug'        => 'furniture-dubai',
			'title'       => 'Furniture Sale',
			'text'        => 'Curated furniture pieces selected to match your interior concept — comfort, scale and statement design.',
			'icon'        => 'sofa',
			'meta_title'  => 'Furniture Dubai | Curated Home Furniture — Home Renovation AE',
			'meta_desc'   => 'Buy curated furniture in Dubai matched to your interior concept. Sofas, dining, bedroom & statement pieces. Free design advice. Call +971 56 288 9635.',
			'h1'          => 'Furniture Sale in Dubai',
			'lead'        => 'Curated furniture in Dubai selected for scale, comfort and style — so every piece fits your room and your renovation plan.',
			'body'        => array(
				'We help Dubai homeowners source furniture that matches the interior concept: living room sets, dining tables, beds and statement pieces that look designed together.',
				'Whether you are furnishing a new apartment or upgrading a villa, we keep proportions right for Dubai layouts and finish quality high.',
			),
			'bullets'     => array( 'Concept-matched furniture selection', 'Living, dining & bedroom packages', 'Scale guidance for Dubai apartments', 'Coordinated with décor & curtains' ),
		),
		array(
			'slug'        => 'flooring-dubai',
			'title'       => 'Flooring Work',
			'text'        => 'Professional flooring installation — tiles, wood, herringbone and luxury surface upgrades.',
			'icon'        => 'floor',
			'meta_title'  => 'Flooring Dubai | Tile, Wood & Luxury Floors — Home Renovation AE',
			'meta_desc'   => 'Professional flooring in Dubai: tiles, wood, herringbone & luxury surfaces for villas and apartments. Expert install. Call +971 56 288 9635.',
			'h1'          => 'Flooring Work in Dubai',
			'lead'        => 'Professional flooring installation in Dubai — tiles, wood looks, herringbone patterns and luxury surfaces finished with precision.',
			'body'        => array(
				'Upgrade floors across your Dubai property with materials chosen for durability, comfort underfoot and a premium look that photographs well.',
				'We handle preparation, layout and installation so transitions between rooms feel seamless and the final surface is clean and level.',
			),
			'bullets'     => array( 'Tile, wood & luxury surface installs', 'Herringbone & feature patterns', 'Prep & levelling done properly', 'Matched to full renovation scope' ),
		),
		array(
			'slug'        => 'office-decorations-dubai',
			'title'       => 'Office Decorations',
			'text'        => 'Efficient, impressive office interiors that elevate brand presence and daily productivity.',
			'icon'        => 'office',
			'meta_title'  => 'Office Decorations Dubai | Office Fit-Out & Interiors — Home Renovation AE',
			'meta_desc'   => 'Office decorations & fit-out in Dubai that look professional and work hard. Reception, meeting rooms & workspaces. Call +971 56 288 9635.',
			'h1'          => 'Office Decorations in Dubai',
			'lead'        => 'Office decorations in Dubai that impress clients and support your team — reception, meeting rooms and workspaces designed with clarity.',
			'body'        => array(
				'We create office interiors across Dubai that balance brand presence with practical layout: lighting, finishes, furniture and décor that feel modern and efficient.',
				'From small studios to larger suites, you get a cohesive look without the chaos of managing multiple contractors.',
			),
			'bullets'     => array( 'Reception & meeting room styling', 'Workspace furniture & finishes', 'Brand-aligned colour & materials', 'Fast WhatsApp consultation' ),
		),
		array(
			'slug'        => 'curtains-dubai',
			'title'       => 'Curtains Service',
			'text'        => 'Custom curtains, sheers and window treatments tailored for light, privacy and elegance.',
			'icon'        => 'curtain',
			'meta_title'  => 'Curtains Dubai | Custom Curtains & Window Treatments — Home Renovation AE',
			'meta_desc'   => 'Custom curtains in Dubai: sheers, blackout & elegant window treatments for villas and apartments. Measure & install. Call +971 56 288 9635.',
			'h1'          => 'Curtains Service in Dubai',
			'lead'        => 'Custom curtains and window treatments in Dubai — sheers, blackout and elegant drapery tailored for light, privacy and a finished interior.',
			'body'        => array(
				'Window treatments make Dubai interiors feel complete. We measure, recommend fabrics and install curtains that control glare while elevating the room.',
				'Pair curtains with your décor and furniture plan for a layered look that works day and night across apartments and villas.',
			),
			'bullets'     => array( 'Custom measure & install', 'Sheers, blackout & layered looks', 'Fabric advice for Dubai light', 'Matched to full décor projects' ),
		),
	);
}

function hra_get_service_by_slug( $slug ) {
	foreach ( hra_services() as $service ) {
		if ( $service['slug'] === $slug ) {
			return $service;
		}
	}
	return null;
}

function hra_faqs() {
	return array(
		array(
			'q' => 'How much does home renovation cost in Dubai?',
			'a' => 'Costs depend on scope — décor-only refreshes, painting, flooring, furniture and curtains each price differently. Share photos and room sizes on WhatsApp for a clear, transparent quotation from Home Renovation AE.',
		),
		array(
			'q' => 'Which areas in Dubai do you serve?',
			'a' => 'We serve homes and offices across Dubai, including Marina, JBR, Downtown, Business Bay, JVC, JLT, Arabian Ranches, Palm Jumeirah and surrounding communities.',
		),
		array(
			'q' => 'Can you handle painting, flooring and curtains together?',
			'a' => 'Yes. Home Renovation AE coordinates décor, painting, flooring, furniture and curtains as one project so finishes match and timelines stay simple.',
		),
		array(
			'q' => 'How do I get a free consultation?',
			'a' => 'Message us on WhatsApp at +971 56 288 9635 or call the same number. Send photos of your space and we reply with next steps and options.',
		),
		array(
			'q' => 'Do you work on villas and apartments?',
			'a' => 'Yes — we renovate and decorate Dubai villas, apartments and offices, from single-room upgrades to full-property makeovers.',
		),
	);
}

function hra_whatsapp_url( $message = '' ) {
	$msg = $message ? $message : 'Hello Home Renovation AE, I would like a free consultation for my property in Dubai.';
	return 'https://wa.me/' . HRA_WHATSAPP . '?text=' . rawurlencode( $msg );
}

function hra_phone_url() {
	return 'tel:' . HRA_PHONE;
}

function hra_service_icon( $name ) {
	$icons = array(
		'decor'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="8" y="18" width="32" height="20" rx="1"/><path d="M8 22h32M16 18V12l8-4 8 4v6"/></svg>',
		'paint'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 8h24v14H12z"/><path d="M18 22v10a4 4 0 0 0 8 0V22"/><path d="M14 12h20"/></svg>',
		'sofa'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M10 28v-6a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v6"/><path d="M8 28h32v8H8z"/><path d="M14 36v4M34 36v4"/></svg>',
		'floor'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 16l16-8 16 8v16l-16 8-16-8V16z"/><path d="M24 8v32M8 16l16 8 16-8"/></svg>',
		'office'  => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="10" y="10" width="28" height="28" rx="1"/><path d="M10 18h28M18 18v20M30 18v20"/></svg>',
		'curtain' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 10h32M12 10c0 10-4 14-4 28M24 10c0 10-4 14-4 28M24 10c0 10 4 14 4 28M36 10c0 10 4 14 4 28"/></svg>',
	);
	return isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['decor'];
}
