<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

$ID = get_the_ID();

?>
<div class="wrapper">
	<div class="page-container">
		<div id="primary" class="content-area-single-team">
			<main id="main" class="site-main" role="main">

			<?php
			if(have_posts()) :
			while ( have_posts() ) : the_post(); 

				$title__position = get_field('title__position');
		    	$phone = get_field('phone');
		    	$email = get_field('email');
		    	$image = get_field('picture');
		    	$motto = get_field('motto');
		    	$picture_by = get_field('picture_by');
		    	$bio = get_field('bio');
		    	$size = 'full';

			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title-team">', '</h1>' ); ?>
						<div class="email-team">
					    	<a href="mailto:<?php echo antispambot($email); ?>">
							  <?php echo antispambot($email); ?>
							</a>
				    	</div>
					</header><!-- .entry-header -->

					<div class="clear"></div>

					<div class="position-single"><?php echo $title__position; ?></div>

					<div class="single-bio">
						<?php echo $bio; ?>
					</div>

					<?php if( $motto != '' ) { 
						echo '<div class="motto entry-content">'; 
						echo '<h2>MOTTO</h2>';
						echo $motto;
						echo '</div>';
						} ?>

				</article>
			<?php endwhile; // End of the loop.
			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->


		<div class="single-team-pic">
			<?php if( $image ) { echo wp_get_attachment_image( $image, $size ); } ?>
			<?php if($picture_by != '') { echo '<div class="pic-by">' . $picture_by . '</div>'; } ?>
		</div><!-- single-team-pic -->


	</div><!-- page container -->

	<section class="other-leaders">
		<h2>Other Leaders</h2>
		<?php 
		wp_reset_query();
		// Query
			$wp_query = new WP_Query();
			$wp_query->query(array(
			'post_type'=>'team',
			'posts_per_page' => 2,
			'post__not_in' => array($ID),
			'tax_query' => array(
					array(
						'taxonomy' => 'team_type', // your custom taxonomy
						'field' => 'slug',
						'terms' => array( 'leader' ) // the terms (categories) you created
					)
				)
			

		));
			if ($wp_query->have_posts()) : ?>
			
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;

		    	$title__position = get_field('title__position');
		    	$image = get_field('picture');
		    	$picture_by = get_field('picture_by');
		    	$size = 'thumbnail';

		    	?>

		    	<div class="other-leader">

		    		<div class="other-leader-pic">
						<?php if( $image ) { echo wp_get_attachment_image( $image, $size ); } ?>
					</div><!-- other-leader-pic -->

					<div class="other-leader-right">
						<div class="title">
							<?php the_title(); ?>
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
						<div class="position-single"><?php echo $title__position; ?></div>
						
					</div><!-- other-leader-right -->
					<div class="link">
						<a href="<?php the_permalink(); ?>">View Leader</a>
					</div><!-- link -->
					<?php if($picture_by != '') { echo '<div class="pic-by">' . $picture_by . '</div>'; } ?>
				</div><!-- other leader -->

		    <?php endwhile; ?>
		<?php endif; ?>

		<div class="other-leader-last">
			<a href="<?php bloginfo('url'); ?>">
				<img src="<?php bloginfo('template_url'); ?>/images/what-sets-us-apart.png" />
			</a>
		</div>

	</section>


</div><!-- wrapper -->
<?php

get_footer();
