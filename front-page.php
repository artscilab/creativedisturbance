<?php
  get_header();
  ?>

  <?php
  $channels = get_terms(array(
    'taxonomy' => 'series',
    'hide_empty' => false
  ));
  ?>
  <div class="container-fluid home-map-container">
    <div class="row">
      <div class="col-sm-12">
        <div id="map"></div>
      </div>
    </div>
  </div>

<?php
get_footer();
