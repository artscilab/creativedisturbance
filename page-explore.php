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
$dropdownCategoriesParams = array(
  'limit' => -1,
);
$dropdownCategories = pods('podcast_category', $dropdownCategoriesParams);
$dropdownCategoriesArr = array();
while($dropdownCategories->fetch()) {
  $catName = $dropdownCategories->display('post_title');
  array_push($dropdownCategoriesArr, array(
      'text' => $catName,
      'value' => str_replace(' ', '-', strtolower($catName))
    )
  );
}

$dropdownLanguagesParams = array(
  'limit' => -1,
);
$dropdownLanguages = pods('language', $dropdownLanguagesParams);
$dropdownLanguagesArr= array(array('text' => 'All Languages', 'value' => 'all'));
while($dropdownLanguages->fetch()) {
  $lanName = ucwords($dropdownLanguages->display('post_name'));
  array_push($dropdownLanguagesArr, array(
      'text' => $lanName,
      'value' => $dropdownLanguages->display('post_name')
    )
  );
}

/// Get Featured Posts ///
$featuredParams = array(
  'limit' => 4,
  'where' => 'featured_on_homepage.meta_value = 1'
);
$featuredPodcasts = pods( 'podcast', $featuredParams );

$featuredPosts = array();
while ( $featuredPodcasts->fetch() ) {
  $title = $featuredPodcasts->display('post_title');
  $series = $featuredPodcasts->display('series');
  $country = $featuredPodcasts->display('country');
  $link = $featuredPodcasts->display('guid');

  $term = get_the_terms($featuredPodcasts->display('ID'), 'series')[0];
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
    "imgSrc" => $src,
    "categoryDisplay" => $featuredPodcasts->display('podcast_category')
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

  $showEpisodes = false;
  $showChannels = false;
  $showPeople = false;
  $searchByTopic = false;

  $filteredEpisodes = array();
  $filteredChannels = array();
  $filteredHosts = array();
  $filteredVoices = array();

  if (array_key_exists('thingSelect', $queryParams) &&
    array_key_exists('languageSelect', $queryParams)) {
    switch($queryParams['thingSelect'][0] ) {
      case 'episodes':
        $showEpisodes = true;
        break;
      case 'channels':
        $showChannels = true;
        break;
      case 'people':
        $showPeople = true;
        break;
      case 'everything':
        $showEpisodes = $showChannels = $showPeople = true;
        break;
    }

    if (array_key_exists('topicSelect', $queryParams)) {
      $searchByTopic = true;
    }
  }

  if ($showEpisodes) {
    if ($queryParams['languageSelect'][0] == 'all') {
      $podcastParams = array(
        'limit' => 10
      );
    } else {
      $podcastParams = array(
        'limit' => 10,
        'where' => 'language.post_title = \'' . $queryParams['languageSelect'][0] . '\''
      );
    }

    $podcasts = pods('podcast', $podcastParams);
    while($podcasts->fetch()) {
      $title = $podcasts->display('post_title');
      $series = $podcasts->display('series');
      $country = $podcasts->display('country');
      $link = $podcasts->display('guid');
      $language = $podcasts->display('language');

      $term = get_the_terms($podcasts->display('ID'), 'series')[0];
      $seriesName = $term->name;
      $seriesLink = get_term_link($term->term_id);
      $media_id = get_term_meta( $term->term_id, 'podcast_series_image_settings', true );
      $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
      $src = $image_attributes[0];

      $categoryField = $podcasts->field('podcast_category');
      $categories = array();
      if (!empty($categoryField)) {
        $show = false;

        if ($searchByTopic) {
          foreach ($categoryField as $category) {
            array_push($categories, $category['post_title']);
            if (in_array($category['post_name'], $queryParams['topicSelect'])) {
              $show = true;
            }
          }
        }
        else $show = true;

        if ($show) {
          $episode = array(
            "title" => $title,
            "series" => $series,
            "country" => $country,
            "link" => $link,
            "imgSrc" => $src,
            "language" => $language,
            "categories" => $categories,
            "categoryDisplay" => $podcasts->display('podcast_category')
          );
          array_push($filteredEpisodes, $episode);
        }
      }
    }
  }

  if ($showChannels) {
    if ($queryParams['languageSelect'][0] == 'all') {
      $channelParams = array(
        'limit' => 10
      );
    } else {
      $channelParams = array(
        'limit' => 10,
        'where' => 'language.post_title = \'' . $queryParams['languageSelect'][0] . '\''
      );
    }

    $channels = pods('series', $channelParams);
    while($channels->fetch()) {
      $name = $channels->display('name');
      $id = $channels->display('term_id');
      $language = $channels->display('language');

      $link = get_term_link($id);
      $media_id = get_term_meta( $id, 'podcast_series_image_settings', true );
      $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
      $src = $image_attributes[0];

      $categoryField = $channels->field('series_category');
      $categories = array();
      if (!empty($categoryField)) {
        $show = false;
        if ($searchByTopic) {
          foreach ($categoryField as $category) {
            array_push($categories, $category['post_title']);
            if (in_array($category['post_name'], $queryParams['topicSelect'])) {
              $show = true;
            }
          }
        }
        else $show = true;

        if ($show) {
          $channel = array(
            "name" => $name,
            "link" => $link,
            "imgSrc" => $src,
            "language" => $language,
            "categories" => $categories,
            "categoryDisplay" => $channels->display('series_category')
          );
          array_push($filteredChannels, $channel);
        }
      }
    }
  }

  if ($showPeople) {
    if ($queryParams['languageSelect'][0] == 'all') {
      $peopleParams = array(
        'limit' => 10
      );
    } else {
      $peopleParams = array(
        'limit' => 10,
        'where' => 'language.post_title = \'' . $queryParams['languageSelect'][0] . '\''
      );
    }

    $hosts = pods('host', $peopleParams);
    while ($hosts->fetch()) {
      $name = $hosts->display('post_title');
      $email = $hosts->display('email');
      $src = $hosts->display('profile_photo');
      $job = $hosts->display('job_title');
      $organization = $hosts->display('organization');
      $language = $hosts->display('language');
      $link = $hosts->display('guid');
      $categoryField = $hosts->field('categories');

      $categories = array();
      if (!empty($categoryField)) {
        $show = false;
        if ($searchByTopic) {
          foreach ($categoryField as $category) {
            array_push($categories, $category['post_title']);
            if (in_array($category['post_name'], $queryParams['topicSelect'])) {
              $show = true;
            }
          }
        }
        else $show = true;

        if ($show) {
          $host = array(
            "name" => $name,
            "jobTitle" => $job,
            "organization" => $organization,
            "imgSrc" => $src,
            "link" => $link,
            "language" => $language,
            "categories" => $categories,
            "categoryDisplay" => $hosts->display('categories')
          );

          array_push($filteredHosts, $host);
        }
      }
    }

    $voices = pods('voice', $peopleParams);
    while ($voices->fetch()) {
      $name = $voices->display('post_title');
      $email = $voices->display('email');
      $src = $voices->display('profile_photo');
      $job = $voices->display('job_title');
      $organization = $voices->display('organization');
      $language = $voices->display('language');
      $link = $voices->display('guid');
      $categoryField = $voices->field('categories');
      $categories = array();

      if (!empty($categoryField)) {
        $show = false;
        if ($searchByTopic) {
          foreach ($categoryField as $category) {
            array_push($categories, $category['post_title']);
            if (in_array($category['post_name'], $queryParams['topicSelect'])) {
              $show = true;
            }
          }
        }
        else $show = true;

        if ($show) {
          $voice = array(
            "name" => $name,
            "jobTitle" => $job,
            "organization" => $organization,
            "imgSrc" => $src,
            "link" => $link,
            "language" => $language,
            "categories" => $categories,
            "categoryDisplay" => $voices->display('categories')
          );

          array_push($filteredVoices, $voice);
        }
      }
    }
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

    <?php if(!empty($filteredEpisodes)): ?>
    <div class="row filtered-title filtered-episodes-title">
      <div class="col col-md-12 text-center">
        <h2>Episodes</h2>
      </div>
    </div>
    <div class="row filtered-episodes filtered-result-row justify-content-center">
      <?php foreach ($filteredEpisodes as $episode): ?>
      <div class="col col-md-4 filtered-result filtered-episode">
        <a href="<?php echo $episode['link'] ?>">
          <img src="<?php echo $episode['imgSrc'] ?>" alt="" class="img-fluid">
          <h3><?php echo wp_trim_words($episode['title'], 5) ?></h3>
          <p class="lead"><?php echo $episode['series'] ?></p>
          <p><?php echo $episode['language'] ?></p>
          <p><?php echo $episode['categoryDisplay'] ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if(!empty($filteredChannels)): ?>
      <div class="row filtered-title filtered-channels-title">
        <div class="col col-md-12 text-center">
          <h2>Channels</h2>
        </div>
      </div>
      <div class="row filtered-channels filtered-result-row justify-content-center">
        <?php foreach ($filteredChannels as $channel): ?>
          <div class="col col-md-4 filtered-result filtered-channel">
            <a href="<?php echo $channel['link'] ?>">
              <img src="<?php echo $channel['imgSrc'] ?>" alt="" class="img-fluid">
              <h3><?php echo $channel['name'] ?></h3>
              <p class="lead"><?php echo $channel['language'] ?></p>
              <p><?php echo $channel['categoryDisplay'] ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if(!empty($filteredHosts)): ?>
      <div class="row filtered-title filtered-hosts-title">
        <div class="col col-md-12 text-center">
          <h2>Hosts</h2>
        </div>
      </div>
      <div class="row filtered-hosts filtered-result-row justify-content-center">
        <?php foreach ($filteredHosts as $host): ?>
          <div class="col col-md-4 filtered-result filtered-host">
            <a href="<?php echo $host['link'] ?>">
              <img src="<?php echo $host['imgSrc'] ?>" alt="" class="img-fluid profile-img">
              <div class="profile-info">
                <h3><?php echo $host['name'] ?></h3>
                <p class="lead"><?php echo $host['jobTitle'] ?></p>
                <p><?php echo $host['categoryDisplay'] ?></p>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if(!empty($filteredVoices)): ?>
      <div class="row filtered-title filtered-voices-title">
        <div class="col col-md-12 text-center">
          <h2>Voices</h2>
        </div>
      </div>
      <div class="row filtered-voices filtered-result-row justify-content-center">
        <?php foreach ($filteredVoices as $voice): ?>
          <div class="col col-md-4 filtered-result filtered-voice">
            <a href="<?php echo $voice['link'] ?>">
              <img src="<?php echo $voice['imgSrc'] ?>" alt="" class="img-fluid profile-img">
              <div class="profile-info">
                <h3><?php echo $voice['name'] ?></h3>
                <p class="lead"><?php echo $voice['jobTitle'] ?></p>
                <p><?php echo $voice['categoryDisplay'] ?></p>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="row row-mb justify-content-center">
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
          <p><?php echo $post['categoryDisplay'] ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script>
    let categories = <?php echo json_encode($dropdownCategoriesArr, JSON_HEX_TAG) ?>;
    let languages = <?php echo json_encode($dropdownLanguagesArr, JSON_HEX_TAG) ?>;
  </script>
<?php
get_footer();
