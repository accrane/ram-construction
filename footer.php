<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */


$sitemapLink = get_field('sitemap_link', 'option'); 
$phone = get_field('phone', 'option'); 
$fax = get_field('sitemap_link', 'option'); 
$email = get_field('contact_email', 'option'); 

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">

				<div class="footer-left">
				<h3><?php echo get_bloginfo('name') . ' | Charlotte, NC'; ?></h3>
					<br>
					<?php echo get_bloginfo('description'); ?>
					<br>
					<?php echo '<a href="' . $sitemapLink . '">sitemap</a> | site by <a target="_blank" href="http://bellaworksweb.com">bellaworks</a>'; ?>
				</div>


				<div class="footer-right">

					<?php echo $phone; ?>
					<br>
					<a href="mailto:<?php echo antispambot($email); ?>">
					  <?php echo antispambot($email); ?>
					</a>

				</div><!-- footer left -->


			</div><!-- .site-info -->
		</div><!-- wrapper -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
