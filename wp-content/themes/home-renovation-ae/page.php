<?php
/**
 * Page template — service SEO pages + generic pages.
 */
get_header();

$slug    = get_post_field( 'post_name', get_the_ID() );
$service = hra_get_service_by_slug( $slug );
$hero    = ( 'curtains-dubai' === $slug )
	? hra_get_image_url( 'custom-sheer-curtains-living-room-dubai' )
	: hra_get_image_url( 'hero' );
if ( ! $hero ) {
	$hero = hra_get_image_url( 'hero' );
}

if ( $service ) :
	?>
<main id="main">
	<section class="page-hero"<?php echo $hero ? ' style="--hero-image:url(' . esc_url( $hero ) . ')"' : ''; ?>>
		<div class="page-hero-veil"></div>
		<div class="container page-hero-content">
			<nav class="breadcrumbs" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
				<span aria-hidden="true">/</span>
				<span><?php echo esc_html( $service['title'] ); ?></span>
			</nav>
			<p class="eyebrow">Dubai Service</p>
			<h1><?php echo esc_html( $service['h1'] ); ?></h1>
			<p class="hero-lead"><?php echo esc_html( $service['lead'] ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-gold btn-lg" href="<?php echo esc_url( hra_whatsapp_url( 'Hi, I am interested in your ' . $service['title'] . ' service in Dubai.' ) ); ?>" target="_blank" rel="noopener">Get Free Quote</a>
				<a class="btn btn-outline-light btn-lg" href="<?php echo esc_url( hra_phone_url() ); ?>"><?php echo esc_html( HRA_PHONE_DISPLAY ); ?></a>
			</div>
		</div>
	</section>

	<section class="section service-detail">
		<div class="container service-detail-grid">
			<div class="service-detail-copy">
				<?php foreach ( $service['body'] as $para ) : ?>
					<p><?php echo esc_html( $para ); ?></p>
				<?php endforeach; ?>
				<ul class="service-bullets">
					<?php foreach ( $service['bullets'] as $bullet ) : ?>
						<li><?php echo esc_html( $bullet ); ?></li>
					<?php endforeach; ?>
				</ul>
				<a class="btn btn-gold" href="<?php echo esc_url( hra_whatsapp_url( 'Hi, I want a quote for ' . $service['title'] . ' in Dubai.' ) ); ?>" target="_blank" rel="noopener">WhatsApp for pricing</a>
			</div>
			<aside class="service-aside">
				<h2>Other Dubai services</h2>
				<ul>
					<?php foreach ( hra_services() as $other ) : ?>
						<?php if ( $other['slug'] === $service['slug'] ) { continue; } ?>
						<li><a href="<?php echo esc_url( home_url( '/' . $other['slug'] . '/' ) ); ?>"><?php echo esc_html( $other['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
				<p class="service-aside-note">Serving villas, apartments and offices across Dubai.</p>
			</aside>
		</div>
	</section>
</main>
	<?php
elseif ( 'sitemap' === $slug ) :
	?>
<main id="main">
	<section class="section">
		<div class="container">
			<div class="section-head">
				<p class="eyebrow">Sitemap</p>
				<h1>All pages — Home Renovation AE</h1>
				<p>Browse our Dubai renovation and interior décor pages.</p>
			</div>
			<ul class="sitemap-list">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home — Home Renovation Dubai</a></li>
				<?php foreach ( hra_services() as $svc ) : ?>
					<li><a href="<?php echo esc_url( home_url( '/' . $svc['slug'] . '/' ) ); ?>"><?php echo esc_html( $svc['h1'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</main>
	<?php
else :
	?>
<main id="main">
	<section class="section">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		</div>
	</section>
</main>
	<?php
endif;

get_footer();
