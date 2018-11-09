<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CreativeDisturbance
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <?php
      while ( have_posts() ) :
        the_post();

      endwhile; ?>

    </main>
  </div>
