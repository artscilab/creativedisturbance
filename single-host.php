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
        $categories = $host->display('categories');
        set_query_var('display_title', the_title('', '', false));
        set_query_var('job_title', $jobTitle);
        get_template_part('template-parts/title', "voice"); ?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-4">
            <img src="<?php echo $src ?>" alt="" class="img-fluid">
          </div>
          <div class="col-sm-8">
            <h4>Website</h4>
            <p><a href="<?php echo $website ?>"><?php echo $website ?></a></p>
            <h4>Expertise</h4>
            <p><?php echo $categories ?></p>
            <h4>Bio</h4>
            <?php the_content(); ?>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-sm-12 text-center">
            <h2>Host of</h2>
          </div>
        </div>
      </div>
      <?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
