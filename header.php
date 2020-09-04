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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
    <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
</head>

<body <?php body_class(); ?>>
<nav class="navbar navbar-expand-lg text-white bg-black">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="https://dev.creativedisturbance.org/podcasts/">Podcasts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://dev.creativedisturbance.org/the-disturbed/">The Disturbed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://dev.creativedisturbance.org/home/"><img  id="logo"src = "<?php echo get_template_directory_uri() . '/img/logo.png'; ?>"/></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="https://dev.creativedisturbance.org/get-involved/">Get Involved</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="https://dev.creativedisturbance.org/about/">About</a>
            </li>
        </ul>
    </div>
</nav>
