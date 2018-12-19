<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CreativeDisturbance
 */

get_header();
$channels = get_terms(array(
  'taxonomy' => 'series',
  'hide_empty' => false
));
$params = array(
  'limit' => 15,
  'where' => 'featured_on_homepage.meta_value = 1'
);
$podcasts = pods( 'podcast', $params );

$featuredPosts = array();
while ( $podcasts->fetch() ) {
  $title = $podcasts->display('post_title');
  $series = $podcasts->display('series');
  $country = $podcasts->display('country');
  $link = $podcasts->display('guid');

  $term = get_the_terms($podcasts->display('ID'), 'series')[0];
  $seriesName = $term->name;
  $slug = $term->slug;
  $media_id = get_term_meta( $term->term_id, 'podcast_series_image_settings', true );
  $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
  $src = $image_attributes[0];

  $post = array(
    "title" => $title,
    "series" => $series,
    "country" => $country,
    "link" => $link,
    "imgSrc" => $src
  );

  array_push($featuredPosts, $post);
}
?>
  <div class="container">
    <div class="row site-title justify-content-center text-center">
      <div class="col-sm-12">
        <h1 class="display-2">Explore</h1>
      </div>
      <div class="col-sm-8 site-subtitle">
        <p>Creative Disturbance features many podcasts, people, and channels that span  a wide range of disciplines and interests. Find your next favorite!</p>
      </div>
    </div>

    <form action="#">
      <div class="form-row explore-form-row">

      </div>
    </form>

    <div class="row explore-featured-podcasts-title justify-content-center">
      <div class="col-sm-12 text-center">
        <h2>Featured Podcasts</h2>
      </div>
    </div>
    <div class="row explore-featured-podcasts-items">
      <?php foreach ($featuredPosts as $post): ?>
      <div class="col explore-featured-item">
        <a href="<?php echo $post['link'] ?>">
          <img src="<?php echo $post['imgSrc'] ?>" alt="" class="img-fluid">
          <h3><?php echo $post['title'] ?></h3>
          <p class="lead"><?php echo $post['series'] ?></p>
          <p><?php echo $post['country'] ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

<?php
get_footer();
