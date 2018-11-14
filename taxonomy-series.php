<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CreativeDisturbance
 */

get_header();


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
				<?php
        set_query_var('display_title', get_the_archive_title());
        get_template_part('template-parts/title', get_post_type());
				?>

      <div class="container-fluid">
        <div class="container">
          <?php
          while ( have_posts() ) : ?>
            <div class="row justify-content-center podcast-archive-row">
              <?php
              the_post();
              get_template_part( 'template-parts/content', get_post_type() );
              ?>
            </div>
          <?php endwhile;
          ?>
        </div>
      </div>
			<?php
			/* Start the Loop */


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
