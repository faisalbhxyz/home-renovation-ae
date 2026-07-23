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
		'logo'  => 'img_12',
		'hero'  => 'img_14', // marble feature wall — clean full-bleed
		'cta'   => 'img_10',
		'about' => 'img_15',
	);
	$key = isset( $map[ $role ] ) ? $map[ $role ] : $role;
	$id  = hra_get_attachment_by_key( $key );
	if ( ! $id ) {
		return '';
	}
	$url = wp_get_attachment_image_url( $id, $size );
	return $url ? $url : '';
}

function hra_get_portfolio_images() {
	$keys = array(
		'img_14', 'img_10', 'img_15', 'img_00', 'img_01', 'img_02',
		'img_06', 'img_13', 'img_16', 'img_17', 'img_19', 'img_05',
		'img_03', 'img_04', 'img_07', 'img_08', 'img_09', 'img_11', 'img_18',
	);
	$items  = array();
	$labels = array(
		'Marble Feature Wall', 'Arch Media Wall', 'Luxury Living Room',
		'Contemporary Lounge', 'Villa Interior', 'Ambient Living Space',
		'Premium Fit-Out', 'Modern Residence', 'Statement Interiors',
		'Warm Neutral Suite', 'Designer Living', 'Custom Joinery Space',
		'Elegant Apartment', 'Dubai Villa Makeover', 'Refined Décor',
		'Stylish Family Home', 'Boutique Interior', 'Feature Lighting Room',
		'Complete Home Renovation',
	);
	foreach ( $keys as $i => $key ) {
		$id = hra_get_attachment_by_key( $key );
		if ( ! $id ) {
			continue;
		}
		$url  = wp_get_attachment_image_url( $id, 'large' );
		$full = wp_get_attachment_image_url( $id, 'full' );
		if ( ! $url ) {
			continue;
		}
		$title  = isset( $labels[ $i ] ) ? $labels[ $i ] : 'Project';
		$items[] = array(
			'id'    => $id,
			'url'   => $url,
			'full'  => $full ? $full : $url,
			'title' => $title,
			'alt'   => $title . ' — Home Renovation AE Dubai',
		);
	}
	return $items;
}

function hra_services() {
	return array(
		array( 'slug' => 'home-decorations', 'title' => 'Home Decorations', 'text' => 'Complete styling and decorative finishes that turn villas and apartments into refined, livable luxury.', 'icon' => 'decor' ),
		array( 'slug' => 'painting', 'title' => 'Painting', 'text' => 'Premium wall painting, feature finishes and colour consultation for a flawless Dubai-ready look.', 'icon' => 'paint' ),
		array( 'slug' => 'furniture-sale', 'title' => 'Furniture Sale', 'text' => 'Curated furniture pieces selected to match your interior concept — comfort, scale and statement design.', 'icon' => 'sofa' ),
		array( 'slug' => 'flooring-work', 'title' => 'Flooring Work', 'text' => 'Professional flooring installation — tiles, wood, herringbone and luxury surface upgrades.', 'icon' => 'floor' ),
		array( 'slug' => 'office-decorations', 'title' => 'Office Decorations', 'text' => 'Efficient, impressive office interiors that elevate brand presence and daily productivity.', 'icon' => 'office' ),
		array( 'slug' => 'curtains-service', 'title' => 'Curtains Service', 'text' => 'Custom curtains, sheers and window treatments tailored for light, privacy and elegance.', 'icon' => 'curtain' ),
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
