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
        $host = pods('host', get_the_ID());

        $jobTitle = $host->display('job_title');
        $src = $host->display('profile_photo');
        $website = $host->display('website');
        $categories = $host->display('expertise');
        $series = $host->field('series');
        $episodes = $host->field(array(
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
          <div class="col-sm-5 d-flex justify-content-center align-items-center">
            <img src="<?php echo $src ?>" alt="" class="img-fluid rounded-circle">
          </div>
        </div>
        <div class="row row-mb align-items-center justify-content-center">
          <div class="col-sm-8 bio-info">
            <?php if ($website !== ""): ?>
            <h4>Website</h4>
            <p><a href="<?php echo $website ?>"><?php echo $website ?></a></p>
            <?php endif; ?>
            <?php if ($categories != ""): ?>
            <h4>Expertise</h4>
            <p><?php echo $categories ?></p>
            <?php endif; ?>
            <h4>Bio</h4>
            <?php the_content(); ?>
          </div>
        </div>

        <hr>

        <div class="row row-mb">
          <div class="col-sm-12 text-center">
            <h2>Host of</h2>
          </div>
        </div>

        <?php foreach ($series as $s):
          $id = intval($s['term_id']);
          $media_id = get_term_meta( $id, 'podcast_series_image_settings', true );
          $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
          $language = get_term_meta( $id, 'language', true );
          $src = $image_attributes[0]; ?>

          <div class="row row-mb justify-content-center">
            <div class="col-sm-4">
              <img src="<?php echo $src ?>" alt="" class="img-fluid">
            </div>
            <div class="col-sm-6">
              <h3>
                <a href="<?php echo get_term_link($id) ?>"><?php echo $s['name'] ?></a>
              </h3>
              <p class="lead"><?php echo $language['post_title'] ?></p>
              <p><?php echo wp_trim_words($s['description'], 70) ?></p>
            </div>
          </div>
        <?php endforeach; ?>

        <?php if (!empty($episodes)): ?>
        <hr>

        <div class="row row-mb">
          <div class="col-sm-12 text-center">
            <h2>Recent Episodes</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <?php for($i = 0; $i < 3; $i++):
            if (isset($episodes[$i])):
              $id = intval($episodes[$i]['pod_item_id']);
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
          <?php endif; endfor; ?>
        </div>
        <?php endif; ?>
      </div> <!-- Container -->
      <?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
