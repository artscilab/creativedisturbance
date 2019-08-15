<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CreativeDisturbance
 */

get_header();

$term_id = get_queried_object_id();
$pod = pods('series', $term_id);
$hostField = $pod->field('host');
$hosts = array();
foreach($hostField as $host) {
  $id = $host['ID'];
  $hostPod = pods('host', $id);
  $name = $hostPod->display('post_title');
  $link = $hostPod->display('guid');
  $src = $hostPod->display('profile_photo');
  $job = $hostPod->display('job_title');

  array_push($hosts, array(
    "name" => $name,
    "link" => $link,
    "src" => $src,
    "job" => $job
  ));
}
$language = $pod->display('language');
$categories = $pod->display('series_category');
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
    if ( have_posts() ) :
      set_query_var('display_title', get_the_archive_title());
      set_query_var('language', $language);
      set_query_var('categories', $categories);
      get_template_part('template-parts/title', get_post_type());
    ?>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="display-4 text-center section-title">Episodes</h2>
          </div>
        </div>
        <div class="row series-episodes justify-content-center">
          <div class="col-sm-8">
            <div class="series-accordion accordion" id="podcastEpisodes">
              <?php
              $i = 0;
              global $query_string;
              query_posts( $query_string . '&posts_per_page=250' );
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
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center section-title">Hosts</h2>
          </div>
        </div>
        <div class="row hosts-row justify-content-center row-mb">
          <?php foreach ($hosts as $host): ?>
            <div class="host col-sm-4">
              <a href="<?php echo $host['link'] ?>">
                <img src="<?php echo $host['src'] ?>" alt="" class="profile-img img-fluid">
                <div class="profile-info">
                  <h3><?php echo $host['name'] ?></h3>
                  <p class="lead"><?php echo $host['job'] ?></p>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
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
