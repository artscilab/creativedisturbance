<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 11/12/18
 * Time: 5:36 PM
 * This is to test a deploy.
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php
      if ( have_posts() ) :
        set_query_var('display_title', 'Blog');
        get_template_part('template-parts/title');

        /* Start the Loop */
        while ( have_posts() ) :
          the_post();

          /*
           * Include the Post-Type-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Type name) and that will be used instead.
           */
          get_template_part( 'template-parts/content', get_post_type() );

        endwhile;

        the_posts_navigation();

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
