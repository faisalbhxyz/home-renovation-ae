<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1a1a1a">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="site-header">
	<div class="container header-inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Home Renovation AE">
			<?php
			$logo = hra_get_image_url( 'logo' );
			if ( $logo ) :
				?>
				<img class="brand-logo" src="<?php echo esc_url( $logo ); ?>" alt="Home Renovation AE" width="220" height="56" decoding="async">
			<?php else : ?>
				<span class="brand-text">Home Renovation <em>AE</em></span>
			<?php endif; ?>
		</a>

		<nav class="nav-desktop" aria-label="Primary">
			<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a>
			<a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>">Portfolio</a>
			<a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Process</a>
			<a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a>
			<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a>
		</nav>

		<div class="header-actions">
			<a class="header-phone" href="<?php echo esc_url( hra_phone_url() ); ?>"><?php echo esc_html( HRA_PHONE_DISPLAY ); ?></a>
			<a class="btn btn-gold btn-sm" href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener">Free Quote</a>
			<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>

	<div class="mobile-nav" id="mobile-nav" hidden>
		<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a>
		<a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>">Portfolio</a>
		<a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Process</a>
		<a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a>
		<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a>
		<a class="btn btn-gold" href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener">WhatsApp Free Quote</a>
		<a class="btn btn-outline" href="<?php echo esc_url( hra_phone_url() ); ?>"><?php echo esc_html( HRA_PHONE_DISPLAY ); ?></a>
	</div>
</header>
