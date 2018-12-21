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

/// Populate dropdowns ///
$categoryParams = array(
  'limit' => -1,
);
$categories = pods('podcast_category', $categoryParams);
$categoriesArr = array();
while($categories->fetch()) {
  $catName = $categories->display('post_title');
  array_push($categoriesArr, array(
      'text' => $catName,
      'value' => str_replace(' ', '_', strtolower($catName))
    )
  );
}

$languageParams = array(
  'limit' => -1,
);
$languages = pods('language', $languageParams);
$languageArr= array(array('text' => 'All Languages', 'value' => 'all'));
while($languages->fetch()) {
  $lanName = $languages->display('name');
  array_push($languageArr, array(
      'text' => $lanName,
      'value' => str_replace(' ', '_', strtolower($lanName))
    )
  );
}

/// Get Featured Posts ///
$featuredParams = array(
  'limit' => 15,
  'where' => 'featured_on_homepage.meta_value = 1'
);
$podcasts = pods( 'podcast', $featuredParams );

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

/// Handle form input ///
if (!empty($_SERVER['QUERY_STRING'])) {
  $query = explode('&', $_SERVER['QUERY_STRING']);
  $queryParams = array();
  foreach( $query as $param ) {
    list($name, $value) = explode('=', $param, 2);
    $queryParams[urldecode($name)][] = urldecode($value);
  }

  if (in_array('thingSelect', $queryParams) &&
    in_array('topicSelect', $queryParams) &&
    in_array('languageSelect', $queryParams)) {

  }
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

    <form action="" method="get">
      <div class="form-row explore-form-row justify-content-center align-items-center">
        <div class="form-group">
          <label for="thingSelect">See</label>
          <select id="thingSelect" name="thingSelect" class="explore-dropdown">
          </select>
        </div>
        <div class="form-group">
          <label for="topicSelect">Related to</label>
          <select multiple id="topicSelect" name="topicSelect" class="explore-dropdown explore-multi">
          </select>
        </div>
        <div class="form-group">
          <label for="languageSelect">in</label>
          <select id="languageSelect" name="languageSelect" class="explore-dropdown">
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Go</button>
        </div>
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

  <script>
    let categories = <?php echo json_encode($categoriesArr, JSON_HEX_TAG) ?>;
    let languages = <?php echo json_encode($languageArr, JSON_HEX_TAG) ?>;
  </script>
<?php
get_footer();
