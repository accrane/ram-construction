<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

$total_sq_footage = get_field('total_sq_footage');
$total_bedsbaths = get_field('total_bedsbaths');
$short_description = get_field('short_description');
$cost = get_field('cost');

$image = get_field('featured_photo');
$size = 'large'; 

$terms = get_the_terms( get_the_ID(), 'property_type' );
                         
if ( $terms && ! is_wp_error( $terms ) ) : 
 
    $projType = array();
 
    foreach ( $terms as $term ) {
        $projType[] = $term->name;
    }
                         
    $projTypeTerm = join( ", ", $projType );
    ?>
 
<?php endif; ?>


<div class="wrapper">
	<div class="page-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="single-proj-image"><?php echo wp_get_attachment_image( $image, $size ); ?></div>
			

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">

	<div class="proj-details-head">PROJECT DETAILS</div>

	<?php echo '<div class="proj-details-copy">Project Type: ' . $projTypeTerm . '</div>'; ?>
	<?php if($total_sq_footage != '') {echo '<div class="proj-details-copy">Total Square Footage: ' . $total_sq_footage . '</div>';} ?>
	<?php if($total_bedsbaths != '') {echo '<div class="proj-details-copy">Total Beds/Baths: ' . $total_bedsbaths . '</div>';} ?>
	<?php if($cost != '') {echo '<div class="proj-details-copy">Cost: ' . $cost . '</div>';} ?>
	<?php if($short_description != '') {echo '<div class="">' . $short_description . '</div>';} ?>
	
		<br>
	
	<div class="prop-gallery ">
		<?php 

		$images = get_field('photo_gallery');

		if( $images ): 
			echo '<div class="proj-details-head">ADDITIONAL PHOTOS</div>';
			$i=0;
			foreach( $images as $image ): $i++; 
			 if( $i == 3 ) {
			 	$class = 'last';
			 	$i = 0;
			 } else {
			 	$class = 'first';
			 }

			?>
		            <div class="gallery-image <?php echo $class; ?>">
		                <a class="gallery" href="<?php echo $image['url']; ?>">
		                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		                </a>
		            </div>

		        <?php endforeach; ?>
		    
		<?php endif; ?>
		</div><!-- galleruy  -->
	</div><!-- widget area -->

</div><!-- page container -->


<section class="other-projects">
	<h2>OTHER PROJECTS</h2>

<?php 
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
<section class="single-port-extra">
	<div class="flexslider carousel">
        <ul class="slides">
		
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

				$i++;

				$image = get_field('featured_photo');
				$size = 'medium'; 

				// if( $i == 3 ) {
				// 	$class = 'last';
				// 	$i=0;
				// } else {
				// 	$class = 'first';
				// }
			?>
				<li>
					<div class="portfolio-item-slide <?php //echo $class; ?> ">
						<a href="<?php the_permalink(); ?>">
							<?php if( $image ) { ?>
								<div class="img">
									<?php echo wp_get_attachment_image( $image, $size ); ?>
								</div>
							<?php } else {echo '<img src="' . get_bloginfo('template_url') . '/images/default.png" />';} ?>
							<div class="title">
								<h3><?php the_title(); ?></h3>
								<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
							</div><!-- title -->
						</a>
					</div><!-- portfolio item -->
				</li>
			<?php endwhile; ?>
		
		</ul>
	</div><!-- flexslider -->
</section>
<?php endif; ?>
</section>
</div>
<?php
get_sidebar();
get_footer();
