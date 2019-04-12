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
$recentParams = array(
  'limit' => '5',
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

  <div class="container-fluid home-recent-people-container">
    <div class="row justify-content-center">
      <h2 class="mb-5">Recently updated</h2>
    </div>
    <div class="row hosts-row justify-content-center">
      <?php foreach ($recentHosts as $host): ?>
        <div class="host col-sm-2">
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
