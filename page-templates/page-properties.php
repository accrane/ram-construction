<?php
/**
 * Template Name: Properties
 */

get_header(); 

?>
<div class="wrapper">
<div class="page-container">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php 
				while( have_posts() ) : the_post();
					the_content(); 
				endwhile;
				?>
			</div>
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
			'terms' => array( 'property' ) // the terms (categories) you created
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
			<?php } else {echo '<img src="' . get_bloginfo('template_url') . '/images/default.png" />';} ?>
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


	
<?php 
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'testimonial',
	'posts_per_page' => -1,
	'orderby' => 'rand'
));
if ($wp_query->have_posts()) : ?>
<section class="black-quote">
	<div class="flexslider">
        <ul class="slides">
		
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<li>
					<div class="quote">
						<i class="fa fa-2x fa-quote-left" aria-hidden="true"></i>
						<?php the_content(); ?>
						<i class="fa fa-2x fa-quote-right" aria-hidden="true"></i>
					</div>
				</li>
			<?php endwhile; ?>
		
		</ul>
	</div><!-- flexslider -->
</section>
<?php endif; ?>
	

</div><!-- wrapper -->
<?php
get_sidebar();
get_footer();
