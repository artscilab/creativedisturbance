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
      while ( have_posts() ) :
        the_post();
        $voice = pods('voice', get_the_ID());

        $jobTitle = $voice->display('job_title');
        $src = $voice->display('profile_photo');
        $website = $voice->display('website');
        $categories = $voice->display('expertise');
        $episodes = $voice->field(array(
          "name" => 'podcast',
          "raw" => false,
          "single" => null,
          "orderby" => 'post_date'
        ));

        if (!empty($episodes)) {
          $episodes = array_reverse($episodes);
        }

        set_query_var('display_title', the_title('', '', false));
        set_query_var('job_title', $jobTitle);
        get_template_part('template-parts/title', "voice"); ?>

      <div class="container">
        <div class="row row-mb align-items-center justify-content-center">
          <div class="col-sm-5">
            <img src="<?php echo $src ?>" alt="" class="img-fluid rounded-circle">
          </div>
          <div class="col bio-info">
            <h4>Website</h4>
            <p><a href="<?php echo $website ?>"><?php echo $website ?></a></p>
            <h4>Expertise</h4>
            <p><?php echo $categories ?></p>
            <h4>Bio</h4>
            <?php the_content(); ?>
          </div>
        </div>

        <?php if (!empty($episodes)): ?>
        <hr>

        <div class="row row-mb">
          <div class="col-sm-12 text-center">
            <h2>Appears in</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <?php foreach ($episodes as $episode):
              $id = intval($episode['pod_item_id']);
              $episodePod = pods('podcast', $id);
              $link = $episodePod->display('guid');
              $title = $episodePod->display('post_title');
              $series = get_the_terms($id, 'series')[0];
              $seriesName = $series->name;
              $media_id = get_term_meta( $series->term_id, 'podcast_series_image_settings', true );
              $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
              $src = $image_attributes[0];
            ?>
          <div class="col col-sm-4">
            <a href="<?php echo $link ?>" class="link-block link-channel recent-podcast">
              <img src="<?php echo $src ?>" alt="" class="img-fluid">
              <h3><?php echo $title ?></h3>
              <p class="lead text-muted"><?php echo $seriesName ?></p>
            </a>
          </div>
          <?php endforeach; ?>
        </div>

      <?php endif; ?>

      </div> <!-- Container -->
      <?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
