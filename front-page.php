<?php
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
  $countryCode = $podcasts->field("country");

  $post = array(
    "title" => $title,
    "series" => $series,
    "country" => $country,
    "link" => $link,
    "countryCode" => $countryCode
  );

  array_push($featuredPosts, $post);
}
?>
  <div class="container">
    <div class="row site-title justify-content-center text-center">
      <div class="col-sm-12">
        <h1 class="display-2">Creative Disturbance</h1>
      </div>
      <div class="col-sm-8 site-subtitle">
        <p>Creative Disturbance is an international, multilingual network and podcast platform supporting collaboration among the arts, sciences, and new technologies communities. </p>
      </div>
    </div>
  </div>
  <div class="container-fluid home-map-container">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <div id="map"></div>
      </div>
    </div>
  </div>

  <script>
    let featuredPosts = <?php echo json_encode($featuredPosts, JSON_HEX_TAG); ?>;
  </script>

<?php
get_footer();
