<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php 

wp_head(); 


$facebook = get_field('facebook_link', 'option');
$houzz = get_field('houzz_link', 'option');

?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			
			<?php if(is_home()) { ?>
	            <h1 class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </div>
	        <?php } ?>

	        <section class="header-right">
	        	<div class="contact">
	        		<?php 
	        			$phone = get_field('phone', 'option');
	        			echo $phone;
	        		 ?>
	        	</div><!-- contact -->
	        	<div class="tagline">
	        		<?php bloginfo('description'); ?>
	        	</div><!-- tag line -->

	        	<div class="clear"></div>
	        
	        <div class="nav-wrap">
				<div class="social-links">
					<li>
						<i class="fa fa-facebook fa-2x " aria-hidden="true">
							<a href="<?php echo $facebook; ?>">facebook</a>
						</i>
					</li>
					<li>
						<i class="fa fa-houzz fa-2x" aria-hidden="true">
							<a href="<?php echo $houzz; ?>">houzz</a>
						</i>
					</li>
				</div><!-- social links -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- nav wrap -->



			</section>

	</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
