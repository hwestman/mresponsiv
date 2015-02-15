<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- CSS -->

	
	<?php wp_head(); ?>





</head>

<!-- Push down the menu, when user is logged inn -->
<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

<?php 

	function site_logo() {
		$logo_image_option = get_theme_mod( 'theme_custom_logo_setting' );
		if ( $logo_image_option != "") {
			echo '<img id="site-logo" src="' . $logo_image_option . '" alt="Logo">';
		}
		else {
			echo '<img id="site-logo" src="' . get_template_directory_uri() . '/img/fallback-image-logo.jpg">';
		}
	}

?>



<div id="page" class="hfeed site">

	<div id="site-header">
		<header>
			<nav class="navbar navbar-default navbar-fixed-top header-background header-bg role="navigation">
				<div id="menu-max-width">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<div id="site-branding">
							<div id="site-logo-container"> 
								<a id="site-logo-link" href="<?php echo site_url(); ?>">
									<?php site_logo(); ?>
								</a>
							</div> <!-- #site-logo-container -->
							<div id="site-title-container">
								<a id="site-title-link" href="<?php echo site_url(); ?>">
									<h1 id="site-title"><?php bloginfo('name'); ?></h1>
								</a>
							</div> <!-- #site-title-container -->
						</div> <!-- #site-branding -->
						</div> <!-- .navbar-heade -->

					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<?php
						wp_nav_menu( array(
							'menu'             => 'Main Menu',
							'theme_location'    => 'main_menu',
							'depth' => 0,
							'container' => false,
							'menu_class' => 'nav navbar-nav navbar-right',
							'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        //Process nav menu using our custom nav walker
							'walker' => new wp_bootstrap_navwalker())
						);
						?>
					</div><!-- .navbar-collapse --> 
				</div> <!-- #menu-max-width -->
			</nav> 
		</header>
	</div>

	<?php get_template_part( 'template-hero-image'); ?> 

	<div id="main">
