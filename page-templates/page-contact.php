<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div class="wrapper">
	<div class="page-container">

		<div id="primary" class="contact-area">
			<main id="main" class="site-main" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="map">
			<?php the_field('map'); ?>
		</div><!-- map -->

	</div><!-- page container -->
</div><!-- wrapper -->
<?php
get_sidebar();
get_footer();
