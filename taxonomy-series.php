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
          <div class="row">
            <div class="col-sm-12">
              <h2 class="display-4 text-center section-title">Episodes</h2>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="series-accordion accordion" id="podcastEpisodes">
                <?php
                $i = 0;
                while ( have_posts() ) : the_post(); ?>

                  <div class="card">
                    <div class="card-header" id="<?php echo 'heading'.get_the_ID() ?>">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="<?php echo '#collapse'.get_the_ID() ?>" aria-expanded="<?php if($i == 0) echo 'true'; else echo 'false' ?>" aria-controls=<?php echo 'collapse'.get_the_ID() ?>><?php echo the_title('', '', false) ?></button>
                      </h5>
                    </div>

                    <div id="<?php echo 'collapse'.get_the_ID() ?>" class="collapse <?php if($i == 0) echo 'show'; ?>" aria-labelledby="<?php echo 'heading'.get_the_ID() ?>" data-parent="#podcastEpisodes">
                      <div class="card-body">
                        <?php
                        get_template_part( 'template-parts/content', get_post_type() );
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php $i++; ?>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php
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
