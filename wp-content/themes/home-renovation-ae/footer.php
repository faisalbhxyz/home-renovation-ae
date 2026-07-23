<footer class="site-footer" id="contact">
	<div class="footer-cta">
		<div class="container footer-cta-inner">
			<div class="footer-cta-copy">
				<p class="eyebrow">Ready to transform your space?</p>
				<h2>Get a free Dubai consultation today</h2>
				<p>Tell us about your villa, apartment or office — we reply fast on WhatsApp with clear next steps and transparent pricing.</p>
			</div>
			<div class="footer-cta-actions">
				<a class="btn btn-gold btn-lg" href="<?php echo esc_url( hra_whatsapp_url( 'Hi, I want a free consultation for my Dubai renovation project.' ) ); ?>" target="_blank" rel="noopener">WhatsApp Now</a>
				<a class="btn btn-outline-light btn-lg" href="<?php echo esc_url( hra_phone_url() ); ?>"><?php echo esc_html( HRA_PHONE_DISPLAY ); ?></a>
			</div>
		</div>
	</div>

	<div class="footer-main">
		<div class="container footer-grid">
			<div class="footer-brand">
				<?php $logo = hra_get_image_url( 'logo' ); ?>
				<?php if ( $logo ) : ?>
					<img src="<?php echo esc_url( $logo ); ?>" alt="Home Renovation AE" width="200" height="50" loading="lazy">
				<?php else : ?>
					<strong>Home Renovation AE</strong>
				<?php endif; ?>
				<p>Premium home renovation, décor, painting, flooring, furniture and curtains across Dubai, UAE.</p>
			</div>
			<div>
				<h3>Services</h3>
				<ul>
					<?php foreach ( hra_services() as $service ) : ?>
						<li><a href="#services"><?php echo esc_html( $service['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div>
				<h3>Explore</h3>
				<ul>
					<li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#process">Our Process</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="<?php echo esc_url( home_url( '/sitemap/' ) ); ?>">HTML Sitemap</a></li>
					<li><a href="<?php echo esc_url( home_url( '/wp-sitemap.xml' ) ); ?>">XML Sitemap</a></li>
				</ul>
			</div>
			<div>
				<h3>Contact</h3>
				<ul class="footer-contact">
					<li><a href="<?php echo esc_url( hra_phone_url() ); ?>"><?php echo esc_html( HRA_PHONE_DISPLAY ); ?></a></li>
					<li><a href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener">WhatsApp Chat</a></li>
					<li>Dubai, United Arab Emirates</li>
					<li>Serving all Dubai communities</li>
				</ul>
			</div>
		</div>
		<div class="container footer-bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Home Renovation AE. All rights reserved.</p>
			<p>Dubai · Home Renovation · Interior Décor · Fit-Out</p>
		</div>
	</div>
</footer>

<a class="whatsapp-float" href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
	<svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M19.11 17.53c-.28-.14-1.64-.81-1.89-.9-.25-.1-.43-.14-.62.14-.18.28-.71.9-.87 1.08-.16.18-.32.2-.6.07-.28-.14-1.17-.43-2.23-1.37-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.32.42-.48.14-.16.18-.28.28-.46.09-.18.05-.35-.02-.49-.07-.14-.62-1.49-.85-2.04-.22-.53-.45-.46-.62-.47h-.53c-.18 0-.48.07-.73.35-.25.28-.96.94-.96 2.29s.98 2.65 1.12 2.83c.14.18 1.93 2.95 4.68 4.14.65.28 1.16.45 1.56.57.65.21 1.25.18 1.72.11.52-.08 1.64-.67 1.87-1.32.23-.65.23-1.21.16-1.32-.07-.11-.25-.18-.53-.32z"/><path fill="currentColor" d="M16.02 3C9.39 3 4 8.38 4 14.99c0 2.11.55 4.17 1.6 5.99L4 29l8.21-1.55c1.75.96 3.73 1.46 5.76 1.46h.01c6.62 0 12.01-5.38 12.01-11.99C29.99 8.38 24.64 3 16.02 3zm0 21.87h-.01c-1.79 0-3.54-.48-5.07-1.39l-.36-.22-4.87.92.93-4.75-.24-.38a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.45-9.89 9.93-9.89 2.65 0 5.14 1.03 7.01 2.91a9.8 9.8 0 0 1 2.9 6.99c0 5.45-4.45 9.87-9.91 9.87z"/></svg>
	<span>WhatsApp</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
