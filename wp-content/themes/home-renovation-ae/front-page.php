<?php
/**
 * Front page — conversion-focused Dubai renovation homepage.
 */
get_header();

$hero     = hra_get_image_url( 'hero' );
$about    = hra_get_image_url( 'about' );
$cta_bg   = hra_get_image_url( 'cta' );
$portfolio = hra_get_portfolio_images();
$services  = hra_services();
?>

<main id="main">
	<section class="hero"<?php echo $hero ? ' style="--hero-image:url(' . esc_url( $hero ) . ')"' : ''; ?>>
		<div class="hero-media" aria-hidden="true"></div>
		<div class="hero-veil"></div>
		<div class="container hero-content">
			<p class="brand-mark reveal">Home Renovation AE</p>
			<h1 class="reveal delay-1">Dubai homes, elevated with quiet luxury</h1>
			<p class="hero-lead reveal delay-2">End-to-end décor, painting, flooring, furniture, curtains and office interiors — designed for Dubai living and delivered with precision.</p>
			<div class="hero-cta reveal delay-3">
				<a class="btn btn-gold btn-lg" href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener">Request Free Quote</a>
				<a class="btn btn-outline-light btn-lg" href="#portfolio">View Portfolio</a>
			</div>
		</div>
		<div class="hero-scroll" aria-hidden="true"><span></span></div>
	</section>

	<section class="trust-strip">
		<div class="container trust-inner">
			<div><strong>Dubai-based</strong><span>Local team &amp; fast response</span></div>
			<div><strong>6 Core Services</strong><span>Decor to fit-out, one partner</span></div>
			<div><strong>Transparent Pricing</strong><span>Clear scope, no surprises</span></div>
			<div><strong>WhatsApp Ready</strong><span><?php echo esc_html( HRA_PHONE_DISPLAY ); ?></span></div>
		</div>
	</section>

	<section class="section services" id="services">
		<div class="container">
			<div class="section-head">
				<p class="eyebrow">Our Services</p>
				<h2>Everything your space needs — under one Dubai specialist</h2>
				<p>From first mood board to final handover, we handle the details that make interiors feel expensive, calm and complete.</p>
			</div>
			<div class="services-grid">
				<?php foreach ( $services as $i => $service ) : ?>
					<article class="service-card reveal" style="--i:<?php echo (int) $i; ?>">
						<div class="service-icon" aria-hidden="true">
							<?php echo hra_service_icon( $service['icon'] ); // phpcs:ignore ?>
						</div>
						<h3><?php echo esc_html( $service['title'] ); ?></h3>
						<p><?php echo esc_html( $service['text'] ); ?></p>
						<a class="text-link" href="<?php echo esc_url( hra_whatsapp_url( 'Hi, I am interested in your ' . $service['title'] . ' service in Dubai.' ) ); ?>" target="_blank" rel="noopener">Get quote →</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section portfolio" id="portfolio">
		<div class="container">
			<div class="section-head">
				<p class="eyebrow">Portfolio</p>
				<h2>Recent interiors that close the brief</h2>
				<p>Warm materials, feature walls, layered lighting and furniture compositions crafted for Dubai villas and apartments.</p>
			</div>
			<div class="portfolio-grid">
				<?php foreach ( $portfolio as $i => $item ) : ?>
					<figure class="portfolio-item reveal <?php echo $i < 2 ? 'wide' : ''; ?>" style="--i:<?php echo (int) $i; ?>">
						<img src="<?php echo esc_url( $item['url'] ); ?>" alt="<?php echo esc_attr( $item['alt'] ); ?>" loading="<?php echo $i < 3 ? 'eager' : 'lazy'; ?>" decoding="async">
						<figcaption>
							<span><?php echo esc_html( $item['title'] ); ?></span>
							<em>Dubai · Home Renovation AE</em>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
			<div class="section-cta">
				<a class="btn btn-gold" href="<?php echo esc_url( hra_whatsapp_url( 'Hi, I saw your portfolio and want a similar look for my home in Dubai.' ) ); ?>" target="_blank" rel="noopener">Create a look like this</a>
			</div>
		</div>
	</section>

	<section class="mid-cta"<?php echo $cta_bg ? ' style="--mid-image:url(' . esc_url( $cta_bg ) . ')"' : ''; ?>>
		<div class="mid-cta-veil"></div>
		<div class="container mid-cta-content">
			<p class="eyebrow">Limited slots this month</p>
			<h2>Book your free design consultation</h2>
			<p>Share photos of your space on WhatsApp — get direction, options and a clear quotation.</p>
			<a class="btn btn-gold btn-lg" href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener">Chat on WhatsApp</a>
		</div>
	</section>

	<section class="section process" id="process">
		<div class="container">
			<div class="section-head">
				<p class="eyebrow">How We Work</p>
				<h2>A clear path from idea to handover</h2>
			</div>
			<ol class="process-grid">
				<li class="reveal"><span>01</span><h3>Consult</h3><p>WhatsApp or call — we understand your property, taste and budget.</p></li>
				<li class="reveal"><span>02</span><h3>Concept</h3><p>Mood, materials and layout direction tailored to Dubai living.</p></li>
				<li class="reveal"><span>03</span><h3>Quote</h3><p>Transparent scope for décor, paint, flooring, furniture and curtains.</p></li>
				<li class="reveal"><span>04</span><h3>Deliver</h3><p>On-site execution with careful finishing and a polished handover.</p></li>
			</ol>
		</div>
	</section>

	<section class="section about" id="about">
		<div class="container about-grid">
			<div class="about-media reveal">
				<?php if ( $about ) : ?>
					<img src="<?php echo esc_url( $about ); ?>" alt="Luxury interior by Home Renovation AE in Dubai" loading="lazy" decoding="async">
				<?php endif; ?>
			</div>
			<div class="about-copy reveal">
				<p class="eyebrow">About Home Renovation AE</p>
				<h2>Built for Dubai clients who want beauty without chaos</h2>
				<p>We specialise in residential and office transformations that feel intentional — warm neutrals, feature lighting, quality surfaces and furniture that fits the room, not just the catalogue.</p>
				<p>Whether you need a full décor refresh, professional painting, new flooring, custom curtains or a sharper office look, our team keeps communication simple and results premium.</p>
				<a class="btn btn-gold" href="<?php echo esc_url( hra_phone_url() ); ?>">Call <?php echo esc_html( HRA_PHONE_DISPLAY ); ?></a>
			</div>
		</div>
	</section>

	<section class="section why">
		<div class="container">
			<div class="section-head">
				<p class="eyebrow">Why Clients Choose Us</p>
				<h2>Designed to win trust — and close projects</h2>
			</div>
			<div class="why-grid">
				<article class="reveal"><h3>Sales-ready visuals</h3><p>Portfolio-led proposals so you can see the finish before you commit.</p></article>
				<article class="reveal"><h3>One accountable team</h3><p>Décor, paint, floors, furniture and curtains coordinated together.</p></article>
				<article class="reveal"><h3>Fast Dubai response</h3><p>WhatsApp-first communication for busy homeowners and offices.</p></article>
				<article class="reveal"><h3>Detail-obsessed finish</h3><p>Edges, lighting, textiles and styling that make spaces feel complete.</p></article>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
