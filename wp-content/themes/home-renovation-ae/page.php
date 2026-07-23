<?php
/**
 * Default page template.
 */
get_header();
?>
<main id="main" class="section page-content">
	<div class="container" style="max-width:820px">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<p class="eyebrow">Home Renovation AE</p>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content" style="color:rgba(243,238,230,0.78)">
					<?php the_content(); ?>
				</div>
				<p style="margin-top:2rem">
					<a class="btn btn-gold" href="<?php echo esc_url( hra_whatsapp_url() ); ?>" target="_blank" rel="noopener">WhatsApp Free Quote</a>
				</p>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
