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
			$voice = $podcast->field('voices');
      if (!empty($voice)):
        $voices = array();
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
			?>
    <div class="container voices podcast-voices">
      <div class="row title-row text-center">
        <div class="col-sm-12">
          <h2>Voices in this episode</h2>
        </div>
      </div>
      <div class="row justify-content-center voices-row">
        <?php foreach ($voices as $v): ?>
          <div class="voice col-sm-3">
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

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
