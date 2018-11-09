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

      <?php
      set_query_var('display_title', the_title('', '', false));
      get_template_part('template-parts/title');
      ?>
      <?php
      while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/page/content', 'page' );

      endwhile; ?>

    </main>
  </div>

<?php
get_footer();