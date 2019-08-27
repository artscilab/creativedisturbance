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
    get_template_part( 'template-parts/content', get_post_type() );

    $podcast = pods('podcast', get_the_ID());
    $categories = $podcast->field('podcast_category');

    $similarEpisodes = array();

    if(!empty($categories)) {
      foreach ($categories as $c) {
        $name = $c['post_title'];
        $podParams = array(
          "limit" => 3,
          "where" => 'podcast_category.post_title = \''. $name .'\''
        );
        $pod = pods('podcast', $podParams);

        while($pod->fetch()) {
          $series = get_the_terms($pod->display('ID'), 'series')[0];
          $seriesName = $series->name;
          $media_id = get_term_meta( $series->term_id, 'podcast_series_image_settings', true );
          $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
          $src = $image_attributes[0];
          array_push($similarEpisodes, array(
            "name" => $pod->display('post_title'),
            "link" => $pod->display('guid'),
            "categories" => $pod->display('podcast_category'),
            "src" => $src
          ));
        }
      }
    }

    $series = $podcast->field('series');
    $seriesPod = pods('series', $series[0]['pod_item_id']);
    $host = $seriesPod->field('host');
    $voice = $podcast->field('voices');

    $hosts = array();
    $voices = array();

    if (!empty($host)) {
      foreach ($host as $h) {
        $hostPod = pods('host', $h['ID']);
        $name = $hostPod->display('post_title');
        $link = $hostPod->display('guid');
        $job = $hostPod->display('job_title');
        $src = $hostPod->display('profile_photo');
        array_push($hosts, array(
          "name" => $name,
          "link" => $link,
          "job" => $job,
          "src" => $src
        ));
      }
    }
    if (!empty($voice)) {
      foreach ($voice as $v) {
        $voicePod = pods('voice', $v['ID']);
        $name = $voicePod->display('post_title');
        $link = $voicePod->display('guid');
        $job = $voicePod->display('job_title');
        $src = $voicePod->display('profile_photo');
        array_push($voices, array(
          "name" => $name,
          "link" => $link,
          "job" => $job,
          "src" => $src
        ));
      }
    }?>

    <div class="container podcast-hosts-voices">
      <div class="row">
        <div class="col">
          <div class="row title-row text-center">
            <div class="col-sm-12">
              <h2>Hosts</h2>
            </div>
          </div>
          <div class="row justify-content-center voices-row">
            <?php foreach ($hosts as $h): ?>
              <?php if (!empty($voices)) { ?>
                <div class="voice col-sm-6">
              <?php } else {?>
                <div class="voice col-sm-3">
              <?php } ?>
                <a href="<?php echo $h['link'] ?>">
                  <img src="<?php echo $h['src'] ?>" alt="<?php echo $h['name'] ?>" class="img-fluid profile-img">
                  <h2><?php echo $h['name'] ?></h2>
                  <p class="lead"><?php echo $h['job'] ?></p>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php if (!empty($voices)): ?>
        <div class="col">
          <div class="row title-row text-center">
            <div class="col-sm-12">
              <h2>Voices in this episode</h2>
            </div>
          </div>
          <div class="row justify-content-center voices-row">
            <?php foreach ($voices as $v): ?>
              <div class="voice col-sm-6">
                <a href="<?php echo $v['link'] ?>">
                  <img src="<?php echo $v['src'] ?>" alt="<?php echo $v['name'] ?>" class="img-fluid profile-img">
                  <h2><?php echo $v['name'] ?></h2>
                  <p class="lead"><?php echo $v['job'] ?></p>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if (!empty($similarEpisodes)): ?>
      <div class="container podcast-similar">
        <div class="row title-row text-center">
          <div class="col-sm-12">
            <h2>You May Also Like</h2>
          </div>
        </div>
        <div class="row justify-content-center similar-row">
          <?php foreach ($similarEpisodes as $similar): ?>
            <div class="similar col-sm-4">
              <a href="<?php echo $similar['link'] ?>">
                <img src="<?php echo $similar['src'] ?>" alt="<?php echo $similar['name'] ?>" class="img-fluid">
                <h2><?php echo wp_trim_words($similar['name'], 5) ?></h2>
                <p class="lead"><?php echo $similar['categories'] ?></p>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
