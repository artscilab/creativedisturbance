<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CreativeDisturbance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'creativedisturbance' ); ?></a>

	<nav role="navigation" id="masthead" class="navbar navbar-dark bg-dark navbar-expand-md">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
      wp_nav_menu( array(
        'theme_location'  => 'primary',
        'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbarSupportedContent',
        'menu_class'      => 'navbar-nav ml-auto',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
      ) );
      ?>
  </nav><!-- #site-navigation -->

	<div id="content" class="site-content">
