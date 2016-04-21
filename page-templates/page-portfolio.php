<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>
<div class="wrapper">
<div class="page-container">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			
<?php
$i=0;
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'property',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'property_type', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'portfolio' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
<?php while ($wp_query->have_posts()) : ?>
<?php $wp_query->the_post(); 
$i++;

$image = get_field('featured_photo');
$size = 'medium'; 

if( $i == 3 ) {
	$class = 'last';
	$i=0;
} else {
	$class = 'first';
}

?>

	<div class="portfolio-item <?php echo $class; ?> ">
		<a href="<?php the_permalink(); ?>">
			<?php if( $image ) { ?>
				<div class="img js-blocks">
					<?php echo wp_get_attachment_image( $image, $size ); ?>
				</div>
			<?php } ?>
			<div class="title">
				<h2><?php the_title(); ?></h2>
				<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
			</div><!-- title -->
		</a>
	</div><!-- portfolio item -->

<?php endwhile; ?>
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- page container -->


	<section class="black-quote">
		<?php $wp_query = new WP_Query();
				$wp_query->query(array(
					'post_type'=>'testimonial',
					'posts_per_page' => 1
				));
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

			<?php endwhile; endif; ?>
	</section>

</div><!-- wrapper -->
<?php
get_sidebar();
get_footer();
