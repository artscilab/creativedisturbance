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

  if ($country != "" && $countryCode != "") {
    $post = array(
      "title" => $title,
      "series" => $series,
      "country" => $country,
      "link" => $link,
      "countryCode" => $countryCode
    );

    array_push($featuredPosts, $post);
  }
}

$recentHosts = array();
$recentPodcasts = array();
$recentParams = array(
  'limit' => '4',
  'orderby' => 't.post_modified DESC'
);
$recents = pods('podcast', $recentParams);

while ($recents->fetch()) {
  $hosts = $recents->field('hosts');

  if ($hosts != false) {
    foreach ($hosts as $host) {
      array_push($recentHosts, $host);
    }
  }

  $s = get_the_terms($recents->display('ID'), 'series')[0];
  $media_id = get_term_meta( $s->term_id, 'podcast_series_image_settings', true );
  $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
  $src = $image_attributes[0];

  $title = $recents->display('post_title');
  $series = $recents->display('series');
  $country = $recents->display('country');
  $link = $recents->display('guid');
  $countryCode = $recents->field("country");
  $post = array(
    "title" => $title,
    "series" => $series,
    "country" => $country,
    "link" => $link,
    "countryCode" => $countryCode,
    "src" => $src
  );

  array_push($recentPodcasts, $post);
}

$recentHosts = array_unique($recentHosts, SORT_REGULAR);

$mapFunc = function($recent) {
  $pod = pods('host', $recent['ID']);
  $name = $pod->display('post_title');
  $job= $pod->display('job_title');
  $src = $pod->display('profile_photo');
  $guid = $pod->display('guid');

  return array(
    "name" => $name,
    "job" => $job,
    "src" => $src,
    "link" => $guid
  );
};
$recentHosts = array_map($mapFunc, $recentHosts);
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

  <div class="container home-recent-people-container">
    <div class="row justify-content-center">
      <h2 class="mb-5">Recently Updated</h2>
    </div>
    <div class="row hosts-row justify-content-center">
      <?php foreach ($recentPodcasts as $podcast): ?>
        <div class="host col-sm-3">
          <a href="<?php echo $podcast['link'] ?>">
            <img src="<?php echo $podcast['src'] ?>" alt="" class="podcast-img img-fluid">
            <div class="">
              <h3><?php echo $podcast['title'] ?></h3>
              <p class="lead"><?php echo $podcast['series'] ?></p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row hosts-row justify-content-center">
      <?php foreach ($recentHosts as $host): ?>
        <div class="host col-sm-3">
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

  <div class="container-fluid home-map-container">
    <div class="row justify-content-center">
      <h2 class="mb-5">Explore the world of Creative Disturbance!</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <div id="map"></div>
      </div>
    </div>
  </div>

  <script>
    let featuredPosts = <?php echo json_encode($featuredPosts, JSON_HEX_TAG); ?>;
  </script>

<?php
get_footer();
