<?php
/**
 * Template Name: Profile
 */

get_header(); ?>
<div class="wrapper">
	<div class="page-container">
		<div id="primary" class="content-area-full">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<section class="team">
			
			<?php
			$i=0;
			// Holder for the ID's
				$IDs = array();
				// Query
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'team',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'team_type', // your custom taxonomy
						'field' => 'slug',
						'terms' => array( 'leader' ) // the terms (categories) you created
					)
				)
			));
				if ($wp_query->have_posts()) : ?>
				<section class="leaders">
				<h2>THE LEADERS</h2>
			    <?php while ($wp_query->have_posts()) : ?>
			        
			    <?php $wp_query->the_post(); $i++;
			    	$title__position = get_field('title__position');
			    	$phone = get_field('phone');
			    	$email = get_field('email');
			    	$image = get_field('picture');
			    	$motto = get_field('motto');
			    	$picture_by = get_field('picture_by');
			    	$bio = get_field('bio');
			    	$size = 'full';

			    	// collect the ID's
			    	$IDs[] = get_the_ID();

			    	if( $i == 3 ) {
			    		$class = 'team-leader-last';
			    		$i=0;
			    	} else {
			    		$class = 'team-leader-first';
			    	}

			    ?>

			    <div class="team-leader <?php echo $class; ?>">
			    	<div class="pic js-blocks">
			    		<?php if( $image ) { echo wp_get_attachment_image( $image, $size ); } ?>
			    		<?php if($picture_by != '') { echo '<div class="pic-by">' . $picture_by . '</div>'; } ?>
			    	</div>
			    	<h2 class="name"><?php the_title(); ?></h2>
			    	<div class="position"><?php echo $title__position; ?></div>
			    	<div class="email">
				    	<a href="mailto:<?php echo antispambot($email); ?>">
						  <?php echo antispambot($email); ?>
						</a>
			    	</div>
			    	<?php //if ( has_term('leader', 'team_type', $post ) ) { ?>
				    	<div class="team-link">
				    		<a href="<?php the_permalink(); ?>">View Team Member</a>
				    	</div>
			    	<?php //} ?>
			    </div><!-- team leader -->

			<?php endwhile; ?>
			</section>
		<?php endif; ?>

		

		<?php

// echo '<pre>';
// print_r($IDs);
// echo '</pre>';

wp_reset_query();
			$i=0;
			// Holder for the ID's
				$IDs = array();
				// Query
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'team',
				'posts_per_page' => -1,
				'post__not_in' => array($IDs),
				'tax_query' => array(
					array(
						'taxonomy' => 'team_type', // your custom taxonomy
						'field' => 'slug',
						'terms' => array( 'team' ) // the terms (categories) you created
					)
				)

			));
				if ($wp_query->have_posts()) : ?>
				<section class="otherstaff">
					<h2>THE TEAM</h2>
			    <?php while ($wp_query->have_posts()) : ?>
			        
			    <?php $wp_query->the_post(); $i++;
			    	$title__position = get_field('title__position');
			    	$phone = get_field('phone');
			    	$email = get_field('email');
			    	$image = get_field('picture');
			    	$motto = get_field('motto');
			    	$picture_by = get_field('picture_by');
			    	$bio = get_field('bio');
			    	$size = 'full';

			    	// collect the ID's
			    	$IDs[] = get_the_ID();

			    	if( $i == 3 ) {
			    		$class = 'team-leader-last';
			    		$i=0;
			    	} else {
			    		$class = 'team-leader-first';
			    	}
			    ?>

			    <div class="team-leader <?php echo $class; ?>">
			    	
			    	<h2 class="name"><?php the_title(); ?></h2>
			    	<div class="position"><?php echo $title__position; ?></div>
			    	<div class="email">
				    	<a href="mailto:<?php echo antispambot($email); ?>">
						  <?php echo antispambot($email); ?>
						</a>
			    	</div>
			    	
			    </div><!-- team leader -->

			<?php endwhile; ?>
			</section>
		<?php endif; ?>

		</section>	

	</div><!-- page container -->
</div><!-- wrapper -->
<?php
//get_sidebar();
get_footer();
