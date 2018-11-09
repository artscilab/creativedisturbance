<?php
  get_header();

  ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <?php
      $params = array('limit' => -1);
      $podcasts = pods('podcast', $params);

      $allCountries = array();
      $allArtDisciplines = array();
      $allScienceDisciplines = array();
      $allInstitutions = array();

      ?>

    </main><!-- #main -->
  </div><!-- #primary -->



<?php
get_footer();
