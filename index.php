<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

	<?php 

		// Let's pull the homepage
		$post = get_post(30); 
		setup_postdata( $post );
		 
			$hero_image = get_field('hero_image');
			$right_box_content = get_field('right_box_content');
			$right_box_link = get_field('right_box_link');
			$black_box = get_field('black_box');
			$second_info_box = get_field('second_info_box');
			$fisrt_column_title = get_field('fisrt_column_title');
			$first_column_text = get_field('first_column_text');
			$second_column_title = get_field('second_column_title');
			$second_column_text = get_field('second_column_text');
			$third_column_image = get_field('third_column_image');
			$facebook_feed = get_field('facebook_feed');
			$size = 'large';

		?>

		<div class="hero-image js-blocks">
			<?php echo wp_get_attachment_image( $hero_image, $size ); ?>
		</div><!-- hero image -->

		<div class="home-first-block js-blocks">
			<div class="hfb-a">
				<?php if( $right_box_link != '' ) {echo '<a href="'.$right_box_link.'">';} ?>
				<?php if( $right_box_link != '' ) {echo '</a>';} ?>
			</div><!-- hfb a -->
			<div class="box-wrap">
				<?php echo $right_box_content; ?>
	 		</div><!-- box wrap -->
		</div><!-- home-first-block -->

		<div class="home-black-box js-blocks">
			<div class="hbb-overlay">
				<div class="hbb-content"><?php echo $black_box; ?></div>
			</div><!-- hbb-overlay -->
		</div><!-- ome-black-box -->

		<div class="home-experience js-blocks">
			<div class="box-wrap">
				<h2><?php echo $second_info_box; ?></h2>
				<div class="column-1 column-first">
					<h3><?php echo $fisrt_column_title; ?></h3>
					<?php echo $first_column_text; ?>
					<div class="next">
						<i class="fa fa-angle-right fa-2x " aria-hidden="true"></i>
					</div><!-- next -->
				</div>
				<div class="column-2 column-first">
					<h3><?php echo $second_column_title; ?></h3>
					<?php echo $second_column_text; ?>
				</div>

				<div class="column-3 column-last">
					<?php echo wp_get_attachment_image( $third_column_image, $size ); ?>
				</div>
			</div><!-- box wrap -->
			<div class="bottom-border">
				<div class="black"></div>
				<div class="green"></div>
				<div class="black"></div>
			</div><!-- bottom border -->
		</div><!-- home-first-block -->


		<div class="facebook-feed">
			<h2><?php echo $facebook_feed; ?></h2>
			<div class="feed-wrap">
				<?php echo do_shortcode('[custom-facebook-feed]'); ?>
			</div>
		</div>

		<div class="sponsors-box">
			<div class="box-wrap">
				<?php if( have_rows('logos')) : while(have_rows('logos')) : the_row();
					$logo_link = get_sub_field('logo_link');
					$logo = get_sub_field('logo');
					$size = 'large';
				 ?>
				 	<div class="sponsors">
				 		<?php 
					 		if( $logo_link != '' ) {echo '<a href="'.$logo_link.'">';}
					 			echo wp_get_attachment_image( $logo, $size );
					 		if( $logo_link != '' ) {echo '</a>';}
				 		 ?>
				 	</div><!-- sponsors -->
			<?php endwhile; endif; ?>
			</div><!-- box wrap -->
		</div><!-- sponsors box -->
		 
		<?php wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
