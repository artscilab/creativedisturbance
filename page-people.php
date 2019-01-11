<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CreativeDisturbance
 */

get_header();

$hosts = array();
$voices = array();

$hostParams = array(
  'limit' => -1,
);
$hostPod= pods('host', $hostParams);
while($hostPod->fetch()) {
  $name = $hostPod->display('post_title');
  $job = $hostPod->display('job_title');
  $src = $hostPod->display('profile_photo');
  $guid = $hostPod->display('guid');
  $series = $hostPod->field('series');
  $seriesHosted = array();

  foreach ($series as $s) {
    array_push($seriesHosted, $s['name']);
  }

  array_push($hosts, array(
    "name" => $name,
    "job" => $job,
    "src" => $src,
    "link" => $guid,
    "series" => $seriesHosted
  ));
}

$voices = array();
$voiceParams = array(
  'limit' => -1,
);
$voicePod= pods('voice', $voiceParams);
while($voicePod->fetch()) {
  $name = $voicePod->display('post_title');
  $job = $voicePod->display('job_title');
  $src = $voicePod->display('profile_photo');
  $guid = $voicePod->display('guid');
  $podcast = $voicePod->field('podcast');
  $podcastAppearances = array();

  foreach ($podcast as $p) {
    array_push($podcastAppearances, $p['post_title']);
  }

  array_push($voices, array(
    "name" => $name,
    "job" => $job,
    "src" => $src,
    "link" => $guid,
    "podcasts" => $podcastAppearances
  ));
}
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php
      set_query_var('display_title', the_title('', '', false));
      get_template_part('template-parts/title'); ?>

      <div class="container hosts">
        <div class="row title-row">
          <div class="col-sm-12 text-center">
            <h2>Hosts</h2>
          </div>
        </div>
        <div class="row hosts-row">
          <?php foreach ($hosts as $host): ?>
            <div class="host col-sm-4">
              <a href="<?php echo $host['link'] ?>">
                <img src="<?php echo $host['src'] ?>" alt="" class="profile-img img-fluid">
                <h3><?php echo $host['name'] ?></h3>
                <p class="lead"><?php echo $host['job'] ?></p>
                <p>Host of: </p>
                <ul>
                  <?php foreach ($host['series'] as $series): ?>
                    <li><?php echo $series ?></li>
                  <?php endforeach; ?>
                </ul>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="container voices">
        <div class="row title-row">
          <div class="col-sm-12 text-center">
            <h2>Voices</h2>
          </div>
        </div>
        <div class="row voices-row">
          <?php foreach ($voices as $voice): ?>
            <div class="voice col-sm-4">
              <a href="<?php echo $voice['link'] ?>">
                <img src="<?php echo $voice['src'] ?>" alt="" class="profile-img img-fluid">
                <h3><?php echo $voice['name'] ?></h3>
                <p class="lead"><?php echo $voice['job'] ?></p>
                <p>Appears in: </p>
                <ul>
                  <?php foreach ($voice['podcasts'] as $podcast): ?>
                    <li><?php echo $podcast ?></li>
                  <?php endforeach; ?>
                </ul>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </main>
  </div>

<?php
get_footer();